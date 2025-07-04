<!-- ===================== Start Footer ======================== -->
<footer class="default-padding-top bg-light">
    <div class="container">
        <div class="row">
            <div class="f-items">
                <div class="col-md-4 col-sm-6 equal-height item">
                    <div class="f-item about">

                        @if ($content->title_or_logo === 'logo')

                        <img src="{{asset($content?->site_logo)}}" alt="Logo">
                        @else
                            <p>{{ $content?->site_title }}</p>

                        @endif

                        <p>
                            Celebrated conviction stimulated principles day. Sure fail or in said west. Right my
                            front it wound cause fully am sorry if. She jointure goodness interest debating did
                            outweigh.
                        </p>
                        <h5>Follow Us</h5>
                        <ul>
                            <li>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 equal-height item">
                    <div class="f-item link">
                        <h4>Company</h4>
                        <ul>
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">About us</a>
                            </li>
                            <li>
                                <a href="#">Compnay History</a>
                            </li>
                            <li>
                                <a href="#">Features</a>
                            </li>
                            <li>
                                <a href="#">Blog Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 equal-height item">
                    <div class="f-item link">
                        <h4>Resources</h4>
                        <ul>
                            <li>
                                <a href="#">Career</a>
                            </li>
                            <li>
                                <a href="#">Leadership</a>
                            </li>
                            <li>
                                <a href="#">Strategy</a>
                            </li>
                            <li>
                                <a href="#">Services</a>
                            </li>
                            <li>
                                <a href="#">History</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 equal-height item">
                    <div class="f-item twitter-widget">
                        <h4>Contact Info</h4>
                        <p>
                            Possible offering at contempt mr distance stronger an. Attachment excellence announcing
                        </p>
                        <div class="address">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="info">
                                        <h5>Website:</h5>
                                        <span>www.validtheme.com</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="info">
                                        <h5>Email:</h5>
                                        <span>support@validtheme.com</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="info">
                                        <h5>Phone:</h5>
                                        <span>+44-20-7328-4499</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <p>&copy; Copyright 2019. All Rights Reserved by <a href="#">validthemes</a></p>
                    </div>
                    <div class="col-md-6 text-right link">
                        <ul>
                            <li>
                                <a href="#">Terms</a>
                            </li>
                            <li>
                                <a href="#">Privacy</a>
                            </li>
                            <li>
                                <a href="#">Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
<!-- End Footer -->
