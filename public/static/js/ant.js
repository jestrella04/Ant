import $ from 'jquery';
import moment from 'moment';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

$(document).ready(function () {
	// Tricky way to enforce javascript:
	// Enable the login forms only after the page is loaded
	$('.form-signin fieldset').attr('disabled', false);

	// Show dates in local format/timezone
	$.each($('.date'), function () {
		var serverDate = $(this).text();

		if (serverDate) {
			var localDate = moment.utc(serverDate).local().format('MM-DD-YYYY');
			$(this).text(localDate);
		}
	});

	// Enable rich text editor on selected textareas
	ClassicEditor
		.create(document.querySelector('.rich-text-editor'))
		.then(editor => {
			console.log('Editor was initialized', editor);
		})
		.catch(err => {
			console.error(err.stack);
		});

	// Get the list of selected files
	$('input[type=file]').on('change', function () {
		var len = $(this)[0].files.length;
		var items = $(this)[0].files;
		var op = '';

		$('#files-selected').empty();

		if (len > 0) {
			for (var i = 0; i < len; i++) {
				var fileName = items[i].name;
				var fileSize = items[i].size;
				//var fileType = items[i].type;

				op += '<li class="list-group-item">';
				op += '	<i class="fas fa-file-upload mr-1"></i>';
				op += '	<span class="mr-2">' + fileName + '</span>'
				op += '	' + fileSize + ' bytes';
				op += '</li>';
			}

			$('#files-selected').append(op);
		}
	});
});