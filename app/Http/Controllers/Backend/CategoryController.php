<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Eloquent\Category;
use App\Eloquent\Product;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = title_case(trim($request->categoryname));
        $category->description = trim($request->description);
        $category->parent_id = $request->parent_id;
        if(!empty($request->image)){
            $category->image = $request->image->storeAs('app/public/category_images', ($category->name).date('mdYhis'));
        } 
        $category->display_order = $request->display_order;
        if(!empty($request->display_on_sidebar)){
            $category->display_in_sidebar = $request->display_on_sidebar;
        }
        if(!empty($request->display_on_homepage)){
            $category->display_in_homepage = $request->display_on_homepage;
        }
        if(!empty($request->display_on_topbar)){
            $category->display_in_topbar = $request->display_on_topbar;
        }
        $category->meta_keywords = trim($request->meta_keywords);
        $category->meta_description = trim($request->meta_description);
        if(empty($request->meta_title)){
            $category->meta_title = $category->name;
        }else{
            $category->meta_title = trim($request->meta_title);
        }
        if(empty($request->meta_anchor)){
            $meta_anchor = trim($category->name);
        }else{
            $meta_anchor = trim($request->meta_anchor);
        }
        $meta_anchor = str_replace('html','',$meta_anchor);
        $meta_anchor = str_slug($meta_anchor,'-','en');
        
        if(count(Category::where('meta_anchor',$meta_anchor.'html')->get())>0){
            $meta_anchor = $meta_anchor.'-'.str_random(5);          
        }
        $meta_anchor = $meta_anchor.'.html';
        $category->meta_anchor = $meta_anchor;
        $category->save();
        Session::flash('message','Tạo mới danh mục thành công!');
        Session::flash('alert-class','alert-success');
        if($request->has('save-continue')){
            return redirect()->route('be.category.edit',$category->id);
        }
       return redirect()->route('be.category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('backend.category.edit',compact('category','categories'));
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
        $category = Category::findOrFail($id);
        $category->name = title_case(trim($request->categoryname));
        $category->description = trim($request->description);
        $category->parent_id = $request->parent_id;
        if(!empty($request->image)){
            Storage::delete($category->image);
           $category->image = $request->image->storeAs('app/public/images/category', ($category->name).date('mdYhis'));
        } 
        $category->display_order = $request->display_order;
        if(!empty($request->display_on_sidebar)){
            $category->display_in_sidebar = $request->display_on_sidebar;
        }
        if(!empty($request->display_on_homepage)){
            $category->display_in_homepage = $request->display_on_homepage;
        }
        if(!empty($request->display_on_topbar)){
            $category->display_in_topbar = $request->display_on_topbar;
        }
        $category->meta_keywords = trim($request->meta_keywords);
        $category->meta_description = trim($request->meta_description);
        if(empty($request->meta_title)){
            $category->meta_title = $category->name;
        }else{
            $category->meta_title = trim($request->meta_title);
        }
        if(empty($request->meta_anchor)){
            $meta_anchor = trim($category->name);
        }else{
            $meta_anchor = trim($request->meta_anchor);
        }
        $meta_anchor = str_replace('html','',$meta_anchor);
        $meta_anchor = str_slug($meta_anchor,'-','en');
        
        if(count(Category::where('meta_anchor',$meta_anchor.'html')->get())>0){
            $meta_anchor = $meta_anchor.'-'.str_random(5);          
        }
        $meta_anchor = $meta_anchor.'.html';
        $category->meta_anchor = $meta_anchor;
        $category->update();
        Session::flash('message','Cập nhật danh mục thành công!');
        Session::flash('alert-class','alert-success');
        if($request->has('save-continue')){
            return redirect()->route('be.category.edit',$category->id);
        }
       return redirect()->route('be.category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        Category::where('parent_id',$id)->update(['parent_id'=>0]);
        Product::where('category_id',$id)->update(['category_id'=>0,'is_available' => 0]);
        $category->delete();
        Session::flash('message','Xóa danh mục thành công!');
        Session::flash('alert-class','alert-success');
        return redirect('be.category.index');
    }
}
