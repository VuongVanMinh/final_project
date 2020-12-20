@extends('layouts.index_section')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
			<h2 class="title">PROJECT</h2>
			<!-- Search form -->
			<div class="container">
  				<input class="form-control mb-4" id="tableSearch" type="text" placeholder="Type something to search list items">
  				@if($active == 1)
  				<button class="btn btn-dark float-right btn_add_list" id="myBtn">Add</button>
  				@endif
			</div>
			@include('pages.modal_add_project')
			<table class="table table-bordered table-striped">
				<tr>
		            <th class="PN_size">Project Name</th>
		            <th class="N_size">Team Name</th>
		            <th class="L_size">Leader</th>
		            <th class="M_size">Member</th>
		            <th class="ED_size">End Date</th>
		            @if($active == 1)
		            <th class="AT_size">Active</th>
		            @endif
		            @if($active == 2)
		            <th class="AT_size">Evaluation</th>
		            @endif
		        </tr>
				<tbody id="myTable">
		        @foreach ($project as $pj)
		        @include('pages.modal_edit_project',['project'=>$pj])
		        @include('pages.modal_evaluation',['project'=>$pj])
		        <tr class="else">
		            <td class="PN_size">{{$pj->title}}</td>
		            <td class="N_size">{{$pj->team_name}}</td>
		            <td class="L_size">{{$pj->profile_lead()}}</td>
		            <td class="M_size">{{$pj->profile_mem()}}</td>
		            <td class="ED_size">{{$pj->end_date}}</td>
		            @if($active == 1)
		            <td class="active_size">
		            	<div class="row">
			            		<div class="col-5 form-group edit_btn_pj">
			            			<button class="btn btn_size btn-info myBtnEdit" value="{{$pj->id}}" type="submit">Edit</button>
			            		</div>
			            	<form action="{{ route('project.deleteProject')}}" method="POST" >
			            		{{ csrf_field() }}
			            		<input type="hidden" name="id" value="{{$pj->id}}" >
			            		<div class="col-5 form-group">
			            			<button type="button" class="btn btn_size btn-danger" data-toggle="modal" data-target="#exampleModalDel" value="{{$pj->id}}">
									  Del
									</button>
			            			<!-- The Modal -->
									<div class="modal fade" id="exampleModalDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="model_size modal-dialog " role="document">
									    <div class="modal-content model_size">
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLabel">Delete Project</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									        Are you sure you want to delete <span class="name_bold">{{$pj->team_name}}</span>?
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									        <button type="submit" class="btn btn-primary">Delete</button>
									      </div>
									    </div>
									  </div>
									</div>
			            		</div>
			            	</form>
			           	</div>
		            </td>
		            @endif
		            @if($active == 2)
		            <td class="AT_size">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" value="{{$pj->id}}">
						  Evaluation
						</button>
		            </td>
		            @endif
		        </tr>
		        @endforeach
		        </tbody>
    		</table>
    		<div class="pagination_e">
    			
    			{{ $project_pa->render() }}

    		</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	var modal = document.getElementById("myModal");
		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");
		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];
		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		  modal.style.display = "block";
		}
		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		  modal.style.display = "none";
		}
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		  if (event.target == modal) {
		    modal.style.display = "none";
		  }
		}
	//modal edit
		var modalEdit = document.getElementsByClassName("myModalEdit");

		// Get the button that opens the modal
		var btnEdit = document.getElementsByClassName("myBtnEdit");
		// Get the <span> element that closes the modal
		var spanEdit = document.getElementsByClassName("closeEdit");
		// When the user clicks the button, open the modal 
		for (var i = 0; i < btnEdit.length; i++) {
	      	btnEdit[i].onclick = function(){
		     console.log(this.value);
			  var modalEdit = document.getElementById("myModalEdit-"+this.value);
			  modalEdit.style.display = "block";
			}
	   	}
		
		// When the user clicks on <span> (x), close the modal

		for (var i = 0; i < spanEdit.length; i++) {
	      	spanEdit[i].onclick = function(){
	      		for (var i = 0; i < modalEdit.length; i++) {
		     		modalEdit[i].style.display = "none";
		     	}
			}
	   	}
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			for (var i = 0; i < modalEdit.length; i++) {
		     		if (event.target == modalEdit[i]) {
		   				modalEdit[i].style.display = "none";
		  		}
		    }
		}
</script>

@endsection