(function ($) {
    'use strict';

    $(document).ready(function ($) {

        /**
         * Flash a message in the shared admin notice strip.
         * type is 'success' or 'warning'.
         */
        function onyxAlert(message, type) {
            $('.onyx-alert')
                .addClass('onyx-alert-' + type + ' onyx-alert-active')
                .find('span').text(message);

            setTimeout(function () {
                $('.onyx-alert').removeClass('onyx-alert-active onyx-alert-success onyx-alert-warning onyx-alert-neutral');
            }, 3500);
        }

        /* ---------- Tools tab ---------- */

        $('.onyx-export-settings').on('click', function () {
            const $btn = $(this).addClass('onyx-btn-loading').attr('disabled', true);

            $.post(onyx_admin_obj.ajaxurl, {
                action: 'onyx_export_settings',
                nonce: onyx_admin_obj.nonce
            }).done(function (response) {
                if (!response.success) {
                    onyxAlert((response.data && response.data.message) || 'Export failed.', 'warning');
                    return;
                }

                const blob = new Blob([JSON.stringify(response.data.settings, null, 2)], {type: 'application/json'});
                const url = URL.createObjectURL(blob);
                const link = document.createElement('a');
                link.href = url;
                link.download = response.data.filename;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                URL.revokeObjectURL(url);

                onyxAlert('Settings exported.', 'success');
            }).fail(function () {
                onyxAlert('Export failed.', 'warning');
            }).always(function () {
                $btn.removeClass('onyx-btn-loading').removeAttr('disabled');
            });
        });

        $('.onyx-import-settings').on('click', function () {
            const $btn = $(this);
            const input = $btn.closest('.onyx-settings-field').find('.onyx-import-file')[0];
            const file = input && input.files ? input.files[0] : null;

            if (!file) {
                onyxAlert('Choose a JSON file first.', 'warning');
                return;
            }

            const reader = new FileReader();

            reader.onload = function () {
                $btn.addClass('onyx-btn-loading').attr('disabled', true);

                $.post(onyx_admin_obj.ajaxurl, {
                    action: 'onyx_import_settings',
                    nonce: onyx_admin_obj.nonce,
                    settings: reader.result
                }).done(function (response) {
                    if (response.success) {
                        onyxAlert(response.data.message, 'success');
                        setTimeout(function () { window.location.reload(); }, 800);
                    } else {
                        onyxAlert((response.data && response.data.message) || 'Import failed.', 'warning');
                        $btn.removeClass('onyx-btn-loading').removeAttr('disabled');
                    }
                }).fail(function () {
                    onyxAlert('Import failed.', 'warning');
                    $btn.removeClass('onyx-btn-loading').removeAttr('disabled');
                });
            };

            reader.onerror = function () {
                onyxAlert('That file could not be read.', 'warning');
            };

            reader.readAsText(file);
        });

        $('.onyx-reset-settings').on('click', function () {
            if (!window.confirm('Reset every Onyx setting back to its default? This cannot be undone.')) {
                return;
            }

            const $btn = $(this).addClass('onyx-btn-loading').attr('disabled', true);

            $.post(onyx_admin_obj.ajaxurl, {
                action: 'onyx_reset_settings',
                nonce: onyx_admin_obj.nonce
            }).done(function (response) {
                if (response.success) {
                    onyxAlert(response.data.message, 'success');
                    setTimeout(function () { window.location.reload(); }, 800);
                } else {
                    onyxAlert((response.data && response.data.message) || 'Reset failed.', 'warning');
                    $btn.removeClass('onyx-btn-loading').removeAttr('disabled');
                }
            }).fail(function () {
                onyxAlert('Reset failed.', 'warning');
                $btn.removeClass('onyx-btn-loading').removeAttr('disabled');
            });
        });

        $('.onyx-save-settings.onyx-settings-btn button').on('click', function (e) {
            e.preventDefault();
            const $formBtn = $(this);
            const $form = $formBtn.closest('form');
            $formBtn.addClass('onyx-button-loader');

            //FORCE CodeMirror → textarea sync
            if (window.onyxEditors) {
                window.onyxEditors.forEach(cm => cm.save());
            }

            var formData = new FormData($form[0]);
            formData.append('action', 'onyx_settings_save');
            formData.append('nonce', onyx_admin_obj.nonce);

            $.ajax({
                url: onyx_admin_obj.ajaxurl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        onyxAlert(response.data.message, 'success');
                    } else {
                        onyxAlert((response.data && response.data.message) || 'Failed to save settings.', 'warning');
                    }
                    $formBtn.removeClass('onyx-button-loader');
                },
                error: function () {
                    $formBtn.removeClass('onyx-button-loader');
                }
            });
        });

        $(document).on('click', 'button.onyx-add-replace-image', function () {
            const addImageFieldBtn = $(this),
                count = addImageFieldBtn.closest('.onyx-field-wrap').find('.onyx-image-count'),
                listwrapper = addImageFieldBtn.closest('.onyx-field-wrap').find('.onyx-replace-image-values-wrap');

            addImageFieldBtn.addClass('onyx-btn-loading').attr('disabled', true);
            $.ajax({
                url: onyx_admin_obj.ajaxurl,
                type: 'POST',
                data: {
                    action: 'onyx_replace_image_fields_options',
                    nonce: onyx_admin_obj.nonce,
                    count: count.val(),
                },

            }).done(function (result) {
                count.val(parseInt(count.val()) + 1);
                listwrapper.append(result);
                addImageFieldBtn.removeClass('onyx-btn-loading').removeAttr('disabled');
            });
        })

        $(document).on('click', 'button.onyx-add-invert-image', function () {
            const addImageFieldBtn = $(this),
                count = addImageFieldBtn.closest('.onyx-field-wrap').find('.onyx-invert-image-count'),
                listwrapper = addImageFieldBtn.closest('.onyx-field-wrap').find('.onyx-replace-image-values-wrap');

            addImageFieldBtn.addClass('onyx-btn-loading').attr('disabled', true);
            $.ajax({
                url: onyx_admin_obj.ajaxurl,
                type: 'POST',
                data: {
                    action: 'onyx_invert_image_fields_options',
                    nonce: onyx_admin_obj.nonce,
                    count: count.val(),
                },

            }).done(function (result) {
                count.val(parseInt(count.val()) + 1);
                listwrapper.append(result);
                addImageFieldBtn.removeClass('onyx-btn-loading').removeAttr('disabled');
            });
        })

        $(document).on('click', 'button.onyx-add-color-override', function () {
            const addBtn = $(this),
                count = addBtn.closest('.onyx-field-wrap').find('.onyx-color-override-count'),
                listwrapper = addBtn.closest('.onyx-field-wrap').find('.onyx-color-override-wrap');

            addBtn.addClass('onyx-btn-loading').attr('disabled', true);
            $.ajax({
                url: onyx_admin_obj.ajaxurl,
                type: 'POST',
                data: {
                    action: 'onyx_color_override_fields_options',
                    nonce: onyx_admin_obj.nonce,
                    count: count.val(),
                },

            }).done(function (result) {
                count.val(parseInt(count.val()) + 1);
                const $row = $(result);
                listwrapper.append($row);
                // New markup is not covered by the initial wpColorPicker pass.
                $row.find('.onyx-color-picker').wpColorPicker({
                    change: onyxRefreshPreview,
                    clear: onyxRefreshPreview
                });
                addBtn.removeClass('onyx-btn-loading').removeAttr('disabled');
            });
        })

        $(document).on('click', '.onyx-remove-image-value', function () {
            $(this).closest('.onyx-replace-image-fields').remove();
        })

        /* ---------- Colors tab live preview ---------- */

        // Setting name -> palette key, for the Custom preset.
        const onyxCustomFieldMap = {
            dark_mode_bg: 'bg',
            dark_mode_secondary_bg: 'secondary_bg',
            dark_mode_text_color: 'text_color',
            dark_mode_link_color: 'link_color',
            dark_mode_link_hover_color: 'link_hover_color',
            dark_mode_input_bg: 'input_bg',
            dark_mode_input_text_color: 'input_text_color',
            dark_mode_input_placeholder_color: 'input_placeholder_color',
            dark_mode_border_color: 'border_color',
            dark_mode_btn_text_color: 'btn_text_color',
            dark_mode_btn_bg: 'btn_bg',
            dark_mode_btn_text_color_hover: 'btn_text_color_hover',
            dark_mode_btn_bg_hover: 'btn_bg_hover'
        };

        function onyxCurrentPalette() {
            const presets = onyx_admin_obj.palettes || {};
            const fallback = presets['style-1'] || {};
            const selected = $('input[name="onyx_settings[preset_style]"]:checked').val() || 'style-1';

            if (selected !== 'custom') {
                return presets[selected] || fallback;
            }

            // Custom mode mirrors the PHP side: start from style-1 so a partly
            // filled palette still previews instead of going blank.
            const palette = $.extend({}, fallback);
            Object.keys(onyxCustomFieldMap).forEach(function (name) {
                const value = $('input[name="onyx_settings[' + name + ']"]').val();
                if (value) {
                    palette[onyxCustomFieldMap[name]] = value;
                }
            });
            return palette;
        }

        function onyxRefreshPreview() {
            const panel = document.getElementById('onyx-preview-panel');
            if (!panel) return;

            const palette = onyxCurrentPalette();
            Object.keys(palette).forEach(function (key) {
                panel.style.setProperty('--onyx_mode_' + key, palette[key]);
            });
        }

        // wpColorPicker fires change before the input value settles, so defer.
        function onyxSchedulePreviewRefresh() {
            setTimeout(onyxRefreshPreview, 0);
        }

        $('.onyx-color-picker').wpColorPicker({
            change: onyxSchedulePreviewRefresh,
            clear: onyxSchedulePreviewRefresh
        });

        $(document).on('change', 'input[name="onyx_settings[preset_style]"]', onyxRefreshPreview);
        onyxRefreshPreview();

        /* Backend Tabs Toggle Buttons Actions */
        $('body').on('click', '.onyx-tab', function () {
            var selected_menu = $(this).data('tab');
            var hideDivs = $(this).data('tohide');

            // Display The Clicked Tab Content
            $('body').find('.' + hideDivs).hide();
            $('body').find('#' + selected_menu).show();

            // Add and remove the class for active tab
            $(this).parent().find('.onyx-tab').removeClass('onyx-tab-active');
            $(this).addClass('onyx-tab-active');

            if ($(this).find('input'))
                $(this).find('input').prop('checked', true);
        });

        $('.onyx-range-input').each(function () {
            var $dis = $(this);
            var defaultValue = $dis.val() ? parseFloat($dis.val()) : '';
            $dis.prev('.onyx-range-slider').slider({
                range: "min",
                value: defaultValue,
                min: parseFloat($dis.attr('min')),
                max: parseFloat($dis.attr('max')),
                step: parseFloat($dis.attr('step')),
                slide: function (event, ui) {
                    $dis.val(ui.value).trigger('change');
                }
            });
        });

        // Update slider if the input field loses focus as it's most likely changed
        $('.onyx-range-input').blur(function () {
            var resetValue = isNaN($(this).val()) ? '' : $(this).val();

            if (resetValue) {
                var sliderMinValue = parseFloat($(this).attr('min'));
                var sliderMaxValue = parseFloat($(this).attr('max'));
                // Make sure our manual input value doesn't exceed the minimum & maxmium values
                if (resetValue < sliderMinValue) {
                    resetValue = sliderMinValue;
                }
                if (resetValue > sliderMaxValue) {
                    resetValue = sliderMaxValue;
                }
            }
            $(this).val(resetValue).trigger('change');
            $(this).prev('.onyx-range-slider').slider('value', resetValue);
        });

        // Linked button
        $('.onyx-linked').on('click', function () {
            $(this).closest('.onyx-unit-fields').addClass('onyx-not-linked');
        });

        // Unlinked button
        $('.onyx-unlinked').on('click', function () {
            $(this).closest('.onyx-unit-fields').removeClass('onyx-not-linked');
        });

        // Values linked inputs
        $('.onyx-unit-fields input').on('input', function () {
            var $val = $(this).val();
            $(this).closest('.onyx-unit-fields:not(.onyx-not-linked)').find('input').each(function (key, value) {
                $(this).val($val).change();
            });
        });


        /*Code mirror activation*/
        window.onyxEditors = [];

        $('.onyx-codemirror-css-textarea').each(function () {
            const $codeMirrorCSSEditors = $(this);

            if ($codeMirrorCSSEditors.length && wp.codeEditor) {
                var editorSettings = wp.codeEditor.defaultSettings ? _.clone(wp.codeEditor.defaultSettings) : {};
                editorSettings.codemirror = _.extend(
                    {},
                    editorSettings.codemirror,
                    {
                        lineNumbers: true,
                        lineWrapping: true,
                        autoRefresh: true,
                        mode: 'css',
                    }
                );
                const editor = wp.codeEditor.initialize($codeMirrorCSSEditors, editorSettings);

                if (editor && editor.codemirror) {
                    window.onyxEditors.push(editor.codemirror);
                }
            }
        });

        $.each($('.onyx-codemirror-js-textarea'), function (key, value) {
            const $codeMirrorJSEditors = $(this);

            if ($codeMirrorJSEditors.length && wp.codeEditor) {
                var editorSettings = wp.codeEditor?.defaultSettings ? _.clone(wp.codeEditor.defaultSettings) : {};
                editorSettings.codemirror = _.extend(
                    {},
                    editorSettings.codemirror,
                    {
                        lineNumbers: true,
                        lineWrapping: true,
                        autoRefresh: true,
                        mode: 'javascript',
                    }
                );

                const editor = wp.codeEditor.initialize($codeMirrorJSEditors, editorSettings);

                if (editor && editor.codemirror) {
                    window.onyxEditors.push(editor.codemirror);
                }
            }
        });

        $('.onyx-icon-btn').on('click', function () {
            const btn = $(this);
            const parent = btn.closest('.onyx-icon-pick-wrap');
            parent.find('.onyx-icon').val(btn.attr('data-name'));

            // clear previous
            const prev = parent.find('[aria-pressed="true"]');
            if (prev) {
                prev.attr('aria-pressed', 'false');
            }

            btn.attr('aria-pressed', 'true');
            btn.focus();
            return false;
        });

        let mediaFrame;

        $(document).on('click', '.onyx-media-uploader', function (e) {
            e.preventDefault();
            var triggerButton = $(this);
            var inputField = triggerButton.prev('input');

            // Create WP media frame
            if (!mediaFrame) {
                mediaFrame = wp.media({
                    title: 'Select an Image',
                    button: {
                        text: 'Use this image'
                    },
                    multiple: false
                });
            }

            // Remove old select event to avoid duplicate bindings
            mediaFrame.off('select');

            // When an image is selected
            mediaFrame.on('select', function () {
                var attachment = mediaFrame.state().get('selection').first().toJSON();
                // Fill input with the URL
                $(inputField).val(attachment.url).trigger('change');
            });

            // Open the modal
            mediaFrame.open();
        });
    });

})(jQuery);
