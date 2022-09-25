<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Albumes</title>
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
</head>
<body class="imd">

  @include('partials.navbar')

  <div class="mainHolder">
    <h1>Albumes</h1>
    <br>
    <button class="bxtn mb-5"><a href="/create_album" style="color: white;text-decoration: none;">Add new Album</a></button>
    <br>

    <table>
      <thead>
        <tr>
          <th scope="col">Album ID</th>
          <th scope="col">Album Title</th>
          <th scope="col">Album Cover_Image</th>
          <th scope="col">Album Category</th>
          <th scope="col">Delete Album</th>
          <th scope="col">View Album Photos</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($albumes as $album)
        <tr>
          <td data-label="Album ID">{{ $album->id }}</td>
          <td data-label="Album Title">{{ $album->title }}</td>
          <td data-label="Album Cover_Image"><img src="/album_images/{{ $album->title }}/{{ $album->cover_image }}" alt="{{ $album->title }}" class="" style="height: 100px; width: 100px; border-radius: 10px;"></td>
          @foreach ($categories as $category)
          @if ($category->id == $album->category_id)
          <td data-label="Album Category">{{ $category->name }}</td>
          @endif        
          @endforeach
          <td data-label="Delete Album">
            <form
            method="POST"
            action="{{ route('alb.destroy', $album->id) }}"
            onsubmit="return confirm('Are you sure?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bxtn bxtn3">Delete</button>
            </form>
            </td>
            <td data-label="View Album Photos">
              <a href="{{ route('album.images',$album->id) }}"><button type="submit" class="bxtn bxtn4">View</button></a>
              </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
 @include("partials.background")
</body>
</html>