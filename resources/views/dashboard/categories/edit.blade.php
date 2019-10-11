@extends('dashboard.templates.create')

@section('title', 'Editar Categoria')

@section('content')

{!! Form::model('categorie', ['route' => ['categorias.update', $categorie->id], 'method' => 'put', 'class'=>'form-horizontal', 'role'=>'form']) !!}
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <ul class="nav nav-tabs tabs-bordered nav-justified">
                <li class="nav-item">
                    <a href="#info-b2" data-toggle="tab" aria-expanded="false" class="nav-link active show">
                        Categoria 
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
                                    <h3 class="panel-title">Informações da Categoria</h3>
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
                                                    {{ Form::text('name', $categorie->name, ['class' => 'form-control']) }}
                                                </div>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
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