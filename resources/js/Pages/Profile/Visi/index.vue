<template>
  <Layout>
    <div>
      <!-- Section Visi -->
      <section class="pt-5 pb-5 bg-light">
        <div class="container">
          <div class="row row-grid align-items-center">
            <div class="col-md-6 order-md-1" data-aos="fade-down">
              <visi-svg class="m-auto d-block" />
            </div>
            <div class="col-md-6 order-md-2" data-aos="fade-left">
              <div class="pr-md-5">
                <h3>
                  <strong>VISI SINARMAS HANA FINANCE</strong>
                </h3>
                <p>
                  "Menjadikan Sinarmas Hana Finance sebagai Perusahaan Terdepan
                  dengan Pelayanan Kelas Dunia"
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section Misi -->
      <section class="pt-5 pb-5 bg-info">
        <div class="pb-3 pt-5 container">
          <div class="row row-grid align-items-center">
            <div class="col-md-6 order-md-2" data-aos="fade-down">
              <misi-svg class="m-auto d-block" />
            </div>
            <div class="col-md-6 order-md-1" data-aos="fade-right">
              <div class="pr-md-5">
                <h3>
                  <strong>MISI SINARMAS HANA FINANCE</strong>
                </h3>
                <ul class="list-unstyled">
                  <li class="py-2">
                    <div class="d-flex align-items-center">
                      <badge
                        type="success"
                        circle
                        class="mr-3"
                        icon="ni ni-settings-gear-65"
                      ></badge>
                      <h6 class="mb-0">
                        Mengembangkan Perusahaan sebagai Lembaga Pembiayaan yang
                        memiliki layanan prima bagi semua Nasabah.
                      </h6>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="d-flex align-items-center">
                      <badge
                        type="success"
                        circle
                        class="mr-3"
                        icon="ni ni-html5"
                      ></badge>
                      <h6 class="mb-0">
                        Mengawasi Perusahaan dengan selalu berpedoman pada Tata
                        Kelola Perusahaan yang Baik dan peraturan yang berlaku.
                      </h6>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="d-flex align-items-center">
                      <badge
                        type="success"
                        circle
                        class="mr-3"
                        icon="ni ni-satisfied"
                      ></badge>
                      <h6 class="mb-0">
                        Meningkatkan kepedulian dan tanggung jawab Perusahaan
                        pada lingkungan dan sosial.
                      </h6>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="d-flex align-items-center">
                      <badge
                        type="success"
                        circle
                        class="mr-3"
                        icon="ni ni-satisfied"
                      ></badge>
                      <h6 class="mb-0">
                        Senantiasa menciptakan lingkungan Perusahaan pada
                        kondisi terbaik dan dapat menjadi kebanggan untuk semua
                        karyawan.
                      </h6>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section Nilai Perusahaan -->
      <section class="pt-5 pb-5">
        <div class="pt-5 pb-5 container">
          <div class="text-center text-secondary" data-aos="fade-down">
            <h2>
              <strong>NILAI PERUSAHAAN</strong>
            </h2>
            <hr class="border-secondary" />
            <img src="/img/nilai-perusahaan.png" alt />
          </div>
        </div>
      </section>
    </div>
  </Layout>
</template>

<script>
import Layout from "@/Shared/Layout"; //import layouts
import Breadcrumb from "@/components/Breadcrumb";

import VisiSvg from "@/Shared/img/visiSVG";
import MisiSvg from "@/Shared/img/misiSVG";

export default {
  data() {
    return {
      breadcrumbItem: [
        {
          title: "Home",
          href: "home",
        },
        {
          title: "Profil",
          href: "about",
        },
        {
          title: "About",
          active: true,
        },
      ],
    };
  },
  components: {
    Layout,
    Breadcrumb,
    VisiSvg,
    MisiSvg,
  },
  props: ["meta"],
};
</script>
