<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('assets/users/img/'.Auth::user()->image)}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{Auth::user()->name}}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Danh mục</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{route('category.category')}}" class="dropdown-item">Danh sách danh mục</a>
                    <a href="{{route('category.create')}}" class="dropdown-item">Thêm mới danh mục</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Sản phẩm</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{route('product.product')}}" class="dropdown-item">Danh sách sản phẩm</a>
                    <a href="{{route('product.create')}}" class="dropdown-item">Thêm mới sản phẩm</a>
                </div>
            </div>
            <a href="{{route('invoice.invoice')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Hoá đơn</a>
        </div>
    </nav>
</div>