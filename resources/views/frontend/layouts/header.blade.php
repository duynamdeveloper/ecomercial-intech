<header class="header">
	<!-- Top bar -->
	<div class="top-bar hidden-xs-up">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-row">
					<div class="top_bar_contact_item">
						<div class="top_bar_icon">
							<img src="{{ asset('images/phone.png') }}">
						</div>
						+0968 650 059
					</div>
					<div class="top_bar_contact_item">
						<div class="top_bar_icon">
							<img src="{{ asset('images/mail.png') }}">
						</div>
						<a href="mailto:info@vattusanxuat.net">info@vattusanxuat.net</a>
					</div>
					<div class="top_bar_content ml-auto">
						<div class="top_bar_user"></div>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<!-- End Top bar -->
	{{-- Header Main --}}
	<div class="header_main">
		<div class="container">
			<div class="row">
				{{-- Logo --}}
				<div class="col-lg-2 col-sm-3 col-3 order-1">
					<div class="logo_container">
						<div class="logo">
							<a href="#">
								<img src="{{ asset('images/logo.png') }}">
							</a>
						</div>
					</div>
				</div>
				{{-- Search --}}
				<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
					<div class="header_search">
						<div class="header_search_content">
							<div class="header_search_form_container">
								<form action="#" class="header_search_form clearfix">
									<input type="search" name="" class="header_search_input" placeholder="Tìm kiếm sản phẩm">
									<button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
								</form>
							</div>
						</div>
					</div>
				</div>
				{{-- Shopping Cart --}}
				<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
					<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
						<div class="cart">
							<div class="cart_container d-flex flex-row align-items-center justify-content-end">
								<div class="cart_icon">
									<img src="{{ asset('images/cart.png') }}">
									<div class="cart_count">
										<span>10</span>
									</div>
								</div>
								
								<div class="cart_content">
									<div class="cart_text">
										<a href="#">Giỏ hàng</a>
									</div>
									<div class="cart_price">
										155585đ
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- Main Navigation --}}
	<div class="main_nav">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="main_nav_content d-flex flex-row">
						<div class="cat_menu_container">
							<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
								<div class="cat_bugger">
									<span></span>
									<span></span>
									<span></span>
								</div>
								<div class="cat_menu_text">
									Danh mục sản phẩm
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</header>
