<template>
    <div class="col-12">
        <div class="row">
            <div
                class="col-lg-3 col-md-4 col-xs-6"
                v-for="itemSlider in dataSlider"
                :key="itemSlider.id"
            >
                <b-card
                    :title="
                        itemSlider.caption != null
                            ? cutStr(itemSlider.caption, 10)
                            : ''
                    "
                    :img-src="baseUrl(itemSlider.image)"
                    :img-alt="itemSlider.image"
                    img-top
                    style="max-width: 20rem;"
                    class="mb-5 mx-auto"
                >
                    <b-card-text>
                        {{
                            itemSlider.text != null
                                ? cutStr(itemSlider.text, 20)
                                : "#no-text#"
                        }}
                    </b-card-text>

                    <b-button
                        href="#"
                        :variant="
                            itemSlider.show == 1
                                ? 'outline-success'
                                : 'outline-danger'
                        "
                        :title="itemSlider.show == 1 ? 'Aktif' : 'Tidak Aktif'"
                        ><i
                            :class="
                                itemSlider.show == 1
                                    ? 'fas fa-eye'
                                    : 'fas fa-eye-slash'
                            "
                        ></i
                    ></b-button>
                    <!-- <b-button href="#" variant="outline-danger" title="Tidak Aktif"><i class="fas fa-eye-slash"></i></b-button> -->

                    <inertia-link :href="route('admin.page.home.slider.detail', itemSlider.id)" class="btn btn-primary">Detail</inertia-link>
                    <b-button href="#" variant="danger">Delete</b-button>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["dataSlider"]
};
</script>

<style></style>
