@include('header')

    <div class="container mt-5">
        <section id="form">
            <h1 class="text-center">CrossTee Telecoms</h1>
            <p class="lead text-center">Please login to proceed</p>

            @if(session()->has('message'))
            <div class="alert alert-danger" role="alert">
              {{session('message')}}
            </div>
            @endif

            <form action="/loginReq" method="POST" onsubmit="switchVisible();">
                @csrf
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" name="email" id="email" required>
                  <label for="floatingInput">Email address</label>
                </div>

                <div class="form-floating">
                  <input type="password" class="form-control" name="password" id="password" required>
                  <label for="floatingPassword">Password</label>
                </div>

                <div class="mt-3 text-center">
                    <!-- Button trigger modal -->
                    <button type="button" id="accept_button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#confirmation">
                      Submit
                    </button>

                    <button class="btn btn-primary" id="loading_button" style="display: none;" type="button" disabled>
                      <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                      <span role="status">Loading...</span>
                    </button>

                </div>

                <!-- Modal -->
                <div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title fs-5" id="exampleModalLabel">Are you sure?</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Login</button>
                      </div>
                    </div>
                  </div>
                </div>

            </form>
        </section>

    </div>

@include('footer')
