@include('Admin.Blocks.Head');

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        @include('Admin.Blocks.Spinner')
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ADMIN</h3>
                            </a>
                            <h3>Đăng nhập</h3>
                        </div>

                        @if(session('msg'))
                        <div class="alert alert-warning" role="alert">
                            {{session('msg')}}
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-warning" role="alert">
                            Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại!
                        </div>
                        @endif

                        <form action="" method="post">
                            @csrf()
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="{{old('email')}}">
                                <label for="floatingInput">Email address</label>
                            </div>

                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror

                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" value="{{old('password')}}">
                                <label for="floatingPassword">Password</label>
                            </div>

                            @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <a href="">Forgot Password</a>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    @include('Admin.Blocks.JavaScript');
</body>

</html>