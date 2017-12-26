$(document).ready(function() {
    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'mm/dd/yyyy'
    });

    $(document).on('click', '.toggle-edit-license', function() {
        var license_id        = $(this).data('license');
        var state_id        = $(this).data('id');
        var state_name      = $(this).data('state');
        var license_number  = $(this).data('license-number');
        var expiration_date = $(this).data('expiration-date');

        $('#editModal').modal({
            backdrop: 'static',
            keyboard: false
        });

        $('.modal-body').find('#license_id').val(license_id);
        $('.modal-body').find('#state_id').val(state_id);
        $('.modal-body').find('#state-name').val(state_name);
        $('.modal-body').find('#license-number').val(license_number);
        $('.modal-body').find('#expiration-date').val(expiration_date);
    });

    $(document).on('click', '#toggle-submit', function() {
        var license_id = $('#license_id').val();
        var _type = (license_id == "") ? 'post' : 'put';

        $.ajax({
            url: '/license/update',
            type: _type,
            data: $('#edit-license-form').serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('.message-container').removeClass('hidden');
                    setTimeout(function() {
                        $('.message-container').addClass('hidden');
                        $('#editModal').modal('hide');

                        $.ajax({
                            url: '/license/reload/list',
                            dataType: 'json',
                            beforeSend: function () {
                                var loader = "<tr><td colspan='4' class='text-center padding-20'><i class='fa fa-cog fa-2x fa-spin' aria-hidden='true'></i><br>Loading...</td></tr>";
                                $('#licenses-list-container').html(loader);
                              },
                            success: function(response) {
                                $('#licenses-list-container').html(response.data.list);
                            }
                        });
                    }, 3000);
                }
            },
            error: function(data) {
                var errors = data.responseJSON;
                var error_message = "";
                $.each(errors.errors, function(key, value) {
                    if (value !== undefined) {
                        error_message += "<li>"+ value +"</li>";
                    }
                });

                $('.error-wrapper').append(error_message);
                $('.error-container').removeClass('hidden');
                setTimeout(function () {
                    $('.error-container').addClass('hidden');
                }, 5000);
            }
        });
    });

    $(document).on('click', '#toggle-send-report', function() {
        $.ajax({
            url: '/send-report',
            type: 'post',
            data: $('#send-report-form').serialize(),
            dataType: 'json',
            beforeSend: function() {
                $('.send-report-wrapper').addClass('hidden');
                $('#send-report-container').append("<div id='sending-wrapper'><i class='fa fa-cog fa-spin' aria-hidden='true'></i>&nbsp;Sending...</div>");
            },
            success: function(response) {
                $('.send-report-wrapper').removeClass('hidden');
                $('#sending-wrapper').remove();

                if (response.success) {
                    $('.message-send-report-container').removeClass('hidden');
                    setTimeout(function() {
                        $('.message-send-report-container').addClass('hidden');
                    }, 3000);
                } else {
                    $('.message-send-report-container-error').removeClass('hidden');
                    $('#message-wrapper').text(response.message);
                    setTimeout(function() {
                        $('.message-send-report-container-error').addClass('hidden');
                    }, 3000);
                }
            }
        });
    });
});
