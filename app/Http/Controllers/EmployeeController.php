<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Companie;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'cpf' => 'required',
            'company_id' => 'required'
        ]);
        $employee = new Employee([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'cpf' => $request->get('cpf'),
            'company_id' => $request->get('company_id')            
        ]);
        $employee->save();
        return redirect('/home')->with('success', 'Empresa adicionada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'cpf' => 'required',
            'company_id' => 'required'
        ]);

        $companie = Employee::find($id);
        $companie->name = $request->get('name');
        $companie->email = $request->get('email');
        $companie->phone_number = $request->get('phone_number');
        $companie->cpf = $request->get('cpf');
        $companie->company_id = $request->get('company_id');

        $companie->save();
        return redirect('/home')->with('success', 'Funcionário atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('/home')->with('success', 'Funcionário excluído com sucesso.');
    }
}
