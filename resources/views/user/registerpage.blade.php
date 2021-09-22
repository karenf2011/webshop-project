@extends('layouts.layout')
@section('content')

<body class="body-2">
  <div class="page-wrapper">
    <div class="page-container _2">
      <div class="block-2">
        <div class="form-wrapper">
          <h2 class="heading-4">Maak een gebruikersaccount!</h2>
          <div class="form-box">
            <h3 class="heading-5">Gebruik sociale media om te registreren</h3>
            <div class="social-box">
              <a href="#" class="social-login w-inline-block"><img src="/images/G.png" alt="" class="image-7">
                <div class="div-block-42">
                  <div class="text-block-9">Google</div>
                </div>
              </a>
              <a href="#" class="social-login facebook w-inline-block"><img src="/images/facebook.png" alt="" class="image-7">
                <div class="div-block-42">
                  <div class="text-block-9 _2">Facebook</div>
                </div>
              </a>
            </div>
            <div class="div-block-6-copy">
              <div class="_1px-div-line"></div>
              <h3 class="heading-5">Of</h3>
              <div class="_1px-div-line"></div>
            </div>
            <div class="w-form">
              <form id="email-form" name="email-form" data-name="Email Form">
                <div class="form-field-wrapper">
                  <div class="text-field-box"><label for="name" class="field-label-2">Naam</label><input type="text" class="text-field-2 w-input" maxlength="256" name="name" data-name="Name" placeholder="Name" id="name" required=""></div>
                  <div class="text-field-box"><label for="Name" class="field-label-2">Achternaam</label><input type="email" class="text-field-2 w-input" maxlength="256" name="Name" data-name="Name" placeholder="Last Name" id="Name" required=""></div>
                  <div class="text-field-box _2"><label for="Email" class="field-label-2">E-mail</label><input type="email" class="text-field-2 w-input" maxlength="256" name="Email" data-name="Email" placeholder="you@email.com" id="Email" required=""></div>
                  <div class="text-field-box _2"><label for="Password" class="field-label-2">Wachtwoord</label><input type="text" class="text-field-2 w-input" maxlength="256" name="Password" data-name="Password" placeholder="Password" id="Password" required=""></div>
                </div><label class="w-checkbox checkbox-field">
                  <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div><input type="checkbox" id="Checkbox" name="Checkbox" data-name="Checkbox" required="" style="opacity:0;z-index:-1"><span for="Checkbox" class="checkbox-label w-form-label">Ik ga akkoord <a href="#" class="link-4">Voorwaarden &amp; Condities</a> </span>
                </label><input type="submit" value="Register" data-wait="Please wait..." class="button registration w-button">
              </form>
              <div class="success-message w-form-done">
                <div>Bedankt! Jouw registratie is verwerkt!</div>
              </div>
              <div class="w-form-fail">
                <div>Oops! Er is iets niet goed gegaan</div>
              </div>
            </div>
            <div class="div-block-41">
              <div class="text-block-8">Heb je al een account? </div>
              <a href="#" class="link-3">Login hier</a>
            </div>
          </div>
        </div>
        <div class="legal-box _2-copy"></div>
      </div>
    </div>
    <div class="page-container">
      <div class="block-1">
        <div class="content-wrapper">
          <a href="#" class="brand w-inline-block">
            <h1 class="logo"></h1>
          </a>
          <div class="content-box">
            <h1 class="heading-1">Registreer om met gemak te winkelen.</h1>
            <div class="feature-box"></div>
            <div class="feature-box"></div>
          </div>
          <div class="legal-box _2">
            <div class="legal-text"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
@endsection