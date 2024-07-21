import React, { useState, useRef, useEffect } from 'react';
import { Icon } from '../../components';
import { __ } from "@wordpress/i18n";

function FAQ() {
    const faqContent = [
        {
            title: __('How to activate the theme license?', 'cookery'),
            description: (
                <p>{__('To activate the theme license, you need to copy the license key from your', 'cookery')} <a href={cw_dashboard.account} target="_blank">{__(`Blossom Themes' Dashboard`, 'cookery')}</a> {__(`and enter the key on the right-hand side of this page. You can log in to your Blossom Themes' dashboard using the username and password that was sent to your email during the theme purchase.`, 'cookery')}</p>
            )
        },
        {
            title: __('What are the benefits of activating the theme license?', 'cookery'),
            description: 'When you activate the theme license, you can enjoy the seamless theme updates and faster support. We solve compatibility issues and bugs, make the theme more secure, and sometimes add extra features with theme updates. So, if you want your website to be safe and secure, you should activate the theme license so that you never miss our theme updates.'
        },
        {
            title: __('How to renew the theme license?', 'cookery'),
            description: (
                <p>
                    {__('The theme license will be automatically renewed. You will receive multiple reminders in your email before your theme expires. If you want to cancel the auto-renewal, ', 'cookery')}<a href={cw_dashboard.support} target="_blank">{__('please contact us.', 'cookery')}</a>
                </p>
            )
        },
        {
            title: __('What are the benefits of upgrading to the Theme Club?', 'cookery'),
            description: (
                <p>
                    {__('For just small additional amount of money, you will get access to all our current themes, new theme releases, theme updates, and email support with the', 'cookery')} <a href={cw_dashboard.theme_club_upgrade} target="_blank">{__('Theme Club.', 'cookery')}</a>
                </p>
            ),
        },
        {
            title: __('How can I upgrade to the Theme Club?', 'cookery'),
            description: (
                <p>
                    {__('To upgrade to the Theme Club, please log in to your ', 'cookery')}<a href={cw_dashboard.account} target="_blank">{__(`Blossom Themes' Dashboard`, 'cookery')}</a> {__('using the username and password created during the purchase. After you log in, click on ', 'cookery')}<b> {__('View Licenses', 'cookery')} {'>'} {__('View Upgrades', 'cookery')}</b> {__('and select the', 'cookery')} <b> {__('Theme Club Upgrade', 'cookery')}</b> {__('you want.', 'cookery')}
                </p>
            )
        },
        {
            title: __('Why is my theme not working well?', 'cookery'),
            description: (
                <>
                    <p>
                        {__('If your customizer is not loading properly or you are having issues with the theme, it might be due to the plugin conflict.', 'cookery')}
                    </p>
                    <p>
                        {__('To solve the issue, deactivate all the plugins first, except the ones recommended by the theme. Then, hard reload your website using ', 'cookery')}<b>{__(`"Ctrl+Shift+R"`, 'cookery')}</b> {__('on Windows. If the issues are fixed, start activating the plugins one by one, and reload and check your site each time. This will help you find out the plugin that is causing the problem.', 'cookery')}
                    </p>
                    <p>
                        {__(`If this didn't help, please`, 'cookery')} <a href={cw_dashboard.support} target="_blank">{__('contact us.', 'cookery')}</a>
                    </p>
                </>

            )
        },
        {
            title: __('How can I solve my issues quickly and get faster support?', 'cookery'),
            description: (
                <>
                    <p>
                        {__('Before you send us a support ticket for any issues, please make sure you have updated the theme to the latest version. We might have fixed the bug in the theme update.', 'cookery')}
                    </p>
                    <p>
                        {__(`When you submit the support ticket, please try to provide as much details as possible so that we can solve your problem faster. We recommend you to send us a screenshot(s) with issues explained and your website's address (URL).You can contact us `, 'cookery')}<a href={cw_dashboard.support} target="_blank">{__('here.', 'cookery')}</a>
                    </p>
                    <p>
                        {__('Also, you might experience a slower response time during the weekend, so please bear with us.', 'cookery')}
                    </p>
                </>
            )
        }
    ];

    const [openIndex, setOpenIndex] = useState(0);
    const [height, setHeight] = useState('0px');
    const contentRef = useRef(null);

    useEffect(() => {
        setHeight(openIndex !== -1 ? `${contentRef.current.scrollHeight}px` : '0px');
    }, [openIndex]);

    const toggleDescription = (index) => {
        setOpenIndex(index === openIndex ? -1 : index);
    };

    return (
        <>
            {faqContent.map((content, index) => (
                <div className="faq-item" key={index}>
                    <div className="faq-title" onClick={() => toggleDescription(index)}>
                        <h2>{content.title}</h2>
                        <span><Icon icon={openIndex === index ? 'minus' : 'plus'} /></span>
                    </div>
                    <div
                        className="faq-description"
                        ref={openIndex === index ? contentRef : null}
                        style={{
                            maxHeight: openIndex === index ? height : '0px',
                            overflow: 'hidden',
                            transition: 'max-height 0.5s ease',
                        }}
                    >
                        {typeof content.description === 'string' ? <p>{content.description}</p> : content.description}
                    </div>
                </div>
            ))}
        </>
    );
}

export default FAQ;
