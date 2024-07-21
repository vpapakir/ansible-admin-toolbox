import { useState } from "@wordpress/element";
import FieldRow from "./FieldRow";
import { ReactSortable } from "react-sortablejs";
import { __ } from "@wordpress/i18n";
const defaultFieldOrder = [
    {
        id: 'recipe-details',
        sectionTitle: __('Recipe Details', "delicious-recipes-pro"),
        enable: ["yes"]
    },
    {
        id: 'recipe-info',
        sectionTitle: __('Recipes Information', "delicious-recipes-pro"),
        enable: ["yes"]
    },
    {
        id: 'recipe-ingredients',
        sectionTitle: __('Ingredients', "delicious-recipes-pro"),
        enable: ["yes"]
    },
    {
        id: 'recipe-instructions',
        sectionTitle: __('Instructions', "delicious-recipes-pro"),
        enable: ["yes"]
    },
    {
        id: 'recipe-gallery',
        sectionTitle: __('Gallery', "delicious-recipes-pro"),
        enable: ["yes"]
    },
    {
        id: 'recipe-nutrition',
        sectionTitle: __('Nutrition Facts', "delicious-recipes-pro"),
        enable: ["yes"]
    },
    {
        id: 'recipe-notes',
        sectionTitle: __('Notes', "delicious-recipes-pro"),
        enable: ["yes"]
    }
]
function SubmissionModal({ dismissModal, Values, handleChange, onChange, setmodalKey }) {
    const [newFieldRow, setNewFieldRow] = useState([]);
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
    }

    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    const generateString = (length) => {
        let result = ' ';
        const charactersLength = characters.length;
        for (let i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }

        return result;
    }
    return (
        <div className="dr-pro-modal">
            <div className="dr-modal-wrapper dr-submission-modal-wrapper">
                <button className="dr-modal-dismiss-btn" onClick={dismissModal}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="11.477" height="11.478" viewBox="0 0 11.477 11.478">
                        <g id="Group_1211" data-name="Group 1211" transform="translate(10.063 1.414) rotate(90)">
                            <line id="Line_2" data-name="Line 2" y2="12.229" transform="translate(8.649 0) rotate(45)" fill="none" stroke="#2db68d" strokeLinecap="round" strokeWidth="2" />
                            <line id="Line_3" data-name="Line 3" x1="0.001" y1="12.23" transform="translate(8.648 8.649) rotate(135)" fill="none" stroke="#2db68d" strokeLinecap="round" strokeWidth="2" />
                        </g>
                    </svg>
                </button>
                <div className="dr-modal-header">
                    {/* <button type="button" className="dr-add-field-btn" onClick={handleAddField}>Add Field</button> */}
                </div>
                <div className="dr-modal-body">
                    <table className="wpdelicious-table table-bordered">
                        <thead>
                            <tr>
                                <th className="dr-col-move">{__('Sort', "delicious-recipes-pro")}</th>
                                <th>#</th>
                                <th>{__('Section Title', "delicious-recipes-pro")}</th>
                                <th>{__('Enable', "delicious-recipes-pro")}</th>
                            </tr>
                        </thead>
                        {/* <tbody> */}
                        {
                            <ReactSortable
                                list={Values.recipeFieldsOrder}
                                setList={(list) => { }}
                                handle=".dr-col-move"
                                onEnd={(e) => {
                                    var newlist = handleArrayMove([...Values.recipeFieldsOrder], e.oldIndex, e.newIndex)
                                    onChange({
                                        DefaultValues: {
                                            ...Values,
                                            recipeFieldsOrder: newlist,
                                        },
                                    });
                                    setmodalKey(generateString(10));
                                }

                                }
                                tag="tbody"
                            >
                                {Values.recipeFieldsOrder && Values.recipeFieldsOrder.map((section, index) => {
                                    return <FieldRow handleChange={handleChange} key={index} sectionData={section} rowId={index} />
                                })}
                            </ReactSortable>
                        }
                        {/* </tbody> */}
                    </table>
                </div>
                <div className="dr-modal-footer">
                    <div className="dr-button-group">
                        {/* <button type="button" onClick={() => {
                            onChange({
                                DefaultValues: {
                                    ...Values,
                                    recipeFieldsOrder: [...defaultFieldOrder],
                                },
                            });
                            setmodalKey(generateString(12));
                        }} className="dr-btn btn-secondary">{__('Reset to Defaults', "delicious-recipes-pro")}</button> */}
                        <button className="dr-btn btn-primary">{__('Save Changes', "delicious-recipes-pro")}</button>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default SubmissionModal
