@extends('public.layouts.app')

@section('content')
<div id="app" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Career</div>

                <div class="card-body">
                    <p data-aos="fade-up">This is from up.</p>
                </div>
            </div>
        </div>
    </div>
</div>
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
    api
      .get('/currentprice.json')
      .then(response => (this.info = response))
  }
})
</script>
@endsection