<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>Edit Form</div>
    <div class='panel-body'>
      <form method='post' action='{{CRUDBooster::mainpath('update/'.$row->id)}}'>
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
          <label>Categoria</label>
          <select type='select' name='id_categorias' id='id_categorias' required class='form-control'>
          <option value="{{ $row->id }}">{{ $row->nome_categoria }}</option>
            @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}"> {{ $categoria->nome }}</option>
            @endforeach
          </select>
        </div>
         
        <!-- etc .... -->
        <div class='panel-footer'>
            <input type='submit' name="submit" class='btn btn-primary' value='Save'/>
        </div>
        
      </form>
    </div>
  </div>
@endsection