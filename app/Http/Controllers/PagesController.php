<?php

namespace App\Http\Controllers;

use App\Models\Bill_detail;
use App\Models\Bills;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Products;
use App\Models\ProductType;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    //
    public function getIndex()
    {
        $slide = Slide::all();
        $newProduct = Products::where("new", "=",1 )->paginate(4, ['*'], 'pagenew');
        $promotionProduct = Products::where('promotion_price','!=',0)->paginate(8,['*'], 'pagenormal');
        return view("Pages.trangchu", compact('slide', 'newProduct','promotionProduct'));
    }

    public function getProductType($id)
    {
        $type = ProductType::where('id','=',$id)->first();
        $categories = ProductType::all();
        $productByType = Products::where('id_type','=', $id)->get();
        $otherProducts = Products::where('id_type', '!=', $id)->paginate(6);
        return view("Pages.ProductType", compact('type', 'categories', 'productByType', 'otherProducts'));
    }
    public function getProductDetail($id)
    {
        $productsDetail = Products::where('id','=',$id)->first();
        $similarProducts = Products::where('id_type', '=', $productsDetail->id_type)->paginate(3);
        $newProducts = Products::where('new', '=', 1)->take(3)->get();
        $sellingProducts = Bill_detail::selectRaw('id_product, sum(quantity) as total')
                                        ->groupBy('id_product')
                                        ->orderByDesc('total')->take(4)->get();
        // dd($sellingProducts);
        return view("Pages.ProductDetail", compact('productsDetail', 'similarProducts', 'newProducts','sellingProducts'));
    }
    public function getContact()
    {
        return view("Pages.Contact");
    }
    public function getIntroduct()
    {
        return view("Pages.Introduct");
    }


    public function getAddToCart(Request $req, $id)
    {
        $products = Products::Find($id);
        $oldCart = Session('cart')? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($products, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }
    public function getRemoveCart($id)
    {
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0)
        {
            Session::put('cart', $cart);
        }else
        {
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getDatHang()
    {
        return view("Pages.dathang");
    }
    public function postDatHang(Request $req)
    {
        $cart = Session::get('cart');
        //l??u th??ng tin kh??ch h??ng
        $cus = new Customer();
        $cus->name = $req->name;
        $cus->gender = $req->gender;
        $cus->email = $req->email;

        $cus->address= $req->address;
        $cus->phone_number = $req->phone_number;
        $cus->note = $req->note;
        $cus->save();
        //l??u th??ng tin ????n h??ng
        $bill = new Bills();
        $bill->id_customer = $cus->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment;
        $bill->note = $req->note;
        $bill->save();
        //l??u th??ng tin chi ti???t ????n h??ng
        foreach($cart->items as $key => $value)
        {
            $bd = new Bill_Detail();
            $bd->id_bill = $bill->id;
            $bd->id_product = $key;
            $bd->quantity = $value["qty"];
            $bd->unit_price = ($value["price"]/$value["qty"]);
            $bd->save();
        }
            Session::forget('cart');
        return view("Pages.notify");
    }
    public function getLogin()
    {
        return view('Pages.login');
    }
    public function getSignUp()
    {
        return view('Pages.signup');
    }

    public function postSignUp(Request $req)
    {
        $val = $req->validate(
            [
                'email' => 'required|email|unique:users',
                'password' =>'required|min:6|max:20',
                'repassword' => 'required|same:password',
                'address' => 'required',
                'fullname' => 'required',
                'phone'=> 'required'
            ],
            [
                'email.required' =>'Vui l??ng nh???p ?????a ch??? th??',
                'email.email' => '?????a ch??? mail kh??ng ????ng ?????nh d???ng',
                'email.unique' => 'Email n??y ???? c?? ng?????i ????ng k??',
                'password.required' => 'Ch??a nh???p m???t kh???u',
                'password.min' => 'M???t kh???u t???i thi???u 6 k?? t???',
                'password.max' => 'M???t kh???u t???i ??a 20 k?? t???',
                'repassword.same' => 'M???t kh???u kh??ng kh???p',
                'repassword.required' => 'Ch??a nh???p nh???p l???i m???t kh???u',
                'addres.required' => 'Ch??a nh???p ?????a ch???',
                'fullname.required' => 'Ch??a nh???p h??? v?? t??n',
                'phone.required'=>'Vui l??ng nh???p s??? ??i???n tho???i'
            ]
        );
        $user = new User();
        $user->full_name = $val['fullname'];
        $user->email = $val['email'];
        $user->password = Hash::make($val['password']);
        $user->phone = $val['phone'];
        $user->address = $val['address'];
        $user->save();
        return redirect()->back()->with('thongbao', "????ng k?? th??nh c??ng");
    }
    public function postLogin(Request $req)
    {
        $val = $req->validate(
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required' =>'Vui l??ng nh???p ?????a ch??? mail',
                'email.email'=>'Vui l??ng nh???p ????ng ?????nh d???ng mail',
                'password.required'=>'Vui l??ng nh???p m???t kh???u',
                'password.min'=> 'M???t kh???u t???i thi???u 6 k?? t???',
                'password.max'=> 'M???t kh???u t???i ??a 20 k?? t???'
            ]);
        $authentication = array('email'=> $val['email'], 'password'=> $val['password']);
        if(Auth::attempt($authentication))
        {
            return redirect('index');
        }else
        {
            return redirect()->back()->with(['matb'=>'0', 'noidung'=>'????ng nh???p th???t b???i!']);
        }
    }
    public function getLogOut()
    {
        Auth::logout();
        return redirect('index');
    }
    public function getSearch(Request $req)
    {
        $product = Products::where("name", "like", "%".$req->key."%")
                            ->orWhere("unit_price", $req->key)
                            ->get();
        // dd($product);
        return view('Pages.search', compact('product'));
    }
}