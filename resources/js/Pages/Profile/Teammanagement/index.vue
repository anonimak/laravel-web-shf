<template>
  <Layout>
    <!-- SECTION TEAM MANAGEMENT -->
    <section class="pt-5 pb-5">
      <div class="pb-5 container">
        <div data-aos="fade-down">
          <h2 class="text-center text-secondary">
            <strong>TEAM MANAGEMENT</strong>
          </h2>
          <hr class="border-secondary" />
          <b-card no-body>
            <b-tabs pills card vertical nav-wrapper-class="w-20">
              <b-tab title="Dewan Komisaris" active
                ><b-card-text>
                  <div class="row gap-y">
                    <card-team-management
                      v-for="item in listteamkomisaris"
                      :key="item.id"
                      :name="item.name"
                      :title="item.title"
                      :desc="item.desc"
                      :img="item.img"
                    />
                  </div>
                </b-card-text>
              </b-tab>
              <b-tab title="Dewan direksi"
                ><b-card-text>Tab contents 2</b-card-text></b-tab
              >
            </b-tabs>
          </b-card>
        </div>
      </div>
    </section>

    <!-- SECTION STRUKTUR PERUSAHAAN -->
    <section class="pt-5 pb-5">
      <div class="pb-5 container">
        <div data-aos="fade-down">
          <h2 class="text-center text-secondary">
            <strong>STRUKTUR PERUSAHAAN</strong>
          </h2>
          <hr class="border-secondary" />
          <img src="/img/struktur-organisasi.png" alt width="100%" />
        </div>
      </div>
    </section>
  </Layout>
</template>

<script>
import Layout from "@/Shared/Layout"; //import layouts

import CardTeamManagement from "@/components/CardTeamManagement"; //import card team

export default {
  components: {
    Layout,
    CardTeamManagement,
  },

  data() {
    return {
      listteamkomisaris: [
        {
          id: 1,
          name: "Wonsuk Chang",
          title: "Komisaris Utama",
          desc: `Warga Negara Korea Selatan, menjabat sebagai
                            Komisaris Utama PT Sinarmas Hana Finance. Mengawali
                            karir sebagai General Manager of Financing Risk
                            Management di Samsung Life Insurance. Jabatan
                            terkini beliau adalah sebagai General Manager of
                            Risk Management Team in Hana Capital Co.Ltd, Korea
                            Selatan.`,
          img: "won-suk-chang.png",
        },
        {
          id: 2,
          name: "Herry Hermana Sukriawidjaja",
          title: "Komisaris Independen",
          desc: `Warga Negara Indonesia, menjabat sebagai Komisaris Independen PT Sinarmas Hana Finance.
                Beliau memulai karirnya di PT Bank Internasional Indonesia pada tahun 1981. Sebelumnya juga pernah bekerja di PT Internas Artha Leasing dan PT Sinar Mas Multiartha. Sebelum pensiun, beliau menjabat sebagai Unit Head of Human Resources di PT Sinar Mas Multifinance pada periode Juni 1996 – Maret 2011. `,
          img: "herry-hermana.png",
        },
        {
          id: 3,
          name: "Nasser Atorf",
          title: "Komisaris",
          desc: `Warga Negara Indonesia, menjabat sebagai Komisaris PT Sinarmas Hana Finance.
                  Mengawai karir sebagai Analis Kredit di bagian kredit Koperasi Bank Indonesia pada tahun 1983. Beliau kemudian melanjutkan studi Master dan lulus pada tahun 1989 di University of Illinois, Amerika Serikat.
                  Berpengalaman dalam memimpin dan mengkoordinir pengumpulan dan penyajian data ekonomi moneter, serta tugas pengawasan bank sampai tahun 2012. Kemudian dipercaya untuk memimpin Bank Indonesia di Medan dan ditunjuk sebagai Koordinator 4 KBI hingga tahun 2012. Jabatan terkini beliau adalah sebagai Komisaris di PT Bank KEB Hana Indonesia. `,
          img: "nasser-atorf.png",
        },
      ],
    };
  },

  props: ["meta"],
};
</script>
