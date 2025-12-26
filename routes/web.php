<?php

use App\Http\Controllers\SecondTestController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\TestController;
use App\Models\Teachers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('student', function () {
//     return 'This is student';
// });

// Route::get('teacher', function () {
//     return 'This is teacher';
// });


// //Grouping routes
// Route::prefix('details')->group(function () {
//     Route::get('student', function () {
//         return 'This is student';
//     })->name('student-details');

//     Route::get('teacher', function () {
//         return 'This is teacher';
//     })->name('teachers-details');
// });

// // //Passing parameter
// Route::get('student/{id}/{reg}', function($id, $reg){
//     return 'Your id '.$id.' and reg '.$reg;
// });

// //Returning view from route
// Route::get('about-us', function(){
//     return view('aboutus');
// });

// // Passing data from route to view blade
// Route::get('about-us', function(){
//     $name = 'Tester';
//     $email = 'tester@gmail.com';
//     return view('aboutus')->with('Name', $name)->with('Email', $email);
// });

// Route::view('contact-us/{name}/{id}', 'contactus');

// //Fallback route->when a route is wrong and not found
// Route::fallback(function(){
//     return 'Page not found';
// });


// //calling controller's specific method from web.php
// Route::get('students', [StudentController::class, 'index']);

// Route::get('aboutus', [StudentController::class, 'aboutUs']);


// //grouping several methods of controller
// Route::controller(StudentController::class)->group(function(){
//     Route::get('students', 'index');
//     Route::get('about-us/{id}/{name}', 'aboutUs');
// });

// // 15.Public vs Private vs Constructor
// Route::controller(StudentController::class)->group(function(){
//     Route::get('students', 'index');
//     Route::get('about-us', 'aboutUs');
// });

// //16. Understanding Invoke & Resource Controllers
// Route::get('invoke', TestController::class);

// Route::resource('second-test', SecondTestController::class);


// // 21 & 22. how to call models and show data. first one directly from route and 2nd one route->controller->models
// Route::get('teachers', function(){
//     return Teachers::all();
// });

// Route::get('teachers', [TeachersController::class, 'index']);

// // 23. Basic CRUD operations
// Route::get('add-teacher', [TeachersController::class, 'add']);
// Route::get('show-teacher/{id}', [TeachersController::class, 'show']);
// Route::get('update-teacher/{id}', [TeachersController::class, 'update']);
// Route::get('delete-teacher/{id}', [TeachersController::class, 'delete']);

// // video:27 Insert using query builder
// Route::get('add-data', [StudentController::class, 'addData']);

// // video:28 (Fetch data using query builder)
// Route::get('get-data', [StudentController::class, 'getData']);


// // video:29(Update data using query builder)
// Route::get('update-data', [StudentController::class, 'updateData']);

// // video:30(delete data using query builder)
// Route::get('delete-data', [StudentController::class, 'deleteData']);

// // video:36(How to use where consitions)
// Route::get('where-condition', [StudentController::class, 'whereCondition']);


// // video:38(Query Scope)
// Route::get('query1', [StudentController::class, 'query1']);
// Route::get('query2', [StudentController::class, 'query2']);

// // video:39(soft delete)
// Route::get('restore', [StudentController::class, 'restore']);


//video:40(Learn CRUD:read with Eloquent)
Route::prefix('students')->controller(StudentController::class)->group(function(){
    Route::get('/', 'index');
    //below two lines for video 43
    Route::view('add', 'students.add');
    Route::post('create', 'create');
    //video:44 routes for edit and update
    Route::get('edit/{id}', 'edit');
    Route::post('update/{id}', 'update');
    // video 45: delete route
    Route::delete('delete/{id}', 'destroy');
});
