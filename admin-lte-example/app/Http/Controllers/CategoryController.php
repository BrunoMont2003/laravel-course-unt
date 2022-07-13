<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    const PAGINATION = 10;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $description = $request->get('description');
        $categories = Category::where('status', '=', 1)->where('description', 'like', '%' . $description . '%')->paginate($this::PAGINATION);
        // dd($categories);
        return view('category.index', compact('categories', 'description'));
    }
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'description' => 'required|max:30',
            ],
            [
                'description.required' => 'Enter description of category',
                'description.max' => 'Maximum 30 characters for category description',
            ]
        );
        $category = new Category();
        $category->description = $validated['description'];
        $category->status = 1;
        $category->save();
        return redirect()->route('category.index')->with('alert', ['type' => 'success', 'message' => 'Category successfully created']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'description' => 'required|max:30',
            ],
            [
                'description.required' => 'Enter description of category',
                'description.max' => 'Maximum 30 characters for category description',
            ]
        );

        $category = Category::findOrFail($id);
        $category->description = $validated['description'];
        $category->update();
        return redirect()->route('category.index')->with('alert', ['type' => 'info', 'message' => 'Category successfully updated']);
    }
    public function confirmDelete($id)
    {
        $category = Category::findOrFail($id);
        return view('category.confirm', compact('category'));
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->status = 0;
        $category->save();
        return redirect()->route('category.index')->with('alert', ['type' => 'info', 'message' => 'Category has been deleted']);
    }
}
