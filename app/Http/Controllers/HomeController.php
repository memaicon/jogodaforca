<?php

namespace App\Http\Controllers;

use SEOMeta;
use OpenGraph;
use Cookie;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * Show the application home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //SEO Configurations
        $title = 'Ulbra 2019/2'; // Max 50 Characteres
        $description = 'Jogo da Forca - Desenvolvido por Maicon Esperafico, Eduardo Solka e Andrey Oliveira'; // Max 160 Characteres
        SEOMeta::setTitle(\App\Helpers\Helper::config('nome-aplicacao') . ' - ' . $title);
        SEOMeta::setDescription($description);
        SEOMeta::setCanonical(config('app.url'));

        OpenGraph::setDescription($description);
        OpenGraph::setTitle(\App\Helpers\Helper::config('nome-aplicacao') . ' - ' . $title);
        OpenGraph::setUrl(config('app.url'));
        OpenGraph::addProperty('site_name', \App\Helpers\Helper::config('nome-aplicacao'));
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('type', 'website');

        return view('site.index')->withTitle($title);
    }

}
