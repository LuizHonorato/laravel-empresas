<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Companie;
use Illuminate\Support\Facades\DB;
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
        $employees = Employee::paginate(10);
        return view('employees.index', ['employees' => $employees]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $employees = DB::table('employees')
                        ->where('id', 'like', '%'.$search.'%')
                        ->orWhere('name', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%')
                        ->orWhere('cpf', 'like', '%'.$search.'%')
                        ->orWhere('company_id', 'like', '%'.$search.'%')->paginate(10);

        return view('employees.index', compact('employees'));
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
        return redirect('/employees')->with('success', 'Empresa adicionada com sucesso.');
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
        return view('employees.edit', compact('employee'));
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
        return redirect('/employees')->with('success', 'Funcionário atualizada com sucesso.');
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
        return redirect('/employees')->with('success', 'Funcionário excluído com sucesso.');
    }
}
