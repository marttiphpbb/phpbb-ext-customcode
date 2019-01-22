;(function($, window, document) {
	$('document').ready(function () {
		$('select#filename').change(function () {
			$(this).closest('form').submit();
		});

		$('input#new_file').keydown(function(e) {
			if (e.which == 13) {
				$('input#create').focus();
			}
		});
	});
})(jQuery, window, document);
