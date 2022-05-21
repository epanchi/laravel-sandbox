<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortLinkRequest;
use App\Models\Metric;
use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function index(){
        $shortLinks=ShortLink::get();
        
        return view('sh_links',['results'=>$shortLinks]);
    }

    public function track($code){
        
        
        $link=ShortLink::whereCode($code)->get();
        
        // Generate track code
        if (($link)){
            Metric::create(['short_linkid'=>$link->first()->getKey(),'platform'=>$_SERVER['HTTP_USER_AGENT'] ]);
            Redirect::to($link->first()->url)->send();
        }else
        abort(404);
    }

    public function store(ShortLinkRequest $request){
        $unique=true;
        do{
            $randomUrlCode=self::generateRandom(5);
            if (ShortLink::whereCode($randomUrlCode)->count()>0){
                $unique=false;
            }
        }while($unique);
        ShortLink::create(['code'=>$randomUrlCode,'url'=>$request->link]);

        return redirect('shortenlink')->with('success', 'Shorten Link Generated Successfully!');;
    }

    private function generateRandom($lenght=5){
        $characters='QWERTYUIOPLKJHGFDSAZXCVBNM';
        $elements=strlen($characters);
        $string='';
        for($i=0; $i<$lenght; $i++){
            $string.=$characters[rand(0,$elements -1)];
        }
        return $string;
    }
    /**
     * Show metrics information
     */
    public function metrics($code){
        $shortLink=ShortLink::whereCode($code)->first();
        dd($shortLink->metrics);
      
    }
}
