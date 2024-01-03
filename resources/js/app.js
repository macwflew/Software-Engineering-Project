import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// Import Google Fonts (Cabin, Lato, Roboto, and Titillium Web)
const link = document.createElement('link');
link.rel = 'stylesheet';
link.href = 'https://fonts.googleapis.com/css2?family=Cabin&family=Lato&family=Poppins&family=Roboto&family=Titillium+Web&display=swap';
document.head.appendChild(link);

// Preconnect to Google Fonts and gstatic for performance improvement
const preconnectGoogle = document.createElement('link');
preconnectGoogle.rel = 'preconnect';
preconnectGoogle.href = 'https://fonts.googleapis.com';
document.head.appendChild(preconnectGoogle);

const preconnectGstatic = document.createElement('link');
preconnectGstatic.rel = 'preconnect';
preconnectGstatic.href = 'https://fonts.gstatic.com';
preconnectGstatic.crossOrigin = 'anonymous';
document.head.appendChild(preconnectGstatic);


createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
