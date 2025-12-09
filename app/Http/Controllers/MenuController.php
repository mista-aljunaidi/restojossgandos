<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function publicIndex()
    {
        $carouselMenus = Menu::where('type', 'carousel')
                            ->orderBy('created_at', 'asc')
                            ->get();

        $specialMenus  = Menu::where('type', 'special')
                            ->orderBy('created_at', 'asc')
                            ->get();

        return view('menu', compact('carouselMenus', 'specialMenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'type'        => 'required|in:carousel,special',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data = $request->only('title', 'description', 'type');

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->uploadImage($request->file('image'));
        }

        Menu::create($data);

        return back()->with('success', 'Menu berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'type'        => 'required|in:carousel,special',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data = $request->only('title', 'description', 'type');

        if ($request->hasFile('image')) {

            if ($menu->image_path && File::exists(base_path($menu->image_path))) {
                File::delete(base_path($menu->image_path));
            }

            $data['image_path'] = $this->uploadImage($request->file('image'));
        }

        $menu->update($data);

        return back()->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->image_path && File::exists(base_path($menu->image_path))) {
            File::delete(base_path($menu->image_path));
        }

        $menu->delete();

        return back()->with('success', 'Menu berhasil dihapus.');
    }

    private function uploadImage($file)
    {
        // Folder fisik: public_html/public/img/menu
        $folder = base_path('img/menu');

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $safeName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                    . '-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move($folder, $safeName);

        // Simpan ke DB dengan pola "public/img/menu/..."
        return 'img/menu/' . $safeName;
    }
}