@extends('site.layout.layout')

@section('title', $title)

@section('content')

<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div class="sc_table widthfull">
                    <br/>
                    <table>
                        <tbody>
                        <tr>
                            <td>#</td>
                            <td>Nome do Jogador</td>
                            <td>Pontos (Modo Normal)</td>
                            <td>Pontos (Modo Contador)</td>
                        </tr>
                        @foreach ($rankings as $ranking)
                            <tr>
                                <td>#{{ $loop->index + 1 }}</td>
                                <td>{{ $ranking->name }}</td>
                                <td>{{ $ranking->points }}</td>
                                <td>{{ $ranking->points_hard }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <p>
                </div>
                <div class="vc_empty_space em_height_3">
                    <span class="vc_empty_space_inner"></span>
                </div>
                <div class="sc_line sc_line_position_center_center sc_line_style_solid"></div>
                <div class="vc_empty_space em_height_3">
                    <span class="vc_empty_space_inner"></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection