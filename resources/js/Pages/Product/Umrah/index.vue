<template>
  <Layout>
    <div>
      <!-- wavy header -->
      <!-- jumbotron with background image -->
      <div
        data-aos="fade-up"
        class="jumbotron jumbotron-lg jumbotron-fluid overlay overlay-black mb-0"
        style="background-size:cover; background-image:url(/img/demo/7.jpg);"
      >
        <div class="container text-center text-white h-100">
          <h3 data-aos="zoom-out-down">Pembiayaan</h3>
          <h1 data-aos="zoom-out-down" class="display-3">
            <strong>Umrah</strong>
          </h1>
          <p
            data-aos="zoom-out"
            class="text-white"
          >Pembiayaan untuk membantu mewujudkan impian Anda beribadah umrah, dengan jangka waktu pembiayaan mulai 12 bulan hingga 36 bulan dengan suku bunga tetap.</p>
        </div>
        <p class="bottom-align-text-absolute">
          <span class="d-block text-center text-white"></span>
        </p>
      </div>

      <div data-aos="fade-up" class="jumbotron p-5 jumbotron-fluid bg-warning">
        <div class="container h-100">
          <div class="row justify-content-between align-items-center text-md-center text-lg-left">
            <div class="col-lg-9">
              <h5 class="font-weight-light text-dark">
                Free Bootstrap 4.1.3
                <strong>UI Kit</strong> with
                <strong>
                  <i class="fab fa-sass fa-2x"></i>
                </strong> for rapid development
              </h5>
            </div>
            <div class="col-lg-3 text-md-center text-lg-right mt-4 mb-4">
              <a href="#" class="btn btn-lg btn-outline-dark">Call to action</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Content -->
      <div data-aos="fade-down" class="container mt-4">
        <div class="pb-4 pt-4 text-center">
          <h2 class="text-secondary">Pembiayaan Umrah Sinarmas Hana Finance</h2>
          <p class="text-muted">
            Sinarmas Hana Finance sebagai salah satu perusahaan pembiayaan di Indonesia menawarkan kemudahan bagi para pelanggannya. Kami membantu mewujudkan mimpi Anda untuk menunaikan ibadah umrah.
            Sinarmas Hana Finance akan selalu hadir dengan menyediakan produk dan layanan yang beragam sesuai siklus kehidupan konsumen dan memberikan pengalaman yang menguntungkan untuk pelanggannya.
          </p>
        </div>
        <div>
          <div data-aos="fade" class="pb-4 pt-4 text-center">
            <h2 class="m-auto text-secondary">Persyaratan</h2>
          </div>
        </div>
      </div>
      <!-- End Content -->
    </div>
  </Layout>
</template>
<script>
import Layout from "@/Shared/Layout"; //import layouts
import CardRequirement from "@/components/CardRequirement";

export default {
  metaInfo: { title: "Produk Umrah" },
  data() {
    return {};
  },
  components: {
    Layout,
  },
};
</script>
