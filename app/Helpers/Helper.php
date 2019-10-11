<?php

namespace App\Helpers;

use App\Models\Config;

class Helper
{
    public static function config($slug)
    {
        session()->forget($slug);
        $data = session()->get($slug);

        if(!$data) {
        	$config = Config::where('slug', $slug)->get();

			if($config->isNotEmpty()) {
				$data = $config->first()->value;
			}
			session()->put($slug, $data);
        }
        return $data;
    }

    public static function configData($slug)
    {
        $key = $slug.'data';

        session()->forget($key);
        $data = session()->get($key);

        if(!$data) {
			$config = Config::where('slug', $slug)->get();
			if($config->isNotEmpty()) {
				$data = $config->first();
			}
	    	session()->put($key, $data);
        }
        return $data;
    }

    public static function wordLetters($word) {

        $wordletters = '';
        $sessionkey = 'word';

        session()->forget($sessionkey);
        session()->forget('wordletters');

        session()->forget('hangmanerrors');
        session()->forget('lettererror');
        session()->put('hangmanerrors', 0);
        session()->put('points', 0);

        session()->put('wingame', false);
        session()->put('gameover', false);

        $data = session()->get($sessionkey);

        if(!$data) {

            for($i=0;$i<strlen($word);$i++)
            {
                $mark=false;
                if ($mark==true) {
                    $wordletters .= $word[$i];
                } else {
                    if ($word[$i]==' ') {
                        $wordletters .= '&nbsp;&nbsp;';
                    } else {
                        $wordletters .= '_ ';
                    }
                }   
            }

            session()->put($sessionkey, $word);
        }

        return $wordletters;
    }

    public static function compareLetters($word, $letters, $letter) {
        
        $counterrors = session()->get('hangmanerrors');

        $wordletters = '';

        for($i=0;$i<strlen($word);$i++)
        {
            $mark=false;

            for($j=0;$j<strlen($letters);$j++)
            { 
                if ($word[$i]==$letters[$j])
                $mark=true;
            }

            if ($mark==true) {
                $wordletters .= $word[$i];
            } else {
                
                if ($word[$i]==' ') {
                    $wordletters .= '&nbsp;&nbsp;';
                } else {
                    $wordletters .= '_ ';
                }
            }
        }

        if(in_array($letter, str_split($word))) {
            session()->put('lettererror', false);
        } else {
            session()->put('hangmanerrors', session()->get('hangmanerrors')+1);
            session()->put('lettererror', true);
        }

        foreach(str_split($word) as $wordletter) {
            if($wordletter === $letter) {
                session()->put('points', session()->get('points')+5);
            }
        }

        if(!in_array('_', str_split($wordletters))) {
            session()->put('points', 100);
            session()->put('wingame', true);
        }

        if(session()->get('hangmanerrors') >= 6) {
            session()->put('points', session()->get('points'));
            session()->put('gameover', true);
        }

        return $wordletters;
    }
}
