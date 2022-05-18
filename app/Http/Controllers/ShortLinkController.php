<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortLinkRequest;
use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function index(){
        $shortLinks=ShortLink::get();
        
        return view('sh_links',['results'=>$shortLinks]);
    }

    public function store(ShortLinkRequest $request){
        
        ShortLink::create(['code'=>Str::random(6),'url'=>$request->link]);

        return redirect('shortenlink')->with('success', 'Shorten Link Generated Successfully!');;
    }
}
