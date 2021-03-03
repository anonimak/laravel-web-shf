<template>
  <div>
    <b-modal id="modal-pengajuan" title="From Pengajuan" size="lg"  hide-footer>
        <b-form @submit.prevent="onSubmit" @reset.prevent="onReset" v-if="show">
            <b-form-group
                id="input-group-1"
                label="Alamat Email:"
                label-for="input-1"
            >
                <b-form-input
                id="input-1"
                v-model="form.email"
                type="email"
                required
                placeholder="Email"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Nama Depan:" label-for="input-2">
                <b-form-input
                id="input-2"
                type="text"
                v-model="form.firstname"
                required
                placeholder="Nama depan"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Nama Belakang:" label-for="input-2">
                <b-form-input
                id="input-2"
                type="text"
                v-model="form.lastname"
                required
                placeholder="Nama Belakang"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Nomor Telepon:" label-for="input-2">
                <b-form-input
                id="input-2"
                type="tel"
                v-model="form.no_telp"
                required
                placeholder="Nomor Telepon"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-3" label="Cabang:" label-for="input-3">
                <b-form-select
                id="input-3"
                v-model="form.branch"
                :options="branchs"
                required
                >
                <template #first>
                  <b-form-select-option :value="null" disabled>-- Pilih Cabang --</b-form-select-option>
                </template>
                </b-form-select>
            </b-form-group>

            <b-form-group id="input-group-3" label="Kategori:" label-for="input-3">
                <b-form-select
                id="input-3"
                v-model="form.category"
                :options="categories"
                required
                >
                <template #first>
                  <b-form-select-option :value="null" disabled>-- Pilih Kategori --</b-form-select-option>
                </template>
                </b-form-select>
            </b-form-group>
            <b-form-group id="input-group-3" label="Pesan Tambahan:" label-for="input-3">
                <b-form-textarea
                    id="textarea"
                    v-model="form.text"
                    placeholder="Pesan Tambahan..."
                    rows="3"
                    max-rows="6"
                    >
                </b-form-textarea>
            </b-form-group>

            <b-button class="mt-3 btn-dark" type="reset" @click="$bvModal.hide('modal-pengajuan')">Cancel</b-button>
            <b-button class="mt-3" type="submit" variant="primary">Submit</b-button>
            </b-form>
            <!-- <b-card class="mt-3" header="Form Data Result">
            <pre class="m-0">{{ form }}</pre>
            </b-card> -->
    </b-modal>
</div>
</template>

<script>
export default {
    props:["databranch"],
    data() {
      return {
        form: {
          email: '',
          firstname: '',
          lastname: '',
          branch: null,
          category:null,
          text:'',
          checked: []
        },
        branchs: this.databranch,
        categories: ['Kredit Kendaraan', 'Pinjaman Dana', 'Pendaftaran Agen'],
        show: true
      }
    },
    methods: {
      onSubmit() {
        this.$inertia.post(route("pengajuan"), this.form);
      },
      onReset() {
        // Reset our form values
        this.form.email = ''
        this.form.firstname = ''
        this.form.lastname = ''
        this.form.branch = null
        this.form.category = null
        this.form.text = ''
        this.form.checked = []
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>
