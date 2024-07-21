import { Icon } from "../../components";
import { useState, useEffect } from '@wordpress/element';
import { __ } from '@wordpress/i18n';

const pluginList = [
    {
        pluginName: __( 'WP Delicious – Best WordPress Recipe Plugin', 'cookery' ),
        description: __("A powerful recipe plugin to create and display recipes for bloggers. SEO optimized and Schema-friendly to rank recipes higher on search engines.", "cookery"),
        slug: "delicious-recipes"
    },
    {
        pluginName: __( 'BlossomThemes Toolkit', 'cookery' ),
        description: __("BlossomThemes Toolkit provides you necessary widgets for better and effective blogging.", "cookery"),
        slug: "blossomthemes-toolkit"
    },
    {
        pluginName: __( 'Demo Importer Plus', 'cookery' ),
        description: __("Demo Importer Plus allows you to Import the demo content, widgets, customizer settings and theme settings with a single click without any hassle.", "cookery"),
        slug: "demo-importer-plus"
    },
    {
        pluginName: __( 'BlossomThemes Email Newsletter', 'cookery' ),
        description: __("Easily add email subscription form to your website using shortcode and widget.", "cookery"),
        slug: "blossomthemes-email-newsletter"
    },
    {
        pluginName: __( 'Contact Form 7', 'cookery' ),
        description: __("Just another contact form plugin. Simple but flexible.", "cookery"),
        slug: "contact-form-7"
    },
    {
        pluginName: __( 'Customizer Search', 'cookery' ),
        description: __("Search for settings in customizer.", "cookery"),
        slug: "customizer-search"
    },
    {
        pluginName: __( 'Regenerate Thumbnails', 'cookery' ),
        description: __("Regenerate the thumbnails for one or more of your image uploads. Useful when changing their sizes or your theme.", "cookery"),
        slug: "regenerate-thumbnails"
    },
    {
        pluginName: __( 'Elementor Website Builder', 'cookery' ),
        description: __("Elementor, the leading WordPress website builder,empowers you to build professional, pixel-perfect websites", "cookery"),
        slug: "elementor"
    },
    {
        pluginName: __( 'AffiliateX – Best Amazon Affiliate WordPress Plugin', 'cookery' ),
        description: __("Create a professional-looking affiliate websites with highly customizable blocks that help in increasing the conversion rate and boost your affiliate income.", "cookery"),
        slug: "affiliatex"
    },
    {
        pluginName: __( 'Smash Balloon Social Photo Feed', 'cookery' ),
        description: __("Formerly 'Instagram Feed'. Display clean, customizable, and responsive Instagram feeds from multiple accounts. Supports Instagram oEmbeds.", "cookery"),
        slug: "instagram-feed"
    },
];

const objectExistsInArray = (obj, array) => {
    return array.some((el) => el.slug === obj.slug);
}

const UsefulPlugins = () => {
    const [buttonState, setButtonState] = useState(() => {
        const initialState = {};
        pluginList.forEach(plugin => {
            initialState[plugin.slug] = 'Install';
        });
        return initialState;
    });

    const [activateUrls, setActivateUrls] = useState({});

    useEffect(() => {
        const activePlugins = cw_dashboard.activePlugins;
        const inactivePlugins = cw_dashboard.inactivePlugins;
        const newButtonState = {};

        // Set state for active plugins
        activePlugins.forEach(plugin => {
            if (objectExistsInArray(plugin, pluginList)) {
                newButtonState[plugin.slug] = 'Activated';
            }
        });

        // Set state for inactive plugins
        inactivePlugins.forEach(plugin => {
            if (objectExistsInArray(plugin, pluginList)) {
                newButtonState[plugin.slug] = 'Activate';
            }
        });

        setButtonState(prevState => ({
            ...prevState,
            ...newButtonState
        }));

        const urls = {};
        inactivePlugins.forEach((plugin) => {
            if (objectExistsInArray(plugin, pluginList)) {
                const url = plugin.url.replace(/&amp;/g, '&');
                urls[plugin.slug] = url;
            }
        });

        setActivateUrls(urls);
    }, []);

    const installPlugin = (slug) => {
        setButtonState((prevState) => ({
            ...prevState,
            [slug]: 'Installing...'
        }));

        wp.updates.installPlugin({
            slug: slug,
            success: (response) => {
                setActivateUrls((prevUrls) => ({
                    ...prevUrls,
                    [slug]: response.activateUrl
                }));
                setButtonState((prevState) => ({
                    ...prevState,
                    [slug]: 'Activate'
                }));
            },
            error: (error) => {
                console.error(error);
                setButtonState((prevState) => ({
                    ...prevState,
                    [slug]: 'Install'
                }));
            }
        });
    }

    const activatePlugin = async (slug) => {
        setButtonState((prevState) => ({
            ...prevState,
            [slug]: 'Activating...'
        }));

        const url = activateUrls[slug];
        if (url) {
            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        _wpnonce: new URL(url).searchParams.get('_wpnonce'),
                        action: 'activate',
                        plugin: new URL(url).searchParams.get('plugin'),
                    }).toString(),
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                setButtonState((prevState) => ({
                    ...prevState,
                    [slug]: 'Activated'
                }));
            } catch (error) {
                setButtonState((prevState) => ({
                    ...prevState,
                    [slug]: 'Activate'
                }));
            }
        }
    }

    return (
        <div className="cw-plugin-list-wrapper">
            {pluginList.map((plugin, index) => (
                <div className="cw-plugin-list" key={index}>
                    <div className="plugin-detail">
                        <div className="cw-plugin-title">
                            <Icon icon='pluginList' label={plugin.pluginName} />
                        </div>
                        <p className="description">{plugin.description}</p>
                    </div>
                    <div className="insert-button">
                        {buttonState[plugin.slug] === 'Install' && (
                            <button className="cw-button-btn outline" onClick={() => installPlugin(plugin.slug)}>
                                {__('Install', 'cookery')}
                            </button>
                        )}
                        {buttonState[plugin.slug] === 'Installing...' && (
                            <button className="cw-button-btn outline" disabled>
                                {__('Installing...', 'cookery')}
                            </button>
                        )}
                        {buttonState[plugin.slug] === 'Activate' && (
                            <button className="cw-button-btn outline" onClick={() => activatePlugin(plugin.slug)}>
                                {__('Activate', 'cookery')}
                            </button>
                        )}
                        {buttonState[plugin.slug] === 'Activating...' && (
                            <button className="cw-button-btn outline" disabled>
                                {__('Activating...', 'cookery')}
                            </button>
                        )}
                        {buttonState[plugin.slug] === 'Activated' && (
                            <button className="cw-button-btn primary-btn deactivate" disabled>
                                {__('Activated', 'cookery')}
                            </button>
                        )}
                    </div>
                </div>
            ))}
        </div>
    );
}

export default UsefulPlugins;
