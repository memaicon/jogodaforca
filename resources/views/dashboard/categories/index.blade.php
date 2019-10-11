@extends('dashboard.templates.index')

@section('title', 'Categorias')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <a href="{{ route('categorias.create') }}" class="btn btn-success">Nova Categoria</a>
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
                        <th style="width:100px">Ações</th>
                    </tr>
                    </thead>

                    <tbody>
                      @foreach($categories as $categorie)
                        <tr>
                            <td> {{ $categorie->name }} </td>
                            <td>
                                <a href="{{ route('categorias.edit', $categorie->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm btnRemoveItem" data-route="{{ route('categorias.destroy', $categorie->id) }}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

@stop