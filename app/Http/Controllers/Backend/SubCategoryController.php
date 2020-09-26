<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::latest()->get();
        $subCategory = SubCategory::latest()->get();
        return view('admin.subcategory.index',compact('category','subCategory'));
    }



    public function allsubcategory(){
        $subCategory = SubCategory::latest()->get();
        return view('admin.subcategory.response',compact('subCategory'));
    }



    //unpublished status 

    public function unpublished(Request $request){
        $subcategory = SubCategory::find($request->id);
        $subcategory->status = 0;
        $subcategory->save();
        return response()->json($subcategory);
    }
    //published status 

    public function published(Request $request){
        $subcategory = SubCategory::find($request->id);
        $subcategory->status = 1;
        $subcategory->save();
        return response()->json($subcategory);
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

        $subCategory = new SubCategory();
        $subCategory->category_id = $request->category;
        $subCategory->subcategory_name = $request->subcategory_name;
        $subCategory->description = $request->description;
        $subCategory->save();
        return response()->json($subCategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = SubCategory::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SubCategory::find($id);
        return response()->json($data);
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

        $data = SubCategory::find($id);
        $data->category_id=$request->categoryes_name;
        $data->subcategory_name=$request->subcategory_name;
        $data->description=$request->description;
        $data->save();
        return response()->json($id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = SubCategory::find($id)->delete([

        ]);
        return response()->json($data);
    }
}
