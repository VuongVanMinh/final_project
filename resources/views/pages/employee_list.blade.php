@extends('layouts.index_section')
@section('content')
<div class="container">
	@include('pages.modal_add')
	<div class="row">
		<div class="col-md-12">
			<h2 class="title">EMPLOYEE LIST</h2>
			<!-- Search form -->
			@if(session()->has('success'))
       			 <div class="size_alert alert alert-success">
         			 {{ session()->get('success') }}
        		</div>
     		 @endif
			<div class="container">
  				<input class="form-control mb-4" id="tableSearch" type="text" placeholder="Type something to search list items">
  						<table class="table table-bordered table-striped">
  							@if($active == 1)
  							<button class="btn_add_list btn btn-dark float-right" id="myBtn">Add</button>
  							@endif
  							<tr>
		            <th class="row_size" style="display: none">Row</th>
		            <th class="name_size">Name</th>
		            <th class="email_size">Company Email</th>
		            <th class="birthday_size">Birthday</th>
		            <th class="phone_size">Phone</th>
		            @if($active == 1)
		            <th class="active_size">Active</th>
		            @endif
		        </tr>
				<tbody id="myTable">
		        @foreach ($profile as $pl)
		        <tr class="list">
			    	<td class="row_size" style="display: none">{{$pl->user_id}}</td>
				    <td class="name_size">{{$pl->name}}</td>
				    <td class="email_size">{{$pl->company_email}}</td>
				    <td class="birthday_size">{{$pl->birthday}}</td>
				    <td class="phone_size">{{$pl->phone}}</td>
				    @if($active == 1)
			        <td class="active_size">
			            <div class="row">
			            	<form action="{{ route('profile.editEmployee')}}" method="POST" style="display: contents ">
			            		{{ csrf_field() }}
			            		<input type="hidden" name="id" value="{{$pl->user_id}}">
			            		<div class="col-5 form-group edit_btn_pj">
			            			<button class="btn btn_size btn-info " type="submit">Edit</button>
			            		</div>
			            	</form>
			            	<form action="{{ route('profile.deleteEmployee')}}" method="POST">
			            		{{ csrf_field() }}
			            		<input type="hidden" name="id" value="{{$pl->user_id}}">
			            		<div class="col-5 form-group">
			            			<button type="button" class="btn btn_size btn-danger" data-toggle="modal" data-target="#exampleModalDel" value="{{$pl->user_id}}">
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
									        Are you sure you want to delete <span class="name_bold">{{$pl->name}}</span>?
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
			    </tr>
			    @endforeach
		        </tbody>
    		</table>
    		<div class="pagination_e">
    			
    			{{ $profile->render() }}

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
</script>
@endsection