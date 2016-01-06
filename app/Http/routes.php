<?php


use Illuminate\Http\Request;

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
	return abort(404);
});

Route::get('{name}', function ($name) {
	mikrosLog(["GET/$name", "mikros"]);
	if ( $data['project'] = \App\Project::where(['name' => $name])->first()):
		return \View::make('recordList', $data);
	else:
		return dd('No project found');
	endif;
});


Route::post('{projectName}', function (Request $request, $projectName) {
	mikrosLog(["POST/$projectName", "mikros"]);
	$project = \App\Project::where(['name' => $projectName])->first();
	if ( ! $project ):
		$project = new \App\Project;
		$project->name = $projectName;
		$project->save();
	endif;

	$record = new \App\Record;
	$record->project_id = $project->id;
	if ( $request->has('data')):
		$record->data = $request->data;
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

});
