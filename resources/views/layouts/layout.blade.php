<!DOCTYPE html>

<html data-wf-page="6135cf84ecf1c7caca70d1a2" data-wf-site="6135cf84ecf1c75fd670d1a1">

<head>
    <meta charset="utf-8">
    <title>Webshop</title>

    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">

    <script
        src="{{ asset('https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js') }}"
        type="text/javascript"></script>
    <!-- <script type="text/javascript">WebFont.load({  google: {    families: ["Bitter:400,700,400italic","Great Vibes:400","Merriweather Sans:regular"]  }});</script> -->
    <script type="text/javascript">
        ! function (o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
                .className += t + "touch")
        }(window, document);

    </script>

    <script src="https://kit.fontawesome.com/b6927c2bb7.js" crossorigin="anonymous"></script>


    <!-- <link href="{{ asset('/images/favicon.ico') }}" rel="shortcut icon" type="/image/x-icon">
  <link href="{{ asset('/images/webclip.png') }}" rel="apple-touch-icon">
   -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="body">
    <div class="navigationsection wf-section">
        <div class="div-block">
            <a href="/home" class="logoblock w-inline-block">
                <!-- <img src="/images/logo.png" style="width:200px; height: 130px;" alt=""> -->
                <h1 class="logo">Glasswerk</h1>
            </a>
            <div class="div-block-67">
                <div class="form-block-3 w-form">
                    <form id="email-form-2" class="form-2" method="GET" action="/search">
                        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                        <input type="text" class="text-field-3 w-input" maxlength="256" placeholder="Zoek"
                            name="searchresults" id="email-3"></form>
                    <div class="w-form-done">
                        <div>Thank you! Your submission has been received!</div>
                    </div>
                    <div class="w-form-fail">
                        <div>Oops! Something went wrong while submitting the form.</div>
                    </div>
                    
                </div>
                <img src="/images/magnifying-glass.svg" loading="lazy" width="27"
                data-w-id="1a14cda4-99b7-9f49-27ae-dd14b965f0d2" alt="" class="image-16 mobile">

                <div class="div-block-43">
                    <div class="form-block w-form">
                        <form id="email-form" name="email-form" data-name="Email Form"><label for="name-3">E-mailadres
                            </label><input type="text" class="w-input" maxlength="256" name="name-2" data-name="Name 2"
                                placeholder="" id="name-2"><label for="email-4">Wachtwoord</label><input type="email"
                                class="w-input" maxlength="256" name="email-2" data-name="Email 2" placeholder=""
                                id="email-2" required=""><input type="submit" value="Login" data-wait="Please wait..."
                                class="submit-button w-button">
                            <div class="div-block-44"><label for="email-4" style="text-decoration:none;"
                                    class="field-label-3">Nog geen gebruiker? </label>
                                <a href="/user/signup" class="link-block-2 w-inline-block"><label for="email-4"
                                        class="field-label-3">Registreer hier</label></a>
                            </div>
                        </form>
                        <div class="w-form-done">
                            <div>Thank you! Your submission has been received!</div>
                        </div>
                        <div class="w-form-fail">
                            <div>Oops! Something went wrong while submitting the form.</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <img src="/images/magnifying-glass.svg" loading="lazy" width="27"
                data-w-id="1a14cda4-99b7-9f49-27ae-dd14b965f0d2" alt="" class="image-16 mobile"> -->
            <div class="navicons"><img src="/images/user.svg" loading="lazy" width="50"
                    data-w-id="b84c3572-0a77-0be8-b4e9-2fd313b3b2c2" alt="" class="image-2">
                <a href="/cart" class="cartblock w-inline-block"><img src="/images/shopping-cart.svg" loading="lazy"
                        alt="" class="image"></a>
            </div>
            <div data-hover="false" data-delay="0" class="dropdown-3 w-dropdown">
                <div class="dropdown-toggle-5 w-dropdown-toggle"><img src="/images/meat.svg" loading="lazy" width="43"
                        alt="" class="image-9"></div>
                <nav class="dropdown-list-5 w-dropdown-list">
                    <a href="#" class="dropdown-link w-dropdown-link">Products</a>
                    <a href="#" class="dropdown-link-2 w-dropdown-link">Support</a>
                    <a href="#" class="dropdown-link-3 w-dropdown-link">About Us</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="div-block-68">
        <div class="div-block-67 mobile">
            <div class="form-block-3 w-form">
                <form id="email-form-2" name="email-form-2" data-name="Email Form 2" class="form-2"><input type="email"
                        class="text-field-3 w-input" maxlength="256" name="email-3" data-name="Email 3"
                        placeholder="Search" id="email-3" required=""></form>
                <div class="w-form-done">
                    <div>Thank you! Your submission has been received!</div>
                </div>
                <div class="w-form-fail">
                    <div>Oops! Something went wrong while submitting the form.</div>
                </div>
            </div>
        </div>
        <img src="/images/magnifying-glass.svg" loading="lazy" width="27"
            data-w-id="eb8485ed-8f1c-6c8f-5bae-751204e4765b" alt="" class="image-16">
    </div>


    @yield('content')

    <footer id="footer" class="footer wf-section">
        <div class="container-3 w-container">
            <div class="footer-flex-container">
                <a href="/home" class="logoblock w-inline-block">
                    <h1 id="footerlogo" class="logo">Glasswerk</h1>
                </a>
                <div>
                    <a href="/products">
                        <h2 class="footer-heading">Producten</h2>
                    </a>
                    <ul role="list" class="w-list-unstyled">
                        <li>
                            <a href="/categories/glaswerk" class="footer-link">Glaswerk</a>
                        </li>
                        <li>
                            <a href="/categories/keramiek" class="footer-link">Keramiek</a>
                        </li>
                        <li>
                            <a href="/categories/servies" class="footer-link">Servies</a>
                        </li>
                        <li>
                            <a href="/categories/sierobjecten" class="footer-link">Sier Objecten</a>
                        </li>

                    </ul>
                </div>
                <div>
                    <a href="/support">
                        <h2 class="footer-heading">Klantenservice</h2>
                    </a>
                    <ul role="list" class="w-list-unstyled">
                        <li>
                            <a href="#" class="footer-link">Text Link</a>
                        </li>
                        <li>
                            <a href="#" class="footer-link">Text Link</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="footer-heading">Over ons</h2>
                    <ul role="list" class="w-list-unstyled">
                        <li>
                            <a href="#" class="footer-link">Text Link</a>
                        </li>
                        <li>
                            <a href="#" class="footer-link">Text Link</a>
                        </li>
                        <li>
                            <a href="#" class="footer-link">Text Link</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div>Copyright © 2020 Glasswerk. All rights reserved.</div>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6135cf84ecf1c75fd670d1a1" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
    <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
    @stack('scripts')
</body>

</html>
