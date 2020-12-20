@extends('layouts.index_section')
@section('content')
<div class="container css">
	<div class="row">
		<div class="col-md-12">
			<form role="form" method="POST" action="{{ route('report.add')}}"  enctype="multipart/form-data">
				{{ csrf_field() }}
			<h2 class="title">REPORT</h2>
			<div class="row">
				@if(session()->has('success'))
       			 <div class="size_alert_r alert alert-success">
         			 {{ session()->get('success') }}
        		</div>
     		 	@endif
			</div>

			<div class="row">
				<div class="col-2 sol tag_report">
					Title
				</div>
				<div class="col-7 sol">
					<input type="text" name="title" class="form-control" required>
				</div>
			</div>
			<div class="row">
				<div class="col-2 sol tag_report">
					Leader
				</div>
				<div class="col-7 sol">
						<select class="custom-select" name="team_leader">
							<option value="" disabled selected>Choose your leader</option>
							@foreach ($project as $projects)
							<option value="{{$projects->team_leader}}">{{$projects->profile_lead()}}</option>
							@endforeach
		    			</select>
					</div>
			</div>
			<div class="row">
				<div class="col-10 "><hr></div>
			</div>
			<div class="row">
				<div class="col-2 sol tag_report">
					Daily Progress
				</div>
				<div class="row input-group control-group increment" >
					<div class="form-group col-5 sol">
						<label>Daily task</label>
						<textarea id="content_report" name="daily_task[]" rows="3" cols="50"></textarea>
					</div>
		            <div class="form-group col-2 sol">
		            	<label>Status</label>
		            	<select class="custom-select" name="status[]">
							<option value="Done">Done</option>
					        <option value="In Progress">In progress</option>
					      	<option value="Not Started">Not Started</option>
					      	<option value="Postpone">Postpone</option>
					    </select>
		            </div>
		          	<div class="input-group-btn">  
		            	<button class="btn btn-outline-success add edit_button_profile" type="button"><i class="glyphicon glyphicon-plus" id="add"></i>Add </button>
		          	</div>
	        	</div>
	        	<div class="row clone" style="overflow: hidden;">
		          	<div class="control-group input-group " style="margin-top:10px">
			            <div class="form-group col-5">
							<textarea id="content_report" name="daily_task[]" rows="3" cols="50"></textarea>
						</div>
		            <div class="form-group col-2">
		            	<select class="custom-select" name="status[]" >
							<option value="Done">Done</option>
					        <option value="In Progress">In progress</option>
					      	<option value="Not Started">Not Started</option>
					      	<option value="Postpone">Postpone</option>
					    </select>
		            </div>
		            <div class="input-group-btn"> 
		              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove" id="removed"></i> Del</button>
		            </div>
		          	</div>
        		</div>
			</div>
			<div class="row">
				<div class="col-2 sol tag_report">
					Upload file
				</div>
				<div class="col-3 sol">
					<input type="file" name="file_uploaded" class="form-control-file">
				</div>
			</div>
			<div class="row">
				<div class="col-2 sol tag_report">
					Questions and Comments
				</div>
				<div class="col-7 sol">
					<textarea id="content_report" name="qac" rows="3" cols="50"></textarea>
				</div>
			</div>
			<div class="row">
					<div class="col-5">
					</div>
					<div class="col sol">
						<button class="btn btn-primary button_submit">Submit</button>
					</div>
				</div>
		</form>
		</div>
	</div>
</div>

@endsection