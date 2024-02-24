<template>
    <v-app :class="slide_class" style="max-height: 96vh" id="inspire">
        <v-main class="bg-grey-lighten-3">
            <v-container>
                <v-row>
                    <v-col cols="12" md="2">
                        <v-sheet rounded="lg" min-height="268">
                            <!--  -->
                        </v-sheet>
                    </v-col>

                    <v-col cols="12" md="8">
                        <v-sheet min-height="70vh" rounded="lg">
                            <!--  -->
                        </v-sheet>
                    </v-col>

                    <v-col cols="12" md="2">
                        <v-sheet rounded="lg" min-height="268">
                            <!--  -->
                        </v-sheet>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
import Layout from "../Layout.vue";

export default {
    layout: Layout,
    props: {
        name: String,
        lastButton: String,
    },
    data() {
        return {
            slide_class: "",
            layoutData: {
                navButtonCollow: 1,
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
