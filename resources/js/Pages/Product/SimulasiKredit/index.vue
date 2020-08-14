<template>
  <Layout>
    <div>
      <!-- wavy header -->
      <div class="jumbotron jumbotron-md jumbotron-fluid mb-0 pb-3 bg-secondary position-relative">
        <div class="container-fluid text-white h-100">
          <div class="d-lg-flex align-items-center justify-content-between text-center pl-lg-5">
            <div class="col pt-4 pb-4">
              <h1 class="display-3">Kredit &amp; Simulasi</h1>
              <h5 class="font-weight-light mb-4">
                Gunakan Kalkulator Pintar untuk membantu
                perhitungan kredit anda.
              </h5>
            </div>
            <div class="col align-self-bottom justify-content-center">
              <span style="font-size: 16em;" class="text-warning">
                <i class="fas fa-coins"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- Content -->
      <div class="container mt-4">
        <form-wizard title="Form Perhitungan Kredit" subtitle="And a new subtitle">
          <tab-content title="Pilih Kredit yang diinginkan" icon="fa fa-car">
            <div class="container mt-4">
              <h4 class="text-secondary">
                <div class="iconbox iconsmall rounded-circle mr-2">
                  <i class="fas fa-coins"></i>
                </div>Perhitungan Kredit yang di inginkan
              </h4>

              <b-container class="bv-example-row mb-4 mt-4">
                <b-card-group deck>
                  <b-link
                    href="#"
                    class="card text-white"
                    :class="form.jenisSimulasi == 1 ? 'bg-primary overlay shadow-lg':'bg-dark'"
                    @click.prevent="pilihJenisSimulasi(1)"
                  >
                    <b-card-body>
                      <h4>
                        Budget
                        <span class="float-right">
                          <i class="fas fa-coins"></i>
                        </span>
                      </h4>
                    </b-card-body>
                  </b-link>
                  <b-link
                    href="#"
                    class="card text-white"
                    :class="form.jenisSimulasi == 2 ? 'bg-primary overlay shadow-lg':'bg-dark'"
                    @click.prevent="pilihJenisSimulasi(2)"
                  >
                    <b-card-body>
                      <h4>
                        Kredit
                        <span class="float-right">
                          <i class="fas fa-money-bill-wave"></i>
                        </span>
                      </h4>
                    </b-card-body>
                  </b-link>
                </b-card-group>
              </b-container>
            </div>
          </tab-content>
          <tab-content title="Data Simulasi" icon="fas fa-file-alt">
            <b-form class="mt-4">
              <div v-if="form.jenisSimulasi == 1">
                <b-form-group id="input-group-2" label="TJH:" label-for="input-2">
                  <b-form-select id="input-2" v-model="form.tjh" :options="itemtjh" required></b-form-select>
                </b-form-group>

                <b-form-group id="input-group-3" label="Jenis Simulasi Budget:" label-for="input-3">
                  <b-form-select
                    id="input-3"
                    v-model="form.jenisBudget"
                    :options="itembudget"
                    required
                  ></b-form-select>
                </b-form-group>

                <b-form-group
                  id="input-group-1"
                  label="Email address:"
                  label-for="input-1"
                  description="We'll never share your email with anyone else."
                >
                  <b-form-input
                    id="input-1"
                    v-model="form.email"
                    type="email"
                    required
                    placeholder="Enter email"
                  ></b-form-input>
                </b-form-group>
              </div>
              <div v-else-if="form.jenisSimulasi == 2">
                <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
                  <b-form-input id="input-2" v-model="form.name" required placeholder="Enter name"></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-4">
                  <b-form-checkbox-group v-model="form.checked" id="checkboxes-4">
                    <b-form-checkbox value="me">Check me out</b-form-checkbox>
                    <b-form-checkbox value="that">Check that out</b-form-checkbox>
                  </b-form-checkbox-group>
                </b-form-group>
              </div>
            </b-form>
          </tab-content>
          <tab-content title="Data Diri Pengaju Kredit" icon="fas fa-id-card">My second tab content</tab-content>
          <tab-content
            title="Rangkuman Biaya Kredit"
            icon="fas fa-money-check"
          >Yuhuuu! This seems pretty damn simple</tab-content>
          <b-button variant="danger" slot="prev">Prev</b-button>
          <b-button variant="success" slot="next" :disabled="!form.jenisSimulasi">Next</b-button>
          <b-button variant="outline-primary" slot="finish">Finish</b-button>
        </form-wizard>
      </div>
      <!-- End Content -->
    </div>
  </Layout>
</template>

<script>
import Layout from "@/Shared/Layout"; //import layouts

export default {
  metaInfo: { title: "Simulasi Kredit" },
  data() {
    return {
      form: {
        email: "",
        name: "",
        jenisSimulasi: null,
        jenisBudget: 1,
        tjh: 1,
        checked: [],
      },
      itemjenis: [
        { text: "Pilih Simulasi", value: null },
        { text: "Budget", value: 1 },
        { text: "Kredit", value: 2 },
      ],
      itemtjh: [{ text: "Ya", value: 1 }],

      itembudget: [
        { text: "Berdasarkan Besar DP", value: 1 },
        { text: "Berdasarkan Besar Cicilan", value: 2 },
      ],
      show: true,
    };
  },
  methods: {
    pilihJenisSimulasi(jenis) {
      if (this.form.jenisSimulasi == jenis) this.form.jenisSimulasi = null;
      else this.form.jenisSimulasi = jenis;
    },
  },
  components: {
    Layout,
  },
  props: ["meta"],
};
</script>
