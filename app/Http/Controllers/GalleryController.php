<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function publicIndex()
    {
        // contoh logika, silakan sesuaikan dengan kebutuhan kamu
        $galleries = Gallery::latest()->paginate(12);

        return view('gallery', compact('galleries'));
        // atau misalnya:
        // return view('front.gallery.index', compact('galleries'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'required|in:food,customer,event,ambience',
            'image'    => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // FOLDER FISIK
        // public_path() = /home/.../public_html/public
        // jadi ini akan jadi: /home/.../public_html/public/img/gallery
        $folder = public_path('img/gallery');

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $file = $request->file('image');

        $safeName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                    . '-' . time() . '.' . $file->getClientOriginalExtension();

        // Simpan file ke /public_html/public/img/gallery
        $file->move($folder, $safeName);

        // PATH UNTUK DATABASE
        // kamu bilang sekarang isinya "img/gallery/..."
        $imagePath = 'public/img/gallery/' . $safeName;

        Gallery::create([
            'title'      => $request->title,
            'category'   => $request->category,
            'image_path' => $imagePath,
        ]);

        return back()->with('success', 'Foto berhasil diupload.');
    }
    public function update(Request $request, $id)
    {
        $photo = Gallery::findOrFail($id);

        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'required|in:food,customer,event,ambience',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data = $request->only('title', 'category');

        if ($request->hasFile('image')) {
            // Hapus file lama, image_path = "img/gallery/..."
            if ($photo->image_path && File::exists(public_path($photo->image_path))) {
                File::delete(public_path($photo->image_path));
            }

            $folder = public_path('img/gallery');
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            $file = $request->file('image');
            $safeName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                        . '-' . time() . '.' . $file->getClientOriginalExtension();

            $file->move($folder, $safeName);

            $data['image_path'] = 'img/gallery/' . $safeName;
        }

        $photo->update($data);

        return back()->with('success', 'Foto berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $photo = Gallery::findOrFail($id);

        if ($photo->image_path && File::exists(public_path($photo->image_path))) {
            File::delete(public_path($photo->image_path));
        }

        $photo->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}