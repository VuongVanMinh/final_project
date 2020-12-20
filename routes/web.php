<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\UserController@index')->name('index');




// Route::get('/profile', function (){

//     return view('pages/profile');
// });

Route::get('list', function(){
	return view('pages/employee_list');
});
Route::get('/report', function (){
    return view('pages/report');
});
Route::get('/event',function(){	
	return view('pages/event');
});
Route::get('/review',function(){
	return view('pages/review');
});
Route::get('/project',function(){
	return view('pages/project');
}); 
Route::get('/login',function(){
	return view('layouts/login');
});
Route::get('/welcome',function(){
	return view('pages/welcome');
});





Route::post('list/add', 'App\Http\Controllers\UserController@add')->name('employee.add');

Route::get('list/add', 'App\Http\Controllers\UserController@show')->name('employee.show');





Route::get('profile/{id}', 'App\Http\Controllers\ProfileController@show')->name('profile.show');
Route::get('profile/edit/{id}', 'App\Http\Controllers\ProfileController@getedit')->name('profile.getedit');
Route::post('profile/edit/', 'App\Http\Controllers\ProfileController@edit')->name('profile.postedit');



//
Route::post('profile/deleteEmployee','App\Http\Controllers\ProfileController@deleteEmployee')->name('profile.deleteEmployee');
Route::post('profile/editEmployee','App\Http\Controllers\ProfileController@editEmployee')->name('profile.editEmployee');





//
Route::get('list', 'App\Http\Controllers\ProfileController@show_list')->name('profile.show_list');
//project
Route::post('project/add', 'App\Http\Controllers\ProjectController@add')->name('project.add');
Route::get('project', 'App\Http\Controllers\ProjectController@show')->name('project.show');
//
Route::post('project/deleteProject','App\Http\Controllers\ProjectController@deleteProject')->name('project.deleteProject');
Route::post('project/editProject','App\Http\Controllers\ProjectController@editProject')->name('project.editProject');





//report
Route::get('report', 'App\Http\Controllers\ReportController@show')->name('report.show');
Route::post('report/add','App\Http\Controllers\ReportController@add')->name('report.add');


//event
Route::get('event', 'App\Http\Controllers\EventController@show')->name('event.show');

//review
Route::get('review', 'App\Http\Controllers\ReviewController@show')->name('review.show');
Route::post('review/reply','App\Http\Controllers\ReviewController@reply')->name('review.reply');
//event
Route::post('event/add','App\Http\Controllers\EventController@add')->name('event.add');
//appropriate candidate
Route::get('candidate', 'App\Http\Controllers\Appropriate_candidateController@show')->name('candidate.show');
Route::get('search', 'App\Http\Controllers\Appropriate_candidateController@search')->name('candidate.search');



//auth
Route::post('login','App\Http\Controllers\AuthController@login')->name('login');
//logout
Route::get('logout','App\Http\Controllers\AuthController@logout')->name('logout');
//change pass
Route::get('/changePassword','App\Http\Controllers\AuthController@showChangePasswordForm');
Route::post('/changePassword','App\Http\Controllers\AuthController@changePassword')->name('changePassword');























Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::get('database',function(){
	// Schema::create('users',function($table){
	// 	$table->increments('id');
	// 	$table->string('email',200);
	// 	$table->string('password');
	// 	$table->integer('role_id');
	// 	$table->timestamp('created_at');
	// 	$table->timestamp('updated_at');
	// });
	Schema::create('profiles',function($table){
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
		$table->string('company_email');
		$table->integer('department_id');
		$table->integer('position_id');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
		$table->foreign('user_id')->references('id')->on('users');
	});
	echo "da thuc hien lenh tao ban";
});