<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
// use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Session;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['category'] = Category::orderBy('id','DESC')->get();
        // dd($data['category']);
        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'category' => 'required',
        ]);

        Category::create([
            'name' => $request->category,
        ]);

        Session::flash('success','Your data Stored on Database Successfully');

        return redirect('/category');

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
        $data['category'] = Category::findOrFail($id);

        return view('category.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['category'] = Category::findOrFail($id);

        return view('category.edit',$data);
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
        //
        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->category,
        ]);

        Session::flash('success','Your data successfully edited.');

        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::findOrFail($id);

        $category->delete();

        Session::flash('success','Your data deleted.');

        return redirect('/category');
    }

    public function test($id)
    {
        //
        $category = Category::findOrFail($id);

        $category->delete();

        Session::flash('success','Your data deleted.');

        return redirect('/category');
    }
}
