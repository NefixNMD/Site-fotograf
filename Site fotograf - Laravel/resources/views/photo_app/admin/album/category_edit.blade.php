<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Category</title>
  <link rel="preload" href="{{ url('fonts/Saira_Condensed/SairaCondensed-Light.ttf') }}" as="font" crossorigin="anonymous" />
  <link rel="preload" href="{{ url('fonts/Nunito/static/Nunito-ExtraLight.ttf') }}" as="font" crossorigin="anonymous" />
  <script src="{{ url('js/jquery-3.6.0.min.js') }}"></script>
  <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css') }}">
  <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js') }}"></script>
  <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css">
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="{{ url('js/button.js') }}"></script>
  <link href="{{ url('css/background.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ url('css/button.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ url('css/contact.css') }}" rel="stylesheet" type="text/css">
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
            <span>EDIT</span>
            <span>CATEGORY</span>
          </div>
          <x-auth-session-status class="app-form-control mt-4" :status="session('status')" />

          <!-- Validation Errors -->
          <x-auth-validation-errors class="app-form-control" :errors="$errors" />
        </div>
        <div class="screen-body-item">
          <div class="app-form">
            <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
      
              <!-- Email Address -->
              <div class="app-form-group">
      
                  <x-input id="name" class="app-form-control" placeholder="CATEGORY NAME" type="name" name="name" value="{{ $category->name }}"  />
              </div>
              <div class="app-form-group">
                <img style="width: auto; height: 15vh" src="{{ Storage::url($category->image) }}">
                <input type="file" id="image" class="app-form-control" name="image" accept="image/png, image/jpeg">
            </div>
      


      
              <x-button class="app-form-control" style="padding-right: 0!important;padding-left: 0!important;">
                Update
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