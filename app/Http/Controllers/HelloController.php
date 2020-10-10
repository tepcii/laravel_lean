<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index() {
        $data = [
            ['name'=>'Taro', 'mail'=>'taro@xxx'],
            ['name'=>'Hanako', 'mail'=>'hanako@xxx'],
            ['name'=>'sachiko', 'mail'=>'sachi@xxx'],
        ];
        return view('hello.index', ['data'=>$data]);
    }

    public function post(Request $request) {
        return view('hello.index', ['msg'=>$request->msg]);
    }

}
