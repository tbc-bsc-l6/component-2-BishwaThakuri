<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function saveproduct(Request $request){
      $result= $this->validate($request, [
        'title'=>'required',
        'fName'=>'required',
        'lName'=>'required',
        'price'=>'required',
        'pages'=>'required',
        'image'=>'required',
        "category_id" => "required"
      ]);

      $user_id = Auth::user()->id;
      // $category_id = Category::where('category', $result['product_type'])->get()->first();


      $product=new Product;
      $product->user_id=$user_id;
      $product->category_id=$request->get('product_type');
      $product->fName=$request->input('fName');
      $product->lName=$request->input('lName');
      $product->title=$request->input('title');
      $product->pages=$request->input('pages');
      $product->price=$request->input('price');


      if($request->hasFile('image')){
        $file=$request->file('image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('images',$filename);
        $product->image=$filename;
		  }
      $product->save();
      return back()->with('product_added', 'Product has been added successfully');
    }

    public function updateProduct(Request $request,$id){

        $product=product::find($id);
        $product->category_id=$request->get('product_type');
        $product->fName=$request->input('fName');
        $product->lName=$request->input('lName');
        $product->title=$request->input('title');
        $product->pages=$request->input('pages');
        $product->price=$request->input('price');
        if($request->hasFile('image')){
            $destination = 'images/'.$request->Image;
            if(File::exists($destination)){
             File::delete($destination);
            }
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('images',$filename);
            $product->Image=$filename;
        }
        $product->update();
        return back()->with('product_update', 'Product has been updated successfully');
    }

    public function editProduct($id){
      $product=product::find($id);
      return view('update-form', compact('product'));
    }

    public function deleteProduct($id){
      DB::table('products')->where('id',$id)->delete();
      return back()->with('product_delete', 'Product has been deleted successfully');
    }

}
