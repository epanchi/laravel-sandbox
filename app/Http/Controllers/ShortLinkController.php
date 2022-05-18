<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function index(){
        $shortLinks=ShortLink::get();
        dd($shortLinks);
        return view('sh_links',['results'=>$shortLinks]);
    }
}
