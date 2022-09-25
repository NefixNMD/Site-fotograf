<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Products</title>
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
    <h1>Products</h1>
    <br>
    <button class="bxtn mb-5"><a href="/create_product" style="color: white;text-decoration: none;">Add new Product</a></button>
    <br>

    <table style="overflow: hidden;">
      <thead>
        <tr>
          <th scope="col">Product ID</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Image</th>
          <th scope="col">Product Description</th>
          <th scope="col">Product Price</th>
          <th scope="col">Update Product</th>
          <th scope="col">Delete Product</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        <tr>
          <td data-label="Product ID">{{ $product->id }}</td>
          <td data-label="Product Name">{{ $product->name }}</td>
          <td data-label="Product Image"><img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="" style="height: 100px; width: 100px; border-radius: 10px;"></td>
          @foreach ($categories as $category)
          @if ($category->id == $product->product_categories_id)
          <td data-label="Product Category">{{ $category->name }}</td>
          @endif        
          @endforeach
          <td data-label="Product Description" style="overflow: auto;">
          
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $product->id }}">
  View Description
</button>

<!-- Modal -->
          <div class="modal fade" id="staticBackdrop{{ $product->id }}" style="z-index: 9;" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel" style="color: black">{{ $product->name }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="color: black">
                  {!! nl2br(e($product->description)) !!}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          </td>

          <td data-label="Product Price">{{ $product->price }}</td>
          <td data-label="Update Product">
            <button class="bxtn bxtn2"><a href="{{ route('products.edit', $product->id) }}" style="color: white;text-decoration: none;">Edit</a></button></td>
          <td data-label="Delete Product">
            <form
            method="POST"
            action="{{ route('products.destroy', $product->id) }}"
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