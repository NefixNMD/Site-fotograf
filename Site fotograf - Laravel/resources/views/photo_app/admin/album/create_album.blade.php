<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Create Album</title>
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
            <span>CREATE</span>
            <span>ALBUM</span>
          </div>
          <x-auth-session-status class="app-form-control mt-4" :status="session('status')" />

          <!-- Validation Errors -->
          <x-auth-validation-errors class="app-form-control" :errors="$errors" />
        </div>
        <div class="screen-body-item">
          <div class="app-form">
            <form method="POST" id="fileUploadForm" action="/add_album" enctype="multipart/form-data">
              @csrf
      
              <!-- Email Address -->
              <div class="app-form-group">
      
                  <x-input id="name" class="app-form-control" placeholder="ALBUM NAME" type="name" name="title"  />
              </div>
              <div class="app-form-group">
                <label for="cover_image">ALBUM COVER</label>
                <input type="file" id="cover_image" class="app-form-control" name="cover_image" accept="image/png, image/jpeg">
            </div>
            <div class="app-form-group">
              <label for="image">ALBUM PHOTOS</label>
              <input type="file" id="image" class="app-form-control" name="images[]" accept="image/png, image/jpeg" multiple>
          </div>
          <div class="app-form-group">
            <div>
              @php
              $i = 1
              @endphp
              @foreach ($categories as $category)
              
              <label for="f-option" class="l-radio">
                <input type="radio" id="f-option" name="selector" tabindex='{{$i}}' value='{{ $category->id }}'>
                <span>{{ $category->name }}</span>
              </label>
              @php
              $i ++
              @endphp
              @endforeach 
            </div>
          </div>
          <div class="form-group">
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
            </div>
        </div>
        <div id="success" class="row">
        </div>

      
              <x-button class="app-form-control mt-4" style="padding-right: 0!important;padding-left: 0!important;">
                Store
            </x-button>
          </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script>
        $(function () {
            $(document).ready(function () {
                $('#fileUploadForm').ajaxForm({
                    beforeSend: function () {
                        var percentage = '0';
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage+'%', function() {
                          return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },
                    complete: function (xhr) {
                      location. reload();
                    }
                });
            });
        });
    </script>
 @include("partials.background")
</body>
</html>