jQuery(document).ready(function ($) {
    
    // Featured Equipment
	$(document).on("click", ".dr-featured-equipment", function (e) {
		e.preventDefault();
		var featuredIcon = $(this);
		var post_id = $(this).attr("data-post-id");
		var nonce = $(this).attr("data-nonce");
		var data = {
			action: "featured_equipment",
			post_id: post_id,
			nonce: nonce,
		};
		$.ajax({
			url: ajaxurl,
			data: data,
			type: "post",
			dataType: "json",
			success: function (data) {
				if (data != "invalid") {
					featuredIcon
						.removeClass("dashicons-star-filled")
						.removeClass("dashicons-star-empty");
					if (data.new_status == "yes") {
						featuredIcon.addClass("dashicons-star-filled");
					} else {
						featuredIcon.addClass("dashicons-star-empty");
					}
				}
			},
		});
	});

	$(document)
		.find(".dr-comment-form-rating")
		.each(function () {
			$(this).rateYo({
				fullStar: true,
				onChange: function (rating, rateYoInstance) {
					// $('.comment-rating-field-message').hide();
					$(this)
						.parent()
						.find('input[name="rating"]')
						.val(rating);
				},
			});
		});

	$(document).on("click", "button.dr-review-add-images", function (e) {
		$this = $(this);
		e.preventDefault();
		var file_frame;
		var allowed_filetype = ["image/jpeg", "image/png", "image/webp"];
		if (file_frame) file_frame.close();

		file_frame = wp.media.frames.file_frame = wp.media({
			title: $(this).data('uploader-title'),
			button: {
				text: $(this).data('uploader-button-text'),
			},
			library: {
				type: allowed_filetype,
			},
			multiple: true,
		});

		file_frame.on("select", function () {
			var selection = file_frame.state().get("selection");
			selection.map(function (attachment, i) {
				var attachment = attachment.toJSON();
				$("#dr-tax-image-wrapper").html(
					'<img src="' + attachment.sizes.thumbnail.url + '"/>'
				);
				$(".dr_tax_image_media_id").val(attachment.id);
				$this.parent().find('.dr-recipe-review-gallery').append('<li>'
					+'<input type="hidden" class"recipe-gallery" name="gallery_images[]" value="' + attachment.id + '">'
					+'<img class="dr-image-preview" src="' + attachment.sizes.thumbnail.url + '">'
					+'<div class="dr-gal-btns">'
					+'<button type="button" class="dr-change" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image" title="Change Image">Replace</button>'
					+'<button type="button" class="dr-delete" href="#">Delete</button>'
					+'</div>'
					+'</li>');
			});
		});

		file_frame.open();
	});

	$(document).on("click", ".dr-recipe-review-gallery button.dr-change", function (e) {
		$this = $(this);
		e.preventDefault();
		var file_frame;
		var allowed_filetype = ["image/jpeg", "image/png", "image/webp"];
		if (file_frame) file_frame.close();

		file_frame = wp.media.frames.file_frame = wp.media({
			title: $(this).data('uploader-title'),
			button: {
				text: $(this).data('uploader-button-text'),
			},
			library: {
				type: allowed_filetype,
			},
			multiple: false,
		});

		file_frame.on("select", function () {
			var selection = file_frame.state().get("selection");
			selection.map(function (attachment, i) {
				var attachment = attachment.toJSON();
				$this.closest('li').find('input:hidden').attr('value', attachment.id);
				$this.closest('li').find('img.dr-image-preview').attr('src', attachment.sizes.thumbnail.url);
			});
		});

		file_frame.open();
	});

	$(document).on("click", ".dr-recipe-review-gallery button.dr-delete", function (e) {
		e.preventDefault();
		$(this).closest('li').animate({ opacity: 0 }, 200, function () {
			$(this).remove();
		});
	});

}); //document close