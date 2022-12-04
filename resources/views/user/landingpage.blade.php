@include('partials.header')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo me-auto">
        @foreach($setting as $settings)
        <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" class="img-fluid">
        @endforeach
      </a>
      {{-- <h1 class="logo me-auto"><a href="index.html">WBMS | Paloyon Oriental</a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Officials</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact </a></li>
          <li><a class="getstarted scrollto" href="/login">Login/Register <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    @foreach ($setting as $settings)


        <div class="container">
          <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
              <h1>{{$settings->system_title}}</h1>
              <h2>{{$settings->brgy_location}}</h2>

              <div class="d-flex justify-content-center justify-content-lg-start">
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
                <a href="https://www.youtube.com/watch?v=Xv1eBqZALqw" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
              </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
              <img class="img-fluid animated" id="preview" src="{{$settings->system_logo ? asset ('storage/' .$settings->system_logo) : asset('/storage/no/-image.png')}}" style="width:700px; height:400px" />
            </div>
          </div>
        </div>

      </section><!-- End Hero -->
      @endforeach
      <main id="main">

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
          <div class="container">

            <div class="row counters position-relative">

              <div class="col-lg-3 col-6 text-center">
                <span>{{ $house_no ?? '0'}}</span>
                <p>Household</p>
              </div>

              <div class="col-lg-3 col-6 text-center">
                <span>{{ $residents ?? '0'}}</span>
                <p>Population</p>
              </div>

              <div class="col-lg-3 col-6 text-center">
                <span>{{ $male ?? '0'}}</span>
                <p>Male</p>
              </div>

              <div class="col-lg-3 col-6 text-center">
                <span>{{ $female ?? '0'}}</span>
                <p>Female</p>
              </div>


            </div>

          </div>
        </section><!-- End Counts Section -->


        <!-- ======= About Us Section ======= -->

        <section id="about" class="about">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>About Us</h2>
            </div>
           @foreach ($setting as $settings)
            <div class="row content">
              <div class="col-lg-6">
                <p>
                    {{$settings->about_section1}}
                </p>

              </div>
              <div class="col-lg-6 pt-4 pt-lg-0">
                <p>
                  {{$settings->about_section2}}
                </p>
                <a href="#" class="btn-learn-more">Learn More</a>
              </div>
            </div>
     @endforeach
          </div>
        </section><!-- End About Us Section -->
        @foreach ($setting as $settings)
        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us section-bg">
          <div class="container-fluid" data-aos="fade-up">

            <div class="row">

              <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                <div class="content">
                  <h3><strong>Vision, Mission & Goals</strong></h3>
                  <p>
                   {{$settings->description}}
                  </p>
                </div>

                <div class="accordion-list">
                  <ul>
                    <li>
                      <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Vision<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                      <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                        <p>
                          {{$settings->vission}}
                        </p>
                      </div>
                    </li>

                    <li>
                      <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Mission <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                      <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                        <p>
                          {{$settings->mission}}
                        </p>
                      </div>
                    </li>

                    <li>
                      <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Goals<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                      <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                        <p>
                          {{$settings->goal}}
                        </p>
                      </div>
                    </li>

                  </ul>
                </div>

              </div>

              <img class="col-lg-5 align-items-stretch order-1 order-lg-2 img"id="preview" src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}"  style="width:550px; height:550px" />
            </div>

          </div>
        </section><!-- End Why Us Section -->
        @endforeach

        <!-- ======= Skills Section ======= -->


           <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Services</h2>
            <p>Web-Based Barangay Management System will automate the barangay's current manual processes and transactions. Apart from effective data recording and monitoring, this system can also process online documentary requests and online complaint blotter, with the status of these services updated via SMS Notification.</p>
          </div>

          <div class="row">

            <div class="col-xl-6 col-md-12 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4>Barangay Certificates</h4>
                <p>Paloyon Oriental provides document processing services such as barangay clearance, barangay indigency, and barangay residency. The resident must be a registered resident of the barangay in order for the request to be processed; otherwise, the request will be denied.</p>
                <a href="/request"><button class="b1">REQUEST</button></a>
              </div>
            </div>

            <div class="col-xl-6 col-md-12 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
              <div class="icon-box">
                <div class="icon"><i class="bx bxs-report"></i></div>
                <h4>Blotter</h4>
                <p>If you are a victim of crime, it is wise to report with the barangay and police authorities. Thereafter, you must secure a barangay blotter and police blotter or report so that you may use them as evidences. Merely reporting of a fact and not a complaint under the law.</p>
                <a href="{{url('/residentBlotter')}}"><button class="b1">REPORT</button></a>
              </div>
            </div>
            {{--  --}}

           {{--  --}}
          </div>

        </div>
      </section>
      <!-- End Services Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
          <div class="container" data-aos="zoom-in">

            <div class="row">
              <div class="col-lg-9 text-center text-lg-start">
                <h3>Call To Action</h3>
                <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
              <div class="col-lg-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="#">Call To Action</a>
              </div>
            </div>

          </div>
        </section><!-- End Cta Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Portfolio</h2>
              <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="assets2/img/portfolio/b1.jpeg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                  <h4>App 1</h4>
                  <p>App</p>
                  <a href="assets2/img/portfolio/b1.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="/portfolio-details" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-img"><img src="assets2/img/portfolio/b3.jpeg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                  <h4>Web 3</h4>
                  <p>Web</p>
                  <a href="assets2/img/portfolio/b3.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="/portfolio-details" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="assets2/img/portfolio/b8.jpg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                  <h4>App 2</h4>
                  <p>App</p>
                  <a href="assets2/img/portfolio/b8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="/portfolio-details" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-img"><img src="assets2/img/portfolio/b9.jpeg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                  <h4>Card 2</h4>
                  <p>Card</p>
                  <a href="assets2/img/portfolio/b9.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="/portfolio-details" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-img"><img src="assets2/img/portfolio/b13.jpg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                  <h4>Web 2</h4>
                  <p>Web</p>
                  <a href="assets2/img/portfolio/b13.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="/portfolio-details" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="assets2/img/portfolio/b12.jpg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                  <h4>App 3</h4>
                  <p>App</p>
                  <a href="assets2/img/portfolio/b12.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                  <a href="/portfolio-details" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-img"><img src="assets2/img/portfolio/b2.jpeg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                  <h4>Card 1</h4>
                  <p>Card</p>
                  <a href="assets2/img/portfolio/b2.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                  <a href="/portfolio-details" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-img"><img src="assets2/img/portfolio/b7.jpeg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                  <h4>Card 3</h4>
                  <p>Card</p>
                  <a href="assets2/img/portfolio/b7.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                  <a href="/portfolio-details" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-img"><img src="assets2/img/portfolio/b5.jpg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                  <h4>Web 3</h4>
                  <p>Web</p>
                  <a href="assets2/img/portfolio/b5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="/portfolio-details" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>

            </div>

          </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Barangay Officials</h2>
              <p></p>
            </div>

            <div class="row">

            @foreach($official as $officials)
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <div class="member-img">
                    <img src="{{$officials->official_image ? asset ('storage/' .$officials->official_image) : asset('/storage/no/-image.png')}}" class="img-fluid" style="width:260px; height:260px">
                    <div class="social">
                      <a href=""><i class="bi bi-twitter"></i></a>
                      <a href=""><i class="bi bi-facebook"></i></a>
                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                  <div class="member-info">
                    <h4>{{$officials->name}}</h4>
                    <span>Barangay Captain</span>
                  </div>
                </div>
              </div>
            @endforeach
            </div>

          </div>
        </section><!-- End Team Section -->

        {{-- <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Pricing</h2>
              <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">

              <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="box">
                  <h3>Free Plan</h3>
                  <h4><sup>$</sup>0<span>per month</span></h4>
                  <ul>
                    <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                    <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                    <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                    <li class="na"><i class="bx bx-x"></i> <span>Pharetra massa massa ultricies</span></li>
                    <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                  </ul>
                  <a href="#" class="buy-btn">Get Started</a>
                </div>
              </div>

              <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                <div class="box featured">
                  <h3>Business Plan</h3>
                  <h4><sup>$</sup>29<span>per month</span></h4>
                  <ul>
                    <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                    <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                    <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                    <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
                    <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
                  </ul>
                  <a href="#" class="buy-btn">Get Started</a>
                </div>
              </div>

              <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                <div class="box">
                  <h3>Developer Plan</h3>
                  <h4><sup>$</sup>49<span>per month</span></h4>
                  <ul>
                    <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                    <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                    <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                    <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
                    <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
                  </ul>
                  <a href="#" class="buy-btn">Get Started</a>
                </div>
              </div>

            </div>

          </div>
        </section><!-- End Pricing Section -->
     --}}
        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
          <div class="container" data-aos="fade-up">


            <div class="section-title">
              <h2>FREQUENTLY ASKED QUESTIONS</h2>
        @foreach ($freq_asked_title as $freq_asked_titles)
              <p>{{$freq_asked_titles->frq_asked_title}}</p>
        @endforeach
            </div>


            <div class="faq-list">
              <ul>
                @foreach ($freq_asked as $freq_askeds)
                <li data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">{{$freq_askeds->question}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                    <p>
                      {{$freq_askeds->answer}}
                    </p>
                  </div>
                </li>
                @endforeach

              </ul>
            </div>

          </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Contact</h2>
              <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">

              <div class="col-lg-5 d-flex align-items-stretch">
                <div class="info">
                  <div class="address">
                    <i class="bi bi-geo-alt"></i>
                    <h4>Location:</h4>
                    <p>Paloyon Oriental Nabua Camarines Sur</p>
                  </div>

                  <div class="email">
                    <i class="bi bi-envelope"></i>
                    <h4>Email:</h4>
                    <p>paloyonoriental@gmail.com</p>
                  </div>

                  <div class="phone">
                    <i class="bi bi-phone"></i>
                    <h4>Call:</h4>
                    <p>+63 9091389911</p>
                  </div>

                  <iframe src="https://mapcarta.com/36015612/Map" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>

                </div>

              </div>

              <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="name">Your Name</label>
                      <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="name">Your Email</label>
                      <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject" required>
                  </div>
                  <div class="form-group">
                    <label for="name">Message</label>
                    <textarea class="form-control" name="message" rows="10" required></textarea>
                  </div>
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div>
                  <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
              </div>

            </div>

          </div>
        </section><!-- End Contact Section -->

      </main><!-- End #main -->

      <script src="{{url('assets/js/jquery-3.6.0.min.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#my_summernote").summernote();
            $('.dropdown-toggle').dropdown();
        });
      </script>

    <script>
        $(document).ready(function() {
            $("#dis_summernote").summernote(); //disable
            $('.dropdown-toggle').dropdown();
        });
      </script>

    <script>
        $(document).ready(function() {
            $("#diss_summernote").summernote({airMode:true}).next().find(".note-editable").attr("contenteditable",false); //not to
            $('.dropdown-toggle').dropdown();
        });
      </script>
    @include('partials.footer')




