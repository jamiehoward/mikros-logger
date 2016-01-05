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
    abort(404);
});

Route::get('/{id}', function ($id) {
    $project = \App\Project::find($id);
	if ( $project ):
		dd($project->records());
	else:
		abort(404);
	endif;
});

Route::post('/{projectId}', function (Request $request, $projectId) {
    $record = new \App\Record;
	$record->project_id = $projectId;
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
