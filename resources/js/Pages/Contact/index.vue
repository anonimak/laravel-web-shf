<template>
  <Layout>
    <section class="pt-5 pb-5">
      <div class="pb-5 container">
        <div data-aos="fade-down">
          <h2 class="text-center text-secondary">
            <strong>Sinarmas Hana Finance</strong>
          </h2>
          <hr class="border-secondary" />
          <p>
            PT Sinarmas Hana Finance adalah perusahaan Gabungan antara PT
            SinarMas Multiartha Tbk dengan Hana Financial Group yang berbasis di
            Korea Selatan.
          </p>
          <div class="row mt-4">
            <div class="col">
              <!-- <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253823.23071047236!2d106.75660637751643!3d-6.265310422166139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6202c35969aee5d9!2sPT%20SINARMAS%20HANA%20FINANCE%20ROXY%20SQUARE!5e0!3m2!1sid!2sid!4v1604978419416!5m2!1sid!2sid"
                width="100%"
                height="450"
                frameborder="0"
                style="border: 0"
                allowfullscreen=""
                aria-hidden="false"
                tabindex="0"
              ></iframe> -->

              <hana-map
                class="hana-map"
                :datamarkers="data_offices"
                :api-key="api_key"
              />
            </div>
          </div>
          <div class="row mt-4">
            <div class="mt-2 col-md-6 col-lg-6">
              <h4 class="text-primary">
                Jam Kerja
                <i class="fa fa-clock" aria-hidden="true"></i>
              </h4>
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td>Pusat</td>
                    <td>Senin - Jum'at : 8.00-17.00 WIB</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Cabang</td>
                    <td>Senin - Jum'at : 8.30-16.30 WIB Sabtu : 8.30-14.30</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="mt-2 col-md-6 col-lg-6">
              <div class="mb-5">
                <h4 class="text-primary">
                  Alamat Kantor Pusat
                  <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                </h4>
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td colspan="4" class="py-0">
                        Gedung Roxy Square Lt. 3 B 001 No. 02 Jl. Kyai Tapa
                        No.1, Tomang, Grogol Petamburan, Jakarta Barat 11440
                      </td>
                    </tr>
                    <tr>
                      <td class="py-0"><b>Email</b></td>
                      <td class="py-0">customercare@shf.co.id</td>
                      <td class="col-4"></td>
                    </tr>
                    <tr>
                      <td class="py-0"><b>Phone</b></td>
                      <td class="py-0">021-5695-4670</td>
                      <td class="col-4"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div v-for="item in offices" :key="item.id" class="mb-5">
                <h4 class="text-primary">
                  {{ item.name }}
                  <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                </h4>
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td colspan="4" class="py-0">{{ item.address }}</td>
                    </tr>
                    <tr>
                      <td class="py-0"><b>Phone</b></td>
                      <td class="py-0">{{ item.telp }}</td>
                      <td class="col-4"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </Layout>
</template>

<script>
import Layout from "@/Shared/Layout"; //import layouts
import HanaMap from "@/components/HanaMap";

export default {
  components: {
    Layout,
    HanaMap,
  },
  data() {
    return {
      offices: this.data_offices,
    };
  },
  props: ["meta", "data_offices", "api_key"],
};
</script>
<style lang="scss" scoped>
.hana-map {
  height: 400px;
}
</style>
