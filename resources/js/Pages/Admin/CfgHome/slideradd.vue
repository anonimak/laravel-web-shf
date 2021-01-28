<template>
    <layout>
        <alert v-if="flash" :flash="flash" />
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                Create New Slider
            </h1>
        </div>
        <breadcrumb :items="breadcrumbItems" />
        <div class="row">
            <div class="col-12">
                <b-card no-body>
                    <b-form id="form" @submit.prevent="submit">
                        <b-card-header class="p-0">
                            <vue-dropzone
                                ref="myVueDropzone"
                                id="dropzone"
                                :options="dropzoneOptions"
                                v-on:vdropzone-sending="dropzoneSendingEvent"
                                v-on:vdropzone-removed-file="
                                    dropzoneRemovedFile
                                "
                                v-on:vdropzone-file-added="dropzoneFileAdded"
                            >
                            </vue-dropzone>
                        </b-card-header>
                        <b-card-body>
                            <b-form-group
                                id="input-group-caption"
                                label-for="input-caption"
                                :invalid-feedback="
                                    errors.image ? errors.image[0] : ''
                                "
                                :state="errors.image ? false : null"
                            >
                            </b-form-group>
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
                                :invalid-feedback="
                                    errors.index ? errors.index[0] : ''
                                "
                                :state="errors.index ? false : null"
                            >
                                <b-form-input
                                    id="input-index"
                                    type="number"
                                    name="index"
                                    v-model.number="form.index"
                                    :state="errors.index ? false : null"
                                    placeholder="Input index"
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group label="Apakah akan di tampilkan ?">
                                <b-form-radio-group
                                    v-model="form.show"
                                    name="show"
                                >
                                    <b-form-radio value="1">Yes</b-form-radio>
                                    <b-form-radio value="0">No</b-form-radio>
                                </b-form-radio-group>
                            </b-form-group>

                            <b-button type="submit" variant="primary"
                                >Submit</b-button
                            >
                            <b-button type="reset" variant="danger"
                                >Reset</b-button
                            >
                        </b-card-body>
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
                url: "#",
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
                        this.on("success", function(file) {
                            $(".dz-image").css({
                                width: "100%",
                                height: "auto"
                            });
                        });
                },
                addRemoveLinks: true,
                dictDefaultMessage:
                    "<i class='fas fa-cloud-upload-alt'></i><br/>Drop your image here"
            },
            form: {
                caption: "",
                index: "",
                text: "",
                show: 1,
                image: null
            }
        };
    },
    methods: {
        submit() {
            var formData = new FormData();
            formData.append("caption", this.form.caption);
            formData.append("index", this.form.index);
            formData.append("text", this.form.text);
            formData.append("show", this.form.show);
            formData.append("image", this.form.image);
            this.$inertia.post(route("admin.page.home.slider.store"), formData);
        },
        dropzoneRemovedFile: function(file, error, xhr) {
            this.form.image = null;
        },
        dropzoneFileAdded: function(file) {
            this.form.image = file;
        },
        dropzoneSendingEvent: function(file, xhr, formData) {}
    },
    props: ["_token", "errors", "breadcrumbItems", "flash"]
};
</script>
<style scoped>
.vue-dropzone {
    border: none !important;
}

#dropzone {
    padding: 0 !important;
}

.dropzone .dz-preview .dz-image-preview {
    margin: 0 !important;
}
</style>
