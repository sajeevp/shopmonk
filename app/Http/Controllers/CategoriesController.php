<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Rules\HasChildCategory;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\CategoriesFormRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::where('parent_id', 0)->get();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function ajax_get_subcategories($id)
    {
        $subcategories = Categories::where('parent_id', $id)->get(['id', 'name']);
        return $subcategories;
    }

    public function create()
    {
        $categories = Categories::where('parent_id', 0)->get(['id', 'name']);
        return view('admin.categories.create', ['categories' => $categories]);
    }

    public function edit(Categories $category)
    {

        $categories = Categories::where('parent_id', 0)->get(['id', 'name']);
        return view('admin.categories.edit', ['categories' => $categories, 'category' => $category]);
    }

    public function store(CategoriesFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = new Categories();
        $category->parent_id = $validatedData['parent_id'];
        $category->name = $validatedData['name'];
        $category->slug = SlugService::createSlug(Categories::class, 'slug', $validatedData['name']);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $filePath = public_path('/uploads/category');
            $img = Image::make($image->path());
            $img->fit(480, 480)->save($filePath . '/' . $filename);
            $category->image = $filename;
        }

        $category->description = $validatedData['description'];
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->save();

        return redirect('admin/categories')->with('success', 'New category term added !');
    }

    public function update(CategoriesFormRequest $request, $id)
    {
        $validatedData = $request->validated();

        $category = Categories::findOrFail($id);
        $category->parent_id = $validatedData['parent_id'];
        $category->name = $validatedData['name'];
        $category->slug = SlugService::createSlug(Categories::class, 'slug', $validatedData['name']);

        if ($request->hasFile('image')) {

            $path = 'uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $filePath = public_path('/uploads/category');
            $img = Image::make($image->path());
            $img->fit(480, 480, function ($constraint) {
                $constraint->upsize();
            })->save($filePath . '/' . $filename);
            $category->image = $filename;
        }

        $category->description = $validatedData['description'];
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->save();

        return redirect('admin/categories')->with('success', 'Category term updated !');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => ['required', 'string', new HasChildCategory],
        ]);

        $category = Categories::find($request->id);
        $path = 'uploads/category/' . $category->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        $category->delete();

        return redirect('admin/categories')->with('success', 'Category term deleted !');
    }
}
