@extends('dashboard.templates.index')

@section('title', 'Ranking')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h6 class="m-t-0">Lista</h6>
            <div class="table-responsive">
                <table class="table table-hover mails m-0 table table-actions-bar">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Pontos</th>
                        <th>Pontos Hard</th>
                        <th style="width:100px">Ações</th>
                    </tr>
                    </thead>

                    <tbody>
                      @foreach($rankings as $ranking)
                        <tr>
                            <td> {{ $ranking->name }} </td>
                            <td> {{ $ranking->points }} </td>
                            <td> {{ $ranking->points_hard }} </td>
                            <td>
                                <a class="btn btn-danger btn-sm btnRemoveItem" data-route="{{ route('ranking.destroy', $ranking->id) }}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                {{ $rankings->links() }}
            </div>
        </div>
    </div>
</div>

@stop