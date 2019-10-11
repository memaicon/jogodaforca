@extends('site.layout.layout')

@section('title', $title)

@section('content')

<br/>
<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <h2 class="sc_title sc_align_center sc_title_regular">Dica: {{ $word->tip_phrase }}</h2>
                <div class="sc_section sc_section_block sc_section_1">
                    <div class="sc_section_inner">
                        <div class="sc_section_content_wrap">
                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                <div class="column-1_2 sc_column_item">
                                    <div class="hangman-top">
                                        <div class="gallows">
                                            <svg stroke-linecap="round" viewBox="0 0 400 400">
                                                <g id="hangmanbody" fill="none" stroke="#b7b7b7" stroke-width="10"></g>
                                                <g id="gallows">
                                                    <path d="M297 71v46.7M290.5 101.2L297 99l6.7-2.2M290.5 108.6l6.6-2.2 6.7-2.2M290.5 116l6.6-2.3 6.7-2.2M284.5 155.3c-7-7-7-18 0-25l12.6-12.6 12.6 12.5c7 7 7 18.2 0 25-3.4 3.6-8 5.3-12.5 5.3s-9-1.7-12.5-5.2z" fill="none" stroke="#f7b239" stroke-width="5.8"></path>
                                                    <path d="M217.2 73.2L197.5 93l-76.8 76.7v-42L155.5 93 175.2 73h42z" fill="#b27214"></path>
                                                    <path d="M39 27h35.5v46.2H39z" fill="#b27214"></path>
                                                    <path d="M55.6 27h19v46.2h-19z" fill="#995c0d"></path>
                                                    <path d="M338 27v46.2H120.6V27H338z" fill="#b27214"></path>
                                                    <path d="M217.2 73.2L197.5 93h-42L175.2 73h42z" fill="#995c0d"></path>
                                                    <path d="M120.7 169.7v223H74.5V7.3h46.2v162.3z" fill="#b27214"></path>
                                                    <path d="M388 388c0-3-2.8-5.8-6-5.8H18c-3.2 0-6 2.7-6 6 0 3 2.8 5.8 6 5.8h364c3.2 0 6-2.7 6-6z" fill="#8b5e24"></path>
                                                </g>
                                                <g id="hangmanhead"></g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="column-1_2 sc_column_item">
                                    <div class="hangman-bottom">
                                        <ul class="words">
                                            <li class="word">{{ $wordletters }}</li>
                                            <li class="points">Pontos: <span>0</span></li>
                                        </ul>
                                        <div class="keyboard">
                                            <div>
                                                <button type="button" class="btn" value="Q">Q</button>
                                                <button type="button" class="btn" value="W">W</button>
                                                <button type="button" class="btn" value="E">E</button>
                                                <button type="button" class="btn" value="R">R</button>
                                                <button type="button" class="btn" value="T">T</button>
                                                <button type="button" class="btn" value="Y">Y</button>
                                                <button type="button" class="btn" value="U">U</button>
                                                <button type="button" class="btn" value="I">I</button>
                                                <button type="button" class="btn" value="O">O</button>
                                                <button type="button" class="btn" value="P">P</button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn" value="A">A</button>
                                                <button type="button" class="btn" value="S">S</button>
                                                <button type="button" class="btn" value="D">D</button>
                                                <button type="button" class="btn" value="F">F</button>
                                                <button type="button" class="btn" value="G">G</button>
                                                <button type="button" class="btn" value="H">H</button>
                                                <button type="button" class="btn" value="J">J</button>
                                                <button type="button" class="btn" value="K">K</button>
                                                <button type="button" class="btn" value="L">L</button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn" value="Z">Z</button>
                                                <button type="button" class="btn" value="X">X</button>
                                                <button type="button" class="btn" value="C">C</button>
                                                <button type="button" class="btn" value="V">V</button>
                                                <button type="button" class="btn" value="B">B</button>
                                                <button type="button" class="btn" value="N">N</button>
                                                <button type="button" class="btn" value="M">M</button>
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
<br/>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.2/dist/sweetalert2.all.min.js"></script>
    <script>

        function parseSVG(s) {
            var div= document.createElementNS('http://www.w3.org/1999/xhtml', 'div');
            div.innerHTML= '<svg xmlns="http://www.w3.org/2000/svg">'+s+'</svg>';
            var frag= document.createDocumentFragment();
            while (div.firstChild.firstChild)
                frag.appendChild(div.firstChild.firstChild);
            return frag;
        }

        function hangman(count) {
            var man = {
                'core': '<path id="core" d="M296.7 144.6v112"></path>',
                'leftarm': '<path id="left-arm" d="M295.5 179.7c-12 0-23.4 0-35-1.7-4.7-.7-9.7-.7-14-3-4-2.2-6-6.5-8.5-9"></path>',
                'leftarm2': '<path id="left-arm2" d="M295.5 179.7c-12 0-18.8 10.8-25 21-4.3 6.7-11 24.6-15 35.6"></path>',
                'rightarm': '<path id="right-arm" d="M296.3 179.6c13.7 0 27.5 2.8 41.2 1.4 7-.7 18.5-6.4 25.2-10.4"></path>',
                'rightarm2': '<path id="right-arm2" d="M296.3 179.6c13.7 0 20 16 24.6 24 2.2 4 4.8 19 6 32.7"></path>',
                'leftleg': '<path id="left-leg" d="M295.5 256.5c-5.7 10.4-29 23.4-31.8 25.7-4 3-17 23.3-19.6 26-1.3 1.4-4 1-7.4 1"></path>',
                'leftleg2': '<path id="left-leg2" d="M295.5 256.5c-5.2 9.4-9.7 20.4-15 30-2.5 4.6-5.8 19.7-7.8 22.8-3.2 5-4 7.5-7.6 7.5"></path>',
                'rightleg2': '<path id="right-leg2" d="M297.6 256.5c5.8 10.4 12 27.7 14 30.7 3.8 5.6 7.2 22.4 9.8 25 1.4 1.5 1.6 3 5.7 4.6"></path>',
                'head': '<circle id="head" cx="297.1" cy="121.4" fill="#b7b7b7" r="28.5"></circle>',
                'head2': '<circle id="head2" cx="297.1" cy="139.4" fill="#b7b7b7" r="28.5"></circle>',
                'eyes': '<g id="eyes" fill="none" stroke="#000" stroke-width="2"><path d="M291.6 130c-4.2 4.2-4 4.3-8.4 8.4M283.2 130c4.4 4.3 4.4 4.2 8.4 8.4"></path><path d="M311 130c-4 4.2-4 4.3-8.2 8.4M302.8 130c4.4 4.3 4.3 4.2 8.3 8.4"></path></g>'
            };

            switch(count) {
                case 1:
                    jQuery('#hangmanhead').append(parseSVG(man.head));
                    break;
                case 2:
                    jQuery('#hangmanbody').append(parseSVG(man.core));
                    break;
                case 3:
                    jQuery('#hangmanbody').append(parseSVG(man.leftarm));
                    break;
                case 4:
                    jQuery('#hangmanbody').append(parseSVG(man.rightarm));
                    break;
                case 5:
                    jQuery('#hangmanbody').append(parseSVG(man.leftleg));
                    break;
                case 6:
                    jQuery('.keyboard button').attr('disabled', '');
                    jQuery('#hangmanhead').html('');
                    jQuery('#hangmanbody').html('');
                    jQuery('#hangmanhead').append(parseSVG(man.head2));
                    jQuery('#hangmanhead').append(parseSVG(man.eyes));
                    jQuery('#hangmanbody').append(parseSVG(man.core));
                    jQuery('#hangmanbody').append(parseSVG(man.leftarm2));
                    jQuery('#hangmanbody').append(parseSVG(man.rightarm2));
                    jQuery('#hangmanbody').append(parseSVG(man.leftleg2));
                    jQuery('#hangmanbody').append(parseSVG(man.rightleg2));
                    break;
                default:
                    break;
            }

            console.log(count);
        }

        jQuery('button').on('click', function(e) {
            e.preventDefault();
            var element = jQuery(this);
            element.attr('disabled', '');

            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    _method: 'POST',
                    letter: this.value
                },
                url: '{{ route('submitLetter') }}',
                type: 'POST',
                dataType: 'json',

            }).done(function(data) {
                jQuery('li.word').html(data.wordletters);
                jQuery('li.points span').html(data.points);

                if(data.error) {
                    element.addClass('btn-danger');
                    hangman(data.errors);
                } else {
                    element.addClass('btn-success');
                }

                if(data.gameover) {
                    setTimeout(function() {
                        swal({
                            title: 'Ops! Não foi dessa vez!',
                            text: "Deseja iniciar outro jogo?",
                            type: 'error',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Sim',
                            cancelButtonText: 'Cancelar',
                            allowOutsideClick: false,
                            allowEscapeKey : false,
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            } else {
                                swal({
                                    title: 'Obrigado por jogar!',
                                    text: 'Aguarde. Você será redirecionado para a página inicial.',
                                    type: 'success',
                                    showConfirmButton: false,
                                });
                                setTimeout(function() {
                                    location.href = '{{route("home")}}';
                                }, 2500);
                            }
                        });
                    }, 1500);
                }

                if(data.wingame) {
                    swal({
                        title: 'Parabéns, você acertou!',
                        text: "Deseja iniciar outro jogo?",
                        type: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sim',
                        cancelButtonText: 'Cancelar',
                        allowOutsideClick: false,
                        allowEscapeKey : false,
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        } else {
                            swal({
                                title: 'Obrigado por jogar!',
                                text: 'Aguarde. Você será redirecionado para a página inicial.',
                                type: 'success',
                                showConfirmButton: false,
                            });
                            setTimeout(function() {
                                location.href = '{{route("home")}}';
                            }, 2500);
                        }
                    });
                }
            });
        });
    </script>

@endsection