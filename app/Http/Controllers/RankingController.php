<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use SEOMeta;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rankings = User::where('points', '>', 0)->orWhere('points_hard', '>', 0)->orderBy('points', 'desc')->paginate();
        return view('dashboard.rankings.index', compact('rankings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rankingHome()
    {
        $rankings = User::where('points', '>', 0)->orWhere('points_hard', '>', 0)->orderBy('points', 'desc')->get();
        
        //SEO Configurations
        $title = 'Ranking'; // Max 50 Characteres
        $description = 'Jogo da Forca - Desenvolvido por Maicon Esperafico, Eduardo Solka e Andrey Oliveira'; // Max 160 Characteres
        SEOMeta::setTitle(\App\Helpers\Helper::config('nome-aplicacao') . ' - ' . $title);
        SEOMeta::setDescription($description);

        return view('site.ranking', compact('rankings'))->withTitle($title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $user = User::findOrFail($id);
            $user->points = 0;
            $user->points_hard = 0;
            $user->update();

            return response()->json([
                'code' => 200,
                'message' => 'Ranking atualizado com sucesso!'
            ]);

        } catch(Exception $e) {
            return response()->json([
                'code' => 501,
                'message' => $e->getMessage()
            ]);
        }
    }
}
