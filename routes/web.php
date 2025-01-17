<?php
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use \App\Http\Controllers\JobController;
use \App\Http\Controllers\RegisteredUserController;
use \App\Http\Controllers\SessionController;
use \App\Jobs\TranslateJob;
Route::get('test', function (){

    // dispatch(function(){
    //     logger('Hello from the queue');
    // })->delay(5);
    $joblisting = Job::first();
   TranslateJob::dispatch($joblisting);

    return 'Done';
});

// Route::get('/', function () {
//     return view('home',[
//         'greeting' => 'Hello' //like that we already have a variable name called $greeting
//     ]);
// });


// Route::get('/', function () {  
//     return view('home');
// });

// Route::view('/', 'home');


// Index
//Route::get('/jobs',[JobController::class, 'index'] 
    //this would fetch all jobs
    // $jobs =Job::with('employer')->get();

    // this would display the page paginate in numbers
    //$jobs =Job::with('employer')->paginate(3);

    // this would display the page paginate in next and previous
    //$jobs =Job::with('employer')->simplePaginate(3);

    // this would display the page paginate in next and previous but when the cursor/mouse hover it, the link it would display below won't be page=1 anymore it would be cursor=(some random numbers and figure) and it mostly use for displaying large data like 8000 pages
    // $jobs =Job::with('employer')->latest()->cursorPaginate(3);
    // return view('jobs.index', [
    //     "jobs" => $jobs
    // ]);
//);




// Create
//Route::get('/jobs/create', [JobController::class, 'Create']
// return view('jobs.create');
//);




                                 // Show
// this is a wildcard and our wildcard should be down of the page
// Route::get('/jobs/{id}', function ($id) {
//     $job = Job::find($id);
//     return view('jobs.show', [
//         'job' => $job
//     ]);
// });
//Route::get('/jobs/{job}', [JobController::class, 'Show']
    //$job = Job::find($id);
    // return view('jobs.show', [
    //     'job' => $job
    // ]);
//);



//Store = CreateJob
//Route::post('/jobs', [JobController::class, 'Store']

    // //validation
    // request()->validate([
    //     //we can provided a minimum of what the user supposed to enter like :
    //     'title' => ['required', 'min:3'],
    //     'salary' => ['required'],
    // ]);
    // Job::create([
    //     'title' => request('title'),
    //     'salary' => request('salary'),
    //     'employer_id' => 1
    // ]);

    // return redirect('/jobs');
//);


//edit
//Route::get('/jobs/{job}/edit', [JobController::class, 'Edit']
    //$job = Job::findOrFail($id);
    // return view('jobs.edit', [
    //     'job' => $job
    // ]);
//);


//update
//Route::patch('/jobs/{job}', [JobController::class, 'Update']


    //validate first
    // request()->validate([
    //     //we can provided a minimum of what the user supposed to enter like :
    //     'title' => ['required', 'min:3'],
    //     'salary' => ['required'],
    // ]);

    //authorize 
    //update the job
    //$job = Job::find($id);

    // this also same as the one down
    // $job-> title = request('title');
    // $job-> salary = request('salary');
    // $job->update([
    //     'title' => request('title'),
    //     'salary' => request('salary'),

    // ]);


    // and persist
    //redirect to the job page
  //  return redirect('/jobs/'. $job->id);
//);

//DELETE
//Route::delete('/jobs/{job}', [JobController::class, 'Destroy']

    // delete the job
    // we can do it this way or we can just do it manually
    //$job = Job::findOrFail($id);
    //$job->delete();

    // $job->delete();

     // redirect
    // return redirect('/jobs');
//);


// Route::get('/contact', function () {
//     return view('contact');
// });

//Route::view('/contact', 'contact');
// Route::get('/register', function () {
//     return view('register');
// });

//Route::post('/register', [UserController::class,'registerUser']);


//the reason why we are doing this is because JobController::class is common between all
//Route::controller(JobController::class)->group(function (){
   // Route::get('/jobs', 'index' 
//);
//});

// Create
//Route::get('/jobs/create',  'Create'

//);


//show
// Route::get('/jobs/{job}',  'Show'

// );

//Store = CreateJob
// Route::post('/jobs',  'Store'
// );


//edit
// Route::get('/jobs/{job}/edit',  'Edit'
// );


//update
// Route::patch('/jobs/{job}',  'Update'
// );

//DELETE
// Route::delete('/jobs/{job}',  'Destroy'
// );


// });

Route::view('/', 'home');
Route::view('/contact', 'contact');
// Resource tips this would also do the function of the above route so the first argument would also be the uri like jobs is own here and we can also add except or only to the route which means show all route except this one or only this route
// Route::resource('jobs', JobController::class, [
//     'except'=> ['edit'],
// ]);
//Route::resource('jobs', JobController::class);

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit', 'job');
Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth');


//Auth
Route::get('/register',[RegisteredUserController::class, 'create'] );
Route::post('/register',[RegisteredUserController::class, 'store'] );

Route::get('/login',[SessionController::class, 'create'] );
Route::post('/login',[SessionController::class, 'store'] );
Route::post('/logout',[SessionController::class, 'destroy'] );