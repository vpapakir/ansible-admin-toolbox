jQuery(document).ready(function ($) {
    if (!customizerRestriction.theme_ver) return;

    var customizeControls = $('#customize-theme-controls');
    var appendHtml = '';
    var status = customizerRestriction.updater.status;
    var updatedDate = customizerRestriction.updated_date;

    if (status === 'expired' || status === 'disabled') {
        appendHtml = `
        <div class="customizer-restriction-overlay-content expiry">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <mask id="mask0_2456_882" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                <rect width="24" height="24" fill="#D9D9D9"/>
                </mask>
                <g mask="url(#mask0_2456_882)">
                <path d="M19.775 22.625L12.15 15C11.6167 15.9 10.9042 16.625 10.0125 17.175C9.12083 17.725 8.11667 18 7 18C5.33333 18 3.91667 17.4167 2.75 16.25C1.58333 15.0833 1 13.6667 1 12C1 10.9 1.26667 9.89167 1.8 8.975C2.33333 8.05834 3.05 7.33334 3.95 6.8L1.375 4.225L2.8 2.8L21.2 21.2L19.775 22.625ZM7 14C7.55 14 8.02083 13.8042 8.4125 13.4125C8.80417 13.0208 9 12.55 9 12V11.825L7.175 10H7C6.45 10 5.97917 10.1958 5.5875 10.5875C5.19583 10.9792 5 11.45 5 12C5 12.55 5.19583 13.0208 5.5875 13.4125C5.97917 13.8042 6.45 14 7 14ZM20.825 18L12.825 10H23V14H21V18H20.825Z" fill="#DC3232"/>
                </g>
            </svg>
        
            <span class="title">License Key ${status === 'expired' ? 'Expired' : 'Disabled'}</span>
            <p class="custo-message">${customizerRestriction.updater.message}</p>
        </div>
        `;
    } else if ( ( status === 'item_name_mismatch' || status === 'site_inactive' || status === 'invalid' ) && ( updatedDate && updatedDate !== '' && parseInt(updatedDate) > 30 ) ) {
        appendHtml = `
        <div class="customizer-restriction-overlay-content">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <mask id="mask0_2456_838" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                <rect width="24" height="24" fill="#D9D9D9"/>   
                </mask>
                <g mask="url(#mask0_2456_838)">
                <path d="M7 15C7.83333 15 8.54167 14.7083 9.125 14.125C9.70833 13.5417 10 12.8333 10 12C10 11.1667 9.70833 10.4583 9.125 9.875C8.54167 9.29167 7.83333 9 7 9C6.16667 9 5.45833 9.29167 4.875 9.875C4.29167 10.4583 4 11.1667 4 12C4 12.8333 4.29167 13.5417 4.875 14.125C5.45833 14.7083 6.16667 15 7 15ZM7 18C5.33333 18 3.91667 17.4167 2.75 16.25C1.58333 15.0833 1 13.6667 1 12C1 10.3333 1.58333 8.91667 2.75 7.75C3.91667 6.58333 5.33333 6 7 6C8.35 6 9.52917 6.38333 10.5375 7.15C11.5458 7.91667 12.25 8.86667 12.65 10H21.025L23 11.975L19.5 15.975L17 14L15 16L13 14H12.65C12.2333 15.2 11.5083 16.1667 10.475 16.9C9.44167 17.6333 8.28333 18 7 18Z" fill="#1085BA"/>
                </g>
            </svg>
        
            <span>Activate Your License Key</span>
            <p class="custo-message">Please activate your license key to access your website's settings. You can find your license key <a target="_blank" href="${customizerRestriction.account_url}">here</a>.</p>
            <a class="customizer-restriction-overlay-close" target="_blank" href="${customizerRestriction.url}">Click here to activate</a>
        </div>
        `;
    } else {
        appendHtml = `
        <div class="customizer-restriction-overlay-content">
            <p class="custo-message">There is an issue!</p>
        </div>
        `;
    }

    if (appendHtml) {
        customizeControls.wrap('<div class="customizer-restriction-overlay-wrapper"></div>');
        $('.customizer-restriction-overlay-wrapper').append(`<div class="customizer-restriction-overlay">${appendHtml}</div>`);
    }
});