<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index(){
        return response(Category::all()); 
    }

    public function store(Request $request){
        $category = new Category([
            'name' => $request->name 
        ]); 
        $category->save(); 
        return response($category, 200);
    }

    public function edit(Request $request, $categoryId){
        $category = Category::findOrFail($categoryId); 
        $category->fill($request->input())->save(); 
        return response($category,201); 
    }

    public function destroy(Request $request, $categoryId){
        $category = Category::findOrFail($categoryId)->delete(); 
        return response("success",202);
}

}