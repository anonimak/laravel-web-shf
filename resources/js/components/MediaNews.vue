<template>
  <b-media class="my-2">
    <template #aside>
      <b-avatar rounded :src="image" size="60px" alt="placeholder"></b-avatar>
      <!-- <b-img ></b-img> -->
    </template>

    <h6 class="mt-0 mb-1">
      <inertia-link
        class="text-dark"
        :href="route('profile.newsdetail', { id: itemid })"
        >{{ title }}</inertia-link
      >
    </h6>
    <p class="mb-0">
      <small
        ><em>{{ date | moment("Do MMMM YYYY, h:mm") }}</em></small
      >
    </p>
    <hr class="border-gray" />
  </b-media>
</template>
<script>
export default {
  props: ["itemid", "title", "date", "image"],
};
</script>