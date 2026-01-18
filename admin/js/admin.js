(function ($) {
    'use strict';

    $(document).ready(function ($) {

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

            $.ajax({
                url: onyx_admin_obj.ajaxurl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        $('.onyx-alert').addClass('onyx-alert-success onyx-alert-active').find('span').html(response.data.message);
                        $formBtn.removeClass('onyx-button-loader');

                        setTimeout(function () {
                            $('.onyx-alert').removeClass('onyx-alert-active onyx-alert-success onyx-alert-warning onyx-alert-neutral');
                        }, 3500);
                    } else {
                        console.log('Failed to save.');
                        $formBtn.removeClass('onyx-button-loader');
                    }
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
                    count: count.val(),
                },

            }).done(function (result) {
                count.val(parseInt(count.val()) + 1);
                listwrapper.append(result);
                addImageFieldBtn.removeClass('onyx-btn-loading').removeAttr('disabled');
            });
        })

        $(document).on('click', '.onyx-remove-image-value', function () {
            $(this).closest('.onyx-replace-image-fields').remove();
        })

        $('.onyx-color-picker').wpColorPicker();

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
            console.log('ok');
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

        $(document).on('click', '.onyx-replace-image button', function (e) {
            const button = $(this);
            e.preventDefault();

            // If frame already exists, reopen it
            if (mediaFrame) {
                mediaFrame.open();
                return;
            }

            // Create WP media frame
            mediaFrame = wp.media({
                title: 'Select an Image',
                button: {
                    text: 'Use this image'
                },
                multiple: false
            });

            // When an image is selected
            mediaFrame.on('select', function () {
                const attachment = mediaFrame.state().get('selection').first().toJSON();
                const input = button.prev('input');

                // Fill input with the URL
                $(input).val(attachment.url);
            });

            // Open the modal
            mediaFrame.open();
        });
    });

})(jQuery);
