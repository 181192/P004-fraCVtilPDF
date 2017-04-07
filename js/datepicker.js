
/* Datetime */

$(function() {

    $('.datepicker').datepicker({
        format: 'M. yyyy',
        autoclose: true,
        minViewMode: 1,
        language: 'nb-NO'
        }).on('changeDate', function(selected){
            startDate = new Date(selected.date.valueOf());
            startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        });

    $('#fodselsdato').datepicker({
        format: 'dd.mm.yyyy',
        startView: 2,
        language: "nb-NO",
        autoclose: true,
        weekStart: 1
    });
});