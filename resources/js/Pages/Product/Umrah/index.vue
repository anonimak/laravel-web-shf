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
                    <p data-aos="zoom-out" class="text-white">
                        Pembiayaan untuk membantu mewujudkan impian Anda
                        beribadah umrah, dengan jangka waktu pembiayaan mulai 12
                        bulan hingga 36 bulan dengan suku bunga tetap.
                    </p>
                </div>
                <p class="bottom-align-text-absolute">
                    <span class="d-block text-center text-white"></span>
                </p>
            </div>

            <div
                data-aos="fade-up"
                class="jumbotron p-5 jumbotron-fluid bg-warning"
            >
                <div class="container h-100">
                    <div
                        class="row justify-content-between align-items-center text-md-center text-lg-left"
                    >
                        <div class="col-lg-9">
                            <h5 class="font-weight-light text-dark">
                                Simulasi Budget Total DP & Budget Angsuran
                            </h5>
                        </div>
                        <div
                            class="col-lg-3 text-md-center text-lg-right mt-4 mb-4"
                        >
                            <b-button  class="btn btn-lg btn-outline-dark" v-b-modal.modal-pengajuan
                            
                            >Form Pengajuan</b-button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div data-aos="fade-down" class="container mt-4">
                <div class="pb-4 pt-4 text-center">
                    <h2 class="text-secondary">
                        Pembiayaan Umrah Sinarmas Hana Finance
                    </h2>
                    <p class="text-muted">
                        Sinarmas Hana Finance sebagai salah satu perusahaan
                        pembiayaan di Indonesia menawarkan kemudahan bagi para
                        pelanggannya. Kami membantu mewujudkan mimpi Anda untuk
                        menunaikan ibadah umrah. Sinarmas Hana Finance akan
                        selalu hadir dengan menyediakan produk dan layanan yang
                        beragam sesuai siklus kehidupan konsumen dan memberikan
                        pengalaman yang menguntungkan untuk pelanggannya.
                    </p>
                </div>
                <div>
                    <div data-aos="fade" class="pb-4 pt-4 text-center">
                        <h2 class="m-auto text-secondary">Persyaratan</h2>
                    </div>
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
                        <b-button  class="btn text-white bg-primary" v-b-modal.modal-pengajuan>Pengajuan Online</b-button>
                    </div>
                </div>
                </div>
            </section>
            
            <modal-form-pengajuan/>
        </div>
    </Layout>
</template>
<script>
import Layout from "@/Shared/Layout"; //import layouts
import CardRequirement from "@/components/CardRequirement";

import VehicleSvg from "@/Shared/img/vehicleSVG";

import ModalFormPengajuan from "@/components/ModalFormPengajuan";

export default {
    components: {
        Layout,
        CardRequirement,
        VehicleSvg,
        ModalFormPengajuan
    },
    metaInfo: { title: "Produk Umrah" },
    data() {
        return {};
    }
};
</script>
