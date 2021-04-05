<template>
  <layout>
    <flash-msg />
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Create New CSR Post</h1>
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
                v-on:vdropzone-removed-file="dropzoneRemovedFile"
                v-on:vdropzone-file-added="dropzoneFileAdded"
              >
              </vue-dropzone>
            </b-card-header>
            <b-card-body>
              <b-form-group
                id="input-group-title"
                label-for="input-title"
                :invalid-feedback="errors.image ? errors.image[0] : ''"
                :state="errors.image ? false : null"
              >
              </b-form-group>
              <b-form-group
                id="input-group-title"
                label="Title News:"
                label-for="input-title"
                :invalid-feedback="errors.title ? errors.title[0] : ''"
                :state="errors.title ? false : null"
              >
                <b-form-input
                  id="input-title"
                  type="text"
                  name="title"
                  v-model="form.title"
                  placeholder="Input title"
                  :state="errors.title ? false : null"
                  trim
                ></b-form-input>
              </b-form-group>

              <b-form-group
                id="input-group-text"
                label="Content News:"
                label-for="input-text"
              >
                <editor v-model="form.description" />
              </b-form-group>

              <b-form-group label="Apakah akan di publish ?">
                <b-form-radio-group v-model="form.status" name="status">
                  <b-form-radio value="1">Yes</b-form-radio>
                  <b-form-radio value="0">No</b-form-radio>
                </b-form-radio-group>
              </b-form-group>

              <b-button type="submit" variant="primary">Submit</b-button>
              <b-button type="reset" variant="danger">Reset</b-button>
            </b-card-body>
          </b-form>
        </b-card>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "@/Shared/AdminLayout"; //import layouts
import FlashMsg from "@/components/AdminComponents/Alert";
import Breadcrumb from "@/components/Breadcrumb";
import vueDropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
// Import the editor
import Editor from "@/components/AdminComponents/Editor";

export default {
  props: ["_token", "errors", "breadcrumbItems", "flash"],
  components: {
    Layout,
    FlashMsg,
    Breadcrumb,
    vueDropzone,
    Editor,
  },
  data() {
    return {
      submitState: false,
      dropzoneOptions: {
        autoProcessQueue: false,
        paramName: "image",
        maxFilesize: 5024,
        url: "#",
        acceptedFiles: ".jpg,.jpeg,.png",
        maxFiles: 1,
        thumbnailWidth: null,
        thumbnailHeight: null,
        init: function () {
          this.on("thumbnail", function (file, dataUrl) {
            $(".dz-image")
              .last()
              .find("img")
              .attr({ width: "100%", height: "100%" });
          }),
            this.on("success", function (file) {
              $(".dz-image").css({
                width: "100%",
                height: "auto",
              });
            });
        },
        addRemoveLinks: true,
        dictDefaultMessage:
          "<i class='fas fa-cloud-upload-alt'></i><br/>Drop your image here",
      },
      form: {
        title: "",
        description: "",
        status: 1,
        image: null,
      },

      submitState: false,
    };
  },
  methods: {
    submit() {
      if (!this.submitState) {
        var formData = new FormData();
        formData.append("title", this.form.title);
        formData.append("description", this.form.description);
        formData.append("status", this.form.status);
        formData.append("image", this.form.image);
        this.submitState = true;
        this.$inertia.post(route("admin.post.csrnews.store"), formData);
      }
    },
    dropzoneRemovedFile: function (file, error, xhr) {
      this.form.image = null;
    },
    dropzoneFileAdded: function (file) {
      this.form.image = file;
    },
    dropzoneSendingEvent: function (file, xhr, formData) {},
  },
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
