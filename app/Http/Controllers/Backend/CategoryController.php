<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['categories']=Category::orderBy('id','desc')->paginate(5);
      return view('admin.category.index',$data);
    //   return response()->json($data);
    }


    public function allCategory(){
        $data['categories']=Category::orderBy('id','desc')->paginate(5);
        return view('admin.category.allCategory',$data);
    }




    //pagination 


    public function pagination(){
        $categories = Category::orderBy('id','desc')->paginate(5);
        $s1 = 1;
        return view('admin.category.paginate',compact("categories","s1"));

    }



    // search category 

    public function search(Request $request){
        
        if($request->ajax()) {
          
            $data = Category::where('name', 'LIKE', $request->category.'%')
                ->get();
           
           
           
            return $data;
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function published(Request $request){

        $category = Category::find($request->id);
        $category->status = 1;
        $category->save();
        return response()->json($category);


    }


    public function unpublished(Request $request){


        $category = Category::find($request->id);
        $category->status = 0;
        $category->save();
        return response()->json($category);

    }




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
        $category = new Category();
        $category->name = $request->category_name;
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
        $data = Category::find($id);
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
        $data = Category::find($id);
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
        $id = $request->id;
        $data = Category::find($id);
        $data->name=$request->category;
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
        $data = Category::where("id",$id)->delete([

        ]);
        return response()->json($data);
    }
}
