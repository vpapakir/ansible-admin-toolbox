import { sprintf, __ } from "@wordpress/i18n"; //Import __() from wp.i18n
import { ReactSortable } from "react-sortablejs";
import { Short } from "../../images/svgImages";

const getReactionLabel = (id) => {
	switch (id) {
		case 'yummy':
			return __('Reaction - Yummy', 'delicious-recipes-pro');

		case 'love':
			return __('Reaction - Love', 'delicious-recipes-pro');

		case 'wow':
			return __('Reaction - Wow', 'delicious-recipes-pro');

		case 'happy':
			return __('Reaction - Happy', 'delicious-recipes-pro');

		case 'sad':
			return __('Reaction - Sad', 'delicious-recipes-pro');

		case 'yay':
			return __('Reaction - Yay', 'delicious-recipes-pro');

		case 'rolf':
			return __('Reaction - Rolf', 'delicious-recipes-pro');

		case 'smiling':
			return __('Reaction - Smiling', 'delicious-recipes-pro');

		case 'sleepy':
			return __('Reaction - Sleepy', 'delicious-recipes-pro');

		case 'angry':
			return __('Reaction - Angry', 'delicious-recipes-pro');

		case 'dead':
			return __('Reaction - Dead', 'delicious-recipes-pro');

		case 'wink':
			return __('Reaction - Wink', 'delicious-recipes-pro');

		default:
			return '';
	}
};


export default ({ values, setFieldValue, handleChange, updateState }) => {
	/**
	 * Function
	 * Add ArrayMove
	 */
	const handleArrayMove = (array, oldIndex, newIndex) => {
		if (newIndex >= array.length) {
			var k = newIndex - array.length + 1;
			while (k--) {
				array.push(undefined);
			}
		}
		array.splice(newIndex, 0, array.splice(oldIndex, 1)[0]);
		return array;
	};
	let enableEmojiReactionsClass =
		"undefined" !== typeof values.emojiReactions &&
			values.emojiReactions["0"] &&
			"yes" === values.emojiReactions["0"]
			? "dr-onoff-toggle active"
			: "dr-onoff-toggle";
	let emojiReactionsStyle =
		"undefined" !== typeof values.emojiReactions &&
			values.emojiReactions["0"] &&
			"yes" === values.emojiReactions["0"]
			? { display: "block" }
			: { display: "none" };
	return (
		<>
			<div className="dr-field dr-floated wpd-m-0 wpd-border-0">
				<label
					htmlFor="dr-enableemojireactions"
					className="dr-field-label"
				>
					{__("Enable emoji reactions", "delicious-recipes-pro")}
				</label>
				<div className="dr-onoff-block">
					<a className={enableEmojiReactionsClass}>
						<label
							htmlFor="dr-enableemojireactions"
							className="dr-field-label"
						>
							<span className="dr-onoff-btn"></span>
						</label>
					</a>
					<input
						type="checkbox"
						id="dr-enableemojireactions"
						name="emojiReactions"
						value="yes"
						onChange={handleChange}
						checked={
							values.emojiReactions[0] &&
								"yes" === values.emojiReactions[0]
								? "checked"
								: ""
						}
					/>
				</div>
				<span className="dr-tooltip">
					{__(
						"Enable this option to show emoji reactions on the single recipe post.",
						"delicious-recipes-pro"
					)}
				</span>
			</div>
			<div className="dr-onoff-popup wpd-mt-0 wpd-mb-15" style={emojiReactionsStyle}>
				<div className="dr-field dr-floated">
					<label
						className="dr-field-label"
						htmlFor="dr-enable-recipe-unique-reactions"
					>
						{__(
							"Enable Unique Reactions",
							"delicious-recipes-pro"
						)}
					</label>
					<div className="dr-checkbox advance-checkbox">
						<div className="dr-checkbox-wrap">
							<input
								type="checkbox"
								id="dr-enable-recipe-unique-reactions"
								name="enableUniqueReactions"
								value="yes"
								onChange={handleChange}
								checked={
									values.enableUniqueReactions[0] &&
										"yes" ===
										values.enableUniqueReactions[0]
										? "checked"
										: ""
								}
							/>
							<label htmlFor="dr-enable-recipe-unique-reactions"></label>
						</div>
					</div>
					<span className="dr-tooltip">
						{__(
							"This will enable your readers to only vote for one reaction at a time.",
							"delicious-recipes-pro"
						)}
					</span>
				</div>
				<div className="dr-field dr-text dr-floated">
					<label className="dr-field-label">
						{__("Section Title", "delicious-recipes-pro")}
					</label>
					<input
						type="text"
						name="emojiSectionTitle"
						placeholder={__(
							"Enter emoji reaction section title text",
							"delicious-recipes-pro"
						)}
						onChange={handleChange}
						value={values.emojiSectionTitle}
					/>
					<span className="dr-tooltip">
						{__(
							"This is the text that will be displayed on emoji reactions Section.",
							"delicious-recipes-pro"
						)}
					</span>
				</div>
				<div className="dr-field">
					<ReactSortable
						list={values.emojiReactionsList}
						setList={(list) => { }}
						onEnd={(e) => {
							var newlist = handleArrayMove(
								[...values.emojiReactionsList],
								e.oldIndex,
								e.newIndex
							);
							updateState({
								DefaultValues: {
									...values,
									emojiReactionsList: newlist,
								},
							});
						}}
						className="dr-multi-fields dr-emoji-reactions"
					// handle='.dr-sortable'
					>
						{values?.emojiReactionsList &&
							values.emojiReactionsList.map(
								(item, itemIndex) => (
									<div
										key={itemIndex}
										className="dr-emoji-switch-wrap wpd-m-0 wpd-border-top-0 wpd-pt-0 wpd-pb-1"
									>
										<button
											type="button"
											className="dr-short-button"
										>
											<Short />
										</button>
										<div className="dr-field dr-floated wpd-pb-0">
											<label
												className="dr-field-label"
												htmlFor={`enable-reaction-${item.id}`}
											>
												{getReactionLabel(item.id)}
											</label>
											<div className="wpd-flex wpd-gap-1">
												<div className="dr-checkbox advance-checkbox">
													<div className="dr-checkbox-wrap">
														<input
															type="checkbox"
															id={`enable-reaction-${item.id}`}
															name={`emojiReactionsList.${itemIndex}.enable`}
															value="yes"
															onChange={
																handleChange
															}
															checked={
																values
																	.emojiReactionsList[
																	itemIndex
																]
																	.enable[0] &&
																	"yes" ===
																	values
																		.emojiReactionsList[
																		itemIndex
																	]
																		.enable[0]
																	? "checked"
																	: ""
															}
														/>
														<label
															htmlFor={`enable-reaction-${item.id}`}
														></label>
													</div>
												</div>
												<span className="dr-tooltip">
													{sprintf(
														__(
															"This will enable %s in reactions.",
															"delicious-recipes-pro"
														),
														item.label
													)}
												</span>
											</div>
										</div>
									</div>
								)
							)}
					</ReactSortable>
				</div>
				<div className="dr-field dr-text dr-floated wpd-pt-15">
					<label className="dr-field-label">
						{__(
							"Emoji Icon Size - (pixels)",
							"delicious-recipes-pro"
						)}
					</label>
					<input
						type="number"
						step="1"
						min="1"
						name="emojiIconSize"
						placeholder={__(
							"Enter emoji reaction icon size(px)",
							"delicious-recipes-pro"
						)}
						onChange={handleChange}
						value={values.emojiIconSize}
					/>
				</div>
				<div className="dr-field dr-select dr-floated dr-checkbox advance-checkbox wpd-pb-0">
					<label className="dr-field-label">
						{__("Alignment", "delicious-recipes-pro")}
					</label>
					<div className="dr-emoji-location-options dr-filter-options">
						<label>
							<input
								type="radio"
								name="emojiLocation"
								value="left"
								onChange={handleChange}
								checked={
									values.emojiLocation === "left"
										? "checked"
										: ""
								}
							/>
							<span>
								{__("Left", "delicious-recipes-pro")}
							</span>
						</label>
						<label>
							<input
								type="radio"
								name="emojiLocation"
								value="center"
								onChange={handleChange}
								checked={
									values.emojiLocation === "center"
										? "checked"
										: ""
								}
							/>
							<span>
								{__("Center", "delicious-recipes-pro")}
							</span>
						</label>
						<label>
							<input
								type="radio"
								name="emojiLocation"
								value="right"
								onChange={handleChange}
								checked={
									values.emojiLocation === "right"
										? "checked"
										: ""
								}
							/>
							<span>
								{__("Right", "delicious-recipes-pro")}
							</span>
						</label>
					</div>
					<span className="dr-tooltip">
						{__(
							"Select the position to display emoji reactions.",
							"delicious-recipes-pro"
						)}
					</span>
				</div>
			</div>
		</>
	);
};
