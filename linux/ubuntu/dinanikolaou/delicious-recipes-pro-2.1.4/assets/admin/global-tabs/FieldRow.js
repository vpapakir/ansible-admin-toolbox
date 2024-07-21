import { __ } from "@wordpress/i18n";
/**
 * 
 * @param {FieldRow Function} param0 
 * @returns 
 */
function FieldRow({ sectionData, rowId, handleChange }) {
    return (
        <tr>
            <td className="dr-col-move">
                <button type="button" className="dr-action-btn action-btn-move">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8.863" height="21.447" viewBox="0 0 8.863 21.447">
                        <g id="Group_5590" data-name="Group 5590" transform="translate(-706 -885)">
                            <path id="Path_23438" data-name="Path 23438" d="M0,8.863,6.892,4.431,0,0" transform="translate(714.863 899.555) rotate(90)" fill="#2db68d" />
                            <path id="Path_23439" data-name="Path 23439" d="M0,0,6.893,4.431,0,8.863" transform="translate(706 891.893) rotate(-90)" fill="#2db68d" />
                        </g>
                    </svg>
                </button>
            </td>
            <td>{rowId + 1}.</td>
            <td>
                <div className="dr-field">
                    <input type="text" onChange={handleChange} name={`recipeFieldsOrder.${rowId}.sectionTitle`} placeholder={__("Section Name", "delicious-recipes-pro")} defaultValue={sectionData.sectionTitle} />
                </div>
            </td>
            <td className="advance-checkbox">
                <div className="dr-checkbox-wrap">
                    <input onChange={handleChange}
                        checked={sectionData.enable[0] && 'yes' === sectionData.enable[0] ? 'checked' : ''}
                        type="checkbox"
                        name={`recipeFieldsOrder.${rowId}.enable`}
                        value="yes"
                        id={`required-field-${rowId}`} />
                    <label htmlFor={`required-field-${rowId}`}></label>
                </div>
            </td>
        </tr>
    )
}

export default FieldRow
