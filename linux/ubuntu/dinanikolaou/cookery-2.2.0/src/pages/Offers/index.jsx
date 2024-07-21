import {  SEO, plugins, GDPR, support, themeInstall } from "../../components/images";

import { __ } from "@wordpress/i18n"
import { Card, Offer } from "../../components";

const Offers = () => {

    const cardLists = [
        {
            imageurl: themeInstall,
            heading: __('Theme Installation and Setup', 'cookery'),
            headingUrl: cw_dashboard.theme_install,
            para: __('With this service, our expert team will install the theme on your WordPress website and make it look like the demo.', 'cookery'),
            buttonText: __('View Details', 'cookery'),
            buttonUrl: cw_dashboard.theme_install
        },
        {
            imageurl: GDPR,
            heading: __('GDPR Compliance', 'cookery'),
            headingUrl: cw_dashboard.gdpr_setup,
            para: __('This service helps you integrate all of the required features to protect your visitors’ data, making your website compliant with the new GDPR compliance.', 'cookery'),
            buttonText: __('View Details', 'cookery'),
            buttonUrl: cw_dashboard.gdpr_setup
        },
        {
            imageurl: SEO,
            heading: __('Must have SEO Setup', 'cookery'),
            headingUrl: cw_dashboard.seo_setup,
            para: __('This Must-Have SEO Setup service will help to optimise your website, increase search visibility and give you insights into how your site is performing.', 'cookery'),
            buttonText: __('View Details', 'cookery'),
            buttonUrl: cw_dashboard.seo_setup
        },
        {
            imageurl: plugins,
            heading: __('Must Have Plugins Setup', 'cookery'),
            headingUrl: cw_dashboard.plugin_setup,
            para: __('With this service, we will install and configure the essential plugins to turn your site into a powerful engine and keep it safe from hackers.', 'cookery'),
            buttonText: __('View Details', 'cookery'),
            buttonUrl: cw_dashboard.plugin_setup
        },
        {
            imageurl: support,
            heading: __('VIP Support', 'cookery'),
            headingUrl: cw_dashboard.vip_support,
            para: __('Add 12 months of VIP support to your purchase. With VIP Support, you get the highest priority and faster resolutions to your support ticket!', 'cookery'),
            buttonText: __('View Details', 'cookery'),
            buttonUrl: cw_dashboard.vip_support
        },
    ];

    return (
        <>
            <Offer />
            <Card
                cardList={cardLists}
                cardPlace='cw-offer-card'
                cardCol='three-col'
            />
        </>
    )
}

export default Offers;