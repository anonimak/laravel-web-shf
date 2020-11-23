<template>
    <Layout>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                {{ isButtonAdd ? "Add Slider" : "Home Page" }}
            </h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div>
                    <b-card>
                        <div>
                            <b-tabs v-model="tabIndex" content-class="mt-3">
                                <b-tab title="Slider">
                                    <div class="row">
                                        <div class="col-12">
                                            <b-button
                                                :variant="
                                                    isButtonAdd
                                                        ? 'danger'
                                                        : 'primary'
                                                "
                                                class="my-2 float-right"
                                                @click="add()"
                                            >
                                                {{
                                                    isButtonAdd
                                                        ? "Kembali"
                                                        : "Tambah"
                                                }}</b-button
                                            >
                                            <!-- <inertia-link :href="route('admin.page.home.add')" class="btn btn-primary my-2 float-right"> <i class="fas fa-plus"></i> Tambah</inertia-link> -->
                                        </div>
                                        <read-slider
                                            :dataSlider="dataSlider"
                                            :class="isButtonAdd ? 'd-none' : ''"
                                        />
                                        <add-slider
                                            :class="isButtonAdd ? '' : 'd-none'"
                                        ></add-slider>
                                    </div>
                                </b-tab>
                                <b-tab title="Product">
                                    <div class="text-center">
                                        <b-spinner
                                            variant="primary"
                                            label="Text Centered"
                                        ></b-spinner>
                                    </div>
                                </b-tab>
                                <b-tab title="Galery">
                                    <div class="text-center">
                                        <b-spinner
                                            variant="primary"
                                            label="Text Centered"
                                        ></b-spinner>
                                    </div>
                                </b-tab>
                            </b-tabs>
                        </div>
                    </b-card>
                </div>
            </div>
        </div>
    </Layout>
</template>
<script>
import Layout from "@/Shared/AdminLayout"; //import layouts
import VueGridLayout from "vue-grid-layout";
import ReadSlider from "@/components/AdminComponents/ReadSlider";
import AddSlider from "@/components/AdminComponents/AddSlider";

export default {
    metaInfo: { title: "Page Home" },
    data() {
        return {
            isButtonAdd: false,
            layout: [
                { x: 0, y: 0, w: 1, h: 2, i: "Index" },
                { x: 0, y: 2, w: 1, h: 2, i: "1" },
                { x: 0, y: 4, w: 1, h: 2, i: "2" },
                { x: 0, y: 6, w: 1, h: 2, i: "3" },
                { x: 0, y: 8, w: 1, h: 2, i: "4" },
                { x: 0, y: 10, w: 1, h: 2, i: "5" },
                { x: 0, y: 12, w: 1, h: 2, i: "6" }
            ],
            tabIndex: 1
        };
    },
    components: {
        Layout,
        ReadSlider,
        AddSlider,
        GridLayout: VueGridLayout.GridLayout,
        GridItem: VueGridLayout.GridItem
    },
    props: ["meta", "dataSlider"],
    methods: {
        test: function() {
            alert("oke");
        },
        add: function() {
            this.isButtonAdd = this.isButtonAdd ? false : true;
        }
    }
};
</script>
