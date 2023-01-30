<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">
    
    <!-- Mobile Nav (max width 767px)-->
    @include('Home.Blocks.Mobile')

    <!-- Header Area Start -->
    @include('Home.Blocks.Header')
    <!-- Header Area End -->

    <!-- Product Catagories Area Start -->
    @yield('content')
    <!-- Product Catagories Area End -->
</div>
<!-- ##### Main Content Wrapper End ##### -->