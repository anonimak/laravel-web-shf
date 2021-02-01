<template>
    <Layout>
        <flash-msg />
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                Home Page
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
                                    v-model="tabIndexCfgHome"
                                    content-class="mt-3"
                                >
                                    <b-tab
                                        title="Slider"
                                        :title-link-class="linkClass(0)"
                                    >
                                        <div class="row">
                                            <div class="col-12">
                                                <b-button
                                                    class="mb-1 btn-sm"
                                                    variant="danger"
                                                    v-if="selected.length > 0"
                                                    @click="showMsgBoxDeleteAll"
                                                    >Delete Selected</b-button>
                                                <b-button
                                                    class="mb-1 btn-sm"
                                                    variant="secondary"
                                                    v-if="selected.length > 0"
                                                    @click="uncheckAll"
                                                    >Uncheck All</b-button>
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
                                                    @checked="selecting"
                                                />
                                            </div>
                                        </div>
                                    </b-tab>
                                    <b-tab
                                        title="Product"
                                        :title-link-class="linkClass(1)"
                                    >
                                        <div class="text-center">
                                            <b-spinner
                                                variant="primary"
                                                label="Text Centered"
                                            ></b-spinner>
                                        </div>
                                    </b-tab>
                                    <b-tab
                                        title="Galery"
                                        :title-link-class="linkClass(2)"
                                    >
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
import FlashMsg from "@/components/AdminComponents/Alert";
import Breadcrumb from "@/components/Breadcrumb";

export default {
    metaInfo: { title: "Page Home" },
    data() {
        return {
            tabIndexCfgHome: 0,
            selected:[]
        };
    },
    components: {
        Layout,
        CardSlider,
        FlashMsg,
        Breadcrumb,
        GridLayout: VueGridLayout.GridLayout,
        GridItem: VueGridLayout.GridItem
    },
    props: ["meta", "dataSlider", "flash", "breadcrumbItems", "_delete_url"],
    methods: {
        submitDelete(id) {
            this.$inertia.delete(route("admin.page.home.slider.delete", id));
        },
        submitDeleteAll(idx){
            this.$inertia.delete(route("admin.page.home.slider.delete-all", idx.join()));
        },
        selecting(id, status){
            if(!this.selected.includes(id) && status){
                this.selected.push(id)
            } else {
                this.selected = this.selected.filter( val => val != id );
            }
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
                        value && this.submitDelete(id);
                    })
                    .catch(err => {
                        // An error occurred
                    });
            }
        },
        showMsgBoxDeleteAll: function() {
                this.$bvModal
                    .msgBoxConfirm(
                        "Please confirm that you want to delete this checked slider.",
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
                        value && this.submitDeleteAll(this.selected);
                    })
                    .catch(err => {
                        // An error occurred
                    });
        },
        linkClass: function(idx) {
            if (this.tabIndexCfgHome === idx) {
                this.$ls.set("tabIndexCfgHome", idx);
            }
        },
        uncheckAll: function(){
            this.selected = []
        }
    },
    beforeMount() {
        if (this.$ls.get("tabIndexCfgHome")) {
            this.tabIndexCfgHome = this.$ls.get("tabIndexCfgHome");
        }
    }
};
</script>
