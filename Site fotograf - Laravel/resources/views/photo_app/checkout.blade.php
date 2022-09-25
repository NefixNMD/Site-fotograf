<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Finalizare Comanda</title>
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
            <span>FINALIZARE</span>
            <span>COMANDA</span>
          </div>
          <br>
          <x-auth-session-status class="app-form-control mt-4" :status="session('status')" />

          <!-- Validation Errors -->
          <x-auth-validation-errors class="app-form-control" :errors="$errors" />

          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">NR. CRT</th>
                <th scope="col">NUME PRODUS</th>
                <th scope="col">PRET</th>
              </tr>
            </thead>
            <tbody>
              @php
                $total_value=0.00;
                $nr_crt = 1;
              @endphp
              @foreach ($products as $product)
                @foreach ($carts as $cart)
                  @if ($product->id == $cart->products_id)
                  @php
                   $total_value = $total_value + $product->price;
                  @endphp
                  <tr>
                    <th scope="row">{{ $nr_crt }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }} Lei</td>
                  </tr>
                  @php
                  $nr_crt++;
                @endphp
                  @endif
                @endforeach
              @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-end">
            <h5>Total: <div class="price text-success" id='total_price' name='total_price' style="font-size: 30px!important;">{{ $total_value }} Lei</div></h5>
          </div>


        </div>
        <div class="screen-body-item">
          <div class="app-form">
            <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
              @csrf
      
              <!-- Email Address -->
              <div class="app-form-group">
                  <x-input id="first_name" class="app-form-control" placeholder="FIRST NAME" type="first_name" name="first_name"  />
              </div>
              <div class="app-form-group">
                <x-input id="last_name" class="app-form-control" placeholder="LAST NAME" type="last_name" name="last_name"  />
            </div>
            <div class="app-form-group">
              <x-input id="email" class="app-form-control" placeholder="EMAIL ADDRESS" type="email" name="email"  />
          </div>
          <div class="app-form-group">
            <x-input id="phone" name="phone" class="app-form-control" placeholder="PHONE NUMBER" type="tel"  />
        </div>
        <div class="app-form-group">
          <x-input id="address" class="app-form-control" placeholder="DELIVERY ADDRESS" type="address" name="address"  />
          <x-input id="total_price" class="app-form-control"  type="total_price" name="total_price"  value="{{ $total_value }}" hidden/>
      </div>
      <div class="app-form-group">
        <div>
          @php
          $i = 0
          @endphp
          <label for="f-option" class="l-radio">
            <input type="radio" id="f-option" name="selector" tabindex='{{$i}}' value='{{$i}}'>
            <span style="text-transform: uppercase;font-size: medium;">Plata ramburs la curier</span>
          </label>
          @php
          $i ++
          @endphp
        </div>
      </div>


      


      
              <x-button class="app-form-control" style="padding-right: 0!important;padding-left: 0!important;">
                Finalizeaza comanda
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