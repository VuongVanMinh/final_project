@extends('layouts.index_section')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h2 class="title">APPROPRIATE CANDIDATE</h2>
			<!-- Search form -->
			<div class="row">
					<div class="col-5 sol">
						<label class="font-weight-bold">Department</label>
						<select class="custom-select department" name="department_id">
							@foreach ($department as $departments)
							<option selected="{{$departments->department_name}}" value="{{$departments->id}}">{{$departments->department_name}}</option>
							@endforeach
							<option value="" selected>All</option>
		    			</select>
					</div>
					<div class="col-5 sol">
						<label class="font-weight-bold">Position</label>
						<select class="custom-select position" name="position_id">
							@foreach ($position as $positions)
							<option value="{{$positions->id}}">{{$positions->position_name}}</option>
							@endforeach
							<option value="" selected>All</option>
		    			</select>
					</div>
				</div>
				<div class="row">
				    <div class="col-12 sol">
						<label id="show_hard">Hard skills</label>
						<!-- <input id="skills" type="text" name="skills" class="form-control" placeholder="Skills" > -->
					</div>	
					<div class="row pd_s sh" style="display: none;">
						@foreach ($skill as $s)
						@if($s->id <= 24)
				        <div class="checkbox radio_size">
						  <label>
						  	<input class="radio_pad skill" type="checkbox" name="skills[]" value="{{$s->id}}">{{$s->skill}}
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
					<div class="row pd_s ss" style="display: none;">
						@foreach ($skill as $s)
						@if($s->id >= 25)
				        <div class="checkbox radio_size">
						  <label>
						  	<input class="radio_pad skill" type="checkbox" name="skills[]" value="{{$s->id}}">{{$s->skill}}
						  </label>
						</div>
						@endif
						@endforeach
					</div>
				</div>
			<div class="container">
  				<input class="form-control mb-4" id="tableSearch" type="text" placeholder="Type something to search list items">
  				<table class="table table-bordered table-striped FilterTable">
  				<tr>
  					<th style="display: none;">id</th>
		            <th class="name_c">Name</th>
		            <th class="email_c">Company Email</th>
		            <th class="skill_c">Skills</th>
		            <th class="dep_c">Department</th>
		            <th class="pos_c">Position</th>
		            <th class="stt_s">Status</th>
		        </tr>
				<tbody id="myTable">
		        @foreach ($profile as $pl)
		        <tr class="else">
		        	@if($pl->id != "1")
		        	@if($pl->id != "2")
		        	<td style="display: none;">{{$pl->id}}</td>
			    	<td class="name_c column">{{$pl->name}}</td>
				    <td class="email_c column">{{$pl->company_email}}</td>
				    <td class="skill_c column">
				    	@php
				    	$skillsOfProfileId = \App\Models\Skill_profile::getItemsOfProfileId($pl->id);
				    	@endphp

				    	@foreach( $skillsOfProfileId as $key => $value  )
				    		@if( $key + 1 == count($skillsOfProfileId) )
				    	 	{!! $value->skill !!}
				    	 	@else
							{!! $value->skill !!},
				    	 	@endif
				    	@endforeach

				    </td>
		            <td class="dep_c column">{{$pl->department()['department_name']}}</td>
				    <td class="pos_c column">{{$pl->position_p()['position_name']}}</td>
				    <td class="stt_s column">
				    	@php
					    	// get projectIds of profileID.
					    	$projectsOfProfileId = \App\Models\Project::getProjectIdsOfProfileId($pl->id);
					    	//dd($projectsOfProfileId);

					    	$status = 'Free';
				    	@endphp

				    	@if( count($projectsOfProfileId) > 0 )
				    		@php
				    		$status = '';
				    		@endphp

				    		@foreach( $projectsOfProfileId as $project )
				    			@php
				    			$startDate = $project["start_date"];
								$endDate = $project["end_date"];
				    			$status = $status . $startDate . " ~ " . $endDate . ' ; ';
				    			@endphp
				    		@endforeach
				    	@endif

				    	{!! $status !!}
				    </td>
				    @endif
				    @endif
			    </tr>
			    @endforeach
		        </tbody>
    		</table>
		</div>
	</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
    	var department;
    	var position;
    	var d = $('.department');
    	var p = $('.position');
    	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    	$(document).on('change', '.department,.position', function () {
    		department = d.val();
    		position = p.val();

    		var input = document.getElementsByName('skills[]'); 
	  		var arrayIdsSkill = new Array();
	        for (var i = 0; i < input.length; i++) { 
	            var a = input[i];
	            if( a.checked ){
	            	arrayIdsSkill.push($(a).val());
	            } 

	        } 

    		$.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
                data: {
                    'department': department,
                    'position': position,
                    'skills': arrayIdsSkill
                },
                success:function(data){
                    $('#myTable').html(data);
                }
            });
    	});
	});

	$(document).ready(function() {
        $('#show_soft').click(function() {
                $('.ss').toggle("slide");
        });  
        $('#show_hard').click(function() {
                $('.sh').toggle("slide");
        });     
    
    });
    $(document).ready(function() {
    });

    $(document).on('change', '.skill', function () {


		var input = document.getElementsByName('skills[]'); 
  		var arrayIdsSkill = new Array();
        for (var i = 0; i < input.length; i++) { 
            var a = input[i];
            if( a.checked ){
            	arrayIdsSkill.push($(a).val());
            } 

        } 

		var department;
    	var position;
    	var d = $('.department');
    	var p = $('.position');
    	department = d.val();
    	position = p.val();

    	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    	console.log("OKKK3");
        $.ajax({
            type: 'get',
            url: '{{ URL::to('search') }}',
            data: {
                'department': department,
                'position': position,
                'skills': arrayIdsSkill
            },
            success:function(data){
                $('#myTable').html(data);
            }
        });
	});

</script>
@endsection