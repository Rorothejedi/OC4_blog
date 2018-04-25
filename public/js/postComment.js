
$( document ).ready(function() {

	$(function () {
	     $('.div_post_comment').removeClass('hidden');
	});

	$('.div_post_comment').hide();

	$('.btn-comment').click(function() {

		var text = $(".div_post_comment").is(':visible') ? 'Poster un commentaire' : 'Annuler';
		var color = $(".div_post_comment").is(':visible') ? '#007BFF' : '#59A9FF';

		$('.btn-comment').text(text).css('background-color', color).css('border-color', color);

		$('.div_post_comment').slideToggle();
	});

});