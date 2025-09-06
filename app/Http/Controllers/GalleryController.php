<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /** ===============================
     *  FRONTEND: tampilkan galeri publik
     *  =============================== */
    public function publicIndex()
    {
        // Foto untuk gallery grid (tanpa ambience)
        $photos = Gallery::where('category', '!=', 'ambience')
            ->latest()
            ->get();

        // Foto untuk slider ambience
        $ambiencePhotos = Gallery::where('category', 'ambience')
            ->latest()
            ->get();

        return view('gallery', compact('photos', 'ambiencePhotos')); 
    }


    /** ===============================
     *  ADMIN: dashboard = kelola foto
     *  =============================== */
    public function index()
    {
        $photos = Gallery::latest()->get();
        return view('dashboard', compact('photos'));
    }

    /** ===============================
     *  ADMIN: simpan foto baru
     *  =============================== */
    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'required|in:food,customer,event,ambience',
            'image'    => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // buat folder public/img kalau belum ada
        if (!File::exists(public_path('img'))) {
            File::makeDirectory(public_path('img'), 0755, true);
        }

        // simpan file ke public/img
        $file      = $request->file('image');
        $basename  = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeName  = Str::slug($basename) . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img'), $safeName);

        Gallery::create([
            'title'      => $request->title,
            'category'   => $request->category,
            'image_path' => 'img/' . $safeName,
        ]);

        return redirect()->back()->with('success', 'Foto berhasil diupload!');
    }

    /** ===============================
     *  ADMIN: update judul/kategori, opsional ganti gambar
     *  =============================== */
    public function update(Request $request, $id)
    {
        $photo = Gallery::findOrFail($id);

        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'required|in:food,customer,event,ambience',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data = [
            'title'    => $request->title,
            'category' => $request->category,
        ];

        // jika upload gambar baru
        if ($request->hasFile('image')) {
            // hapus gambar lama jika ada
            if (File::exists(public_path($photo->image_path))) {
                @File::delete(public_path($photo->image_path));
            }

            // buat folder img kalau belum ada
            if (!File::exists(public_path('img'))) {
                File::makeDirectory(public_path('img'), 0755, true);
            }

            // simpan file baru
            $file      = $request->file('image');
            $basename  = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $safeName  = Str::slug($basename) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $safeName);

            $data['image_path'] = 'img/' . $safeName;
        }

        $photo->update($data);

        return back()->with('success', 'Foto berhasil diperbarui.');
    }

    /** ===============================
     *  ADMIN: hapus foto + file fisik
     *  =============================== */
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
