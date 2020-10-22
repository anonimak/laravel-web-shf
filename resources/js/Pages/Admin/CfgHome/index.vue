<template>
  <Layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Home Page</h1>
    </div>
  </Layout>
</template>
<script>
import Layout from "@/Shared/AdminLayout"; //import layouts
import VueGridLayout from "vue-grid-layout";

export default {
  metaInfo: { title: "Page Home" },
  data() {
    return {
      layout: [
        { x: 0, y: 0, w: 1, h: 2, i: "Index" },
        { x: 0, y: 2, w: 1, h: 2, i: "1" },
        { x: 0, y: 4, w: 1, h: 2, i: "2" },
        { x: 0, y: 6, w: 1, h: 2, i: "3" },
        { x: 0, y: 8, w: 1, h: 2, i: "4" },
        { x: 0, y: 10, w: 1, h: 2, i: "5" },
        { x: 0, y: 12, w: 1, h: 2, i: "6" },
      ],
    };
  },
  components: {
    Layout,
    GridLayout: VueGridLayout.GridLayout,
    GridItem: VueGridLayout.GridItem,
  },
  props: ["meta"],
  methods: {
    test: function () {
      alert("oke");
    },
  },
};
</script>
