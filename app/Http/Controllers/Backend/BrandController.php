<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=Brand::latest()->get();
        return view('admin.Brand.index',compact('brand'));
    }


    public function allData()
    {
        $brand=Brand::latest()->get();
        return view('admin.Brand.response',compact('brand'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        ],[

        ]);

        $brand = new Brand();
        $brand->name=$request->brand_name;
        $brand->description=$request->description;
        $brand->save();
        return response()->json($brand);
    }



    public function unpublished(Request $request){

        $category = Brand::find($request->id);
        $category->status = 0;
        $category->save();
        return response()->json($category);
    }

    public function published(Request $request){

        $category = Brand::find($request->id);
        $category->status = 1;
        $category->save();
        return response()->json($category);
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
       $brand =  Brand::find($id);
       return response()->json($brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[

        ],[

        ]);
        $id = $request->id;
        $brand =  Brand::find($id);
        $brand->name=$request->brand_name;
        $brand->description=$request->brand_description;
        $brand->save();
        return response()->json($brand);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $brand =  Brand::find($id)->delete([

        ]);
        return response()->json($brand);
    }
}
