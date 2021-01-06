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
<!-- 
          <div class="row">
            <div class="col-4">
              <b-card
                title="Wonsuk Chang"
                body-class="pt-0"
                img-src="https://picsum.photos/300/400/?image=25"
                img-alt="Image"
                img-top
                tag="article"
                style="max-width: 20rem"
                class="mb-2"
              >
                <b-card-text class="text-muted">Komisaris</b-card-text>

                <b-button class="btn-sm" href="#" variant="primary"
                  >Profil Selengkapnya</b-button
                >
              </b-card>
            </div>
          </div> -->

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
                ><b-card-text>
                  <div class="row gap-y">
                    <card-team-management
                      v-for="item in listdireksi"
                      :key="item.id"
                      :name="item.name"
                      :title="item.title"
                      :desc="item.desc"
                      :img="item.img"
                    />
                  </div> </b-card-text
              ></b-tab>
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

      listdireksi: [
        {
          id: 1,
          name: "Seo Jisu",
          title: "Direktur Utama",
          desc: `Warga Negara Korea Selatan, menjabat sebagai Direktur Utama PT Sinarmas Hana Finance sejak tahun 2015.
                  Beliau meraih gelar Sarjana Ekonomi di Yonsei University. Sebelum bergabung di PT Sinarmas Hana Finance, beliau sudah berkarir selama 26 tahun di Hana Financial Group, diawali pada tahun 1992 di HFG  Apgujeong Branch dengan jabatan Associate.
                  Berbagai posisi dan jabatan strategis di Hana Financial Group sudah dijalani beliau, diantaranya 3 tahun sebagai Branch Manager Bank KEB Hana Singapore dan menjabat di Hana Financial Group sebagai Relationship & General Manager, Large Corporate Business Division 3 pada tahun 2014.`,
          img: "seo.png",
        },
        {
          id: 2,
          name: "Andrew Ludy",
          title: "Direktur",
          desc: `Warga Negara Indonesia, menjabat sebagai Direktur PT Sinarmas Hana Finance sejak tahun 2016.
                Beliau menyelesaikan pendidikannya dan memperoleh gelar sarjana Ekonomi dari Perguruan Tinggi Universitas Katholik Widya Mandala, Surabaya pada tahun 2002.
                Beliau memulai karir sebagai Marketing di PT Sinar Mas Multifinance di tahun 2003. Karir beliau berlanjut dan menjabat berbagai posisi strategis, salah satunya Regional Coordinator dan Branch Manager PT Sinar Mas Multifinance (2003 – 2016).`,
          img: "andrew-ludy.png",
        },
        {
          id: 3,
          name: "Agustinus Budi Antoro",
          title: "Direktur",
          desc: `Warga Negara Indonesia, menjabat sebagai Direktur Kepatuhan dan Manajemen Risiko PT Sinarmas Hana Finance sejak tahun 2019.
                  Beliau menyelesaikan pendidikannya di Universitas Atma Jaya Yogyakarta dengan gelar Sarjana Manajemen Ekonomi di tahun 2000 dengan konsentrasi Manajemen Keuangan.
                  Memulai karir sebagai Credit Marketing Officer di PT Tunas Finance. Terhitung dari tahun 2003, beliau sudah berkarir di industri pembiayaan selama 16 tahun.
                  Bergabung dengan PT Sinarmas Hana Finance di tahun 2015 sebagai Branch Manager. Selanjutnya  menjabat sebagai Area Manager dan General Manager Kepatuhan dan Manajemen Risiko.`,
          img: "agustinus.png",
        },
      ],
    };
  },

  props: ["meta"],
};
</script>
