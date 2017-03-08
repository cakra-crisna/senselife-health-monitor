@include("includes.head")
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
		@yield("content")
		
	@include("includes.basejs")
	@yield("page-js")

</body>
</html>
