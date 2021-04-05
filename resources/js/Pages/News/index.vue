<template>
  <Layout>
    <div>
      <!-- END SLIDE PROMO -->
      <section class="pt-2 pb-5">
        <div class="container">
          <div data-aos="fade" class="pb-4 pt-4 text-center">
            <h2 class="m-auto text-secondary">Berita</h2>
          </div>
          <Search
            v-model="form.search"
            class="w-full max-w-md mx-3"
            @reset="reset"
          />

          <!-- Blog Cards -->
          <div class="row gap-y mb-4" data-aos="fade-down">
            <div
              class="col-md-6 col-lg-6"
              v-for="item in lists.data"
              :key="item.id"
            >
              <card-news
                :itemid="item.id"
                :title="item.title"
                :date="item.created_at"
                :description="item.description"
                :image="item.image"
              />
            </div>
          </div>
          <!-- End Blog Cards -->
          <Pagination :links="lists.links" />
        </div>
      </section>
    </div>
  </Layout>
</template>
<script>
import Layout from "@/Shared/Layout"; //import layouts
import Pagination from "@/components/Pagination";
import CardNews from "@/components/CardNews";
import Search from "@/components/Search";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import mapValues from "lodash/mapValues";

export default {
  metaInfo: { title: "News" },
  components: {
    Layout,
    Pagination,
    CardNews,
    Search,
  },
  props: ["lists", "filters"],

  data() {
    return {
      form: {
        search: this.filters.search,
      },
    };
  },
  watch: {
    form: {
      handler: throttle(function () {
        let query = pickBy(this.form);
        this.$inertia.replace(
          this.route(
            "profile.news",
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null);
    },
  },
};
</script>
