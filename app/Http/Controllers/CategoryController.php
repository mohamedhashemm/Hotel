<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(4);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::all();

        $category = new Category();



        return view('categories.create', compact('parents', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(Category::rules(), [
            // (:attrbute)=(name)
            'required' => 'This (:attribute) must be existed'
        ]);



        // Request merage

        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);

        $data = $request->except('image');

        $data['image'] = $this->upLoadImage($request);

        $category = Category::create($data);
        // PRG => post redirect get
        return redirect()->route('categories.index')->with('success', 'Category Created Successfully');
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
        $category = Category::find($id);
        // selet * from categories where id <> $id 
        // AND (parent_id is NULL OR parent_id <> $id

        $parents = Category::where('id', '<>', $id)
            ->where(function ($query) use ($id) {
                $query->whereNull('parent_id')
                    ->orwhere('parent_id', '<>', $id);
            })->get();


        return view('categories.edit', compact('category', 'parents'));
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
        $request->validate(Category::rules($id));
        $category = Category::findOrFail($id);

        $old_image = $category->image;


        $data = $request->except('image');
        $new_image = $this->upLoadImage($request);

        if ($new_image) {
            $data['image'] = $new_image;
        }

        $category->update($data);

        if ($old_image && $new_image) {

            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('categories.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        return redirect()->route('categories.index')->with('success', 'Deleted Successfully!');
    }

    protected function upLoadImage(Request $request)
    {

        if (!$request->hasFile('image')) {
            return;
        }
        $file = $request->file('image');
        $path = $file->store('uploads', [
            'disk' => 'public'
        ]);
        return $path;
    }

    public function trash()
    {

        $categories = Category::onlyTrashed()->paginate();

        return view('categories.trash', compact('categories'));
    }

    public function restore(Request $request, $id)
    {

        $category = Category::onlyTrashed()->findOrFail($id);

        $category->restore();

        return redirect()->route('categories.trash', compact('category'))->with('success', 'Category Restored!');
    }

    public function forceDelete($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);

        $category->forceDelete();

        return redirect()->route('categories.trash', compact('category'))->with('success', 'Category Deleted Forever!');
    }
}
