<template>
  <div>
    <Topbar />
    <Navbar />
    <main>
      <slot />
    </main>
    <!-- dark footer -->
    <svg
      version="1.1"
      id="Layer_1"
      xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink"
      x="0px"
      y="0px"
      viewBox="0 0 1440 126"
      style="enable-background:new 0 0 1440 126;"
      xml:space="preserve"
    >
      <path
        class="bg-dark"
        d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"
      />
    </svg>
    <Footer />
    <!-- <vue-particles
            color="#009688"
            :particlesNumber="100"
            :particleOpacity="0.3"
            :hoverEffect="false"
            :moveSpeed="0"
            linesColor="#009688"
            :linesWidth="1"
            :linesDistance="200"
            :lineOpacity="0.2"
        >
    </vue-particles>-->
    <!-- <particles-bg type="cobweb" bg="true" num="100" color="#009688" /> -->
  </div>
</template>
<script>
import Topbar from "@/components/Topbar";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
// import { ParticlesBg } from "particles-bg-vue";

export default {
  components: {
    Topbar,
    Navbar,
    Footer,
    // ParticlesBg
  },
  methods: {
    handleLogout() {
      alert("Ini Sudah Logout");
    },
  },
};
</script>
<style>
/* #particles-js {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: -1;
} */

#particles-js {
  background-size: cover;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
}
</style>
