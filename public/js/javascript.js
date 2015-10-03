$().ready(function () {
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        weekStart: 1,
        language: "nl",
        orientation: "bottom auto",
        autoclose: true,
        todayHighlight: true
    });
});