$(document).ready(function () {
    $('#cinema_id').change(function () {
        var cinema_id = $(this).val();
        if (cinema_id) {
            $.ajax({
                url: '/theatre/' + cinema_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#theatre').empty();
                    $('#theatre').append('<option value="">-- Select Theatre --</option>');
                    $.each(data, function (key, value) {
                        $('#theatre').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#theatre').empty();
            $('#theatre').append('<option value="">-- Select Theatre --</option>');
        }
    });


    $('#theatre').change(function () {
        var theatre_id = $(this).val();
        if (theatre_id) {
            $.ajax({
                url: '/show/' + theatre_id,
                type: 'GET',
                success: function (data) {
                    console.log(data)
                    $('#show_content').html(data);
                }
            });
        } else {
            $('#theatre').empty();
        }
    });


    $(document).on('click', '.selected-show', function () {
        $('#show_id').val($(this).attr('show-id'));
    });
});
