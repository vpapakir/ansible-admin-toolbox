import domReady from '@wordpress/dom-ready';
import { createRoot } from '@wordpress/element';
import Dashboard from './pages';

import './scss/style.scss';

domReady(() => {
    const root = createRoot(document.getElementById('cw-dashboard'));
    root.render(
        <>
            <Dashboard />
        </>
    );
});