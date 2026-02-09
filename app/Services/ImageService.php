<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    /**
     * Store new image.
     */
    public static function upload($file, $folder)
    {
        if (!$file) return null;

        // Save in storage/app/public/{folder}
        $path = $file->store($folder, 'public');

        // Copy to public/storage (for Hostinger)
        self::copyToPublic($path);

        return $path;
    }

    /**
     * Update (remove old + upload new)
     */
    public static function update($file, $folder, $oldPath = null)
    {
        if (!$file) return $oldPath;

        self::delete($oldPath);
        return self::upload($file, $folder);
    }

    /**
     * Delete file from both storage and public
     */
    public static function delete($path)
    {
        if (!$path) return;

        // Remove from storage/app/public
        Storage::disk('public')->delete($path);

        // Remove from public/storage
        $publicFile = public_path('storage/' . $path);
        if (File::exists($publicFile)) {
            File::delete($publicFile);
        }
    }

    /**
     * Copy file to public/storage (needed because Hostinger blocks symlink)
     */
    private static function copyToPublic($path)
    {
        $source = storage_path('app/public/' . $path);
        $destination = public_path('storage/' . $path);

        if (!File::exists(dirname($destination))) {
            File::makeDirectory(dirname($destination), 0755, true);
        }

        File::copy($source, $destination);
    }
}
