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
                @foreach($companies as $companie)
                    <option value="{{$companie->id}}">{{$companie->name}}</option>
                @endforeach
                </optgroup>
            </select>
        </div>
          <button type="submit" class="btn btn-primary">Adicionar</button>
      </form>
  </div>
  <div class="card-header"><h3>Lista de funcionários</h3></div>
  <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefone</th>
            <th scope="col">CPF</th>
            <th scope="col">Empresa</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
            <th scope="row">{{$employee->id}}</th>
            <td>{{$employee->name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone_number}}</td>
            <td>{{$employee->cpf}}</td>
            <td>{{$employee->company_id}}</td>
            <td>
                <a href="{{ route('employees.edit', $employee->id)}}" class="btn btn-warning">
                    <i class="fas fa-pencil-alt"></i>
                </a>
            </td>
            <td>
                <form action="{{ route('employees.destroy', $employee->id)}}" method="post">
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