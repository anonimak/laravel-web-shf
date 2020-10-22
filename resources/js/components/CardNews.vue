<template>
  <div class="card flex-md-row mb-4 box-shadow h-xl-300">
    <div class="card-body d-flex flex-column align-items-start">
      <strong class="d-inline-block mb-2 text-purple">Business</strong>
      <h3 class="mb-0">
        <a class="text-dark" href="#">{{title}}</a>
      </h3>
      <div class="mb-1 text-muted">{{date}}</div>
      <p class="card-text mb-auto">{{cutStr(content, 100)}}</p>
      <a class="text-gray" href="#">Continue reading</a>
      <inertia-link :href="route('promodetail', { id: itemid })"></inertia-link>
    </div>
    <img class="card-img-right flex-auto d-none d-md-block" :src="image" />
  </div>
</template>

<script>
export default {
  props: ["itemid", "title", "content", "date", "category", "image"],
};
</script>