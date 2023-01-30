<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlideAdminController extends Controller
{
    //
    public function getSlideList()
    {
        $slideList = Slide::all();
        return view('Admin.Slide.slideList', compact('slideList'));
    }
    public function getAddSlide()
    {
        $addSlide = Slide::all();
        return view('Admin.Slide.addSlide', compact('addSlide'));
    }
    public function getRemoveSlide($id)
    {
        $removeSlide = Slide::find($id);
        $removeSlide->delete();
        return redirect("admin/slide/listslide")->with("thongbao", "Xoá hình ảnh slide thành công");
    }
    public function postAddSlide(Request $req)
    {
        $val = $req->validate(
            [
                'image' => 'required'
            ],
            [
                'image.required' => 'Vui lòng nhập hình ảnh'
            ]);
        
        $addSlide = new Slide();
        $addSlide->link;
        // $addSlide->image
        if ($req->hasFile("image"))
        {
            $file = $req->file("image");
            $ext = $file->getClientOriginalExtension();
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg")
            {
                return redirect("admin/slide/addslide")->with("loi", "Bạn chỉ được chọn file hình có: .jpg, .png, .jpeg");
            }
            $ten = $file->getClientOriginalName();
            $name = Str::random(4);
            $name = $name."_".$ten;
            while(file_exists("resources/FrontEnd/image/slide".$name))
            {
                $name = Str::random(4);
                $name = $name."_".$ten;
            }
            $file->move("resources/FrontEnd/image/slide", $name);
            $addSlide->image = $name;
        }
        else
        {
            $addSlide->image = "";
        }
        $addSlide->save();
        return redirect()->back()->with('thongbao', "Thêm ảnh slide thành công");

    }
    public function getEditSlide($id)
    {
        $editSlide = Slide::find($id);
        return view('Admin.Slide.editSlide', compact('editSlide'));
    }
    public function postEditSlide(Request $req, $id)
    {

        $req->validate(
            [
                'image' => 'required'
            ],
            [
                'image.required' => 'Vui lòng nhập hình ảnh'
            ]);
        
        $editSlide = Slide::find($id);
        $editSlide->link;
        // $editSlide->image
        if ($req->hasFile("image"))
        {
            $file = $req->file("image");
            $ext = $file->getClientOriginalExtension();
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg")
            {
                return redirect("admin/slide/editslide/$id")->with("loi", "Bạn chỉ được chọn file hình có: .jpg, .png, .jpeg");
            }
            $ten = $file->getClientOriginalName();
            $name = Str::random(4);
            $name = $name."_".$ten;
            while(file_exists("resources/FrontEnd/image/slide".$name))
            {
                $name = Str::random(4);
                $name = $name."_".$ten;
            }
            $file->move("resources/FrontEnd/image/slide", $name);
            $editSlide->image = $name;
        }
        else
        {
            $editSlide->image = "";
        }
        $editSlide->save();
        return redirect()->back()->with('thongbao', "Thêm ảnh slide thành công");
    }

}
