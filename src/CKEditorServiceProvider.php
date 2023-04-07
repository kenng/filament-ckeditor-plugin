<?php

declare(strict_types=1);

namespace Kenng\FilamentCkeditor;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class CKEditorServiceProvider extends PluginServiceProvider
{
    public static string $name = 'iw-filament-ckeditor';

    protected array $resources = [
        // CustomResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    protected array $styles = [
        'filament-ckeditor-styles' => __DIR__ . '/../ckeditor/build/style.css',
    ];

    protected array $scripts = [
        // 'filament-ckeditor-script' => __DIR__ . '/../ckeditor/build/ckeditor.js',
    ];

    protected array $beforeCoreScripts = [
        'filament-ckeditor-v36.0.1-1' => __DIR__ . '/../ckeditor/build/ckeditor.js',
    ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)->hasViews();
    }
}
