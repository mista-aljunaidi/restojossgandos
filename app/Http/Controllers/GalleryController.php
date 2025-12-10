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
        $photos = Gallery::latest()->paginate(12);
        return view('gallery', compact('photos'));
    }

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

        // Simpan fisik file tetap ke folder public/img/gallery
        $file->move($folder, $safeName);

        // Path dasar
        $basePath = 'img/gallery/' . $safeName;

        // LOGIC KHUSUS: Jika kategori 'food', tambahkan 'public/' di depannya
        if ($request->category === 'food') {
            $imagePath = 'public/' . $basePath;
        } else {
            $imagePath = $basePath;
        }

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
            // Hapus file lama (Bersihkan path dari kata 'public/' agar File::delete menemukannya)
            $oldPathRaw = str_replace('public/', '', $photo->image_path);
            if ($photo->image_path && File::exists(public_path($oldPathRaw))) {
                File::delete(public_path($oldPathRaw));
            }

            $folder = public_path('img/gallery');
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            $file = $request->file('image');
            $safeName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                        . '-' . time() . '.' . $file->getClientOriginalExtension();

            $file->move($folder, $safeName);

            // LOGIC KHUSUS SAAT GANTI FOTO
            $basePath = 'img/gallery/' . $safeName;
            
            if ($request->category === 'food') {
                $data['image_path'] = 'public/' . $basePath;
            } else {
                $data['image_path'] = $basePath;
            }
        } else {
            // LOGIC KHUSUS JIKA CUMA GANTI KATEGORI (Tanpa ganti foto)
            // Jika diganti JADI food, tambahkan 'public/' jika belum ada
            if ($request->category === 'food' && !Str::startsWith($photo->image_path, 'public/')) {
                $data['image_path'] = 'public/' . $photo->image_path;
            } 
            // Jika diganti DARI food ke yang lain, hapus 'public/'
            elseif ($request->category !== 'food' && Str::startsWith($photo->image_path, 'public/')) {
                $data['image_path'] = Str::replaceFirst('public/', '', $photo->image_path);
            }
        }

        $photo->update($data);

        return back()->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $photo = Gallery::findOrFail($id);

        // Bersihkan path dari kata 'public/' sebelum menghapus file fisik
        // karena public_path() sudah mengarah ke folder public
        $cleanPath = str_replace('public/', '', $photo->image_path);

        if ($cleanPath && File::exists(public_path($cleanPath))) {
            File::delete(public_path($cleanPath));
        }

        $photo->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}