import Splide from "@splidejs/splide";
import "@splidejs/splide/dist/css/splide.min.css";
import NoSleep from "nosleep.js";
import { __ } from "@wordpress/i18n";
import convert from "convert-units";
import apiFetch from "@wordpress/api-fetch";

jQuery(document).ready(function ($) {

	// unit conversion
	if (delicious_recipes.global_settings.displayUnitConversion && delicious_recipes.global_settings.displayUnitConversion.length > 0 && 'yes' === delicious_recipes.global_settings.displayUnitConversion[0]) {
		const defaultUnitSystem = delicious_recipes.global_settings.defaultUnitSystem;
		const postId = document.querySelector(".dr-single-recipe").dataset.id;
		const servingType = delicious_recipes.global_settings.adjustableServingType;

		let servingValue = document.querySelector(".dr-ingredients-scale").getAttribute("data-serving-value");
		let DefaultValues = null;
		let originalValues = [];
		let scaleValue = servingValue;
		async function getRecipeData() {
			const recipeData = await apiFetch({ path: '/deliciousrecipe/v1/recipe/' + postId });
			DefaultValues = recipeData.data.recipe_metas;
			if ("" !== DefaultValues) {
				return DefaultValues;
			}
		}

		if ('scale' === delicious_recipes.global_settings.adjustableServingType) {
			scaleValue = document.querySelector(".dr-ingredients-scale .scale-btn-wrapper .active").getAttribute("data-scale");
			document.addEventListener("click", function (e) {
				if (e.target.matches('[data-scale]')) {
					const currentUnitSystem = document.querySelector(".dr-ingredients-list .dr-unit-conversion-wrapper input:checked");
					scaleValue = e.target.getAttribute('data-scale');
					if (defaultUnitSystem !== currentUnitSystem.value) {
						updateRecipeData();
					}
				}
			});
		} else {
			["keyup", "mouseup"].forEach((event) => {
				document.addEventListener(event, function (e) {
					if (e.target.matches(".dr-scale-ingredients")) {
						const currentUnitSystem = document.querySelector(".dr-ingredients-list .dr-unit-conversion-wrapper input:checked");
						scaleValue = document.querySelector(".dr-scale-ingredients").value;
						if (defaultUnitSystem !== currentUnitSystem.value) {
							updateRecipeData();
						}
					}
				});
			});
		}

		function updateRecipeData() {
			getRecipeData().then((data) => {
				const recipeConversion = data.recipeUnitConversion;
				if (recipeConversion.length > 0) {
					let unitIndex = 0;
					let supportedUnits = convert().list();
					supportedUnits = supportedUnits.map((unit) => unit.abbr);
					const ingredientLists = document.querySelectorAll(".dr-ingredients-list .dr-unordered-list li");
					ingredientLists.forEach((ingredientList) => {
						const ingredient = ingredientList.querySelector(".ingredient_quantity");
						let unit = ingredientList.querySelector(".ingredient_unit").innerText;
						let quantity = fractionToFloat(ingredient.innerText);
						let originalValueExists = originalValues.some(originalValue => originalValue.ingredientList === ingredientList);
						if (!originalValueExists) {
							originalValues.push({ ingredientList, unit, quantity });
						}
						if (unit && supportedUnits.includes(unit)) {
							ingredientList.querySelector(".ingredient_unit").innerText = recipeConversion[unitIndex].convertedUnit;
							let convertedAmount = 'scale' === servingType ? (recipeConversion[unitIndex].convertedAmount * scaleValue) : (recipeConversion[unitIndex].convertedAmount / servingValue) * scaleValue;
							convertedAmount = Math.round((convertedAmount + Number.EPSILON) * 100) / 100;
							ingredientList.querySelector(".ingredient_quantity").innerText = convertedAmount;
							unitIndex++;
						}
					});
				}
			});
		}

		const currentUnitSystems = document.querySelectorAll(".dr-ingredients-list .dr-unit-conversion-wrapper input");
		currentUnitSystems.forEach((unit) => {
			unit.addEventListener("change", function () {
				if (defaultUnitSystem !== this.value) {
					updateRecipeData();
				} else {
					originalValues.forEach(({ ingredientList, unit, quantity }) => {
						setTimeout(() => {
							ingredientList.querySelector(".ingredient_unit").innerText = unit;
							let convertedAmount = 0 !== quantity ? ('scale' === servingType ? (quantity * scaleValue) : ((quantity / servingValue) * scaleValue)) : '';
							convertedAmount = Math.round((convertedAmount + Number.EPSILON) * 100) / 100;
							ingredientList.querySelector(".ingredient_quantity").innerText = convertedAmount;
						}, 250);
					});
				}
			});
		});
	}

	const fractionToFloat = (fraction) => {
		if (!fraction) {
			return 0;
		}
		let float = 0;
		if (fraction.includes('⁄')) {
			fraction = fraction.replace('⁄', '/');
		}
		if (fraction.includes('/')) {
			let parts = fraction.split(' ');
			if (parts.length > 1) {
				let whole = parts[0];
				let frac = parts[1];
				let fracParts = frac.split('/');
				float = parseFloat(whole) + (parseFloat(fracParts[0]) / parseFloat(fracParts[1]));
			} else {
				let fracParts = fraction.split('/');
				float = parseFloat(fracParts[0]) / parseFloat(fracParts[1]);
			}
			float = parseFloat(float.toFixed(2));
		} else {
			float = fraction;
		}
		return float;
	}

	// cook mode
	let noSleep = new NoSleep();
	let cookModeBtn = document.getElementById("cook-mode");
	if (cookModeBtn) {
		let cookModeNotification = document.querySelector(".cook-mode-notification");
		let strongText = cookModeNotification.querySelector("strong");
		function activeNotification() {
			cookModeNotification.classList.add("show");
			setTimeout(() => {
				cookModeNotification.classList.remove("show");
			}, 5000)
		}
		cookModeBtn.addEventListener("click", function () {
			if (this.checked) {
				noSleep.enable()
				activeNotification();
				strongText.innerText = __("Enabled", 'delicious-recipes-pro');
				cookModeNotification.style.backgroundColor = "#22bb33"
			} else {
				noSleep.disable()
				activeNotification();
				strongText.innerText = __("Disabled", 'delicious-recipes-pro');
				cookModeNotification.style.backgroundColor = "#bb2124"
			}
		})
	}

	$(".dr-equipment-slider").owlCarousel({
		nav: true,
		dots: false,
		items: 3,
		margin: 20,
		rtl: $("body").hasClass("rtl"),
		navText: [
			'<svg xmlns="http://www.w3.org/2000/svg" width="16.35" height="11.016" viewBox="0 0 16.35 11.016"><g id="Group_5963" data-name="Group 5963" transform="translate(0.707 0.707)"><path id="Path_26348" data-name="Path 26348" d="M7824.911-1126.021l-4.8,4.8,4.8,4.8" transform="translate(-7820.11 1126.021)" fill="none" stroke="#2db68d" stroke-linecap="round" stroke-width="1"/><path id="Path_26365" data-name="Path 26365" d="M6542.659-354.415h14.721" transform="translate(-6542.237 359.215)" fill="none" stroke="#2db68d" stroke-linecap="round" stroke-width="1"/></g></svg>',
			'<svg xmlns="http://www.w3.org/2000/svg" width="16.35" height="11.015" viewBox="0 0 16.35 11.015"><g id="Group_5963" data-name="Group 5963" transform="translate(0.5 0.707)"><path id="Path_26348" data-name="Path 26348" d="M7820.11-1126.021l4.8,4.8-4.8,4.8" transform="translate(-7809.768 1126.021)" fill="none" stroke="#2db68d" stroke-linecap="round" stroke-width="1"/><path id="Path_26365" data-name="Path 26365" d="M6557.38-354.415h-14.721" transform="translate(-6542.659 359.215)" fill="none" stroke="#2db68d" stroke-linecap="round" stroke-width="1"/></g></svg>',
		],
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: true,
			},
			600: {
				items: 2,
				nav: true,
			},
			1025: {
				items: 3,
				nav: true,
			},
		},
	});

	$(document)
		.find(".dr-comment-images")
		.each(function () {
			$(this).magnificPopup({
				delegate: "a",
				type: "image",
				gallery: { enabled: true },
			});
		});

	$(window).scroll(function () {
		if ($(window).scrollTop() > 500) {
			$(".dr-floating-menu-wrapper").addClass("dr-floating-visible");
		} else {
			$(".dr-floating-menu-wrapper").removeClass("dr-floating-visible");
		}
	});

	$(".dr-comment-reply-btn").click(function (e) {
		e.preventDefault();
		let classNames = this.className;
		let commentType = classNames?.split(" ")?.[1];
	});

	$(".dr-comment-reply-btn").each(function () {
		$(this).on("click", function () {
			$("button[data-target=#commentListAll]").trigger("click");
			if ($(this).hasClass("comment")) {
				$("button[data-target=#dr-comment-review]").trigger("click");
			}
			if ($(this).hasClass("question")) {
				$("button[data-target=#dr-comment-qa]").trigger("click");
			}
		});
	});
}); //document close

function recipeProScripts() {

	var drCommentArea = document.querySelector('.dr-comment-area');
	if (drCommentArea) {
		commentForm(drCommentArea);
	}
	delicious_recipes.utilities.on("click", ".dr-form-tab-btn", function () {
		var siblings = this.parentNode.querySelectorAll(".dr-form-tab-btn");
		var grandParent = this.closest(".dr-comment-form");
		var forms = grandParent.querySelectorAll(
			".dr-comment-type-content > div"
		);
		var targetId = grandParent.querySelector(this.dataset.target);
		forms.forEach(function (form) {
			form.style.display = "none";
		});
		siblings.forEach(function (btn) {
			btn.classList.remove("active");
		});
		targetId.style.display = "block";
		this.classList.add("active");
	});

	delicious_recipes.utilities.on("click", ".comment-reply-link", function () {
		var replyParent = this.closest("li");
		var targetForm = this.dataset.respondelement;
		var formElement = replyParent.querySelector("#" + targetForm);
		var cancelReply = formElement.querySelector("span");
		var cancelReplyButton = cancelReply.querySelector("small");
		var elementsToHide = formElement.querySelectorAll('.comment-form-rating, .dr-tags, .did-you-make-recipe, .would-you-recommend-recipe');
		elementsToHide.forEach(function (element) {
			element.style.display = 'none';
		});
		replyParent.querySelector("#" + targetForm).style.display = "block";
		cancelReplyButton.addEventListener('click', function () {
			elementsToHide.forEach(function (element) {
				element.style.display = '';
			});
		});

		if (formElement.id.includes('dr-comment-qa')) {
			formElement.addEventListener('submit', handleSubmitQuestion);
		} else {
			formElement.addEventListener('submit', handleSubmitReview);
		}
	});

	function handleSubmitReview(e) {
		if ('yes' == enableRecaptchaForComments[0] && recaptchaSiteKey && recaptchaSecretKey) {
			validateRecaptcha(0).then((result) => {
				if (!result) {
					e.preventDefault();
				}
			});
		}
	}

	function handleSubmitQuestion(e) {
		if ('yes' == enableRecaptchaForComments[0] && recaptchaSiteKey && recaptchaSecretKey) {
			validateRecaptcha(1).then((result) => {
				if (!result) {
					e.preventDefault();
				}
			});
		}
	}

	// reCAPTCHA for comments form
	const enableRecaptchaForComments = delicious_recipes.global_settings.enableRecaptchaForComments;
	const recaptchaSiteKey = delicious_recipes.global_settings.recaptchaSiteKey;
	const recaptchaSecretKey = delicious_recipes.global_settings.recaptchaSecretKey;
	const recaptchaVersion = delicious_recipes.global_settings.recpatchaVersion;
	let recaptchaResponse = '';

	if ('yes' == enableRecaptchaForComments[0] && recaptchaSiteKey && recaptchaSecretKey) {
		const script = document.createElement('script');
		if (recaptchaVersion === 'v3') {
			script.src = `https://www.google.com/recaptcha/api.js?render=${recaptchaSiteKey}`;
		} else if (recaptchaVersion === 'v2') {
			script.src = `https://www.google.com/recaptcha/api.js`;
		}
		script.async = true;
		script.defer = true;
		document.body.appendChild(script);

	}

	const validateRecaptcha = async (index) => {
		if ('v3' == recaptchaVersion) {
			recaptchaResponse = await grecaptcha.ready(() => {
				grecaptcha.execute(recaptchaSiteKey, { action: 'submit' }).then((token) => {
					return token;
				});
			})
		} else {
			recaptchaResponse = grecaptcha.getResponse(index);
		}

		if (recaptchaResponse.length === 0) {
			toastr.error(
				__("Please verify that you are not a robot.", "delicious-recipes-pro")
			);
			return false;
		} else {
			const response = await apiFetch({
				path: '/deliciousrecipe/v1/recipe-recaptcha-comments',
				method: 'POST',
				data: {
					recaptchaResponse: recaptchaResponse,
					googleSecretKey: recaptchaSecretKey
				}
			});
			if (response.success) {
				if (response.data.success) {
					return true;
				} else {
					toastr.error(
						__("reCAPTCHA verification failed. Please try again.", "delicious-recipes-pro")
					);
					return false;
				}
			} else {
				toastr.error(
					__("Error validating reCAPTCHA. Please try again.", "delicious-recipes-pro")
				);
				return false;
			}
		}
	}

	function updatedReviewForm() {

		//recaptcha for comments form
		const reviewForms = document.querySelector('.dr-comment-review');
		const questionForms = document.querySelector('.dr-comment-qa');

		if (reviewForms) {
			reviewForms.addEventListener('submit', handleSubmitReview);
		}

		if (questionForms) {
			questionForms.addEventListener('submit', handleSubmitQuestion);
		}

		

		//handling input value for did you make this recipe question
		const yesButtonMake = document.getElementById('did-make-recipe-yes');
		const noButtonMake = document.getElementById('did-make-recipe-no');
		const didMakeRecipeInput = document.getElementById('did-make-recipe');
		const uploadImageOptions = document.querySelector('.dr-form-field');

		if (yesButtonMake && noButtonMake && didMakeRecipeInput) {
			yesButtonMake.addEventListener('click', function () {
				didMakeRecipeInput.value = 'yes';
				if (uploadImageOptions) uploadImageOptions.style.display = 'block';
			});
			noButtonMake.addEventListener('click', function () {
				didMakeRecipeInput.value = 'no';
				if (uploadImageOptions) uploadImageOptions.style.display = 'none';
			});
		}

		//handling input value for would you recommend this recipe question
		const yesButtonRecommend = document.getElementById('would-recommend-recipe-yes');
		const noButtonRecommend = document.getElementById('would-recommend-recipe-no');
		const wouldRecommendRecipeInput = document.getElementById('would-recommend-recipe');

		if (yesButtonRecommend && noButtonRecommend && wouldRecommendRecipeInput) {
			yesButtonRecommend.addEventListener('click', function () {
				wouldRecommendRecipeInput.value = 'yes';
			});
			noButtonRecommend.addEventListener('click', function () {
				wouldRecommendRecipeInput.value = 'no';
			});
		}

		//Show/hide tags based on "Show More" button click
		const tagsConatiner = document.querySelector('.dr-tags');
		const showMore = document.getElementById('dr-show-more');
		const tags = document.getElementById('tags');
		if (tagsConatiner && tags && showMore) {
			const tagItems = tags.querySelectorAll('a');
			const maxVisibleTags = 6;

			tagItems.forEach((tag, index) => {
				if (index >= maxVisibleTags) {
					tag.style.display = 'none';
				}
			});

			if (tagItems.length > maxVisibleTags) {
				showMore.classList.add('visible');
			}

			showMore.addEventListener('click', function () {
				tags.classList.toggle('expanded');
				if (tags.classList.contains('expanded')) {
					showMore.textContent = 'Show Less';
					tagItems.forEach(tag => tag.style.display = '');
				} else {
					showMore.textContent = 'Show More';
					tagItems.forEach((tag, index) => {
						if (index >= maxVisibleTags) {
							tag.style.display = 'none';
						}
					});
				}
			});

			// Handle recipe tags
			let selectedTags = [];
			const recipeTagsInput = document.getElementById('recipe-tags');
			tagItems.forEach(tag => {
				tag.addEventListener('click', function () {
					const tagText = this.getAttribute('data-tag');
					if (selectedTags.includes(tagText)) {
						selectedTags = selectedTags.filter(t => t !== tagText);
						this.classList.remove('selected');
					} else {
						selectedTags.push(tagText);
						this.classList.add('selected');
					}
					recipeTagsInput.value = selectedTags;
				});
			});
		}

		//Display rating star's hover text
		const reviewForm = document.getElementById('respond');
		if (reviewForm) {
			const ratingBoxArea = reviewForm.querySelector('.comment-form-rating');
			const ratingSets = ratingBoxArea.querySelector('.dr-comment-form-rating');
			const hiddenRatingInput = ratingBoxArea.querySelector('input[name="rating"]');
			const hoverRatingDisplay = ratingBoxArea.querySelector('.rating-value-word');
			const ratingLabel = {
				1: "Couldn't eat it",
				2: "Didn't like it",
				3: "It was OK",
				4: "Liked it",
				5: "Loved it"
			}
			ratingSets.addEventListener('mouseover', function (event) {
				let rating = hiddenRatingInput.value;
				hoverRatingDisplay.textContent = ratingLabel[rating] || '';
			});

			ratingSets.addEventListener('mouseout', function (event) {
				let rating = hiddenRatingInput.value;
				hoverRatingDisplay.textContent = ratingLabel[rating];
			});

			ratingSets.addEventListener('click', function (event) {
				let rating = hiddenRatingInput.value;
				hoverRatingDisplay.textContent = ratingLabel[rating];
			});
		}

		// Handle the comment section in header of the page to open a popup
		const commentPopUp = document.querySelector('.dr-comment-popup');
		const ratingsWrapper = document.querySelector('.dr-star-ratings-wrapper');
		const reviewBoxArea = document.getElementById('respond');
		if (commentPopUp) {
			commentPopUp.addEventListener('click', function () {
				showReviewModal(reviewBoxArea);
			});
		}
		if (ratingsWrapper) {
			ratingsWrapper.addEventListener('click', function () {
				showReviewModal(reviewBoxArea);
			});
		}

		// Handle when users leave the page
		const enableExitIntent = delicious_recipes.global_settings.enableExitIntent;
		if (document.querySelector(".dr-single-recipe") && enableExitIntent && 'yes' === enableExitIntent[0]) {

			const postId = document.querySelector(".dr-single-recipe").dataset.id;
			let notFound = false;
			const getIPAddress = async () => {
				try {
					const response = await fetch('https://api.ipify.org?format=json');
					const data = await response.json();
					return data.ip;
				} catch (error) {
					console.error('Error fetching IP address:', error); 
					return null;
				}
			};

			const fetchData = async () => {
				let usersIPAddress = await getIPAddress();
				if (usersIPAddress) {
					apiFetch({
						path: '/deliciousrecipe/v1/exit-intent',
						method: 'POST',
						data: {
							post_id: postId,
							ip: usersIPAddress
						}
					}).then((response) => {
						if (response.success && !response.data) {
							notFound = true;
						}
					});
				}
			};

			fetchData();

			document.addEventListener('mouseleave', () => {
				let reviewShown
				if (notFound) {
					let lastShown = localStorage.getItem('reviewShown' + postId);
					if (lastShown) {
						let reviewShownData = JSON.parse(lastShown);
						if (reviewShownData.post_id === postId && (Date.now() - reviewShownData.date) < 24 * 60 * 60 * 1000) {
							reviewShown = true;
						}
					}

					let modalOverlay = document.querySelector('.wpd-modal-overlay');
					if (!modalOverlay && !reviewShown) {
						showReviewModal(reviewBoxArea);
						const reviewShownData = {
							'date': Date.now(),
							'post_id': postId
						};
						localStorage.setItem('reviewShown' + postId, JSON.stringify(reviewShownData));
					}
				}

			});
		}

	}

	updatedReviewForm();

	function reviewModal(element = null) {
		const wrapper = element ? element.querySelector(".rating-without-comment") : document.querySelector(".rating-without-comment");
		if (wrapper) {
			const recipeCardRatingAvg = document.querySelector('.dr-recipe-summary-inner .dr-rating.dr-star-ratings-wrapper');

			const reviewBoxArea = document.getElementById('respond');
			const commentRating = reviewBoxArea.querySelector('.dr-comment-rating');
			const ratingSets = wrapper.querySelector('.rating-buttons-set');
			const labelString = wrapper.getAttribute('data-label');

			if (recipeCardRatingAvg) {
				jQuery(recipeCardRatingAvg).append(`<span class="dr-rating-tooltip">${labelString}</span>`);
				recipeCardRatingAvg.setAttribute('style', 'cursor:pointer;')
				recipeCardRatingAvg.addEventListener('click', function () {
					showReviewModal(reviewBoxArea);
				});
			}
			jQuery(ratingSets).rateYo({
				fullStar: true,
				onSet: function (rating) {
					reviewBoxArea.scrollIntoView({
						behavior: "smooth"
					});
					const commentFormRating = reviewBoxArea.querySelector('.jq-ry-rated-group');
					const ratingInputField = commentRating.querySelector('input[name="rating"]');
					commentFormRating.setAttribute('style', `width:${rating * 20}%`)
					ratingInputField.setAttribute('value', rating)
				}
			});
		}
	}

	reviewModal();

	function showReviewModal(reviewBoxArea) {
		const originalParent = reviewBoxArea.parentNode;
		const modalOverlay = document.createElement('div');
		const modal = document.createElement('div');
		modalOverlay.classList = 'wpd-modal-overlay';
		modal.id = 'reviewModal';
		modal.classList = 'wpd-modal';

		modal.innerHTML = `
			<button type="button" id="closeModal" class="wpd-modal-close">Close</button>
		`;

		modal.appendChild(reviewBoxArea);
		modalOverlay.appendChild(modal);

		document.body.appendChild(modalOverlay);

		reviewBoxArea.addEventListener('submit', handleSubmitReview);

		const removeModal = () => {
			modalOverlay.classList.add('fade-out');
			setTimeout(() => {
				modalOverlay.classList.remove('fade-out');
				originalParent.appendChild(reviewBoxArea);
				document.body.removeChild(modalOverlay);
			}, 300);
		}

		document.getElementById('closeModal').addEventListener('click', function () {
			removeModal();
		});
		modalOverlay.addEventListener('click', function (e) {
			if (!modal.contains(e.target)) {
				removeModal();
			}
		})
	}

	// function ratingWithoutReview(element = null) {
	// 	const wrapper = element ? element.querySelector(".rating-without-comment") : document.querySelector(".rating-without-comment");
	// 	if (wrapper) {
	// 		const recipeCardRatingAvg = document.querySelector('.dr-recipe-summary-inner .dr-rating.dr-star-ratings-wrapper');

	// 		const reviewBoxArea = document.getElementById('respond');
	// 		const commentRating = reviewBoxArea.querySelector('.dr-comment-rating');
	// 		const ratingSets = wrapper.querySelector('.rating-buttons-set');
	// 		const labelString = wrapper.getAttribute('data-label');

	// 		if (recipeCardRatingAvg) {
	// 			jQuery(recipeCardRatingAvg).append(`<span class="dr-rating-tooltip">${labelString}</span>`);
	// 			recipeCardRatingAvg.setAttribute('style', 'cursor:pointer;')
	// 			recipeCardRatingAvg.addEventListener('click', function () {
	// 				wrapper.scrollIntoView({
	// 					behavior: "smooth",
	// 					block: "center"
	// 				});
	// 			});
	// 		}
	// 		jQuery(ratingSets).rateYo({
	// 			fullStar: true,
	// 			onSet: function (rating) {

	// 				reviewBoxArea.scrollIntoView({
	// 					behavior: "smooth"
	// 				});
	// 				const commentFormRating = reviewBoxArea.querySelector('.jq-ry-rated-group');
	// 				const ratingInputField = commentRating.querySelector('input[name="rating"]');
	// 				commentFormRating.setAttribute('style', `width:${rating * 20}%`)
	// 				ratingInputField.setAttribute('value', rating)
	// 			},
	// 		});
	// 	}
	// }

	//ratingWithoutReview();

	// review form tab
	// drCustomTab(document, ".dr-form-tab-btn");
	drCustomTab(document, ".dr-comment-list-btn");

	// custom tab function
	function drCustomTab(parent, tabBtn) {
		var tabBtns = parent.querySelectorAll(tabBtn);
		if (tabBtns) {
			tabBtns.forEach(function (tabBtn) {
				var targetId = tabBtn.dataset.target;
				if (parent.querySelector(targetId)) {
					parent.querySelector(targetId).style.display = "none";
				}
				if (tabBtn.classList.contains("active")) {
					var activeTab = tabBtn.dataset.target;
					if (parent.querySelector(activeTab)) {
						parent.querySelector(activeTab).style.display = "block";
					}
				}
			});
		}
		parent.addEventListener("click", function (el) {
			if (el.target.matches(tabBtn)) {
				var btnParent = el.target.parentNode;
				var btns = btnParent.querySelectorAll(tabBtn);
				btns.forEach(function (tabBtn) {
					tabBtn.classList.remove("active");
					var hideTarget = tabBtn.getAttribute("data-target");
					if (parent.querySelector(hideTarget)) {
						parent.querySelector(hideTarget).style.display = "none";
					}
				});
				el.target.classList.add("active");
				var showTarget = el.target.getAttribute("data-target");
				if (parent.querySelector(showTarget)) {
					parent.querySelector(showTarget).style.display = "block";
				}
			}
		});
	}
	function commentForm(element = null) {
		var commentFormButtons = element ? element.querySelectorAll(".dr-form-tab-btn") : document.querySelectorAll(".dr-form-tab-btn");
		commentFormButtons.forEach(function (tabBtn) {
			if (!tabBtn.matches(".active")) {
				tabBtn
					.closest(".dr-comment-form")
					.querySelector(tabBtn.dataset.target).style.display =
					"none";
			}
		});
	}
	function dropzone(element = null) {
		var dropzone = element ? element.querySelector(".dropzone") : document.querySelector(".dropzone");
		if (dropzone !== null) {
			var DZOBJ_review_images = new Dropzone(dropzone, {
				// addRemoveLinks: true,
				acceptedFiles: "image/jpeg, image/gif, image/png, image/webp",
				url: delicious_recipes_pro.ajax_url,
				uploadMultiple: true,
				resizeWidth: 1500,
				resizeMimeType: "image/jpeg",
				resizeMethod: "crop",
				resizeQuality: 65,
				createImageThumbnails: true,
				parallelUploads: 100,
				maxFiles: 20,
				maxFilesize: 5,
				paramName: "gallery",
				dictDefaultMessage: delicious_recipes_pro.upload_review_pic_msg,
			});

			DZOBJ_review_images.on("sending", function (file, xhr, formData) {
				var nonce = document.getElementsByName("review_images_nonce")[0]
					.value;
				var recipe_id = document.getElementsByName("comment_post_ID")[0]
					.value;
				formData.append(
					"action",
					"delicious_recipes_review_images_upload"
				);
				formData.append("nonce", nonce);
				formData.append("recipe_id", recipe_id);
			});

			DZOBJ_review_images.on("success", function (file, response) {
				if (response !== "error") {
					var review_images = JSON.parse(response);
					var existing_images = document.getElementsByName(
						"review_images[]"
					)[0].value;
					let allImagesArray = existing_images
						? review_images?.attachment_ids.concat(
							existing_images && JSON.parse(existing_images)
						)
						: review_images?.attachment_ids;
					dropzone.querySelector(
						"input[name='review_images[]']"
					).value = JSON.stringify([...new Set(allImagesArray)]);
				}
			});
		}
	}
	function relatedRecipes(element = null) {
		// Related Posts
		var relatedposts = element ? element.querySelector(".dr-related-posts-splide") : document.querySelector(".dr-related-posts-splide");
		if (relatedposts !== null) {
			var recipeID = relatedposts.dataset.id;
			var post = element ? element.querySelector(".dr-related-splide-" + recipeID) : document.querySelector(".dr-related-splide-" + recipeID);

			if (post !== null) {
				var splide = new Splide(post, {
					type: "fade",
					perPage: 1,
					pagination: false,
				});

				splide.mount();
			}
		}
	}

	dropzone();
	relatedRecipes();

	if (delicious_recipes_pro.enable_autoload) {
		let autoloadSelector =
			delicious_recipes_pro.autoload_filter === "prev"
				? ".nav-previous .next-recipe"
				: ".nav-next .next-recipe";
		let nextRecipe = document.querySelectorAll(autoloadSelector);
		if (nextRecipe.length > 0) {
			let nextRecipeLinks = [];
			for (let i = 0; i < nextRecipe.length; i++) {
				nextRecipeLinks.push(nextRecipe[i].href);
			}

			function getPath() {
				var path = nextRecipeLinks[this.loadCount];
				return path;
			}
			let image = document.querySelector(
				".dr-post-summary .dr-image img"
			);
			let wishlist = document.querySelector(
				".dr-floating-box .dr-add-to-wishlist-single .dr-recipe-wishlist"
			);
			let likes = document.querySelector(".dr-floating-box .post-like");
			let floatingBarData = [
				{
					path: window.location.href,
					id: document.querySelector(".dr-single-recipe").dataset.id,
					title: document.querySelector("title").innerText,
					image: image ? image.src : "",
					wishlist: wishlist ? wishlist.innerHTML : "",
					likes: likes ? likes.innerHTML : "",
				},
			];

			let elem = document.querySelector(
				delicious_recipes_pro.autoload_selector
			);
			let infScroll = new InfiniteScroll(elem, {
				// options
				path: getPath,
				append: delicious_recipes_pro.autoload_append,
				checkLastPage: false,
			});

			infScroll.on("load", onPageLoad);
			function onPageLoad(body, path) {
				if (
					infScroll.loadCount ==
					delicious_recipes_pro.autoload_perpage - 1
				) {
					infScroll.options.loadOnScroll = false;
					// remove event listener
					relatedRecipes(body);
					ratingWithoutReview(body)
					dropzone(body);
					commentForm(body);
					drCustomTab(body, ".dr-comment-list-btn");
					// init ratings
					recipe_global.initRatings(body);

					// init light gallery
					recipe_global.initLightGallery(body);
					infScroll.off(onPageLoad);
				} else {
					// add more url to nextRecipeLinks
					ratingWithoutReview(body)
					dropzone(body);
					commentForm(body);
					drCustomTab(body, ".dr-comment-list-btn");
					relatedRecipes(body);
					// init ratings
					recipe_global.initRatings(body);

					// init light gallery
					recipe_global.initLightGallery(body);

					let recipeID = body.querySelector(".dr-single-recipe")
						.dataset.id;
					let image = body.querySelector(
						".dr-post-summary .dr-image img"
					);
					let wishlist = body.querySelector(
						".dr-floating-box .dr-add-to-wishlist-single .dr-recipe-wishlist"
					);
					let likes = body.querySelector(
						".dr-floating-box .post-like"
					);
					let templateData = {
						path: path,
						id: recipeID,
						title: body.querySelector(".dr-entry-title").innerText,
						image: image ? image.src : "",
						wishlist: wishlist ? wishlist.innerHTML : "",
						likes: likes ? likes.innerHTML : "",
					};
					floatingBarData.push(templateData);

					var nextRecipe = body.querySelectorAll(autoloadSelector);
					for (let i = 0; i < nextRecipe.length; i++) {
						nextRecipeLinks.push(nextRecipe[i].href);
					}
				}
			}

			infScroll.on("history", function (title, path) {
				let pageTitle = document.querySelector("title");
				pageTitle.innerText = title;

				// reset timer if active
				let timer = document.getElementById("dr-recipe-timer");
				if (timer) {
					reset_clock();
				}

				// add wp.template to floating bar
				let floatingBar = document.querySelector(
					".dr-floating-bar-wrapper"
				);
				if (floatingBar) {
					let data = floatingBarData.filter(
						(item) => item.path === path
					);
					if (data[0]) {
						let template = wp.template("floating-bar-tmp");
						jQuery(".dr-floating-bar-wrapper").html(
							template(data[0])
						);
					}
				}
			});
			window["recipeProGlobal"] = floatingBarData;
		}
	}

	if (delicious_recipes_pro.enable_reaction) {
		function fetchReactions() {
			var $reactElement = jQuery('[data-reaction_uid]');

			if (!$reactElement.length) {
				return;
			}

			var recipeIds = [];
			$reactElement.each(function (index, element) {
				recipeIds = [...recipeIds, jQuery(element).data('reaction_uid')];
			});

			recipeIds = [...new Set(recipeIds.filter(element => !!element))];

			if (!recipeIds.length) {
				return;
			}

			jQuery.ajax({
				url: delicious_recipes_pro.ajax_url,
				type: 'POST',
				data: {
					action: 'delicious_recipes_pro_fetch_reactions',
					ids: [...recipeIds]
				},
				success: function (response) {
					if (true !== response.success) {
						$reactElement.removeClass('loading');

						return;
					}

					if (response.data?.recipes && 'object' === typeof response.data.recipes) {
						for (var recipe_id in response.data.recipes) {
							var recipe = response.data.recipes[recipe_id];
							if (recipe?.yummy) {
								jQuery(`[data-reaction_uid="${recipe_id}"][data-reaction="yummy"] .dr-reaction-count`).text(recipe.yummy.length);
							}

							if (recipe?.love) {
								jQuery(`[data-reaction_uid="${recipe_id}"][data-reaction="love"] .dr-reaction-count`).text(recipe.love.length);
							}

							if (recipe?.wow) {
								jQuery(`[data-reaction_uid="${recipe_id}"][data-reaction="wow"] .dr-reaction-count`).text(recipe.wow.length);
							}

							if (recipe?.happy) {
								jQuery(`[data-reaction_uid="${recipe_id}"][data-reaction="happy"] .dr-reaction-count`).text(recipe.happy.length);
							}

							if (recipe?.sad) {
								jQuery(`[data-reaction_uid="${recipe_id}"][data-reaction="sad"] .dr-reaction-count`).text(recipe.sad.length);
							}

							$reactElement.removeClass('loading');
						}
					}
				},
				error: function () {
					$reactElement.removeClass('loading');
				}
			})
		};

		fetchReactions();

		delicious_recipes.utilities.on("click", ".dr-reaction-section .dr-reaction", function () {
			if (this.dataset.disabled == "true") {
				return;
			}
			this.dataset.disabled = "true";

			let current = this;
			let reaction_id = current.dataset.reaction;
			let reaction_uid = current.dataset.reaction_uid;
			let push = 1;
			current.classList.add('loading');
			let reactionCount = current.querySelector('.dr-reaction-count');
			let total = parseInt(reactionCount.innerHTML);
			if (current.classList.contains('active')) {
				total--;
				push = '-1';
			} else {
				total++;
			}
			let nonce = document.querySelector('input[name="delicious_recipes_reaction_nonce"]').value;

			// ajax
			let data = {
				action: 'delicious_recipes_pro_add_reaction',
				reaction_id: reaction_id,
				reaction_uid: reaction_uid,
				push: push,
				nonce: nonce
			};

			jQuery.post(delicious_recipes_pro.ajax_url, data, function (response) {
				if (response.success) {
					if (response.data.unique) {
						let previousReactions = document.querySelectorAll('.dr-reaction-section #dr-reaction-' + reaction_uid + ' .dr-reaction.active');
						for (let i = 0; i < previousReactions.length; i++) {
							if (previousReactions && !previousReactions[i].matches('[data-reaction="' + current.dataset.reaction + '"]')) {
								previousReactions[i].classList.remove('active');
							}
							let previousReactionCount = previousReactions[i].querySelector('.dr-reaction-count');
							let _total = parseInt(previousReactionCount.innerHTML);
							_total--;
							previousReactionCount.innerHTML = _total < 0 ? 0 : _total;
						}
					}
					let _total = response.data.total || total
					reactionCount.innerHTML = _total < 0 ? 0 : _total;
					current.classList.toggle('active', !current.classList.contains('active'));
				}
				current.classList.remove('loading');
				current.dataset.disabled = "false";
			});
		});
	}

	// modal
	const drModal = (btn) => {
		let targetModal = document.querySelector(btn.dataset.modal);
		let closeBtn = targetModal.querySelector(".custom-modal-close");

		function modalStyle(show) {
			return function () {
				targetModal.classList.toggle("show", show);
			};
		}
		btn.onclick = modalStyle(true);
		closeBtn.onclick = modalStyle(false);
		window.onclick = function (e) {
			if (e.target.id == targetModal.id) {
				targetModal.classList.remove("show");
			}
		};
	};

	let modalBtns = document.querySelectorAll("[data-modal]");
	modalBtns.forEach((btn) => {
		drModal(btn);
	});
}

window.addEventListener("load", recipeProScripts);