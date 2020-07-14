$(document).ready(function(){

$(function() {
        $("#form").validationEngine();
  })
 function confirm_reset() {
    return confirm("Are you sure you want to reset all text?");
}



// Multiple Date Picker==



$("#Txt_Date").datepicker({
    format: 'd-M-yyyy',
    inline: false,
    lang: 'en',
    step: 5,
    multidate: 5,
    closeOnDateSelect: true
});






$(document).ready(function(){
  $("#auto_toggle").change(function(){

     if ($('#auto_toggle').is(':checked') == true){
         $('#textbox1').val(1);
         calculate_sum();
         $(".calculate").on('change');
      }
      else{
        $('#textbox1').val(0);
      }
  
  });


$(".calculate").on('change', function(){  
  
  if($("#textbox1").val() == 1){
    calculate_sum();
   }
});

function calculate_sum(){
  var total = 0;
  var calculate_1 =  $("#calculate_1").val();
        if(!isNaN(parseFloat(calculate_1))){
         total += parseFloat(calculate_1);
       }

        var calculate_2 =  $("#calculate_2").val();
        if(!isNaN(parseFloat(calculate_2))){
         total += parseFloat(calculate_2);
       }

       var calculate_3 =  $("#calculate_3").val();
        if(!isNaN(parseFloat(calculate_3))){
         total += parseFloat(calculate_3);
       }

        var calculate_4 =  $("#calculate_4").val();
        if(!isNaN(parseFloat(calculate_4))){
         total += parseFloat(calculate_4);
       }

       var calculate_5 =  $("#calculate_5").val();
        if(!isNaN(parseFloat(calculate_5))){
         total += parseFloat(calculate_5);
       }
        var calculate_6 =  $("#calculate_6").val();
        if(!isNaN(parseFloat(calculate_6))){
         total += parseFloat(calculate_6);
       }

       $("#calculate_7").val(total);
       $("#calculate_8").val(total);

       var gst = total*(0.18);
       var round_gst = Math.round(gst * 100) / 100;
       $("#calculate_9").val(round_gst);

       var payable       = round_gst + total;
       var round_payable = Math.round(payable * 1) / 1;
       $("#calculate_10").val(round_payable);

      
        var balance =0;
        var calculate_11 =  $("#calculate_11").val();
        if(!isNaN(parseFloat(calculate_11))){
         var amount_received = parseFloat(calculate_11);
          balance= round_payable - amount_received;
       }
        $("#calculate_12").val(balance);
}




 function preview_image(event){
   var reader = new FileReader();
   reader.onload = function(){
    var output = document.getElementById('output_image');
    output.src = reader.result;
   }
   reader.readAsDataURL(event.target.files[0]);
}


function preview_image2(event) {
    var reader = new FileReader();
    reader.onload = function(){
    var output = document.getElementById('output_image2');
    output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}



var resultData=["Responsive Website","Landing Page","E Commerce Website","Website Renewal ","Landing Page Renewal","E Commerce Website Renewal","Google Ads - Search","Google Ads - Display","Google Ads - Remarketing","Google My Business Page","Google Search Engine Optimisation (SEO)","Facebook Commercial Page Management","Instagram Commercial Page Management","Twitter Commercial Page Management","LinkedIn Commercial Page Management","Printrest Commercial Page Management","Facebook Sponsored Promotion","Instagram Sponsored Promotion","Twitter Sponsored Promotion","LinkedIn Sponsored Promotion","Printrest Sponsored Promotion","YouTube Marketing","Leads Based Marketing","Email Creation","SSL Certificate","Additional Page Creation"];
   var myselect = $('<select>');
     $.each(resultData, function(index, key) {
       myselect.append( $('<option></option>').val(key).html(key) );
       });
      $('#product_service_1').append(myselect.html());
      $('#product_service_2').append(myselect.html());
      $('#product_service_3').append(myselect.html());
      $('#product_service_4').append(myselect.html());
      $('#product_service_5').append(myselect.html());


});







});



