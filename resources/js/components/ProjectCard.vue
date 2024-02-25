<template>
    <v-card>
        <v-img
            src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
            height="125"
            class="bg-grey-lighten-2"
        ></v-img>
        <v-card-title class="text-h6"> Projeto teste </v-card-title>
        <v-card-subtitle>
            <v-icon alt="vue" icon="mdi-vuejs"></v-icon>
            <v-icon icon="mdi-language-html5"></v-icon>
            <v-icon icon="mdi-laravel"></v-icon>
            <v-icon icon="mdi-react"></v-icon>
        </v-card-subtitle>
        <v-card-actions>
            <v-btn
                class="mx-auto text-none"
                prepend-icon="mdi-github"
                append-icon="mdi-open-in-new"
                href="https://github.com/vuetifyjs/vuetify/"
                target="_blank"
                rel="noopener"
                color="grey-lighten-3"
                variant="flat"
                >Github</v-btn
            >

            <v-spacer></v-spacer>

            <ButtonSlide></ButtonSlide>
        </v-card-actions>
    </v-card>
</template>

<script>
import ButtonSlide from "./ButtonSlide.vue";
export default {
    components: { ButtonSlide },
    data: () => ({
        show: false,
    }),
};
</script>
