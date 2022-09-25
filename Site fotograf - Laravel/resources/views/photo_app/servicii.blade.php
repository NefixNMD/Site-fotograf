<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Shop</title>
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
<link rel="stylesheet" href="{{ url('css/stl.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script>
  //paste this code under the head tag or in a separate js file.
	// Wait for window load
  $(window).load(function() {
  // Animate loader off screen
  $(".se-pre-con").fadeOut("slow");;
});
</script>
<script>
  $(function () {
      $(document).ready(function () {
          $('.addCart').ajaxForm({
              beforeSend: function () {
                 
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
  <div class="se-pre-con"></div>
  @include('partials.shop_sidemenu')

  <div class="mainHolder">
    <div class="spacer">
      <div>
        <h1 style="text-transform: uppercase;">Shop</h1>
      </div>
      <div>
        @include("partials.shoping-cart")
      </div>
    </div>
    
    <div class="shopHolder">

      <div class="productHolder">
        
        @include("partials.product-card")
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