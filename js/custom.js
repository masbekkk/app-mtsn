/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

 $('.btn-plus, .btn-minus').on('click', function(e) {
    const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
    const input = $(e.target).closest('.input-group').find('input');
    if (input.is('input')) {
      input[0][isNegative ? 'stepDown' : 'stepUp']()
    }
    var x = document.getElementById("QTY").value;
    var y = document.getElementById("PPRICE").value;
    var multi = x * y;
    document.getElementById("TOTAL").innerHTML = multi;
   
  })

$("#min,#plus").click(function(){ 

    $('#TOTAL').val($('#PPRICE').val() * $('#QTY').val());

});

$("#beli").click(function(){ 

  $('#quantity').val($('#QTY').val());
  $('#tot').val($('#TOTAL').val());
  $('#variasi').val($('#varian').val());

});

$(function() {
  $('#image').on('click', function() {
      $('.imagepreview').attr('src', $(this).find('img').attr('src'));
      $('#exampleModal').modal('show');   
  });     
});






"use strict";
