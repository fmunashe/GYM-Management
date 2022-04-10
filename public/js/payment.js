$('#plan_id').change(function () {
    var content = $(this).val();

    {
        $('#validity').val(content);
    }
});
