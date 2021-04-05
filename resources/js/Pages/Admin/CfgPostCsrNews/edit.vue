<template>
  <layout>
    <flash-msg @onSuccess="onSubmmitSuccess" />
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">
        {{ !isEditmode ? "Preview " : "Edit " }} CSR Post News
      </h1>
    </div>
    <breadcrumb :items="breadcrumbItems" />
    <div class="row">
      <div class="col-12">
        <b-card no-body>
          <b-card-header class="p-0">
            <div
              :class="!isEditImagemode ? '' : 'd-none'"
              @mouseenter="isHoverimg = true"
              @mouseleave="isHoverimg = false"
            >
              <b-overlay :show="isHoverimg" no-center variant="dark">
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
                <fullscreen ref="fullscreen" @change="fullscreenChange">
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
                style="top: 12px; right: 12px; z-index: 99"
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
                  :disabled="!isEditmode"
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
                id="input-group-description"
                label="Content News:"
                label-for="input-description"
              >
                <editor v-model="form.description" :editMode="isEditmode" />
              </b-form-group>
              <b-form-group label="Published">
                <b-form-radio-group v-model="form.status" name="status">
                  <b-form-radio :disabled="!isEditmode" value="1"
                    >Yes</b-form-radio
                  >
                  <b-form-radio :disabled="!isEditmode" value="0"
                    >No</b-form-radio
                  >
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
import FlashMsg from "@/components/AdminComponents/Alert";
import Breadcrumb from "@/components/Breadcrumb";
import vueDropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
// Import the editor
import Editor from "@/components/AdminComponents/Editor";

export default {
  components: {
    Layout,
    Breadcrumb,
    vueDropzone,
    FlashMsg,
    Editor,
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
        dictDefaultMessage: `<i class='fas fa-cloud-upload-alt'></i><br/>Drop your slider here <br/>`,
      },
      form: {
        id: null,
        title: "",
        description: "",
        status: 1,
        image: null,
      },
      isEditImagemode: false,
      isSubmitImagemode: false,
      isEditmode: false,
      isHoverimg: false,
      fullscreen: false,
      showTop: true,
    };
  },
  methods: {
    submit() {
      this.$inertia.put(this._update_url, this.form, {
        preserveScroll: true,
        resetOnSuccess: false,
      });
    },
    submitImage() {
      var formData = new FormData();
      formData.append("image", this.form.image);
      this.$inertia.post(this._updateImage_url, formData, {
        preserveScroll: true,
        resetOnSuccess: false,
      });
    },
    submitDelete() {
      this.$inertia.delete(this._delete_url);
    },
    onSubmmitSuccess(value) {
      if (value) {
        this.isEditImagemode = false;
        this.isEditmode = false;
        this.fillDataform();
      }
    },
    doEditmode: function () {
      this.isEditmode = !this.isEditmode;
      this.fillDataform();
    },
    doEditImagemode: function () {
      this.isEditImagemode = !this.isEditImagemode;
    },
    doCancelImagemode: function () {
      this.isEditImagemode = !this.isEditImagemode;
      this.$refs.myVueDropzone.removeAllFiles();
      this.form.image = this.dataPost.image;
      this.isSubmitImagemode = false;
    },
    dropzoneRemovedFile: function (file, error, xhr) {
      this.form.image = null;
      this.isSubmitImagemode = false;
    },
    dropzoneFileAdded: function (file) {
      this.form.image = file;
      this.isSubmitImagemode = true;
    },
    fillDataform: function () {
      this.form.id = this.dataPost.id;
      this.form.title = this.dataPost.title;
      this.form.description = this.dataPost.description;
      this.form.status = this.dataPost.status;
      this.form.image = this.dataPost.image;
    },
    toggleFullscreen: function () {
      this.$refs["fullscreen"].toggle(); // recommended
      // this.fullscreen = !this.fullscreen // deprecated
    },
    fullscreenChange: function (fullscreen) {
      this.fullscreen = fullscreen;
    },
    showMsgBoxDelete: function () {
      this.$bvModal
        .msgBoxConfirm("Please confirm that you want to delete this post.", {
          title: "Please Confirm",
          size: "sm",
          buttonSize: "sm",
          okVariant: "danger",
          okTitle: "YES",
          cancelTitle: "NO",
          footerClass: "p-2",
          hideHeaderClose: false,
          centered: true,
        })
        .then((value) => {
          value && this.submitDelete();
        })
        .catch((err) => {
          // An error occurred
        });
    },
  },
  props: [
    "_update_url",
    "_updateImage_url",
    "_delete_url",
    "_token",
    "errors",
    "breadcrumbItems",
    "flash",
    "dataPost",
  ],
  mounted: function () {
    this.fillDataform();
  },
};
</script>
<style scoped>
.vue-dropzone {
  border: none !important;
}

.dropzone {
  height: 100%;
  background: none;
  padding: 0 !important;
}

.dropzone .dz-preview {
  position: relative;
  display: inline-block;
  vertical-align: top;
  margin: 2px !important;
  min-height: 100px;
}
</style>
