@include('Admin.Blocks.Head');

<body>
    <!-- Spinner Start -->
    @include('Admin.Blocks.Spinner')
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    @include('Admin.Blocks.Sidebar')
    <!-- Sidebar End -->

    <!-- Content Start -->
    @include('Admin.Blocks.Content')
    <!-- Content End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    @include('Admin.Blocks.JavaScript')
</body>