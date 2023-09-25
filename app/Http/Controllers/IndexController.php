<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAtrr;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
       
    }

    public function index(){
        $products=Product::all();
        return view('frontEnd.index',compact('products'));
    }
    public function shop(){
        $products=Product::all();
        $byCate="";
        return view('frontEnd.products',compact('products','byCate'));
    }
    public function listByCat($id){
        $list_product=Product::where('categories_id',$id)->get();
        $byCate=Category::select('name')->where('id',$id)->first();
        return view('frontEnd.products',compact('list_product','byCate'));
    }
    public function detailpro($id){
        $detail_product=Product::findOrFail($id);
        $totalStock=ProductAtrr::where('products_id',$id)->sum('stock');
        //$relateProducts=Product::where([['id','!=',$id],['categories_id',$detail_product->categories_id]])->get();
        return view('frontEnd.product_details',compact('detail_product','totalStock'));
    }
    public function getAttrs(Request $request){
        $all_attrs=$request->all();
        //print_r($all_attrs);die();
        $attr=explode('-',$all_attrs['size']);
        //echo $attr[0].' <=> '. $attr[1];
        $result_select=ProductAtrr::where(['products_id'=>$attr[0],'size'=>$attr[1]])->first();
        echo $result_select->price."#".$result_select->stock;
    }
}
