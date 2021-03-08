<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>Adicionar Funcionário</div>
    <div class='panel-body'>
      <form method='post' action='{{CRUDBooster::mainpath('cadastrar')}}'>
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class='form-group'>
          <label>Nome</label>
          <input type='text' name='nome' required class='form-control'/>
        </div>
        <div class='form-group'>
          <label>Email</label>
          <input type='email' name='email' required class='form-control'/>
        </div>
        <div class='form-group'>
          <label>Endereço</label>
          <input type='text' name='endereco' required class='form-control'/>
        </div>
        <div class='form-group'>
          <label>Empresa</label>
          <select type='select2' name='id-empresa' required class='form-control'>
          <option value="">** Por favor, selecione uma opção **</option>
          @foreach($empresas as $empresa)
          <option value="{{$empresa->id}}">{{$empresa->nome}}</option>
          @endforeach
          </select>
        </div>
        <div class='form-group'>
          <label>Cargo</label>
          <select type='select2' name='id_cargo' required class='form-control'>
          <option value="">** Por favor, selecione uma opção **</option>
          @foreach($cargos as $cargo)
          <option value="{{$cargo->id}}">{{$cargo->cargo}}</option>
          @endforeach
          </select>
        </div>
        <div class='form-group'>
          <label>Idade</label>
          <input type='number' name='idade' required class='form-control'/>
        </div>
        <div class='form-group'>
          <label>Nascimento</label>
          <input type='date' name='nascimento' required class='form-control'/>
        </div>
        <div class='form-group'>
          <label>Salário</label>
          <input type='number' name='salario' required class='form-control'/>
        </div>
        <div class='form-group'>
          <label>Status</label>
          <select type='select2' name='id_status' required class='form-control'>
          <option value="">** Por favor, selecione uma opção **</option>
          @foreach($statuses as $status)
          <option value="{{$status->id}}">{{$status->Status}}</option>
          @endforeach
          </select>
        </div>
        <div class='form-group'>
          <label>Observação</label>
          <input type='text' name='observacao' required class='form-control'/>
        </div>
        <div class='form-group'>
          <label>Cidade</label>
          <select type='select2' name='id_cidade' required class='form-control'>
          <option value="">** Por favor, selecione uma opção **</option>
          @foreach($cidades as $cidade)
          <option value="{{$cidade->id}}">{{$cidade->Cidade}}</option>
          @endforeach
          </select>
        </div>

        <div class="text-danger"></div>
            <p class='help-block'></p>
        </div>
        <div class='panel-footer'>
            <input type='submit' name="submit" class='btn btn-primary' value='Cadastrar'/>
        </div>
        
      </form>
    </div>
  </div>
@endsection