 
   
 @extends('layouts.home_master')

  @section('home_content')
  <main id="main">

   

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Portfolio</h2>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".1">App</li>
              <li data-filter=".2">Card</li>
              <li data-filter=".3">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

        @foreach($images as $image)

          <div class="col-lg-4 col-md-6 portfolio-item {{$image->id}}">
            <img src="{{$image->image}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="{{$image->image}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
          @endforeach
     

        </div>

      </div>
    </section><!-- End Portfolio Section -->

 
    

  </main>
  @endsection