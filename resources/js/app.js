// import "./bootstrap";

import { createApp, h, resolveComponent } from "vue";
import { createInertiaApp, Link, Head } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import Layout from "./Shared/Layout.vue";

const PAGE_TITLE = "App ";

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue');

        let page = (await pages[`./Pages/${name}.vue`]());
        // setup default layout if not setup


        if(page.default.layout === undefined) {
            page.default.layout = Layout;
        }

        return page;
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .component("Link", Link)
            .component("Head", Head)
            .use(plugin)
            .mount(el);
    },
    // setup title
    title: (title) => (title ? `${PAGE_TITLE} - ${title}` : `${PAGE_TITLE}`),
}).then(() => {}).catch(err => console.log(`Error: ${err}`));

 InertiaProgress.init({
    // The color of the progress bar.
    color: "#000",
    // Whether to include the default NProgress styles.
    includeCSS: true,
    // Whether the NProgress spinner will be shown.
    showSpinner: true,
});
