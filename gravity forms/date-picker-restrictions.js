<script>
console.log("hello");
 gform.addFilter( 'gform_datepicker_options_pre_init', function( optionsObj, formId, fieldId ) {
var minLengthDaysStart = ['24/12/2017', '25/12/2017', '26/12/2017', '27/12/2017', '28/12/2017', '29/12/2017', '30/12/2017', '31/12/2017', '01/01/2018', '02/01/2018'];
var minLengthDaysEnd = ['02/01/2018', '03/01/2018', '04/01/2018', '05/01/2018', '06/01/2018', '07/01/2018', '08/01/2018', '09/01/2018', '10/01/2018', '11/01/2018'];
var schoolHolSpringStart = new Date('09/22/2017');
var schoolHolSpringEnd = new Date('10/09/2017');
var schoolHolSummerStart = new Date('12/14/2017');
var schoolHolSummerEnd = new Date('01/29/2018');


    if ( formId == 21 && fieldId == 36 ) {
        optionsObj.minDate = 0;
        optionsObj.onClose = function (dateText, inst) {
        console.log(dateText, "contains the date that was selected");
        var dateTextFormat = dateText.split("/");
        var a = dateTextFormat[0];
        dateTextFormat[0] = dateTextFormat[1]
        dateTextFormat[1] = a;
        dateTextFormat = dateTextFormat.toString().replace(/,/g, '/');;
        var selectedDate = new Date(dateTextFormat);

        if(selectedDate >= schoolHolSpringStart &&  selectedDate <= schoolHolSpringEnd) {
            console.log(selectedDate, schoolHolSpringStart, "spring holidays");
            jQuery('#input_21_37').datepicker('option', 'minDate', dateText).datepicker('setDate', dateText);
            jQuery('#input_21_44 option:nth-child(4)').css("display", "block");
            jQuery('#input_21_44 option:nth-child(5)').css("display", "block");
            jQuery('#input_21_44 option:nth-child(2)').css("display", "none");
            jQuery('#input_21_44 option:nth-child(3)').css("display", "none");
            var checkWarning = jQuery('#field_21_44 p').length;
            if(checkWarning == 0){
            jQuery('#field_21_44').append( "<p class='capacity-note'>Our centre is close to capacity on your selected dates. Please submit this enquiry and our friendly staff will be in touch to discuss your request.</p>" );
            }
            else {
            jQuery('.capacity-note').css("display", "block");
            }
          }

        else if(selectedDate >= schoolHolSummerStart &&  selectedDate <= schoolHolSummerEnd) {
        console.log(selectedDate, schoolHolSpringStart, "summer holidays");
          if(minLengthDaysStart.indexOf(dateText) != -1){
            var dateStartIndex = minLengthDaysStart.indexOf(dateText);
            var dateEnd = minLengthDaysEnd[dateStartIndex];
            console.log(dateText, dateStartIndex, dateEnd, dateTextFormat, "that date means min 10 nights");
            alert("Minimum booking during this period is 10 days.");
            jQuery('#input_21_37').datepicker('option', 'minDate', dateEnd).datepicker('setDate', dateEnd);
            jQuery('#input_21_44 option:nth-child(4)').css("display", "block");
            jQuery('#input_21_44 option:nth-child(5)').css("display", "block");
            jQuery('#input_21_44 option:nth-child(2)').css("display", "none");
            jQuery('#input_21_44 option:nth-child(3)').css("display", "none");
            if(checkWarning == 0){
            jQuery('#field_21_44').append( "<p class='capacity-note'>Our centre is close to capacity on your selected dates. Please submit this enquiry and our friendly staff will be in touch to discuss your request.</p>" );
            }
            else {
            jQuery('.capacity-note').css("display", "block");
            }
          }
          else{
              jQuery('#input_21_37').datepicker('option', 'minDate', dateText).datepicker('setDate', dateText);
              jQuery('#input_21_44 option:nth-child(4)').css("display", "block");
              jQuery('#input_21_44 option:nth-child(5)').css("display", "block");
              jQuery('#input_21_44 option:nth-child(2)').css("display", "none");
              jQuery('#input_21_44 option:nth-child(3)').css("display", "none");
              if(checkWarning == 0){
              jQuery('#field_21_44').append( "<p class='capacity-note'>Our centre is close to capacity on your selected dates. Please submit this enquiry and our friendly staff will be in touch to discuss your request.</p>" );
              }
              else {
              jQuery('.capacity-note').css("display", "block");
              }
            }

          }

        else{
          console.log("regular day");
             jQuery('#input_21_37').datepicker('option', 'minDate', dateText).datepicker('setDate', dateText);
             jQuery('#input_21_44 option:nth-child(2)').css("display", "block");
             jQuery('#input_21_44 option:nth-child(3)').css("display", "block");
             jQuery('#input_21_44 option:nth-child(4)').css("display", "none");
             jQuery('#input_21_44 option:nth-child(5)').css("display", "none");
             jQuery('#field_21_44 p').css("display", "none");
         }
        };
    }
    return optionsObj;
});</script>
