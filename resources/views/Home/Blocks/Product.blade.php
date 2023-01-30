<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">
        <!-- Single Catagory -->
        @if(!empty($products))
            @foreach($products as $k=>$item)
                <div class="single-products-catagory clearfix">
                    <a href="{{route('home.product', ['slugCT'=>$item->category->slug, 'slugPD'=>$item->slug])}}">
                        <img src="{{asset('assets/layout/img/product/'.$item->image)}}" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>{{number_format($item->price_sale)}} VND</p>
                            <h4>{{$item->name}}</h4>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <h3>Không có sản phẩm nào</h3>
        @endif
    </div>
</div>