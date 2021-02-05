<template>
    <div class="col-12">
        <b-card
            :title="caption != null ? cutStr(caption, 10) : ''"
            :img-src="image"
            :img-alt="image"
            img-top
            style="max-width: 20rem;"
            class="mb-5 mx-auto"
        >
            <b-card-text>
                {{ text }}
            </b-card-text>

            <b-button
                href="#"
                class="mb-1"
                :variant="show == 1 ? 'outline-success' : 'outline-secondary'"
                :title="show == 1 ? 'Aktif' : 'Tidak Aktif'"
                ><i :class="show == 1 ? 'fas fa-eye' : 'fas fa-eye-slash'"></i
            ></b-button>
            <!-- <b-button href="#" variant="outline-danger" title="Tidak Aktif"><i class="fas fa-eye-slash"></i></b-button> -->

            <inertia-link
                :href="route('admin.page.home.slider.detail', sliderId)"
                class="btn btn-primary mb-1"
                >Detail</inertia-link
            >
            <b-button
                href="#"
                variant="danger"
                class="mb-1"
                @click="$emit('deleteClicked', true, sliderId)"
                >Delete</b-button
            >
            <b-form-checkbox
                name="checkbox-1"
                @input="handleInput"
                :checked="selected"
                @change="$emit('on-change')"
                >
                I accept the terms and use
            </b-form-checkbox>
        </b-card>
    </div>
</template>

<script>
export default {
    props: ["caption", "image", "text", "sliderId", "show", "selected"],
    data () {
    return {
        content: this.sliderId,
        checked: false,
        }
    },
    methods: {
        handleInput (e) {
            this.checked = e
            this.$emit('input', e)
        }
    }
};
</script>

<style></style>
