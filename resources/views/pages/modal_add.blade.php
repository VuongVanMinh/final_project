<div>
		<!-- Trigger/Open The Modal -->
	<!-- The Modal -->
	<form id="demoForm" role="form" method="POST" action="{{ route('employee.add') }}">
	{{ csrf_field() }}
	<div id="myModal" class="modal">
	  <!-- Modal content -->
	  <div class="modal-content">
	      <div class="btn_close">
	      	<span class="close">&times;</span>
	      </div>
	    <div class="modal-body container">
	    	<div class="row">
	    		<div class="col-4">
	    			<h3>New Member</h3>
	    		</div>
	    	</div>
	    	<div class="row"><div class="col-5"><hr></div></div>
	    	<div class="row">
				<div class="col-8 sol">
					<label class="lb">Company Email</label>
					<input type="email" name="company_email" class="form-control" required>
					<small>Nguyen Van Nghia -> nvnghia@vug.kb</small>
				</div>
				<div class="col-4 sol">
					<label class="lb">Position</label>
					<select class="custom-select" name="position_id">
						<option value="" disabled selected>Choose your position</option>
					@foreach ($position as $positions)
						<option value="{{$positions->id}}">{{$positions->position_name}}</option>
					@endforeach
		    		</select>
				</div>
			</div>
			<div class="row">
				<div class="col sol">
					<label class="lb">Password</label>
					<input type="password" name="password" class="form-control" placeholder="Password" required>
					</div>
				<div class="col sol">
					<label class="lb">Confirm password</label>
					<input type="password" name="confirm_password" class="form-control" placeholder="Password" required>
				</div>
			</div>
			<div class="row">
				<div class="col sol">
					<label class="lb">Department</label>
					<select class="custom-select" name="department_id">
						<option value="" disabled selected>Choose your department</option>
					@foreach ($department as $departments)
						<option value="{{$departments->id}}">{{$departments->department_name}}</option>
					@endforeach
		    		</select>		
		    	</div>
		    	<div class="col sol">
					<label class="lb">Role</label>
					<select class="custom-select" name="role_id">
						<option value="" disabled selected>Choose your role</option>
					@foreach ($role as $roles)
						<option value="{{$roles->id}}">{{$roles->role}}</option>
					@endforeach
		    		</select>		
		    	</div>
			</div>
			<div class="row">
				<div class="col btn_sub">
					<button class="btn btn-outline-secondary button_submit">Submit</button>
				</div>
			</div>
	    </div>
	  </div>
	</div>
	</form>
</div>
