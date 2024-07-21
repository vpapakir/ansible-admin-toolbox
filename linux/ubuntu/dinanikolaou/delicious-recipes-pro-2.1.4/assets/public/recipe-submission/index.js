import { Form, Formik } from "formik";
import apiFetch from "@wordpress/api-fetch";
import { useEffect, useState } from "@wordpress/element";
import { __ } from "@wordpress/i18n";
import * as Yup from "yup";
import { ConnectedFocusError } from "focus-formik-error";
import {
	detailFields,
	infoFields,
	ingredientsFields,
	instructionFields,
	galleryFields,
	nutritionFields,
	notesFields,
} from "./defaults";
import RecipeDetails from "./RecipeDetails.jsx";
import RecipeInfo from "./RecipeInfo.jsx";
import RecipeIngredients from "./RecipeIngredients.jsx";
import RecipeInstructions from "./RecipeInstructions.jsx";
import RecipeGallery from "./RecipeGallery.jsx";
import RecipeNutrition from "./RecipeNutrition.jsx";
import RecipeNotes from "./RecipeNotes.jsx";

const { globalSettings } = DeliciousRecipesProUD;

const RecipeSubmission = (props) => {
	const { rest_nonce, guest_mode, recipeEditMode, recipeEditId } = props;
	const [editMode, setEditMode] = useState(recipeEditMode ?? false);
	const [editRecipeId, setEditRecipeId] = useState(recipeEditId ?? null);
	const [selectedButton, setSelectedButton] = useState("save");
	const [editPostStatus, setEditPostStatus] = useState("draft");

	const [recaptchaEnabled, setRecaptchaEnabled] = useState([]);
	const [recaptchaVersion, setRecaptchaVersion] = useState('');
	const [googleSiteKey, setGoogleSiteKey] = useState('');
	const [googleSecretKey, setGoogleSecretKey] = useState('');
	const [reCaptchaValidationResult, setReCaptchaValidationResult] = useState('');

	/**
	 * Changing the text of the Submit button.
	 */
	const [updateButtonText, setupdateButtonText] = useState(
		__("Submit Recipe", "delicious-recipes-pro")
	);
	const [saveButtonText, setSaveButtonText] = useState(
		__("Save Recipe", "delicious-recipes-pro")
	);

	const submissionValidation = {
		title: Yup.string().required(
			__("Recipe title is a required field.", "delicious-recipes-pro")
		),
	};

	const submissionFormSchema = Yup.object(submissionValidation);

	const handleToggleCheck = (fieldName) => {
		let fieldItem =
			globalSettings.recipeFieldsOrder &&
			globalSettings.recipeFieldsOrder.find(
				(item) => item.id === fieldName
			);
		if (fieldItem.enable[0] === "yes") {
			return true;
		}
		return false;
	};

	const [defaultValues, setdefaultValues] = useState({
		...(handleToggleCheck("recipe-details") && detailFields),
		...(handleToggleCheck("recipe-info") && infoFields),
		...(handleToggleCheck("recipe-ingredients") && ingredientsFields),
		...(handleToggleCheck("recipe-instructions") && instructionFields),
		...(handleToggleCheck("recipe-gallery") && galleryFields),
		...(handleToggleCheck("recipe-nutrition") && nutritionFields),
		...(handleToggleCheck("recipe-notes") && notesFields),
	});

	const [initialDefaultValues] = useState(defaultValues);

	useEffect(() => {
		toastr.options.positionClass = "toast-bottom-full-width";
		toastr.options.timeOut = "5000";
	}, []);

	useEffect(() => {
		editMode && editRecipeId && getRecipeSettings(editRecipeId);
		editMode &&
			editRecipeId &&
			setupdateButtonText(__("Update Recipe", "delicious-recipes-pro"));
	}, [editRecipeId]);

	const getRecipeSettings = async (editRecipeId) => {
		apiFetch({
			path: "/deliciousrecipe/v1/recipe/usrdb/" + editRecipeId,
			method: "GET",
		})
			.then((response) => {
				let defaultValues = response.data.recipe_metas;
				if (defaultValues) {
					if (defaultValues.courses && defaultValues.courses.length) {
						defaultValues.courses = defaultValues.courses.map(
							(item) => {
								return {
									value: item,
									label: item,
								};
							}
						);
					}
					if (
						defaultValues.cuisines &&
						defaultValues.cuisines.length
					) {
						defaultValues.cuisines = defaultValues.cuisines.map(
							(item) => {
								return {
									value: item,
									label: item,
								};
							}
						);
					}
					if (
						defaultValues.recipeKeys &&
						defaultValues.recipeKeys.length
					) {
						defaultValues.recipeKeys = defaultValues.recipeKeys.map(
							(item) => {
								return {
									value: item,
									label: item,
								};
							}
						);
					}
					if (
						defaultValues.cookingMethods &&
						defaultValues.cookingMethods.length
					) {
						defaultValues.cookingMethods = defaultValues.cookingMethods.map(
							(item) => {
								return {
									value: item,
									label: item,
								};
							}
						);
					}
					if (
						defaultValues.recipeBadges &&
						defaultValues.recipeBadges.length
					) {
						defaultValues.recipeBadges = defaultValues.recipeBadges.map(
							(item) => {
								return {
									value: item,
									label: item,
								};
							}
						);
					}

					if (
						defaultValues.recipeDietaries &&
						defaultValues.recipeDietaries.length
					) {
						defaultValues.recipeDietaries = defaultValues.recipeDietaries.map(
							(item) => {
								return {
									value: item,
									label: item,
								};
							}
						);
					}
				}
				setdefaultValues(defaultValues);
				setEditPostStatus(response?.data?.recipe_status);
			})
			.catch((error) => {
				console.log(error);
			});
	};

	const handleFormSave = async (formdata, isSave = false, resetForm) => {
		let guestMode = guest_mode ? true : false;
		let formdataCopy = { ...formdata };
		if (formdata) {
			if (formdata.courses && formdata.courses.length) {
				formdataCopy.courses = formdata.courses.map((item) => {
					return item.value;
				});
			}
			if (formdata.cuisines && formdata.cuisines.length) {
				formdataCopy.cuisines = formdata.cuisines.map((item) => {
					return item.value;
				});
			}
			if (formdata.recipeKeys && formdata.recipeKeys.length) {
				formdataCopy.recipeKeys = formdata.recipeKeys.map((item) => {
					return item.value;
				});
			}
			if (formdata.cookingMethods && formdata.cookingMethods.length) {
				formdataCopy.cookingMethods = formdata.cookingMethods.map(
					(item) => {
						return item.value;
					}
				);
			}
			if (formdata.recipeBadges && formdata.recipeBadges.length) {
				formdataCopy.recipeBadges = formdata.recipeBadges.map(
					(item) => {
						return item.value;
					}
				);
			}

			if (formdata.recipeDietaries && formdata.recipeDietaries.length) {
				formdataCopy.recipeDietaries = formdata.recipeDietaries.map(
					(item) => {
						return item.value;
					}
				);
			}
			setdefaultValues(formdata);
		}

		if (editMode && editRecipeId) {
			if (selectedButton === "update") {
				setupdateButtonText(__("Updating...", "delicious-recipes-pro"));
			}
			if (selectedButton === "save") {
				setSaveButtonText(__("Saving...", "delicious-recipes-pro"));
			}

			let submitReview =
				editPostStatus == "draft" && selectedButton === "update"
					? true
					: false;

			apiFetch({
				path: "/deliciousrecipe/v1/recipe/usrdb/" + editRecipeId,
				method: "POST",
				data: {
					nonce: rest_nonce,
					formdata: formdataCopy,
					submitReview: submitReview,
				},
			}).then((response) => {
				if (response.success) {
					toastr.clear();
					toastr.success(
						__(
							"Recipe settings updated successfully !!",
							"delicious-recipes-pro"
						)
					);
					if (submitReview) {
						resetForm({ values: initialDefaultValues });
						typeof setEditMode === "function" && setEditMode(false);
						typeof setEditRecipeId === "function" &&
							setEditRecipeId(null);
					}
				}
				setupdateButtonText(
					__("Update Recipe", "delicious-recipes-pro")
				);
				setSaveButtonText(__("Save Recipe", "delicious-recipes-pro"));
			});
		} else {
			selectedButton === "save"
				? setSaveButtonText(__("Saving...", "delicious-recipes-pro"))
				: setupdateButtonText(
					__("Submitting...", "delicious-recipes-pro")
				);
			apiFetch({
				path: "/deliciousrecipe/v1/recipe/usrdb",
				method: "POST",
				data: {
					nonce: rest_nonce,
					guest: guestMode,
					draft: isSave,
					formdata: formdataCopy,
				},
			}).then((response) => {
				if (response.success) {
					if (isSave && response?.recipe_id) {
						typeof setEditMode === "function" && setEditMode(true);
						typeof setEditRecipeId === "function" &&
							setEditRecipeId(response?.recipe_id);
					} else {
						window.location.reload(false);
					}
					toastr.clear();
					{
						!isSave &&
							globalSettings.enablePendingMode[0] &&
							"yes" === globalSettings.enablePendingMode[0]
							? toastr.warning(
								__(
									"Recipe settings saved successfully!! It will be published after admin review.",
									"delicious-recipes-pro"
								)
							)
							: toastr.success(
								__(
									"Recipe settings saved successfully !! View your recipes at My Recipes.",
									"delicious-recipes-pro"
								)
							);
					}
				}
				setupdateButtonText(
					__("Submit Recipe", "delicious-recipes-pro")
				);
				setSaveButtonText(__("Save Recipe", "delicious-recipes-pro"));
			});
		}
	};

	const handleListChange = (updatedList, arrayKey, values) => {
		let tempList = {
			...values,
			[`${arrayKey}`]: updatedList,
		};
		setdefaultValues(tempList);
	};

	if ('yes' === recaptchaEnabled && googleSiteKey) {
		const script = document.createElement('script');
		if (recaptchaVersion === 'v3') {
			script.src = `https://www.google.com/recaptcha/api.js?render=${googleSiteKey}`;
		} else if (recaptchaVersion === 'v2') {
			script.src = `https://www.google.com/recaptcha/api.js`;
		}
		script.async = true;
		script.defer = true;
		document.body.appendChild(script);
	}
	useEffect(() => {
		getGlobalSettings();
	}, [recaptchaEnabled]);

	const getGlobalSettings = () => {
		apiFetch({ path: '/deliciousrecipe/v1/recipe-global' })
			.then((response) => {
				if (response.success && response.data) {
					setRecaptchaEnabled(response.data.recipe_settings.recaptchaEnabledForRecipe[0]);
					setRecaptchaVersion(response.data.recipe_settings.recpatchaVersion);
					setGoogleSiteKey(response.data.recipe_settings.recaptchaSiteKey);
					setGoogleSecretKey(response.data.recipe_settings.recaptchaSecretKey);
				} else {
					console.error("Invalid response:", response);
					throw new Error("Invalid response from the server");
				}
			})
			.catch((error) => {
				console.error("Error fetching data:", error);
			});
	}

	const validateRecaptcha = async () => {
		let recaptchaResponse
		getGlobalSettings();
		if ('v3' === recaptchaVersion) {
			recaptchaResponse = await grecaptcha.ready(() => {
				grecaptcha.execute(googleSiteKey, { action: 'submit' }).then((token) => {
					return token;
				});
			})
		} else {
			recaptchaResponse = grecaptcha.getResponse();
		}
		// console.log(recaptchaResponse)

		if (recaptchaResponse.length === 0) {
			toastr.error(
				__("Please verify that you are not a robot.", "delicious-recipes-pro")
			);
			return false;
		} else {
			const response = await apiFetch({
				path: '/deliciousrecipe/v1/recipe-recaptcha',
				method: 'POST',
				data: {
					recaptchaResponse: recaptchaResponse,
					googleSecretKey: googleSecretKey
				}
			});

			if (response.success) {
				setReCaptchaValidationResult(response.data);
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

	return (
		<div className="dr-ud__submit-recipe-wrapper">
			<header className="dr-ud__header">
				{!guest_mode && (
					<h2 className="dr-ud__title">
						{editMode && editRecipeId
							? __("Edit Recipe", "delicious-recipes-pro")
							: __("Submit Recipe", "delicious-recipes-pro")}
					</h2>
				)}
				{"undefined" !=
					typeof globalSettings.recipeSubmissionGuideline &&
					"" !== globalSettings.recipeSubmissionGuideline && (
						<div
							className="dr-ud__desc"
							dangerouslySetInnerHTML={{
								__html:
									globalSettings.recipeSubmissionGuideline,
							}}
						></div>
					)}
			</header>

			<Formik
				enableReinitialize
				validationSchema={submissionFormSchema}
				initialValues={defaultValues}
				onSubmit={async (values, { resetForm, setFieldValue }) => {
					await handleFormSave(values, false, resetForm);
					resetForm();
					setFieldValue(defaultValues);
				}}
			>
				{({
					handleSubmit,
					handleChange,
					setFieldValue,
					values,
					touched,
					errors,
					resetForm,
					handleReset,
					setFieldTouched,
				}) => (
					<Form className="dr-form__fields-wrapper">
						<ConnectedFocusError />
						{globalSettings.recipeFieldsOrder &&
							globalSettings.recipeFieldsOrder.map(
								(fieldGrp, index) => {
									switch (fieldGrp.id) {
										case "recipe-details":
											return (
												"yes" ===
												fieldGrp.enable[0] && (
													<RecipeDetails
														key={index}
														setFieldValue={
															setFieldValue
														}
														setFieldTouched={
															setFieldTouched
														}
														values={values}
														errors={errors}
														touched={touched}
														sectionTitle={
															fieldGrp.sectionTitle
														}
													/>
												)
											);

										case "recipe-info":
											return (
												"yes" ===
												fieldGrp.enable[0] && (
													<RecipeInfo
														key={index}
														values={values}
														setFieldValue={
															setFieldValue
														}
														sectionTitle={
															fieldGrp.sectionTitle
														}
													/>
												)
											);

										case "recipe-ingredients":
											return (
												"yes" ===
												fieldGrp.enable[0] && (
													<RecipeIngredients
														key={index}
														values={values}
														handleListChange={
															handleListChange
														}
														sectionTitle={
															fieldGrp.sectionTitle
														}
													/>
												)
											);

										case "recipe-instructions":
											return (
												"yes" ===
												fieldGrp.enable[0] && (
													<RecipeInstructions
														key={index}
														values={values}
														handleListChange={
															handleListChange
														}
														setFieldValue={
															setFieldValue
														}
														sectionTitle={
															fieldGrp.sectionTitle
														}
													/>
												)
											);

										case "recipe-gallery":
											return (
												"yes" ===
												fieldGrp.enable[0] && (
													<RecipeGallery
														key={index}
														values={values}
														setFieldValue={
															setFieldValue
														}
														sectionTitle={
															fieldGrp.sectionTitle
														}
													/>
												)
											);

										case "recipe-nutrition":
											return (
												"yes" ===
												fieldGrp.enable[0] && (
													<RecipeNutrition
														key={index}
														values={values}
														sectionTitle={
															fieldGrp.sectionTitle
														}
													/>
												)
											);

										case "recipe-notes":
											return (
												"yes" ===
												fieldGrp.enable[0] && (
													<RecipeNotes
														key={index}
														values={values}
														setFieldValue={
															setFieldValue
														}
														sectionTitle={
															fieldGrp.sectionTitle
														}
													/>
												)
											);
									}
								}
							)}

						{"undefined" !=
							typeof globalSettings.recipeDisclaimer &&
							"" !== globalSettings.recipeDisclaimer && (
								<div
									className="dr-ud__desc"
									dangerouslySetInnerHTML={{
										__html: globalSettings.recipeDisclaimer,
									}}
								></div>
							)}

						<div className="dr-form__section sticky-section">
							{recaptchaEnabled == 'yes' && recaptchaVersion == 'v2' && (
								<div>
									<div className="dr-form__field g-recaptcha" data-sitekey={googleSiteKey}></div>
								</div>
							)}
							<div className="dr-button-group">
								{editPostStatus === "draft" && (
									<button
										type="button"
										className="dr-btn btn-secondary"
										onClick={async(event) => {
											if (touched.title && values.title) {
												setSelectedButton("save");
												const isValid = await validateRecaptcha();
												if (isValid === true) {
													handleFormSave(
														values,
														true,
														handleReset
													);
												} else {
													event.preventDefault();
												}
											} else {
												handleSubmit();
											}
										}}
									>
										{saveButtonText}
									</button>
								)}
								<input
									type="submit"
									value={updateButtonText}
									className="dr-btn btn-primary"
									onClick={async (event) => {
										const isValid = await validateRecaptcha();
										console.log(isValid);
										if (isValid) {
											setSelectedButton("update")
										} else {
											event.preventDefault();
										}
									}}
								/>
							</div>
						</div>
					</Form>
				)}
			</Formik>
		</div>
	);
};

export default RecipeSubmission;
