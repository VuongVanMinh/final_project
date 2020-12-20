@extends('layouts.index_section')
@section('content')
<div class="container css_h_w">
	<div id='title' class="dis_text">
		<span class="wel">
	    WELCOME<br> {{$profile_p->name}}!
	  </span>
	  <br>
	  <span class="q">	
	    HAVE A GOOD DAY!
	  </span>
		<img class="theme" src="resources/img/theme.png" >
	  
	</div>
</div>
@endsection