<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TypeProductAdminController extends Controller
{
    public function getTypeProduct()
    {
        if(Auth::check()) {
            $typeProduct = ProductType::all();
            return view("Admin.TypeProducts.typeProduct", compact("typeProduct"));
        }
        else {
            return redirect("login");
        }
    }
    public function getAddTypeProduct()
    {
        if(Auth::check()) {
            $addTypeProduct = ProductType::all();
            return view("Admin.TypeProducts.addTypeProduct", compact("addTypeProduct"));
        }
        else {
            return redirect("login");
        }
    }
    public function postAddTypeProduct(Request $req)
    {
        $val = $req->validate(
            [
                'name'=>'required',
                'description'=> 'required',
                'image' => 'required'
            ],
            [
                'name.required' => 'Vui lòng nhập tên loại',
                'description.required' => 'Vui lòng nhập mô tả',
                'image.required' => 'Vui lòng nhập hình ảnh'
            ]);
        $addTypeProduct = new ProductType();
        $addTypeProduct->name = $val['name'];
        $addTypeProduct->description = $val['description'];
        $addTypeProduct->image = $val['image'];
        if ($req->hasFile("image"))
        {
        $file = $req->file("image");
        $ext = $file->getClientOriginalExtension();
        if ($ext != "jpg" && $ext != "png" && $ext != "jpeg")
        {
            return redirect("admin/typeproduct/add")->with("loi", "Bạn chỉ được chọn file hình có: .jpg, .png, .jpeg");
        }
        $ten = $file->getClientOriginalName();
        $name = Str::random(4);
        $name = $name."_".$ten;
        while(file_exists("resources/FrontEnd/image/product/".$name))
        {
            $name = Str::random(4);
            $name = $name."_".$ten;
        }
        $file->move("resources/FrontEnd/image/product/", $name);
        $addTypeProduct->image = $name;
        }
        else
        {
        $addTypeProduct->image = "";
        }
        $addTypeProduct->save();
        return redirect()->back()->with('thongbao', "Thêm loại sản phẩm thành công");
    }
    public function getEditTypeProduct($id)
    {
        $editTypeProduct = ProductType::Find($id);
        return view('Admin.TypeProducts.editTypeProduct', compact('editTypeProduct'));
    }
    public function postEditTypeProduct(Request $req, $id)
    {
        $val = $req->validate(
            [
                'name' =>'required',
                'description' => 'required',
                'image' => 'required'
            ],
            [
                'name.required'=> 'Vui lòng nhập tên loại sản phẩm',
                'description.required' => 'Vui lòng nhập mô tả',
                'image.required'=> 'Vui lòng nhập hình ảnh'
            ]);   
        $editTypeProduct = ProductType::Find($id);
        $editTypeProduct->name = $val['name'];
        $editTypeProduct->description = $val['description'];
        $editTypeProduct->image = $val['image'];
        if ($req->hasFile("image"))
        {
            $file = $req->file("image");
            $ext = $file->getClientOriginalExtension();
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg")
            {
                return redirect("admin/typeproduct/edit/$id")->with("loi", "Bạn chỉ được chọn file hình có: .jpg, .png, .jpeg");
            }
            $ten = $file->getClientOriginalName();
            $name = Str::random(4);
            $name = $name."_".$ten;
            while(file_exists("resources/FrontEnd/image/product/".$name))
            {
                $name = Str::random(4);
                $name = $name."_".$ten;
            }
            $file->move("resources/FrontEnd/image/product/", $name);
            $editTypeProduct->image = $name;
        }
        else
        {
            $editTypeProduct->image = "";
        }
        $editTypeProduct->save();
        return redirect("admin/typeproduct/list")->with("thongbao","Sửa loại sản phẩm thành công");
    }
    public function getRemoveTypeProduct($id)
    {
        $editTypeProduct = ProductType::Find($id);
        if(count($editTypeProduct->product)>=1)
        {
            return redirect("admin/typeproduct/list")->with("loi","Sản phẩm không thể xóa do có sản phẩm");

        }else
        {
            $editTypeProduct->delete();
            return redirect("admin/typeproduct/list")->with("thongbao","Xóa loại sản phẩm thành công");
        }
        
    }
}
