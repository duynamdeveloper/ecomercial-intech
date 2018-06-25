<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Eloquent\Attribute;
use Session;
use DB;
class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::all();
        return view('backend.attribute.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attribute = new Attribute();
        $attribute->name = $request->name;
        if($attribute->save()){
            Session::flash('message','Thêm thuộc tính sản phẩm thành công!');
            Session::flash('alert-class','alert-success');
        }else{
            Session::flash('message','Lỗi! Không thêm được thuộc tính');
            Session::flash('alert-class','alert-danger');
        }
        if($request->has('save-continue')){
            return redirect()->route('be.attribute.edit',$attribute->id);
        }
        return redirect()->route('be.attribute.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attribute = Attribute::findOrFail($id);

        return view('backend.attribute.edit',compact('attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = Attribute::where('id',$id)->with('attribute_values.product.category')->first();

        return view('backend.attribute.edit',compact('attribute'));
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
        $attribute = Attribute::findOrFail($id);
        $attribute->name = $request->name;
        if($attribute->update()){
            Session::flash('message','Chỉnh sửa thuộc tính sản phẩm thành công');
            Session::flash('alert-class','alert-success');
        }else{
            Session::flash('message','Lỗi! Không thể chỉnh sửa thuộc tính');
            Session::flash('alert-class','alert-success');
        }
        if($request->has('save-continue')){
            return redirect()->route('be.attribute.edit',$id);
        }
        return redirect()->route('be.attribute.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);
        DB::table('attribute_value')->where('attribute_id',$id)->delete();
        if($attribute->delete()){
            Session::flash('message','Chỉnh sửa thuộc tính sản phẩm thành công');
            Session::flash('alert-class','alert-success');
        }else{
            Session::flash('message','Lỗi! Không thể xóa thuộc tính');
            Session::flash('alert-class','alert-danger');
        }
       return redirect()->route('be.attribute.index');
    }
}
