<div class="container">
    <button type="button" class="efct" data-toggle="modal" data-target="#cartModal" style="border-radius: 100%;">
      <svg xmlns="http://www.w3.org/2000/svg" width="7vh" height="7vh" fill="currentColor" class="bi bi-basket3 eft" viewBox="0 0 16 16" style="padding: 13px;">
        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
      </svg>
    </button>  
  </div>

  <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content" style="z-index: 99!important; background-color:rgba(0,0,0,.85)!important;">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title" id="exampleModalLabel">
            Your Shopping Cart
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;background-color: black;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="z-index: 99!important">
          <table class="table table-image" name='cart' id='cart'>
            <thead>
              <tr>
                <th scope="col" class="col-txt"></th>
                <th scope="col" class="col-txt">Product</th>
                <th scope="col" class="col-txt">Price</th>
                <th scope="col" class="col-txt">Actions</th>
              </tr>
            </thead>



          </table> 
          <div class="d-flex justify-content-end">
            <h5>Total: <div class="price text-success" id='total_price' name='total_price' style="font-size: 30px!important;">0 Lei</div></h5>
          </div>
        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success"><a href="/checkout" style="color: white;text-decoration: none;">Checkout</a></button>
        </div>
      </div>
    </div>
  </div>
