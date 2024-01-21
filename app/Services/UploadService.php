<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadService
{
    public function upload(Request $request, string $id): array
    {
        $filenames = [];
        $files = $request->allFiles();

        foreach ($files as $key => $file) {
            $path = 'public/' . Str::plural($key);
            $extension = $file->getClientOriginalExtension();
            $filename = $id . '.' . $extension;

            $file->storeAs($path, $filename, 'local');
            $filenames[] = $filename;
        }

        return $filenames;
    }

    public function deleteUpload(array $folders, array $files): void
    {
        foreach ($folders as $key => $folder) {
            Storage::disk('local')->delete('public/' . $folder . $files[$key]);
        }
    }
}