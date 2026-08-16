<?php

namespace App\Services;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class DocumentUploadService
{
    public function handleImageUpload($file, $ticketId, $type)
    {
        // Generate paths
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = "documents/{$ticketId}/{$filename}";
        $thumbPath = "documents/{$ticketId}/thumb_{$filename}";

        // Compress original image (max 1024px width, 80% quality)
        $img = Image::make($file->getRealPath());
        $img->resize(1024, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        Storage::disk('public')->put($path, (string) $img->encode('jpg', 80));

        // Create Thumbnail (max 200px width)
        $thumb = Image::make($file->getRealPath());
        $thumb->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::disk('public')->put($thumbPath, (string) $thumb->encode('jpg', 70));

        return [
            'file_path' => $path,
            'thumbnail_path' => $thumbPath
        ];
    }
}
