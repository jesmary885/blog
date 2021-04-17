<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.edit')->only('edit,update');
        $this->middleware('can:admin.tags.create')->only('create,store');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }

    public function create()
    {
        $colors = [
            'red' => 'color rojo',
            'yellow' => 'color amarillo',
            'blue' => 'color azul',
            'indigo' => 'color indigo'
        ];
        return view('admin.tags.create',compact('colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'color' =>'required',
            'slug' =>'required|unique:categories'
        ]);
 
        $tag = Tag::create($request->all());
 
        return redirect()->route('admin.tags.edit',$tag)->with('info', 'La Etiqueta se ha creado con éxito');
    }

    public function edit(Tag $tag)
    {
        $colors = [
            'red' => 'color rojo',
            'yellow' => 'color amarillo',
            'blue' => 'color azul',
            'indigo' => 'color indigo'
        ];
        return view('admin.tags.edit',compact('tag','colors'));
    }


    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' =>'required',
            'color' => 'required',
            'slug' =>'required|unique:tags'
        ]);
 
        $tag->update($request->all());
        return redirect()->route('admin.tags.edit',$tag)->with('info', 'La Etiqueta se ha actualizado con éxito');
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'La Etiqueta se ha eliminado con éxito');
    }
}
