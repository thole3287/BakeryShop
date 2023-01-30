<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cake Store </title>
	<base href="{{asset('')}}"/>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/FrontEnd/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="resources/FrontEnd/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="resources/FrontEnd/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="resources/FrontEnd/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="resources/FrontEnd/assets/dest/css/style.css">
	<link rel="stylesheet" href="resources/FrontEnd/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="resources/FrontEnd/assets/dest/css/huong-style.css">
    <style>
		#btn-back-to-top {
			position: fixed;
			bottom: 20px;
			right: 20px;
			display: none;
		}
		.site-footer
		{
		background-color:#26272b;
		padding:45px 0 20px;
		font-size:15px;
		line-height:24px;
		color:#737373;
		}
		.site-footer hr
		{
		border-top-color:#bbb;
		opacity:0.5
		}
		.site-footer hr.small
		{
		margin:20px 0
		}
		.site-footer h6
		{
		color:#fff;
		font-size:16px;
		text-transform:uppercase;
		margin-top:5px;
		letter-spacing:2px
		}
		.site-footer a
		{
		color:#737373;
		}
		.site-footer a:hover
		{
		color:#3366cc;
		text-decoration:none;
		}
		.footer-links
		{
		padding-left:0;
		list-style:none
		}
		.footer-links li
		{
		display:block
		}
		.footer-links a
		{
		color:#737373
		}
		.footer-links a:active,.footer-links a:focus,.footer-links a:hover
		{
		color:#3366cc;
		text-decoration:none;
		}
		.footer-links.inline li
		{
		display:inline-block
		}
		.site-footer .social-icons
		{
		text-align:right
		}
		.site-footer .social-icons a
		{
		width:40px;
		height:40px;
		line-height:40px;
		margin-left:6px;
		margin-right:0;
		border-radius:100%;
		background-color:#33353d
		}
		.copyright-text
		{
		margin:0
		}
		@media (max-width:991px)
		{
		.site-footer [class^=col-]
		{
			margin-bottom:30px
		}
		}
		@media (max-width:767px)
		{
		.site-footer
		{
			padding-bottom:0
		}
		.site-footer .copyright-text,.site-footer .social-icons
		{
			text-align:center
		}
		}
		.social-icons
		{
		padding-left:0;
		margin-bottom:0;
		list-style:none
		}
		.social-icons li
		{
		display:inline-block;
		margin-bottom:4px
		}
		.social-icons li.title
		{
		margin-right:15px;
		text-transform:uppercase;
		color:#96a2b2;
		font-weight:700;
		font-size:13px
		}
		.social-icons a{
		background-color:#eceeef;
		color:#818a91;
		font-size:16px;
		display:inline-block;
		line-height:44px;
		width:44px;
		height:44px;
		text-align:center;
		margin-right:8px;
		border-radius:100%;
		-webkit-transition:all .2s linear;
		-o-transition:all .2s linear;
		transition:all .2s linear
		}
		.social-icons a:active,.social-icons a:focus,.social-icons a:hover
		{
		color:#fff;
		background-color:#29aafe
		}
		.social-icons.size-sm a
		{
		line-height:34px;
		height:34px;
		width:34px;
		font-size:14px
		}
		.social-icons a.facebook:hover
		{
		background-color:#3b5998
		}
		.social-icons a.twitter:hover
		{
		background-color:#00aced
		}
		.social-icons a.linkedin:hover
		{
		background-color:#007bb6
		}
		.social-icons a.dribbble:hover
		{
		background-color:#ea4c89
		}
		@media (max-width:767px)
		{
		.social-icons li.title
		{
			display:block;
			margin-right:0;
			font-weight:600
		}
		}

		
	</style>
</head>
<body>
	
    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></button>
    @include("Layout.header")
    @yield("content")
    @include("Layout.footer")

	<!-- include js files -->
	<script src="resources/FrontEnd/assets/dest/js/jquery.js"></script>
	<script src="resources/FrontEnd/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="resources/FrontEnd/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="resources/FrontEnd/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="resources/FrontEnd/assets/dest/vendors/animo/Animo.js"></script>
	<script src="resources/FrontEnd/assets/dest/vendors/dug/dug.js"></script>
	<script src="resources/FrontEnd/assets/dest/js/scripts.min.js"></script>
	<script src="resources/FrontEnd/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="resources/FrontEnd/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="resources/FrontEnd/assets/dest/js/waypoints.min.js"></script>
	<script src="resources/FrontEnd/assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script src="resources/FrontEnd/assets/dest/js/custom2.js"></script>
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
	<script>
		//Get the button
		let mybutton = document.getElementById("btn-back-to-top");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function () {
		scrollFunction();
		};

		function scrollFunction() {
		if (
			document.body.scrollTop > 20 ||
			document.documentElement.scrollTop > 20
		) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
		}
		}
		// When the user clicks on the button, scroll to the top of the document
		mybutton.addEventListener("click", backToTop);

		function backToTop() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>
</body>
</html>
