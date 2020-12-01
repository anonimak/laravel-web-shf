
<template>
  <div>
    <div
      data-aos="flip-left"
      class="card-header border-0 pt-4 pb-4"
      :class="background"
    >
      <h3
        data-aos="fade-in"
        class="my-0 font-weight-normal mb-3"
        :class="titleColor"
      >
        {{ title }}
      </h3>
    </div>
    <div class="card-body">
      <ul data-aos="fade-up" class="list-unstyled mt-3 mb-4">
        <li>
          KTP Pemohon dan Suami / Istri
          <span v-if="reqLists.ktp" class="fa fa-check text-success"></span>
          <span v-else class="fa fa-times text-danger"></span>
        </li>
        <li>
          Kartu Keluarga & Surat Nikah
          <span v-if="reqLists.kk" class="fa fa-check text-success"></span>
          <span v-else class="fa fa-times text-danger"></span>
        </li>
        <li>
          Surat Keterangan Kerja
          <span v-if="reqLists.sk" class="fa fa-check text-success"></span>
          <span v-else class="fa fa-times text-danger"></span>
        </li>
        <li>
          Slip Gaji
          <span v-if="reqLists.slip" class="fa fa-check text-success"></span>
          <span v-else class="fa fa-times text-danger"></span>
        </li>
        <li>
          NPWP a/n Pemohon/SPT PPh 21 *)
          <span v-if="reqLists.npwp" class="fa fa-check text-success"></span>
          <span v-else class="fa fa-times text-danger"></span>
        </li>
        <li>
          Rekening Tabungan/Giro 3 bulan terakhir
          <span v-if="reqLists.rek" class="fa fa-check text-success"></span>
          <span v-else class="fa fa-times text-danger"></span>
        </li>
        <li>
          Laporan Keuangan 2 tahun terakhir
          <span
            v-if="reqLists.laporanKeu"
            class="fa fa-check text-success"
          ></span>
          <span v-else class="fa fa-times text-danger"></span>
        </li>
        <li>
          Copy Ijin Praktek
          <span
            v-if="reqLists.izinPraktek"
            class="fa fa-check text-success"
          ></span>
          <span v-else class="fa fa-times text-danger"></span>
        </li>
        <li>
          Bukti Kepemilikan Rumah
          <span v-if="reqLists.bkr" class="fa fa-check text-success"></span>
          <span v-else class="fa fa-times text-danger"></span>
        </li>
      </ul>
      <!-- <button type="button" class="btn" :class="btnBackground">Sign up for free</button> -->
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: String,
    titleColor: String,
    background: { type: String, default: "bg-dark" },
    btnBackground: { type: String, default: "btn-dark" },
    reqLists: {
      type: Object,
      default: {
        ktp: false,
        kk: false,
        sk: false,
        slip: false,
        npwp: false,
        rek: false,
        laporanKeu: false,
        izinPraktek: false,
        bkr: false,
      },
    },
  },
};
</script>

<style>
</style>