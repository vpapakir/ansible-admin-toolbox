import { useState } from 'react';
import { Icon, Tab } from '../components';
import Homepage from "./Home";
import License from './License';
import Offers from './Offers';
import UsefulPlugins from './UsefulPlugins';
import StarterSites from './StarterSites';
import FAQ from './FAQ';
import { Toaster } from 'sonner';
import { __ } from '@wordpress/i18n';

function Dashboard() {
    const [activeTabTitle, setActiveTabTitle] = useState('Home');

    const tabsData = [
        {
            title: __('Home', 'cookery'),
            icon: <Icon icon="home" />,
            content: <Homepage />
        },
        {
            title: __('Starter Sites', 'cookery'),
            icon: <Icon icon="globe" />,
            content: <StarterSites />
        },
        {
            title: __('Offers', 'cookery'),
            icon: <Icon icon="offers" />,
            content: <Offers />
        },
        {
            title: __('FAQs', 'cookery'),
            icon: <Icon icon="support" />,
            content: <FAQ />
        },
        {
            title: __('Useful Plugins', 'cookery'),
            icon: <Icon icon="plugins" />,
            content: <UsefulPlugins />
        },
        {
            title: __('License', 'cookery'),
            icon: <Icon icon="license" />,
            content: <License />
        },
    ];

    const handleTabChange = (title) => {
        setActiveTabTitle(title);
    };

    return (
        <>
            <Tab
                tabsData={tabsData}
                onChange={handleTabChange}
                activeTabTitle={activeTabTitle}
            />
            <Toaster richColors closeButton />

        </>
    );
}

export default Dashboard;
