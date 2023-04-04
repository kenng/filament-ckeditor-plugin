<?php

declare(strict_types=1);

namespace Kenng\FilamentCkeditor\Fields;

use Filament\Forms\Components\Field;

class CKEditor extends Field
{
    protected string $view = 'iw-filament-ckeditor::ckeditor';
    public string $editorId = "1";

    public function setEditorID(string $id): static
    {
        $this->editorId = $id;
        return $this;
    }

    public function fileAttachmentsDisk(string $disk): static
    {
        return $this;
    }
}
