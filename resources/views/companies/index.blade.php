@extends('layouts.app')

@section('content')
<div class="card uper">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <h3>Lista de empresas</h3>
                </div>
                <div class="col-md-3">
                    <form action="/search-companie" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" id="search" placeholder="Buscar empresas..." />
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('companies.create')}}" class="btn btn-primary">Nova empresa</a>
                </div>
            </div>
        </div>
    </div>
  
    <table class="table">
        <tr>
        <th>ID</th>
        <th>Logo</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Site</th>
        <th width="130px">Ações</th>
        </tr>
        
            @foreach($companies as $companie)
            <tr>
                <td>{{$companie->id}}</th>
                <td><img src="{{ url("storage/logos/{$companie->logo}") }}" class="img-thumbnail" style="width: 90px; height: 90px;"></td>
                <td>{{$companie->name}}</td>
                <td>{{$companie->email}}</td>
                <td>{{$companie->site}}</td>
                <td>
                    <form action="{{ route('companies.destroy', $companie->id)}}" method="post">
                        <a href="{{ route('companies.edit', $companie->id)}}" class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="ConfirmDelete()"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
    {!! $companies->links() !!}
</div>

<script>

  function ConfirmDelete()
  {
  var x = confirm("Todos os funcionários também serão excluídos. Deseja excluir esta empresa?");
  if (x){
    return true;
  }
  else{
      event.preventDefault();
      return false;
  }
    
  }

</script>

@endsection
