<!-- Product Details Area Start -->
<div class="single-product-area section-padding-100 clearfix">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-50">
                        <li class="breadcrumb-item"><a href="{{route('home.home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{route('home.category')}}">Danh mục</a></li>
                        <li class="breadcrumb-item"><a href="{{route('home.category-slug', ['slug'=>$categorySlug->slug])}}">{{$categorySlug->name}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$productSlug->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="single_product_thumb">
                    <img src="{{asset('assets/layout/img/product/'.$productSlug->image)}}" alt="">
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="single_product_desc">
                    <!-- Product Meta Data -->
                    <div class="product-meta-data">
                        <div class="line"></div>
                        <p class="product-price">{{number_format($productSlug->price_sale)}} VND</p>
                        <div>
                            <h1>{{$productSlug->name}}</h1>
                        </div>
                        <!-- Ratings & Review -->
                        <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                    <div class="short_overview my-5">
                        <p>{{$productSlug->description}}</p>
                    </div>

                    <!-- Add to Cart Form -->
                    <div class="cart clearfix cart-item">
                        <a href="javascript:" data-id="{{$productSlug->id}}" name="addtocart" value="5" class="btn amado-btn create-cart" style="color: white;">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="border-top: 2px solid;">
        <h1 class="text-center">MÔ TẢ SẢN PHẨM</h1>
        <div class="" style="margin-top: 30px;">
            {!! $productSlug->content !!}
        </div>
    </div>
</div>
<!-- Product Details Area End -->