<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('dashboard', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Menu::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        Menu::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Menu berhasil dihapus.');
    }
}
