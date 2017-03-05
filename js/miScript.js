/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
  $("#acepta").change(function() {
      if ($(this).is(":checked")) {
          $("#enviar").prop("disabled", false);
      } else {
          $("#enviar").prop("disabled", true);
      }
  });
  

      
});
