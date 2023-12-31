<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=3;
        $i=0;
        $products=Product::orderBy('created_at','desc')->get();
        return view('backEnd.products.index',compact('menu_active','products','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active=3;
        $categories=Category::where('parent_id',0)->pluck('name','id')->all();
        return view('backEnd.products.create',compact('menu_active','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'p_name'=>'required|min:5',
            'p_code'=>'required',
            'p_color'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:1000',
        ]);
        $formInput=$request->all();
        if($request->file('image')){
            $image=$request->file('image');
            /*
            if($image->isValid()){
                $fileName=time().'-'.Str::slug($formInput['p_name'],"-").'.'.$image->getClientOriginalExtension();
                $large_image_path=public_path('products/large/'.$fileName);
                $medium_image_path=public_path('products/medium/'.$fileName);
                $small_image_path=public_path('products/small/'.$fileName);
                //Resize Image
                ImageGallery::make($image)->save($large_image_path);
                ImageGallery::make($image)->resize(600,600)->save($medium_image_path);
                ImageGallery::make($image)->resize(300,300)->save($small_image_path);
                $formInput['image']=$fileName;
            }*/

            $file_extention= $image->getClientOriginalExtension();
            $fileName=time().'.' . $file_extention;
            $path='images/products';
            $image->move($path,$fileName);
            $formInput['image']=$fileName;
            
        }   
        Product::create($formInput);
        return redirect()->route('product.create')->with('message','Add Products Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu_active=3;
        $categories=Category::where('parent_id',0)->pluck('name','id')->all();
        $edit_product=Product::findOrFail($id);
        $edit_category=Category::findOrFail($edit_product->categories_id);
        return view('backEnd.products.edit',compact('edit_product','menu_active','categories','edit_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_product=Product::findOrFail($id);
        $this->validate($request,[
            'p_name'=>'required|min:5',
            'p_code'=>'required',
            'p_color'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'image'=>'image|mimes:png,jpg,jpeg|max:1000',
        ]);
          $formInput=$request->all();
         //if($update_product['image']==''){
              
                $path ='images/products';
                //upload new file
                $image = $request->image;
                $filename = $image->getClientOriginalName();
                $image->move($path, $filename);
      
                //for update in table
                $formInput['image']=$update_product['image'];
                $update_product->update($formInput);
                return redirect()->route('product.index')->with('message','Update Products Successfully!');
           /* if($request->file('image')){
                $image=$request->file('image');
                /*
                if($image->isValid()){
                    $fileName=time().'-'.Str::slug($formInput['p_name'],"-").'.'.$image->getClientOriginalExtension();
                    $large_image_path=public_path('products/large/'.$fileName);
                    $medium_image_path=public_path('products/medium/'.$fileName);
                    $small_image_path=public_path('products/small/'.$fileName);
                    //Resize Image
                    ImageGallery::make($image)->save($large_image_path);
                    ImageGallery::make($image)->resize(600,600)->save($medium_image_path);
                    ImageGallery::make($image)->resize(300,300)->save($small_image_path);
                    $formInput['image']=$fileName;
                } 
                
            } 

        }else{
            
       }*/
       
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Product::findOrFail($id);
        //$image_large=public_path().'/products/large/'.$delete->image;
        //$image_medium=public_path().'/products/medium/'.$delete->image;
        //$image_small=public_path().'/products/small/'.$delete->image;
      /*  if($delete->delete()){
            unlink($image_large);
            unlink($image_medium);
            */
            $delete->delete();
        return redirect()->route('product.index')->with('message','Delete Success!');
    }
    /*
    public function deleteImage($id){
        //Product::where(['id'=>$id])->update(['image'=>'']);
        $delete_image=Product::findOrFail($id);
        $image_large=public_path().'/products/large/'.$delete_image->image;
        $image_medium=public_path().'/products/medium/'.$delete_image->image;
        $image_small=public_path().'/products/small/'.$delete_image->image;
        if($delete_image){
            $delete_image->image='';
            $delete_image->save();
            ////// delete image ///
            unlink($image_large);
            unlink($image_medium);
            unlink($image_small);
        }
        return back();
    }*/
}
