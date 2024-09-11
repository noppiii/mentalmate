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

    $(document).ready(function() {
        var questionIndex = 0; // Start index for questions

        function updateIndices() {
            $('[data-repeater-list="group-a"] [data-repeater-item]').each(function (index) {
                $(this).find('[id]').each(function () {
                    var id = $(this).attr('id').replace(/{index}/g, index);
                    $(this).attr('id', id);
                });
                $(this).find('[name]').each(function () {
                    var name = $(this).attr('name').replace(/\[\d+\]/g, '[' + index + ']');
                    $(this).attr('name', name);
                });
            });

            $('[data-repeater-list="group-a"] [data-repeater-item"] [data-repeater-list="group-b"] [data-repeater-item]').each(function (index) {
                $(this).find('[id]').each(function () {
                    var id = $(this).attr('id').replace(/{subIndex}/g, index);
                    $(this).attr('id', id);
                });
                $(this).find('[name]').each(function () {
                    var name = $(this).attr('name').replace(/\[\d+\]\[\d+\]/g, '[' + index + '][' + index + ']');
                    $(this).attr('name', name);
                });
            });
        }

        // Initialize repeater
        $('.form-repeater').repeater({
            show: function () {
                $(this).slideDown();
                updateIndices();
            },
            hide: function (e) {
                if (confirm('Are you sure you want to delete this item?')) {
                    $(this).slideUp(e);
                    updateIndices();
                }
            }
        });

        // Add Jawaban
        $(document).on('click', '[data-repeater-create-jawaban]', function (e) {
            e.preventDefault();
            var $questionItem = $(this).closest('[data-repeater-item]');
            var $groupB = $questionItem.find('[data-repeater-list="group-b"]');
            var answerIndex = $groupB.find('[data-repeater-item]').length;

            var $newJawaban = $groupB.find('[data-repeater-item]').first().clone();
            $newJawaban.find('input').val('');

            $newJawaban.find('[id]').each(function () {
                var id = $(this).attr('id').replace(/{index}/g, questionIndex).replace(/{subIndex}/g, answerIndex);
                $(this).attr('id', id);
            });

            $newJawaban.find('[name]').each(function () {
                var name = $(this).attr('name').replace(/\[\d+\]/g, '[' + questionIndex + ']').replace(/\[\d+\]\[\d+\]/g, '[' + questionIndex + '][' + answerIndex + ']');
                $(this).attr('name', name);
            });

            $groupB.append($newJawaban);
            updateIndices();
        });

        // Add Pertanyaan
        $(document).on('click', '[data-repeater-create-pertanyaan]', function (e) {
            e.preventDefault();

            var $newQuestionItem = $('[data-repeater-list="group-a"] [data-repeater-item]').first().clone();
            $newQuestionItem.find('input').val('');

            $newQuestionItem.find('[id]').each(function () {
                var id = $(this).attr('id').replace(/{index}/g, questionIndex);
                $(this).attr('id', id);
            });

            $newQuestionItem.find('[name]').each(function () {
                var name = $(this).attr('name').replace(/\[\d+\]/g, '[' + questionIndex + ']');
                $(this).attr('name', name);
            });

            var $jawabanTemplate = $newQuestionItem.find('[data-repeater-list="group-b"] [data-repeater-item]').first().clone();
            $jawabanTemplate.find('input').val('');

            $jawabanTemplate.find('[id]').each(function () {
                var id = $(this).attr('id').replace(/{index}/g, questionIndex).replace(/{subIndex}/g, 0);
                $(this).attr('id', id);
            });

            $jawabanTemplate.find('[name]').each(function () {
                var name = $(this).attr('name').replace(/\[\d+\]\[\d+\]/g, '[' + questionIndex + '][0]');
                $(this).attr('name', name);
            });

            $newQuestionItem.find('[data-repeater-list="group-b"]').empty().append($jawabanTemplate);

            $('[data-repeater-list="group-a"]').append($newQuestionItem);
            questionIndex++;
            updateIndices();
        });

        // Delete Jawaban
        $(document).on('click', '[data-repeater-delete-jawaban]', function (e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this jawaban?')) {
                $(this).closest('[data-repeater-item]').slideUp(function () {
                    $(this).remove();
                    updateIndices();
                });
            }
        });

        // Delete Pertanyaan
        $(document).on('click', '[data-repeater-delete-pertanyaan]', function (e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this pertanyaan?')) {
                $(this).closest('[data-repeater-item]').slideUp(function () {
                    $(this).remove();
                    updateIndices();
                });
            }
        });
    });


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
