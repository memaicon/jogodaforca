@extends('adminlte::page')

@section('title', 'Painel Principal')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box widget-inline">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="widget-inline-box text-center">
                        <h3 class="m-t-10"><i class="text-custom mdi mdi-playlist-check"></i> <b>{{ $categoriesCount }}</b></h3>
                        <p class="text-muted">Qntd. Categorias</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="widget-inline-box text-center">
                        <h3 class="m-t-10"><i class="text-custom mdi mdi-playlist-edit"></i> <b>{{ $wordsCount }}</b></h3>
                        <p class="text-muted">Qntd. Palavras</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="widget-inline-box text-center">
                        <h3 class="m-t-10"><i class="text-custom mdi mdi-account"></i> <b>{{ $accountsCount }}</b></h3>
                        <p class="text-muted">Qntd. Contas</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@stop

@section('js')

<script src="{{ asset('dashboard/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/raphael/raphael-min.js') }}"></script>

<script src="{{ asset('dashboard/pages/jquery.dashboard.js') }}"></script>
@stop