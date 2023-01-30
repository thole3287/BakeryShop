@extends("Layout.master")
@section("content")
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$type->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('index')}}">Trang chủ</a> / <span>{{$type->name}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
                        <li style="text-align: center; font-weight:bold; background-color:#0277B8; color:white;border-radius: 30px;">MENU</li>
                            @foreach($categories as $category)
							<li style="text-align: center;"><a href="{{route('producttype', $category->id)}}">{{$category->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Danh sách sản phẩm thuộc loại {{$type->name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($productByType)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
                                @foreach($productByType as $product_ByType)
								<div class="col-sm-4">
									<div class="single-item">
                                        @if($product_ByType->promotion_price != 0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
										<div class="single-item-header">
											<a href="product.html"><img src="resources/FrontEnd/image/product/{{$product_ByType->image}}" height="250" alt="Hình ảnh sản phẩm theo loại"></a>
										</div>
										<div class="single-item-body">
                                            <p class="single-item-title">{{$product_ByType->name}}</p>
											<p class="single-item-price" style="font-size: 15px; margin-bottom:5px;">
                                            @if($product_ByType->promotion_price==0)
                                                <span class="flash-sale"> {{number_format($product_ByType->unit_price)}} đồng</span>
                                            @else
                                                <span class="flash-del" style="font-style: italic;">{{number_format($product_ByType->unit_price)}} đồng</span>
                                                <span class="flash-sale">{{number_format($product_ByType->promotion_price)}} đồng</span>
                                            @endif
											</p>
										</div>
										<div class="single-item-caption"  style="margin-bottom: 7px;">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('productdetail', $product_ByType->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
                                @endforeach
								
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($otherProducts)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
                                @foreach($otherProducts as $other_Products)
                                    <div class="col-sm-4">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="product.html"><img src="resources/FrontEnd/image/product/{{$other_Products->image}}" height="250" alt="Hình ảnh sản phẩm"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$other_Products->name}}</p>
                                                <p class="single-item-price" style="font-size: 15px; margin-bottom:5px;">
                                                @if($other_Products->promotion_price==0)
                                                    <span class="flash-sale">{{number_format($other_Products->unit_price)}} đồng</span>
                                                @else
                                                    <span class="flash-del" style="font-style: italic;">{{number_format($other_Products->unit_price)}} đồng</span>
                                                    <span class="flash-sale">{{number_format($other_Products->promotion_price)}} đồng</span>
                                                @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption"  style="margin-bottom: 7px;">
                                                <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{route('productdetail', $other_Products->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
								@endforeach
							</div>
                            <div class="row">{{$otherProducts->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection