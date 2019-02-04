@extends('layouts.app')

@section('content')
<div class="card uper">
  <div class="card-header"><h3>Adicionar empresa</h3></div>
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
      <form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="name">Nome da empresa:</label>
              <input type="text" class="form-control" name="name" />
          </div>
          <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="logo">Logo:</label>
              <input type="file" class="form-control-file" name="logo"/>
          </div>
          <div class="form-group">
              <label for="site">Site:</label>
              <input type="text" class="form-control" name="site"/>
          </div>
          <button type="submit" class="btn btn-primary">Adicionar</button>
          <a href="{{ route('companies.index')}}" class="btn btn-secondary">Voltar</a>
      </form>
  </div>  
</div>
@endsection