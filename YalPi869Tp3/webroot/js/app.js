var VehiculeApp = {};

(function () {
    VehiculeApp.getVehicules = function () {
        $.get('vehicules/getVehicule.json', function (response) {
            $label = $('#vehicule-label');
            $incompleteDiv = $('#vehicule-content');
            $incompleteDiv.empty();
            
            if (response.vehicules.length === 0) {
                $label.hide();
                
                $incompleteDiv.append('<div class="vehicule-content">No vehicule in the database.</div>');
            } else {
                $label.show();
                
                $.each(response.vehicules, function (key, value) {
                    $incompleteDiv.append('<div class="incomplete-vehicule" id="incomplete-' + value.id + '">' +
                            '<input id="typeText_' + value.id + '" class="form-control no-border" value="' + value.type + '" type="text" readonly> ' +
                            '<input id="plateText_' + value.id + '" class="form-control no-border" value="' + value.plate + '" type="text" readonly> ' +
                            '<button id="vehiculeEdit_' + value.id + '" class="form-control btn-xs" type="button">Edit</button>' +
                            '<button id="vehiculeDelete_' + value.id + '" class="form-control btn-xs" type="button">Delete</button>' +
                            '</label></div>');
                    $incompleteDiv.show('highlight');
                });
            }
        });
        $('#vehicule-error').remove();
        $('.form-group').removeClass('has-error');
    };
    
    


    VehiculeApp.editVehicule = function (id) {
        var btnLabel = $("#vehiculeEdit_" + id).html();
        if (btnLabel == "Edit") {
            $("#typeText_" + id).attr("readOnly", false);
            $("#plateText_" + id).attr("readOnly", false);
            $("#vehiculeEdit_" + id).text("Ok");
        } else {
            $("#typeText_" + id).attr("readOnly", true);
            $("#plateText_" + id).attr("readOnly", true);
            $("#vehiculeEdit_" + id).text("Edit");

            type = $("#typeText_" + id).val();
            plate = $("#plateText_" + id).val();

            var posting = $.post('vehicules/editVehicule.json', {
                type: type,
                plate: plate,
                id: id           
            });
            posting.done(function (response) {
                if (response.response.result == 'success') {
                    $('#vehicule-content').empty();
                    $('#inputLarge').val('');
                    VehiculeApp.getVehicules();
                } else if (response.response.result == 'fail') {
                    $('.form-group').addClass('has-error');
                    $('#task-input').append('<div class="error" id="vehicule-error">' + response.response.error + '</div>');
                }
            });
        }

    };
    
    VehiculeApp.deleteVehicule = function (id) {
        var posting = $.post('vehicules/deleteVehicule.json', {
                id: id           
            });
            posting.done(function (response) {
                if (response.response.result == 'success') {
                    $('#vehicule-content').empty();
                    $('#inputLarge').val('');
                    VehiculeApp.getVehicules();
                }
            });
    };

})();

(function ($) {
    
    $("#add-vehicule").submit(function (event) {
        
        $('#vehicule-error').remove();
        $('.form-group').removeClass('has-error');
        var $form = $(this),plate = $form.find("input[name='plate']").val(),subcategory = $form.find("select[name='subcategory_id']").val();
        var posting = $.post('vehicules/addVehicule.json', {
                plate: plate,
                type: 'test',
                subcategory: subcategory
            });
        posting.done(function (response) {
            if (response.response.result == 'success') {
                $('#vehicule-content').empty();
                $('#inputLarge').val('');
                VehiculeApp.getVehicules();
            } else if (response.response.result == 'fail') {
                $('.form-group').addClass('has-error');
                $('#task-input').append('<div class="error" id="vehicule-error">' + response.response.error + '</div>');
            }
        });
        event.preventDefault();
    });
    
    
    
    
    $(document).on('click', ':button', function () {
        var id = $(this).attr('id').replace('vehiculeEdit_', '');
        VehiculeApp.editVehicule(id);
    });
    
    $(document).on('click', ':button', function () {
        var id = $(this).attr('id').replace('vehiculeDelete_', '');
        VehiculeApp.deleteVehicule(id);
    });

    

    VehiculeApp.getVehicules();
})(jQuery);
