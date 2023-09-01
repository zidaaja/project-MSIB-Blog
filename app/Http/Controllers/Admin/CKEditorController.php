<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        $uploadedImage = $request->file('upload');

        // Simpan gambar ke Spatie Media Library
        $path = Storage::disk('public')->put('images', $uploadedImage);

        $url = Storage::disk('public')->url($path);

        return response()->json(['url' => $url]);
    }

}
