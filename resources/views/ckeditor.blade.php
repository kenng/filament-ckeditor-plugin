<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div
        x-data="{state:@entangle($getStatePath())}"
        x-init="initIwFilamentCkeditor('#iw-ckeditor-{{ $editorId }}', state)"
        id="iw-filament-ckeditor-div">
        <div wire:ignore class="iw-ckeditor-container"
              wire:key="{{ $getId() }}.{{ $getStatePath() }}"
        >
            <div id="iw-ckeditor-{{ $editorId }}" class="iw-ckeditor-body"></div>
        </div>
        <script>
            if ('undefined' === typeof initIwFilamentCkeditor) {
                function initIwFilamentCkeditor(name, state) {
                    ClassicEditor
                        .create( document.querySelector(name), {
                            allowedContent: true,
                            toolbar: {
                                items: [
                                    'sourceEditing', 'undo', 'redo', '|',
                                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                                    'removeFormat', 'heading', '|',
                                    '-',
                                    'bold', 'italic', 'underline', 'strikethrough', 'code', 'subscript', 'superscript', '|',
                                    'alignment', 'bulletedList', 'numberedList', 'todoList', '|',
                                    'outdent', 'indent', '|',
                                    '-',
                                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
                                    'specialCharacters', 'horizontalLine',
                                ],
                                shouldNotGroupWhenFull: true
                            },
                            mediaEmbed: {

                            },
                            list: {
                                properties: {
                                    styles: true,
                                    startIndex: true,
                                    reversed: true
                                }
                            },
                            placeholder: 'Your content...',
                            fontFamily: {
                                options: [
                                    'Arial, Helvetica, sans-serif',
                                    'default',
                                    'Courier New, Courier, monospace',
                                    'Georgia, serif',
                                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                                    'Tahoma, Geneva, sans-serif',
                                    'Times New Roman, Times, serif',
                                    'Trebuchet MS, Helvetica, sans-serif',
                                    'Verdana, Geneva, sans-serif'
                                ],
                                supportAllValues: true
                            },
                            fontSize: {
                                options: [ 10, 12, 14, 'default', 18, 20, 22, 24, 26, 28, 36, 48, 72 ],
                                supportAllValues: true
                            },
                            htmlSupport: {
                                allow: [
                                    {
                                        name: /.*/,
                                        attributes: true,
                                        classes: true,
                                        styles: true
                                    }
                                ]
                            },
                            htmlEmbed: {
                                showPreviews: false
                            },
                            link: {
                                decorators: {
                                    addTargetToExternalLinks: true,
                                    defaultProtocol: 'https://',
                                }
                            },
                            removePlugins: [
                                'MediaEmbedToolbar',
                            ]
                    })
                    .then(editor => {
                        editor.setData(state);
                        window.editor = editor;
                    }).catch( error => {
                        console.error( error );
                    } );
            }
        }
        </script>
    </div>
</x-dynamic-component>
