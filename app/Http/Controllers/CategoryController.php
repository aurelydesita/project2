<?php

namespace App\Http\Controllers;

use App\Models\Category; // Model tetap, bisa diganti jadi FoodCategory jika ingin lebih spesifik
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
    $this->middleware('auth');
    $this->middleware('permission:kategori_read')->only('index');
    $this->middleware('permission:kategori_create')->only('store');
    $this->middleware('permission:kategori_write')->only(['edit','update']);
    $this->middleware('permission:kategori_delete')->only('destroy');
    }

    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Category::create($request->only('name'));
        return redirect()->route('categories.index')->with('success', 'Kategori makanan berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required']);
        $category->update($request->only('name'));
        return redirect()->route('categories.index')->with('success', 'Kategori makanan berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori makanan berhasil dihapus.');
    }


}
