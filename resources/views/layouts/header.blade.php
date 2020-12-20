<div id="header">
	<div class="row">
		<div class="col-md-1">
			<div class="logo">
				<img class="img_logo" src="{{asset('resources/img/logo.png')}}">
			</div>
		</div>
		<div class="col-md-3">
			<div class="company_name dis_text">
				VVM Company
			</div>
		</div>
		<div class="col-md-6" >
			
		</div>
		<div class="col-md-2 row">
			<div class="col-md-3 icon_header">
			</div>
			<div class="col-md-3 icon_header">
			</div>
			<div class="col-md-3 edit_avt" >
				@if($profile_p->image == null)
				@if($profile_p->gender == 'Female')
					<img src="/../HRweb/public/resources/img/female.png" id="avatar">
				@endif
				@if($profile_p->gender == 'Male')
					<img src="/../HRweb/public/resources/img/male.png" id="avatar">
				@endif
				@if($profile_p->gender == null)
					<img src="/../HRweb/public/resources/img/person.png" id="avatar">
				@endif
				@endif
				@if($profile_p->image != null)
				<img src="/../HRweb/public/img/{{$profile_p->image}}" id="avatar">
				@endif
			</div>
			<div class="col-md-3 icon_header dropleft show">
				  <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <img src="{{asset('resources/icon/cog-3x.png')}}">
				  </a>
				  <div class="dropdown-menu posi" aria-labelledby="dropdownMenuLink">
				  	<div class="dropdown-item dis_text" style="font-family: verdana;">{{$profile_p->name}}</div>
				  	<div class="dropdown-divider"></div>
				    <a class="dropdown-item" href="{{ route('changePassword')}}">Change password</a>
				    <div class="dropdown-divider"></div>
				    <a class="dropdown-item" href="{{ route('logout')}}">Log out</a>
				  </div>
			</div>
		</div>
	</div>
</div>