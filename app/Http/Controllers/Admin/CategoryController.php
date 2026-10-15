<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class CategoryController extends Controller
{
    private const IMAGE_SIZE = 400;

    private const DIRECTORY = 'uploads/categories';

    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => Category::flatTree(),
        ]);
    }

    public function create(): View
    {
        return view('admin.categories.create', [
            'parentOptions' => Category::flatTree(),
        ]);
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['image', 'icon', 'promos']);
        $data['slug'] = $this->resolveSlug($request->input('slug'), $data['name']);
        $data['promos'] = $this->cleanPromos($request->input('promos', []));

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request->file('image'));
        }

        if ($request->hasFile('icon')) {
            $data['icon'] = $this->storeIcon($request->file('icon'));
        }

        Category::create($data);

        return to_route('admin.categories.index')->with('success', 'Category saved');
    }

    public function edit(Category $category): View
    {
        $excluded = [$category->id, ...Category::descendantIds($category->id)];

        return view('admin.categories.edit', [
            'category' => $category,
            'parentOptions' => Category::flatTree()->reject(fn (Category $option) => in_array($option->id, $excluded, true)),
        ]);
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $data = $request->safe()->except(['image', 'icon', 'promos']);
        $data['slug'] = $this->resolveSlug($request->input('slug'), $data['name'], $category->id);
        $data['promos'] = $this->cleanPromos($request->input('promos', []));

        if ($request->hasFile('image')) {
            $this->deleteFile($category->image);
            $data['image'] = $this->storeImage($request->file('image'));
        } elseif ($request->boolean('remove_image')) {
            $this->deleteFile($category->image);
            $data['image'] = null;
        }

        if ($request->hasFile('icon')) {
            $this->deleteFile($category->icon);
            $data['icon'] = $this->storeIcon($request->file('icon'));
        } elseif ($request->boolean('remove_icon')) {
            $this->deleteFile($category->icon);
            $data['icon'] = null;
        }

        $category->update($data);

        return to_route('admin.categories.index')->with('success', 'Category updated');
    }

    public function toggle(Category $category): RedirectResponse
    {
        $category->update(['is_active' => ! $category->is_active]);

        return back()->with('success', $category->is_active ? 'Category enabled' : 'Category disabled');
    }

    public function destroy(Category $category): RedirectResponse
    {
        if ($category->children()->exists()) {
            return back()->with('error', 'This category has sub-categories. Delete or move them first.');
        }

        $this->deleteFile($category->image);
        $this->deleteFile($category->icon);
        $category->delete();

        return to_route('admin.categories.index')->with('success', 'Category deleted');
    }

    private function resolveSlug(?string $slug, string $name, ?int $ignoreId = null): string
    {
        if (filled($slug)) {
            return $slug;
        }

        $base = Str::slug($name) ?: 'category';
        $candidate = $base;
        $suffix = 2;

        while (Category::where('slug', $candidate)->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))->exists()) {
            $candidate = $base.'-'.$suffix++;
        }

        return $candidate;
    }

    /**
     * @param  array<int, array<string, mixed>>  $promos
     * @return array<int, array<string, string>>|null
     */
    private function cleanPromos(array $promos): ?array
    {
        $clean = collect($promos)
            ->map(fn (array $promo) => [
                'badge' => trim((string) ($promo['badge'] ?? '')),
                'title' => trim((string) ($promo['title'] ?? '')),
                'cta' => trim((string) ($promo['cta'] ?? '')),
                'link' => trim((string) ($promo['link'] ?? '')),
                'color' => ($promo['color'] ?? 'navy') === 'yellow' ? 'yellow' : 'navy',
            ])
            ->filter(fn (array $promo) => $promo['title'] !== '')
            ->values()
            ->all();

        return $clean ?: null;
    }

    private function storeImage(UploadedFile $file): string
    {
        File::ensureDirectoryExists(public_path(self::DIRECTORY));

        $path = self::DIRECTORY.'/'.Str::uuid().'.webp';

        (new ImageManager(new Driver))
            ->read($file)
            ->cover(self::IMAGE_SIZE, self::IMAGE_SIZE)
            ->toWebp(85)
            ->save(public_path($path));

        return $path;
    }

    private function storeIcon(UploadedFile $file): string
    {
        File::ensureDirectoryExists(public_path(self::DIRECTORY));

        $name = 'icon-'.Str::uuid().'.'.($file->guessExtension() ?: 'png');

        $file->move(public_path(self::DIRECTORY), $name);

        return self::DIRECTORY.'/'.$name;
    }

    private function deleteFile(?string $path): void
    {
        if ($path && str_starts_with($path, self::DIRECTORY.'/')) {
            File::delete(public_path($path));
        }
    }
}
