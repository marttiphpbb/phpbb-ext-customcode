;(function($, window, document) {
	$('document').ready(function () {
		$('#editor_rows').bind('change keyup', function () {
			var editor_rows = Math.max(Math.min(this.value, 999), 5);
			$('#file_data').attr('rows', editor_rows);
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
