<template>
    <v-app :class="slide_class" style="max-height: 96vh" id="inspire">
        <v-main class="bg-grey-lighten-3">
            <v-container
                ><Carousel
                    :autoplay="this.$store.state.AutoPlay"
                    :wrap-around="true"
                    v-bind="settings"
                    :breakpoints="breakpoints"
                >
                    <Slide v-for="slide in 10" :key="slide">
                        <v-col style="min-width: 100%" cols="3">
                            <ProjectCard />
                        </v-col>
                    </Slide>

                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
                <Carousel
                    :wrap-around="true"
                    v-bind="settings"
                    :breakpoints="breakpoints"
                >
                    <Slide v-for="slide in 10" :key="slide">
                        <v-col style="min-width: 100%" cols="3">
                            <ProjectCard />
                        </v-col>
                    </Slide>

                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
            </v-container>
        </v-main>
    </v-app>
</template>
<script>
import { Carousel, Navigation, Slide } from "vue3-carousel";
import "vue3-carousel/dist/carousel.css";
import Layout from "../Layout.vue";
import ProjectCard from "../components/ProjectCard.vue";
export default {
    layout: Layout,
    components: { ProjectCard, Carousel, Slide, Navigation },
    props: {
        name: String,
        lastButton: String,
    },
    data() {
        return {
            settings: {
                itemsToShow: 1,
                snapAlign: "center",
            },
            // breakpoints are mobile first
            // any settings not specified will fallback to the carousel settings
            breakpoints: {
                700: {
                    itemsToShow: 3.5,
                    snapAlign: "center",
                },
                // 1024 and up
                1024: {
                    itemsToShow: 4,
                    snapAlign: "start",
                },
            },
            slide_class: "",
            layoutData: {
                navButtonCollow: 3,
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
<style>
.carousel {
    margin-top: 1rem;
    margin-left: 3rem;
    margin-right: 3rem;
}
.v-row {
    max-height: 33%;
}
</style>
