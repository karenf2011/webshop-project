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
    <script type="text/javascript">
        ! function (o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
                .className += t + "touch")
        }(window, document);
    </script>

    <script src="https://kit.fontawesome.com/b6927c2bb7.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="body">
    <div class="navigationsection wf-section">

        <div class="div-block">
            <a href="{{ route('root') }}" class="logoblock w-inline-block">
                <h1 class="logo">Glasswerk</h1>
            </a>

            <div class="div-block-67">
                <div class="form-block-3 w-form">
                    <form id="email-form-2" class="form-2" method="GET" action="{{ route('search') }}">
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
                    @auth
                        <button><a href="">Profiel</a></button>
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" id="logout">Logout</button>
                        </form>
                    @endauth
                    @guest
                    <div class="form-block w-form">
                        <form data-name="Email Form" method="POST" action="{{ route('login') }}">
                        @csrf
                            <label for="email">E-mailadres
                            <input type="text" class="w-input" maxlength="256" name="email" data-name="Name 2" id="email" required>
                            </label>
                            <label for="password">Wachtwoord 
                            <input type="password" class="w-input" maxlength="256" name="password" data-name="Email 2" id="password" required>
                            </label>
                            <button type="submit" id="login" class="submit-button w-button">Login</button>
                            <div class="div-block-44">
                            <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __('Nog geen account?') }}
                                </a>
                            </div>
                        </form>
                        <div class="w-form-done">
                            <div>Thank you! Your submission has been received!</div>
                        </div>
                        <div class="w-form-fail">
                            <div>Oops! Something went wrong while submitting the form.</div>
                        </div>
                    </div>
                    @endguest
                </div>
            </div>

            <div class="navicons">
            <a href="{{ route('login') }}" ><img src="/images/user.svg" loading="lazy" width="50"
                    data-w-id="b84c3572-0a77-0be8-b4e9-2fd313b3b2c2" alt="" class="image-2"></a>
                <a href="{{ route('cart') }}" class="cartblock w-inline-block"><img src="/images/shopping-cart.svg" loading="lazy"
                        alt="" class="image"></a>

            </div>
            <div data-hover="false" data-delay="0" class="dropdown-3 w-dropdown">
                <div class="dropdown-toggle-5 w-dropdown-toggle"><img src="/images/meat.svg" loading="lazy" width="43"
                        alt="" class="image-9"></div>
                <nav class="dropdown-list-5 w-dropdown-list">
                    <a href="{{ route('products.index') }}" class="dropdown-link w-dropdown-link">Products</a>
                    <a href="#" class="dropdown-link-2 w-dropdown-link">Support</a>
                    <a href="#" class="dropdown-link-3 w-dropdown-link">About Us</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="div-block-68">
        <div class="div-block-67 mobile">
            <div class="form-block-3 w-form">
                <form id="email-form-3" name="email-form-3" data-name="Email Form 2" class="form-2"><input type="email"
                        class="text-field-3 w-input" maxlength="256" name="email-3" data-name="Email 3"
                        placeholder="Search" id="email-4" required=""></form>
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
    
    <div class="mobilesubmenu">

        <div class="w-embed">
        <style>
        .mobilesubmenu::-webkit-scrollbar {
            display: none; 
        
            -ms-overflow-style: none; 
            overflow: -moz-scrollbars-none; 
        }
        </style>
        </div>

        <a href="{{ route('home') }}" class="link-block w-inline-block">
            <h4 class="heading">HOME</h4>
        </a>
        <a href="{{ route('products.index') }}" class="link-block w-inline-block">
            <h4 class="heading">ALLE PRODUCTEN</h4>
        </a>
        @foreach ($categories as $category)
            <a href="{{ route ('categories.show', $category) }}" class="link-block w-inline-block">
                <h4 class="heading">{{ strtoupper($category->name)}}</h4>
            </a>
        @endforeach
</div>

    @yield('content')

    <footer id="footer" class="footer wf-section">
        <div class="container-3 w-container">
            <div class="footer-flex-container">
                <a href="{{ route('home') }}" class="logoblock w-inline-block">
                    <h1 id="footerlogo" class="logo">Glasswerk</h1>
                </a>
                <div>
                    <a href="{{ route('products.index') }}">
                        <h2 class="footer-heading">Producten</h2>
                    </a>
                    <ul role="list" class="w-list-unstyled">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('categories.show', $category) }}" class="footer-link">{{ strtoupper($category->name)}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <a href="#">
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
            <div>Copyright © 2021 Glasswerk. All rights reserved.</div>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>
