<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoreisController extends Controller
{
    public function index()
    {
    
        $categories = Category::all();
        return view('Backend.categories.index',compact('categories'));
    }


    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('Backend.categories.show', [
            'category' => $category,
        ]);
    }


    public function create()
    {
     
        return view('Backend.categories.create');
    }

    public function store(Request $request)
    {
        

        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'parent_id' => $request->input('parent_id'),
           /*  'status' => $request->post('status'), // Recommended */
        ]);
        return redirect()
            ->route('index')
            ->with('alert.success', "Category \"{$category->name}\" created!");
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('Backend.categories.edit', [
            'category' => $category,
        ]);
    }


    public function update(Request $request, $id)
    {
       
        $validator = Category::findOrFail($id);
       
        //$validator->validate();
        if (!$validator) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->input('parent_id'),
        ]);
        
        return redirect()
            ->route('index')
            ->with('alert.success', "Category \"{$category->name}\" updated!");
}


        public function delete($id)
        {
            //Category::where('id', $id)->delete();
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()
                ->route('index')
                ->with('alert.success', "Category \"{$category->name}\" deleted!");
        }

}
