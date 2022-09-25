<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Portofolio</title>
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
<link href="css/galery.css" rel="stylesheet" type="text/css">
</head>
<body class="imd">

  @include('partials.navbar')
  

<div class="mainHolder">
  <h1>Portofolio</h1>

  @csrf

  <div class="mr-2 ml-2 disp">
      @foreach ($categories as $category)
    <div style="display: flex;
    flex-direction: column;
    align-items: center; padding: 20px" class="mr-2 ml-2 ">
     <a href="{{ route('category.albumes',$category->id) }}">
        <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="" style="height: 300px; width: 300px; border-radius: 20px;"></a>
        <a>{{ $category->name }}</a>
    </div>

      @endforeach
    </div>
</div>
 
  










  @include("partials.background")
  <script src="js/galery.js"></script>
</body>
</html>