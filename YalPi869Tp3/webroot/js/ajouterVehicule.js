(function ($) {
    
    $("#add-vehicule").submit(function (event) {
        $('#vehicule-error').remove();
        $('.form-group').removeClass('has-error');
        var $form = $(this),plate = $form.find("input[name='plate']").val(),subcategory = $form.find("select[name='subcategory_id']").val();
        var posting = $.post('addVehicule.json', {
                plate: plate,
                subcategory: subcategory
            });
        posting.done(function (response) {
            if (response.response.result == 'success') {
                $('#vehicule-content').empty();
                $('#inputLarge').val('');
            } else if (response.response.result == 'fail') {
                $('.form-group').addClass('has-error');
                $('#task-input').append('<div class="error" id="vehicule-error">' + response.response.error + '</div>');
            }
        });
        
        event.preventDefault();
    });
})(jQuery);
