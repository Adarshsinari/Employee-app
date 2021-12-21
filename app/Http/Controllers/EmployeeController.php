<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        //dd($user);
        $employees = DB::table('employees')->where('user_id',$user)->get();
        //dd($employees);
        return view('/employee',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  Validate 
         $request->validate([
            'name' => 'required',
            'department' => 'required',
            'contact' =>'required|min:10|numeric',
        ]);

        //add data in db table
        $user = Auth::user();
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->department = $request->department;
        $employee->contact = $request->contact;
        $employee->user_id = $user->id;
        
        $employee->save();
        return EmployeeController::index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee)
    {
          //  Validate 
          $request->validate([
            'name' => 'required',
            'department' => 'required',
            'contact' =>'required|min:10|numeric',
        ]);
        //update data in db table
        $user = Auth::user();
        $employee->name = $request->name;
        $employee->department = $request->department;
        $employee->contact = $request->contact;
        $employee->save();
      
        return EmployeeController::index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {   
        //delete data in db table
        $employee->delete();
        return EmployeeController::index();
    }
}
