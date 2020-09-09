<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function showEmployees()
    {
    	$employees = DB::table('employees')
    	->join('departments','departments.id','=','employees.deptID')
    	->select('employees.*', 'departments.departmentCode')
    	->get();

    	return view('employees')->with('employees', $employees);
    }

    public function showUpdate($id)
    {
    	$employee = DB::table('employees')
    	->join('departments','departments.id','=','employees.deptID')
    	->select('employees.*', 'departments.departmentCode')
    	->where('employees.id',$id)
    	->first();
    	return view('update')->with('employee',$employee);
    }
}
