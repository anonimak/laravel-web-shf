<template>
  <nav
    class="topnav sticky-top navbar navbar-expand-lg navbar-light py-0"
    :class="scrollPosition > 50 ? 'bg-light' : 'bg-secondary'"
  >
    <div class="container">
      <a v-if="scrollPosition > 50" class="navbar-brand topnav-brand" href="/">
        <img src="/img/brand.png" alt width="200px" />
      </a>
      <button
        class="navbar-toggler collapsed my-2"
        type="button"
        data-toggle="collapse"
        data-target="#navbarColor02"
        aria-controls="navbarColor02"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarColor02">
        <ul class="navbar-nav navbar-bottom-nav mr-auto d-flex">
          <li
            :class="isRoute('home') ? 'nav-item active' : 'nav-item'"
            class="cool-link"
          >
            <inertia-link class="nav-link py-3" :href="route('home')">{{
              __("Home")
            }}</inertia-link>
          </li>
          <li
            :class="
              isRoute(
                'promo',
                'promodetail',
                'simulasikredit',
                'kendaraan',
                'pinjamandana'
              )
                ? 'nav-item dropdown active'
                : 'nav-item dropdown'
            "
            class="cool-link"
          >
            <a
              class="nav-link py-3 dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              >{{ __("Product") }}</a
            >
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <inertia-link
                :href="route('simulasikredit')"
                :class="
                  isRoute('simulasikredit')
                    ? 'dropdown-item active'
                    : 'dropdown-item'
                "
                >{{ __("Product.Cs") }}</inertia-link
              >
              <inertia-link
                :href="route('promo')"
                :class="
                  isRoute('promo', 'promodetail')
                    ? 'dropdown-item active'
                    : 'dropdown-item'
                "
                >{{ __("Product.Pr") }}</inertia-link
              >
              <inertia-link
                :href="route('kendaraan')"
                :class="
                  isRoute('kendaraan')
                    ? 'dropdown-item active'
                    : 'dropdown-item'
                "
                >{{ __("Product.Vh") }}</inertia-link
              >
              <inertia-link
                :href="route('pinjamandana')"
                :class="
                  isRoute('pinjamandana')
                    ? 'dropdown-item active'
                    : 'dropdown-item'
                "
                >{{ __("Product.Ln") }}</inertia-link
              >
              <!-- <inertia-link
                :href="route('umrah')"
                :class="
                  isRoute('umrah') ? 'dropdown-item active' : 'dropdown-item'
                "
                >{{ __("Product.Um") }}</inertia-link
              > -->
            </div>
          </li>
          <li
            :class="
              isRoute(
                'profile.about',
                'profile.visimisi',
                'profile.teammanagement',
                'profile.pemegangsaham'
              )
                ? 'nav-item dropdown active'
                : 'nav-item dropdown'
            "
            class="cool-link"
          >
            <a
              class="nav-link py-3 dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              >{{ __("Profile") }}</a
            >
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <inertia-link
                :href="route('profile.about')"
                :class="
                  isRoute('profile.about')
                    ? 'dropdown-item active'
                    : 'dropdown-item'
                "
                >Tentang Perusahaan</inertia-link
              >
              <inertia-link
                :href="route('profile.visimisi')"
                :class="
                  isRoute('profile.visimisi')
                    ? 'dropdown-item active'
                    : 'dropdown-item'
                "
                >Visi, Misi & Nilai</inertia-link
              >
              <!-- <a class="dropdown-item" href="./landing.html"
                >Strategi Perusahaan</a
              > -->
              <inertia-link
                :href="route('profile.teammanagement')"
                :class="
                  isRoute('profile.teammanagement')
                    ? 'dropdown-item active'
                    : 'dropdown-item'
                "
                >Team Management & Structure</inertia-link
              >
              <inertia-link
                :href="route('profile.pemegangsaham')"
                :class="
                  isRoute('profile.pemegangsaham')
                    ? 'dropdown-item active'
                    : 'dropdown-item'
                "
                >Pemegang Saham</inertia-link
              >
              <!-- <a class="dropdown-item" href="./blog.html"
                >Tanggung Jawab Sosial</a
              >
              <a class="dropdown-item" href="./page.html">Penghargaan</a> -->
            </div>
          </li>
          <li
            :class="isRoute('contact') ? 'nav-item active' : 'nav-item'"
            class="cool-link"
          >
            <inertia-link class="nav-link py-3" :href="route('contact')">{{
              __("Contact")
            }}</inertia-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      scrollPosition: null,
    };
  },
  methods: {
    isUrl(...urls) {
      if (urls[0] === "") {
        return this.url === "";
      }
      return urls.filter((url) => this.url.startsWith(url)).length;
    },
    updateScroll() {
      this.scrollPosition = window.scrollY;
    },
  },
  mounted() {
    window.addEventListener("scroll", this.updateScroll);
  },
};
</script>
<style scoped>
.dropdown-toggle,
.dropdown-menu {
  border-radius: 0px !important;
}
.dropdown-item:hover {
  color: white;
  background-color: #00bfa5;
}
.btn-danger {
  width: 55%;
}
.dropdown:hover > .dropdown-menu {
  display: block;
}

@media (max-width: 768px) {
  .navbar-nav {
    margin-bottom: 1rem !important;
  }

  a.nav-link {
    padding-left: 0.5rem !important;
  }
}

/* dropdown menu */

@media (min-width: 768px) {
  .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 10rem;
    padding: 0.5rem 0;
    margin: 0.125rem 0 0;
    margin-top: -0.5px;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 0.25rem;
  }

  .dropdown-menu::before {
    content: "";
    top: -8px;
    position: absolute;
    left: 50px;
    border-top: 0px solid #fff;
    border-left: 0px solid #fff;
    transform: rotate(45deg);
  }

  .cool-link {
    display: inline-block;
    color: whitesmoke;
    text-decoration: none;
  }

  .cool-link::after {
    content: "";
    display: block;
    width: 0;
    height: 2px;
    background: whitesmoke;
    transition: width 0.3s;
    transition-timing-function: ease;
  }

  .cool-link:hover::after {
    width: 100%;
  }

  li.active {
    display: inline-block;
    color: #000;
    text-decoration: none;
  }

  li.active::before {
    width: 100%;
  }
}
</style>
