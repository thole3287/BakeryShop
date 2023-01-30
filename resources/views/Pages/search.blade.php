@extends("Layout.master")
@section("content")
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Tìm kiếm sản phẩm</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($product as $products)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($products->promotion_price !=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('productdetail', $products->id)}}"><img
                                                src="resources/FrontEnd/image/product/{{$products->image}}" height="250" alt="Hình ảnh sản phẩm"></a>
                                    </div>
                                    <div class="single-item-body" style="font-size: 15px; margin-bottom:5px;">
                                        <a href="{{route('productdetail', $products->id)}}" class="single-item-title">{{$products->name}}</a>
                                        <p class="single-item-price" style="font-size: 15px; margin-bottom:5px;">
                                            @if($products->promotion_price==0)
                                                <span class="flash-sale">{{number_format($products->unit_price)}} đồng</span>
                                            @else
                                                <span class="flash-del">{{number_format($products->unit_price)}} đồng</span>
                                                <span class="flash-sale">{{number_format($products->promotion_price)}} đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption" style="margin-bottom: 7px;">
                                        <a class="add-to-cart pull-left" href="{{route('addtocart', $products->id)}}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('productdetail', $products->id)}}">Chi tiết sản phẩm<i
                                                class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                       
                    </div> <!-- .beta-products-list -->

                   

                   
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection