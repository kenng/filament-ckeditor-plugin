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
        // 'plugin-filament-signature-pad' => __DIR__ . '/../resources/dist/filament-signature-pad.css',
    ];

    protected array $scripts = [
        //        'plugin-filament-signature-pad' => __DIR__.'/../resources/dist/filament-signature-pad.js',
    ];

    protected array $beforeCoreScripts = [
        'ckeditor-super-v36.0.1' => __DIR__ . '/../resources/js/ckeditor.js',
    ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)->hasViews();
    }
}
