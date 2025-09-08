<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /** ===============================
     *  FRONTEND: tampilkan halaman menu
     *  =============================== */
    public function publicIndex()
    {
        $carouselMenus = Menu::where('type', 'carousel')->latest()->get();
        $specialMenus  = Menu::where('type', 'special')->latest()->get();

        return view('menu', compact('carouselMenus', 'specialMenus'));
    }

    /** ===============================
     *  ADMIN: tampilkan semua menu di dashboard
     *  =============================== */
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('dashboard-menu', compact('menus'));
    }

    /** ===============================
     *  ADMIN: simpan menu baru
     *  =============================== */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'type'        => 'required|in:carousel,special',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // upload file
        $validated['image_path'] = $this->uploadImage($request->file('image'));

        Menu::create($validated);

        return back()->with('success', '✅ Menu berhasil ditambahkan!');
    }

    /** ===============================
     *  ADMIN: update data menu
     *  =============================== */
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'type'        => 'required|in:carousel,special',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // jika upload gambar baru
        if ($request->hasFile('image')) {
            if (File::exists(public_path($menu->image_path))) {
                @File::delete(public_path($menu->image_path));
            }
            $validated['image_path'] = $this->uploadImage($request->file('image'));
        }

        $menu->update($validated);

        return back()->with('success', '✅ Menu berhasil diperbarui.');
    }

    /** ===============================
     *  ADMIN: hapus data menu
     *  =============================== */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        if (File::exists(public_path($menu->image_path))) {
            @File::delete(public_path($menu->image_path));
        }

        $menu->delete();

        return back()->with('success', '🗑️ Menu berhasil dihapus.');
    }

    /** ===============================
     *  Fungsi bantu untuk upload gambar
     *  =============================== */
    private function uploadImage($file)
    {
        $folderPath = public_path('img/menu');

        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true);
        }

        $basename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeName = Str::slug($basename) . '-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move($folderPath, $safeName);

        return 'img/menu/' . $safeName;
    }
}
