<template>
    <layout>
        <alert :flash="flash" />
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                {{ !isEditmode ? "Preview " : "Edit " }} Slider
            </h1>
        </div>
        <breadcrumb :items="breadcrumbItems" />
        <div class="row">
            <div class="col-12">
                <b-card no-body>
                    <b-card-header class="p-0">
                        <div class="float-right">
                            <!-- <b-button variant="outline-primary" v-b-tooltip.hover title="Fullscreen" @click="toggleFullscreen">
                                    <i class="fas fa-expand"></i>
                            </b-button> -->
                            <!-- <b-button variant="outline-primary" @click="previewFullscr">
                                    <i class="fas fa-cog"></i>
                            </b-button> -->
                            <!-- <b-button variant="outline-danger" 
                                v-b-tooltip.hover 
                                title="Edit Data"
                                :pressed="isEditmode"
                                @click="doEditmode">
                                    <i class="fas fa-edit"></i>
                            </b-button> -->
                        </div>
                        <div
                            :class="!isEditImagemode ? '' : 'd-none'"
                            @mouseenter="isHoverimg = true"
                            @mouseleave="isHoverimg = false"
                        >
                            <b-overlay
                                :show="isHoverimg"
                                no-center
                                variant="dark"
                            >
                                <template #overlay>
                                    <div
                                        class="float-right position-absolute"
                                        style="top: 12px; right: 12px"
                                    >
                                        <b-button
                                            variant="outline-primary"
                                            v-b-tooltip.hover
                                            title="Fullscreen"
                                            @click="toggleFullscreen"
                                        >
                                            <i class="fas fa-expand"></i>
                                        </b-button>
                                        <!-- <b-button variant="outline-primary" @click="previewFullscr">
                                            <i class="fas fa-cog"></i>
                                    </b-button> -->
                                        <b-button
                                            variant="outline-danger"
                                            v-b-tooltip.hover
                                            title="Change Image"
                                            :pressed="isEditImagemode"
                                            @click="doEditImagemode"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </b-button>
                                    </div>
                                </template>
                                <fullscreen
                                    ref="fullscreen"
                                    @change="fullscreenChange"
                                >
                                    <b-img
                                        rounded="top"
                                        :src="form.image"
                                        fluid-grow
                                        alt="Responsive image"
                                    >
                                    </b-img>
                                </fullscreen>
                            </b-overlay>
                        </div>
                        <div :class="!isEditImagemode ? 'd-none' : ''">
                            <div
                                class="float-right position-absolute"
                                style="top: 12px; right: 12px; z-index:99"
                            >
                                <b-button
                                    variant="primary"
                                    type="submit"
                                    v-b-tooltip.hover
                                    title="Upload"
                                    :class="!isSubmitImagemode ? 'd-none' : ''"
                                    @click.prevent="submitImage"
                                >
                                    <i class="fas fa-upload"></i>
                                </b-button>
                                <b-button
                                    variant="secondary"
                                    v-b-tooltip.hover
                                    title="Cancel Upload"
                                    @click="doCancelImagemode"
                                >
                                    <i class="fas fa-times"></i>
                                </b-button>
                            </div>
                            <vue-dropzone
                                :hidden="!isEditImagemode"
                                ref="myVueDropzone"
                                id="dropzone"
                                :options="dropzoneOptions"
                                @vdropzone-removed-file="dropzoneRemovedFile"
                                @vdropzone-file-added="dropzoneFileAdded"
                            >
                            </vue-dropzone>
                        </div>
                    </b-card-header>
                    <b-form id="formEdit" @submit.prevent="submit">
                        <b-card-body>
                            <b-form-group
                                id="input-group-caption"
                                label="Caption slider:"
                                label-for="input-caption"
                                :invalid-feedback="
                                    errors.caption ? errors.caption[0] : ''
                                "
                                :state="errors.caption ? false : null"
                            >
                                <b-form-input
                                    :disabled="!isEditmode"
                                    id="input-caption"
                                    type="text"
                                    name="caption"
                                    v-model="form.caption"
                                    placeholder="Input caption"
                                    :state="errors.caption ? false : null"
                                    trim
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group
                                id="input-group-text"
                                label="Text slider:"
                                label-for="input-text"
                            >
                                <b-form-textarea
                                    :disabled="!isEditmode"
                                    id="input-text"
                                    name="text"
                                    v-model="form.text"
                                    placeholder="Input text description..."
                                    rows="3"
                                    max-rows="6"
                                ></b-form-textarea>
                            </b-form-group>

                            <b-form-group
                                id="input-group-index"
                                label="Index:"
                                label-for="input-index"
                            >
                                <b-form-input
                                    :disabled="!isEditmode"
                                    id="input-index"
                                    type="number"
                                    name="index"
                                    v-model="form.index"
                                    placeholder="Input index"
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group label="Apakah akan di tampilkan ?">
                                <b-form-radio-group
                                    :disabled="!isEditmode"
                                    v-model="form.show"
                                    name="show"
                                >
                                    <b-form-radio value="1">Yes</b-form-radio>
                                    <b-form-radio value="0">No</b-form-radio>
                                </b-form-radio-group>
                            </b-form-group>
                        </b-card-body>
                        <b-card-footer>
                            <div class="col" v-if="isEditmode">
                                <b-button
                                    :disabled="!isEditmode"
                                    type="submit"
                                    variant="primary"
                                    >Save</b-button
                                >
                                <b-button
                                    :disabled="!isEditmode"
                                    type="button"
                                    variant="secondary"
                                    @click.prevent="doEditmode"
                                    >Cancel</b-button
                                >
                            </div>
                            <div class="col text-center" v-else>
                                <b-button
                                    :disabled="isEditmode"
                                    type="button"
                                    variant="secondary"
                                    :pressed="isEditmode"
                                    @click.prevent="doEditmode"
                                    >Edit</b-button
                                >
                                <b-button
                                    :disabled="isEditmode"
                                    type="button"
                                    variant="outline-danger"
                                    @click="showMsgBoxDelete"
                                    >delete</b-button
                                >
                            </div>
                        </b-card-footer>
                    </b-form>
                </b-card>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from "@/Shared/AdminLayout"; //import layouts
import Alert from "@/components/AdminComponents/Alert";
import Breadcrumb from "@/components/Breadcrumb";
import vueDropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";

export default {
    components: {
        Layout,
        Alert,
        Breadcrumb,
        vueDropzone
    },

    data() {
        return {
            dropzoneOptions: {
                autoProcessQueue: false,
                paramName: "image",
                maxFilesize: 1024,
                url: this._update_url,
                acceptedFiles: ".jpg,.jpeg,.png",
                maxFiles: 1,
                thumbnailWidth: null,
                thumbnailHeight: null,
                init: function() {
                    this.on("thumbnail", function(file, dataUrl) {
                        $(".dz-image")
                            .last()
                            .find("img")
                            .attr({ width: "100%", height: "100%" });
                    }),
                        this.on("file-added", function(file) {
                            console.log(file);
                        }),
                        this.on("success", function(file) {
                            $(".dz-image").css({
                                width: "100%",
                                height: "auto"
                            });
                        });
                },
                addRemoveLinks: true,
                dictDefaultMessage: `<i class='fas fa-cloud-upload-alt'></i><br/>Drop your slider here <br/>`
            },
            form: {
                id: null,
                caption: "",
                index: null,
                text: "",
                show: 1,
                image: null
            },
            isEditImagemode: false,
            isSubmitImagemode: false,
            isEditmode: false,
            isHoverimg: false,
            fullscreen: false
        };
    },
    methods: {
        submit() {
            this.$inertia.put(
                route("admin.page.home.slider.update", this.form.id),
                this.form
            );
        },
        submitImage() {
            var formData = new FormData();
            formData.append("image", this.form.image);
            this.$inertia.post(this._updateImage_url, formData);
        },
        submitDelete() {
            this.$inertia.delete(
                route("admin.page.home.slider.delete", this.form.id)
            );
        },
        doEditmode: function() {
            this.isEditmode = !this.isEditmode;
            this.fillDataform();
        },
        doEditImagemode: function() {
            this.isEditImagemode = !this.isEditImagemode;
        },
        doCancelImagemode: function() {
            this.isEditImagemode = !this.isEditImagemode;
            this.$refs.myVueDropzone.removeAllFiles();
            this.form.image = this.dataSlider.image;
            this.isSubmitImagemode = false;
        },
        dropzoneRemovedFile: function(file, error, xhr) {
            this.form.image = null;
            this.isSubmitImagemode = false;
        },
        dropzoneFileAdded: function(file) {
            this.form.image = file;
            this.isSubmitImagemode = true;
        },
        fillDataform: function() {
            this.form.id = this.dataSlider.id;
            this.form.caption = this.dataSlider.caption;
            this.form.index = this.dataSlider.index;
            this.form.text = this.dataSlider.text;
            this.form.show = this.dataSlider.show;
            this.form.image = this.dataSlider.image;
        },
        toggleFullscreen: function() {
            this.$refs["fullscreen"].toggle(); // recommended
            // this.fullscreen = !this.fullscreen // deprecated
        },
        fullscreenChange: function(fullscreen) {
            this.fullscreen = fullscreen;
        },
        showMsgBoxDelete: function() {
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
                    this.submitDelete();
                })
                .catch(err => {
                    // An error occurred
                });
        }
    },
    props: [
        "_update_url",
        "_updateImage_url",
        "_token",
        "errors",
        "breadcrumbItems",
        "flash",
        "dataSlider"
    ],
    mounted: function() {
        this.fillDataform();
    }
};
</script>
<style scoped>
.vue-dropzone {
    border: none !important;
}

.dropzone {
    height: 100%;
    background: none;
}

.dropzone .dz-preview .dz-image-preview {
    margin: 0 !important;
}
</style>
