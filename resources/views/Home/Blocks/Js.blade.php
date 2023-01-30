<!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
<script src="{{asset('assets/home/js/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('assets/home/js/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('assets/home/js/bootstrap.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{asset('assets/home/js/plugins.js')}}"></script>
<!-- Active js -->
<script src="{{asset('assets/home/js/active.js')}}"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    $(".cart-item").on("click", ".create-cart", function() {
        $.ajax({
            url: 'http://127.0.0.1:8000/cart/create/'+$(this).data("id"),
            type: 'GET'
        }).done(function(response) {
            alertify.success('Thêm vào giỏ hàng thành công');
            location.reload();
        });
    });

    $(".cart-x").on("click", ".x-close", function(){
        $.ajax({
            url: 'http://127.0.0.1:8000/cart/destroy/'+$(this).data("id"),
            type: 'GET'
        }).done(function(response) {
            alertify.success('Xoá sản phẩm khỏi giỏ hàng thành công');
            location.reload();
        });
    });

    $(".quantity").on("click", ".qty-minus", function(){
        $.ajax({
            url: 'http://127.0.0.1:8000/cart/reduced/'+$(this).data("id"),
            type: 'GET'
        }).done(function(response) {
            location.reload();
        });
    });

    $(".quantity").on("click", ".qty-plus", function(){
        $.ajax({
            url: 'http://127.0.0.1:8000/cart/create/'+$(this).data("id"),
            type: 'GET'
        }).done(function(response) {
            location.reload();
        });
    });
</script>