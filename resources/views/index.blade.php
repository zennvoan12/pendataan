  @extends('layouts.main')
  @section('container')
  <!-- /Hero Section -->

      <section id="hero" class="hero section dark-background">

          <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

              <div class="carousel-item active">
                  <img src="assets/img/hero-carousel/hero-carousel-1.jpg" alt="">
                  <div class="container">
                      <h2>We are professional</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                          labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                          laboris nisi ut aliquip ex ea commodo consequat.</p>
                      <a href="about.html" class="btn-get-started">Read More</a>
                  </div>
              </div><!-- End Carousel Item -->

              <div class="carousel-item">
                  <img src="assets/img/hero-carousel/hero-carousel-2.jpg" alt="">
                  <div class="container">
                      <h2>At vero eos et accusamus</h2>
                      <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id
                          quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.
                          Temporibus autem quibusdam et aut officiis debitis aut.</p>
                      <a href="about.html" class="btn-get-started">Read More</a>
                  </div>
              </div><!-- End Carousel Item -->

              <div class="carousel-item">
                  <img src="assets/img/hero-carousel/hero-carousel-3.jpg" alt="">
                  <div class="container">
                      <h2>Temporibus autem quibusdam</h2>
                      <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur
                          aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi
                          nesciunt omnis iste natus error sit voluptatem accusantium.</p>
                      <a href="about.html" class="btn-get-started">Read More</a>
                  </div>
              </div><!-- End Carousel Item -->

              <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
              </a>

              <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
              </a>

              <ol class="carousel-indicators"></ol>

          </div>

      </section>

      <!-- About Section -->
      <section id="about" class="about section">

          <div class="container">

              <div class="row position-relative">

                  <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200"><img src="assets/img/about.jpg">
                  </div>

                  <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                      <h2 class="inner-title">Consequatur eius et magnam</h2>
                      <div class="our-story">
                          <h4>Est 1988</h4>
                          <h3>Our Story</h3>
                          <p>Inventore aliquam beatae at et id alias. Ipsa dolores amet consequuntur minima quia
                              maxime autem. Quidem id sed ratione. Tenetur provident autem in reiciendis rerum at
                              dolor. Aliquam consectetur laudantium temporibus dicta minus dolor.</p>
                          <ul>
                              <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea
                                      commo</span></li>
                              <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit
                                      in</span></li>
                              <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex
                                      ea</span></li>
                          </ul>
                          <p>Vitae autem velit excepturi fugit. Animi ad non. Eligendi et non nesciunt suscipit
                              repellendus porro in quo eveniet. Molestias in maxime doloremque.</p>

                          <div class="watch-video d-flex align-items-center position-relative">
                              <i class="bi bi-play-circle"></i>
                              <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox stretched-link">Watch
                                  Video</a>
                          </div>
                      </div>
                  </div>

              </div>

          </div>

      </section><!-- /About Section -->
  @endsection

