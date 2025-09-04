<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /** FRONTEND: tampilkan galeri publik */
    public function publicIndex()
    {
        $photos = Gallery::latest()->get();
        return view('gallery', compact('photos')); 
    }

    /** ADMIN: dashboard = kelola foto */
    public function index()
    {
        $photos = Gallery::latest()->get();
        return view('dashboard', compact('photos')); 
    }

    /** ADMIN: simpan foto baru (ke public/img) */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:food,customer,event',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image')->store('uploads/gallery', 'public');

        Gallery::create([
            'title' => $request->title,
            'category' => $request->category,
            'image_path' => 'storage/' . $path,
        ]);

        return redirect()->back()->with('success', 'Foto berhasil diupload!');
    }

    /** ADMIN: update judul/kategori, dan opsional ganti gambar */
    public function update(Request $request, $id)
    {
        $photo = Gallery::findOrFail($id);

        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data = [
            'title'    => $request->title,
            'category' => $request->category,
        ];

        if ($request->hasFile('image')) {
            if (File::exists(public_path($photo->image_path))) {
                @File::delete(public_path($photo->image_path));
            }

            if (!File::exists(public_path('img'))) {
                File::makeDirectory(public_path('img'), 0755, true);
            }

            $file      = $request->file('image');
            $basename  = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $safeName  = Str::slug($basename) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $safeName);

            $data['image_path'] = 'img/' . $safeName;
        }

        $photo->update($data);

        return back()->with('success', 'Foto berhasil diperbarui.');
    }

    /** ADMIN: hapus foto + file fisik */
    public function destroy($id)
    {
        $photo = Gallery::findOrFail($id);

        if (File::exists(public_path($photo->image_path))) {
            @File::delete(public_path($photo->image_path));
        }

        $photo->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
