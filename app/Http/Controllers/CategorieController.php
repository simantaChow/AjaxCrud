<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    function CreateCategories(Request $request)
    {
        // Prepare File Name & Path
        $img=$request->file('img_url');

        $t=time();
        $file_name=$img->getClientOriginalName();
        $img_name="{$t}-{$file_name}";
        $img_url="uploads/{$img_name}";

        // Upload File
        $img->move(public_path('storage/uploads'),$img_name);

        // Save To Database
        return Categorie::create([
            'category'=>$request->input('category'),
            'product_name'=>$request->input('product_name'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price'),
            'img_url'=>$img_url,
        ]);
    }
    function GetCategories()
    {
        $categories = Categorie::all();
        return response()->json(['categories'=>$categories]);
    }

    function GetCategoriesByID($id)
    {
        return Categorie::where('id','=',$id)->first();
    }
}
