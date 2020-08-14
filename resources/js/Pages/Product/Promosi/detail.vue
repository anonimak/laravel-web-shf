<template>
  <Layout>
    <div>
      <!-- wavy header -->
      <!-- jumbotron with background image -->
      <div
        data-aos="fade-up"
        class="jumbotron jumbotron-sm jumbotron-fluid overlay overlay-black mb-0"
        style="background-size:cover;"
        :style="{ 'background-image': 'url(' + data.image + ')' }"
      >
        <div class="container text-center text-white h-100">
          <h1 data-aos="zoom-out-down" class="display-3">
            <strong>{{ data.title }}</strong>
          </h1>
          <p data-aos="zoom-out" class="text-white">
            Tanggal Berlaku :
            {{ data.start_date | moment("dddd, Do MMMM YYYY") }}
            -
            {{ data.end_date | moment("dddd, Do MMMM YYYY") }}
          </p>
        </div>
        <p class="bottom-align-text-absolute">
          <span class="d-block text-center text-white"></span>
        </p>
      </div>

      <Breadcrumb :items="breadcrumbItem"></Breadcrumb>

      <!-- Content -->
      <div data-aos="fade-down" class="container mt-4">
        <div class="pb-4 pt-4">
          <h2 class="text-secondary">Pinjaman Dana Sinarmas Hana Finance</h2>
          <p class="text-muted">{{ data.description }}</p>
        </div>
        <div>
          <div data-aos="fade" class="pb-4 pt-4 text-center"></div>
        </div>
      </div>
      <!-- End Content -->
    </div>
  </Layout>
</template>
<script>
import Layout from "@/Shared/Layout"; //import layouts
import CardRequirement from "@/components/CardRequirement";
import Breadcrumb from "@/components/Breadcrumb";

export default {
  metaInfo: { title: "Promo" },
  data() {
    return {
      breadcrumbItem: [
        {
          title: "Home",
          href: "home",
        },
        {
          title: "Promo",
          href: "promo",
        },
        {
          title: this.data.title,
          active: true,
        },
      ],
    };
  },
  components: {
    Layout,
    CardRequirement,
    Breadcrumb,
  },
  props: ["data"],
};
</script>
