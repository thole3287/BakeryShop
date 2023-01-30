@extends("Layout.master")
@section("content")
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">{{$productsDetail->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('index')}}">Trang chủ</a> / <span>Chi tiết sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="resources/FrontEnd/image/product/{{$productsDetail->image}}" alt="Hình sản phẩm">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title" style="font-size: 25px;">{{$productsDetail->name}}</p>
                            <div class="space10">&nbsp;</div>
                            <p class="single-item-price" >
                                @if($productsDetail->promotion_price==0)
                                    <span class="flash-sale">{{number_format($productsDetail->unit_price)}} đồng</span>
                                @else
                                    <span class="flash-del" style="font-style: italic;">{{number_format($productsDetail->unit_price)}} đồng</span>
                                    <span class="flash-sale">{{number_format($productsDetail->promotion_price)}} đồng</span>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{!! $productsDetail->description !!}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Options:</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="size">
                                <option value="Cái"{{$productsDetail->unit=="cái"? "selected" : ""}} >Cái</option>
                                <option value="Hộp"{{$productsDetail->unit=="hộp"? "selected" : ""}} >Hộp</option>
                            </select>
                           
                            <a class="add-to-cart pull-left" href="{{route('addtocart',$productsDetail->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            
                            <!-- <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a> -->
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Description</a></li>
                        <li><a href="#tab-reviews">Reviews (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{!! $productsDetail->description !!}</p>
                        
                    </div>
                    <div class="panel" id="tab-reviews">
                        <!-- <p>No Reviews</p> -->
                        <p><div class="well">
                            <h6>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h6>
                            <form role="form" action="#" method="post">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="noidung"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </form>
                        </div></p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản phẩm tương tự</h4>
                    <div class="space10">&nbsp;</div>
                    <div class="row">
                        @foreach($similarProducts as $similar_Products)
                        <div class="col-sm-4">
                            <div class="single-item">
                                <div class="single-item-header">
                                    <a href="{{route('productdetail', $similar_Products->id )}}"><img src="resources/FrontEnd/image/product/{{$similar_Products->image}}" height="250" alt="Hình ảnh sản phẩm"></a>
                                </div>
                                <div class="single-item-body">
                                    <a href="{{route('productdetail', $similar_Products->id )}}" class="single-item-title">{{$similar_Products->name}}</a>
                                    <p class="single-item-price"  style="font-size: 15px; margin-bottom:5px;">
                                        @if($similar_Products->promotion_price==0)
                                            <span class="flash-sale">{{number_format($similar_Products->unit_price)}} đồng</span>
                                        @else
                                            <span class="flash-del" style="font-style: italic;">{{number_format($similar_Products->unit_price)}} đồng</span>
                                            <span class="flash-sale">{{number_format($similar_Products->promotion_price)}} đồng</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{route('addtocart',$similar_Products->id)}}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('productdetail', $similar_Products->id )}}">Chi tiết sản phẩm <i
                                            class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm bán chạy</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($sellingProducts as $selling_Products)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('productdetail', $selling_Products->product->id )}}"><img
                                        src="resources/FrontEnd/image/product/{{$selling_Products->product->image}}" alt="Hình ảnh"></a>
                                <div class="media-body">
                                    <a href="{{route('productdetail', $selling_Products->product->id )}}">{{$selling_Products->product->name}}</a>
                                        @if($selling_Products->product->promotion_price==0)
                                            <span class="flash-sale">{{number_format($selling_Products->product->unit_price)}} đồng</span>
                                        @else
                                            <span class="flash-del" style="font-style: italic;">{{number_format($selling_Products->product->unit_price)}} đồng</span> <br>
                                            <span class="flash-sale">{{number_format($selling_Products->product->promotion_price)}} đồng</span>
                                        @endif
                                    <!-- <span class="beta-sales-price">$34.55</span> -->
                                </div>
                            </div>    
                            @endforeach 
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($newProducts as $new_Products)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('productdetail', $new_Products->id )}}"><img
                                        src="resources/FrontEnd/image/product/{{$new_Products->image}}" alt=""></a>
                                <div class="media-body">
                                   <a href="{{route('productdetail', $new_Products->id )}}">{{$new_Products->name}}</a> 
                                    <!-- <span class="beta-sales-price">$34.55</span> -->
                                    @if( $new_Products->promotion_price==0)
                                        <span class="flash-sale">{{number_format( $new_Products->unit_price)}} đồng</span>
                                    @else
                                        <span class="flash-del" style="font-style: italic;">{{number_format( $new_Products->unit_price)}} đồng</span> <br>
                                        <span class="flash-sale">{{number_format( $new_Products->promotion_price)}} đồng</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection