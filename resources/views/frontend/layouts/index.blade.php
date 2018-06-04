<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title','Vật tư sản xuất')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('themes/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('themes/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('themes/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('themes/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('themes/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('themes/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
@yield('styles')
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	@yield('header')
	
	<!-- Banner -->

	@yield('banner')

	<!-- Content -->
	@yield('content')

	<!-- Deals of the week -->

	@yield('footer')

	<!-- Popular Categories -->

	<!-- Banner -->



	<!-- Hot New Arrivals -->


	<!-- Best Sellers -->


	<!-- Adverts -->

	

	<!-- Trends -->



	<!-- Reviews -->


	<!-- Recently Viewed -->


	<!-- Brands -->


	<!-- Newsletter -->


	<!-- Footer -->



	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('themes/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('themes/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('themes/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('themes/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('themes/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('themes/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('themes/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('themes/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('themes/plugins/slick-1.8.0/slick.js') }}"></script>
<script src="{{ asset('themes/plugins/easing/easing.js') }}"></script>
@yield('scripts')

</body>

</html>