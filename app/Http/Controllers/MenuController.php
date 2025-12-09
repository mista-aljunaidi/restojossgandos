<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /** FRONTEND: tampilkan menu publik */
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

    /** ADMIN: simpan menu baru */
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

    /** ADMIN: update menu */
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
            if ($menu->image_path && File::exists(public_path($menu->image_path))) {
                File::delete(public_path($menu->image_path));
            }
            $data['image_path'] = $this->uploadImage($request->file('image'));
        }

        $menu->update($data);
        return back()->with('success', 'Menu berhasil diperbarui.');
    }

    /** ADMIN: hapus menu */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->image_path && File::exists(public_path($menu->image_path))) {
            File::delete(public_path($menu->image_path));
        }

        $menu->delete();
        return back()->with('success', 'Menu berhasil dihapus.');
    }

    /** Fungsi bantu upload gambar */
    private function uploadImage($file)
    {
        $folder = public_path('public/img/menu');
        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $safeName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                    . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($folder, $safeName);

        return 'img/menu/' . $safeName;
    }
}
