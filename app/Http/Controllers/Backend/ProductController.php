<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Eloquent\Product;
use App\Eloquent\Category;
use App\Eloquent\Manufacture;
use App\Eloquent\Country;
use App\Eloquent\Attribute;
use App\Eloquent\AttributeValue;
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
        $products = Product::all();
        return view('backend.product.create',compact('countries','categories','manufactures','products'));
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
        $product->warranty_period = $request->warranty_period;
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

        $product->meta_anchor = strtolower($meta_anchor);

        if($product->save()){
            Session::flash('message','Tạo mới sản phẩm thành công!');
            Session::flash('alert-class','alert-success');
            if(!empty($request->related_products))
            {
            $product->related_products()->attach($request->related_products);
            }
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
        $attributes = Attribute::all();
        $product = Product::where('id',$id)->with('attribute_values.attribute')->first();
        $products = Product::all();
        return view('backend.product.edit', compact('countries','manufactures','attributes','categories','product','products','related_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::all();
        $countries = Country::all();
        $categories = Category::all();
        $manufactures = Manufacture::all();
        $attributes = Attribute::all();
        $product = Product::where('id',$id)->with('attribute_values.attribute')->first();
        return view('backend.product.edit', compact('countries','manufactures','attributes','categories','product','products','related_products'));
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
        $product->name = trim($request->product_name);
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
        $product->warranty_period = $request->warranty_period;
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
        if(count(Product::where('meta_anchor',$meta_anchor.'.html')->where('id','<>',$id)->get())>0){
            $meta_anchor = $meta_anchor.'-'.str_random(5);  
        }
        $meta_anchor = $meta_anchor.'.html'; 
        $product->meta_anchor = strtolower($meta_anchor);
        if($product->update()){
            Session::flash('message','Cập nhật sản phẩm thành công!');
            Session::flash('alert-class','alert-success');
            if(!empty($request->related_products))
            {
                $product->related_products()->sync($request->related_products);
            }else{
                $product->related_products()->detach();
            }
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
    public function getAttributes(Request $request)
    {
        $product_id = $request->product_id;
        $attributes = AttributeValue::where('product_id',$product_id)->with(['attribute'])->get();
        return response()->json(['status' => true, 'data' => $attributes]);
    }
    public function getSingleAttribte(Request $request){
        $att_id = $request->att_id;
        $attribute_value = AttributeValue::where('id',$att_id)->with('attribute')->first();
        return response()->json(['status' => true, 'message' => 'Thành công!', 'data' => $attribute_value]);
    }
    public function addAttribute(Request $request){
        $product_id = $request->product_id;
        $att_id = $request->att_id;
        $att_value = $request->att_value;
        $att_display_order = $request->att_display_order;

        $attribute_value = new AttributeValue();
        $attribute_value->attribute_id = $att_id;
        $attribute_value->value = $att_value;
        $attribute_value->product_id = $product_id;
        $attribute_value->display_order = $att_display_order;
        if($attribute_value->save())
        {
            return response()->json(['status' => true, 'message' => 'Thêm mới thành công!']);
        }else{
            return response()->json(['status' => false, 'message' => 'Thêm mới thất bại!']);
        }
    }
    public function updateAttribute(Request $request)
    {
        $att_value_id = $request->att_value_id;
        $att_value = AttributeValue::findOrFail($att_value_id);
        $att_value->value = $request->att_value;
        $att_value->display_order = $request->display_order;
        if($att_value->update())
        {
            return response()->json(['status' => true,'message' => 'Cập nhật thành công!']);
        }else{
            return response()->json(['status' => false,'message' => 'Cập nhật thất bại!']);
        }
    }
    public function destroyAttribute(Request $request)
    {
        $att_value = AttributeValue::findOrFail($request->att_value_id);
        if($att_value->delete()){
            return response()->json(['status' => true,'message' => 'Xóa thành công!']);
        }else{
            return response()->json(['status' => false,'message' => 'Xóa thất bại!']);
        }
    }
}
