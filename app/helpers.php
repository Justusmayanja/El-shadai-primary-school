<?php

use Illuminate\Support\Facades\Storage;

if (! function_exists('media_url')) {
    /**
     * Resolve a stored upload path or an absolute image URL for use in img src.
     */
    function media_url(?string $path): string
    {
        if ($path === null || $path === '') {
            return '';
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return asset('storage/'.ltrim($path, '/'));
    }
}

if (! function_exists('normalize_image_upload_request')) {
    /**
     * Treat empty image URL fields as absent so file-only uploads validate correctly.
     */
    function normalize_image_upload_request(\Illuminate\Http\Request $request, string $urlKey = 'image_url'): void
    {
        if (! $request->filled($urlKey)) {
            $request->merge([$urlKey => null]);
        }
    }
}

if (! function_exists('delete_public_upload')) {
    function delete_public_upload(?string $path): void
    {
        if ($path === null || $path === '') {
            return;
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return;
        }
        Storage::disk('public')->delete($path);
    }
}
