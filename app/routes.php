<?php

Route::filter('auth', function()
{
    if(!Auth::check()){
    	return Redirect::to('login')->withInput(Input::all())->message_fail('Please login');
    }
});

Route::group(array('before'=>'auth'),function(){

				Route::get('/', function()
			{

				return View::make('task');
			});

				Route::any('tasksWithCategories', function(){
					dd(Task::where('status',2)->with('categories')->get());

				});

			Route::post('get',function(){

				$status = '%';
			if(Input::has('status')){
			$status = Input::get('status');
			}
			//$q = Task::where('status',$status)->where('user_id',Auth::user()->id)->with('categories')->get();
			$q = Task::where('user_id',Auth::user()->id)->with('categories')->orderBy('status')->get();
			# JSON-encode the response
			echo $json_response = json_encode($q);
			});

			Route::post('new', function(){

				if(Input::get('task')!=""){
					$task = new Task();
					$task->task = Input::get('task');
					$task->user_id = Auth::user()->id;
					$task->status = 0;
					$task->created_at = time();
					$task->save();
					echo $json_response = json_encode(TRUE);
				}
				
			});

			Route::post('update',function(){

				if(Input::has('taskID')&&Input::get('task')!=""){
					$status = Input::get('status');
					$taskID = Input::get('taskID');
					$task = Task::find($taskID);
					$task->status = $status;
					$task->task = Input::get('task');
					$task->save();
					echo $json_response = json_encode(TRUE);
				}

			});

			Route::post('toggle-status',function(){

				if(Input::has('taskID')){
					$status = Input::get('status');
					$taskID = Input::get('taskID');
					$task = Task::find($taskID);
					$task->status = $status;
					
					$task->save();
					echo $json_response = json_encode(TRUE);
				}

			});

			Route::post('delete',function(){
				if(Input::has('taskID')){
					$taskID = $_GET['taskID'];

					Task::destroy(Input::get('taskID'));
					

					echo $json_response = json_encode(TRUE);
				}
				});

			Route::any('categories/get', function(){
				$q = Category::where('user_id',Auth::user()->id)->get();
				echo $json_response = json_encode($q);
			});

			Route::any('categories/taskCategory', function(){
				
				//to get tasks
				echo json_encode(Category::all());
					
				//to get categories
				//dd(Task::find(72)->categories()->get());
				

				
				
				
				
				
				
			});

			Route::any('task/add-category', function(){
				if(Input::has('task_id') && Input::has('category_id')){

					

					$tc = new CategoryTask;
					$tc->task_id = Input::get('task_id');
					$tc->category_id = Input::get('category_id');
					
					$tc->save();
					echo $json_response = json_encode(TRUE);
					
				}
			});

			Route::any('task/delete-category-reference', function(){
				if(Input::has('task_id') && Input::has('category_id')){
					CategoryTask::where('task_id',Input::get('task_id'))->where('category_id',Input::get('category_id'))->delete();
					echo  json_encode(TRUE);
				}
			});

			Route::any('category/delete', function(){
				if(Input::has('id')){
					Category::destroy(Input::get('id'));
					echo json_encode(TRUE);
				}
			});


			Route::post('category/new', function(){

				if(Input::get('category')!=""){
					$colors = array('label-info','label-warning','label-danger','label-success');

					$category = new Category();
					$category->title = Input::get('category');
					$category->user_id = Auth::user()->id;
					$category->color = $colors[rand(0,3)];
					//$category->status = 0;
					//$category->created_at = time();
					$category->save();
					echo $json_response = json_encode(TRUE);
				}
				
			});

			Route::post('category/update',function(){

				if(Input::has('id')&&Input::has('title')){
					$id = Input::get('id');
					$title = Input::get('title');
					$category = Category::find($id);
					$category->title = $title;
					
					$category->save();
					echo $json_response = json_encode(TRUE);
				}

			});

			Route::any('category/has-tasks', function(){
				if(Input::has('id')){
					$q = Category::where('id',Input::get('id'))->with('tasks');
				
					print $q->count();
					
				}
			
			
		});






});



Route::any('login',function(){
	if(Input::has('email')){
		$r = array('email'=>'required|email','password'=>'required');
		$v = Validator::make(Input::all(),$r);
		if($v->fails()){
			return Redirect::to('/login')->withInput(Input::all())->withErrors($r);
		}else{
			if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
				{
				    return Redirect::to('/');
				}else{
					return Redirect::to('/login')->withInput(Input::all())->with('message_fail','User or password incorrect');
				}
		}
	}
	return View::make('login');
});

Route::get('logout',function(){
Auth::logout();
return Redirect::to('/');
});

Route::get('log',function(){
$user = User::find(1);

Auth::login($user);
});

Route::get('noticias', function(){
	
		$data = file_get_contents("http://sacsapiazure.azurewebsites.net/api/vanguardia/contentlist/storynoticia?top=1&daysfrom=1&objects=getparent1");
	
		$noticias = json_decode($data, true);
		//dd($noticias);

		foreach ($noticias as $item) {
			echo $item["introduccion"];
		}
		 


		
		

});
