<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name=viewport content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {!! SEO::generate() !!}

        <link property="stylesheet" rel='stylesheet' href='{{ asset('assets/js/vendor/essgrid/settings.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700|Fredoka+One|Open+Sans:300,400,600,700,800|Raleway:100,200,300,400,500,600,700,800,900|Ubuntu:300,300i,400,400i,500,500i,700,700i&#038;ver=4.6.3' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/js/vendor/revslider/settings.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/js/vendor/woo/woocommerce-layout.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/js/vendor/woo/woocommerce-smallscreen.css') }}' type='text/css' media='only screen and (max-width: 768px)' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/js/vendor/woo/woocommerce.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/css/socials.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/css/fontello/css/fontello.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/css/style.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/css/core.animation.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/css/theme.shortcodes.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/css/theme.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/js/vendor/woo/plugin.woocommerce.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/css/responsive.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/js/vendor/mediaelement/mediaelementplayer.min.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/js/vendor/grid.layout/grid.layout.min.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/css/custom/custom.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/css/custom/plugins.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/css/core.messages.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/js/vendor/magnific/magnific-popup.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/js/vendor/swiper/swiper.min.css') }}' type='text/css' media='all' />
		<link property="stylesheet" rel='stylesheet' href='{{ asset('assets/js/vendor/essgrid/lightbox.css') }}' type='text/css' media='all' />

        <link rel="shortcut icon" href="{{ route('image',['link'=>\App\Helpers\Helper::config('favicon-aplicacao')]) }}">
    </head>
    
    <body class="home page body_filled scheme_original top_panel_above sidebar_hide">
        <div class="body_wrap">
            <div class="page_wrap">
                <div class="top_panel_fixed_wrap"></div>
                @include('site._partials.header')
                @if(Request()->is('/'))
                    @include('site._partials.banner')
                @else
                    <div class="top_panel_title top_panel_style_6 title_present scheme_original">
                        <div class="top_panel_title_inner top_panel_inner_style_6 title_present_inner">
                            <div class="content_wrap">
                                <h1 class="page_title no_breadcrumbs">@yield('title')</h1>
                            </div>
                        </div>
                    </div>
                @endif
                    
                <div class="page_content_wrap page_paddings_no">
                    <div class="content_wrap">
                        <div class="content">
                            @yield('content')
                        </div>
                    </div>
                </div>

                @include('site._partials.footer')
            </div>
        </div>

        <script type='text/javascript' src='{{ asset('assets/js/vendor/jquery/jquery.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/jquery/jquery-migrate.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/custom/custom.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/essgrid/lightbox.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/essgrid/jquery.themepunch.tools.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/essgrid/jquery.themepunch.essential.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/revslider/jquery.themepunch.revolution.min.js') }}'></script>
		<script type="text/javascript" src='{{ asset('assets/js/vendor/revslider/extensions/revolution.extension.slideanims.min.js') }}'></script>
		<script type="text/javascript" src='{{ asset('assets/js/vendor/revslider/extensions/revolution.extension.actions.min.js') }}'></script>
		<script type="text/javascript" src='{{ asset('assets/js/vendor/revslider/extensions/revolution.extension.layeranimation.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/woo/add-to-cart.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/woo/woocommerce-add-to-cart.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/photostack/modernizr.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/woo/jquery.blockUI.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/woo/woocommerce.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/woo/jquery.cookie.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/woo/cart-fragments.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/superfish.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/custom/jquery/core.utils.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/custom/jquery/core.init.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/custom/jquery/theme.init.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/mediaelement/mediaelement-and-player.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/custom/jquery/theme.shortcodes.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/custom/jquery/core.messages.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/magnific/jquery.magnific-popup.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/grid.layout/grid.layout.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/swiper/swiper.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/ui/core.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/ui/widget.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/ui/tabs.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/ui/effect.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/ui/effect-fade.min.js') }}'></script>
		<script type='text/javascript' src='{{ asset('assets/js/vendor/isotope/isotope.pkgd.min.js') }}'></script>
        
        <script>
            console.log('%c Jogo da Forca', 'font-weight: bold; font-size: 50px;color: rgb(238,48,47);');
            console.log('%c Desenvolvido por Maicon Esperafico, Eduardo Solka e Andrey Oliveira', 'font-weight: bold; font-size: 18px;color: #444349;');
        </script>
        
        @yield('scripts')
    </body>
</html>