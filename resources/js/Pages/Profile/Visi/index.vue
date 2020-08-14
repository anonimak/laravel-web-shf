<template>
  <Layout>
    <div>
      <Breadcrumb :items="breadcrumbItem"></Breadcrumb>
      Ini Visi {{ meta }}
    </div>
  </Layout>
</template>

<script>
import Layout from "@/Shared/Layout"; //import layouts
import Breadcrumb from "@/components/Breadcrumb";

export default {
  data() {
    return {
      breadcrumbItem: [
        {
          title: "Home",
          href: "home",
        },
        {
          title: "Profil",
          href: "about",
        },
        {
          title: "About",
          active: true,
        },
      ],
    };
  },
  components: {
    Layout,
    Breadcrumb,
  },
  props: ["meta"],
};
</script>
