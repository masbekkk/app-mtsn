/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

const { runInContext } = require("lodash");

 $(function() {
  // Multiple images preview in browser
  var imagesPreview = function(input, placeToInsertImagePreview) {
      if (input.files) {
          var filesAmount = input.files.length;
          for (i = 0; i < filesAmount; i++) {
              var reader = new FileReader();
              reader.onload = function(event) {
                  $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
              }
              reader.readAsDataURL(input.files[i]);
          }
      }
  };

  $('#gallery-photo-add').on('change', function() {
      imagesPreview(this, 'div.gallery');
  });
});

$(document).on('submit', '#form', function (event) {
  event.preventDefault();
  // var userId = $('#editProfileUserId').val();
  var loadingButton = jQuery(this).find('#btnPrEditSave');
  loadingButton.button('loading');
  $.ajax({
    url: '/submits',
    type: 'post',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      alert('Title','Lorem Lorem Lorem', 'success');
    },
    error: function error(result) {
      console.log(result);
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});






"use strict";
