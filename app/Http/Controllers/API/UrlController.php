<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UrlResource;
use App\Models\Url;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    //
    public function index(Request $request){
        $url = Url::where('user_id' , $request->user()->id)->get();
        return UrlResource::collection($url);
    }
    public function shorten(Request $request){
        $request->validate(['long_url' => 'required|url']);
        $url = Url::Where('long_url', $request->long_url)-> first();

        if($url){
            return new UrlResource($url);
        }

        $shortUrl = Str::random(6); // Generate shorturl

        while (Url::where('short_url' , $shortUrl)->exists()){
            $shortUrl = Str::random(6);
            // if short url exits then create new url
        }

        $url = Url::create([
            'long_url' => $request->long_url,
            'short_url' => $shortUrl,
            'user_id' => $request->user()->id,
        ]);

        return new UrlResource($url);

    }
    public function redirect($shorten){
        $url = Url::where('short_url', $shorten)->firstorFail();
        $url-> increment('visit_count');
        return redirect($url->long_url);
    }
    public function show($id){
        $url = Url::findorFail($id);

        return new UrlResource($url);
    }


}
