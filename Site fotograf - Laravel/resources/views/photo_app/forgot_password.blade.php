<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forgot Password</title>
<link rel="preload" href="fonts/Saira_Condensed/SairaCondensed-Light.ttf" as="font" crossorigin="anonymous" />
<link rel="preload" href="fonts/Nunito/static/Nunito-ExtraLight.ttf" as="font" crossorigin="anonymous" />
<script src="js/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/feather-icons"></script>
<script src="js/button.js"></script>
<link href="css/background.css" rel="stylesheet" type="text/css">
<link href="css/button.css" rel="stylesheet" type="text/css">
<link href="css/contact.css" rel="stylesheet" type="text/css">
</head>
<body class="imd">

  @include('partials.navbar')

  <div class="contactHolder">
  
    







        <div class="screen">
          <div class="screen-header">
            <div class="screen-header-left">
              <div class="screen-header-button close"></div>
              <div class="screen-header-button maximize"></div>
              <div class="screen-header-button minimize"></div>
            </div>
            <div class="screen-header-right">
              <div class="screen-header-ellipsis"></div>
              <div class="screen-header-ellipsis"></div>
              <div class="screen-header-ellipsis"></div>
            </div>
          </div>
          <div class="screen-body">
            <div class="screen-body-item left">
              <div class="app-title">
                <span>FORGOT</span>
                <span>PASSWORD</span>
              </div>
              <x-auth-session-status class="app-form-control mt-5" :status="session('status')" />

              <!-- Validation Errors -->
              <x-auth-validation-errors class="app-form-control" :errors="$errors" />
            </div>
            <div class="screen-body-item">
              <div class="app-form-control" style="border-bottom: none!important;">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
              <div class="app-form">
                <form method="POST" action="{{ route('password.email') }}">
                  @csrf
      
                  <!-- Email Address -->
                  <div>
                      <x-input id="email" class="app-form-control mt-4" placeholder="EMAIL" type="email" name="email" :value="old('email')" required autofocus />
                  </div>
      
                      <x-button class="app-form-control mt-5" style="padding-right: 0!important;padding-left: 0!important;">
                          {{ __('Email Password Reset Link') }}
                      </x-button>
              </form>
              </div>
            </div>
          </div>
        </div>


  </div>
  










 @include("partials.background")
</body>
</html>