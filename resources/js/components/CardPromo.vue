<template>
  <div class="card">
    <img class="img-card-top" :src="itemImage.image" />
    <div class="card-body">
      <inertia-link :href="route('promodetail', { id: itemImage.id })">
        <h5 class="card-title text-dark">{{ cutStr(itemImage.title) }}</h5>
        <span class="card-text text-muted">
          Tanggal Berlaku:
          {{ itemImage.start_date | moment("dddd, Do MMMM YYYY") }} -
          {{ itemImage.end_date | moment("dddd, Do MMMM YYYY") }}
        </span>
      </inertia-link>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    itemImage: Object,
  },
};
</script>
