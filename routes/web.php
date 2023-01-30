<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\SlideAdminController;
use App\Http\Controllers\TypeProductAdminController;


Route::get("loginadmin",[AdminController::class, "getLogin"])->name("adminlogin");
Route::post("loginadmin",[AdminController::class, "postLogin"])->name("adminlogin");

Route::group(["prefix" => "admin", "middleware" => "AdminLogin"],function(){
    Route::get("infomation", [AdminController::class, "getUserInfo"])->name("info");
    Route::get("logout", [AdminController::class, "getLogOut"])->name("logout");
    Route::group(["prefix" => "bills"], function(){
        Route::get("list", [AdminController::class, "getOrderList"])->name("billslist");
        Route::get("editbills/{id}",[AdminController::class, "getOrderUpdate"])->name("editbill");
        Route::post("editbills/{id}",[AdminController::class, "postOrderUpdate"])->name("editbill");
    });
    Route::group(["prefix" => "typeproduct"], function(){
        // Route::get("list", [AdminController::class, "getCategoryList"])->name("categorylist");
        Route::get("list", [TypeProductAdminController::class, "getTypeProduct"])->name("listtypeproduct");
        Route::get("add", [TypeProductAdminController::class, "getAddTypeProduct"])->name("addtypeproduct");
        Route::post("add", [TypeProductAdminController::class, "postAddTypeProduct"])->name("addtypeproduct");
        Route::get('edit/{id}',[TypeProductAdminController::class, 'getEditTypeProduct'])->name('edittypeproduct');
        Route::post('edit/{id}',[TypeProductAdminController::class, 'postEditTypeProduct'])->name('edittypeproduct');
        Route::get('remove/{id}',[TypeProductAdminController::class, 'getRemoveTypeProduct'])->name('removetypeproduct');
    });
    Route::group(["prefix" => "product"], function(){
        Route::get("list", [ProductAdminController::class, "getProductList"])->name("productlist");
        Route::get("add", [ProductAdminController::class, "getAddProductList"])->name("addproduct");
        Route::post("add", [ProductAdminController::class, "postAddProductList"])->name("addproduct");
        Route::get("edit/{id}", [ProductAdminController::class, "getEditProductList"])->name("editproduct");
        Route::get("remove/{id}", [ProductAdminController::class, "getRemoveProduct"])->name("removeproduct");
    });
    Route::group(["prefix" => "customer"], function(){
        Route::get("listcustomer", [AdminController::class, "getListOfCustomers"])->name("listcustomer");
        Route::get("removecustomer/{id}", [AdminController::class, "getRemoveCustomer"])->name("removsecustomer");
        Route::get("editcustomer/{id}", [AdminController::class, "getEditListOfCustomers"])->name("editcustomer");
        Route::post("editcustomer/{id}", [AdminController::class, "postEditListOfCustomers"])->name("editcustomer");
    });
    Route::group(["prefix" => "slide"], function(){
        Route::get("listslide", [SlideAdminController::class, "getSlideList"])->name("listslide");
        Route::get("removeslide/{id}", [SlideAdminController::class, "getRemoveSlide"])->name("removeslide");
        Route::get("addslide", [SlideAdminController::class, "getAddSlide"])->name("addslide");
        Route::post("addslide", [SlideAdminController::class, "postAddSlide"])->name("addslide");
        Route::get("editslide/{id}", [SlideAdminController::class, "getEditSlide"])->name("editslide");
        Route::post("editslide/{id}", [SlideAdminController::class, "postEditSlide"])->name("editslide");
    });
});


Route::get("/",[PagesController::class, "getIndex"])->name("index");
Route::get("producttype/{id}",[PagesController::class, "getProductType"])->name("producttype");
Route::get("productdetail/{id}",[PagesController::class, "getProductDetail"])->name("productdetail");
Route::get("contact",[PagesController::class, "getContact"])->name("contact");
Route::get("introduct",[PagesController::class, "getIntroduct"])->name("introduct");
Route::get("addtocart/{id}",[PagesController::class, "getAddToCart"])->name("addtocart");
Route::get("removecart/{id}",[PagesController::class, "getRemoveCart"])->name("deletetocart");
Route::get("orderitem", [PagesController::class, "getDatHang"])->name("orderitem");
Route::post("orderitem",[PagesController::class, "postDatHang"]);
Route::get("login", [PagesController::class, "getLogin"])->name("login");
Route::post("login", [PagesController::class, "postLogin"])->name("login");
Route::get("signup", [PagesController::class, "getSignUp"])->name("signup");
Route::post("signup", [PagesController::class, "postSignUp"])->name("signup");
Route::get("logout", [PagesController::class, "getLogOut"])->name("logout");
Route::get("search", [PagesController::class, "getSearch"])->name("search");

?>