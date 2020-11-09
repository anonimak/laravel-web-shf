<template>
  <div>
    <b-modal id="modal-pengajuan" title="From Pengajuan" size="lg"  hide-footer>
        <b-form @submit="onSubmit" @reset="onReset" v-if="show">
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

            <b-form-group id="input-group-2" label="Firstname:" label-for="input-2">
                <b-form-input
                id="input-2"
                v-model="form.firstname"
                required
                placeholder="Enter firstname"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Lastname:" label-for="input-2">
                <b-form-input
                id="input-2"
                v-model="form.lastname"
                required
                placeholder="Enter lastname"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Telp:" label-for="input-2">
                <b-form-input
                id="input-2"
                v-model="form.no_telp"
                required
                placeholder="Enter Telepon"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-3" label="Branch:" label-for="input-3">
                <b-form-select
                id="input-3"
                v-model="form.branch"
                :options="branchs"
                required
                ></b-form-select>
            </b-form-group>

            <b-form-group id="input-group-3" label="Category:" label-for="input-3">
                <b-form-select
                id="input-3"
                v-model="form.category"
                :options="categories"
                required
                ></b-form-select>
            </b-form-group>
            <b-form-group id="input-group-3" label="Pesan Tambahan:" label-for="input-3">
                <b-form-textarea
                    id="textarea"
                    v-model="form.text"
                    placeholder="Enter something..."
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
        branchs: [{ text: 'Select One', value: null }, 'Bandung', 'Bekasi', 'Bogor', 'Cikarang', 'Depok', 'Jakarta', 'Kediri', 'Malang', 'Semarang', 'Surabaya', 'Surakarta' ,'Tangerang', 'Yogyakarta'],
        categories: [{ text: 'Select One', value: null }, 'Kredit Kendaraan', 'Pinjaman Dana', 'Pendaftaran Agen'],
        show: true
      }
    },
    methods: {
      onSubmit(evt) {
        evt.preventDefault()
        alert(JSON.stringify(this.form))
      },
      onReset(evt) {
        evt.preventDefault()
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
