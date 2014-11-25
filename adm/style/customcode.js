;(function($, window, document) {
	$('document').ready(function () {
		$('#editor_rows').bind('change keyup', function () {
			var editor_rows = Math.max(Math.min(this.value, 999), 5);
			$('#file_data').attr('rows', editor_rows);
		});

		$('select#filename').change(function () {
			$('form#file_edit').submit();
		});
	});
})(jQuery, window, document);
