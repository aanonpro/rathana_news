<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;

        $request->validate([
            'name' => 'required|string',
            'status' =>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

        ]);
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file ->move('uploads/category', $filename);
            $input['image'] = $filename;
        }
        Category::create($input);
        return redirect()->route('categories.index')->with('message','Categories created');
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
    public function edit(Category $category)
    {
        return view('admin.category.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $input = $request->all();
        $category['updated_by'] = Auth::user()->id;
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        if($request->hasfile('image')){

            $destination = 'uploads/category/'. $category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
           
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file ->move('uploads/category', $filename);
            $input['image'] = $filename;
            $category->update($input);
        }

        $category->update($input);
        return redirect()->route('categories.index')->with('message','category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category){
            $destination = 'uploads/category/' . $category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $category->delete();
            return redirect()->route('categories.index')->with('message','category deleted ');
        }else{
            return redirect()->route('categories.index')->with('message','category  Not Found ');
        }

    }
}
