<?php

namespace App\Http\Controllers;

use App\Models\News;
class ClientNewsController extends Controller
{
    public function index()
    {
      $tintuc =News::paginate(6);
      return view('client.tintuc.tintuc',["tintuc"=>$tintuc]);
    }

    public function show($id)
    {
        $tintuc = News::where('id',$id)->select("title","introduce","content","created_at")->get();
        $tintuckhac = News::where('id','!=',$id)->orderBy('id', 'desc')->limit(3)->get();
        return view('client.tintuc.chitiettintuc',["tintuc"=>$tintuc,"tintuckhac"=>$tintuckhac]);
    }
}