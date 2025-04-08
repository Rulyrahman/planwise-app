<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('pages.dashboard', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Menu::create($request->all());
        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('dashboard');
    }
}
