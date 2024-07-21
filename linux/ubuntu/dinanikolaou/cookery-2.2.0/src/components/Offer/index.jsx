import { vipSiteCare, salesFunnel, customFonts, themeClub } from "../../components/images";
import { Icon } from '..';
import { __ } from "@wordpress/i18n"

export default function Offer() {

    const offerList = [
        {
            heading: __("Get All 20 Premium Themes Worth $1180 for Just $149!", 'cookery'),
            para: __("Join the Blossom Themes Theme Club to access a diverse collection of beautifully designed, feature-rich WordPress themes. Perfect for bloggers, businesses, and creatives, our themes offer seamless customization, responsive design, and excellent support to help you create a stunning online presence effortlessly.", 'cookery'),
            imageurl: themeClub,
            buttonText: __("View All Themes", 'cookery'),
            buttonUrl: 'https://blossomthemes.com/theme/premium-wordpress-themes/?utm_source=cookery&utm_medium=dashboard&utm_campaign=premium_themes',
            buttonTwo: __("Buy Now", 'cookery'),
            buttonTwoUrl: cw_dashboard.theme_club_upgrade
        },
        {
            heading: __("Sales Funnel and Landing Page Templates for WordPress", 'cookery'),
            para: __("Transform your website into a lead and sales generating machine with our ready-made sales funnel and landing page templates. Perfect for kickstarting your online success!", 'cookery'),
            imageurl: salesFunnel,
            buttonUrl: cw_dashboard.sales_funnel,
            buttonText: __("Buy Now", 'cookery'),
        },
        {
            heading: __("Enhance Your Website's Aesthetics with WP Custom Fonts!", 'cookery'),
            para: __("Elevate your typography and stand out from the crowd. Upgrade now to unlock endless font possibilities for your WordPress site!", 'cookery'),
            imageurl: customFonts,
            buttonUrl: cw_dashboard.custom_fonts,
            buttonText: __("Learn More", 'cookery'),
        },
        {
            heading: __("VIP Care - Expert Website Care for WordPress", 'cookery'),
            para: __("Our VIP Care service offers comprehensive maintenance, protection, and speed optimization for your WordPress site, ensuring you never have to worry about it again. Relax and let us handle everything!", 'cookery'),
            imageurl: vipSiteCare,
            buttonUrl: cw_dashboard.vip_site_care,
            buttonText: __("Get Started", 'cookery'),
        }
    ];

    const offerListing = offerList.map((item, index) => {
        return (
            <div className='cw-offers' key={index}>
                <div className="cw-offerbody">
                    <h3 className="cw-heading">{item.heading}</h3>
                    <p className="cw-text">{item.para}</p>
                    <div className="cw-button">
                        <a href={item.buttonUrl} target="_blank" className="cw-button-btn primary-btn">{item.buttonText}<Icon icon="arrowtwo" /></a>
                        {item.buttonTwo && <a href={item.buttonTwoUrl} target="_blank" className="cw-button-btn outline">{item.buttonTwo}<Icon icon="arrowtwo" /></a>}
                    </div>
                </div>
                <div className="cw-offer-image">
                    <img src={item.imageurl} alt="blossom" />
                </div>
            </div>
        );
    });

    return (
        <div className="cw-offer-wrap">
            {offerListing}
        </div>
    )
}