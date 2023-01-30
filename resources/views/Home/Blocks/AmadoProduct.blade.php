<div class="amado_product_area section-padding-100">
    <div class="container-fluid">

        <div class="row">

            <!-- Single Product Area -->
            @if(!empty($products))
                @foreach($products as $k=>$item)
                <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{asset('assets/layout/img/product/'.$item->image)}}" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="" alt="">
                        </div>

                        <!-- Product Description -->
                        <div class="product-description d-flex align-items-center justify-content-between">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">{{number_format($item->price_sale)}} VND</p>
                                <a href="{{route('home.product', ['slugCT'=>$item->category->slug, 'slugPD'=>$item->slug])}}">
                                    <h6>{{$item->name}}</h6>
                                </a>
                            </div>
                            <!-- Ratings & Cart -->
                            <div class="ratings-cart text-right">
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="cart cart-item">
                                    <a href="javascript:" data-toggle="tooltip" data-placement="left" title="Thêm vào giỏ hàng" class="create-cart" data-id="{{$item->id}}"><img src="{{asset('assets/home/img/core-img/cart.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <h3>Không có sản phẩm nào</h3>
            @endif
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Pagination -->
                @if(!empty($products) && count($products) > 6)
                    {{$products->links('Home.Blocks.Paginate')}}
                @endif
            </div>
        </div>
    </div>
</div>