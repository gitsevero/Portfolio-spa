import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";

import "vuetify/styles";
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";
import "@mdi/font/css/materialdesignicons.css";
import store from "./store";

const vuetify = createVuetify({
    components,
    directives,
});

createInertiaApp({
    resolve: (name) => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(store)
            .use(plugin)
            .use(vuetify)
            .mount(el);
    },
});
