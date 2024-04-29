@include('header')
    <div class="container-fluid mt-5">

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
          <p class="lead text-center">Records of inputted credit awaiting approval</p>

          <div class="table-responsive">

                @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                  {{session('message')}}
                </div>
                @endif
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Account</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Approval Status</th>
                        <th scope="col">Requesting Staff</th>
                        <th scope="col">Authorizing Staff</th>
                        <th scope="col">Previous Balance</th>
                        <th scope="col">Current Balance</th>
                        <th scope="col">Request Creation Date</th>
                        <th scope="col">Request Update Date</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">

                      @foreach($data as $item)
                      <tr>
                        <th scope="row">
                          {{$item->id}}
                        </th>
                        <td>
                          {{$item->account}}
                        </td>
                        <td>
                          {{$item->credit_amount}}
                        </td>

                        <td>
                          {{$item->approval_status}}
                        </td>

                        <td>{{$item->requesting_staff}}</td>
                        <td>{{$item->authorizing_staff}}</td>
                        <td>{{$item->before_balance}}</td>
                        <td>{{$item->after_balance}}</td>
                        <td>{{$item->created_on}}</td>
                        <td>{{$item->updated_on}}</td>
                        
                      </tr>
                      @endforeach

                    </tbody>

                </table>

                <span>{{$data->links()}}</span>

          </div>

            <div class="mt-3 text-center">
                
                <div id="accept_button_4">
                @if(session()->get('user')==env('CROSSTEE_REQ_MAIL'))
                <a style="color: inherit; text-decoration: none;" href="/form"><button type="button" onclick="switchVisible_4();" class="btn btn-outline-dark btn-lg">Go Back</button></a>
                @elseif(session()->get('user')==env('CROSSTEE_AUTH_MAIL'))
                <a style="color: inherit; text-decoration: none;" href="/record"><button type="button" onclick="switchVisible_4();" class="btn btn-outline-dark btn-lg">Go Back</button></a>
                @endif
                </div>

                <button class="btn btn-primary" id="loading_button_4" style="display: none;" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                    <span role="status">Loading...</span>
                </button>

            </div>

        </section>

    </div>
@include('footer')