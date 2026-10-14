<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SettingController extends Controller
{
    private const DIRECTORY = 'uploads/settings';

    public function edit(): View
    {
        return view('admin.settings.edit');
    }

    public function update(SettingRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $pairs = [];

        foreach (Setting::textKeys() as $key) {
            $pairs[$key] = (string) ($data[$key] ?? '');
        }

        foreach (Setting::booleanKeys() as $key) {
            $pairs[$key] = $request->boolean($key) ? '1' : '0';
        }

        foreach (Setting::secretKeys() as $key) {
            if (filled($data[$key] ?? null)) {
                $pairs[$key] = $data[$key];
            }
        }

        foreach (Setting::IMAGE_KEYS as $key) {
            if ($request->hasFile($key)) {
                $this->deleteImage((string) Setting::get($key, ''));
                $pairs[$key] = $this->storeImage($request->file($key), $key);
            } elseif ($request->boolean("remove_{$key}")) {
                $this->deleteImage((string) Setting::get($key, ''));
                $pairs[$key] = '';
            }
        }

        Setting::putMany($pairs);

        return to_route('admin.settings.edit')->with('success', 'Settings saved');
    }

    private function storeImage(UploadedFile $file, string $key): string
    {
        File::ensureDirectoryExists(public_path(self::DIRECTORY));

        $name = $key . '-' . Str::uuid() . '.' . ($file->guessExtension() ?: 'png');

        $file->move(public_path(self::DIRECTORY), $name);

        return self::DIRECTORY . '/' . $name;
    }

    private function deleteImage(string $path): void
    {
        if (str_starts_with($path, self::DIRECTORY . '/')) {
            File::delete(public_path($path));
        }
    }
}
