<template>
    <Layout>
        <alert v-if="flash" :flash="flash"/>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                {{ isButtonAdd ? "Add Slider" : "Home Page" }}
            </h1>
        </div>
        <breadcrumb :items="breadcrumbItems"/>
        <div class="row">
            <div class="col-12">
                <div>
                    <b-card>
                        <div>
                            <b-tabs v-model="tabIndex" content-class="mt-3">
                                <b-tab title="Slider">
                                    <div class="row">
                                        <div class="col-12">
                                            <inertia-link :href="route('admin.page.home.slider.add')" class="btn btn-primary my-2 float-right"> <i class="fas fa-plus"></i> Tambah</inertia-link>
                                        </div>
                                        <card-slider
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
import CardSlider from "@/components/AdminComponents/CardSlider";
import AddSlider from "@/components/AdminComponents/AddSlider";
import Alert from "@/components/AdminComponents/Alert";
import Breadcrumb from "@/components/Breadcrumb";

export default {
    metaInfo: { title: "Page Home" },
    data() {
        return {
            isButtonAdd: false,
            tabIndex: 1
        };
    },
    components: {
        Layout,
        CardSlider,
        AddSlider,
        Alert,
        Breadcrumb,
        GridLayout: VueGridLayout.GridLayout,
        GridItem: VueGridLayout.GridItem
    },
    props: ["meta", "dataSlider", "flash","breadcrumbItems"],
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
