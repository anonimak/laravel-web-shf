<template>
  <div>
    <b-media class="my-2">
      <template #aside>
        <b-avatar
          rounded
          :src="image"
          :size="size == 'sm' ? '60px' : '120px'"
          alt="placeholder"
        ></b-avatar>
        <!-- <b-img ></b-img> -->
      </template>

      <h6 v-if="size == 'sm'" class="mt-0 mb-1">
        <inertia-link
          class="text-dark"
          :href="route('profile.newsdetail', { id: itemid })"
          >{{ title }}</inertia-link
        >
      </h6>
      <h4 v-else class="mt-0 mb-1">
        <inertia-link
          class="text-dark"
          :href="route('profile.newsdetail', { id: itemid })"
          >{{ title }}</inertia-link
        >
      </h4>
      <p class="mb-0 text-muted">
        <small
          ><em>{{ date | moment("Do MMMM YYYY, h:mm") }}</em></small
        >
      </p>
    </b-media>
    <hr class="border-gray" />
  </div>
</template>
<script>
export default {
  props: ["itemid", "title", "date", "image", "size"],
};
</script>