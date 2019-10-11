@extends('dashboard.templates.index')

@section('title', 'Aparência')

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default hover-effect">
            <div class="panel-heading p-0">
                <img style="width:264px:height:264px" src="{{ route('image',['link'=>$logo->valor]) }}" class="img-thumbnail" alt="">
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="clearfix col-lg-4 col-md-3 col-sm-12">
                        <h6 class="m-t-0 m-b-5">Logo</h6>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 p-t-20">
                        <a href="{{ route('configs.edit', $logo->id) }}" class="btn btn-info btn-sm pull-right">Alterar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-default hover-effect">
            <div class="panel-heading p-0 text-center">
                <img style="width:128px:height:128px;max-width:128px" src="{{ route('image',['link'=>$logo2->valor]) }}" class="img-thumbnail" alt="">
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="clearfix col-lg-4 col-md-3 col-sm-12">
                        <h6 class="m-t-0 m-b-5">Favicon</h6>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 p-t-20">
                        <a href="{{ route('configs.edit', $logo2->id) }}" class="btn btn-info btn-sm pull-right">Alterar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-default hover-effect">
            <div class="panel-heading p-0">
                <img style="width:264px:height:264px" src="{{ route('image',['link'=>$site->valor]) }}" class="img-thumbnail" alt="">
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="clearfix col-lg-4 col-md-3 col-sm-12">
                        <h6 class="m-t-0 m-b-5">Logo Site</h6>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 p-t-20">
                        <a href="{{ route('configs.edit', $site->id) }}" class="btn btn-info btn-sm pull-right">Alterar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-default hover-effect">
            <div class="panel-heading p-0">
                <img style="width:264px:height:264px" src="{{ route('image',['link'=>$footer->valor]) }}" class="img-thumbnail" alt="">
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="clearfix col-lg-4 col-md-3 col-sm-12">
                        <h6 class="m-t-0 m-b-5">Logo Footer</h6>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 p-t-20">
                        <a href="{{ route('configs.edit', $footer->id) }}" class="btn btn-info btn-sm pull-right">Alterar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')

  <script>
      $('#file').change(function() {
        $('#target').submit();
      });
  </script>

@stop
