<template>
  <div class="col-md-12 col-xl-12">
    <div class="media">
      <div class="mr-4">
        <b-img
          thumbnail
          rounded="circle"
          alt="image"
          width="80px"
          height="80px"
          :src="newurl"
        ></b-img>
      </div>
      <div class="media-body">
        <h4 class="mb-0">{{ name }}</h4>
        <p class="text-muted">{{ title }}</p>
        <p>
          {{ desc }}
        </p>
      </div>
    </div>
    <hr />
  </div>
</template>

<script>
export default {
  data() {
    return {
      url: "/img/team-management/",
      newurl: "#",
    };
  },
  props: ["name", "title", "desc", "img"],
  mounted() {
    this.newurl = this.url + this.img;
  },
};
</script>

<style>
</style>