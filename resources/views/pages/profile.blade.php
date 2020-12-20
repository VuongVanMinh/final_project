@extends('layouts.index_section')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form role="form" method="POST" action="{{ route('profile.postedit')}}" enctype="multipart/form-data" >
				{{ csrf_field() }}
				<h2 class="title">PROFILE</h2>
				<div class="row">
					<div class="col-8 sol">
						<label>Name</label>
						<input type="hidden" name="id" value="{{$profile->id}}">
						<input type="text" value="{{$profile->name}}" name="name" class="form-control" placeholder="Name ..."  >
					</div>
				</div>
				<div class="row">
					<div class="col sol">
						<label>Personal email</label>
					<input type="email" value="{{$profile->personal_email}}" name="personal_email" class="form-control" placeholder="Personal email"  >
						</div>
						<div class="col sol">
						<label>Birthday</label>
						<input type="date" value="{{$profile->birthday}}" name="birthday" class="form-control"  >
					</div>
				</div>
				<div class="row">
					<div class="col sol">
						<label>Gender</label>
						@if($profile->gender == null)
						<select class="custom-select" name="gender">
					        <option value="Male">Male</option>
					        <option value="Female" >Female</option>
					      </select>
					      @endif
					      @if($profile->gender == 'Female')
						<select class="custom-select" name="gender">
					        <option value="Male">Male</option>
					        <option selected value="Female" >Female</option>
					      </select>
					      @endif
					       @if($profile->gender == 'Male')
						<select class="custom-select" name="gender">
					        <option selected value="Male">Male</option>
					        <option value="Female" >Female</option>
					      </select>
					      @endif
						</div>
					<div class="col sol">
						<label>Identity number</label>
						<input type="text" value="{{$profile->identity_number}}" name="identity_number" class="form-control" placeholder="Identity"  >
					</div>
					<div class="col sol">
						<label>Phone number</label>
						<input type="text" value="{{$profile->phone}}" name="phone" class="form-control" placeholder="Phone number"  >
					</div>
				</div>
				<div class="row">
					<div class="col sol">
						<label>Avatar</label>
						<input type="file" value="{{$profile->image}}" name="avatar" class="form-control-file">

					</div>
					<div class="col sol">
						<label>Bank</label>
						<input type="text" value="{{$profile->bank}}" name="bank" class="form-control" placeholder="Bank number">
					</div>
				</div>
				<div class="row">
					<div class="col sol">
						<label>Department</label>
						@if($active != 1)
						<input type="hidden" value="{{$profile->department()['id']}}" name="department_id" class="form-control">

						<input type="text" value="{{$profile->department()['department_name']}}" class="form-control" disabled>
						@endif
						@if($active == 1)
						<select class="custom-select" name="department_id">
							<option value="" disabled selected>Choose your department</option>
							@foreach ($department as $departments)
							<option value="{{$departments->id}}">{{$departments->department_name}}</option>
							@endforeach
		    			</select>
		    			@endif
					</div>
					<div class="col sol">
						<label>Position</label>
						@if($active == 0)
						<input type="hidden" value="{{$profile->position_p()['id']}}" name="position_id" class="form-control">
						<input type="text" value="{{$profile->position_p()['position_name']}}" class="form-control" disabled>
						@endif
						@if($active == 1)
						<select class="custom-select" name="position_id">
							<option value="" disabled selected>Choose your position</option>
							@foreach ($position as $positions)
							<option value="{{$positions->id}}">{{$positions->position_name}}</option>
							@endforeach
		    			</select>
		    			@endif
					</div>
				</div>
				<div class="row">
					<div class="col sol">
						<label>Join date</label>
						<input type="text" value="{{$profile->created_at->format('d-m-Y')}}" name="created_at" class="form-control" disabled>
					</div>
					<div class="col sol">
						<label>Company Email</label>
						<input type="email" value="{{$email_company}}" class="form-control" disabled>
						<input type="hidden" value="{{$email_company}}" name="company_mail" class="form-control">
					</div>
				</div>
				<div class="row input-group control-group increment" >
					<div class="form-group col-9 sol">
						<label>Achievement</label>
						<input type="text" value="{{$profile->achievement}}" class="form-control" name="achievement[]" placeholder="Achievement" value=""  >
					</div>
		            <div class="form-group col-2 sol">
		            	<label>Year</label>
		            	<input type="number" value="{{$profile->year}}" class="form-control" name="year[]" placeholder="In year"  value="">
		            </div>
		          	<div class="input-group-btn">  
		            	<button class="btn btn-outline-success add edit_button_profile" type="button"><i class="glyphicon glyphicon-plus" id="add"></i>Add </button>
		          	</div>
	        	</div>
	        	<div class="row clone" style="overflow: hidden;">
		          	<div class="control-group input-group " style="margin-top:10px">
			            <div class="form-group col-9">
							<input type="text" name="achievement[]" class="form-control" placeholder="Achievement">
						</div>
		            <div class="form-group col-2">
		            	<input type="text" name="year[]" class="form-control" placeholder="In year">
		            </div>
		            <div class="input-group-btn"> 
		              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove" id="removed"></i> Del</button>
		            </div>
		          	</div>
        		</div>
        		<div class="row">
				    <div class="col-12 sol">
						<label id="show_hard">Hard skills</label>
						<!-- <input id="skills" type="text" name="skills" class="form-control" placeholder="Skills" > -->
					</div>	
					<div class="row align sh" style="display: none;">
						@foreach ($skill as $s)
						@if($s->id <= 24)
				        <div class="checkbox radio_size">
						  <label>
						  	@if( in_array( $s->id, $arrSkillIDsOfProfile ) )
						  	<input class="radio_pad skill" name="skills[]" checked type="checkbox" value="{{$s->skill}}">{{$s->skill}}
						  	@else
							<input class="radio_pad skill" name="skills[]" type="checkbox" value="{{$s->skill}}">{{$s->skill}}
						  	@endif
						  </label>
						</div>
						@endif
						@endforeach
					</div>
				</div>
				<div class="row">
				    <div class="col-12 sol">
						<label id="show_soft">Soft Skills</label>
						<!-- <input id="skills" type="text" name="skills" class="form-control" placeholder="Skills" > -->
					</div>	
					<div class="row align ss" style="display: none;">
						@foreach ($skill as $s)
						@if($s->id >= 25)
				        <div class="checkbox radio_size">
						  <label>
						  	@if( in_array( $s->id, $arrSkillIDsOfProfile ) )
						  	<input class="radio_pad skill" checked name="skills[]" type="checkbox" value="{{$s->skill}}">{{$s->skill}}
						  	@else
							<input class="radio_pad skill" name="skills[]" type="checkbox" value="{{$s->skill}}">{{$s->skill}}
						  	@endif
						  </label>
						</div>
						@endif
						@endforeach
					</div>
				</div>
				<div class="row">
					<div class="col-5">
					</div>
					<div class="col sol">
						<button id="btn_sub" class="btn btn-outline-primary button_submit">Update</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script language="javascript">
    document.getElementById('btn_sub').onclick = function()
    {
        // Khai báo tham số
        var checkbox = document.getElementsByClassName('skill');
        var result = "";
        // Lặp qua từng checkbox để lấy giá trị
        for (var i = 0; i < checkbox.length; i++){
            if (checkbox[i].checked === true){
                result += ',' + checkbox[i].value;
            }
        }
        var skills =  document.getElementById('skills');
        skills.value += result;
    };
</script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#show_soft').click(function() {
            $('.ss').toggle("slide");
    });      
    $('#show_hard').click(function() {
            $('.sh').toggle("slide");
    });   
});
</script>
@endsection
