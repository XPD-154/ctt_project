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
                        <th scope="col">Requesting Staff</th>
                        <th scope="col">Authorizing Staff</th>
                        <th scope="col">Approved</th>
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

                        <td>{{$item->requesting_staff}}</td>
                        <td>{{$item->authorizing_staff}}</td>

                        <td>
                        <a style="color: inherit; text-decoration: none;" href="/edit/{{$item->id}}"><button type="button" onclick="switchVisible_3()" class="btn btn-outline-info">Edit</button></a>
                        </td>
                        
                      </tr>
                      @endforeach

                    </tbody>

                </table>

                <span>{{$data->links()}}</span>

          </div>
        </section>

    </div>
@include('footer')