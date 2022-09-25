<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $album->title }}</title>
<link rel="preload" href="{{ url('fonts/Saira_Condensed/SairaCondensed-Light.ttf') }}" as="font" crossorigin="anonymous" />
<link rel="preload" href="{{ url('fonts/Nunito/static/Nunito-ExtraLight.ttf') }}" as="font" crossorigin="anonymous" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/feather-icons"></script>
<script src="{{ url('js/button.js') }}"></script>
<link href="{{ url('css/background.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('css/button.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('css/galery.css') }}" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>


<script>
$(window).load(function() {
  // Animate loader off screen
  $(".se-pre-con").fadeOut("slow");;
});
  </script>
</head>
<body class="imd" id="test">
  <div class="se-pre-con"></div>
  @include('partials.navbar')

  <div class="mainHolder" id="mainHolder">
    <h1>{{ $album->title }}</h1>
    <br>
    <div class="gallery" id="gallery">
      
        @foreach ($images as $image)
        <div class="gallery-item">
        <div class="content"><img src="/album_images/{{ $album->title }}/{{ $image->image }}" alt="eroare"></div>
      </div>
      @endforeach     
      
  </div>
  </div>
  
 @include("partials.background")
 <script src="{{ url('js/galery.js') }}"></script>
 <script src="{{ url('js/jquery-3.6.0.min.js') }}"></script>
</body>
</html>