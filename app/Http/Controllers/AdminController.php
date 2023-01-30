<?php

namespace App\Http\Controllers;

use App\Models\Bill_detail;
use App\Models\Bills;
use App\Models\Customer;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function getOrderList()
    {
        $order = Bills::join('Customer','Customer.id','=', 'bills.id_customer')->get();
        return view("Admin.Bills.orderList", compact("order"));
    }
    public function getOrderUpdate($id)
    {
        $bill = Bills::find($id);
        $customer = Customer::find($bill->id_customer);
        $billDetail = Bill_detail::where("id_bill", "=", $bill->id)
                                    ->join("products", "products.id", "=", "Bill_Detail.id_product")
                                    ->get(['products.name', 'bill_detail.quantity', 'bill_detail.unit_price']);
        return view("Admin.Bills.billDetail", compact("bill", "customer", "billDetail"));
    }
    public function postOrderUpdate(Request $req, $id)
    {
        $bill= Bills::find($id);
        $bill->state = $req->state;
        $bill->save();
        return redirect()->back()->with("thongbao", "Cập nhật đơn hàng thành công !!!");
    }
    public function getListOfCustomers()
    {
        $customers = Customer::all();
        return view("Admin.Customer.customer", compact('customers'));

    }
    public function getRemoveCustomer($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect("admin/customer/listcustomer")->with("thongbao", "Xoá sản phẩm thành công");

    }
    public function getEditListOfCustomers($id)
    {
        $customers = Customer::find($id);
        return view("Admin.Customer.editCustomer", compact('customers'));

    }
    public function postEditListOfCustomers(Request $req,$id)
    {
        $val = $req->validate(
            [
                'name' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'note' => 'required'
            ],
            [
                'name.required' => 'Vui lòng nhập tên khách hàng',
                'gender' => 'Vui lòng nhập giới tính khách hàng',
                'address' => 'Vui lòng nhập địa chỉ khách hàng',
                'phone' => 'Vui lòng nhập số điện thoại khách hàng',
                'note' => 'Vui lòng nhập ghi chú'
            ]);
        $customers = Customer::find($id);
        $customers->name = $val['name'];
        $customers->gender = $val['gender'];
        $customers->address = $val['address'];
        $customers->phone_number = $val['phone'];
        $customers->note = $val['note'];
        $customers->save();
        return redirect("admin/customer/editcustomer/$id")->with("thongbao", "Cập nhật thông tin khách hàng thành công");

    }

//
    public function getLogin()
    {
        return view("Admin.login");
    }
    public function postLogin(Request $req)
    {
        $val= $req->validate(
        [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ],
        [
            'email.required' => "chưa nhập địa chỉ mail",
            'email.email' => "Địa chỉ mail không đúng định dạng",
            'password.required' => 'Chưa nhập mật khẩu',
            'password.min' => 'mật khẩu tối thiểu 6 ký tự',
            'password.max' => 'mật khẩu tối đa 20 ký tự'
        ]
        );
        $authentication = array('email' => $val['email'], 'password' => $val['password']);
        if (Auth::attempt($authentication)) {
        return redirect("admin/bills/list");
        } else {
            return redirect()->back()->with(['matb' => '0', 'noidung' => 'Đăng nhập thất bại']);
        }
    }
    public function getLogOut()
    {
        Auth::logout();
        return redirect("login");
    }
    public function getUserInfo()
    {
        if (Auth::check())
        {
            return view("Admin.Information.information");
        }
        else
        {
            return redirect("login");
        }
    }
    // public function getTypeProduct()
    // {
    //     if(Auth::check()) {
    //         $categoryList = ProductType::all();
    //         return view("Admin.Products.products", compact("categoryList"));
    //     }
    //     else {
    //         return redirect("login");
    //     }
    // }
    // public function getTypeProduct()
    // {
    //     if(Auth::check()) {
    //         $typeProduct = ProductType::all();
    //         return view("Admin.ProductOfList.productList", compact("typeProduct"));
    //     }
    //     else {
    //         return redirect("login");
    //     }
    // }
    
}
