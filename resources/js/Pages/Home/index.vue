<template>
  <Layout>
    <div>
      <b-carousel
        id="carousel-1"
        :interval="4000"
        controls
        fade
        indicators
        background="#ababab"
        img-width="1024"
        img-height="480"
        style="text-shadow: 1px 1px 2px #333;"
      >
        <!-- Text slides with image -->
        <b-carousel-slide
          caption="First slide"
          text="Nulla vitae elit libero, a pharetra augue mollis interdum."
          img-src="https://picsum.photos/1024/480/?image=52"
        ></b-carousel-slide>

        <!-- Slides with custom text -->
        <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=54">
          <h1>Hello world!</h1>
        </b-carousel-slide>

        <!-- Slides with image only -->
        <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=58"></b-carousel-slide>

        <!-- Slides with img slot -->
        <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
        <b-carousel-slide>
          <template v-slot:img>
            <img
              class="d-block img-fluid w-100"
              width="1024"
              height="480"
              src="https://picsum.photos/1024/480/?image=55"
              alt="image slot"
            />
          </template>
        </b-carousel-slide>

        <!-- Slide with blank fluid image to maintain slide aspect ratio -->
        <b-carousel-slide caption="Blank Image" img-blank img-alt="Blank image">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Suspendisse eros felis, tincidunt a tincidunt eget,
            convallis vel est. Ut pellentesque ut lacus vel
            interdum.
          </p>
        </b-carousel-slide>
      </b-carousel>

      <!-- Author Card -->
      <div class="position-relative mt-neg5">
        <div class="col-6 mx-auto">
          <div class="card shadow-sm border-0">
            <!-- <img class="card-img-top" src="/img/demo/1.jpg" alt="Card image cap" /> -->
            <div class="card-body text-center">
              <img class="rounded-circle shadow mt-neg5" src="/img/demo/avatar.png" width="70" />
              <h5 class="card-title">Sal</h5>
              <p class="card-text text-muted">
                Hi, I am the author of Anchor Bootstrap UI Kit
                @wowthemesnet.
              </p>
              <div class="text-center">
                <a target="_blank" href="#">
                  <span class="iconbox iconsmall rounded-circle bg-secondary text-white mr-1">
                    <i class="fab fa-facebook-f"></i>
                  </span>
                </a>
                <a target="_blank" href="#">
                  <span class="iconbox iconsmall rounded-circle bg-info text-white mr-1">
                    <i class="fab fa-twitter"></i>
                  </span>
                </a>
                <a target="_blank" href="#">
                  <span class="iconbox iconsmall rounded-circle bg-dark text-white">
                    <i class="fab fa-github"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--------------------------------------
PRICING
      --------------------------------------->
      <section>
        <div class="pt-4 pb-4 bg-info" data-aos="fade-down">
          <div class="pb-5 pt-3 text-center">
            <h2>
              Predictive and
              <strong>imperative approach</strong> towards
              application.
            </h2>
            <p class="text-muted">
              It’s a social collaboration trello software platform
              that employees really love to use, with rich
              personalized interface
            </p>
          </div>
          <div class="container card-deck card-pricing text-center">
            <div class="card border-0 shadow-sm">
              <img class="img-card-top" src="/img/demo/product1.png" />
              <div class="card-body">
                <a href="#">
                  <h5 class="card-title text-dark">Kendaraan Bermotor</h5>
                </a>
                <button type="button" class="btn btn-indigo btn-round" @click="test()">Start Free</button>
              </div>
            </div>
            <div class="card border-0 shadow-sm">
              <inertia-link :href="route('promo')">
                <img class="img-card-top" src="/img/demo/product2.png" />
              </inertia-link>
              <div class="card-body">
                <a href="#">
                  <h5 class="card-title text-dark">Pinjaman Dana</h5>
                </a>
                <button type="button" class="btn btn-indigo btn-round">Start Free</button>
              </div>
            </div>
            <div class="card border-0 shadow-sm">
              <img class="img-card-top" src="/img/demo/product3.png" />
              <div class="card-body">
                <a href="#">
                  <h5 class="card-title text-dark">Pembiayaan Umrah</h5>
                </a>
                <button type="button" class="btn btn-indigo btn-round">Start Free</button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Pricing -->

      <section class="pt-5 pb-5" data-aos="fade-down">
        <div class="container">
          <!-- Featured -->
          <div class="row">
            <div class="col-lg-6">
              <div class="card flex-md-row mb-4 box-shadow h-xl-300">
                <div class="card-body d-flex flex-column align-items-start">
                  <strong class="d-inline-block mb-2 text-purple">Business</strong>
                  <h3 class="mb-0">
                    <a class="text-dark" href="#">Living the Dream on a Sunny Island</a>
                  </h3>
                  <div class="mb-1 text-muted">Nov 12</div>
                  <p class="card-text mb-auto">
                    This is a wider card with supporting
                    text below as a natural lead-in to
                    additional content.
                  </p>
                  <a class="text-gray" href="#">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" src="/img/demo/blog1.jpg" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card flex-md-row mb-4 box-shadow h-xl-300">
                <div class="card-body d-flex flex-column align-items-start">
                  <strong class="d-inline-block mb-2 text-success">Marketing</strong>
                  <h3 class="mb-0">
                    <a class="text-dark" href="#">Why your marketing can be improved</a>
                  </h3>
                  <div class="mb-1 text-muted">Nov 12</div>
                  <p class="card-text mb-auto">
                    This is a wider card with supporting
                    text below as a natural lead-in to
                    additional content.
                  </p>
                  <a class="text-gray" href="#">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" src="/img/demo/blog2.jpg" />
              </div>
            </div>
          </div>
          <!-- End Featured -->

          <!-- Blog Cards -->
          <div class="row gap-y">
            <div class="col-md-6 col-lg-4">
              <div class="card">
                <img class="img-card-top" src="/img/demo/blog3.jpg" />
                <div class="card-body">
                  <a href="#">
                    <h5 class="card-title text-dark">
                      10 Steps for a Successful Business
                      without Investing Money
                    </h5>
                    <span class="card-text text-muted">
                      Posted on May 24, 2019 by
                      Dalida
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card">
                <img class="img-card-top" src="/img/demo/blog4.jpg" />
                <div class="card-body">
                  <a href="#">
                    <h5 class="card-title text-dark">
                      Happy wife is happy life says life
                      experts
                    </h5>
                    <span class="card-text text-muted">
                      Posted on May 24, 2019 by
                      Sandra
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card">
                <img class="img-card-top" src="/img/demo/blog5.jpg" />
                <div class="card-body">
                  <a href="#">
                    <h5 class="card-title text-dark">
                      Pack your bags and see the world
                      today
                    </h5>
                    <span class="card-text text-muted">
                      Posted on May 24, 2019 by
                      Mike
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card">
                <img class="img-card-top" src="/img/demo/blog6.jpg" />
                <div class="card-body">
                  <a href="#">
                    <h5 class="card-title text-dark">
                      Whatever works is what's best,but
                      not always
                    </h5>
                    <span class="card-text text-muted">
                      Posted on May 24, 2019 by
                      Mary
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card">
                <img class="img-card-top" src="/img/demo/blog7.jpg" />
                <div class="card-body">
                  <a href="#">
                    <h5 class="card-title text-dark">
                      Social media and its impact on your
                      business
                    </h5>
                    <span class="card-text text-muted">
                      Posted on May 24, 2019 by
                      John
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card">
                <img class="img-card-top" src="/img/demo/blog8.jpg" />
                <div class="card-body">
                  <a href="#">
                    <h5 class="card-title text-dark">
                      Summer holidays are the best way to
                      relax
                    </h5>
                    <span class="card-text text-muted">Posted on May 24, 2019 by Sal</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- End Blog Cards -->
        </div>
      </section>
      <!--------------------------------------
FEATURES
      --------------------------------------->
      <div class="container pt-5 pb-5 mt-4" data-aos="fade-up">
        <div class="row gap-y">
          <div class="col-md-6 col-xl-4">
            <div class="media">
              <div class="iconbox iconmedium rounded-circle text-info mr-4">
                <i class="fab fa-html5"></i>
              </div>
              <div class="media-body">
                <h5>Responsive</h5>
                <p class="text-muted">
                  Your website works on any device: desktop,
                  tablet or mobile.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="media">
              <div class="iconbox iconmedium rounded-circle text-purple mr-4">
                <i class="fab fa-gulp"></i>
              </div>
              <div class="media-body">
                <h5>Gulp</h5>
                <p class="text-muted">
                  You can easily read, edit, and write your
                  own code, or change everything.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="media">
              <div class="iconbox iconmedium rounded-circle text-info mr-4">
                <i class="fab fa-amazon"></i>
              </div>
              <div class="media-body">
                <h5>UI Kit</h5>
                <p class="text-muted">
                  There is a bunch of useful and necessary
                  elements for developing your website.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="media">
              <div class="iconbox iconmedium rounded-circle text-warning mr-4">
                <i class="fab fa-sass"></i>
              </div>
              <div class="media-body">
                <h5>Bootstrap 4.1.x</h5>
                <p class="text-muted">
                  You can find our code well organized,
                  commented and readable.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="media">
              <div class="iconbox iconmedium rounded-circle text-info mr-4">
                <i class="fas fa-layer-group"></i>
              </div>
              <div class="media-body">
                <h5>Clean Code</h5>
                <p class="text-muted">
                  As you can see in the source code, we
                  provided a clean code.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="media">
              <div class="iconbox iconmedium rounded-circle text-salmon mr-4">
                <i class="fas fa-burn"></i>
              </div>
              <div class="media-body">
                <h5>Support</h5>
                <p class="text-muted">
                  When you download this template, you'll
                  freely receive future updates.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script>
import Layout from "@/Shared/Layout"; //import layouts

export default {
  metaInfo: { title: "Beranda" },
  data() {
    return {
      filteredPeople: [
        { id: 1, link: "a", hovertext: "coba coba" },
        { id: 2, link: "b", hovertext: "jkhk kjhkkj" },
      ],
    };
  },
  components: {
    Layout,
  },
  props: ["meta"],
  methods: {
    test: function () {
      alert("oke");
    },
  },
};
</script>

<style scoped>
</style>
