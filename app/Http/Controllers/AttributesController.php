<?php

namespace App\Http\Controllers;

use App\Models\Attributes; 
use Illuminate\Http\Request;
use App\Rules\HasChildCategory;
use App\Http\Requests\AttributesFormRequest; 
use Cviebrock\EloquentSluggable\Services\SlugService;

class AttributesController extends Controller
{
    public function index()
    {
        $attributes = Attributes::where('parent_id', 0)->get();
        return view('admin.attributes.index', ['attributes' => $attributes]);
    }

    public function create()
    {
        $attributes = Attributes::where('parent_id', 0)->get(['id', 'name']);
        return view('admin.attributes.create', ['attributes' => $attributes]);
    }

    public function edit(Attributes $attribute)
    {

        $attributes = Attributes::where('parent_id', 0)->get(['id', 'name']);
        return view('admin.attributes.edit', ['attributes' => $attributes, 'attribute' => $attribute]);
    }

    public function store(AttributesFormRequest $request)
    {
        $validatedData = $request->validated();

        $attribute = new Attributes();
        $attribute->parent_id = $validatedData['parent_id'];
        $attribute->name = $validatedData['name'];
        $attribute->slug = SlugService::createSlug(Attributes::class, 'slug', $validatedData['name']);
        $attribute->description = $validatedData['description'];

        $attribute->save();

        return redirect('admin/attributes')->with('success', 'New attribute term added !');
    }

    public function update(AttributesFormRequest $request, $id)
    {
        $validatedData = $request->validated();

        $attribute = Attributes::findOrFail($id);
        $attribute->parent_id = $validatedData['parent_id'];
        $attribute->name = $validatedData['name'];
        $attribute->slug = SlugService::createSlug(Attributes::class, 'slug', $validatedData['name']);
        $attribute->description = $validatedData['description'];

        $attribute->save();

        return redirect('admin/attributes')->with('success', 'Attribute term updated !');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => ['required', 'string', new HasChildCategory],
        ]);

        $attribute = Attributes::find($request->id);

        $attribute->delete();

        return redirect('admin/attributes')->with('success', 'Attribute term deleted !');
    }
}
