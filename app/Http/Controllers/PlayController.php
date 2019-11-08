<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Categorie, Word};
use App\User;
use Auth;
use SEOMeta;

class PlayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function play()
    {
        $categories = Categorie::get();
            
        //SEO Configurations
        $title = 'Jogar (Modo Normal)'; // Max 50 Characteres
        $description = 'Jogo da Forca - Desenvolvido por Maicon Esperafico, Eduardo Solka e Andrey Oliveira'; // Max 160 Characteres
        SEOMeta::setTitle(\App\Helpers\Helper::config('nome-aplicacao') . ' - ' . $title);
        SEOMeta::setDescription($description);

        return view('site.play', compact('categories'))->withTitle($title);
    }

    /**
     * Display the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function playNow($slug)
    {
        $categorie = Categorie::where('name', 'like', '%' . $slug . '%' )->first();
        
        if($slug == 'geral') {
            $word = Word::inRandomOrder()->first();
            $categorie = 'Geral';
        } else {
            $word = Word::where('categorie_id', $categorie->id)->inRandomOrder()->first();
            $categorie = $word->categorie->name;
        }
            
        //SEO Configurations
        $title = 'Jogando (Modo Normal) categoria: ' . $categorie; // Max 50 Characteres
        $description = 'Jogo da Forca - Desenvolvido por Maicon Esperafico, Eduardo Solka e Andrey Oliveira'; // Max 160 Characteres
        SEOMeta::setTitle(\App\Helpers\Helper::config('nome-aplicacao') . ' - ' . $title);
        SEOMeta::setDescription($description);

        $wordletters = \App\Helpers\Helper::wordLetters(str_slug($word->name));

        return view('site.playing', compact('word', 'wordletters' ))->withTitle($title);
    }

    /**
     * Display the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submitLetter(Request $request)
    {
        $letter = $request->letter;

        $word = session()->get('word');

        $sessionkey = 'wordletters';
        $data = session()->get($sessionkey);

        if(!$data) {
            session()->put($sessionkey, $letter);
        } else {
            session()->put($sessionkey, $data.$letter);
        }

        $wordletters = \App\Helpers\Helper::compareLetters($word, strToLower(session()->get($sessionkey)), strToLower($letter));

        if((session()->get('wingame') || session()->get('gameover')) && Auth::user()) {
            $user = User::findOrFail(Auth::user()->id);
            $user->points += session()->get('points');
            $user->save();
        }

        return response()->json([
            'code' => 200,
            'wordletters' => $wordletters,
            'error' => session()->get('lettererror'),
            'errors' => session()->get('hangmanerrors'),
            'points' => session()->get('points'),
            'wingame' => session()->get('wingame'),
            'gameover' => session()->get('gameover')
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function playSurvivor()
    {
        $categories = Categorie::get();
            
        //SEO Configurations
        $title = 'Jogar (Modo Contador)'; // Max 50 Characteres
        $description = 'Jogo da Forca - Desenvolvido por Maicon Esperafico, Eduardo Solka e Andrey Oliveira'; // Max 160 Characteres
        SEOMeta::setTitle(\App\Helpers\Helper::config('nome-aplicacao') . ' - ' . $title);
        SEOMeta::setDescription($description);

        return view('site.playsurvivor', compact('categories'))->withTitle($title);
    }

    /**
     * Display the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function playSurvivorNow($slug)
    {
        $categorie = Categorie::where('name', 'like', '%' . $slug . '%' )->first();
        
        if($slug == 'geral') {
            $word = Word::inRandomOrder()->first();
            $categorie = 'Geral';
        } else {
            $word = Word::where('categorie_id', $categorie->id)->inRandomOrder()->first();
            $categorie = $word->categorie->name;
        }
            
        //SEO Configurations
        $title = 'Jogando (Modo Contador) categoria: ' . $categorie; // Max 50 Characteres
        $description = 'Jogo da Forca - Desenvolvido por Maicon Esperafico, Eduardo Solka e Andrey Oliveira'; // Max 160 Characteres
        SEOMeta::setTitle(\App\Helpers\Helper::config('nome-aplicacao') . ' - ' . $title);
        SEOMeta::setDescription($description);

        $wordletters = \App\Helpers\Helper::wordLetters(str_slug($word->name));

        return view('site.playingsurvivor', compact('word', 'wordletters' ))->withTitle($title);
    }

    /**
     * Display the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submitSurvivorLetter(Request $request)
    {
        $letter = $request->letter;

        $word = session()->get('word');

        $sessionkey = 'wordletters';
        $data = session()->get($sessionkey);

        if(!$data) {
            session()->put($sessionkey, $letter);
        } else {
            session()->put($sessionkey, $data.$letter);
        }

        $wordletters = \App\Helpers\Helper::compareLetters($word, strToLower(session()->get($sessionkey)), strToLower($letter));

        if((session()->get('wingame') || session()->get('gameover')) && Auth::user()) {
            $user = User::findOrFail(Auth::user()->id);
            $user->points_hard += session()->get('points');
            $user->save();
        }

        return response()->json([
            'code' => 200,
            'wordletters' => $wordletters,
            'error' => session()->get('lettererror'),
            'errors' => session()->get('hangmanerrors'),
            'points' => session()->get('points'),
            'wingame' => session()->get('wingame'),
            'gameover' => session()->get('gameover')
        ]);
    }
}
