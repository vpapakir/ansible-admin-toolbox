<?php

/**
 * Recipe floating bar template.
 * 
 * @package Delicious_Recipes_Pro
 */

defined('ABSPATH') || exit;

$global_settings = delicious_recipes_get_global_settings();

// Recipe Pro Global toggles
$reading_mode     = isset($global_settings['floatingBarToggles']['0']['enable']['0']) && 'yes' === $global_settings['floatingBarToggles']['0']['enable']['0'] ? true : false;

if ( $reading_mode ) : ?>
    
    <button class="dr-cancel-reading-mode-btn" onclick="exitReadingMode()">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="78" height="78"
            viewBox="0 0 78 78">
            <defs>
                <filter id="Ellipse_1345" x="0" y="0" width="78" height="78" filterUnits="userSpaceOnUse">
                    <feOffset dy="3" input="SourceAlpha" />
                    <feGaussianBlur stdDeviation="3" result="blur" />
                    <feFlood flood-color="#232323" flood-opacity="0.059" />
                    <feComposite operator="in" in2="blur" />
                    <feComposite in="SourceGraphic" />
                </filter>
            </defs>
            <g id="Group_5958" data-name="Group 5958" transform="translate(-661.986 -41)">
                <g transform="matrix(1, 0, 0, 1, 661.99, 41)" filter="url(#Ellipse_1345)">
                    <circle id="Ellipse_1345-2" data-name="Ellipse 1345" cx="30" cy="30" r="30"
                        transform="translate(9 6)" fill="none" />
                </g>
                <g id="Group_5957" data-name="Group 5957" transform="translate(689.48 65.493)" opacity="0.5">
                    <path id="Path_30698" data-name="Path 30698" d="M1277.947,66.716l25.848,25.848"
                        transform="translate(-1277.947 -66.716)" fill="none" stroke="#232323" stroke-linecap="round"
                        stroke-width="2" />
                    <path id="Path_30699" data-name="Path 30699" d="M1303.794,66.716l-25.848,25.848"
                        transform="translate(-1277.947 -66.716)" fill="none" stroke="#232323" stroke-linecap="round"
                        stroke-width="2" />
                </g>
            </g>
        </svg>
    </button>

    <script>
        function exitReadingMode() {
            document.querySelector('.single-recipe').classList.remove('single-recipe-reading-mode');
        }
    </script>

<?php endif;
