<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::all();
        return response()->json($departments);
    }
    public function store(DepartmentRequest $request)
    {
     Department::create($request->input());
        return response()->json([
            'status'=> true,
            'message'=> 'Department created successfully'
        ],201);

    }


    public function show(Department $department)
    {
        return response()->json([
            'status'=> true,
            'data'=> $department
        ]);
    }


    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->input());
        return response()->json([
            'status'=> true,
            'message'=> 'Department updated successfully'
        ],200);
    }


    public function destroy(Department $department)
    {
        $department->delete();
        return response()->json([
            'status'=> true,
            'message'=> 'Department deleted successfully'
        ],200);
    }
}
