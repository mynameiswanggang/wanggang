<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title><?php echo ($siteTitle); ?></title>

<!-- Main style -->
<link rel="stylesheet" href="<?php echo (CSS_URL); ?>main.css" type="text/css" />

<!-- Fancybox style -->
<link rel="stylesheet" href="<?php echo (FANCYBOX_URL); ?>fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

<!-- Product slider style -->
<link rel="stylesheet" href="<?php echo (CSS_URL); ?>product-slider.css" type="text/css" />

<!-- Style for the superfish navigation menu -->
<link rel="stylesheet" href="<?php echo (SUPERFISH_URL); ?>superfish.css" type="text/css" media="screen" />

<!-- Promo slider style -->
<link rel="stylesheet" href="<?php echo (CSS_URL); ?>megamenu.css" type="text/css" /> 

<!-- Style for Megamenu -->
<link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>scrollable-navig.css">


<!-- JS for jQuery -->
<script type="text/javascript" src="<?php echo (JS_URL); ?>jquery-1.11.1.min.js"></script>

<!-- JS for jQuery Product slider -->
<script type="text/javascript" src="<?php echo (JS_URL); ?>jquery.tools.min.js"></script>

<!-- JS for jQuery Border effect -->
<script type="text/javascript" src="<?php echo (JS_URL); ?>jquery.insetBorderEffect.js"></script>

<!-- JS for jQuery Fancy Box -->
<script type="text/javascript" src="<?php echo (FANCYBOX_URL); ?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>

<!-- JS for superfish navigation menu -->
<script type="text/javascript" src="<?php echo (SUPERFISH_URL); ?>hoverIntent.js"></script> 
<script type="text/javascript" src="<?php echo (SUPERFISH_URL); ?>superfish.js"></script> 

</head>
<body>
	
<div id="container">

	<div id="header-top">
		<p>
			 <?php echo ($siteWelcome); ?> <a style="float:right;color:#e2a4c1;text-decoration:underline; margin-right:10px;" href="javascript:$.get('/index.php/Home/Homepage/switchLang',{},function(res){if(res)location.reload();},'json');"><?php echo ($lang); ?></a>
		</p>
	</div>
	
	<div class="header-main">
		<div class="logo">
			<a href="index.html" name="top"><img src="<?php echo (IMG_URL); ?>logo.png" alt="logo" border="0"/></a>
		</div>
		
		<div class="login-block">
			<span class="account"><a href="<?php echo ($signInOutUrl); ?>" class="account"><?php echo ($signInOut); ?></a></span> <span class="cart"><a href="cart.html" class="cart"><?php echo ($mycart); ?></a></span>
		</div>
	</div>
	
	<div id="navigation">
		
		<div class="search-container">
			<div class="search-inner">	
				<input type="text" value="<?php echo ($search); ?>" onfocus="if(this.value=='<?php echo ($search); ?>'){this.value=''};" onblur="if(this.value==''){this.value='<?php echo ($search); ?>'};" class="search-field"/>
				<input type="submit" id="s_submit" value="" class="search-btn"/>
			</div>
		</div>
		<div class="navigation-inner">
			<div class="flare"></div>
			<div class="home-icon">
				<a href="index.html"><img src="<?php echo (IMG_URL); ?>home_icon.png" border="0"/></a>
			</div>
			<!-- Navigation start -->
			<ul class="sf-menu">
			<!-- å¾ªçŽ¯å‡ºé¡¶éƒ¨èœå• å¼€å§‹-->
			<?php if(is_array($topMenu)): foreach($topMenu as $key=>$sub): ?><li class="nav-item"><a href="#"><?php echo L($key);?></a>
					<?php if((empty($sub)) != "false"): ?><ul>
							<?php if(is_array($sub)): foreach($sub as $key=>$url): ?><li class="sfish-navgiation-item">
								<a href="<?php echo U($url);?>"><?php echo L($key);?></a>
								</li><?php endforeach; endif; ?>
						</ul><?php endif; ?>
				</li><?php endforeach; endif; ?>
			<!-- å¾ªçŽ¯é¡¶éƒ¨èœå•ç»“æŸ -->
<!-- 				<li class="nav-item"><a href="#">Pages</a>
					<ul>
						<li class="sfish-navgiation-item">
							<a href="price_compare.html">Price Compare Table</a>
						</li>
						<li class="sfish-navgiation-item">
							<a href="faq.html">FAQ</a>
						</li>
						<li class="sfish-navgiation-item">
							<a href="cart.html">Shopping Cart</a>
						</li>
						<li class="sfish-navgiation-item">
							<a href="right_sidebar.html">Right Sidebar</a>
						</li>
					</ul>
				</li>
				<li class="nav-item"><a href="grid.html">Online Store</a>
					<ul>
						<li class="sfish-navgiation-item">
							<a href="grid.html">Product Listing as Grid</a>
						</li>
						<li class="sfish-navgiation-item">
							<a href="list.html">Product Listing as List</a>
						</li>
						<li class="sfish-navgiation-item last">
							<a href="details.html">Product Details</a>
						</li>
					</ul>	
				</li>
				<li class="nav-item"><a href="blog.html">Blog</a></li>
				<li class="nav-item"><a href="#">Shortcodes</a>
					<ul>
						<li class="sfish-navgiation-item">
							<a href="shortcodes_buttons.html">Buttons and Links</a>
						</li>
						<li class="sfish-navgiation-item">
							<a href="shortcodes_columns.html">Columns</a>
						</li>
						<li class="sfish-navgiation-item last">
							<a href="shortcodes_tabs.html">Tabs and Accordions</a>
						</li>
					</ul>	
				</li>
				<li class="nav-item"><a href="#">Portfolio</a>
					<ul>
						<li class="sfish-navgiation-item">
							<a href="portfolio_2columns.html">Two Columns Layout</a>
						</li>
						<li class="sfish-navgiation-item">
							<a href="portfolio_3columns.html">Three Columns Layout</a>
						</li>
						<li class="sfish-navgiation-item last">
							<a href="portfolio_4columns.html">Four Columns Layout</a>
						</li>
					</ul>
				</li>
				<li class="nav-item"><a href="contacts.html">Contacts</a></li> -->
			</ul>
			<!-- Navigation end -->
<!-- 			
			Megamenu Begin
			<ul id="ldd_menu" class="ldd_menu">
				<li>
					<span>Mega Menu</span>Increases to 510px in width
					<div class="ldd_submenu">
						<div class="mega-menu-text float-left">
							<h4>What is Mega Menu?</h4>
							Mega menu is a next step of the js based dropdown. It's similar to a normal menu in terms of general behaviour, but enriched with more options, multiple links, complex navigation, form elements like login, search and much more.
						</div>
						<div class="mega-menu-text float-right">
							<h4>Example</h4>
							<p class="newsletter">
								<input type="text" class="megamenu-field" onblur="if(this.value==''){this.value='Enter your e-mail...'};" onfocus="if(this.value=='Enter your e-mail...'){this.value=''};" value="Enter your e-mail...">
							</p>
							<p class="newsletter">
								<input type="text" class="megamenu-field" onblur="if(this.value==''){this.value='Enter your name...'};" onfocus="if(this.value=='Enter your name...'){this.value=''};" value="Enter your name...">
							</p>
						</div><br class="clear"/>
						<div class="mega-menu-text float-left">
							<h4>Why do I need it?</h4>
							Because you can create much more interesting and complex navigation systems, grouping links, improve the UI, improve the user's workflow while filling forms, signing in etc.
						</div>
						<div class="mega-menu-text float-right">
							<h4>Another example</h4>
							<img src="<?php echo (IMG_URL); ?>slide_small1.jpg">
							<img src="<?php echo (IMG_URL); ?>slide_small3.jpg">
							<img src="<?php echo (IMG_URL); ?>slide_small2.jpg">
						</div>
					</div>
				</li>
			</ul>
			Megamenu End -->
			
		</div>
	</div>
	<div id="content">
		<div class="sales-label">
		</div>
		
		<!-- Promo Begin -->
		<div class="promo-inner" id="promo">
		
			<!-- main navigator -->
			
			<ul id="main_navi">
			
				<li class="first">
					<img src="<?php echo (IMG_URL); ?>slide_small1.jpg">
					<span class="title">What Is My Color</span>
					Lorem ipsum dolor sit amet
				</li>
				<li class="">
					<img src="<?php echo (IMG_URL); ?>slide_small2.jpg">
					<span class="title">Full Set Of Features</span>
					Nulla sit amet nunc non nibh faucibus
				</li>
				<li class="active">
					<img src="<?php echo (IMG_URL); ?>slide_small3.jpg">
					<span class="title">Dreams In Purple</span>
					Phasellus elefend, enim non euismod lacinia
				</li>
				<li class="last">
					<img src="<?php echo (IMG_URL); ?>slide_small4.jpg">
					<span class="title">Red For Passion</span>
					Class aptent taciti sociosqu it litora
				</li>
			</ul>
			
			<!-- root element for the main scrollable -->
			<div id="main">
			
				<!-- root element for pages -->
				<div style="top: -940px;" id="pages">
			
					<!-- page #1 -->
					<div class="page">
			
						<!-- sub navigator #1 -->
						<div class="navi"><a class="nivo-control active"></a><a></a><a></a></div>
			
						<!-- inner scrollable #1 -->
						<div class="scrollable">
			
							<!-- root element for scrollable items -->
							<div class="items">
			
								<!-- items  -->
								<div class="item">
									<img src="<?php echo (IMG_URL); ?>promo1.jpg">
								</div>
								<div class="item">
									<img src="<?php echo (IMG_URL); ?>promo4.jpg">
								</div>
								<div class="item">
									<img src="<?php echo (IMG_URL); ?>promo5.jpg">
								</div>
			
								</div>
			
						</div>
			
					</div>
			
					<!-- page #2 -->
					<div class="page">
			
						<div class="navi"><a class="active"></a><a></a><a></a></div>
			
						<!-- inner scrollable #2 -->
						<div class="scrollable">
			
							<!-- root element for scrollable items -->
							<div class="items">
			
								<!-- items on the second page -->
							<div class="item">
									<img src="<?php echo (IMG_URL); ?>promo2.jpg">
								</div>
								<div class="item">
									<img src="<?php echo (IMG_URL); ?>promo4.jpg">
								</div>
								<div class="item">
									<img src="<?php echo (IMG_URL); ?>promo5.jpg">
								</div>
			
							</div>
			
						</div>
			
					</div>
					
					<!-- page #3 -->
					<div class="page">
			
						<div class="navi"><a class="active"></a><a></a><a></a></div>
			
						<!-- inner scrollable #2 -->
						<div class="scrollable">
			
							<!-- root element for scrollable items -->
							<div class="items">
			
								<!-- items on the second page -->
								<div class="item">
									<img src="<?php echo (IMG_URL); ?>promo4.jpg">
								</div>
								<div class="item">
									<img src="<?php echo (IMG_URL); ?>promo2.jpg">
								</div>
								<div class="item">
									<img src="<?php echo (IMG_URL); ?>promo5.jpg">
								</div>
			
							</div>
			
						</div>
			
					</div>
			
					<!-- page #4 -->
					<div class="page">
			
						<div class="navi"><a class="active"></a><a></a><a></a></div>
			
						<!-- inner scrollable #3 -->
						<div class="scrollable">
			
							<!-- root element for scrollable items -->
							<div class="items">
			
								<!-- items on the first page -->
							<div class="item">
									<img src="<?php echo (IMG_URL); ?>promo3.jpg">
								</div>
								<div class="item">
									<img src="<?php echo (IMG_URL); ?>promo4.jpg">
								</div>
								<div class="item">
									<img src="<?php echo (IMG_URL); ?>promo5.jpg">
								</div>
			
							</div>
			
						</div>
			
					</div>
					<!-- End page 4 -->
					
				</div>
			
			</div>

		</div>
		<!-- End Promo -->

		<div class="shadow"></div>
		<!-- Promo End -->
		
		<!-- Message Begin -->
		
		<div class="message">
			Welcome to this great and sophisticated e-shop. We have prepared an enormous set of features for you!
		</div>
		
		<!-- Message End -->
		
		<!-- Bestsellers Begin -->
		<div class="content-top">
		</div>
		
		<div class="content-inner home">
			
			<div id="slider-container">
				
			<div class="slider-nav">
				<a class="prev2"></a>
				<a class="next2"></a>
			</div>

				<div class="slider">   
					
				   <!-- Listing of the elements of the slider -->
				   <div class="items">
				   
					  <!-- 1-4 -->
					  <div class="group-items">
						 <div class="single-item">
							<span class="title"><a href="details.html">Great New Perfume for Her</a></span>
							<span class="price">$149.90</span>
							<img src="<?php echo (IMG_URL); ?>product1.png" alt="Item"/>
							<a href="#" class="general-button float-left"><span class="button">Add to cart</span></a>
							<span class="list-link">
								<a href="details.html" class="regular">View more...</a>
							</span>
							<br class="clear"/>
						</div>
						
						<div class="single-item">
							<span class="title"><a href="details.html">Aroma Accattivante</a></span>
							<span class="price">$29</span>
							<img src="<?php echo (IMG_URL); ?>product2.png" alt="Item"/>
							<a href="#" class="general-button float-left"><span class="button">Add to cart</span></a>
							<span class="list-link">
								<a href="details.html" class="regular">View more...</a>
							</span>
							<br class="clear"/>
						</div>
						
						<div class="single-item">
							<span class="title"><a href="details.html">Delight in Orange and Yellow</a></span>
							<span class="price">$23</span>
							<img src="<?php echo (IMG_URL); ?>product3.png" alt="Item"/>
							<a href="#" class="general-button float-left"><span class="button">Add to cart</span></a>
							<span class="list-link">
								<a href="details.html" class="regular">View more...</a>
							</span>
							<br class="clear"/>
						</div>
						
						<div class="single-item">
							<span class="title"><a href="details.html">Kiss in the Rain</a></span>
							<span class="price">$129.90</span>
							<img src="<?php echo (IMG_URL); ?>product5.png" alt="Item"/>
							<a href="#" class="general-button float-left"><span class="button">Add to cart</span></a>
							<span class="list-link">
								<a href="details.html" class="regular">View more...</a>
							</span>
							<br class="clear"/>
						</div>
					  </div>
					  
					  <!-- 4-8 -->
					  <div class="group-items">
						 <div class="single-item">
							<span class="title"><a href="details.html">Aroma Dolce</a></span>
							<span class="price">$149.90</span>
							<img src="<?php echo (IMG_URL); ?>product4.png" alt="Item"/>
							<a href="#" class="general-button float-left"><span class="button">Add to cart</span></a>
							<span class="list-link">
								<a href="details.html" class="regular">View more...</a>
							</span>
							<br class="clear"/>
						</div>
						
						<div class="single-item">
							<span class="title"><a href="details.html">Wind of Spring</a></span>
							<span class="price">$29</span>
							<img src="<?php echo (IMG_URL); ?>product2.png" alt="Item"/>
							<a href="#" class="general-button float-left"><span class="button">Add to cart</span></a>
							<span class="list-link">
								<a href="details.html" class="regular">View more...</a>
							</span>
							<br class="clear"/>
						</div>
						
						<div class="single-item">
							<span class="title"><a href="details.html">Great New Perfume for Her</a></span>
							<span class="price">$23</span>
							<img src="<?php echo (IMG_URL); ?>product6.png" alt="Item"/>
							<a href="#" class="general-button float-left"><span class="button">Add to cart</span></a>
							<span class="list-link">
								<a href="details.html" class="regular">View more...</a>
							</span>
							<br class="clear"/>
						</div>
						
						<div class="single-item">
							<span class="title"><a href="details.html">Delight in Orange and Yellow</a></span>
							<span class="price">$129.90</span>
							<img src="<?php echo (IMG_URL); ?>product3.png" alt="Item"/>
							<a href="#" class="general-button float-left"><span class="button">Add to cart</span></a>
							<span class="list-link">
								<a href="details.html" class="regular">View more...</a>
							</span>
							<br class="clear"/>
						</div>
					  </div>
					  
				   </div>
				   
				   <!-- End -->
				   
				</div>

				<br class="clear"/>
			</div>

		</div>
		<div class="shadow"></div>
		<!-- Bestsellers End -->
		
		<div class="content-top blog-home"></div>
		<div class="content-inner home">
			
			<!-- Gallery Begin -->
			<div class="one-half float-left">
				<h3>Browse Our Gallery</h3>
				
				<a href="<?php echo (IMG_URL); ?>big01.jpg" rel="group4" class="grouped-elements" title="Lorem ipsum dolor sit amet, consecteur adipsing elit. Phasellus elefend, enim non euismod lacinia, urna odio convallis urna, eu comodo mi risus non orci.">
					<img border="0" alt="" src="<?php echo (IMG_URL); ?>01.jpg" class="portfolio-image">
					<span class="imagehover"></span>
				</a>
				<a href="<?php echo (IMG_URL); ?>big02.jpg" rel="group4" class="grouped-elements" title="Lorem ipsum dolor sit amet, consecteur adipsing elit. Phasellus elefend, enim non euismod lacinia, urna odio convallis urna, eu comodo mi risus non orci.">
					<img border="0" alt="" src="<?php echo (IMG_URL); ?>02.jpg" class="portfolio-image">
					<span class="imagehover"></span>
				</a>
				<a href="<?php echo (IMG_URL); ?>big03.jpg" rel="group4" class="grouped-elements" title="Lorem ipsum dolor sit amet, consecteur adipsing elit. Phasellus elefend, enim non euismod lacinia, urna odio convallis urna, eu comodo mi risus non orci.">
					<img border="0" alt="" src="<?php echo (IMG_URL); ?>03.jpg" class="portfolio-image">
					<span class="imagehover"></span>
				</a>
				<a href="<?php echo (IMG_URL); ?>big04.jpg" rel="group4" class="grouped-elements" title="Lorem ipsum dolor sit amet, consecteur adipsing elit. Phasellus elefend, enim non euismod lacinia, urna odio convallis urna, eu comodo mi risus non orci.">
					<img border="0" alt="" src="<?php echo (IMG_URL); ?>04.jpg" class="portfolio-image">
					<span class="imagehover"></span>
				</a>
				<a href="<?php echo (IMG_URL); ?>big05.jpg" rel="group4" class="grouped-elements" title="Lorem ipsum dolor sit amet, consecteur adipsing elit. Phasellus elefend, enim non euismod lacinia, urna odio convallis urna, eu comodo mi risus non orci.">
					<img border="0" alt="" src="<?php echo (IMG_URL); ?>05.jpg" class="portfolio-image">
					<span class="imagehover"></span>
				</a>
				<a href="<?php echo (IMG_URL); ?>big06.jpg" rel="group4" class="grouped-elements" title="Lorem ipsum dolor sit amet, consecteur adipsing elit. Phasellus elefend, enim non euismod lacinia, urna odio convallis urna, eu comodo mi risus non orci.">
					<img border="0" alt="" src="<?php echo (IMG_URL); ?>06.jpg" class="portfolio-image">
					<span class="imagehover"></span>
				</a>
				<a href="<?php echo (IMG_URL); ?>big03.jpg" rel="group4" class="grouped-elements" title="Lorem ipsum dolor sit amet, consecteur adipsing elit. Phasellus elefend, enim non euismod lacinia, urna odio convallis urna, eu comodo mi risus non orci.">
					<img border="0" alt="" src="<?php echo (IMG_URL); ?>03.jpg" class="portfolio-image">
					<span class="imagehover"></span>
				</a>
				<a href="<?php echo (IMG_URL); ?>big01.jpg" rel="group4" class="grouped-elements" title="Lorem ipsum dolor sit amet, consecteur adipsing elit. Phasellus elefend, enim non euismod lacinia, urna odio convallis urna, eu comodo mi risus non orci.">
					<img border="0" alt="" src="<?php echo (IMG_URL); ?>01.jpg" class="portfolio-image">
					<span class="imagehover"></span>
				</a>
				<a href="<?php echo (IMG_URL); ?>big04.jpg" rel="group4" class="grouped-elements" title="Lorem ipsum dolor sit amet, consecteur adipsing elit. Phasellus elefend, enim non euismod lacinia, urna odio convallis urna, eu comodo mi risus non orci.">
					<img border="0" alt="" src="<?php echo (IMG_URL); ?>04.jpg" class="portfolio-image">
					<span class="imagehover"></span>
				</a>
			</div>
			<!-- Gallery End -->
			
			<!-- Recent Posts Begin -->
			<div class="one-half float-right">
				<h3>Latest News or Blog Posts</h3>
				
				<div class="blog-post-home-title">
					<div class="blog-home-date float-left">
						<div class="date-number">23<br/>Feb</div>
					</div>
					<div class="blog-post-home-title-inner">
						<a href="blog_single.html" class="title">Lorem ipsum dolor sit amet, consectetur elit. Nulla sit amet nunc non nibh faucibus dictum.</a>
					</div>
				</div>
				
				<p class="post-content">
				Lorem ipsum dolor sit amet, consecteur adipsing elit. Phasellus elefend, enim non euismod lacinia, urna odio convallis urna, eu comodo mi risus non orci. Nullam eu sapien ipsum, non adipiscing lacus. Suspendisse tempus purus et diam consequat volutpat. <a href="blog_single.html" class="regular">View more...</a>
				</p>
				
				<div class="blog-post-home-title">
					<div class="blog-home-date float-left">
						<div class="date-number">20<br/>Feb</div>
					</div>
					<div class="blog-post-home-title-inner">
						<a href="blog_single.html" class="title">Integer mattis accumsan dui vel sodales. In id ante lobortis nisi pretium pretium.</a>
					</div>
				</div>
				
				<p class="post-content-last">
				Nunc porta turpis vitae tellus pulvinar dapibus. Morbi ut leo sapien, vel vulte orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. <a href="blog_single.html" class="regular">View more...</a>
				</p>
			</div>
			<br class="clear"/>
		</div>
		<!-- Recent Posts End -->
		
		<div class="shadow"></div>
		
		<!-- Bullet List Begin -->
		<div class="bullet-list float-left">
			<h4>Providing High Quality Products</h4>
			<p>Nunc porta turpis vitae tellus pulvinar dapibus. Morbi ut leo sapien, vel vulte orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
			<ul class="bullet-list">
				<li class="first">Suspendisse potenti. Fusce sed nisi enim, et tincidunt nunc</li>
				<li>Vestibulum sed sapien quam, et iaculis ipsum</li>
				<li>Lorem ipsum dolor sit amet, elit.</li>
				<li>Phasellus eleifend, enim non esmod lacinia, urna odio convallis urna</li>
			</ul>
		</div>
		<!-- Bullet List End -->
		
		<!-- Bullet List Begin -->
		<div class="bullet-list float-right">
			<h4>Many Great Features</h4>
			<p class="icon-list-1">Lorem ipsum dolor amet, consecteur adipsing elit. Phasellus efend, enim non euismod lacinia, urna odio convallis urna, eu comodo mi non orci. Nullam eu sapien ipsum, non adipiscing lacus.</p>
			<p class="icon-list-2">Nunc porta turpis vitae tellus pulvinar dapibus. Morbi ut leo sapien, vel vulte orci. Class sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. </p>
			<p class="icon-list-3">Sed aliquet urna eu diam malesuada egestas nisl faucibus. Vivamus dui libero, pharetra eget vehicula vel, laoreet a arcu. Sed ac maURLs massa. Praesent rutrum condimentum dolor.</p>
		</div>
		<!-- Bullet List End -->
		
		<br class="clear"/>

	</div>
	

	<div id="footer">
		<div class="footer-main">
			
			<div class="back-to-top"><a href="#top"><img src="<?php echo (IMG_URL); ?>top.png" alt="Back to top" border="0"/></a></div>
			
			<!-- Footer Column 1 Begin -->
			<div class="left-column float-left">
				<h5><?php echo (L("FOOTER_QUICK_NAV")); ?></h5>
				<ul class="footer-nav">
				<!-- Ñ­»·±éÀú³öµ×²¿Á¬½Ó¿ªÊ¼-->
				<?php if(is_array($footerNAV)): foreach($footerNAV as $key=>$url): ?><li><a href="<?php echo U($url);?>"><?php echo L($key);?></a></li><?php endforeach; endif; ?>
				<!-- Ñ­»·±éÀúµ×²¿Á¬½Ó½áÊø -->
				</ul>
			</div>
			<!-- Footer Column 1 End -->
			
			<!-- Footer Column 2 Begin -->
			<div class="middle-column float-left">
			<?php echo (L("FOOTER_NEWSLETTER")); ?>
<!-- 				<h5>Newsletter</h5>
				<p>Sign up for our newsletter to receive on a regular basis updates, hot offers, site news etc.</p>
				<p class="newsletter">
					<input type="text" value="Enter your e-mail..." onfocus="if(this.value=='Enter your e-mail...'){this.value=''};" onblur="if(this.value==''){this.value='Enter your e-mail...'};" class="newsletter-field"/>
					<input type="submit" id="go" value="GO" class="go-btn"/>
				</p> -->
			</div>
			<!-- Footer Column 2 End -->
			
			<!-- Footer Column 3 Begin -->
			<div class="left-column float-right">
				<h5><?php echo (L("FOOTER_CONTACTS")); ?></h5>
				<!-- Ñ­»·±éÀú¿ªÊ¼ -->
				<?php if(is_array($contactUs)): foreach($contactUs as $key=>$contact): ?><p><?php echo L($contact);?></p><?php endforeach; endif; ?>
				<!-- Ñ­»·±éÀú½áÊø -->
				<p>
					<a href="#" class="social"><img src="<?php echo (IMG_URL); ?>facebook.png" alt="facebook" border="0"/></a>
					<a href="#" class="social"><img src="<?php echo (IMG_URL); ?>vimeo.png" alt="vimeo" border="0"/></a>
					<a href="#" class="social"><img src="<?php echo (IMG_URL); ?>youtube.png" alt="youtube" border="0"/></a>
					<a href="#" class="social"><img src="<?php echo (IMG_URL); ?>twitter.png" alt="twitter" border="0"/></a>
					<a href="#" class="social"><img src="<?php echo (IMG_URL); ?>google.png" alt="google" border="0"/></a>
				</p>
			</div>
			<!-- Footer Column 3 End -->
		</div>
	</div>

</div>

<script type="text/javascript">

	// Megamenu
	$(function() {
						
		var $menu = $('#ldd_menu');
		
		$menu.children('li').each(function(){
			var $this = $(this);
			var $span = $this.children('span');
			$span.data('width',$span.width());
			
			$this.bind('mouseenter',function(){
				$menu.find('.ldd_submenu').stop(true,true).hide();
				$span.stop().animate({'width':'auto'},150,function(){
					$this.find('.ldd_submenu').slideDown(300);
				});
			}).bind('mouseleave',function(){
				$this.find('.ldd_submenu').stop(true,true).hide();
				$span.stop().animate({'width':$span.data('width')+'px'},300);
			});
		});
	});
	
	$(document).ready(function() {
		
		// Border effects
		$("#main_navi li img").insetBorder({
			borderColor : '#EDE6E9',
			inset: 4
		});
		
		// Navigation menu
		$('ul.sf-menu').superfish({ 
			delay: 100
		});  
		
		// Slider
		$(".slider").scrollable({
			next: '.next2', 
			prev: '.prev2'
		});
	
		// Fancybox
		$("a.grouped-elements").fancybox({
			'titlePosition'	: 'inside'
		});

		$("a[rel=group4]").fancybox({
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'titlePosition' 	: 'over',
			'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
				return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
			}
		});
		
		// Mouseover effect for thumbnails
		$("a.grouped-elements").hover(function() {
			  $(this).find(".imagehover").toggleClass("mouseon");
		});
		
	});

	$(window).load(function() {
		// Main Promo Scroller
		$("#main").scrollable({

			vertical: true,
			keyboard: 'static',
			onSeek: function(event, i) {
				horizontal.eq(i).data("scrollable").focus();
			}
		
		}).navigator("#main_navi");

		var horizontal = $(".scrollable").scrollable({ circular: true }).navigator(".navi");
		horizontal.eq(0).data("scrollable").focus();
	});
	
</script>


</body>
</html>