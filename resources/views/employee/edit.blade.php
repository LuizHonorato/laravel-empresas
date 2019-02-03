@extends('layouts.app')

@section('content')
<div class="card uper">
  <div class="card-header"><h3>Atualizar funcionário</h3></div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('employees.update', $employee->id) }}">
        @method('PATCH')
        @csrf
          <div class="form-group">
              <label for="name">Nome do funcionário:</label>
              <input type="text" class="form-control" name="name" value="{{ $employee->name }}"/>
          </div>
          <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="email" class="form-control" name="email" value="{{ $employee->email }}" />
          </div>
          <div class="form-group">
              <label for="phone_number">Telefone:</label>
              <input type="text" class="form-control" name="phone_number" value="{{ $employee->phone_number }}" />
          </div>
          <div class="form-group">
              <label for="cpf">CPF:</label>
              <input type="text" class="form-control" name="cpf" value="{{ $employee->cpf }}" />
          </div>
          <div class="form-group">
            <label for="company_id">Empresa</label>
            <select class="form-control" id="company_id" name="company_id">
                <optgroup label="Selecione uma empresa">
                @foreach($companies as $companie)
                    <option value="{{$companie->id}}">{{$companie->name}}</option>
                @endforeach
                </optgroup>
            </select>
        </div>
          <button type="submit" class="btn btn-primary">Atualizar</button>
          <a href="{{ route('home')}}" class="btn btn-secondary">Cancelar</a>
      </form>
  </div>
</div>
@endsection