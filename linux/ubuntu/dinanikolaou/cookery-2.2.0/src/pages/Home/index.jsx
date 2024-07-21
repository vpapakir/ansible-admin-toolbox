import { Icon, Sidebar, Card, Heading } from "../../components";
import { __ } from '@wordpress/i18n';

const Homepage = () => {
    const cardLists = [
        {
            iconSvg: <Icon icon="site" />,
            heading: __('Site Identity', 'cookery'),
            buttonText: __('Customize', 'cookery'),
            buttonUrl: cw_dashboard.custom_logo
        },
        {
            iconSvg: <Icon icon="colorsetting" />,
            heading: __("Color Settings", 'cookery'),
            buttonText: __('Customize', 'cookery'),
            buttonUrl: cw_dashboard.colors
        },
        {
            iconSvg: <Icon icon="typographysetting" />,
            heading: __("Typography Settings", 'cookery'),
            buttonText: __('Customize', 'cookery'),
            buttonUrl: cw_dashboard.typography
        },
        {
            iconSvg: <Icon icon="layoutsetting" />,
            heading: __("Layout Settings", 'cookery'),
            buttonText: __('Customize', 'cookery'),
            buttonUrl: cw_dashboard.layout
        },
        {
            iconSvg: <Icon icon="frontpagesetting" />,
            heading: __("Performance Settings", 'cookery'),
            buttonText: __('Customize', 'cookery'),
            buttonUrl: cw_dashboard.performance
        },
        {
            iconSvg: <Icon icon="frontpagesetting" />,
            heading: __("Frontpage Settings", 'cookery'),
            buttonText: __('Customize', 'cookery'),
            buttonUrl: cw_dashboard.front
        },
        {
            iconSvg: <Icon icon="generalsetting" />,
            heading: __("General Settings", 'cookery'),
            buttonText: __('Customize', 'cookery'),
            buttonUrl: cw_dashboard.general
        },
        {
            iconSvg: <Icon icon="sidebar" />,
            heading: __("Sidebar", 'cookery'),
            buttonText: __('Customize', 'cookery'),
            buttonUrl: cw_dashboard.sidebar
        },
        {
            iconSvg: <Icon icon="footersetting" />,
            heading: __('Footer Settings', 'cookery'),
            buttonText: __('Customize', 'cookery'),
            buttonUrl: cw_dashboard.footer
        }
    ];

    const sidebarSettings = [
        {
            heading: __('We Value Your Feedback!', 'cookery'),
            icon: "star",
            para: __("Your review helps us improve and assists others in making informed choices. Share your thoughts today!", 'cookery'),
            imageurl: <Icon icon="review" />,
            buttonText: __('Leave a Review', 'cookery'),
            buttonUrl: cw_dashboard.review
        },
        {
            heading: __('Knowledge Base', 'cookery'),
            para: __("Need help using our theme? Visit our well-organized Knowledge Base!", 'cookery'),
            imageurl: <Icon icon="documentation" />,
            buttonText: __('Explore', 'cookery'),
            buttonUrl: cw_dashboard.docmentation
        },
        {
            heading: __('Need Assistance? ', 'cookery'),
            para: __("If you need help or have any questions, don't hesitate to contact our support team. We're here to assist you!", 'cookery'),
            imageurl: <Icon icon="supportTwo" />,
            buttonText: __('Submit a Ticket', 'cookery'),
            buttonUrl: cw_dashboard.support
        }
    ];
    return (
        <>
            <div className="customizer-settings">
                <div className="cw-customizer">
                    <div className="video-section">
                        <div className="cw-settings">
                            <h2>{__('Cookery Tutorial', 'cookery')}</h2>
                        </div>
                        <iframe src="https://www.youtube.com/embed/Xv_hJTux5kQ?si=6uaX20a6rlXXmLiL" title={__( 'How to Start A Food Blog Step by Step In 2023 | Cookery Tutorial', 'blossom-travek' )} frameBorder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerPolicy="strict-origin-when-cross-origin" allowFullScreen></iframe>
                    </div>
                    <Heading
                        heading={__('Quick Customizer Settings', 'cookery')}
                        buttonText={__('Go To Customizer', 'cookery')}
                        buttonUrl={cw_dashboard?.customizer_url}
                        openInNewTab={true}
                    />
                    <Card
                        cardList={cardLists}
                        cardPlace='customizer'
                        cardCol='three-col'
                    />
                </div>
                <Sidebar sidebarSettings={sidebarSettings} openInNewTab={true} />
            </div>
        </>
    );
}

export default Homepage;