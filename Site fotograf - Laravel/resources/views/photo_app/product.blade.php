<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $product->name }}</title>
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
<link href="{{ url('css/contact.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ url('css/stl.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<style>
  body, button, input {
    font-family: 'Open Sans Condensed', sans-serif!important;
    font-weight: 400!important;
    letter-spacing: 1px!important;
}
  a.buy-btn{
  display:block;
  color: white;
  text-align:center;
  font-size: 18px;
  width:35px;
  height:35px;
  line-height:35px;
  border-radius:50%;
  border:1px solid white;
  transition: all 0.2s ease-in-out;
}
a.buy-btn:hover , a.buy-btn:active, a.buy-btn:focus{
  border-color: white;
  background: white;
  color: #212121;
  text-decoration:none;
}
.wsk-btn{
  display:inline-block;
  color:#212121;
  text-align:center;
  font-size: 18px;
  transition: all 0.2s ease-in-out;
  border-color: #FF9800;
  background: #FF9800;
  padding:12px 30px;
  border-radius:27px;
  margin: 0 5px;
}
.wsk-btn:hover, .wsk-btn:focus, .wsk-btn:active{
  text-decoration:none;
  color:#fff;
} 
</style>
<script>
  $(function () {
      $(document).ready(function () {
          $('.addCart').ajaxForm({
              beforeSend: function () {
                  var percentage = '0';
              },
              complete: function (xhr) {
                OnSuccess()
                Swal.fire(
                  'Congrats!',
                  'Product added successfully to cart!',
                  'success'
                )
              }
          });
      });
  });
</script>
</head>
<body class="imd">

  @include('partials.navbar')

  <div class="contactHolder">
    <div>
    </div>
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
      <div style="display: flex;flex-direction: row-reverse;flex-wrap: nowrap;align-content: center;justify-content: space-between;align-items: center;">
      <div style="padding-right: 20px;">
        @include("partials.shoping-cart")
      </div></div>
      <div class="screen-body">
        
        <div class="screen-body-item left" style="padding-top: 5px;">
          <div class="app-title mb-5">
            <span style="text-transform:uppercase">{{ $product->name }}</span>
          </div>
          <img src="{{ Storage::url($product->image) }}" alt="Product" class="img-responsive" style="    border-radius: 30px;height: auto;width: 100%;"/>
        </div>
        <div class="screen-body-item" style="padding-top: 5px;">
          <div class="app-form">
            <div class="wsk-cp-text">
              <div class="title-product" style="font-weight: 400!important;font-family: 'Open Sans Condensed', sans-serif!important;">
                <h3 style="text-transform: uppercase;">Product name: {{ $product->name }}</h3>
              </div>
              @foreach ($categories as $category)
              @if ($category->id == $product->product_categories_id)
              <div class="category">
                <span class="title-product" style="font-weight: 400!important;font-family: 'Open Sans Condensed', sans-serif!important;text-transform: uppercase;">Category: {{ $category->name }}</span>
              </div>
              @endif

              @endforeach


              <div class="description-prod" style=" overflow-wrap: anywhere;font-weight: 400!important;font-family: 'Open Sans Condensed', sans-serif!important;">
                <p class="mt-5" style="text-transform: uppercase;font-size: medium;">{!! nl2br(e($product->description)) !!}</p>
              </div>
              <div class="card-footer mt-5" style="display: flex;flex-direction: row;align-content: center;justify-content: space-between;align-items: center;">
                <div class="wcf-left"><span class="price mt-5" style="font-weight: 400!important;font-family: 'Open Sans Condensed', sans-serif!important;color:white">{{ $product->price }} LEI</span></div>
                <form id="addCart{{ $product->id }}" class="addCart" action="{{ route('carts.store') }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction: row-reverse;">@csrf <input type="hidden" value="{{ $product->id }}" name="product_id"><button style="    border: 0px;background: transparent;"><div class="wcf-right"><a href="" onclick="" class="buy-btn"><i class="bi bi-cart"></i></a></div></button></form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  
 @include("partials.background")

 <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script  src="{{ url('./js/script.js') }}"></script> 
<script>
          function OnSuccess() {
            $.ajax({
                url: '/carts/show',
                _token: '{{csrf_token()}}',
                type: "get",
                datatype: "html",
                data:{'_token': $('input[name=_token]').val()},
            
                error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
          location.reload();
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
    },


                success: function (data) {
          //  data=JSON.decode(data);
          check =JSON.stringify(data.empty);
          if(!data.empty){
            $.each(data, function(index, value) {
            resp =JSON.stringify(data.data);
            resp= JSON.parse(resp);
            $('#cart').html(resp); 
          })
          }
       } 
        
        }).done(function (data) {
          if(!data.empty){
    resp = JSON.stringify(data.total_price);
    //resp= JSON.parse(resp);
    $("#total_price").html(parseFloat(resp).toFixed(2) + ' Lei');    } 
  })};





        $(document).ready(function () {
    var data = $(this).serialize();
  $.ajax({
          url: '/carts/show',
          _token: '{{csrf_token()}}',
          type: "GET",
          ajax: true,
          //datatype: "json",
          data: {
          _token: '{{csrf_token()}}',
          _method: "GET",
          data: data,
      },

      error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
    },      
      
          success: function (data) {
          //  data=JSON.decode(data);
          check =JSON.stringify(data.empty);
          if(!data.empty){
            $.each(data, function(index, value) {
            resp =JSON.stringify(data.data);
            resp= JSON.parse(resp);
            $('#cart').html(resp); 
          })
          }
       }  
       
  }).done(function (data) {
    if(!data.empty){
    resp = JSON.stringify(data.total_price);
    //resp= JSON.parse(resp);
    $("#total_price").html(parseFloat(resp).toFixed(2) + ' Lei');   
    }  
  });


    $("body").on("click","#deleteCompany",function(e){



        e.preventDefault();
        var id = $(this).data("id");
        // var id = $(this).attr('data-id');
        var token = $("meta[name='csrf-token']").attr("content");
        var url = e.target;

        $.ajax(
            {
              url: "../carts/"+id,
              type: 'POST',
              data: {
                _token: '{{csrf_token()}}',
                    id: id,
                _method: "DELETE",
            },
            error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
          location.reload();
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
    }, 
            success: function (response){

                $("#success").html(response.message)
                
                Swal.fire(
                  'Remind!',
                  'Product deleted successfully!',
                  'success'
                )
                OnSuccess()
            }
        });
          return false;
      });
        

    });
    </script>
</body>
</html>