@extends('dashboard.templates.edit')

@section('title', 'Nova Configuração')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">

            <form role="form" method="post" action="{{ route('configs.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
                @if ($errors->has('nome'))
    							<span class="help-block">
    								<strong>{{ $errors->first('nome') }}</strong>
    							</span>
    						@endif
              </div>

              <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                <label for="nome">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao">
                @if ($errors->has('descricao'))
    							<span class="help-block">
    								<strong>{{ $errors->first('descricao') }}</strong>
    							</span>
    						@endif
              </div>

              <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                <label for="type_pessoa_id">Tipo</label>
                <select class="form-control" id="type_id" name="type_id" placeholder="Tipo">
                  @foreach(\App\Models\Config\type::all() as $item)
                      <option value="{{ $item->id }}">{{ $item->nome }}</option>
                  @endforeach
                </select>
                @if ($errors->has('type_id'))
    							<span class="help-block">
    								<strong>{{ $errors->first('type_id') }}</strong>
    							</span>
    						@endif
              </div>

              <div class="form-group valores" id="config-1">
                <label for="cidade">Valor</label>
                <input type="text" class="form-control" id="valor" name="valor" value="">
              </div>
              <div class="checkbox valores" id="config-2">
                <label>
                  <input type="checkbox" name="active" value="1"> Habilitado
                </label>
              </div>
              <div class="form-group valores" id="config-3">
                <label for="exampleInputFile">Valor</label>
                <input type="file" class="form-control" id="valor" name="valor"/>
              </div>

              <div class="checkbox">
                <label>
                  <input type="checkbox" name="active" value="1" checked> Ativo
                </label>
              </div>
            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-success">Salvar</button>
            </div>
          </form>

        </div>
    </div>
</div>

@stop

@section('js')

  <script>

    function habilitarValor() {

      $('.valores').hide();

      var type = $("#type_id").val();

      $("#config-"+type).show();

    }

    $(document).ready(function() {

      habilitarValor();

      $("#type_id").change(function() {
        habilitarValor();
      });

    });

  </script>

@stop
