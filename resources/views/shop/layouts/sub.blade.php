<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>        @yield('title')
    </title>
    @include('shop.layouts.head')

</head><!--/head-->

<body>
    @include('shop.layouts.header')
	

	<section>
		<div class="container">
			<div class="row">
				@include('shop.layouts.slibar')
				@yield('content')  
				
			</div>
		</div>
	</section>
	
	
	@include('shop.layouts.footer')
    @include('shop.layouts.script')

</body>
</html>