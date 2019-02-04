@extends('layouts.app')

@section('content')
<div class="card uper">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <h3>Lista de funcionários</h3>
                </div>
                <div class="col-md-3">
                    <form action="/search-employee" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" id="search" placeholder="Buscar funcionários..." />
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('employees.create')}}" class="btn btn-primary">Novo funcionário</a>
                </div>
            </div>
        </div>
    </div>
    <table class="table">
            <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Empresa</th>
            <th width="150px">Ações</th>
            </tr>
        
            @foreach($employees as $employee)
            <tr>
            <td>{{$employee->id}}</th>
            <td>{{$employee->name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone_number}}</td>
            <td>{{$employee->cpf}}</td>
            <td>{{$employee->company_id}}</td>
            <td>
                <form action="{{ route('employees.destroy', $employee->id)}}" method="post">
                    <a href="{{ route('employees.edit', $employee->id)}}" class="btn btn-warning">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
            </tr>
            @endforeach
    </table>
    {!! $employees->links() !!}
</div>

@endsection