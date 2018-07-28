import '../../../node_modules/jquery/dist/jquery.js';

$(document).ready(function () {
	// Tricky way to enforce javascript:
	// Enable the login forms only after the page is loaded
	$('.form-signin fieldset').attr('disabled', false);
});