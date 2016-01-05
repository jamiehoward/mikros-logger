<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    dd('FAILED');
});

Route::get('project/{name}', function ($name) {
	if ( $project = \App\Project::where(['name' => $name])->get()):
		return dd($project->records());
	else:
		return dd('No project found');
	endif;
});

Route::post('project/{projectName}', function (Request $request, $projectName) {
    if ( ! $project = \App\Project::where(['name' => $projectName])->get() ):
		$project = new \App\Project;
		$project->name = $projectName;
		$project->save();
	endif;

	$record = new \App\Record;
	$record->project_id = $project->id;
	if ( $request->input('data')):
		$record->data = $request->input('data');
	endif;
	if ( $record->save() ):
		return \Response::make('Record saved', 200);
	else:
		abort(500);
	endif;
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
