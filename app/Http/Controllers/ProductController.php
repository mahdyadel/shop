<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index' , compact('products'));
    }

   
    public function create()
    {
        $product =  Product::get();
        return view('admin.products.create' , compact('product'));
    }

  
    public function store(Request $request)
    {
        //validate the form
        $request->validate([
            'name'        => 'required',
            'price'       => 'required',
            'description' => 'required',
            'image'       => 'image|required',
        ]);

        //upload the image
        if($request->hasFile('image')){
            $image = $request->image;
            $image->move('uploads' , $image->getClientOriginalName());
        }

        //save in the database

        Product::create([
            'name'           => $request->name,
            'price'          => $request->price,
            'description'    => $request->description,
            'image'          => $request->image->getClientOriginalName(),

        ]);
        $request->session()->flash('msg' , 'your Product has add succssfuly');

        return redirect('admin/products');
    }
    public function show($id){
        $product = Product::find($id);
        return view('admin.products.details' , compact('product'));

    }


   public function edit($id){

    $product = Product::find($id);
    return view('admin.products.edit' , compact('product'));
   }

    public function update(Request $request, $id)
    {
        //find the id
        $product = Product::findOrFail($id);

        //Validate The Form//

        $request->validate([

            'name'           =>  'required',
            'price'          =>  'required',
            'description'    =>  'required',
            'image'          =>  'image|required',

        ]);
        //check if there eny image
        if($request->hasFile('image'))
        {
            //chech if the old image exists inside folder
            if(file_exists(public_path('uploads/').$product->image)){
                unlink(public_path('uploads/').$product->image);
            }
            //upload the new image
            $image = $request->image;
            $image->move('uploads' , $image->getClientOriginalName());
            $product->image = $request->image->getClientOriginalName();

        }
        //update the product
        $product->update([

            'name'         => $request->name,
            'price'        => $request->price,
            'description'  => $request->description,
            'image'        => $product->image,

        ]);
        //store amessage in session
        session()->flash('msg' , 'Updated Successfuly');

        //Redirect
        return redirect('admin/products');





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Product::destroy($id);

      session()->flash('msg' , 'Deleted Successfly');

      return redirect('admin/products');
    }
}
