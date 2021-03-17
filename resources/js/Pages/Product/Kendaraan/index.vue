<template>
  <Layout>
    <div>
      <!-- wavy header -->
      <!-- jumbotron with background image -->
      <div
        data-aos="fade-up"
        class="jumbotron jumbotron-lg jumbotron-fluid overlay overlay-black mb-0"
        style="background-size: cover; background-image: url(/img/demo/1.jpg)"
      >
        <div class="container text-center text-white h-100">
          <h3 data-aos="zoom-out-down">Pembiayaan</h3>
          <h1 data-aos="zoom-out-down" class="display-3">
            <strong>Kendaraan Bermotor</strong>
          </h1>
          <p data-aos="zoom-out" class="text-white">
            Pembiayaan untuk pembelian kendaraan bermotor roda empat baru dan
            bekas yang berasal dari dealer/showroom/penjual perorangan, baik
            untuk keperluan pribadi maupun penunjang usaha, dengan jangka waktu
            pembiayaan mulai 1 hingga 4 tahun dan suku bunga tetap.
          </p>
        </div>
        <p class="bottom-align-text-absolute">
          <span class="d-block text-center text-white"></span>
        </p>
      </div>

      <div data-aos="fade-up" class="jumbotron p-5 jumbotron-fluid bg-warning">
        <div class="container h-100">
          <div
            class="row justify-content-between align-items-center text-md-center text-lg-left"
          >
            <div class="col-lg-9">
              <h5 class="font-weight-light text-dark">
                Simulasi Budget Total DP & Angsuran
              </h5>
            </div>
            <div class="col-lg-3 text-md-center text-lg-right mt-4 mb-4">
              <a href="#" class="btn btn-lg btn-outline-dark">Klik di sini</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Content -->
      <div data-aos="fade-down" class="container mt-4">
        <div class="pb-4 pt-4 text-center">
          <h2 class="text-secondary">
            Kredit Kendaraan Bermotor Sinarmas Hana Finance
          </h2>
          <p class="text-muted">
            Sinarmas Hana Finance sebagai salah satu perusahaan pembiayaan di
            Indonesia menawarkan kemudahan bagi para pelanggannya untuk memiliki
            kendaraan (mobil baru dan bekas) berbagai merek dengan persyaratan
            kredit yang mudah, tenor yang panjang, bunga pembiayaan yang
            bersaing serta sistem penyimpanan BPKB yang aman. Berikut
            perhitungan simulasi kredit mobil bekas yang bisa Anda coba.
            Sinarmas Hana Finance akan selalu hadir dengan menyediakan produk
            dan layanan yang beragam sesuai siklus kehidupan konsumen dan
            memberikan pengalaman yang menguntungkan untuk pelanggannya.
          </p>
        </div>
        <div>
          <div data-aos="fade" class="pb-4 pt-4 text-center">
            <h2 class="m-auto text-secondary">Persyaratan</h2>
          </div>
          <!-- pricing -->

          <div
            data-aos="fade-up"
            class="card-deck card-pricing text-center mb-4"
          >
            <div
              class="card border-0 shadow"
              v-for="item in reqItems"
              :key="item.title"
            >
              <CardRequirement
                :title="item.title"
                :titleColor="item.titleColor"
                :background="item.background"
                :btnBackground="item.btnBackground"
                :reqLists="item.reqLists"
              />
            </div>
          </div>
          <!-- <b-table striped hover :items="items"></b-table> -->
        </div>
      </div>
      <!-- End Content -->

      <!-- Section Produk Pembiayaan -->
      <section class="pt-5 pb-5 bg-white">
        <div class="container">
          <div class="row row-grid align-items-center">
            <div class="col text-center" data-aos="fade-down">
              <h3>
                <strong>Ajukan sekarang</strong>
              </h3>
              <b-button
                class="btn text-white bg-primary"
                v-b-modal.modal-pengajuan
                >Pengajuan Online</b-button
              >
            </div>
          </div>
        </div>
      </section>

      <!-- modal -->
      <modal-form-pengajuan :databranch="databranch"/>
      <!-- alert -->
      <flash-msg />
    </div>
  </Layout>
</template>
<script>
import Layout from "@/Shared/Layout"; //import layouts
import CardRequirement from "@/components/CardRequirement";

import VehicleSvg from "@/Shared/img/vehicleSVG";

import ModalFormPengajuan from "@/components/ModalFormPengajuan";
import FlashMsg from "@/components/Alert"; //alert

export default {
  components: {
    Layout,
    CardRequirement,
    VehicleSvg,
    ModalFormPengajuan,
    FlashMsg
  },
  metaInfo: { title: "Produk Kendaraan" },
  props:["data_offices"],
  data() {
    return {
      items: [
        { age: 40, first_name: "Dickerson", last_name: "Macdonald" },
        { age: 21, first_name: "Larsen", last_name: "Shaw" },
        { age: 89, first_name: "Geneva", last_name: "Wilson" },
        { age: 38, first_name: "Jami", last_name: "Carney" },
      ],
      databranch: this.data_offices,
      reqItems: [
        {
          title: "Karyawan",
          titleColor: "text-white",
          background: "bg-dark",
          btnBackground: "btn-dark",
          reqLists: {
            ktp: true,
            kk: true,
            sk: true,
            slip: true,
            npwp: true,
            rek: true,
            laporanKeu: false,
            izinPraktek: false,
            bkr: true,
          },
        },
        {
          title: "Wiraswasta",
          background: "bg-warning",
          btnBackground: "btn-warning",
          reqLists: {
            ktp: true,
            kk: true,
            sk: true,
            slip: true,
            npwp: true,
            rek: true,
            laporanKeu: true,
            izinPraktek: false,
            bkr: true,
          },
        },
        {
          title: "Profesional",
          background: "bg-secondary",
          titleColor: "text-white",
          btnBackground: "btn-secondary",
          reqLists: {
            ktp: true,
            kk: true,
            sk: true,
            slip: true,
            npwp: true,
            rek: true,
            laporanKeu: false,
            izinPraktek: true,
            bkr: true,
          },
        },
      ],
    };
  },
};
</script>
