<template>
  <Layout>
    <!-- SECTION TEAM MANAGEMENT -->
    <section class="pt-5 pb-5">
      <div class="pb-5 container">
        <div data-aos="fade-down">
          <h2 class="text-center text-secondary">
            <strong>PEMEGANG SAHAM</strong>
          </h2>
          <hr class="border-secondary" />
          <b-card no-body>
            <b-tabs pills card vertical nav-wrapper-class="w-20">
              <b-tab title="Hubungan Investor" active>
                <p>
                  PT Sinarmas Hana Finance adalah perusahaan pembiayaan yang
                  telah terdaftar di Otoritas Jasa Keuangan (OJK). PT Sinarmas
                  Hana Finance merupakan perusahaan pembiayaan dengan setoran
                  modal awal sebesar 150 Miliar. Dalam bagian ini, anda dapat
                  mendapatkan informasi terkini tentang informasi finansial dan
                  lainnya yang terkait dengan PT Sinarmas Hana Finance.
                </p>
              </b-tab>
              <b-tab title="Pemegang Saham Pengendali">
                <img
                  src="/Img/pemegang-saham/pemegang-saham.png"
                  alt=""
                  class="my-4"
                  width="100%"
                  srcset=""
                />
                <b-table striped hover :items="listsaham"></b-table>
              </b-tab>
            </b-tabs>
          </b-card>
        </div>
      </div>
    </section>
  </Layout>
</template>

<script>
import Layout from "@/Shared/Layout"; //import layouts

export default {
  components: {
    Layout,
  },

  data() {
    return {
      listsaham: [
        {
          no: 1,
          pemilik_saham: "Hana Capital Co. Ltd",
          persentase: "55 %",
        },
        {
          no: 2,
          pemilik_saham: "PT. Bank KEB Hana Indonesia",
          persentase: "30 %",
        },
        {
          no: 3,
          pemilik_saham: "PT. Sinarmas Multiartha Tbk",
          persentase: "15 %",
        },
      ],
    };
  },

  props: ["meta"],
};
</script>
