//Edit popup
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

//Seen post
$(document).ready(function () {
	$('.edit-button').on('click', function () {
		showModal(this);
	});
	$('.date-button').on('click', function () {
		showModal2(this);
	});

	$('.watch-update-movie').click(function () {
		let button = $(this);
		let movieId = button.data('movie-id');
		let buttonStatus = button.text().trim();
		let newStatus = buttonStatus.includes('not') ? 'Mark as seen' : 'Mark as not seen';
		let ajaxUrl = '/movies/' + movieId + '/seen';

		$.ajax({
			url: ajaxUrl,
			type: 'PATCH',
			data: {
				seen: !buttonStatus.includes('not')
			},
			success: function (response) {
				// Handle the JSON response from the server.
				console.log(response.message);
				button.text(newStatus);
			},
			error: function () {
				alert('Error updating movie.');
			}
		});
	});


	//Delete post

	$('.delete-movie').click(function () {
		let button = $(this);
		let movieId = button.data('movie-id');
		let ajaxUrl = '/movies/' + movieId;

		$.ajax({
			url: ajaxUrl,
			type: 'DELETE',
			success: function (response) {
				// Handle the JSON response from the server.
				console.log(response.message);
				let parentDiv = button.closest('.check_me');
				button.closest('.item').remove();
				if (parentDiv.find('.item').length === 0) {
					parentDiv.remove();
					window.location.href = window.location.href;
				}
			},
			error: function () {
				alert('Error deleting movie.');
			}
		});
	});

	//Store movie to movie list
	$('.add-movie').click(function () {
		let title = $('.upload-title').val();
		let description = $('.upload-description').val();
		let url = $('.upload-url').val();
		let image = $('.upload-image')[0].files[0];

		let formData = new FormData();
		formData.append('img', image);
		formData.append('title', title);
		formData.append('description', description);
		formData.append('url', url);

		$.ajax({
			url: '/movies/store',
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			success: function (response) {
				console.log(response);
			},
			error: function () {
				alert('An error occurred while adding the movie.');
			}
		});
	});

	//Change Date post

	$('.date-movie').click(function () {
		let movieId = $('#update-id').val();
		let date = $('#edit-date').val();
		let buttonUpdateDate = $('button[data-id="' + movieId + '"]');
		let ajaxUrl = '/movies/' + movieId + '/date';
		$.ajax({
			url: ajaxUrl,
			type: 'PATCH',
			data: {
				date: date
			},
			success: function (response) {
				// Handle the JSON response from the server.
				console.log(response.message);
				$('button[data-id="' + movieId + '"]').attr('data-date', date);
				buttonUpdateDate.text(date);
				let modal = document.getElementById('movie_date');

				modal.classList.add('hidden');
			},
			error: function () {
				alert('Error updating movie.');
			}
		});
	});


	//Edit post
	$('.edit-mode').click(function () {
		let movieId = $('#edit-id').val();
		let title = $('#edit-title').val();
		let description = $('#edit-description').val();
		let url = $('#edit-url').val();
		let imgInput = $('#edit-img')[0].files[0];
		let oldData = $('#title-' + movieId);
		let imdbLink = $('#imdb-' + movieId);
		let desc = $('#desc-' + movieId);
		let dataTitle = $("[data-title='" + oldData.text() + "']");
		let dataIdEdit = $("[data-id-edit='" + movieId + "']");
		let ajaxUrl = '/movies/' + movieId + '/edit';

		oldData.html(title);
		imdbLink.attr("onclick", "javascript:window.open('" + url + "', '_blank');");
		desc.text(description);
		dataTitle.attr("data-title", title);
		dataIdEdit.attr({
			"data-title-edit": title,
			"data-desc-edit": description,
			"data-url-edit": url
		});

		let formData = new FormData();
		formData.append('image', imgInput);
		formData.append('id', movieId);
		formData.append('title', title);
		formData.append('description', description);
		formData.append('url', url);

		$.ajax({
			url: ajaxUrl,
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			success: function (response) {
				console.log(response.message);
				if (response.imageName) {
					$('#img-' + movieId).attr('src', response.imageName);
					console.log(response.imageName);
				}
				let modal = document.getElementById('edit_mode');
				modal.classList.add('hidden');
			},
			error: function () {
				alert('Error editing movie.');
			}
		});
	});


	//Previous - Next

	// Fetch the first page of movies on page load
	$('.movies-list').load('/dashboard?page=1');

	// Attach a click event listener to the next/previous button
	$('.pagination').on('click', 'a', function (e) {
		e.preventDefault();
		var pageUrl = $(this).attr('href');
		$('.movies-list').load(pageUrl);
	});

});


function showModal(button) {
	$(document).ready(function () {
		let modal = $('#edit_mode');
		modal.removeClass('hidden');

		let id = $(button).data('id-edit');
		let title = $(button).data('title-edit');
		let description = $(button).data('desc-edit');
		let url = $(button).data('url-edit');

		$('#edit-id').val(id);
		$('#edit-title').val(title);
		$('#edit-description').val(description);
		$('#edit-url').val(url);

		let closeButton = modal.find('.close-button');
		closeButton.on('click', () => {
			modal.addClass('hidden');
		});
	});
}

//Date popup

function showModal2(button) {
	$(document).ready(function () {
		let modal = $('#movie_date');
		modal.removeClass('hidden');

		let date = $(button).data('date');
		let id = $(button).data('id');

		$('#edit-date').val(date);
		$('#update-id').val(id);

		let closeButton = modal.find('.close-button');
		closeButton.on('click', () => {
			modal.addClass('hidden');
		});
	});
}