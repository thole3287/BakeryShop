<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductAdminController extends Controller
{
    //
    public function getProductList()
    {
        if(Auth::check()) {
            $productList = Products::all();
            return view("Admin.ProductOfList.productList", compact("productList"));
        }
        else {
            return redirect("login");
        }
    }

    public function getAddProductList()
    {
        $addProduct = Products::all();
        $typeProduct = ProductType::all();
        return view('Admin.ProductOfList.addProduct', compact('addProduct','typeProduct'));
    }

    public function postAddProductList(Request $req)
    {
        $val = $req->validate(
            [
                'name' => 'required',
                'loaisanpham' => 'required',
                'description' => 'required',
                'unitprice' => 'required',
                'promotionprice' => 'required',
                'unit' => 'required',
                'new' => 'required'
            ],
            [
                'name.required' => 'Vui lòng nhập tên sản phẩm',
                'loaisanpham.required' => 'Vui lòng chọn loại sản phẩm',
                'description.required'=> 'Vui lòng nhập mô tả',
                'unitprice.required' => 'Vui lòng nhập giá gốc',
                'promotionprice.required' => 'Vui lòng nhập giá khuyến mãi',
                'unit.required' => 'Vui lòng chọn hình thức sản phẩm',
                'new.required' => 'Vui lòng chọn sản phẩm cũ hoặc mới!'
            ]);
        $addProduct = new Products();
        $addProduct->id_type = $val['loaisanpham'];
        $addProduct->name =$val['name'];
        $addProduct->description = $val['description'];
        $addProduct->unit_price = $val['unitprice'];
        $addProduct->promotion_price = $val['promotionprice'];
        $addProduct->unit = $val['unit'];
        $addProduct->new =$val['new'];
        // $addProduct->image =$val['image'];
        if ($req->hasFile("image"))
        {
            $file = $req->file("image");
            $ext = $file->getClientOriginalExtension();
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg")
            {
                return redirect("admin/product/add")->with("loi", "Bạn chỉ được chọn file hình có: .jpg, .png, .jpeg");
            }
            $ten = $file->getClientOriginalName();
            $name = Str::random(4);
            $name = $name."_".$ten;
            while(file_exists("resources/FrontEnd/image/product".$name))
            {
                $name = Str::random(4);
                $name = $name."_".$ten;
            }
            $file->move("resources/FrontEnd/image/product", $name);
            $addProduct->image = $name;
        }
        else
        {
            $addProduct->image = "";
        }
        $addProduct->save();
        return redirect()->back()->with('thongbao', "Thêm sản phẩm thành công");

    }
    public function getRemoveProduct($id)
    {
        $removeProduct = Products::find($id);
        $removeProduct->delete();
        return redirect("admin/product/list")->with("thongbao", "Xoá sản phẩm thành công");
    }
    public function getEditProductList($id)
    {
        $editProduct = Products::find($id);
        // $typeProduct = ProductType::all();
        // dd($addProduct->name);
        return view('Admin.ProductOfList.editProduct', compact('editProduct'));
    }
    public function postEditProductList(Request $req, $id)
    {
        $val = $req->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'unitprice' => 'required',
                'promotionprice' => 'required',
                'unit' => 'required',
                'new' => 'required'
            ],
            [
                'name.required' => 'Vui lòng nhập tên sản phẩm',
                'loaisanpham.required' => 'Vui lòng chọn loại sản phẩm',
                'description.required'=> 'Vui lòng nhập mô tả',
                'unitprice.required' => 'Vui lòng nhập giá gốc',
                'promotionprice.required' => 'Vui lòng nhập giá khuyến mãi',
                'unit.required' => 'Vui lòng chọn hình thức sản phẩm',
                'new.required' => 'Vui lòng chọn sản phẩm cũ hoặc mới!'
            ]);
        $editProduct = Products::find($id);
        $editProduct->name =$val['name'];
        $editProduct->description = $val['description'];
        $editProduct->unit_price = $val['unitprice'];
        $editProduct->promotion_price = $val['promotionprice'];
        $editProduct->unit = $val['unit'];
        $editProduct->new =$val['new'];
        if ($req->hasFile("image"))
        {
            $file = $req->file("image");
            $ext = $file->getClientOriginalExtension();
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg")
            {
                return redirect("admin/product/list")->with("loi", "Bạn chỉ được chọn file hình có: .jpg, .png, .jpeg");
            }
            $ten = $file->getClientOriginalName();
            $name = Str::random(4);
            $name = $name."_".$ten;
            while(file_exists("resources/FrontEnd/image/product".$name))
            {
                $name = Str::random(4);
                $name = $name."_".$ten;
            }
            $file->move("resources/FrontEnd/image/product", $name);
            $editProduct->image = $name;
        }
        else
        {
            $editProduct->image = "";
        }
        $editProduct->save();
        return redirect()->back()->with('thongbao', "Thêm sản phẩm thành công");
    }
}
