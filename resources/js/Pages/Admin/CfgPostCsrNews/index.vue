<template>
  <Layout :userinfo="userinfo">
    <flash-msg />
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Page Post CSR News</h1>
    </div>
    <breadcrumb :items="breadcrumbItems" />
    <div class="row">
      <div class="col-12">
        <div>
          <b-card>
            <keep-alive>
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-12">
                      <inertia-link
                        :href="route('admin.post.csrnews.add')"
                        class="btn btn-primary my-2 float-right"
                      >
                        <i class="fas fa-plus"></i>
                        Tambah</inertia-link
                      >
                    </div>
                  </div>
                  <div class="col-lg-3 col-xs-12 mt-3">
                    <search v-model="form.search" @reset="reset" />
                  </div>
                  <!-- table news -->
                  <table class="table table-responsive mt-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title News</th>
                        <th scope="col">Image</th>
                        <th scope="col">Publish</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Date Updated</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(item, index) in tableNews.data"
                        :key="item.id"
                      >
                        <th scope="row">{{ index + 1 }}</th>
                        <td>{{ item.title }}</td>
                        <td>
                          <b-avatar
                            rounded
                            :src="item.image"
                            size="45px"
                          ></b-avatar>
                        </td>
                        <td>
                          <b-badge :class="item.status == 1 && 'bg-success'">{{
                            item.status == 1 ? "Published" : "Not Publish"
                          }}</b-badge>
                        </td>
                        <td>
                          {{ item.created_at | moment("Do/MM/YYYY - H:mm:ss") }}
                        </td>
                        <td>
                          {{ item.updated_at | moment("Do/MM/YYYY - H:mm:ss") }}
                        </td>
                        <td>
                          <b-button-group size="sm">
                            <inertia-link
                              :href="
                                route('admin.post.csrnews.detail', item.id)
                              "
                              class="btn btn-primary"
                              >Detail</inertia-link
                            >
                            <b-button
                              href="#"
                              variant="danger"
                              @click="showMsgBoxDelete(item.id)"
                              >Delete</b-button
                            >
                          </b-button-group>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <Pagination :links="tableNews.links" />
                </div>
              </div>
            </keep-alive>
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
import Pagination from "@/components/Pagination";
import Search from "@/components/Search";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import mapValues from "lodash/mapValues";

export default {
  metaInfo: { title: "Page Post News" },
  props: [
    "meta",
    "tableNews",
    "flash",
    "breadcrumbItems",
    "_delete_url",
    "userinfo",
    "filters",
  ],
  data() {
    return {
      tabIndexCfgHome: 0,
      form: {
        search: this.filters.search,
      },
      isCheched: false,
    };
  },
  components: {
    Layout,
    CardSlider,
    FlashMsg,
    Breadcrumb,
    GridLayout: VueGridLayout.GridLayout,
    GridItem: VueGridLayout.GridItem,
    Pagination,
    Search,
  },
  methods: {
    submitDelete(id) {
      this.$inertia.delete(route("admin.post.csrnews.delete", id));
    },
    submitDeleteAll(idx) {
      this.$inertia.delete(route("admin.post.csrnews.delete-all", idx.join()));
    },
    showMsgBoxDelete: function (id) {
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
          value && this.submitDelete(id);
        })
        .catch((err) => {
          // An error occurred
        });
    },
    showMsgBoxDeleteAll: function () {
      this.$bvModal
        .msgBoxConfirm(
          "Please confirm that you want to delete this checked post.",
          {
            title: "Please Confirm",
            size: "sm",
            buttonSize: "sm",
            okVariant: "danger",
            okTitle: "YES",
            cancelTitle: "NO",
            footerClass: "p-2",
            hideHeaderClose: false,
            centered: true,
          }
        )
        .then((value) => {
          // value && this.submitDeleteAll(this.selected);
        })
        .catch((err) => {
          // An error occurred
        });
    },
    linkClass: function (idx) {
      if (this.tabIndexCfgHome === idx) {
        this.$ls.set("tabIndexCfgHome", idx);
      }
    },
    uncheckAll: function () {
      // this.selected = []
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
  },
  watch: {
    form: {
      handler: throttle(function () {
        let query = pickBy(this.form);
        this.$inertia.replace(
          this.route(
            "admin.post.csrnews.index",
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
};
</script>
