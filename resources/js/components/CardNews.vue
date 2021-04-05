<template>
  <div class="card mb-4 box-shadow h-100">
    <b-img fluid v-if="!simple" class="d-none d-md-block" :src="image" />
    <div class="card-body d-flex flex-column align-items-start">
      <h5 v-if="!simple" class="mb-0">
        <inertia-link :href="route('profile.newsdetail', { id: itemid })">{{
          title
        }}</inertia-link>
      </h5>
      <h6 v-else class="mb-0">
        <inertia-link :href="route('profile.newsdetail', { id: itemid })">{{
          title
        }}</inertia-link>
      </h6>
      <div class="mb-1 text-muted">
        <small
          ><em>{{ date | moment("Do MMMM YYYY, h:mm") }}</em></small
        >
      </div>
      <!-- <p v-if="!simple" class="card-text mb-2" v-html="cutStr(description, 100)"></p> -->
    </div>
    <div v-if="!simple" class="card-footer">
      <small
        ><inertia-link
          v-if="!simple"
          :href="route('profile.newsdetail', { id: itemid })"
          >Baca Selengkapnya</inertia-link
        ></small
      >
    </div>
  </div>
</template>

<script>
export default {
  props: {
    itemid: {
      type: Number,
      require: true,
    },
    title: {
      type: String,
      require: true,
    },
    description: {
      type: String,
      require: true,
    },
    date: {
      type: String,
      require: true,
    },
    image: {
      type: String,
    },
    simple: {
      type: Boolean,
      default: false,
    },
  },
};
</script>

<style scoped>
/* .card {
      max-width:25%;
  } */
</style>