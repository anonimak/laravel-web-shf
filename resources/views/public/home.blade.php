@extends('public.layouts.app')
@section('content')
<div id="app">
</div>
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner shadow-sm rounded">
        <div class="carousel-item active">
            <img class="d-block w-100" src="https://picsum.photos/1500/600?random=1&blur=5" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <div class="container text-center text-white h-100">
                    <h1 class="display-2">Anchor <strong>UI Kit</strong></h1>
                    <h5 class="font-weight-light">Free Bootstrap 4.1.3<strong> UI Kit</strong> with <strong><i class="fab fa-sass fa-2x"></i></strong> for rapid development</h5>
                </div>
                <p>
                    <span class="d-block text-center text-white">Made with <i class="fas fa-heart text-danger"></i> by WOW Themes</span>
                </p>
                <h5>Mountains, Nature Collection</h5>
                @if (isset($action))
                    <button class="btn">
                            Notification <span class="badge badge-primary"></span>
                    </button>
                @endif
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://picsum.photos/1500/600?random=2&blur=5" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <div class="container text-center text-white h-100">
                    <h1 class="display-2">Anchor <strong>UI Kit</strong></h1>
                    <h5 class="font-weight-light">Free Bootstrap 4.1.3<strong> UI Kit</strong> with <strong><i class="fab fa-sass fa-2x"></i></strong> for rapid development</h5>
                </div>
                <p>
                    <span class="d-block text-center text-white">Made with <i class="fas fa-heart text-danger"></i> by WOW Themes</span>
                </p>
                <h5>Mountains, Nature Collection</h5>
                @if (isset($action))
                    <button class="btn">
                            Notification <span class="badge badge-primary"></span>
                    </button>
                @endif
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://picsum.photos/1500/600?random=3&blur=5" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <div class="container text-center text-white h-100">
                    <h1 class="display-2">Anchor <strong>UI Kit</strong></h1>
                    <h5 class="font-weight-light">Free Bootstrap 4.1.3<strong> UI Kit</strong> with <strong><i class="fab fa-sass fa-2x"></i></strong> for rapid development</h5>
                </div>
                <p>
                    <span class="d-block text-center text-white">Made with <i class="fas fa-heart text-danger"></i> by WOW Themes</span>
                </p>
                <h5>Mountains, Nature Collection</h5>
                @if (isset($action))
                    <button class="btn">
                            Notification <span class="badge badge-primary"></span>
                    </button>
                @endif
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
            <h2>Predictive and <strong>imperative approach</strong> towards application.</h2>
            <p class="text-muted">
                 It’s a social collaboration trello software platform that employees really love to use, with rich personalized interface
            </p>
        </div>
        <div class="container card-deck card-pricing text-center">
            <div class="card border-0 shadow-sm">
                <img class="img-card-top" src="{{asset('img/demo/product1.png')}}">
                <div class="card-body">
                    <a href="#">
                        <h5 class="card-title text-dark">Kendaraan Bermotor</h5>
                    </a>
                    {{-- <button type="button" class="btn btn-indigo btn-round">Start Free</button> --}}
                </div>
            </div>
            <div class="card border-0 shadow-sm">
                <img class="img-card-top" src="{{asset('img/demo/product2.png')}}">
                <div class="card-body">
                    <a href="#">
                        <h5 class="card-title text-dark">Pinjaman Dana</h5>
                    </a>
                    {{-- <button type="button" class="btn btn-indigo btn-round">Start Free</button> --}}
                </div>
            </div>
            <div class="card border-0 shadow-sm">
                <img class="img-card-top" src="{{asset('img/demo/product3.png')}}">
                <div class="card-body">
                    <a href="#">
                        <h5 class="card-title text-dark">Pembiayaan Umrah</h5>
                    </a>
                    {{-- <button type="button" class="btn btn-indigo btn-round">Start Free</button> --}}
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
                        <div class="mb-1 text-muted">
                            Nov 12
                        </div>
                        <p class="card-text mb-auto">
                            This is a wider card with supporting text below as a natural lead-in to additional content.
                        </p>
                        <a class="text-gray" href="#">Continue reading</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" src="{{ asset('img/demo/blog1.jpg')}}">
                </div>
                </div>
                <div class="col-lg-6">
                <div class="card flex-md-row mb-4 box-shadow h-xl-300">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">Marketing</strong>
                            <h3 class="mb-0">
                            <a class="text-dark" href="#">Why your marketing can be improved</a>
                            </h3>
                            <div class="mb-1 text-muted">
                                Nov 12
                            </div>
                            <p class="card-text mb-auto">
                                This is a wider card with supporting text below as a natural lead-in to additional content.
                            </p>
                            <a class="text-gray" href="#">Continue reading</a>
                        </div>
                        <img class="card-img-right flex-auto d-none d-md-block" src="{{ asset('img/demo/blog2.jpg')}}">
                    </div>
                </div>
            </div>
            <!-- End Featured -->
            
            <!-- Blog Cards -->
            <div class="row gap-y">
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <img class="img-card-top" src="assets/img/demo/blog3.jpg">
                        <div class="card-body">
                            <a href="#">
                            <h5 class="card-title text-dark">10 Steps for a Successful Business without Investing Money</h5>
                            <span class="card-text text-muted">
                            Posted on May 24, 2019 by Dalida </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <img class="img-card-top" src="assets/img/demo/blog4.jpg">
                        <div class="card-body">
                            <a href="#">
                            <h5 class="card-title text-dark">Happy wife is happy life says life experts</h5>
                            <span class="card-text text-muted">
                            Posted on May 24, 2019 by Sandra </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <img class="img-card-top" src="assets/img/demo/blog5.jpg">
                        <div class="card-body">
                            <a href="#">
                            <h5 class="card-title text-dark">Pack your bags and see the world today</h5>
                            <span class="card-text text-muted">
                            Posted on May 24, 2019 by Mike </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <img class="img-card-top" src="assets/img/demo/blog6.jpg">
                        <div class="card-body">
                            <a href="#">
                            <h5 class="card-title text-dark">Whatever works is what's best,but not always</h5>
                            <span class="card-text text-muted">
                            Posted on May 24, 2019 by Mary </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <img class="img-card-top" src="assets/img/demo/blog7.jpg">
                        <div class="card-body">
                            <a href="#">
                            <h5 class="card-title text-dark">Social media and its impact on your business</h5>
                            <span class="card-text text-muted">
                            Posted on May 24, 2019 by John </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <img class="img-card-top" src="assets/img/demo/blog8.jpg">
                        <div class="card-body">
                            <a href="#">
                            <h5 class="card-title text-dark">Summer holidays are the best way to relax</h5>
                            <span class="card-text text-muted">
                            Posted on May 24, 2019 by Sal </span>
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
						 Your website works on any device: desktop, tablet or mobile.
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
						 You can easily read, edit, and write your own code, or change everything.
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
						 There is a bunch of useful and necessary elements for developing your website.
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
						 You can find our code well organized, commented and readable.
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
						 As you can see in the source code, we provided a clean code.
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
						 When you download this template, you'll freely receive future updates.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Features -->
<script>
  api = axios.create({
      baseURL: 'domain.nl/path/to/my/api'
  });
const app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
  },
  method: {

  },
  mounted: function(){
    // api
    //   .get('/currentprice.json')
    //   .then(response => (this.info = response))
  }
})
</script>
@endsection