<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Category</title>
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
    <h1>Category</h1>
    <br>
    <button class="bxtn mb-5"><a href="/create_category" style="color: white;text-decoration: none;">Add new Category</a></button>
    <br>

    <table>
      <thead>
        <tr>
          <th scope="col">Category ID</th>
          <th scope="col">Category Name</th>
          <th scope="col">Category Image</th>
          <th scope="col">Update Category</th>
          <th scope="col">Delete Category</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <td data-label="Category ID">{{ $category->id }}</td>
          <td data-label="Category Name">{{ $category->name }}</td>
          <td data-label="Category Image"><img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="" style="height: 100px; width: 100px; border-radius: 10px;"></td>
          <td data-label="Update Category">
            <button class="bxtn bxtn2"><a href="{{ route('categories.edit', $category->id) }}" style="color: white;text-decoration: none;">Edit</a></button></td>
          <td data-label="Delete Category">
            <form
            method="POST"
            action="{{ route('categories.destroy', $category->id) }}"
            onsubmit="return confirm('Are you sure?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bxtn bxtn3">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
 @include("partials.background")
</body>
</html>