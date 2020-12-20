<div class="container" id = 'huy'>
	<!-- The Modal -->
	<form method="POST" role="form" action="{{ route('project.editProject') }}">
		{{ csrf_field() }}
		<!-- lay id -->
	<input type="hidden" name="id" value="{{$project->id}}" class="form-control">
	<div class="modal myModalEdit" id="myModalEdit-{{$project->id}}">
	  <!-- Modal content -->
	  <div class="modal-content">
	      <div class="btn_close">
	      	<span class="closeEdit">&times;</span>
	      </div>
	    <div class="modal-body container">
	    	<div class="row">
	    		<div class="col-4">
	    			<h3>Edit Project</h3>
	    		</div>
	    	</div>
	    	<div class="row"><div class="col-5"><hr></div></div>
	    	<div class="row">
				<div class="col-8 sol">
					<label class="lb">Project Name</label>
					<input type="text" name="title" value="{{$project->title}}" class="form-control" disabled required>
					<input type="hidden" name="title" value="{{$project->title}}" class="form-control">
				</div>
				<div class="col-4 sol">
					<label class="lb">Team Name</label>
					<input type="text" name="team_name" value="{{$project->team_name}}" class="form-control" disabled required>
					<input type="hidden" name="team_name" value="{{$project->team_name}}" class="form-control" required>
				</div>
			</div>
			<div class="row">
				<div class="col sol">
					<label class="lb">Leader</label>
				      <div class="dropdown-sin-1">
				        <select style="display:none; font-family: 'Times New Roman', Times, serif;" placeholder="Select" class="custom-select atcl" name="team_leader">
				        	<option selected>{{$project->profile_lead()}}</option>
				            @foreach ($profile as $p)
								<option value="{{$p->name}}">{{$p->name}}</option>
							@endforeach
				        </select>
				      </div>
				</div>
				<div class="col-6 sol">
					<label class="lb">Member</label>
			         <div class="column" style="">
			             <select id="demo4"  multiple="multiple" class="custom-select atcl  demo4" name="member[]">
							@foreach ($profile as $p)
								@if(in_array($p->name, explode(', ', $project->member)))
							  		<option value="{{$p->name}}">{{$p->name}}</option>
							  	@else
							  		<option value="{{$p->name}}">{{$p->name}}</option>
							  	@endif
							@endforeach
			             </select>

			         </div>
			     </div>
			</div>
			<div class="row">
				<div class="col sol">
					<label class="lb">Start Date</label>
					<input type="date" name="start_date" value="{{$project->start_date}}" id="start" class="form-control" required>
					</div>
				<div class="col sol">
					<label class="lb">End Date</label>
					<input type="date" name="end_date" value="{{$project->end_date}}" id="end" class="form-control" required>
				</div>
			</div>
			<div class="row">
				<div class="col btn_sub">
					<button class="btn btn-outline-secondary button_submit">Update</button>
				</div>
			</div>
	    </div>
	  </div>
	</div>
	</form>
</div>
<script type="text/javascript">
document.getElementById("startDate").onchange = function ()
{
  var input = document.getElementById("endDate");
  input.min = this.value;
}


</script>