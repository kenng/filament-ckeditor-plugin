<?php

declare(strict_types=1);

namespace Kenng\FilamentCkeditor;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class CKEditorServiceProvider extends PluginServiceProvider
{
    public static string $name = 'iw-filament-ckeditor';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)->hasViews();
    }
}
