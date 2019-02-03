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
      </form>
  </div>
  <div class="card-header"><h3>Lista de empresas</h3></div>
  <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Logo</th>
            <th scope="col">Nome</th>
            <th scope="col">Site</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $companie)
            <tr>
            <th scope="row">{{$companie->id}}</th>
            <td><img src="{{ url("storage/logos/{$companie->logo}") }}" class="img-thumbnail" style="width: 90px; height: 90px;"></td>
            <td>{{$companie->name}}</td>
            <td>{{$companie->site}}</td>
            <td>
                <a href="{{ route('companies.edit', $companie->id)}}" class="btn btn-warning">
                    <i class="fas fa-pencil-alt"></i>
                </a>
            </td>
            <td>
                <form action="{{ route('companies.destroy', $companie->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>