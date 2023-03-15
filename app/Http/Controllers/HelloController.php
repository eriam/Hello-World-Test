<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function hello(Request $request): \Illuminate\Contracts\View\View
    {
        $name = $request->input('name');
        return view('hello', ['name' => $name]);
    }
}
