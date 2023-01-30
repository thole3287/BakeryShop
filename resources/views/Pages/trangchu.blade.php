@extends("Layout.master")
@section("content")
<div class="rev-slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                        <!-- THE FIRST SLIDE -->
                        @foreach($slide as $sl)
                        <li data-transition="boxfade" data-slotamount="20" class="active-revslide"
                            style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined"
                                data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined"
                                data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                                data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined"
                                data-oheight="undefined">
                                <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover"
                                    data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined"
                                    src="resources/FrontEnd/image/slide/{{$sl->image}}"
                                    data-src="resources/FrontEnd/image/slide/{{$sl->image}}"
                                    style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('resources/FrontEnd/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                            </div>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!--slider-->
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($newProduct)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($newProduct as $new_Product)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($new_Product->promotion_price !=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('productdetail', $new_Product->id)}}"><img
                                                src="resources/FrontEnd/image/product/{{$new_Product->image}}" height="250" alt="Hình ảnh sản phẩm"></a>
                                    </div>
                                    <div class="single-item-body" >
                                        <a href="{{route('productdetail', $new_Product->id)}}" class="single-item-title">{{$new_Product->name}}</a>
                                        <p class="single-item-price" style="font-size: 15px; margin-bottom:5px;">
                                            @if($new_Product->promotion_price==0)
                                                <span class="flash-sale">{{number_format($new_Product->unit_price)}} đồng</span>
                                            @else
                                                <span class="flash-del">{{number_format($new_Product->unit_price)}} đồng</span>
                                                <span class="flash-sale">{{number_format($new_Product->promotion_price)}} đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('addtocart', $new_Product->id)}}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('productdetail', $new_Product->id)}}">Chi tiết sản phẩm<i
                                                class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{$newProduct->appends(['pagenormal'=> $promotionProduct->currentPage()])->links()}}</div>
                    </div> <!-- .beta-products-list -->

                   

                    <div class="beta-products-list">
                        <h4>Sản phẩm khuyến mãi</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($promotionProduct)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($promotionProduct as $promotion_Product)
                                <div class="col-sm-3 ">
                                    <div class="single-item ">
                                        @if($promotion_Product->promotion_price !=0)
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('productdetail', $promotion_Product->id)}}"><img
                                                    src="resources/FrontEnd/image/product/{{$promotion_Product->image}}" height="250" alt="Hình sản phẩm"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <a href="{{route('productdetail', $promotion_Product->id)}}" class="single-item-title">{{$promotion_Product->name}}</a>
                                            <p class="single-item-price" style="font-size: 15px; margin-bottom:5px;">
                                                @if($promotion_Product->promotion_price==0)
                                                    <span class="flash-sale">{{number_format($promotion_Product->unit_price)}} đồng</span>
                                                @else
                                                    <span class="flash-del">{{number_format($promotion_Product->unit_price)}} đồng</span>
                                                    <span class="flash-sale">{{number_format($promotion_Product->promotion_price)}} đồng</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption" style="margin-bottom: 7px;">
                                            <a class="add-to-cart pull-left" href="{{route('addtocart', $promotion_Product->id)}}"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('productdetail', $promotion_Product->id)}}">Chi tiết sản phẩm <i
                                                    class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">{{$promotionProduct->appends(['pagenew'=> $newProduct->currentPage()])->links()}}</div>
                        
                        <!-- <div class="row">
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="product.html"><img
                                                src="resources/FrontEnd/assets/dest/images/products/1.jpg" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">Sample Woman Top</p>
                                        <p class="single-item-price">
                                            <span>$34.55</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i
                                                class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>

                                    <div class="single-item-header">
                                        <a href="product.html"><img
                                                src="resources/FrontEnd/assets/dest/images/products/2.jpg" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">Sample Woman Top</p>
                                        <p class="single-item-price">
                                            <span class="flash-del">$34.55</span>
                                            <span class="flash-sale">$33.55</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i
                                                class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="product.html"><img
                                                src="resources/FrontEnd/assets/dest/images/products/3.jpg" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">Sample Woman Top</p>
                                        <p class="single-item-price">
                                            <span>$34.55</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i
                                                class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="product.html"><img
                                                src="resources/FrontEnd/assets/dest/images/products/3.jpg" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">Sample Woman Top</p>
                                        <p class="single-item-price">
                                            <span>$34.55</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i
                                                class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection