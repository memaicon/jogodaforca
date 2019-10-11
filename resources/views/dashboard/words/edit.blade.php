@extends('dashboard.templates.create')

@section('title', 'Editar Palavra')

@section('content')

{!! Form::model('word', ['route' => ['palavras.update', $word->id], 'method' => 'put', 'class'=>'form-horizontal', 'role'=>'form']) !!}
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <ul class="nav nav-tabs tabs-bordered nav-justified">
                <li class="nav-item">
                    <a href="#info-b2" data-toggle="tab" aria-expanded="false" class="nav-link active show">
                        Palavra 
                    </a>
                </li>
                <li class="nav-item col-md-3">
                    <button class="btn btn-success btn-block">
                        Salvar
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active show" id="info-b2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Informações da Palavra</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="nome">Nome</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                                    </div>
                                                    {{ Form::text('name', $word->name, ['class' => 'form-control']) }}
                                                </div>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('categorie_id') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="role">Categoria</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-list"></i></span>
                                                    </div>
                                                    {{ Form::select('categorie_id', \App\Models\Categorie::pluck('name', 'id'), $word->categorie_id, ['class'=>'form-control']) }}
                                                </div>
                                                @if ($errors->has('categorie_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('categorie_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('tip_phrase') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="nome">Frase de Dica</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                                    </div>
                                                    {{ Form::text('tip_phrase', $word->tip_phrase, ['class' => 'form-control']) }}
                                                </div>
                                                @if ($errors->has('tip_phrase'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('tip_phrase') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection