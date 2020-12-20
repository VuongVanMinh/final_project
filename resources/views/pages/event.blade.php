@extends('layouts.index_section')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form role="form" method="POST" action="{{ route('event.add')}}">
				{{ csrf_field() }}
				<h2 class="title">CREATE POST</h2>
				<div class="row">
					<div class="col-2 sol tag_report">
						Post Content
					</div>
					<div class="col-7 sol">
						<textarea name="content" cols=85 rows=5 onkeyup="change(this);"></textarea>
					<br>You've typed <span id="char_cnt">0</span> character(s). You are allowed <span id="chars_left">lots</span> more. 
				</div>
			</div>
			<div class="row">
					<div class="col-5">
					</div>
					<div class="col sol">
						<button class="btn btn-primary button_submit">Post</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="container">
  				<input class="form-control mb-4" id="tableSearch" type="text" placeholder="Type something to search list items">
  						<table class="table table-bordered table-striped">
  				<tr>
		            <th class="row_size td_ev">ID</th>
		            <th class="name_size td_ev">Time Create</th>
		            <th>Content</th>
		        </tr>
				<tbody id="myTable">
		        @foreach($event as $ev)
		        <tr class="list">
			    	<td class="row_size td_ev">{{$ev->id}}</td>
				    <td class="name_size td_ev">{{$ev->created_at}}</td>
				    <td class="td_ev">{{$ev->content}}</td>
			    </tr>
			    @endforeach
		        </tbody>
    		</table>
		</div>
</div>
@endsection