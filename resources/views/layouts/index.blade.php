<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>Trang chủ</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/styleIndex.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/jquery-ui.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/easySelectStyle.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/jquery.dropdown.css')}}">

</head>
<body>
	<div>@include('layouts.header')</div>
	<div class="container-fluid">
		<div class="row">

			<div class="col col-md-2">
				<div class="row">
					@include('layouts.mini_profile')
				</div>
				<div class="row">
					@if(isset($user))
						@include('layouts.nav',['user',$user])
					
					@else
						@include('layouts.nav')
					@endif
				</div>
			</div>
		
			<div class="col col-md-10">
				<div class="row">
					<?php if(isset($eventmax)){ ?>
						@include('layouts.event_bar',['content' => $eventmax->content])
					<?php }else{ ?>
						@include('layouts.event_bar')
					<?php } ?>
					
				</div>
				<div class="row" id="index_section">
					@yield('contentt')
				</div>
			</div>
		</div>
	</div>
	<div id='stars'></div>
	<div id='stars2'></div>
	<div id='stars3'></div>
	<div>@include('layouts.footer')</div>
	<script type="text/javascript" src="{{asset('resources/js/jquery-3.2.1.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap/js/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap/js/jqueryy.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap/js/jquery-ui.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap/js/easySelect.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap/js/jquery.dropdown.js')}}"></script>
	<script type="text/javascript">
		//search
		$(document).ready(function(){
	  		$("#tableSearch").on("keyup", function() {
	    		var value = $(this).val().toLowerCase();
	    		$("#myTable tr").filter(function() {
	      			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			   	});
	    	});
  		});

		//add 1 line
		$(document).ready(function() {
		$(".add").click(function(){ 
			var html = $(".clone").html();
			$(".increment").after(html);
		});

		$("body").on("click",".btn-danger",function(){ 
			$(this).parents(".control-group").remove();});
		var ab=$(".clone");
		ab.hide();});
		//
		//countdown
		function change (el) {
		var max_len = 100;
		if (el.value.length > max_len) {
		el.value = el.value.substr(0, max_len);
		}
		document.getElementById('char_cnt').innerHTML = el.value.length;
		document.getElementById('chars_left').innerHTML = max_len - el.value.length;
		return true;
	};
	</script>
</body>
</html>