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
        <!-- Text slides with image -->
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
          <!-- <div class="pb-5 pt-3 text-center">
            <h2>
              Predictive and
              <strong>imperative approach</strong> towards application.
            </h2>
            <p class="text-muted">
              It’s a social collaboration trello software platform that
              employees really love to use, with rich personalized interface
            </p>
          </div> -->
          <div class="container card-deck card-pricing text-center">
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
                      <badge
                        type="success"
                        circle
                        class="mr-3"
                        icon="ni ni-settings-gear-65"
                      ></badge>
                      <h6 class="mb-0">
                        Tepat perhitungannya, Cermat perencanaannya.
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
                        Simulasi Kredit untuk menghitung Total Down Payment (DP)
                        dan Angsuran.
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
                        Simulasi Budget Total DP untuk mengetahui angsuran
                        berdasarkan Budget Total DP Anda
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
            <div class="col-md-6 order-md-2" data-aos="fade-left">
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
            <div class="col-lg-6" v-for="item in listNew" :key="item.id">
              <card-news
                :itemid="item.id"
                :title="item.title"
                :date="item.created_at"
                :content="item.content"
                :category="item.category"
                :image="item.image"
              />
            </div>
            <!-- <div class="col-lg-6">
              <div class="card flex-md-row mb-4 box-shadow h-xl-300">
                <div class="card-body d-flex flex-column align-items-start">
                  <strong class="d-inline-block mb-2 text-purple"
                    >Business</strong
                  >
                  <h3 class="mb-0">
                    <a class="text-dark" href="#"
                      >Living the Dream on a Sunny Island</a
                    >
                  </h3>
                  <div class="mb-1 text-muted">Nov 12</div>
                  <p class="card-text mb-auto">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content.
                  </p>
                  <a class="text-gray" href="#">Continue reading</a>
                </div>
                <img
                  class="card-img-right flex-auto d-none d-md-block"
                  src="/img/demo/blog1.jpg"
                />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card flex-md-row mb-4 box-shadow h-xl-300">
                <div class="card-body d-flex flex-column align-items-start">
                  <strong class="d-inline-block mb-2 text-success"
                    >Marketing</strong
                  >
                  <h3 class="mb-0">
                    <a class="text-dark" href="#"
                      >Why your marketing can be improved</a
                    >
                  </h3>
                  <div class="mb-1 text-muted">Nov 12</div>
                  <p class="card-text mb-auto">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content.
                  </p>
                  <a class="text-gray" href="#">Continue reading</a>
                </div>
                <img
                  class="card-img-right flex-auto d-none d-md-block"
                  src="/img/demo/blog2.jpg"
                />
              </div>
            </div> -->
          </div>
          <p class="text-muted" v-if="listNew == null">
            Saat ini berita belum tersedia
          </p>
        </div>
      </section>

      <!-- Section Promo -->
      <section class="pt-5 pb-5" data-aos="fade-down">
        <div class="container">
          <!-- title section -->
          <div>
            <h3 class="mb-0">
              <strong>Promo</strong>
            </h3>
            <hr class="border-secondary" />
          </div>
          <!-- Blog Cards -->
          <div class="row gap-y mb-4" data-aos="fade-down">
            <div
              class="col-md-6 col-lg-4"
              v-for="list in listPromo"
              :key="list.id"
            >
              <card-promo :itemImage="list" />
            </div>
          </div>
          <p class="text-muted" v-if="list == null">
            Saat ini promo belum tersedia
          </p>
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
      <modal-form-pengajuan />
      <!-- end modal pengajuan -->
    </div>
  </Layout>
</template>

<script>
import Layout from "@/Shared/Layout"; //import layouts
import CardProduct from "@/components/CardProduct";
import CardNews from "@/components/CardNews";
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
    carousel,
    CardPromo,
    ModalFormPengajuan,
  },
  metaInfo: { title: "Beranda" },
  data() {
    return {
      listNews: [
        {
          id: 1,
          title: "Living the Dream on a Sunny Island",
          created_at: "978987987897",
          content:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
          categor: "Businnes",
          image: "/img/demo/blog1.jpg",
          id_category: 3,
        },
        {
          id: 2,
          title: "Living the Dream on a Sunny Island",
          created_at: "978987987897",
          content:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
          categor: "Businnes",
          image: "/img/demo/blog2.jpg",
          id_category: 3,
        },
      ],
      listNew: null,
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
        {
          id: 2,
          imgSrc: "/img/demo/product2.png",
          title: "Pinjaman Dana",
          link: "pinjamandana",
        },
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
  props: ["meta", "__config", "dataSlider", "listPromo"],
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

<style scoped></style>
