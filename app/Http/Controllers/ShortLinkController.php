<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortLinkRequest;
use App\Models\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function index(){
        $shortLinks=ShortLink::get();
        
        return view('sh_links',['results'=>$shortLinks]);
    }

    public function store(ShortLinkRequest $request){
        
        return redirect('/');
    }
}
