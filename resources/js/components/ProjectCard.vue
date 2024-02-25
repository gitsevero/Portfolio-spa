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

            <v-btn
                :icon="show ? 'mdi-chevron-up' : 'mdi-chevron-down'"
                @click="show = !show"
            ></v-btn>
        </v-card-actions>

        <v-expand-transition>
            <div v-show="show">
                <v-divider></v-divider>

                <v-card-text>
                    I'm a thing. But, like most politicians, he promised more
                    than he could deliver. You won't have time for sleeping,
                    soldier, not with all the bed making you'll be doing. Then
                    we'll go with that data file! Hey, you add a one and two
                    zeros to that or we walk! You're going to do his laundry?
                    I've got to find a way to escape.
                </v-card-text>
            </div>
        </v-expand-transition>
    </v-card>
</template>

<script>
export default {
    data: () => ({
        show: false,
    }),
};
</script>
