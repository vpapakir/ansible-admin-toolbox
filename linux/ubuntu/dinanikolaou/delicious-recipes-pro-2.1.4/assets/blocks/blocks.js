import { addFilter } from "@wordpress/hooks";
import { Component } from "@wordpress/element";
import { __ } from "@wordpress/i18n";
import { LayoutThree } from "./common/LayoutThree";
import { LayoutFour } from "./common/LayoutFour";
import { LayoutFive } from "./common/LayoutFive";
import { LayoutSix } from "./common/LayoutSix";
import { LayoutSeven } from "./common/LayoutSeven";

class DRProBlockHook extends Component {
	constructor(props) {
		super();

		addFilter(
			"delicious_recipes_card_layouts",
			"DRProBlockHook",
			function (layouts) {
				const additionalLayouts = [
					...layouts,
					{ label: "Layout Three", value: "layout-3" },
					{ label: "Layout Four", value: "layout-4" },
					{ label: "Layout Five", value: "layout-5" },
					{ label: "Layout Six", value: "layout-6" },
					{ label: "Layout Seven", value: "layout-7" },
				];

				return additionalLayouts;
			}
		);

		addFilter(
			"delicious_recipes_card_layout_templates",
			"DRProBlockHook",
			function (layoutTemplates, preventClick) {
				layoutTemplates &&
					layoutTemplates.push(
						{
							id: "layout-3",
							label: "Layout Three",
							template: function (recipe) {
								return (
									<>
										<LayoutThree
											recipe={recipe}
											preventClick={preventClick}
										/>
									</>
								);
							},
						},
						{
							id: "layout-4",
							label: "Layout Four",
							template: function (recipe) {
								return (
									<>
										<LayoutFour
											recipe={recipe}
											preventClick={preventClick}
										/>
									</>
								);
							},
						},
						{
							id: "layout-5",
							label: "Layout Five",
							template: function (recipe) {
								return (
									<>
										<LayoutFive
											recipe={recipe}
											preventClick={preventClick}
										/>
									</>
								);
							},
						},
						{
							id: "layout-6",
							label: "Layout Six",
							template: function (recipe) {
								return (
									<>
										<LayoutSix
											recipe={recipe}
											preventClick={preventClick}
										/>
									</>
								);
							},
						},
						{
							id: "layout-7",
							label: "Layout Seven",
							template: function (recipe) {
								return (
									<>
										<LayoutSeven
											recipe={recipe}
											preventClick={preventClick}
										/>
									</>
								);
							},
						}
					);

				return layoutTemplates;
			}
		);
	}
}
new DRProBlockHook();
