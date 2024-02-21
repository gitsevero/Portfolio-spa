<template>
    <v-container>
        <slot />
    </v-container>
    <v-btn
        class="header-model"
        :color="lastColor"
        @click="active = !active"
        :icon="active ? 'mdi-chevron-double-down' : 'mdi-chevron-double-up'"
    >
    </v-btn>

    <v-layout class="overflow-visible">
        <v-bottom-navigation
            :active="active"
            v-model="value"
            :bg-color="color"
            mode="shift"
        >
            <v-btn @click="redirectionByClick(0)" ref="Button0">
                <v-icon>mdi-account-circle</v-icon>

                <span>About</span>
            </v-btn>

            <v-btn @click="redirectionByClick(1)" ref="Button1">
                <v-icon>mdi-home</v-icon>

                <span>Home</span>
            </v-btn>

            <v-btn @click="redirectionByClick(2)" ref="Button2">
                <v-icon>mdi-youtube</v-icon>

                <span>Youtube</span>
            </v-btn>

            <v-btn @click="redirectionByClick(3)" ref="Button3">
                <v-icon>mdi-github</v-icon>

                <span>Projetos</span>
            </v-btn>
        </v-bottom-navigation>
    </v-layout>
    <v-layout class="overflow-visible">
        <v-bottom-navigation
            id="box-slide-two"
            :active="!active"
            :style="!active ? 'margin-bottom: 1rem ; height: 10px;' : ''"
            v-model="value"
            mode="shift"
            bg-color="#ffffff00"
        >
            <v-btn disabled="true" class="v-btns"></v-btn>
            <v-btn disabled="true" class="v-btns"></v-btn>
            <v-btn disabled="true" class="v-btns"></v-btn>
            <v-btn disabled="true" class="v-btns"></v-btn>
        </v-bottom-navigation>
    </v-layout>
    <Link
        as="button"
        ref="Link0"
        href="/about"
        preserve-state
        preserve-scroll
        method="post"
        :data="{ lastButton: lastButton }"
    >
    </Link>
    <Link
        as="button"
        ref="Link1"
        href="/"
        method="post"
        :data="{ lastButton: lastButton }"
        preserve-state
        preserve-scroll
    >
    </Link>
    <Link
        as="button"
        ref="Link2"
        href="/Youtube"
        method="post"
        :data="{ lastButton: lastButton }"
        preserve-state
        preserve-scroll
    >
    </Link>
    <Link
        as="button"
        ref="Link3"
        href="/Portfolio"
        method="post"
        :data="{ lastButton: lastButton }"
        preserve-state
        preserve-scroll
    >
    </Link>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: { Link },
    data: () => ({
        active: true,
        clicked: true,
        lastButton: "",
        value: 1,
        lastColor: "teal",
        index: 1,
        quantidade_abas: 4,
    }),
    computed: {
        color() {
            switch (this.value) {
                case 0:
                    return "blue-grey";
                case 1:
                    return "teal";
                case 2:
                    return "red";
                case 3:
                    return "indigo";
                default:
                    return this.lastColor;
            }
        },
    },
    methods: {
        redirectionByClick(index) {
            if (this.clicked == true) {
                this.lastButton = this.$root.layoutData.navButtonCollow;
                setTimeout(() => {
                    this.clickLink(index);
                }, 100);
            }
        },

        clickLink(index) {
            this.$refs["Link" + index].$el.click();
        },

        detectaScrollDoMouse(callback) {
            let isScrolling = false;
            window.addEventListener("wheel", function (event) {
                if (!isScrolling) {
                    isScrolling = true;
                    setTimeout(function () {
                        callback(event.deltaY);
                        isScrolling = false;
                    }, 200);
                }
            });
        },
    },
    mounted() {
        this.value = this.$root.layoutData.navButtonCollow;
        this.quantidade_abas -= 1;
        var self = this; // Salva uma referência ao componente Vue

        document.addEventListener("DOMContentLoaded", function () {
            var conteudo = document.getElementById("app");
            var startX;

            conteudo.addEventListener("mousedown", function (event) {
                startX = event.clientX;
            });

            conteudo.addEventListener("mouseup", function (event) {
                var endX = event.clientX;
                var diffX = endX - startX;
                self.lastButton = self.$root.layoutData.navButtonCollow;
                self.index = self.value;
                if (diffX < -50) {
                    if (self.index < self.quantidade_abas) {
                        self.index += 1;
                        self.clicked = false;
                        setTimeout(() => {
                            self.clickLink(self.index);
                            self.$refs["Button" + self.index].$el.click();
                        }, 50);
                        setTimeout(() => {
                            self.clicked = true;
                        }, 100);
                    }
                } else if (diffX > 50) {
                    if (self.index > 0) {
                        self.index -= 1;
                        self.clicked = false;
                        setTimeout(() => {
                            self.clickLink(self.index);
                            self.$refs["Button" + self.index].$el.click();
                        }, 50);
                        setTimeout(() => {
                            self.clicked = true;
                        }, 100);
                    }
                }
            });
        });

        this.detectaScrollDoMouse((scrollY) => {
            this.lastButton = this.$root.layoutData.navButtonCollow;
            if (scrollY < 0) {
                this.index = this.value;
                if (this.index > 0) {
                    this.index -= 1;
                    this.clicked = false;
                    setTimeout(() => {
                        this.clickLink(this.index);
                        this.$refs["Button" + this.index].$el.click();
                    }, 50);
                    setTimeout(() => {
                        this.clicked = true;
                    }, 100);
                }
            } else if (scrollY > 0) {
                this.index = this.value;
                if (this.index < this.quantidade_abas) {
                    this.index += 1;
                    this.clicked = false;
                    setTimeout(() => {
                        this.clickLink(this.index);
                        this.$refs["Button" + this.index].$el.click();
                    }, 50);
                    setTimeout(() => {
                        this.clicked = true;
                    }, 100);
                }
            }
        });
    },

    watch: {
        value(newValue) {
            switch (newValue) {
                case 0:
                    this.lastColor = "blue-grey";
                    break;
                case 1:
                    this.lastColor = "teal";
                    break;
                case 2:
                    this.lastColor = "red";
                    break;
                case 3:
                    this.lastColor = "indigo";
                    break;
                default:
                    break;
            }
        },
    },
};
</script>

<style>
.header-model {
    right: 1rem;
    z-index: 9999;
    position: absolute;
    bottom: 2rem;
}

a {
    text-decoration: none;
    border: none;
    padding: 0;
    margin: 0;
    color: white;
    text-transform: none;
}

button.v-btn {
    text-transform: none;
}

.v-btn--stacked.v-btn--size-default {
    --v-btn-height: 100%;
}

button.v-btn.v-btn--stacked.v-theme--light.v-btn--density-default.v-btn--size-default.v-btn--variant-text.v-btns {
    margin-right: 10px;
    border-radius: 100px;
    border: 1px solid gray;
    border-radius: 1rem;
    background-color: white;
}

#box-slide-two {
    box-shadow: none;
}
</style>
