<template>
    <Layout>
        <alert v-if="flash" :flash="flash" />
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                {{ isButtonAdd ? "Add Slider" : "Home Page" }}
            </h1>
        </div>
        <breadcrumb :items="breadcrumbItems" />
        <div class="row">
            <div class="col-12">
                <div>
                    <b-card>
                        <div>
                            <keep-alive>
                                <b-tabs
                                    v-model="tabIndex.index"
                                    content-class="mt-3"
                                >
                                    <b-tab title="Slider">
                                        <div class="row">
                                            <div class="col-12">
                                                <inertia-link
                                                    :href="
                                                        route(
                                                            'admin.page.home.slider.add'
                                                        )
                                                    "
                                                    class="btn btn-primary my-2 float-right"
                                                >
                                                    <i class="fas fa-plus"></i>
                                                    Tambah</inertia-link
                                                >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="col-lg-3 col-md-6"
                                                v-for="itemSlider in dataSlider"
                                                :key="itemSlider.id"
                                            >
                                                <card-slider
                                                    :sliderId="itemSlider.id"
                                                    :caption="
                                                        itemSlider.caption
                                                    "
                                                    :text="itemSlider.text"
                                                    :image="itemSlider.image"
                                                    :show="itemSlider.show"
                                                    @deleteClicked="
                                                        showMsgBoxDelete
                                                    "
                                                />
                                            </div>
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
                            </keep-alive>
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
import Alert from "@/components/AdminComponents/Alert";
import Breadcrumb from "@/components/Breadcrumb";

export default {
    metaInfo: { title: "Page Home" },
    remember: {
        data: ["tabIndex"],
        key: "page/home"
    },
    data() {
        return {
            isButtonAdd: false,
            tabIndex: {
                index: 0,
                test: "fasf"
            }
        };
    },
    components: {
        Layout,
        CardSlider,
        Alert,
        Breadcrumb,
        GridLayout: VueGridLayout.GridLayout,
        GridItem: VueGridLayout.GridItem
    },
    props: ["meta", "dataSlider", "flash", "breadcrumbItems", "_delete_url"],
    methods: {
        submitDelete(id) {
            this.$inertia.delete(route("admin.page.home.slider.delete", id));
        },
        add: function() {
            this.isButtonAdd = this.isButtonAdd ? false : true;
        },
        showMsgBoxDelete: function(state, id) {
            if (state) {
                this.$bvModal
                    .msgBoxConfirm(
                        "Please confirm that you want to delete this slider.",
                        {
                            title: "Please Confirm",
                            size: "sm",
                            buttonSize: "sm",
                            okVariant: "danger",
                            okTitle: "YES",
                            cancelTitle: "NO",
                            footerClass: "p-2",
                            hideHeaderClose: false,
                            centered: true
                        }
                    )
                    .then(value => {
                        this.submitDelete(id);
                    })
                    .catch(err => {
                        // An error occurred
                    });
            }
        }
    }
};
</script>
