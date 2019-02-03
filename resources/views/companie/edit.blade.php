@extends('layouts.app')

@section('content')

<div class="card uper">
  <div class="card-header"><h3>Atualizar empresa</h3></div>
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
      <form method="post" action="{{ route('companies.update', $companie->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

          <div class="form-group">
          <img src="{{ url("storage/logos/{$companie->logo}") }}" class="img-thumbnail" style="width: 120px; height: 120px;">
          </div>
          <div class="form-group">
              <label for="name">Nome da empresa:</label>
              <input type="text" class="form-control" name="name" value="{{ $companie->name }}" />
          </div>
          <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="email" class="form-control" name="email" value="{{ $companie->email }}" />
          </div>
          <div class="form-group">
              <label for="logo">Logo:</label>
              <input type="file" class="form-control-file" name="newLogo" />
          </div>
          <div class="form-group">
              <label for="site">Site:</label>
              <input type="text" class="form-control" name="site" value="{{ $companie->site }}" />
          </div>
          <button type="submit" class="btn btn-primary">Atualizar</button>
          <a href="{{ route('home')}}" class="btn btn-secondary">Cancelar</a>
      </form>
  </div>
</div>
@endsection