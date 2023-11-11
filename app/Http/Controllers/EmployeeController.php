<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index(): JsonResponse
    {
        $employee = Employee::select(
            'employees.*',
            'departments.name as departments'
        )
            ->join('departments', 'departments.id', '=', 'employees.department_id')
            ->paginate(10);
        return response()->json($employee);
    }

    public function store(EmployeeRequest $request):JsonResponse
    {
        Employee::create($request->input());
        return response()->json([
            'status' => true,
            'message' => 'Employee created successfully'
        ], 201);
    }
    function show(Employee $employee):JsonResponse
    {
        return response()->json([
            'status' => true,
            'data' => $employee
        ]);
    }

    public function update(EmployeeRequest $request, Employee $employee):JsonResponse
    {
        $employee->update($request->input());
        return response()->json([
            'status' => true,
            'message' => 'Employee updated successfully'
        ],200);
    }

    public function destroy(Employee $employee): JsonResponse
    {
        $employee->delete();
        return response()->json([
            'status'=> true,
            'message'=> 'Employee deleted successfully'
        ],200);
    }

    public function EmployeesByDepartment() : JsonResponse {
        $employees = Employee::selectRaw('count(employees.id) as count, departments.name')
        ->rightJoin('departments', 'departments.id', '=', 'employees.department_id')
        ->groupBy('departments.name')
        ->get();
        return response()->json($employees);
     }
     public function all() : JsonResponse {
        $employee = Employee::select(
            'employees.*',
            'departments.name as departments'
        )
            ->join('departments', 'departments.id', '=', 'employees.department_id')
            ->get();
        return response()->json($employee);
     }
}
