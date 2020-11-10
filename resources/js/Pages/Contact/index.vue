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
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253823.23071047236!2d106.75660637751643!3d-6.265310422166139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6202c35969aee5d9!2sPT%20SINARMAS%20HANA%20FINANCE%20ROXY%20SQUARE!5e0!3m2!1sid!2sid!4v1604978419416!5m2!1sid!2sid"
                width="100%"
                height="450"
                frameborder="0"
                style="border: 0"
                allowfullscreen=""
                aria-hidden="false"
                tabindex="0"
              ></iframe>
            </div>
          </div>
          <div class="row mt-4">
            <div class="mt-2 col-md-6 col-lg-6">
              <h4 class="text-primary">
                Jam Kerja
                <i class="fa fa-clock" aria-hidden="true"></i>
              </h4>
              <p>Pusat : Senin - Jum'at : 8.00-17.00 WIB</p>
              <p>Cabang : Senin - Jum'at : 8.30-16.30 WIB Sabtu : 8.30-14.30</p>
            </div>
            <div class="mt-2 col-md-6 col-lg-6">
              <h4 class="text-primary">
                Alamat Kantor Pusat
                <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
              </h4>
              <p>
                Gedung Roxy Square Lt. 3 B 001 No. 02 Jl. Kyai Tapa No.1,
                Tomang, Grogol Petamburan, Jakarta Barat 11440
              </p>
              <p>Email:info@shf.co.id</p>
              <p>Phone : 021-5695-4670</p>
            </div>
          </div>
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
  props: ["meta"],
};
</script>
