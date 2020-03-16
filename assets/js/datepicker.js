
 // $( function() {
 //    $( "#datepicker1" ).datepicker({
 //    	dateFormat: 'yy-mm-dd'
 //    });
 //  } );


 // $( function() {
 //    $( "#datepicker2" ).datepicker({
 //    	dateFormat: 'yy-mm-dd'
 //    });
 //  } );


 $( function() {
    var dateFormat = 'yy-mm-dd',
      from = $( "#datepicker1" )
        .datepicker({
          defaultDate: "+0w",
          changeMonth: true,
          changeYear: true,
          numberOfMonths:1,
          dateFormat : 'yy-mm-dd'
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#datepicker2" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
        dateFormat : 'yy-mm-dd'
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });

    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }

      return date;
    }
  } );


 $(document).ready(function() {
   $('#datepickersum').datepicker({
     changeMonth: true,
     changeYear: true,
     dateFormat: 'yy-mm',

     onClose: function() {
        var iMonth = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        var iYear = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
     },

    //  beforeShow: function() {
    //    if ((selDate = $(this).val()).length > 0)
    //    {
    //       iYear = selDate.substring(selDate.length - 4, selDate.length);
    //       iMonth = jQuery.inArray(selDate.substring(0, selDate.length - 5), $(this).datepicker('option', 'monthNames'));
    //       $(this).datepicker('option', 'defaultDate', new Date(iYear, iMonth, 1));
    //        $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
    //    }
    // }
  });
});

