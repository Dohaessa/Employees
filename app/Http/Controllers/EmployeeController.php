<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $emps= Employee::all();
        return view('employees.index' , compact('emps'));
    }

    
    public function create()
    {
        return view ('employees.create');
    }

   
    public function store(Request $request)
    {

        $this->validate($request,[
            'txtName' => 'required|max:50|min:5',
            'txtJob' => 'required|max:50|min:5',
            'txtCity' => 'required',
        ]);

        $emp = new Employee ();
        $emp ->name =$request->input('txtName');
        $emp ->job =$request->input('txtJob');
        $emp ->city =$request->input('txtCity');

        if($request->hasFile('flImage')){
            $file = $request->file('flImage');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('uploads/images/employees',$fileName);   //uplode
    
            $emp->image = $fileName;  // save in database
           }  // images
        $emp-> save();


        return redirect('employees')->with('success', 'Data Inserted');

    
        
    }

   
    public function show(Employee $employee)
    {
        //
    }

    
    public function edit($id)
    {
        $emp= Employee::find($id);
        return view('employees.edit', compact('emp', 'id'));
    }

    
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'txtName' => 'required|max:50|min:5',
            'txtJob' => 'required|max:50|min:5',
            'txtCity' => 'required',
        ]);

        $emp= Employee::find($id);

        $emp ->name =$request->input('txtName');
        $emp ->job =$request->input('txtJob');
        $emp ->city =$request->input('txtCity');     
        $emp-> save();


        return redirect('employees')->with('success', 'Data Updated');


    }

    
    public function destroy($id)
    {
        $emp= Employee::find($id);
        $emp-> delete();
        return redirect('employees')->with('success', 'Data Deleted');
       
    }
}
