<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Orders</title>
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
    <h1>My Orders</h1>
    <table>
      <thead>
        <tr>
          <th scope="col">Numar Comanda</th>
          <th scope="col">Date de contact</th>
          <th scope="col">Produse</th>
          <th scope="col">Valoare totala</th>
          <th scope="col">Status comanda</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
        <tr>
          <td data-label="Numar Comanda">{{ $order->id }}</td>
          <td data-label="Date de contact" style="overflow: auto;">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $order->id }}">
            Date de contact
          </button>
          
          <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop{{ $order->id }}" style="z-index: 9;" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel" style="color: black">Date de contact</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body" style="color: black;     display: flex;flex-direction: column;flex-wrap: nowrap;align-content: flex-start;justify-content: flex-start;align-items: flex-start;">
                          <div>First name: {{ $order->first_name }}</div>
                          <div>Last name: {{ $order->last_name }}</div>
                          <div>Phone Number: {{ $order->phone_number }}</div>
                          <div>Email Address: {{ $order->email_address }}</div>
                          <div>Delivery Address: {{ $order->address}}</div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td data-label="Produse" style="overflow: auto;">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taticBackdrop{{ $order->id }}">
                      Produse
                    </button>
                    
                    <!-- Modal -->
                              <div class="modal fade" id="taticBackdrop{{ $order->id }}" style="z-index: 9;" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdropLabel" style="color: black">Produse comandate</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="color: black">
                                      @foreach ($products as $product)
                                      @foreach ($order_products as $orp)
                                        @if ($orp->products_id == $product->id && $orp->orders_id == $order->id)
                                        <div class="card mb-4">
                                          <a href="/product/{{ $product->id }}"><img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="width:100%"></a>
                                          <h1 >{{ $product->name }}</h1>
                                          <p class="price">{{ $product->price }} Lei</p>
                                          <p class="desc">{{ $product->description }}</p>
                                        </div>
                                        @endif
                                      @endforeach
                                        
                                      @endforeach
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td data-label="Valoare Totala">{{ $order->total_price }} Lei</td>
                            <td data-label="Status comanda" style="color:greenyellow">
                              @if ($order->order_status == 0)
                                In desfasurare
                              @else
                                Completa
                              @endif
                            </td>
                            @endforeach
        </tr>
      </tbody>
    </table>
  </div>
  
 @include("partials.background")
</body>
</html>