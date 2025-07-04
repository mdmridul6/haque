<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ImageUploader
{
    /**
     * Upload file to public folder.
     *
     * @param UploadedFile $file
     * @param string $folder
     * @param string|null $filename
     * @return string Relative path to the uploaded file
     */
    public static function  upload(UploadedFile $file, string $folder = '', string $filename = null): string
    {
        $folder = trim($folder, '/');
        // $filename = $filename ?: time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $filename = $filename ?: time() . '_' . Str::random(8) . '.webp';

        $destination = public_path('uploads/' . $folder);

        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $filename);

        return "uploads/{$folder}/{$filename}"; // return relative path
    }



    /**
     * Upload file to public folder.
     *
     * @param UploadedFile $file
     * @param string $folder
     * @param int $height
     * @param int $width
     * @param string|null $filename
     * @return string Relative path to the uploaded file
     */
    public static function resizeUpload(UploadedFile $file, string $folder = '', int $height = 110, int $width = 110, string $filename = null): string
    {
        $folder = trim(preg_replace('/[^a-zA-Z0-9_\-]/', '', $folder), '/');
        // $filename = $filename ?: time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $filename = $filename ?: time() . '_' . Str::random(8) . '.webp';

        // Create thumbnail
        $thumbPath = public_path('uploads/' . $folder);
        if (!file_exists($thumbPath)) {
            mkdir($thumbPath, 0755, true);
        }

        $img = Image::read($file->getRealPath());
        $img->resize($width, $height)->save($thumbPath . '/' . $filename);

        return "uploads/{$folder}/{$filename}";
    }
}
