
<script src="../../../assets/admin/libs/moment/moment.js"></script>
<script src="../../../assets/admin/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


<script>
    // Date Picker
    jQuery('.mydatepicker, #datepicker, .input-group.date').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        endDate: '+0d',
        format: 'dd/mm/yyyy',
    });
    jQuery('#datepicker-autoclose1').datepicker({
        autoclose: true,
        todayHighlight: true,
        endDate: '+0d',
        format: 'dd/mm/yyyy',
    });

</script>


