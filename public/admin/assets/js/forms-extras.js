/**
 * Form Extras
 */

'use strict';

(function () {
  const textarea = document.querySelector('#autosize-demo'),
    creditCard = document.querySelector('.credit-card-mask'),
    phoneMask = document.querySelector('.phone-number-mask'),
    dateMask = document.querySelector('.date-mask'),
    timeMask = document.querySelector('.time-mask'),
    numeralMask = document.querySelector('.numeral-mask'),
    blockMask = document.querySelector('.block-mask'),
    delimiterMask = document.querySelector('.delimiter-mask'),
    customDelimiter = document.querySelector('.custom-delimiter-mask'),
    prefixMask = document.querySelector('.prefix-mask');

  // Autosize
  // --------------------------------------------------------------------
  if (textarea) {
    autosize(textarea);
  }

  // Cleave JS Input Mask
  // --------------------------------------------------------------------

  // Credit Card
  if (creditCard) {
    new Cleave(creditCard, {
      creditCard: true,
      onCreditCardTypeChanged: function (type) {
        if (type != '' && type != 'unknown') {
          document.querySelector('.card-type').innerHTML =
            '<img src="' + assetsPath + 'img/icons/payments/' + type + '-cc.png" height="28"/>';
        } else {
          document.querySelector('.card-type').innerHTML = '';
        }
      }
    });
  }

  // Phone Number
  if (phoneMask) {
    new Cleave(phoneMask, {
      phone: true,
      phoneRegionCode: 'US'
    });
  }

  // Date
  if (dateMask) {
    new Cleave(dateMask, {
      date: true,
      delimiter: '-',
      datePattern: ['Y', 'm', 'd']
    });
  }

  // Time
  if (timeMask) {
    new Cleave(timeMask, {
      time: true,
      timePattern: ['h', 'm', 's']
    });
  }

  //Numeral
  if (numeralMask) {
    new Cleave(numeralMask, {
      numeral: true,
      numeralThousandsGroupStyle: 'thousand'
    });
  }

  //Block
  if (blockMask) {
    new Cleave(blockMask, {
      blocks: [4, 3, 3],
      uppercase: true
    });
  }

  // Delimiter
  if (delimiterMask) {
    new Cleave(delimiterMask, {
      delimiter: '·',
      blocks: [3, 3, 3],
      uppercase: true
    });
  }

  // Custom Delimiter
  if (customDelimiter) {
    new Cleave(customDelimiter, {
      delimiters: ['.', '.', '-'],
      blocks: [3, 3, 3, 2],
      uppercase: true
    });
  }

  // Prefix
  if (prefixMask) {
    new Cleave(prefixMask, {
      prefix: '+63',
      blocks: [3, 3, 3, 4],
      uppercase: true
    });
  }
})();

// bootstrap-maxlength & repeater (jquery)
$(function () {
  var maxlengthInput = $('.bootstrap-maxlength-example'),
    formRepeater = $('.form-repeater');

  // Bootstrap Max Length
  // --------------------------------------------------------------------
  if (maxlengthInput.length) {
    maxlengthInput.each(function () {
      $(this).maxlength({
        warningClass: 'label label-success bg-success text-white',
        limitReachedClass: 'label label-danger',
        separator: ' out of ',
        preText: 'You typed ',
        postText: ' chars available.',
        validate: true,
        threshold: +this.getAttribute('maxlength')
      });
    });
  }

  // Form Repeater
  // ! Using jQuery each loop to add dynamic id and class for inputs. You may need to improve it based on form fields.
  // -----------------------------------------------------------------------------------------------------------------

    if (formRepeater.length) {
        var questionRow = 2;
        var answerCol = 1;

        formRepeater.on('submit', function (e) {
            e.preventDefault();
        });

        formRepeater.repeater({
            show: function () {
                var fromControl = $(this).find('.form-control, .form-select');
                var formLabel = $(this).find('.form-label');

                // Check if it's a pertanyaan (question) repeater
                if ($(this).parents('[data-repeater-list="group-a"]').length > 0) {
                    fromControl.each(function (i) {
                        var id = 'form-repeater-pertanyaan-' + questionRow;
                        $(fromControl[i]).attr('id', id);
                        $(formLabel[i]).attr('for', id);
                    });
                    questionRow++;
                }

                $(this).slideDown();
            },
            hide: function (e) {
                confirm('Are you sure you want to delete this element?') && $(this).slideUp(e);
            }
        });

        // Create Jawaban
        $(document).on('click', '[data-repeater-create-jawaban]', function (e) {
            e.preventDefault();
            var $repeaterItem = $(this).closest('[data-repeater-item]');
            var repeaterGroupB = $repeaterItem.find('[data-repeater-list="group-b"]');

            var newItem = repeaterGroupB.find('[data-repeater-item]').first().clone();
            newItem.find('input').val(''); // Clear the inputs

            // Update the IDs and Labels for the new item
            var questionIndex = $repeaterItem.index() + 1;
            answerCol = repeaterGroupB.find('[data-repeater-item]').length + 1;

            newItem.find('.form-control, .form-select').each(function (i) {
                var id = 'form-repeater-jawaban-' + questionIndex + '-' + answerCol;
                $(this).attr('id', id);
                $(this).siblings('.form-label').attr('for', id);
            });

            repeaterGroupB.append(newItem);
        });

        // Create Pertanyaan
        $(document).on('click', '[data-repeater-create-pertanyaan]', function (e) {
            e.preventDefault();

            // Clone the first question item and reset values
            var $newQuestionItem = $('[data-repeater-list="group-a"]').find('[data-repeater-item]').first().clone();
            $newQuestionItem.find('input').val(''); // Clear the inputs

            // Reset IDs and Labels for the new item
            $newQuestionItem.find('.form-control, .form-select').each(function (i) {
                var id = 'form-repeater-pertanyaan-' + questionRow;
                $(this).attr('id', id);
                $(this).siblings('.form-label').attr('for', id);
            });

            // Add only one default jawaban
            var $jawabanTemplate = $newQuestionItem.find('[data-repeater-list="group-b"]').find('[data-repeater-item]').first().clone();
            $jawabanTemplate.find('input').val(''); // Clear the inputs
            $jawabanTemplate.find('.form-control, .form-select').each(function (i) {
                var id = 'form-repeater-jawaban-' + questionRow + '-1';
                $(this).attr('id', id);
                $(this).siblings('.form-label').attr('for', id);
            });

            $newQuestionItem.find('[data-repeater-list="group-b"]').empty().append($jawabanTemplate);

            $('[data-repeater-list="group-a"]').append($newQuestionItem);
            questionRow++;
        });

        // Delete Jawaban
        $(document).on('click', '[data-repeater-delete-jawaban]', function (e) {
            e.preventDefault();
            var $item = $(this).closest('[data-repeater-item]');

            // Confirm delete
            if (confirm('Are you sure you want to delete this jawaban?')) {
                $item.slideUp(function() {
                    $(this).remove();
                });
            }
        });

        // Delete Pertanyaan
        $(document).on('click', '[data-repeater-delete-pertanyaan]', function (e) {
            e.preventDefault();
            var $item = $(this).closest('[data-repeater-item]');

            // Confirm delete
            if (confirm('Are you sure you want to delete this pertanyaan?')) {
                $item.slideUp(function() {
                    $(this).remove();
                });
            }
        });
    }


    // if (formRepeater.length) {
    //     var row = 2;
    //     var col = 1;
    //     formRepeater.on('submit', function (e) {
    //         e.preventDefault();
    //     });
    //     formRepeater.repeater({
    //         show: function () {
    //             var fromControl = $(this).find('.form-control, .form-select');
    //             var formLabel = $(this).find('.form-label');
    //
    //             fromControl.each(function (i) {
    //                 var id = 'form-repeater-' + row + '-' + col;
    //                 $(fromControl[i]).attr('id', id);
    //                 $(formLabel[i]).attr('for', id);
    //                 col++;
    //             });
    //
    //             row++;
    //
    //             $(this).slideDown();
    //         },
    //         hide: function (e) {
    //             confirm('Are you sure you want to delete this element?') && $(this).slideUp(e);
    //         }
    //     });
    // }
});
