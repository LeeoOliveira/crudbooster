<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>Edit Form</div>
    <div class='panel-body'>
      <form method='post' action='{{CRUDBooster::mainpath('edit-save/'.$row->id)}}'>
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class='form-group'>
          <label>Name</label>
          <input type='text' name='nome' required class='form-control' value='{{$row->nome}}'/>
        </div>
        <div class='form-group'>
          <label>Descrição</label>
          <input type='text' name='descricao' required class='form-control' value='{{$row->descricao}}'/>
        </div>
        <div class='form-group'>
          <label>Preco</label>
          <input type='text' name='preco' required class='form-control' value='{{$row->preco}}'/>
        </div>
        <div class='form-group'>
          <label>Preco</label>
        </div>
   
        <div class='form-group'>
          <label>Categoria</label>
          <select type='select' name='select' required class='form-control'>
          <option value="{{ $row->nome_categoria }}">{{ $row->nome_categoria }}</option>
          
          
            @foreach($categorias as $categoria)
            <option value="{{ $categoria->nome }}"> {{ $categoria->nome }}</option>
            @endforeach
          </select>
        </div>
         
        <!-- etc .... -->
        <div class='panel-footer'>
            <input type='submit' class='btn btn-primary' value='Salvar Alterações'/>
        </div>
        
      </form>
    </div>
  </div>
@endsection