<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="{{route('home.home')}}"><img src="{{asset('assets/home/img/core-img/logo.png')}}" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li
            @if($title == 'Trang chủ')
                class="active"
            @endif
            >
                <a href="{{route('home.home')}}">Trang chủ</a>
            </li>
            <li
            @if(!empty($categorys))
                @foreach($categorys as $k=>$item)
                    @if($title == 'Danh mục sản phẩm' or $title == $item->name)
                        class="active"
                    @endif
                @endforeach
            @endif
            >
                <a href="{{route('home.category')}}">Danh mục sản phẩm</a>
            </li>
            <li
                @if($title == 'Giỏ hàng')
                    class="active"
                @endif
            >
                <a href="{{route('home.cart.cart')}}" class="cart-nav"> 
                    Giỏ hàng 
                    <span>
                        (
                            @if(Session::has("Cart") != null)
                                {{count(Session::get('Cart')->products)}}
                            @else
                                0
                            @endif
                        )
                    </span>
                </a>
            </li>
            <li
                @if($title == 'Thanh toán')
                    class="active"
                @endif
            >
                <a href="{{route('home.checkout.checkout')}}">Thanh toán</a>
            </li>
        </ul>
    </nav>
    <!-- Cart Menu -->
    <div class="cart-fav-search mb-100">
        <a href="#" class="search-nav"><img src="{{asset('assets/home/img/core-img/search.png')}}" alt=""> Tìm kiếm</a>
    </div>
</header>