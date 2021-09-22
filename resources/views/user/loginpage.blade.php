@extends('layouts.layout')
@section('content')


  <div class="usersection wf-section">
    <div class="usercontainer w-container">
      <div class="userdashboard">
        <h1 class="heading-23">Login</h1>
        <div class="div-block-43 loginpage">
          <div class="form-block w-form">
            <form id="email-form" name="email-form" data-name="Email Form"><label for="name-3" class="field-label-10">Email Address</label><input type="text" class="w-input" maxlength="256" name="name-2" data-name="Name 2" placeholder="" id="name-2"><label for="email-4" class="field-label-11">Password</label><input type="email" class="w-input" maxlength="256" name="email-2" data-name="Email 2" placeholder="" id="email-2" required=""><input type="submit" value="Login" data-wait="Please wait..." class="submit-button w-button">
              <div class="div-block-44"><label for="email-4" class="field-label-3">Don&#x27;t have an account yet? </label>
                <a href="#" class="link-block-2 w-inline-block"><label for="email-4" class="field-label-3">Sign-up here</label></a>
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
    </div>
  </div>

@endsection