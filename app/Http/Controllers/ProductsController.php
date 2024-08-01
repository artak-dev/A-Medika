<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){

        $categories = Category::all();
        return view('products',compact('categories'));
    }

    public function getProducts(Request $request){
        $productsFiltered = array();
        if($categoryId = $request->category_id){
            $products = Product::whereHas("categories", function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })->orderBy("products.name")->get();
        }else{
            $products = Product::orderBy("products.name")->get();
        }
        return response()->json([
            'success' => true, 
            'data' => $products,
            'draw' => $_POST['draw'],
            'recordsFiltered' => $products->count(),
            'recordsTotal' => Product::all()->count()
        ]);
    }
}
