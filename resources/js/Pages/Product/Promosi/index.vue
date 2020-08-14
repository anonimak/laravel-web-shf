<template>
  <Layout>
    <div>
      <!-- SlIDE PROMO -->
      <carousel
        :per-page="1"
        :paginationEnabled="false"
        :autoplay="true"
        :loop="true"
        :autoplayTimeout="3000"
      >
        <slide v-for="(item) in listBanner" :key="item.id">
          <div data-aos="fade-up" class="jumbotron p-5 jumbotron-fluid bg-info">
            <div class="container h-100">
              <div
                class="row justify-content-between align-items-center text-md-center text-lg-left"
              >
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-5">
                      <img class="img flex-auto shadow-lg border-0" :src="item.image" />
                    </div>
                    <div class="col-lg-7">
                      <h4 class="text-white">{{item.title}}</h4>
                      <p class="card-text text-light">
                        Tanggal Berlaku:
                        {{ item.start_date | moment("dddd, Do MMMM YYYY") }} -
                        {{ item.end_date | moment("dddd, Do MMMM YYYY") }}
                      </p>
                      <inertia-link
                        class="btn btn-lg btn-outline-light"
                        :href="route('promodetail', { id: item.id })"
                      >Read More</inertia-link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </slide>
      </carousel>
      <!-- END SLIDE PROMO -->
      <!-- wavy header -->

      <!-- Content -->
      <!-- <div data-aos="fade-down" class="container mt-4">
        <div class="pb-4 pt-4 text-center">
          <h2 class="text-secondary">Pembiayaan Umrah Sinarmas Hana Finance</h2>
          <p class="text-muted">
            Sinarmas Hana Finance sebagai salah satu perusahaan
            pembiayaan di Indonesia menawarkan kemudahan bagi para
            pelanggannya. Kami membantu mewujudkan mimpi Anda untuk
            menunaikan ibadah umrah. Sinarmas Hana Finance akan
            selalu hadir dengan menyediakan produk dan layanan yang
            beragam sesuai siklus kehidupan konsumen dan memberikan
            pengalaman yang menguntungkan untuk pelanggannya.
          </p>
        </div>
      </div>-->
      <!-- End Content -->
      <section class="pt-2 pb-5">
        <div class="container">
          <div data-aos="fade" class="pb-4 pt-4 text-center">
            <h2 class="m-auto text-secondary">Promo</h2>
          </div>
          <Search v-model="form.search" class="w-full max-w-md mx-3" @reset="reset" />

          <!-- Blog Cards -->
          <div class="row gap-y mb-4" data-aos="fade-down">
            <div class="col-md-6 col-lg-4" v-for="list in lists.data" :key="list.id">
              <CardPromo :itemImage="list" />
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
import CardPromo from "@/components/CardPromo";
import Search from "@/components/Search";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import mapValues from "lodash/mapValues";

export default {
  metaInfo: { title: "Promo" },
  components: {
    Layout,
    Pagination,
    CardPromo,
    Search,
  },
  props: ["lists", "filters", "listBanner"],

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
            "promo",
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
