$(document).ready(function () {
	$('#cinema_id').change(function () {
		const cinema_id = $(this).val();

		if (cinema_id) {
			$.ajax({
				url: '/theatre/' + cinema_id,
				type: 'GET',
				dataType: 'json',
				success: function (data) {
					console.log(123);
					$('#show_content').empty();
					$('#theatre').empty();
					$('#theatre').append('<option value="">-- select theatre --</option>');
					$.each(data, function (key, value) {
						$('#theatre').append('<option value="' + value.id + '">' + value.name + '</option>');
					});
				}
			});
		} else {
			$('#show-content').empty();
			$('#theatre').empty();
			$('#theatre').append('<option value="">-- select theatre --</option>');
		}
	});


	$('#theatre').change(function () {
		const theatre_id = $(this).val();

		if (theatre_id) {
			$.ajax({
				url: '/show/' + theatre_id,
				type: 'GET',
				success: function (data) {
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
