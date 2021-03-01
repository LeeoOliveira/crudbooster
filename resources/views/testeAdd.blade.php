<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>Adicionar Produtos</div>
    <div class='panel-body'>
      <form method='post' action='{{CRUDBooster::mainpath('add-save')}}'>
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class='form-group'>
          <label>Nome do Produto</label>
          <input type='text' name='nome' required class='form-control'/>
        </div>
        <div class='form-group'>
          <label>Descrição</label>
          <input type='text' name='descricao' required class='form-control'/>
        </div>
        <div class='form-group'>
          <label>Preço</label>
          <input type='text' name='preco' required class='form-control'/>
        </div>
        <div class='form-group'>
          <label>Categoria</label>
          <select type='select' name='select' required class='form-control'>
          <option value=""></option>
            @foreach($categorias as $categoria)
            <option value="{{ $categoria->nome }}"> {{ $categoria->nome }}</option>
            @endforeach
          </select>
        </div>
         
        <!-- etc .... -->
        <div class='panel-footer'>
          <input type='submit' class='btn btn-primary' value='Save changes'/>
        </div>
      </form>
    </div>
  </div>
@endsection