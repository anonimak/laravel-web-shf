<template>
  <Layout>
    <div>
      <!-- Carousel -->
      <b-carousel
        id="carousel-1"
        :interval="__config.slider.interval"
        :controls="__config.slider.controls"
        :indicators="__config.slider.indicators"
        :img-width="__config.slider.width"
        :img-height="__config.slider.height"
        fade
        background="#ababab"
        style="text-shadow: 1px 1px 2px #333"
      >
        <b-carousel-slide
          v-for="slide in dataSlider"
          :key="slide.id"
          :caption="slide.caption"
          :text="slide.text"
          :img-src="slide.image"
        ></b-carousel-slide>
      </b-carousel>

      <!-- Section Product -->
      <section>
        <div class="pt-4 pb-4 bg-info" data-aos="fade-down">
          <div class="container card-pricing text-center">
            <card-product
              v-for="item in bannerProducts"
              :key="item.id"
              :imgSrc="item.imgSrc"
              :title="item.title"
              :link="item.link"
            />
          </div>
        </div>
      </section>

      <!-- Section Simulasi Budget -->
      <section class="pt-5 pb-5 bg-info">
        <div class="pb-3 pt-5 container">
          <div class="row row-grid align-items-center">
            <div class="col-md-6 order-md-1" data-aos="fade-down">
              <calculator-svg class="m-auto d-block" width="100%" />
            </div>
            <div class="col-md-6 order-md-2" data-aos="fade-right">
              <div class="pr-md-5">
                <h3>
                  Simulasi
                  <strong>BUDGET</strong>
                </h3>
                <p>
                  Simulasi Pembiayaan Sinarmas Hana Finance akan memudahkan
                  mencari perhitungan angsuran sesuai budget Anda.
                </p>
                <ul class="list-unstyled">
                  <li class="py-2">
                    <div class="d-flex align-items-center">
                      <b-badge
                        type="success"
                        circle
                        class="mr-3"
                        icon="ni ni-settings-gear-65"
                      ></b-badge>
                      <h6 class="mb-0">
                        Tepat perhitungannya, Cermat perencanaannya.
                      </h6>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="d-flex align-items-center">
                      <b-badge
                        type="success"
                        circle
                        class="mr-3"
                        icon="ni ni-html5"
                      ></b-badge>
                      <h6 class="mb-0">
                        Simulasi Kredit untuk menghitung Total Down Payment (DP)
                        dan Angsuran.
                      </h6>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="d-flex align-items-center">
                      <b-badge
                        type="success"
                        circle
                        class="mr-3"
                        icon="ni ni-satisfied"
                      ></b-badge>
                      <h6 class="mb-0">
                        Simulasi Budget Total DP untuk mengetahui angsuran
                        berdasarkan Budget Total DP Anda
                      </h6>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="d-flex align-items-center">
                      <b-badge
                        type="success"
                        circle
                        class="mr-3"
                        icon="ni ni-satisfied"
                      ></b-badge>
                      <h6 class="mb-0">
                        Simulasi Budget Angsuran untuk mengetahui Total DP yang
                        harus disiapkan
                      </h6>
                    </div>
                  </li>
                </ul>
                <inertia-link
                  class="btn btn-outline-dark"
                  :href="route('simulasikredit')"
                  >Simulasi</inertia-link
                >
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section Sinarmas Hana finance -->
      <section class="pt-5 pb-5">
        <div class="pb-3 pt-5 container">
          <div class="row row-grid align-items-center">
            <div class="col-md-6 order-md-2" data-aos="fade-down">
              <profile-svg class="m-auto d-block" width="100%" />
            </div>
            <div class="col-md-6 order-md-1" data-aos="fade-right">
              <div class="pr-md-5">
                <h3>
                  <strong>Sinarmas Hana Finance</strong>
                </h3>
                <p>
                  <strong>Sinarmas Hana Finance</strong> adalah perusahaan joint
                  venture antara PT Sinar Mas Multiartha Tbk dengan Hana
                  Financial Group yang berbasis di Korea Selatan. Perusahaan
                  mendapatkan surat izin usaha dari Otoritas Jasa Keuangan (OJK)
                  pada tanggal 18 November 2015 dan telah menjalankan bisnisnya
                  di bidang pembiayaan kendaraan roda 4 (Mobil).
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section Produk Pembiayaan -->
      <section class="pt-5 pb-5 bg-light">
        <div class="container">
          <div class="row row-grid align-items-center">
            <div class="col-md-6 order-md-1" data-aos="fade-down">
              <vehicle-svg class="m-auto d-block" width="100%" />
            </div>
            <div class="col-md-6 order-md-2" data-aos="fade-right">
              <div class="pr-md-5">
                <h3>
                  <strong
                    >Produk Pembiayaan <br />
                    Sinarmas Hana Finance</strong
                  >
                </h3>
                <b-button
                  class="btn text-white bg-primary"
                  v-b-modal.modal-pengajuan
                  >Pengajuan Online</b-button
                >
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section Berita -->
      <section class="pt-5 pb-5" data-aos="fade-down">
        <div class="container">
          <!-- title section -->
          <div class="pt-3">
            <h3 class="mb-0">
              <strong>Berita</strong>
            </h3>
            <hr class="border-secondary" />
          </div>
          <!-- Featured -->
          <div class="row">
            <div class="col">
              <div class="card-deck">
                <card-news
                  class="d-none d-md-block"
                  v-for="item in listNews"
                  :key="item.id"
                  :itemid="item.id"
                  :title="item.title"
                  :date="item.created_at"
                  :description="item.description"
                  :category="item.category"
                  :image="item.image"
                />
              </div>
              <media-news
                class="d-md-none d-sm-flex"
                v-for="item in listNews"
                :key="item.id"
                :itemid="item.id"
                :title="item.title"
                :date="item.created_at"
                :image="item.image"
              />
            </div>
          </div>
          <p class="text-muted" v-if="listNews == null">
            Saat ini berita belum tersedia
          </p>
          <div class="d-inline bg-gray p-2">
            <inertia-link :href="route('news')"
              >Lihat semua berita</inertia-link
            >
          </div>
        </div>
      </section>

      <!-- Section Promo -->
      <section class="pt-2 pb-5" data-aos="fade-down">
        <div class="container">
          <!-- title section -->
          <div>
            <h3 class="mb-0">
              <strong>Promo</strong>
            </h3>
            <hr class="border-secondary" />
          </div>
          <!-- Blog Cards -->
          <div
            v-if="listPromo.length > 0"
            class="row gap-y mb-4"
            data-aos="fade-down"
          >
            <div
              class="col-md-6 col-lg-4"
              v-for="list in listPromo"
              :key="list.id"
            >
              <card-promo :itemImage="list" />
            </div>
          </div>
          <p v-else class="text-muted">Saat ini promo belum tersedia</p>
          <!-- End Blog Cards -->
        </div>
      </section>

      <!-- Section Galery -->
      <section class="pt-5 pb-5">
        <div class="container">
          <div class="text-center text-secondary" data-aos="fade-down">
            <h2>
              <strong>Galeri Sinarmas Hana Finance</strong>
            </h2>
            <hr class="border-secondary" />
          </div>
          <carousel
            autoplay
            center
            loop
            lazyload
            :nav="false"
            :autoplaySpeed="3000"
            data-aos="fade-up"
          >
            <fullscreen
              ref="fullscreen"
              v-for="(item, index) in listGalery"
              :key="item.id"
            >
              <img :src="item.src" @click="fullscreen(index)" alt="image" />
            </fullscreen>
          </carousel>
        </div>
      </section>
      <!--------------------------------------
FEATURES
      --------------------------------------->
      <!-- <div class="container pt-5 pb-5 mt-4" data-aos="fade-up">
        <div class="row gap-y">
          <div class="col-md-6 col-xl-4">
            <div class="media">
              <div class="iconbox iconmedium rounded-circle text-info mr-4">
                <i class="fab fa-html5"></i>
              </div>
              <div class="media-body">
                <h5>Responsive</h5>
                <p class="text-muted">
                  Your website works on any device: desktop, tablet or mobile.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="media">
              <div class="iconbox iconmedium rounded-circle text-purple mr-4">
                <i class="fab fa-gulp"></i>
              </div>
              <div class="media-body">
                <h5>Gulp</h5>
                <p class="text-muted">
                  You can easily read, edit, and write your own code, or change
                  everything.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="media">
              <div class="iconbox iconmedium rounded-circle text-info mr-4">
                <i class="fab fa-amazon"></i>
              </div>
              <div class="media-body">
                <h5>UI Kit</h5>
                <p class="text-muted">
                  There is a bunch of useful and necessary elements for
                  developing your website.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="media">
              <div class="iconbox iconmedium rounded-circle text-warning mr-4">
                <i class="fab fa-sass"></i>
              </div>
              <div class="media-body">
                <h5>Bootstrap 4.1.x</h5>
                <p class="text-muted">
                  You can find our code well organized, commented and readable.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="media">
              <div class="iconbox iconmedium rounded-circle text-info mr-4">
                <i class="fas fa-layer-group"></i>
              </div>
              <div class="media-body">
                <h5>Clean Code</h5>
                <p class="text-muted">
                  As you can see in the source code, we provided a clean code.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="media">
              <div class="iconbox iconmedium rounded-circle text-salmon mr-4">
                <i class="fas fa-burn"></i>
              </div>
              <div class="media-body">
                <h5>Support</h5>
                <p class="text-muted">
                  When you download this template, you'll freely receive future
                  updates.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div> -->

      <!-- modal pengajuan -->
      <modal-form-pengajuan :databranch="data_offices" />
      <!-- end modal pengajuan -->
    </div>
  </Layout>
</template>

<script>
import Layout from "@/Shared/Layout"; //import layouts
import CardProduct from "@/components/CardProduct";
import CardNews from "@/components/CardNews";
import MediaNews from "@/components/MediaNews";
import CardPromo from "@/components/CardPromo";
import carousel from "vue-owl-carousel2";

import ProfileSvg from "@/Shared/img/profileSVG";
import VehicleSvg from "@/Shared/img/vehicleSVG";
import CalculatorSvg from "@/Shared/img/calculatorSVG";

// modal pengajuan
import ModalFormPengajuan from "@/components/ModalFormPengajuan";

export default {
  components: {
    Layout,
    CardProduct,
    ProfileSvg,
    VehicleSvg,
    CalculatorSvg,
    CardNews,
    MediaNews,
    carousel,
    CardPromo,
    ModalFormPengajuan,
  },
  metaInfo: { title: "Beranda" },
  data() {
    return {
      filteredPeople: [
        { id: 1, link: "a", hovertext: "coba coba" },
        { id: 2, link: "b", hovertext: "jkhk kjhkkj" },
      ],
      bannerProducts: [
        {
          id: 1,
          imgSrc: "/img/demo/product1.png",
          title: "Kendaraan Bermotor",
          link: "kendaraan",
        },
        // {
        //   id: 2,
        //   imgSrc: "/img/demo/product2.png",
        //   title: "Pinjaman Dana",
        //   link: "pinjamandana",
        // },
        // {
        //   id: 3,
        //   imgSrc: "/img/demo/product3.png",
        //   title: "Pembiayaan Umrah",
        //   link: "umrah",
        // },
      ],
      listGalery: [
        {
          id: 1,
          src:
            "/img/galeri/rakernas-shf-kantor-pusat-leasing-kredit-mobil-dan-pinjaman-dana-online-1280x720.jpg",
        },
        {
          id: 2,
          src:
            "/img/galeri/ulang-tahun-shf-kantor-pusat-leasing-kredit-mobil-dan-pinjaman-dana-online-1280x720.jpg",
        },
        {
          id: 3,
          src:
            "/img/galeri/mr-yoon-visit-shf-perusahaan-leasing-kredit-mobil-dan-pinjaman-dana-online-1280x720.jpg",
        },
        {
          id: 4,
          src:
            "/img/galeri/mr-yoon-visit-shf-kantor-pusat-leasing-kredit-mobil-dan-pinjaman-dana-online-1280x720.jpg",
        },
        {
          id: 5,
          src: "/img/galeri/IMG_4173-resize-1280x720.png",
        },
      ],
    };
  },
  props: [
    "meta",
    "__config",
    "dataSlider",
    "listPromo",
    "listNews",
    "data_offices",
  ],
  methods: {
    test: function () {
      alert("oke");
    },

    fullscreen(index) {
      this.$refs["fullscreen"][index].enter();
    },
  },
};
</script>

<style scoped>
.card-deck {
  justify-content: space-between;
}

.card-deck .card {
  margin: 0 0 0.5rem;
}

@media (min-width: 576px) and (max-width: 767.98px) {
  .card-deck .card {
    -ms-flex: 0 0 48.7%;
    flex: 0 0 48.7%;
  }
}

@media (min-width: 768px) and (max-width: 991.98px) {
  .card-deck .card {
    -ms-flex: 0 0 32%;
    flex: 0 0 32%;
  }
}

@media (min-width: 992px) {
  .card-deck .card {
    -ms-flex: 0 0 24%;
    flex: 0 0 24%;
  }
}
</style>
