<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
class prdController extends Controller
{
public function get($id){
    $prd=Product::find($id);
    dd($prd);
}
}
