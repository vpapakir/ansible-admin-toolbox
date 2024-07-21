import RecipeSubmission from "../recipe-submission";
import apiFetch from "@wordpress/api-fetch";
import { addQueryArgs } from "@wordpress/url";
import { useEffect, useState } from "@wordpress/element";
import { __ } from "@wordpress/i18n";

const { globalSettings } = DeliciousRecipesProUD;

const getDecodedString = (string) => {
	return string?.replace("&#038;", "&")?.replace("&amp;", "&");
};

const MyRecipes = (props) => {
	const { rest_nonce } = props;

	const [recipes, setRecipes] = useState(null);
	const [editMode, setEditMode] = useState(false);
	const [editRecipeId, setEditRecipeId] = useState(null);

	useEffect(() => {
		getRecipes();
	}, []);

	const handleRecipeDelete = (recipeID) => {
		confirm(
			__(
				"Sure to delete the recipe? This action cannot be reverted.",
				"delicious-recipes-pro"
			)
		) &&
			apiFetch({
				path: addQueryArgs(`/wp/v2/recipe/${recipeID}`),
				method: "DELETE",
			})
				.then((response) => {
					var index = recipes.findIndex(
						(item) => item.id === response.id
					);
					const updatedRecipes = [
						...recipes.slice(0, index),
						...recipes.slice(index + 1),
					];

					setRecipes(updatedRecipes);
				})
				.catch((error) => {
					console.log(error);
				});
	};

	const getRecipes = () => {
		apiFetch({
			path: "/deliciousrecipe/v1/recipe/usrdb/recipes",
			method: "GET",
		})
			.then((response) => {
				let recipes = response?.data?.recipe_submissions?.map(
					(item) => {
						return {
							id: item.id,
							title: item.title,
							edit: item.edit_link,
							link: item.permalink,
							status: item.status,
						};
					}
				);
				setRecipes(recipes);
			})
			.catch((error) => {
				console.log(error);
			});
	};

	return editMode && editRecipeId ? (
		<>
			<button
				type="button"
				className="dr__back-btn"
				onClick={() => setEditMode(false)}
			>
				{__("Back to My Recipes", "delicious-recipes-pro")}
			</button>
			<RecipeSubmission
				recipeEditMode={editMode}
				recipeEditId={editRecipeId}
				rest_nonce={rest_nonce}
			/>
		</>
	) : (
		<div className="dr-ud__recipe-list">
			<header className="dr-ud__header">
				<h2 className="dr-ud__title">
					{__("My Recipes", "delicious-recipes-pro")}
				</h2>
			</header>

			{recipes ? (
				<table className="dr-table">
					<thead>
						<tr>
							<th>#</th>
							<th>
								{__("Recipe Title", "delicious-recipes-pro")}
							</th>
							<th>{__("Status", "delicious-recipes-pro")}</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						{recipes?.map((recipe, index) => (
							<tr key={index}>
								<td>{index + 1}.</td>
								<td>
									{"publish" === recipe.status ? (
										<a target="_blank" href={recipe.link}>
											{getDecodedString(recipe?.title)}
										</a>
									) : (
										getDecodedString(recipe?.title)
									)}
								</td>
								<td>
									<span
										className={`dr-status ${
											"publish" === recipe.status
												? "status-success"
												: "draft" === recipe.status
												? "status-danger"
												: "status-warning"
										}`}
									>
										{"publish" === recipe.status
											? __(
													"Published",
													"delicious-recipes-pro"
											)
											: "pending" === recipe.status ?
											__(
												"Pending",
												"delicious-recipes-pro"
											) 
											: "draft" === recipe.status ?
											__(
												"Draft",
												"delicious-recipes-pro"
											) 
											: __(
												recipe.status,
												"delicious-recipes-pro"
											)}
									</span>
								</td>
								<td>
									{"publish" === recipe.status && (
										<button
											type="button"
											className="dr-btn-view"
											onClick={() =>
												window.open(
													recipe.link,
													"_blank"
												)
											}
										>
											<svg
												xmlns="http://www.w3.org/2000/svg"
												width="17.888"
												height="11.323"
												viewBox="0 0 17.888 11.323"
											>
												<g
													id="Group_6133"
													data-name="Group 6133"
													transform="translate(-484.535 -598.861)"
												>
													<g
														id="noun_Eye_2307"
														transform="translate(484.535 598.861)"
														opacity="0.8"
													>
														<path
															id="Path_30814"
															data-name="Path 30814"
															d="M8.944,11.323C4.168,11.323.425,6.246.267,6.03L0,5.662l.267-.369C.425,5.077,4.168,0,8.944,0s8.52,5.077,8.677,5.293l.268.369-.268.369C17.464,6.246,13.72,11.323,8.944,11.323ZM1.573,5.661C2.5,6.781,5.5,10.07,8.944,10.07s6.451-3.287,7.372-4.407c-.923-1.12-3.925-4.409-7.372-4.409S2.494,4.54,1.573,5.661Z"
															fill="#2db68d"
														/>
														<circle
															id="Ellipse_183"
															data-name="Ellipse 183"
															cx="3.468"
															cy="3.468"
															r="3.468"
															transform="translate(5.477 2.194)"
															fill="#2db68d"
														/>
													</g>
												</g>
											</svg>
										</button>
									)}
									<button
										type="button"
										className="dr-btn-edit"
										onClick={() => {
											setEditMode(true);
											setEditRecipeId(recipe?.id);
										}}
									>
										<svg
											xmlns="http://www.w3.org/2000/svg"
											width="13.158"
											height="15.148"
											viewBox="0 0 13.158 15.148"
										>
											<g
												id="Component_9_1"
												data-name="Component 9 – 1"
												transform="translate(0 -3.53)"
											>
												<g
													id="Group_1609"
													data-name="Group 1609"
													transform="translate(0 3.53)"
												>
													<path
														id="Path_23614"
														data-name="Path 23614"
														d="M549.627,125.162c-.2-.176-.4-.336-.584-.507-.777-.712-1.555-1.424-2.324-2.144-.246-.23-.231-.161-.021-.412q2.584-3.09,5.174-6.174c.48-.572.968-1.138,1.447-1.711.079-.094.127-.08.207-.007q1.418,1.318,2.84,2.632a.8.8,0,0,0,.063.06c.071.052.063.1.009.163-.291.346-.577.7-.868,1.043q-2.811,3.346-5.624,6.691C549.846,124.913,549.744,125.028,549.627,125.162Z"
														transform="translate(-545.144 -111.935)"
														fill="#2db68d"
													/>
													<path
														id="Path_23615"
														data-name="Path 23615"
														d="M841.821,29.919c-.258-.234-.508-.457-.754-.685q-1.078-1-2.152-2c-.205-.191-.2-.195-.019-.41.37-.431.736-.866,1.112-1.292a.569.569,0,0,1,.87-.051c.729.666,1.445,1.344,2.175,2.008a.7.7,0,0,1,.041.923c-.414.464-.8.953-1.2,1.431C841.878,29.868,841.855,29.885,841.821,29.919Z"
														transform="translate(-830.088 -25.305)"
														fill="#2db68d"
													/>
													<path
														id="Path_23616"
														data-name="Path 23616"
														d="M491.629,459.787l3.1,2.848c-.07.031-.109.051-.15.067l-3.668,1.38c-.064.024-.124.062-.192-.008a.211.211,0,0,1-.077-.225c.318-1.3.629-2.6.943-3.906C491.589,459.9,491.6,459.866,491.629,459.787Z"
														transform="translate(-490.629 -448.966)"
														fill="#2db68d"
													/>
												</g>
											</g>
										</svg>
									</button>
									{globalSettings.allowDeleteRecipe[0] &&
										"yes" ===
											globalSettings
												.allowDeleteRecipe[0] && (
											<button
												type="button"
												className="dr-btn-delete"
												onClick={() =>
													handleRecipeDelete(
														recipe?.id
													)
												}
											>
												<svg
													xmlns="http://www.w3.org/2000/svg"
													width="19.395"
													height="22.885"
													viewBox="0 0 19.395 22.885"
												>
													<g
														id="Group_5584"
														data-name="Group 5584"
														transform="translate(-1439 -879.502)"
													>
														<path
															id="Path_23591"
															data-name="Path 23591"
															d="M1259.177-88.231v.245q0,6.834,0,13.668a2.623,2.623,0,0,1-.761,1.964,1.8,1.8,0,0,1-1.3.54q-2.35,0-4.7,0H1247.5a2.247,2.247,0,0,1-2.115-2.52q0-6.818,0-13.635v-.244c-.055,0-.1-.012-.149-.012H1243.5c-.283,0-.417-.156-.417-.489,0-.285,0-.57,0-.855,0-.327.132-.481.409-.481,1.445,0,2.889,0,4.334,0,.12,0,.172-.043.213-.175.236-.744.478-1.486.722-2.227a1.628,1.628,0,0,1,1.518-1.247q2-.006,4.009,0a1.613,1.613,0,0,1,1.509,1.236c.244.735.487,1.471.717,2.212.051.164.118.2.253.2,1.431-.006,2.862,0,4.293,0,.3,0,.417.145.417.5,0,.274,0,.549,0,.823,0,.355-.118.5-.421.5-.569,0-1.138,0-1.707,0Zm-12.259,0v.261q0,6.679,0,13.357,0,.975.813.974h7.84c.447,0,.894.006,1.341,0s.728-.35.736-.888c0-.075,0-.151,0-.226q0-2.057,0-4.114,0-4.6,0-9.2c0-.135-.033-.172-.144-.171-.8.006-1.6,0-2.4,0l-7.813,0Zm8.157-1.83c-.018-.068-.031-.123-.048-.176q-.165-.511-.332-1.022a.806.806,0,0,0-.777-.649q-1.638-.011-3.275,0a.811.811,0,0,0-.776.653q-.167.511-.331,1.023c-.017.052-.028.106-.045.171Z"
															transform="translate(196.418 973.701)"
															fill="#374757"
															stroke="rgba(0,0,0,0)"
															strokeMiterlimit="10"
															strokeWidth="1"
															opacity="0.1"
														/>
														<path
															id="Path_23592"
															data-name="Path 23592"
															d="M1555.8,132.267q0,2.435,0,4.87c0,.323-.127.464-.421.465q-.359,0-.718,0c-.268,0-.4-.144-.4-.444q0-2.831,0-5.662,0-1.965,0-3.929c0-.095,0-.19,0-.284a.351.351,0,0,1,.323-.356c.293-.009.587-.01.88,0,.206.007.33.175.331.425q0,1,0,2Z"
															transform="translate(-106.328 760.572)"
															fill="#374757"
															stroke="rgba(0,0,0,0)"
															strokeMiterlimit="10"
															strokeWidth="1"
															opacity="0.1"
														/>
														<path
															id="Path_23593"
															data-name="Path 23593"
															d="M1441.194,132.325q0-2.443,0-4.885c0-.324.124-.461.421-.462.239,0,.478,0,.718,0,.26,0,.4.148.4.432q0,2.555,0,5.109,0,2.3,0,4.6c0,.05,0,.1,0,.149a.363.363,0,0,1-.355.386c-.257.006-.515,0-.772,0-.279,0-.406-.141-.406-.448Q1441.193,134.768,1441.194,132.325Z"
															transform="translate(3.673 760.518)"
															fill="#374757"
															stroke="rgba(0,0,0,0)"
															strokeMiterlimit="10"
															strokeWidth="1"
															opacity="0.1"
														/>
														<path
															id="Path_23594"
															data-name="Path 23594"
															d="M1669.014,132.312q0,2.427,0,4.854c0,.347-.12.477-.433.478-.23,0-.46,0-.691,0-.279,0-.407-.141-.407-.447q0-2.3,0-4.6,0-2.487,0-4.974c0-.08,0-.159,0-.239.007-.269.137-.415.38-.418s.505,0,.758,0,.393.144.393.432Q1669.015,129.855,1669.014,132.312Z"
															transform="translate(-216.485 760.529)"
															fill="#374757"
															stroke="rgba(0,0,0,0)"
															strokeMiterlimit="10"
															strokeWidth="1"
															opacity="0.1"
														/>
													</g>
												</svg>
											</button>
										)}
								</td>
							</tr>
						))}
					</tbody>
				</table>
			) : (
				<div className="dr-form__desc">
					{__(
						"You have not submitted any recipes yet. You can add recipes through Submit Recipe.",
						"delicious-recipes-pro"
					)}
				</div>
			)}
		</div>
	);
};

export default MyRecipes;
