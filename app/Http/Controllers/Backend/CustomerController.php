<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Eloquent\Customer;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('backend.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->fullname = $request->name;
        $customer->type = $request->type;
        $customer->email = $request->email;
        $customer->phonenumber = $request->phone;
        $customer->address = $request->address;
        $customer->shipping_address = $request->shipping_address;
        if($customer->save())
        {
            Session::flash('message','Thêm khách hàng thành công!');
            Session::flash('alert-class','alert-success');
        }
        else
        {
            Session::flash('message','Không thể thêm mới KH');
            Session::flash('alert-class','alert-danger');
        }
        if($request->has('save-continue'))
        {
            return redirect()->route('be.customer.edit',$customer->id);
            
        }
        return redirect()->route('be.customer.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('backend.customer.edit',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('backend.customer.edit',compact('customer'));
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
        $customer = Customer();
        $customer->fullname = $request->name;
        $customer->type = $request->type;
        $customer->email = $request->email;
        $customer->phonenumber = $request->phone;
        $customer->address = $request->address;
        $customer->shipping_address = $request->shipping_address;
        if($customer->save())
        {
            Session::flash('message','Cập nhật khách hàng thành công!');
            Session::flash('alert-class','alert-success');
        }
        else
        {
            Session::flash('message','Không thể chỉnh sửa KH');
            Session::flash('alert-class','alert-danger');
        }
        if($request->has('save-continue'))
        {
            return redirect()->route('be.customer.edit',$customer->id);
            
        }
        return redirect()->route('be.customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Customer::find($id)->delete())
        {
            Session::flash('message','Xóa KH thành công!');
            Session::flash('alert-class','alert-success');
        }
        else
        {
            Session::flash('message','Không thể xóa KH');
            Session::flash('alert-class','alert-danger');
        }
        return redirect()->route('be.customer.index'); 
    }
}
