<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Attributes;
use App\Models\Categories;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ProductsFormRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::paginate(15);
        return view('admin.products.index', ['products' => $products]);
    }

    public function create()
    {
        $colors = Attributes::where('parent_id', 2)->get(['id', 'name']);
        $size = Attributes::where('parent_id', 1)->get(['id', 'name']);
        $categories = Categories::where('parent_id', 0)->get(['id', 'name']);
        return view('admin.products.create', ['categories' => $categories, 'colors' => $colors, 'size' => $size]);
    }

    public function edit(Products $product)
    {
        $colors = Attributes::where('parent_id', 2)->get(['id', 'name']);
        $size = Attributes::where('parent_id', 1)->get(['id', 'name']);
        $categories = Categories::where('parent_id', 0)->get(['id', 'name']);
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories, 'colors' => $colors, 'size' => $size]);
    }

    public function store(ProductsFormRequest $request)
    {
        $validatedData = $request->validated();

        $product = new Products();
        $product->name = $validatedData['name'];
        $product->slug = SlugService::createSlug(Products::class, 'slug', $validatedData['name']);
        $product->category_id = $validatedData['category_id'];
        $product->color_id = $validatedData['color_id'];
        $product->size_id = $validatedData['size_id'];
        $product->short_description = $validatedData['short_description'];
        $product->description = $validatedData['description'];
        $product->regular_price = $validatedData['regular_price'];
        $product->selling_price = $validatedData['selling_price'];
        $product->stock_quantity = $validatedData['stock_quantity'];

        $product->trending = $validatedData['trending'];
        $product->status = $validatedData['status'];
        $product->featured = $validatedData['featured'];

        $product->meta_title = $validatedData['meta_title'];
        $product->meta_keyword = $validatedData['meta_keyword'];
        $product->meta_description = $validatedData['meta_description'];

        $product->save();

        return redirect('admin/products')->with('success', 'New product added !');
    }

    public function update(ProductsFormRequest $request, $id)
    {
        $validatedData = $request->validated();

        $product = Products::findOrFail($id);
        $product->name = $validatedData['name'];
        $product->slug = SlugService::createSlug(Products::class, 'slug', $validatedData['name']);
        $product->category_id = $validatedData['category_id'];
        $product->color_id = $validatedData['color_id'];
        $product->size_id = $validatedData['size_id'];
        $product->short_description = $validatedData['short_description'];
        $product->description = $validatedData['description'];
        $product->regular_price = $validatedData['regular_price'];
        $product->selling_price = $validatedData['selling_price'];
        $product->stock_quantity = $validatedData['stock_quantity'];

        $product->trending = $validatedData['trending'];
        $product->status = $validatedData['status'];
        $product->featured = $validatedData['featured'];

        $product->meta_title = $validatedData['meta_title'];
        $product->meta_keyword = $validatedData['meta_keyword'];
        $product->meta_description = $validatedData['meta_description'];

        $product->save();

        return redirect('admin/products')->with('success', 'Product updated !');
    }

    public function upload_images(Request $request, $id)
    {
        $this->validate($request, [
            'file_name' => 'required',
            'file_name.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $product = Products::findOrFail($id);

        if ($request->hasFile('file_name')) {
            foreach ($request->file('file_name') as $key => $image) {
                $filename = time() . '-' . $key . '.' . $image->getClientOriginalExtension();
                $filePath = public_path('/uploads/product');
                $img = Image::make($image->path());
                $img->fit(480, 620)->save($filePath . '/' . $filename);

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'file_name' => $filename
                ]);
            }
        }
        return redirect()->back()->with('success', 'Image(s) added !');
    }
}
