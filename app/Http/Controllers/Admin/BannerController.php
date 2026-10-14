<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BannerController extends Controller
{
    private const WIDTH = 1942;

    private const HEIGHT = 809;

    private const DIRECTORY = 'uploads/banners';

    public function index(): View
    {
        $banners = Banner::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.banners.index', compact('banners'));
    }

    public function create(): View
    {
        return view('admin.banners.create');
    }

    public function store(BannerRequest $request): RedirectResponse
    {
        $data = $request->safe()->except('image');
        $data['image'] = $this->storeImage($request->file('image'));

        Banner::create($data);

        return to_route('admin.banners.index')->with('success', 'Banner saved');
    }

    public function edit(Banner $banner): View
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(BannerRequest $request, Banner $banner): RedirectResponse
    {
        $data = $request->safe()->except('image');

        if ($request->hasFile('image')) {
            File::delete(public_path($banner->image));
            $data['image'] = $this->storeImage($request->file('image'));
        }

        $banner->update($data);

        return to_route('admin.banners.index')->with('success', 'Banner updated');
    }

    public function destroy(Banner $banner): RedirectResponse
    {
        File::delete(public_path($banner->image));
        $banner->delete();

        return to_route('admin.banners.index')->with('success', 'Banner deleted');
    }

    private function storeImage(UploadedFile $file): string
    {
        File::ensureDirectoryExists(public_path(self::DIRECTORY));

        $path = self::DIRECTORY.'/'.Str::uuid().'.webp';

        (new ImageManager(new Driver))
            ->read($file)
            ->cover(self::WIDTH, self::HEIGHT)
            ->toWebp(85)
            ->save(public_path($path));

        return $path;
    }
}