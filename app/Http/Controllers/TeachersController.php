<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    //
    public function index()
    {
        return Teachers::all();
    }

    public function add()
    {
        $item = new Teachers();
        $item->name = 'Test Name';
        $item->save();

        return 'added succesfully';
    }

    public function show($id)
    {
        $item = Teachers::findOrFail($id);
        return $item;
    }

    public function update($id)
    {
        $item = Teachers::findOrFail($id);
        $item->name = 'Updated Teacher';
        $item->update();

        return 'updated succesfully';
    }

    public function delete($id)
    {
        $item = Teachers::findOrFail($id);
        $item->delete();

        return 'deleted successfully';
    }
}
