<template>
  <Layout>
    <div>
      <!-- wavy header -->
      <div
        class="jumbotron jumbotron-sm jumbotron-fluid mb-0 pb-1 bg-secondary position-relative"
      >
        <div class="container-fluid text-white h-100">
          <div
            class="d-lg-flex align-items-center justify-content-between text-center pl-lg-5"
          >
            <div class="col pt-2 pb-4">
              <h1 class="display-3">Kredit Simulasi</h1>
              <h5 class="font-weight-light mb-4">
                Gunakan kalkulator pintar untuk membantu perhitungan kredit
                Anda.
              </h5>
            </div>
            <div class="col align-self-bottom justify-content-center">
              <CreditSVG />
              <!-- <span style="font-size: 16em" class="text-warning">
                <i class="fas fa-coins"></i>
              </span> -->
            </div>
          </div>
        </div>
      </div>
      <!-- Content -->
      <div class="container mt-4">
        <form-wizard
          title="Form Perhitungan Kredit"
          subtitle=""
          @on-validate="handleValidation"
          :validateOnBack="false"
        >
          <tab-content title="Pilih Kredit yang diinginkan" icon="fa fa-car">
            <div class="container mt-4">
              <h4 class="text-secondary">
                <div class="iconbox iconsmall rounded-circle mr-2">
                  <i class="fas fa-coins"></i>
                </div>
                Perhitungan Kredit yang di inginkan
              </h4>

              <b-container class="bv-example-row mb-4 mt-4">
                <b-card-group deck>
                  <b-link
                    href="#"
                    class="card text-white"
                    :class="
                      jenisSimulasi == 1
                        ? 'bg-primary overlay shadow-lg'
                        : 'bg-dark'
                    "
                    @click.prevent="pilihJenisSimulasi(1)"
                  >
                    <b-card-body>
                      <h4>
                        Refinance
                        <span class="float-right">
                          <i class="fas fa-coins"></i>
                        </span>
                      </h4>
                    </b-card-body>
                  </b-link>
                  <b-link
                    href="#"
                    class="card text-white"
                    :class="
                      jenisSimulasi == 2
                        ? 'bg-primary overlay shadow-lg'
                        : 'bg-dark'
                    "
                    @click.prevent="pilihJenisSimulasi(2)"
                  >
                    <b-card-body>
                      <h4>
                        Used Car
                        <span class="float-right">
                          <i class="fas fa-car"></i>
                        </span>
                      </h4>
                    </b-card-body>
                  </b-link>
                </b-card-group>
              </b-container>
            </div>
          </tab-content>
          <tab-content title="Data Simulasi" icon="fas fa-file-alt" :before-change="validateSimulasi">
            <b-form class="mt-4">
              <div v-if="jenisSimulasi == 1">
                <b-form-group
                  id="input-group-2"
                  label="TJH:"
                  label-for="input-2"
                >
                  <b-form-select
                    id="input-2"
                    v-model="formbudget.tjh"
                    :options="itemtjh"
                    required
                  ></b-form-select>
                </b-form-group>

                <b-form-group
                  id="input-group-3"
                  label="Jenis Simulasi Budget:"
                  label-for="input-3"
                >
                  <b-form-select
                    id="input-3"
                    v-model="formbudget.jenisBudget"
                    :options="itembudget"
                    required
                  ></b-form-select>
                </b-form-group>

                <!-- <b-form-group
                  label="Email address:"
                  label-for="input-1"
                  description="We'll never share your email with anyone else."
                >
                  <b-form-input
                    id="input-1"
                    v-model="formbudget.email"
                    type="email"
                    required
                    placeholder="Enter email"
                  ></b-form-input>
                </b-form-group> -->
              </div>
              <div v-else-if="jenisSimulasi == 2">
                <b-form-group
                  label="Harga Kendaraan:"
                  label-for="input-harga"
                  :invalid-feedback="errormsg.harga"
                  :state="errormsg.harga && false"
                >
                  <b-input-group size="lg" prepend="IDR">
                    <b-form-input
                      id="input-harga"
                      v-model="formusedcar.harga"
                      v-currency="optioncurrency"
                      required
                      :state="errormsg.harga && false"
                      placeholder="Masukan Harga Kendaraan"
                    ></b-form-input>
                  </b-input-group>
                </b-form-group>
                <b-form-group
                  label="Uang Muka:"
                  label-for="input-uang-muka"
                >
                <b-input-group size="lg" prepend="DP Persen" :append="formusedcar.dprupiah | numberIdr">
                  <b-input-group-append>
                    <b-form-input
                      size="lg"
                      type="number"
                      min="30"
                      max="100" 
                      id="input-dp-percen"
                      v-model.lazy="formusedcar.dp"
                      @blur="checkdp($event)"
                      required
                      placeholder="Masukan Uang Muka"
                    ></b-form-input>
                  </b-input-group-append>
                  <b-input-group-append>
                    <b-input-group-text><strong>%</strong></b-input-group-text>
                  </b-input-group-append>
                </b-input-group>
                </b-form-group>
                <b-form-group
                  label="Asuransi:"
                  label-for="input-asuransi"
                  :invalid-feedback="errormsg.asuransi"
                  :state="errormsg.asuransi && false"
                >
                <b-form-select size="lg" :state="errormsg.asuransi && false" required v-model="formusedcar.asuransi" :options="optasuransi"></b-form-select>
                </b-form-group>
                <b-form-group
                  label="Tahun kendaraan:"
                  label-for="input-tahun"
                >
                  <datepicker 
                    :value="cfgdatepicker.default"
                    :format="cfgdatepicker.format"
                    v-model="formusedcar.tahun"
                    minimum-view="year" 
                    :disabled-dates="cfgdatepicker.disabledDates"             
                    name="datepicker"
                    aria-label="Large" aria-describedby="inputGroup-sizing-lg"
                    input-class="form-control"></datepicker>
                </b-form-group>
                <b-form-group
                  label="Tenor:"
                  label-for="input-harga"
                  :invalid-feedback="errormsg.tenor"
                  :state="errormsg.tenor && false"
                >
                  <b-form-select size="lg" :state="errormsg.tenor && false" required v-model="formusedcar.tenor" :options="opttenor"></b-form-select>
                </b-form-group>
                <b-form-group
                  label="Wilayah:"
                  label-for="input-harga"
                  :invalid-feedback="errormsg.wilayah"
                  :state="errormsg.wilayah && false"
                >
                  <b-form-select size="lg" :state="errormsg.wilayah && false" required v-model="formusedcar.wilayah" :options="optwilayah"></b-form-select>
                </b-form-group>
              </div>
            </b-form>
          </tab-content>
          <!-- <tab-content title="Data Diri Pengaju Kredit" icon="fas fa-id-card"
            >My second tab content</tab-content
          > -->
          <tab-content title="Rangkuman Simulasi Kredit" icon="fas fa-money-check">
            <div class="container">
                <div class="row row-grid align-items-center">
                    <div class="col-md-12 order-md-1">
                        <div class="pr-md-5">
                            <h3>Rangkuman Simulasi Kredit</h3>
                            <p class="text-muted mt-3">
                                  <!-- Perhitungan simulasi kredit per 17 Maret 2021.<br/> -->
                                  Minimal DP Kondisi Kendaraan Used adalah 30%
                            </p>
                            <table class="table table-borderless">
                              <tbody>
                                <tr>
                                  <td><h5 class="mb-0">Tenor</h5></td>
                                  <td><h5 class="mb-0">{{formusedcar.tenor}} Bulan</h5></td>
                                </tr>
                                <tr>
                                  <td><h5 class="mb-0">Dp</h5></td>
                                  <td><h5 class="mb-0">{{formusedcar.dp}} %</h5></td>
                                </tr>
                                <tr>
                                  <td><h5 class="mb-0"><strong>Angsuran</strong></h5></td>
                                  <td><h5 class="mb-0"><strong>{{formusedcar.angsuran | numberIdr}}</strong></h5></td>
                                </tr>
                                <tr>
                                  <td><h5 class="mb-0"><strong>Total Bayar Pertama</strong></h5></td>
                                  <td><h5 class="mb-0"><strong>{{formusedcar.totalbayar1 | numberIdr}}</strong></h5></td>
                                </tr>
                              </tbody>
                            </table>
                            <p class="text-muted">Rincian simulasi diatas bersifat estimasi dan tidak mengikat dan dapat berubah sewaktu-waktu mengikuti kebijakan yang berlaku. Perhitungan diatas sudah termasuk biaya administrasi, fiducia, asuransi kendaraan serta credit shield. Untuk perhitungan detail, hubungi cabang Sinarmas Hana Finance terdekat.</p>
                        </div>
                    </div>
                </div>
            </div>
          </tab-content>
          <b-button variant="secondary" slot="prev">Prev</b-button>
          <b-button
            variant="primary"
            slot="next"
            :disabled="!jenisSimulasi"
            >Next</b-button
          >
          <b-button variant="danger" class="btn-lg" slot="finish" v-b-modal.modal-pengajuan >Ajukan Sekarang</b-button>
        </form-wizard>
      </div>
      <!-- End Content -->
      <!-- modal -->
      <modal-form-pengajuan :databranch="databranch"/>
      <!-- alert -->
      <flash-msg />
    </div>
  </Layout>
</template>

<script>
import Layout from "@/Shared/Layout"; //import layouts
import ModalFormPengajuan from "@/components/ModalFormPengajuan";
import CreditSVG from "@/Shared/img/creditSVG";
import { CurrencyDirective } from 'vue-currency-input' //import currency input
import Datepicker from 'vuejs-datepicker' //datepicker
import FlashMsg from "@/components/Alert"; //alert


export default {
  components: {
    Layout,
    CreditSVG,
    Datepicker,
    ModalFormPengajuan,
    FlashMsg
  },
  directives: {
    currency: CurrencyDirective
  },
  props:["data_offices","meta"],
  metaInfo: { title: "Simulasi Kredit" },
  data() {
    return {
      optioncurrency: {currency: 'IDR', locale: 'id'},
      databranch: this.data_offices,
      cfgdatepicker: {
        default:new Date(),
        format:"yyyy",
        disabledDates: {
          from: new Date(Date.now() + 8640000)
        }
      },
      jenisSimulasi: null,
      formbudget:{
        jenisBudget: 1,
        tjh: 1,
      },
      formusedcar: {
        harga: 0,
        dp: 30,
        dprupiah:0,
        tahun: new Date().getFullYear().toString(),
        tenor:null,
        wilayah:null,
        asuransi: null,
        totalbayar1:0,
        angsuran:0
      },
      isValid:false,
      errormsg:{},
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
      optasuransi: [
        { value: null, text: 'Pilih Asuransi' },
        {value:0, text:"All Risk" },
        {value:1, text:"TLO" },
        {value:2, text:"Gabungan" },
      ],
      opttenor:[
        { value: null, text: 'Pilih Tenor' },
        {value:12, text:"12 Bulan" },
        {value:24, text:"24 Bulan" },
        {value:36, text:"36 Bulan" },
        {value:48, text:"48 Bulan" },
      ],
      dataasuransi:[
        {
          category:1,
          type:0,
          asuransiregion:[
            {
              id:1,
              value:4.20
            },
            {
              id:2,
              value:3.59
            },
            {
              id:3,
              value:2.78
            },
          ]
        },
        {
          category:2,
          type:0,
          asuransiregion:[
            {
              id:1,
              value:2.94
            },
            {
              id:2,
              value:2.72
            },
            {
              id:3,
              value:2.96
            },
          ]
        },
        {
          category:3,
          type:0,
          asuransiregion:[
            {
              id:1,
              value:2.40
            },
            {
              id:2,
              value:2.29
            },
            {
              id:3,
              value:1.97
            },
          ]
        },
        {
          category:4,
          type:0,
          asuransiregion:[
            {
              id:1,
              value:1.32
            },
            {
              id:2,
              value:1.32
            },
            {
              id:3,
              value:1.25
            },
          ]
        },
        {
          category:5,
          type:0,
          asuransiregion:[
            {
              id:1,
              value:1.16
            },
            {
              id:2,
              value:1.16
            },
            {
              id:3,
              value:1.16
            },
          ]
        },
        {
          category:1,
          type:1,
          asuransiregion:[
            {
              id:1,
              value:0.56
            },
            {
              id:2,
              value:0.78
            },
            {
              id:3,
              value:0.56
            },
          ]
        },
        {
          category:2,
          type:1,
          asuransiregion:[
            {
              id:1,
              value:0.69
            },
            {
              id:2,
              value:0.53
            },
            {
              id:3,
              value:0.48
            },
          ]
        },
        {
          category:3,
          type:1,
          asuransiregion:[
            {
              id:1,
              value:0.46
            },
            {
              id:2,
              value:0.42
            },
            {
              id:3,
              value:0.35
            },
          ]
        },
        {
          category:4,
          type:1,
          asuransiregion:[
            {
              id:1,
              value:0.30
            },
            {
              id:2,
              value:0.30
            },
            {
              id:3,
              value:0.27
            },
          ]
        },
        {
          category:5,
          type:1,
          asuransiregion:[
            {
              id:1,
              value: 0.24
            },
            {
              id:2,
              value:0.24
            },
            {
              id:3,
              value:0.24
            },
          ]
        }
      ],
      optwilayah:[
        { value: null, text: 'Pilih Wilayah' },
        {
          value:1,
          text:"Sumatera dan Kepulauan di sekitarnya"
        },
        {
          value:2,
          text:"DKI Jakarta, Jawa Barat dan Banten"
        },
        {
          value:3,
          text:"Selain Wilayah 1 dan 2"
        }
      ],
      databunga:[
        {
          id:1,
          id_tahun_kendaraan:1,
          tahunbunga:[
            {id:1, tahunke:1, value:7.50},
            {id:2, tahunke:2, value:8.50},
            {id:3, tahunke:3, value:9.50},
            {id:4, tahunke:4, value:10.00},
          ]
        },
        {
          id:2,
          id_tahun_kendaraan:2,
          tahunbunga:[
            {id:1, tahunke:1, value:8.00},
            {id:2, tahunke:2, value:9.00},
            {id:3, tahunke:3, value:10.00},
            {id:4, tahunke:4, value:10.00},
          ]
        },
        {
          id:3,
          id_tahun_kendaraan:3,
          tahunbunga:[
            {id:1, tahunke:1, value:8.50},
            {id:2, tahunke:2, value:9.50},
            {id:3, tahunke:3, value:10.50},
            {id:4, tahunke:4, value:11.00},
          ]
        },
        {
          id:4,
          id_tahun_kendaraan:4,
          tahunbunga:[
            {id:1, tahunke:1, value:11.50},
            {id:2, tahunke:2, value:12.50},
            {id:3, tahunke:3, value:13.50},
          ]
        }
      ],
      dataprovisi:[
        {
          id:1,
          tahun:1,
          biaya:1.00,
        },
        {
          id:2,
          tahun:2,
          biaya:1.00,
        },
        {
          id:3,
          tahun:3,
          biaya:2.00,
        },
        {
          id:4,
          tahun:4,
          biaya:2.00,
        },
        {
          id:5,
          tahun:5,
          biaya:2.00,
        },
      ],
      datacreditshield:[
        {
          id:1,
          tahun:1,
          biaya:0.35,
        },
        {
          id:2,
          tahun:2,
          biaya:0.75,
        },
        {
          id:3,
          tahun:3,
          biaya:1.05,
        },
        {
          id:4,
          tahun:4,
          biaya:1.40,
        },
        {
          id:5,
          tahun:5,
          biaya:1.75,
        },
      ],
      show: true,
    };
  },
  watch:{
    "formusedcar.dp":function(val){
      if(val < 30){
        this.formusedcar.dp = 30
      }
      if(val > 100){
        this.formusedcar.dp = 100
      }
      this.formusedcar.dprupiah = Math.round(this.formusedcar.dp*this.formusedcar.harga/100)
    },
    "formusedcar.harga":function(val){
      this.formusedcar.dprupiah = Math.round(this.formusedcar.dp*val/100)
    }
  },
  methods: {
    checkdp({target}){
      if(target.value < 30){
        target.value = 30
        alert("dp minimal 30%")
      }
      if(target.value > 100){
        target.value = 100
      }
    },
    pilihJenisSimulasi(jenis) {
      if (this.jenisSimulasi == jenis) this.jenisSimulasi = null;
      else this.jenisSimulasi = jenis;
    },

    hitungSimulasi:function(){
      let tenor = this.formusedcar.tenor
      let tahun = tenor/12
      let otr = this.formusedcar.harga
      let penyusutan = 100
      let tipeasuransi = this.formusedcar.asuransi
      let wilayah = this.formusedcar.wilayah
      let tahunkendaraan = this.formusedcar.tahun
      let dprupiah = this.formusedcar.dprupiah
      let pokokhutang = otr - dprupiah
      let phkapitalis
      let asuransi = 0
      let biayaFidusia = 500000
      let administrasi = 4000000
      let lainlain = 350000
      let tjh = (tipeasuransi == 0 && tipeasuransi == 2)? 100000: 0 ;


      // hitung asuransi
      for (let index = 0; index < tahun; index++) {
        // set tahun ke
        let tahunke = (index >= 5)? null : index+1;
        // set penyusutan
        let newpenyusutan = (index >= 3)? 70: penyusutan ;
        // kalau asuransi yg dipilih gabungan
        let newtipesuransi = (tipeasuransi == 2)?(index == 0)?0:1:tipeasuransi;

        let premi = this.hitungAsuransi(otr, newpenyusutan, newtipesuransi, wilayah, tahunke)
        // console.log(premi)
        // sum premi asuransi
        asuransi = premi+asuransi
        penyusutan = newpenyusutan-10
      }
      console.log("asuransi", asuransi)
      phkapitalis = pokokhutang + asuransi
      console.log("phkapitalis:", phkapitalis)

      // hitung bunga
      let bunga = this.hitungBunga(phkapitalis, tahunkendaraan, tahun)
      // hitung biaya provisi
      let biayaProvisi = this.hitungBiayaProvisi(phkapitalis, tahun)
      // hihtung credit shield
      let creditShield = this.hitungCreditShield(phkapitalis, tahun)
      console.log("bunga", bunga)
      let totalhutangbunga = phkapitalis+bunga
      console.log("totalhutangbunga",totalhutangbunga)
      let angsuran = Math.ceil((totalhutangbunga/tenor)/200)*200
      this.formusedcar.angsuran = angsuran
      console.log("angsuran",angsuran)
      let totalbayar1 = angsuran+dprupiah+tjh+biayaFidusia+biayaProvisi+creditShield+administrasi+lainlain
      this.formusedcar.totalbayar1 = totalbayar1
      console.log("totalbayar1",totalbayar1)

    },
    hitungAsuransi:function(otr, penyusutan, tipeasuransi, wilayah, tahunke){
      const {log} = console
      let premi = 100
      // hitung penyusutan otr
      let penyusutanotr = (otr*penyusutan)/100
      // penetuan kategori
      let category
      if (otr <= 125000000)
        category = 1
      else if (otr <= 200000000)
        category = 2
      else if (otr <= 400000000)
        category = 3
      else if (otr <= 800000000)
        category = 4
      else
        category = 5

      // get rateasuransi dari data
      let asuransi = this.dataasuransi.find(item => {
        let test = item.asuransiregion.find(region => region.id == wilayah)
        item.rateasuransi = test.value
        return item.category == category && item.type == tipeasuransi
      })
      console.log(asuransi)

      // hitung premi asuransi
      if(tahunke)
        premi = parseInt(penyusutanotr*asuransi.rateasuransi/100)
      return premi
    },
    hitungBunga:function(phkapitalis, tahunkendaraan,rate){
      // console.log(rate)
      let idtahun
      if(tahunkendaraan <= 2005)
        idtahun = 4
      else if(tahunkendaraan <= 2008)
        idtahun = 3
      else if(tahunkendaraan <= 2013)
        idtahun = 2
      else
        idtahun = 1
      
      let bunga = this.databunga.find(bunga => {
        // console.log(bunga.id_tahun_kendaraan)
        let itembunga = bunga.tahunbunga.find(item => item.tahunke === rate)
        bunga.value = itembunga.value
        return bunga.id_tahun_kendaraan == idtahun
      })
      
      // balik persentase bunga
      return phkapitalis*bunga.value/100*rate
    },
    hitungBiayaProvisi:function(phkapitalis, tahunke){
      const provisi = this.dataprovisi.find(value => value.tahun === tahunke)
      return Math.round(phkapitalis*provisi.biaya/100)
    },
    hitungCreditShield:function(phkapitalis, tahunke){
      const creditShield = this.datacreditshield.find(value => value.tahun === tahunke)
      return Math.round(phkapitalis*creditShield.biaya/100)
    },
    validateSimulasi:function() {
    // bersihkan error message 
    this.errormsg = {}
    //  cek jenis simulasi mana yang dipilih
    // loan
    if(this.jenisSimulasi == 1){

    }
    // used car
    if(this.jenisSimulasi == 2){

      for (const [key, value] of Object.entries(this.formusedcar)) {
        if(value == null){
          this.errormsg[key] = `Kolom ${key} tidak boleh kosong.`
        }
      }
      // cek harga tidak boleh nol
      if(this.formusedcar.harga == 0){
        this.errormsg['harga'] = "Harga kendaraan tidak boleh kosong"
      }
      // input dp harus diatas 30%
      if(this.formusedcar.dp < 30){
        this.formusedcar.dp = 30
        this.errormsg['dp'] = "DP minimum 30"
      }

      this.isValid = (Object.keys(this.errormsg).length === 0 && this.errormsg.constructor === Object)? true:false;

      return this.isValid
    }
    //  return true jika validasi sukses

    },
    handleValidation: function(isValid, tabIndex){

      // run hitung simulasi kalau valid
      if(isValid){
        this.isValid = true
        this.hitungSimulasi()
      }
    }
  },
};
</script>
