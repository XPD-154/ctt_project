@include('header')
    <div class="container mt-5">
        <section id="form">
            <h1 class="text-center">CrossTee Telecoms</h1>
            <p class="lead text-center">Input credit associated with account</p>

            @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
              {{session('message')}}
            </div>
            @endif

            <form action="/submitData" method="POST" onsubmit="switchVisible();">
            @csrf
            
                <label for="account" class="form-label">Select Account</label>
                <input class="form-control" list="accountList" id="account" name="account" placeholder="Type to search...">
                <datalist id="accountList">

                  @foreach($data as $item)
                  <option value="{{$item->account}}">
                  @endforeach

                </datalist>

                <div class="mt-3">
                  <label for="amount" class="form-label">Enter Amount</label>
                  <div class="input-group">
                    <span class="input-group-text">&#8358;</span>
                    <input type="number" name="amount" class="form-control" required>
                    <span class="input-group-text">.00</span>
                  </div>
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
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>

            </form>

        </section>

    </div>
@include('footer')