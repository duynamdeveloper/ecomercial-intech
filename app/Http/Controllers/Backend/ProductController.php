<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Eloquent\Product;
use App\Eloquent\Category;
use App\Eloquent\Manufacture;
use App\Eloquent\Country;
use App\Eloquent\Attribute;
use Session;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['country','category','manufacture'])->get();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $categories = Category::all();
        $manufactures = Manufacture::all();

        return view('backend.product.create',compact('countries','categories','manufactures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->product_name;
        $product->sku = $request->sku;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        if(!empty($request->image_1)){
            $extension = $request->image_1->getClientOriginalExtension();
           $product->image_1 = $request->image_1->storeAs('public/images/product', str_slug($product->name,'_').'_'.date('mdYhis').'.'.$extension);
        }
        $product->display_order = $request->display_order;
        if(!empty($request->is_new)){
            $product->is_new = $request->is_new;
        }
        if(!empty($request->is_available)){
            $product->is_available = $request->is_available;
        }
        $product->category_id = $request->category_id;
        $product->manufacture_id = $request->manufacture_id;
        $product->country_id = $request->country_id;
        $product->length = $request->length;
        $product->weight = $request->weight;
        $product->height = $request->height;
        $product->width = $request->width;
        if(!empty($request->can_ship)){
            $product->can_ship = $request->can_ship;
        }
        if(!empty($request->free_ship)){
            $product->free_ship = $request->free_ship;
        }
        $product->price = $request->price;
        $product->old_price = $request->old_price;

        $product->meta_keywords = trim($request->meta_keywords);
        $product->meta_description = trim($request->meta_description);
        if(empty($request->meta_title)){
            $product->meta_title = $product->name;
        }else{
            $product->meta_title = trim($request->meta_title);
        }
        if(empty($request->meta_anchor)){
            $meta_anchor = trim($product->name);
        }else{
            $meta_anchor = trim($request->meta_anchor);
        }
        $meta_anchor = str_replace('html','',$meta_anchor);
        $meta_anchor = str_slug($meta_anchor,'-','en');
        $meta_anchor = $meta_anchor.'.html';
        if(count(Product::where('meta_anchor',$meta_anchor)->get())>0){
            $meta_anchor = str_replace('html','',$meta_anchor);
            $meta_anchor = $meta_anchor.'-'.str_random(5);
            $meta_anchor = $meta_anchor.'.html';
        }

        $product->meta_anchor = $meta_anchor;

        if($product->save()){
            Session::flash('message','Tạo mới sản phẩm thành công!');
            Session::flash('alert-class','alert-success');
        }else{
            Session::flash('message','Error! Không thể thêm được sản phẩm này!');
            Session::flash('alert-class','alert-danger');
           
        }
        if($request->has('save-continue')){
            return redirect()->route('be.product.edit',$product->id);
        }
        return redirect()->route('be.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $countries = Country::all();
        $categories = Category::all();
        $manufactures = Manufacture::all();
        $product = Product::findOrFail($id);
        return view('backend.product.edit', compact('countries','manufactures','categories','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $categories = Category::all();
        $manufactures = Manufacture::all();
        $product = Product::findOrFail($id);
        return view('backend.product.edit', compact('countries','manufactures','categories','product'));
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
        $product = Product::findOrFail($id);
        $product->name = title_case(trim($request->product_name));
        $product->sku = trim($request->sku);
        $product->short_description = trim($request->short_description);
        $product->description = trim($request->description);
        if(!empty($request->image_1)){
            Storage::delete($product->image_1);
            $extension = $request->image_1->getClientOriginalExtension();
            $product->image_1 = $request->image_1->storeAs('public/images/product', str_slug($product->name,'_').'_'.date('mdYhis').'.'.$extension);
        }
        $product->display_order = $request->display_order;
        if(!empty($request->is_new)){
            $product->is_new = $request->is_new;
        }
        if(!empty($request->is_available)){
            $product->is_available = $request->is_available;
        }
        $product->category_id = $request->category_id;
        $product->manufacture_id = $request->manufacture_id;
        $product->country_id = $request->country_id;
        $product->length = $request->length;
        $product->weight = $request->weight;
        $product->height = $request->height;
        $product->width = $request->width;
        if(!empty($request->can_ship)){
            $product->can_ship = $request->can_ship;
        }
        if(!empty($request->free_ship)){
            $product->free_ship = $request->free_ship;
        }
        $product->price = $request->price;
        $product->old_price = $request->old_price;

        $product->meta_keywords = trim($request->meta_keywords);
        $product->meta_description = trim($request->meta_description);
        if(empty($request->meta_title)){
            $product->meta_title = $product->name;
        }else{
            $product->meta_title = trim($request->meta_title);
        }
        if(empty($request->meta_anchor)){
            $meta_anchor = trim($product->name);
        }else{
            $meta_anchor = trim($request->meta_anchor);
        }
        $meta_anchor = str_replace('html','',$meta_anchor);
        $meta_anchor = str_slug($meta_anchor,'-','en');
        $meta_anchor = $meta_anchor.'.html';
        if(count(Product::where('meta_anchor',$meta_anchor)->where('id','<>',$id)->get())>0){
            $meta_anchor = str_replace('.html','',$meta_anchor);
            
            $meta_anchor = $meta_anchor.'-'.str_random(5);
            $meta_anchor = $meta_anchor.'.html';    
        }
        $product->meta_anchor = $meta_anchor;
        if($product->update()){
            Session::flash('message','Cập nhật sản phẩm thành công!');
            Session::flash('alert-class','alert-success');
        }else{
            Session::flash('message','Error! Không thể cập nhật được sản phẩm này!');
            Session::flash('alert-class','alert-danger');          
        }
        if($request->has('save-continue')){
            return redirect()->route('be.product.edit',$product->id);
        }
        return redirect()->route('be.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Session::flash('message','Đã xóa sản phẩm');
        Session::flash('alert-class','alert-success');
        return redirect()->route('be.product.index');
    }
}
