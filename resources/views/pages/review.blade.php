@extends('layouts.index_section')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h2 class="title">REVIEW</h2>
			<!-- Search form -->
			<div class="container">
  				<input class="form-control mb-4" id="tableSearch" type="text" placeholder="Type something to search list items">
			<table class="table table-bordered table-striped">
				<tr>
		            <th class="title_size">Title</th>
		            <th class="namerv_size">Name</th>
		            <th class="KPI_size">Daily task</th>
		            <th class="status_size">Time</th>
		            <th class="file_size">File</th>
		            <th class="QaC_size">Comments</th>
		          	<th class="cm_size">Reply</th>
		        </tr>
				<tbody id="myTable">
		        @foreach ($daily_rp as $rp)
		        <tr class="else">		        	
		            <td class="title_size">{{$rp->title}}</td>
		            <td class="namerv_size">{{$rp->name}}</td>
		            <td class="KPI_size">{{$rp->dailyTask}} </td>
		            <td class="status_size">{{$rp->created_at}}</td>
		            <td class="file_size"><a href="/../HRweb/public/document/{{$rp->file}}">{{$rp->file}}</a></td>
		            <td class="QaC_size">{{$rp->qac}}</td>
		            <td class="row cm_size">
		            	@if($rp->reply != "")
		            	<p class="reply_size">{{$rp->reply}}</p>
		            	@else
		            	<div class="form-reply">
		            		<textarea cols="22" name="reply" class="reply-value" ></textarea>

		            		<input type="hidden" name="id" value="{{$rp->report_id}}" class="form-control id-report">
		            		<button class="btn btn-outline-primary btn_submit_review">Reply</button>
		            	</div>
		            	<p class="reply-success" style="display: none"></p>
		            	@endif
		            </td>
		            
		        </tr>
		        @endforeach
		        </tbody>
    		</table>
		</div>
	</div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".btn_submit_review").on("click", function(){
			var value = $(this).closest("td").find(".reply-value").val();
			var id = $(this).closest("td").find(".id-report").val();
			console.log(id);
			var res = $(this).closest("td").find(".reply-success");
			var f = $(this).closest(".form-reply");
			$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});
			$.ajax({
				
	            url : "{{route('review.reply')}}",
	            type : "POST",
	            dataType:"JSON",
	            data : {
	                 'reply' : value,
	                 'id' : id,
	            },
	            success : function (result){
	                res.html(result).show();
					f.hide();
	            }
	        })
		})
	});
	
</script>