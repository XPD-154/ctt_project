@include('header')

    <div class="container mt-5">

        <div class="text-center" id="spinner">
          <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-border text-secondary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>

        <section id="form">

            <h1 class="text-center">CrossTee Telecoms</h1> 
            <p class="lead text-center">Please confirm approval or disapproval</p>
                
            @if(session()->has('message'))
            <div class="alert alert-danger" role="alert">
              {{session('message')}}
            </div>
            @endif

            <form action="/sumitReq" method="POST" onsubmit="switchVisible_3()">
                @csrf

                <input type="hidden" name="id" value="{{$data->id}}" />

                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="account" id="account" value="{{$data->account}}" readonly>
                  <label for="floatingInput">Account</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="number" class="form-control" name="amount" id="amount" value="{{$data->credit_amount}}" readonly>
                  <label for="floatingPassword">Amount</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="staff" id="staff" value="{{$data->requesting_staff}}" readonly>
                  <label for="floatingInput">Requesting Staff</label>
                </div>

                <div class="mt-3 text-center">
                    
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#approval">Approve Request</button>
                      <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#rejection">Reject Request</button>
                      <button type="button" class="btn btn-outline-warning"><a style="color: inherit; text-decoration: none;" href="/record">Go Back</a></button>
                    </div>

                </div>

                <!-- Modal -->
                <div class="modal fade" id="approval" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title fs-5" id="exampleModalLabel">Are you sure of this Approval?</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="approved" class="btn btn-success">Yes</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="rejection" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title fs-5" id="exampleModalLabel">Are you sure of this Disapproval?</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="rejected" class="btn btn-success">Yes</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                      </div>
                    </div>
                  </div>
                </div>

            </form>
        </section>

    </div>

@include('footer')
