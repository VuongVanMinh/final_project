action="{{ route('')}}"
<div>@if($project->team_leader == $profile->name)</div> review
<!-- <input type="hidden" name="id" value="{{$pl->user_id}}"> -->
{!! $profile->links() !!}
<!-- Route::get('profile/edit', 'App\Http\Controllers\ProfileController@edit')->name('employee.list'); -->
<!-- // Route::get('list', 'App\Http\Controllers\UserController@list')->name('employee.list'); -->
<!-- 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
@foreach ($profile as $pl)
@if($pl->id != "1")
		        	@if($pl->id != "2")
		        	{{$pl->id}}
		        	{{$pl->name}}
		        	{{$pl->company_email}}
		        	{{$pl->department()['department_name']}}
		        	{{$pl->position_p()['position_name']}}



@endif
				    @endif
@endforeach



<!-- Route::get('taobangg', function(){
	Schema::create('departments',function($table){
		$table->increments('id');
		$table->string('department_name');
		$table->string('department_phone');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
	});
});




Route::get('createtable', function(){
	Schema::create('labor_contract',function($table){
		$table->integer('id');
		$table->integer('user_id');
		$table->string('contract_type');
		$table->date('start_date');
		$table->date('end_date');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
	});
	Schema::create('department',function($table){
		$table->increments('id');
		$table->string('department_name');
		$table->string('department_phone');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
	});
	Schema::create('position',function($table){
		$table->increments('id');
		$table->string('position_name');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
	});
	Schema::create('project',function($table){
		$table->increments('id');
		$table->string('title');
		$table->string('team_name');
		$table->string('team_leader');
		$table->string('member');
		$table->date('start_date');
		$table->date('end_date');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
	});
	echo "thanh cong";
});



//create table

Route::get('database',function(){
	Schema::create('users',function($table){
		$table->increments('id');
		$table->string('email',200);
		$table->string('password');
		$table->boolean('active');
		$table->integer('role');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
	});
	Schema::create('profile',function($table){
		$table->increments('id');
		$table->integer('user_id');
		$table->string('name');
		$table->string('gender');
		$table->string('phone');
		$table->string('image');
		$table->string('bank');
		$table->string('personal_email');
		$table->string('identity_number');
		$table->date('birthday');
		$table->integer('department_id');
		$table->string('teams');
		$table->integer('position_id');
		$table->integer('contract_id');
		$table->date('join_date');
		$table->string('achievement');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
		$table->foreign('user_id')->references('id')->on('users');
	});
	Schema::create('photo',function($table){
		$table->increments('id');
		$table->integer('profile_id');
		$table->string('photo');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
		$table->foreign('profile_id')->references('id')->on('profile');
	});
	Schema::create('labor_contract',function($table){
		$table->integer('contract_id');
		$table->integer('user_id');
		$table->string('contract_type');
		$table->date('start_date');
		$table->date('end_date');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
		$table->foreign('contract_id')->references('contract_id')->on('profile');
	});
	Schema::create('department',function($table){
		$table->integer('department_id');
		$table->string('department_name');
		$table->string('department_phone');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
		$table->foreign('department_id')->references('department_id')->on('profile');
	});
	Schema::create('position',function($table){
		$table->integer('position_id');
		$table->string('position_name');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
		$table->foreign('position_id')->references('position_id')->on('profile');
	});
	// Schema::create('profile_team',function($table){
	// 	$table->integer('profile_id');
	// 	$table->integer('team_id');
	// 	$table->timestamp('created_at');
	// 	$table->timestamp('updated_at');
	// 	$table->foreign('profile_id')->references('id')->on('profile');
	// });
	// Schema::create('team',function($table){
	// 	$table->integer('id');
	// 	$table->string('team_name');
	// 	$table->string('team_leader');
	// 	$table->timestamp('created_at');
	// 	$table->timestamp('updated_at');
	// 	$table->foreign('id')->references('profile_id')->on('profile_team');
	// });
	Schema::create('report',function($table){
		$table->increments('id');
		$table->integer('profile_id');
		$table->string('content');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
		$table->foreign('profile_id')->references('id')->on('profile');
	});
	Schema::create('review',function($table){
		$table->increments('id');
		$table->integer('report_id');
		$table->integer('profile_id');
		$table->string('content');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
		$table->foreign('profile_id')->references('id')->on('profile');
		$table->foreign('report_id')->references('id')->on('report');
	});
	Schema::create('skill',function($table){
		$table->increments('id');
		$table->integer('profile_id');
		$table->string('skill');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
		$table->foreign('profile_id')->references('id')->on('profile');
	});
	Schema::create('achievement',function($table){
		$table->increments('id');
		$table->integer('profile_id');
		$table->string('achievement');
		$table->integer('year');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
		$table->foreign('profile_id')->references('id')->on('profile');
	});
	echo "da thuc hien lenh tao ban";
}); -->






















