
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
   $('#datepickersumxxx').datepicker({
     changeMonth: true,
     changeYear: true,
     dateFormat: 'yy-mm',

     onClose: function() {
        var iMonth = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        var iYear = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
     },

  });
});


        $(function() {
            $('#datepickersum').datepicker( {
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy-mm',
            onClose: function(dateText, inst) { 
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
            });
        });