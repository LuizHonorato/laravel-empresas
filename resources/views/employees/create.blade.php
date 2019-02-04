@extends('layouts.app')

@section('content')

<div class="card uper">
<div class="card-header"><h3>Adicionar funcionário</h3></div>
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
      <form method="post" action="{{ route('employees.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Nome do funcionário:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="phone_number">Telefone:</label>
              <input type="text" class="form-control" name="phone_number"/>
          </div>
          <div class="form-group">
              <label for="cpf">CPF:</label>
              <input type="text" class="form-control" name="cpf"/>
          </div>
          <div class="form-group">
            <label for="company_id">Empresa</label>
            <select class="form-control" id="company_id" name="company_id">
            <option value=""> -- </option>
                <optgroup label="Selecione uma empresa">
                @foreach($companie as $companieList)
                    <option value="{{$companieList->id}}">{{$companieList->name}}</option>
                @endforeach
                </optgroup>
            </select>
        </div>
          <button type="submit" class="btn btn-primary">Adicionar</button>
          <a href="{{ route('employees.index')}}" class="btn btn-secondary">Voltar</a>
      </form>
  </div>
</div>
@endsection