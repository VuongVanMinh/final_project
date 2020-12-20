<div class="container" id = 'huy'>

		

	<!-- The Modal -->
	<form id="demoForm" method="POST"  role="form" action="{{ route('project.add') }}">	
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
	    			<h3>New Project</h3>
	    		</div>
	    	</div>
	    	<div class="row"><div class="col-5"><hr></div></div>
	    	<div class="row">
				<div class="col-8 sol">
					<label class="lb">Project Name</label>
					<input type="text" name="title" class="form-control" required>
				</div>
				<div class="col-4 sol">
					<label class="lb">Team Name</label>
					<input type="text" name="team_name" class="form-control"
					required>
				</div>
			</div>
			<div class="row">
				<div class="col sol">
					<label class="lb">Leader</label>
				      <div class="dropdown-sin-1">
				        <select style="display:none; font-family: 'Times New Roman', Times, serif;" placeholder="Select" class="custom-select atcl" name="team_leader">
				        	<option></option>
				            @foreach ($profile as $p)
								<option value="{{$p->id}}">{{$p->name}}</option>
							@endforeach
				        </select>
				      </div>
				</div>
				<div class="col-6 sol">
					<label class="lb">Member</label>
			         <div class="column" style="">
			             <select id="demo3" multiple="multiple" class="custom-select atcl" name="member[]">
							@foreach ($profile as $p)
							  <option value="{{$p->id}}">{{$p->name}}</option>
							@endforeach
			             </select>
			         </div>
			     </div>
			</div>
			<div class="row">
				<div class="col sol">
					<label class="lb">Start Date</label>
					<input type="Date" name="startDate" class="form-control" id="startDate" required>
					</div>
				<div class="col sol">
					<label class="lb">End Date</label>
					<input type="date" name="endDate" class="form-control" id="endDate" required>
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
<script>
document.getElementById("startDate").onchange = function ()
{
  var input = document.getElementById("endDate");
  input.min = this.value;
}

$(document).ready(function(){
 
  // Initialize select2
  $("#selUser").select2();

  // Read selected option
  $('#but_read').click(function(){
    var username = $('#selUser option:selected').text();
    var userid = $('#selUser').val();

    $('#result').html("id : " + userid + ", name : " + username);

  });
});
//search
$(document).ready(function(){
    $('.dropdown-sin-1').dropdown({
      readOnly: true,
      input: '<input type="text" maxLength="50" placeholder="Search">'
    });
});
</script>
