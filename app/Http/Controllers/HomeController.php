<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function store(){
        if(session('success')){
            toast(session('success'), 'success');
        }
        $latestProducts = Product::latest()->take(3)->get();
        return view('frontEnd.store', compact('latestProducts'));
    }
}
