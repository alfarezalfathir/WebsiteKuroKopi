<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only('name', 'price', 'description');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['foto'] = $filename;
        }

        Menu::create($data);

        return redirect()
                ->route('menu.index')
                ->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only('name', 'price', 'description');

        if ($request->hasFile('foto')) {

            // Hapus foto lama kalau ada
            if ($menu->foto && file_exists(public_path('uploads/'.$menu->foto))) {
                unlink(public_path('uploads/'.$menu->foto));
            }

            $file = $request->file('foto');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['foto'] = $filename;
        }

        $menu->update($data);

        return redirect()
                ->route('menu.index')
                ->with('success', 'Menu berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        // Hapus foto jika ada
        if ($menu->foto && file_exists(public_path('uploads/'.$menu->foto))) {
            unlink(public_path('uploads/'.$menu->foto));
        }

        $menu->delete();

        return back()->with('success', 'Menu berhasil dihapus!');
    }
}