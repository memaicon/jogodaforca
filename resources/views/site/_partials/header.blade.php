<header class="top_panel_wrap top_panel_style_4 scheme_original">
    <div class="top_panel_wrap_inner top_panel_inner_style_4 top_panel_position_above">
        <div class="top_panel_top">
            <div class="content_wrap clearfix">
                <div class="top_panel_top_contact_area">
                    Aproveite e se divirta!
                </div>
                <div class="top_panel_top_user_area">
                    <ul class="menu_user_nav" id="menu_user">
                        @if(!Auth::user())
                        <li class="menu_user_register">
                            <a class="popup_link popup_register_link icon-edit27 inited" href="#popup_registration">Cadastrar</a>
                        </li>
                        <li class="menu_user_login">
                            <a class="popup_link popup_login_link icon-lock29 inited" href="#popup_login">Entrar</a>
                        </li>
                        @else
                        <li class="menu_user_register">
                            <a class="icon-edit27 inited" href="javascript:void(0)">Olá, {{ Auth::user()->name }}.</a>
                        </li>
                        <li class="menu_user_login">
                            <a class="icon-lock29 inited" href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()">Sair</a>
                        </li>
                        <form id="logout-form" action="{{ route('custom-logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="top_panel_middle">
            <div class="content_wrap">
                <div class="columns_wrap">
                    <div class="contact_logo column-1_4">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img alt="" class="logo_main" height="74" src="{{ asset('assets/images/logo.png') }}" width="121">
                                <img alt="" class="logo_fixed" height="74" src="{{ asset('assets/images/logo.png') }}" width="121">
                            </a>
                        </div>
                    </div>
                    <div class="menu_main_wrap column-3_4">
                        <nav class="menu_main_nav_area menu_hover_fade">
                            <ul id="menu_main" class="menu_main_nav">
                                <li class="menu-item @if(Request()->is('/')) current-menu-ancestor @endif"><a href="{{ route('home') }}"><span>Início</span></a></li>
                                <li class="menu-item menu-item-has-children"><a href="#"><span>Jogar Agora</span></a>
                                    <ul class="sub-menu">
                                        <li class="menu-item @if(Request()->is('jogar')) current-menu-ancestor @endif"><a href="{{ route('play') }}"><span>Jogar (Modo Normal)</span></a></li>
                                        <li class="menu-item @if(Request()->is('jogar/contra-o-tempo')) current-menu-ancestor @endif"><a href="{{ route('playTime') }}"><span>Jogar (Modo Contador)</span></a></li>
                                    </ul>
                                </li>
                                <li class="menu-item @if(Request()->is('ranking')) current-menu-ancestor @endif"><a href="{{ route('ranking') }}"><span>Ranking</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header_mobile">
    <div class="content_wrap">
        <div class="menu_button icon-menu"></div>
        <div class="logo">
            <a href="{{ route('home') }}">
                <img alt="" class="logo_main" height="74" src="{{ asset('assets/images/logo.png') }}" width="121">
            </a>
        </div>
    </div>
    <div class="side_wrap">
        <div class="close">
            Fechar
        </div>
        <div class="panel_top">
            <nav class="menu_main_nav_area">
                <ul id="menu_mobile" class="menu_main_nav">
                    <li class="menu-item"><a href="{{ route('home') }}"><span>Início</span></a></li>
                    <li class="menu-item menu-item-has-children"><a href="#"><span>Jogar Agora</span></a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="{{ route('home') }}"><span>Jogar (Modo Normal)</span></a></li>
                            <li class="menu-item"><a href="{{ route('home') }}"><span>Jogar (Modo Contador)</span></a></li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="{{ route('home') }}"><span>Ranking</span></a></li>
                </ul>
            </nav>
            <div class="login">
                <a href="#popup_login" class="popup_link popup_login_link icon-user">Entrar</a>
            </div>
            <div class="login">
                <a href="#popup_registration" class="popup_link popup_register_link icon-pencil">Cadastrar</a>
            </div>
        </div>
        <div class="panel_bottom"></div>
    </div>
    <div class="mask"></div>
</div>

<div class="popup_wrap popup_registration" id="popup_registration">
    <a class="popup_close" href="#"></a>
    <div class="form_wrap">
        <form class="popup_form registration_form" id="registration_form" method="post" name="registration_form" action="{{ route('custom-register') }}">
            <input name="csrf_token" type="hidden" value="">
            {!! csrf_field() !!}
            <div class="form_left">
                <div class="popup_form_field login_field iconed_field icon-user">
                    <input id="registration_username" name="name" placeholder="Nome ou Usuário" type="text" value="">
                </div>
                <div class="popup_form_field email_field iconed_field icon-mail">
                    <input id="registration_email" name="email" placeholder="E-mail" type="text" value="">
                </div>
            </div>
            <div class="form_right">
                <div class="popup_form_field password_field iconed_field icon-lock">
                    <input id="registration_pwd" name="password" placeholder="Senha" type="password" value="">
                </div>
                <div class="popup_form_field password_field iconed_field icon-lock">
                    <input id="registration_pwd2" name="password_confirmation" placeholder="Confirmar Senha" type="password" value="">
                </div>
            </div>
            <div class="popup_form_field submit_field">
                <input class="submit_button" type="submit" value="Cadastrar">
            </div>
        </form>
        <div class="result message_block"></div>
    </div>
</div>

<div class="popup_wrap popup_login" id="popup_login">
    <a class="popup_close" href="#"></a>
    <div class="form_wrap">
        <div class="form_left">
            <form class="popup_form login_form" id="login_form" method="post" name="login_form" action="{{ route('custom-login') }}">
                {!! csrf_field() !!}
                <div class="popup_form_field login_field iconed_field icon-user">
                    <input id="log" name="email" placeholder="E-mail" type="text" value="">
                </div>
                <div class="popup_form_field password_field iconed_field icon-lock">
                    <input id="password" name="password" placeholder="Senha" type="password" value="">
                </div>
                <div class="popup_form_field remember_field">
                    <input id="rememberme" name="remember" type="checkbox" value="forever">
                    <label for="rememberme">Lembrar</label>
                </div>
                <div class="popup_form_field submit_field">
                    <input class="submit_button" type="submit" value="Entrar">
                </div>
            </form>
        </div>
        <div class="form_right">
            <div class="login_socials_title">
                Diversão garantida!
            </div>
        </div>
    </div>
</div>