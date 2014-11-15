;(function($, window, document) {
	$('document').ready(function () {
		$('#text_rows').change(function () {
			$('#file_data').attr('rows', this.value);
		});

		$('select#filename').change(function () {
			$('form#file_edit').submit();
		});

		$('a#select_all').click(function (e) { 
			e.preventDefault();
			$('table td input:checkbox').prop('checked', true);
		});

		$('a#unselect_all').click(function (e) {
			e.preventDefault();
			$('table td input:checkbox').prop('checked', false);
		});

	});
})(jQuery, window, document);
