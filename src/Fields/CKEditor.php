<?php

declare(strict_types=1);

namespace Kenng\FilamentCkeditor\Fields;

use Filament\Forms\Components\Field;

class CKEditor extends Field
{
    protected string $view = 'iw-filament-ckeditor::ckeditor';
}
