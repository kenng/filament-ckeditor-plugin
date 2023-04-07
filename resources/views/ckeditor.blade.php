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
        <style>
            .ck-editor-container {
                width: 100%;
                margin: 20px auto;
            }

            .iw-ckeditor-body {
                flex: 1 1 0%;
            }

            .ck-editor__editable {
                resize: vertical;
                max-height: 400px;
            }

            .ck.ck-content.ck-editor__editable,
            .ck.ck-content.ck-editor__editable ul,
            .ck.ck-content.ck-editor__editable ol {
                padding: 20px;
            }

            .ck-editor__editable:not(.ck-read-only) .ck-widget_selected .ck-media__wrapper>:not(.ck-media__placeholder) {
                pointer-events: initial  !important;
            }
        </style>
        <script>
            if ('undefined' === typeof ExtendHTMLSupport) {
                class ExtendHTMLSupport extends Plugin {
                    init() {
                        // Extend schema with custom HTML elements.
                        const dataFilter = this.editor.plugins.get( 'DataFilter' );
                        const dataSchema = this.editor.plugins.get( 'DataSchema' );

                        // Block element
                        dataSchema.registerBlockElement( {
                            view: 'whatsapp',
                            model: 'myElementBlock',
                            modelSchema: {
                                inheritAllFrom: '$block'
                            }
                        } );

                        dataFilter.allowElement( 'whatsapp' );
                    }
                }
            // }

            // function initCustomElement(editor, name) {
            //     if (!window.iwCkEditorcustomElement) window.iwCkEditorcustomElement = [];
            //     if (window.iwCkEditorcustomElement[name]) return

            //     const dataFilter = editor.plugins.get( 'DataFilter' );
            //     const dataSchema = editor.plugins.get( 'DataSchema' );

            //     dataSchema.registerBlockElement( {
            //         isBlock: true,
            //         view: 'div',
            //         model: name,
            //         modelSchema: {
            //             inheritAllFrom: '$block'
            //         }
            //     } );

            //     dataFilter.allowElement( 'whatsapp' );

            //     window.iwCkEditorcustomElement[name] = 1;
            // }

            // if ('undefined' === typeof initIwFilamentCkeditor) {
                function initIwFilamentCkeditor(name, state) {
                    ClassicEditor
                        .create( document.querySelector(name), {
                            allowedContent: true,
                            // plugins: [ExtendHTMLSupport],
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
                            //     'CKBox',
                            //     'CKFinder',
                            //     'EasyImage',
                            //     'RealTimeCollaborativeComments',
                            //     'RealTimeCollaborativeTrackChanges',
                            //     'RealTimeCollaborativeRevisionHistory',
                            //     'PresenceList',
                            //     'Comments',
                            //     'TrackChanges',
                            //     'TrackChangesData',
                            //     'RevisionHistory',
                            //     'Pagination',
                            //     'WProofreader',
                            //     'MathType'
                            ]
                    })
                    .then(editor => {
                        // initCustomElement(editor, 'whatsapp')
                        // debugger
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
