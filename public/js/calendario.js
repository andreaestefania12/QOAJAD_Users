<script>
    $( function(){

        // An array of dates
        var eventDates = {};
        eventDates[ new Date( '08/07/2020' )] = new Date( '08/07/2022' );
        eventDates[ new Date( '08/12/2020' )] = new Date( '08/12/2021' );
        eventDates[ new Date( '08/18/2021' )] = new Date( '08/18/2027' );
        eventDates[ new Date( '08/23/2023' )] = new Date( '08/23/2028' );
 
        $('#datepicker').datepicker({
            beforeShowDay: function( date ) {
            var highlight = eventDates[date];
            if( highlight ) {
                return [true, "event", 'Tooltip text'];
            } else {
                return [true, '', ''];
            }
        }
    });
});            
</script>