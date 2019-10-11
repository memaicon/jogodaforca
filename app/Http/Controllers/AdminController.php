<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Categorie, Word};
use App\User;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categoriesCount = Categorie::count();
        $wordsCount = Word::count();
        $accountsCount = User::count();

        return view('dashboard.index', compact('categoriesCount', 'wordsCount', 'accountsCount'));
    }
}
