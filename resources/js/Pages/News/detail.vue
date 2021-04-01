<template>
  <Layout>
    <div>
      <!-- Content -->
      <div data-aos="fade-down" class="container mt-4">
        <div class="d-none d-md-block">
          <Breadcrumb :items="breadcrumbItem" class="mb-0"></Breadcrumb>
        </div>
        <div class="row">
          <div class="col-lg-8 col-sm-12">
            <div class="pb-4 pt-4">
              <h3 class="text-secondary">{{ data.title }}</h3>
              <p class="text-muted">
                <em
                  >Sinarmas Hana Finance -
                  {{ data.created_at | moment("Do MMMM YYYY, HH:mm") }} WIB</em
                >
              </p>
            </div>
            <b-img :src="data.image" fluid-grow alt="Fluid-grow image"></b-img>
            <div data-aos="fade" class="pb-4 pt-4">
              <div v-html="data.description"></div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="pt-4">
              <h3 class="text-secondary">Berita lain</h3>
            </div>
            <div class="pb-4">
              <div v-if="listNews.length > 0">
                <div v-for="item in listNews" :key="item.id">
                  <media-news
                    :itemid="item.id"
                    :title="item.title"
                    :date="item.created_at"
                    :description="item.description"
                    :image="item.image"
                  />
                </div>
              </div>
              <p v-else class="text-muted">List Kosong</p>
            </div>
          </div>
        </div>
      </div>
      <!-- End Content -->
    </div>
  </Layout>
</template>
<script>
import Layout from "@/Shared/Layout"; //import layouts
import CardRequirement from "@/components/CardRequirement";
import CardNews from "@/components/CardNews";
import MediaNews from "@/components/MediaNews";
import Breadcrumb from "@/components/Breadcrumb";

export default {
  metaInfo: { title: "Berita" },
  data() {
    return {
      breadcrumbItem: [
        {
          title: "Home",
          href: "home",
        },
        {
          title: "Berita",
          href: "news",
        },
        {
          title: this.data.title,
          active: true,
        },
      ],
    };
  },
  components: {
    Layout,
    CardNews,
    CardRequirement,
    Breadcrumb,
    MediaNews,
  },
  props: ["data", "listNews"],
};
</script>
