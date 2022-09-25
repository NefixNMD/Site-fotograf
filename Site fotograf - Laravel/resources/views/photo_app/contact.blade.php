<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Contact</title>
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
    

    <div class="">
      <div class="">
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
                <span>CONTACT</span>
                <span>US</span>
              </div>
            </div>
            <div class="screen-body-item">
              <form class="app-form" action="" method="post" action="{{ route('contact.store') }}">
                @csrf
                <div class="app-form-group">
                  <input class="app-form-control {{ $errors->has('name') ? 'error' : '' }}" placeholder="NAME" name="name" id="name">
                          <!-- Error -->
        @if ($errors->has('name'))
        <div class="error">
            {{ $errors->first('name') }}
        </div>
        @endif
                </div>
                <div class="app-form-group">
                  <input class="app-form-control {{ $errors->has('email') ? 'error' : '' }}" placeholder="EMAIL" name="email" id="email">
                  @if ($errors->has('email'))
        <div class="error">
            {{ $errors->first('email') }}
        </div>
        @endif
                </div>
                <div class="app-form-group">
                  <input class="app-form-control {{ $errors->has('phone') ? 'error' : '' }}" placeholder="PHONE NUMBER" name="phone" id="phone">
                  @if ($errors->has('phone'))
                  <div class="error">
                      {{ $errors->first('phone') }}
                  </div>
                  @endif
                </div>
                <div class="app-form-group message">
                  <input class="app-form-control {{ $errors->has('subject') ? 'error' : '' }}" placeholder="SUBJECT" name="subject" id="subject">
                  @if ($errors->has('subject'))
                  <div class="error">
                      {{ $errors->first('subject') }}
                  </div>
                  @endif
                </div>
                <div class="app-form-group message">
                  <textarea rows = "5" class="app-form-control {{ $errors->has('message') ? 'error' : '' }}" cols = "60" placeholder="MESSAGE" name="message" id="message"></textarea>
                  @if ($errors->has('message'))
                  <div class="error">
                      {{ $errors->first('message') }}
                  </div>
                  @endif
                </div>
                <div class="app-form-group buttons">
                  <input type="submit" name="send" value="SEND" class="app-form-button">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  










 @include("partials.background")
</body>
</html>