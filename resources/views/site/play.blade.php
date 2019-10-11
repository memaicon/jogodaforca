@extends('site.layout.layout')

@section('title', $title)

@section('content')

<br/>
<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <h2 class="sc_title sc_title_regular">Escolha uma Categoria</h2>
                <div class="sc_section sc_section_block sc_section_1">
                    <div class="sc_section_inner">
                        <div class="sc_section_content_wrap">
                            <a href="{{ route('playNow', 'geral') }}" class="sc_button sc_button_round sc_button_style_filled sc_button_size_large sc_button_color_1 large">Geral</a>
                            @foreach ($categories as $categorie)
                                @php $color = rand(1, 4); @endphp
                                <a href="{{ route('playNow', str_slug($categorie->name)) }}" class="sc_button sc_button_round sc_button_style_filled sc_button_size_large sc_button_color_{{$color}} large">{{ $categorie->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>

@endsection