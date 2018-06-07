@extent('home_page_master')
@section('home_page_main_content')
<div class='main-content'>
  <div class='main-content-wrap'>
    <!-- Image Gallery -->
    <h1 class="content-header">Image Gallery:</h1>
    <div class='image-gallery'>

      <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="{{asset('home_page_assets/img/gallery_img1.jpg')}}">
            <img src="{{asset('home_page_assets/img/gallery_img1.jpg')}}" alt="Trolltunga Norway" width="300" height="200">
          </a>
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="{{asset('home_page_assets/img/gallery_img1.jpg')}}">
            <img src="{{asset('home_page_assets/img/gallery_img1.jpg')}}" alt="Forest" width="600" height="400">
          </a>
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="{{asset('home_page_assets/img/gallery_img1.jpg')}}">
            <img src="{{asset('home_page_assets/img/gallery_img1.jpg')}}" alt="Northern Lights" width="600" height="400">
          </a>
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="{{asset('home_page_assets/img/gallery_img1.jpg')}}">
            <img src="{{asset('home_page_assets/img/gallery_img1.jpg')}}" alt="Mountains" width="600" height="400">
          </a>
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="{{asset('home_page_assets/img/gallery_img1.jpg')}}">
            <img src="{{asset('home_page_assets/img/gallery_img1.jpg')}}" alt="Northern Lights" width="600" height="400">
          </a>
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="{{asset('home_page_assets/img/gallery_img1.jpg')}}">
            <img src="{{asset('home_page_assets/img/gallery_img1.jpg')}}" alt="Mountains" width="600" height="400">
          </a>
        </div>
      </div>

      <div class="clearfix"></div>
    </div><!-- .image-gallery -->
  </div>
  <footer id="site-footer">
    <div class="row">
      <div class="col-sm-6">
        <div class="copyright">&copy; 2018 :  All rights reserved.</div>
      </div>
      <div class="col-sm-6">
        <div class="designed-by pull-right">Designed & Developed By <a href="http://webvisiondigital.com/" target="_blank">@webvisiondigital</a></div>
      </div>
    </div>
  </footer> <!-- site-footer -->
</div><!-- main-content -->
@endsection