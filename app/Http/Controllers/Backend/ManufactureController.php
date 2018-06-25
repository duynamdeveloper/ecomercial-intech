<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Eloquent\Manufacture;
use App\Eloquent\Country;
use App\Eloquent\Product;
use Session;

class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufactures = Manufacture::all();
        return view('backend.manufacture.index', compact('manufactures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('backend.manufacture.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manufacture = new Manufacture();
        $manufacture->name = trim($request->manufacturename);
        $manufacture->country_id = $request->country_id;
        if(!empty($request->image)){
            $manufacture->image = $request->image->storeAs('app/public/images/manufacture/',($manufacture->name).date('dmYhis'  ));
        }
        if(!empty($request->display_order)){
            $manufacture->display_order = $request->display_order;
        }
        $manufacture->meta_keywords = trim($request->meta_keywords);
        $manufacture->meta_description = trim($request->meta_description);
        if(empty($request->meta_title)){
            $manufacture->meta_title = $manufacture->name;
        }else{
            $manufacture->meta_title = trim($request->meta_title);
        }
        if(empty($request->meta_anchor)){
            $meta_anchor = trim($manufacture->name);
        }else{
            $meta_anchor = trim($request->meta_anchor);
        }
        $meta_anchor = str_replace('html','',$meta_anchor);
        $meta_anchor = str_slug($meta_anchor,'-','en');
        if(count(Manufacture::where('meta_anchor',$meta_anchor.'.html')->get())>0){
            $meta_anchor = $meta_anchor.'-'.str_random(5);  
        }
        $meta_anchor = $meta_anchor.'.html';
        $manufacture->meta_anchor = strtolower($meta_anchor);
        $manufacture->save();
        Session::flash('message','Tạo mới nhãn hiệu thành công!');
        Session::flash('alert-class','alert-success');
        if($request->has('save-continue')){
            return redirect()->route('be.manufacture.edit',$manufacture->id);
        }
       return redirect()->route('be.manufacture.index'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manufacture = Manufacture::findOrFail($id);
        $countries = Country::all();

        return view('backend.manufacture.edit',compact('manufacture','countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manufacture = Manufacture::findOrFail($id);
        $countries = Country::all();

        return view('backend.manufacture.edit',compact('manufacture','countries'));
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
        $manufacture = Manufacture::findOrFail($id);
        $manufacture->name = trim($request->manufacturename);
        $manufacture->country_id = $request->country_id;
        if(!empty($request->image)){
            Storage::delete($manufacture->image);
            $manufacture->image = $request->image->storeAs('app/public/images/manufacture/',($manufacture->name).date('dmYhis'  ));
        }
        if(!empty($request->display_order)){
            $manufacture->display_order = $request->display_order;
        }
        $manufacture->meta_keywords = trim($request->meta_keywords);
        $manufacture->meta_description = trim($request->meta_description);
        if(empty($request->meta_title)){
            $manufacture->meta_title = $manufacture->name;
        }else{
            $manufacture->meta_title = trim($request->meta_title);
        }
        if(empty($request->meta_anchor)){
            $meta_anchor = trim($manufacture->name);
        }else{
            $meta_anchor = trim($request->meta_anchor);
        }
        $meta_anchor = str_replace('html','',$meta_anchor);
        $meta_anchor = str_slug($meta_anchor,'-','en');
        if(count(Manufacture::where('meta_anchor',$meta_anchor.'.html')->where('id','<>',$id)->get())>0){
            $meta_anchor = $meta_anchor.'-'.str_random(5);  
        }
        $meta_anchor = $meta_anchor.'.html';
        $manufacture->meta_anchor = strtolower($meta_anchor);
        $manufacture->save();
        Session::flash('message','Cập nhật nhãn hiệu thành công!');
        Session::flash('alert-class','alert-success');
        if($request->has('save-continue')){
            return redirect()->route('be.manufacture.edit',$manufacture->id);
        }
       return redirect()->route('be.manufacture.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('manufacture_id',$id)->update(['manufacture_id' => 0]);
        Manufacture::find($id)->delete();
        Session::flash('message','Xóa nhãn hiệu thành công');
        Session::flash('alert-class','alert-success');
        return redirect()->route('be.manufacture.index');
    }
}
