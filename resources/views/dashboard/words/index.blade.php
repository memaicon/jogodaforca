@extends('dashboard.templates.index')

@section('title', 'Palavras')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <a href="{{ route('palavras.create') }}" class="btn btn-success">Nova Palavra</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h6 class="m-t-0">Lista</h6>
            <div class="table-responsive">
                <table class="table table-hover mails m-0 table table-actions-bar">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th style="width:100px">Ações</th>
                    </tr>
                    </thead>

                    <tbody>
                      @foreach($words as $word)
                        <tr>
                            <td> {{ $word->name }} </td>
                            <td> {{ $word->categorie->name ?? 'Sem Categoria' }} </td>
                            <td>
                                <a href="{{ route('palavras.edit', $word->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm btnRemoveItem" data-route="{{ route('palavras.destroy', $word->id) }}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                {{ $words->links() }}
            </div>
        </div>
    </div>
</div>

@stop