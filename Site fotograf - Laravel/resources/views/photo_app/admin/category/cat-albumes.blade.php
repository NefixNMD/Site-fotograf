<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Albume</title>
<link rel="preload" href="{{ url('fonts/Saira_Condensed/SairaCondensed-Light.ttf') }}" as="font" crossorigin="anonymous" />
<link rel="preload" href="{{ url('fonts/Nunito/static/Nunito-ExtraLight.ttf') }}" as="font" crossorigin="anonymous" />
<script src="{{ url('js/jquery-3.6.0.min.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/feather-icons"></script>
<script src="{{ url('js/button.js') }}"></script>
<link href="{{ url('css/background.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('css/button.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('css/galery.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="imd">

  @include('partials.navbar')
  

<div class="mainHolder">
  <h1>{{ $category->name }} Albums</h1>

  @csrf

  <div class="mr-2 ml-2 disp">
    @foreach ($albumes as $album)
    <div style="display: flex;
    flex-direction: column;
    align-items: center; padding: 20px" class="mr-2 ml-2 ">
     <a href="{{ route('album.images',$album->id) }}">
        <img src="/album_images/{{ $album->title }}/{{ $album->cover_image }}" alt="{{ $album->title }}" class="" style="height: 300px; width: 300px; border-radius: 20px;"></a>
        <a>{{ $album->title }}</a>
    </div>

      @endforeach
    </div>
   
</div>
 
  










  @include("partials.background")
  <script src="{{ url('js/galery.js') }}"></script>
</body>
</html>