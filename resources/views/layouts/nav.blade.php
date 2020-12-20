<div id="nav">
	<a href="{{ route('index')}}">
	<div class="row_nav">
		<div class="icon_nav col-md-1">
			<img src="{{asset('resources/icon/home-2x.png')}}">
		</div>
		<div class="tag_nav col-md-8">
			Home
		</div>
	</div>
	</a>
	<a href="{{ route('employee.show')}}">
		<div class="row_nav">
			<div class="icon_nav col-md-1">
				<img src="{{asset('resources/icon/list-2x.png')}}">
			</div>
			<div class="tag_nav col-md-9">
				Employee List
			</div>
		</div>
	</a>
	<a href="{{ route('report.show')}}">
		<div class="row_nav">
			<div class="icon_nav col-md-1">
				<img src="{{asset('resources/icon/document-2x.png')}}">
			</div>
			<div class="tag_nav col-md-8">
				Report
			</div>
		</div>
	</a>
	<?php $user_id = \Auth::user()->id;?>
	@if($user_id != '')
	<a href="{{ route('profile.show', ['id' => $user_id])}}">
		<div class="row_nav">
			<div class="icon_nav col-md-1">
				<img src="{{asset('resources/icon/person-2x.png')}}">
			</div>
			<div class="tag_nav col-md-8">
				 Profile
			</div>
		</div>
	</a>
	@else
	<a >
		<div class="row_nav">
			<div class="icon_nav col-md-1">
				<img src="{{asset('resources/icon/person-2x.png')}}">
			</div>
			<div class="tag_nav col-md-8">
				 Profile
			</div>
		</div>
	</a>
	@endif
	<a href="{{ route('project.show')}}">
		<div class="row_nav">
			<div class="icon_nav col-md-1">
				<img src="{{asset('resources/icon/project-2x.png')}}">
			</div>
			<div class="tag_nav col-md-8">
				Project
			</div>
		</div>
	</a>
	<?php $role_id = \Auth::user()->role_id;?>
	@if($role_id == 1)
	<a href="{{ route('event.show')}}">
		<div class="row_nav">
			<div class="icon_nav col-md-1">
				<img src="{{asset('resources/icon/calendar-2x.png')}}">
			</div>
			<div class="tag_nav col-md-8">
				Event
			</div>
		</div>
	</a>
	@endif
	<a href="{{ route('review.show')}}">
		<div class="row_nav">
			<div class="icon_nav col-md-1">
				<img src="{{asset('resources/icon/eye-2x.png')}}">
			</div>
			<div class="tag_nav col-md-8">
				Review
			</div>
		</div>
	</a>
	<a href="{{ route('candidate.show')}}">
		<div class="row_nav">
			<div class="icon_nav col-md-1">
				<img src="{{asset('resources/icon/magnifying-glass-2x.png')}}">
			</div>
			<div class="tag_nav col-md-8">
				Appropriate Candidate
			</div>
		</div>
	</a>
</div>
@if($role_id != 1)
	<div class="blo"></div>
@endif
<script type="text/javascript">
</script>