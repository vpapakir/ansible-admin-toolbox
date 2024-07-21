import { Icon } from "../../components";
import { mainDemo, demo2, demo3 } from "../../components/images";
import { __, sprintf } from "@wordpress/i18n";
import { useState, useEffect } from '@wordpress/element';
import { Spinner } from '@wordpress/components';

const StarterSites = () => {
    const [buttonState, setButtonState] = useState('install');
    const [activateUrl, setActivateUrl] = useState([]);

    const demoUrl = `${cw_dashboard.admin_url}themes.php?page=demo-importer-plus`;

    useEffect(() => {
        const inactivePlugins = cw_dashboard.inactivePlugins;
        const activePlugins = cw_dashboard.activePlugins

        const demoImporterPlus = inactivePlugins.find(plugin => plugin.slug === "demo-importer-plus");

        if (demoImporterPlus) {
            setButtonState('inactive');
            const url = demoImporterPlus.url.replace(/&amp;/g, '&');
            setActivateUrl([url]);
        }
        else {
            const demoImporterPlusActive = activePlugins.find(plugin => plugin.slug === "demo-importer-plus");
            if (demoImporterPlusActive) {
                setButtonState('active');
            }
        }
    }, []);

    const handleDemoImporter = () => {
        setButtonState("installing");

        wp.updates.installPlugin({
            slug: "demo-importer-plus",
            success: (response) => {
                setActivateUrl([response.activateUrl]);
                setButtonState("inactive");
            },
            error: (error) => {
                console.error(error);
                setButtonState("install");
            }
        });
    }

    async function activatePlugins() {
        setButtonState('activating');
        for (const url of activateUrl) {
            try {
                const urlObj = new URL(url);
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        _wpnonce: urlObj.searchParams.get('_wpnonce'),
                        action: 'activate',
                        plugin: urlObj.searchParams.get('plugin'),
                    }).toString(),
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

            } catch (error) {
                console.error(`Error activating plugin: ${url}`, error);
            }
        }
        setButtonState('active');
    }


    return (
        <>
            <div className="starter-sites">
                <div className="image-wrapper">
                    <div className="image">
                        <img src={demo2} alt="" />
                        <div className="reverse-image">
                            <img src={demo2} alt="" />
                        </div>
                    </div>
                    <div className="image">
                        <img src={mainDemo} alt="" />
                        <div className="reverse-image">
                            <img src={mainDemo} alt="" />
                        </div>
                    </div>
                    <div className="image">
                        <img src={demo3} alt="" />
                        <div className="reverse-image">
                            <img src={demo3} alt="" />
                        </div>
                    </div>
                </div>
                <div className="text-wrapper">
                    <h2>{__('One Click Demo Import', 'blossom-pin-pro')}</h2>
                    <p dangerouslySetInnerHTML={{ __html: sprintf(__('Get started effortlessly! Use our one-click demo import feature to set up your site instantly with all the sample data and settings. Please note that importing demo content will overwrite your existing site content and settings. %s Not recommended if you have existing content. %s', 'blossom-pin-pro'), '<b>', '</b>') }} />
                    <div className="cw-button">
                        {(buttonState == "install" || buttonState == "installing") &&
                            <button className="cw-button-btn primary-btn" onClick={handleDemoImporter} >
                                {__('Install Starter Sites', 'blossom-pin-pro')} <Icon icon="arrow" />
                                {buttonState == "installing" && <Spinner />}
                            </button>
                        }
                        {(buttonState == "inactive" || buttonState == "activating") &&
                            <button className="cw-button-btn primary-btn" onClick={activatePlugins}>
                                {__('Activate Starter Sites', 'blossom-pin-pro')} <Icon icon="arrow" />
                                {buttonState == "activating" && <Spinner />}
                            </button>
                        }
                        {buttonState == "active" &&
                            <a href={demoUrl} className="cw-button-btn primary-btn">
                                {__('Import Starter Sites', 'blossom-pin-pro')} <Icon icon="arrow" />
                            </a>
                        }
                    </div>
                </div>
            </div>
        </>
    );
}

export default StarterSites;