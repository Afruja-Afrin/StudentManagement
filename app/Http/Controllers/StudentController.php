<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentAddRequest;
use App\Models\Student;
// use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    // //
    // // protected $name;
    // // protected $age;
    // // public function __construct()
    // // {
    // //     $this->name = 'My Name';
    // //     $this->age = 20;
    // //     echo 'hiii';
    // // }

    // // public function index()
    // // {
    // //     return 'hello from controller!';
    // // }

    // // // public function aboutUs($name, $id)
    // // // {
    // // //     return view('aboutus', compact('name', 'id'));
    // // // }

    // // // 15.Public vs Private vs Constructor
    // // public function aboutUs( )
    // // {
    // //     // $name = $this->privateFunction();
    // //     // return $name;
    // //     // return $this->name;
    // //     return $this->age;
    // // }

    // // private function privateFunction()
    // // {
    // //     return 'hello';
    // // }


    // public function addData()
    // {
    //     // // video27. Insert data using query builder
    //     // DB::table('students')->insert([
    //     //     'name' => 'abc',
    //     //     'email' => 'abc@gmail.com',
    //     //     'age' => 15,
    //     //     'date_of_birth' => '2010-01-01',
    //     //     'gender' => 'm'
    //     // ]);

    //     // video:32(Add data using Eloquent ORM)
    //     $item = new Student();

    //     $item->name = "jkl";
    //     $item->email = 'jkl@gmail.com';
    //     $item->age = 32;
    //     $item->date_of_birth = '2001-05-01';
    //     $item->gender = 'm';
    //     $item->save();

    //     return 'added successfully';
    // }


    // public function getData()
    // {
    //     // // video:28(Fetch data using query builder)
    //     // $item = DB::table('students')
    //     //     // ->first();
    //     //     // ->select('id','name')//specifying column name
    //     //     // ->limit(2)
    //     //     // ->where('id','>',1)
    //     //     // ->where('id', '=', 2)
    //     //     // ->orWhere('id','=',3)
    //     //     ->get();

    //     // video:33(Fetch data using Eloquent ORM)
    //     // $item = Student::all();
    //     // $item = Student::select('id', 'name')->get();
    //     // $item = Student::select('id', 'name')
    //     // // ->where('id', 2)
    //     // ->get();

    //     $item = Student::all();

    //     // video:39(Master soft delete and restore deleted records)
    //     // $item = Student::onlyTrashed()->get();

    //     return $item;
    // }

    // public function restore()
    // {
    //     Student::withTrashed()->find(1)->restore();
    //     return 'restored successfully';
    // }

    // public function updateData()
    // {
    //     // video:29(Update data using querybuilder)
    //     DB::table('students')->where('id', 3)->update([
    //         'name' => 'updated Name'
    //     ]);

    //     //video: 34 (Update using Eloquent ORM)
    //     $item = Student::findOrFail(3);
    //     $item->name = 'Alice';
    //     $item->age = 22;
    //     $item->update();

    //     return 'updated successfully';
    // }

    // public function deleteData()
    // {
    //     // // video:30(Delete data using querybuilder)
    //     // DB::table('students')->where('id', 2)->delete();

    //     // video:35(Delete data using EloquentORM)
    //     Student::findOrFail(1)->delete();
    //     return 'deleted succesfully';
    // }

    // // video:36(How to use where conditions)
    // public function whereCondition()
    // {
    //     $item = Student::where('age','>',20)
    //     ->where('gender','f')
    //     ->get();
    //     return $item;
    // }

    // public function query1()
    // {
    //     $item = Student::female(25)->get();
    //     return $item;
    // }

    // public function query2()
    // {
    //     $item = Student::female(22)->get();
    //     return $item;
    // }

    // // video:40(Learn CRUD:read with Eloquent)
    // public function index()
    // {
    //     $students = Student::all();
    //     return view('students.index', compact('students'));
    // }

    // video:41(Table Filters for dynamic searching)
    public function index(Request $request)
    {
        $search = $request->search;

        $students = Student::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('age', 'like', "%{$search}%")
                ->orWhere('date_of_birth', 'like', "%{$search}%")
                ->orWhere('gender', 'like', "%{$search}%")
                ->orWhere('score', 'like', "%{$search}%");
        })->paginate(10);

        return view('students.index', compact('students'));
    }


    // video:43(Learn CRUD: Create with Eloquent)
    public function create(StudentAddRequest $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('photos', 'public');
        }
        $student = new Student();

        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        // $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->score = $request->score;
        $student->image = $imagePath;

        $student->save();

        return redirect('/students');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->score = $request->score;

        $student->update();
        return redirect('/students');
    }

    public function destroy(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        if($student->image){
            // Delete the image file from storage
            Storage::disk('public')->delete($student->image);
        }
        $student->delete();
        return redirect('/students');
    }
}
