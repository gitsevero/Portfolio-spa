<template>
    <v-card :class="slide_class">
        <p class="text-center">
            Olá {{ this.$store.state.name }} , seja bem about!
        </p>
    </v-card>
</template>
<script>
import Layout from "../Layout.vue";
export default {
    layout: Layout,
    props: {
        lastButton: String,
    },
    data() {
        return {
            slide_class: "",
            layoutData: {
                navButtonCollow: 0,
            },
        };
    },
    created() {
        this.$root.layoutData = this.layoutData;

        if (this.layoutData.navButtonCollow < this.lastButton) {
            this.slide_class = "slide-in-left";
        } else {
            this.slide_class = "slide-in-right";
        }
    },
};
</script>
