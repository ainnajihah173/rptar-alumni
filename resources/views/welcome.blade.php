@extends('layouts.user-base')
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="hero-bg">
            <img src="assets/images/slide.jpg" alt="">
        </div>
        <div class="container text-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1 data-aos="fade-up">Welcome to <span>RPTAR Alumni</span></h1>
                <p data-aos="fade-up" data-aos-delay="100">This is a alumni portal for Rumah Penyayang Tun Abdul
                    Razak<br></p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="#about" class="btn-get-started">Login Account</a>
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container">

            <div class="row gy-4">

                <!-- About Content -->
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <p class="who-we-are">Who We Are</p>
                    <h3>Empowering Lives Through Compassion and Care</h3>
                    <p class="fst-italic">
                        Rumah Penyayang Tun Abdul Razak is a non-profit organization dedicated to providing a
                        nurturing and supportive environment for underprivileged children and communities. Our
                        mission is to inspire hope, foster growth, and create opportunities for a brighter future.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Offering shelter, education, and emotional
                                support to those in need.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Promoting values of empathy, resilience, and
                                self-sufficiency.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Engaging communities through outreach programs
                                and sustainable initiatives.</span></li>
                    </ul>
                    <a href="#" class="read-more"><span>Learn More About Us</span><i
                            class="bi bi-arrow-right"></i></a>
                </div>

                <!-- About Images -->
                <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <div class="row gy-4">
                                <div class="col-lg-12">
                                    <img src="assets/images/rptar.jpg" class="img-fluid" alt="Children at Rumah Penyayang">
                                </div>
                                <div class="col-lg-12">
                                    <img src="assets/images/rptar1.jpg" class="img-fluid" alt="Community Program">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row gy-4">
                                <div class="col-lg-12">
                                    <img src="assets/images/rptar2.jpg" class="img-fluid" alt="Children at Rumah Penyayang">
                                </div>
                                <div class="col-lg-12">
                                    <img src="assets/images/rptar3.jpg" class="img-fluid" alt="Community Program">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- /About Section -->

    <!-- Events Section -->
    <section id="events" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Events</h2>
            <p>Come and Join Events for Rumah Penyayang Tun Abdul Razak</p>
        </div><!-- End Section Title -->
        <div class="container">

            <div class="row gy-4 justify-content-between features-item">

                <div class="col-lg-5 d-flex align-items-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">

                    <div class="content">
                        <h3>Program Kasih Ramadan 2023</h3>
                        <p>
                            Quidem qui dolore incidunt aut. In assumenda harum id iusto lorena plasico mares
                        </p>
                        <ul>
                            <li><i class="bi bi-clock flex-shrink-0"></i> 17:00 PM</li>
                            <li><i class="bi bi-calendar-event flex-shrink-0"></i> 28 November 2023
                            </li>
                            <li><i class="bi bi-geo-alt flex-shrink-0"></i> Rumah Penyayang Tun Abdul Razak</li>
                        </ul>
                        <p></p>
                        <a href="#" class="btn more-btn btn-primary">Register Event</a>
                    </div>

                </div>

                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <img src="assets/images/kasih.jpg" class="img-fluid" alt="">
                </div>

            </div><!-- Events Item -->

        </div>
    </section><!-- /Events Section -->

    <!-- News Section -->
    <section id="news" class="services section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>News</h2>
            <p>Stay updated with our latest news and stories</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row g-5">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item item-cyan position-relative">
                        <img src="assets/images/kasih.jpg" alt="News Image 1" class="img-fluid p-3"
                            style="width: 40%; height: 100px; object-fit: cover;">
                        <div>
                            <h3>Majlis Berbuka Puasa</h3>
                            <p>Discover what's new in our company and industry. Stay ahead with the latest trends.
                            </p>
                            <a href="#" class="read-more stretched-link">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item item-cyan position-relative">
                        <img src="assets/images/slide.jpg" alt="News Image 1" class="img-fluid p-3"
                            style="width: 40%; height: 100px; object-fit: cover;">
                        <div>
                            <h3>Pungutan Duit Sumbangan</h3>
                            <p>Discover what's new in our company and industry. Stay ahead with the latest trends.
                            </p>
                            <a href="#" class="read-more stretched-link">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->


            </div><!-- End Row -->
        </div><!-- End Container -->

    </section><!-- /News Section -->




    <!-- Donations Section -->
    <section id="donations" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Donations</h2>
            <p>Come and Join Donations for Rumah Penyayang Tun Abdul Razak</p>
        </div><!-- End Section Title -->
        <div class="container">

            <div class="row gy-4 justify-content-between features-item">

                <div class="col-lg-5 d-flex align-items-center order-2 order-lg-1" data-aos="fade-up"
                    data-aos-delay="100">

                    <div class="content">
                        <h3>Sumbangan untuk Program Kasih Ramadan 2023</h3>
                        <p>
                            Quidem qui dolore incidunt aut. In assumenda harum id iusto lorena plasico mares
                        </p>
                        <a href="#" class="btn more-btn btn-primary">Make Donation</a>
                    </div>

                </div>

                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <img src="assets/images/kasih.jpg" class="img-fluid" alt="">
                </div>

            </div><!-- Donations Item -->

        </div>
    </section><!-- /Donations Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Feel free to reach out to us for any inquiries or assistance.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Address</h3>
                        <p>Lot 324, Kampung Ulu Parit, 26600 Pekan, Pahang</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                        data-aos-delay="300">
                        <i class="bi bi-telephone"></i>
                        <h3>Call Us</h3>
                        <p>09-422 8050</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                        data-aos-delay="400">
                        <i class="bi bi-envelope"></i>
                        <h3>Email Us</h3>
                        <p>info@rumahpenyayang.com</p> <!-- You can change the email if needed -->
                    </div>
                </div><!-- End Info Item -->

            </div><!-- End Row -->

            <div class="row gy-4 mt-1">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                    <!-- You can update the map link to Rumah Penyayang's location -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15930.013202817157!2d103.3837851!3d3.4700457!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cf5077646451bf%3A0xdd69afade6d0fa4a!2sRumah%20Penyayang%20Tun%20Abdul%20Razak!5e0!3m2!1sen!2smy!4v1732824146976!5m2!1sen!2smy"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

            </div><!-- End Row -->

        </div><!-- End Container -->

    </section><!-- /Contact Section -->
@endsection
