<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>
        @yield('title')
    </title>
     
    @include('admin.layouts.head')
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        
        @include('admin.layouts.slibar')
        <div class="content">
            
            <!-- Navbar Start -->
            @include('admin.layouts.header')
            <!-- Navbar End -->
            @yield('content')            
            <!-- Footer Start -->
            @include('admin.layouts.footer')

            <!-- Footer End -->
        </div>
        <!-- Content End -->
        
        
    </div>

    @include('admin.layouts.script')
</body>

</html>