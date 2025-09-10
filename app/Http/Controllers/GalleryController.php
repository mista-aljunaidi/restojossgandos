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
        $photos = Gallery::where('category', '!=', 'ambience')
                        ->orderBy('created_at', 'asc')
                        ->get();

        $ambiencePhotos = Gallery::where('category', 'ambience')
                        ->orderBy('created_at', 'asc')
                        ->get();

        return view('gallery', compact('photos', 'ambiencePhotos'));
    }

    /** ADMIN: simpan foto baru */
    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'required|in:food,customer,event,ambience',
            'image'    => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $folder = public_path('img/gallery');
        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $file = $request->file('image');
        $safeName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                    . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($folder, $safeName);

        Gallery::create([
            'title'      => $request->title,
            'category'   => $request->category,
            'image_path' => 'img/gallery/' . $safeName,
        ]);

        return back()->with('success', 'Foto berhasil diupload!');
    }

    /** ADMIN: update foto */
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

    /** ADMIN: hapus foto */
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
