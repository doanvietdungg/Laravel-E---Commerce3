<div class="container">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
             @if (session()->has('message'))
             <div class="alert alert-success" role="alert" >{{ Session::get('message') }}</div>

             @endif
             <div class="panel-heading">
              <h2> All Orders</h2>

             </div>

             <div class="panel-body">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                            <th>Order ID</th>
                            <th>SubTotal</th>
                            <th>discount</th>
                            <th>Tax</th>
                            <th>Total</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Zip code</th>
                            <th>status</th>
                            <th>Date</th>
                            <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($order as $item)
                            <tr>
                               <td>{{ $item->id }}</td>
                               <td>{{ $item->subtotal }}</td>
                               <td>{{ $item->discount }}</td>
                               <td>{{ $item->tax }}</td>

                               <td>{{ $item->total }}</td>
                               <td>{{ $item->first_name }}</td>
                               <td>{{ $item->last_name }}</td>
                               <td>{{ $item->mobile }}</td>
                               <td>{{ $item->email }}</td>
                               <td>{{ $item->zip_code }}</td>
                               <td>{{ $item->status }}</td>
                               <td>{{ $item->created_at }}</td>

                                <td ><a href="/user/AllOrder/{{ $item->id }}"  class="btn btn-success">Detail Order</a></td>
                                <td> <button type="button" onclick="confirm('Are you sure') || event.stopImmediatePropagation()"    class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"  wire:click=delete({{ $item->id }})>
                                    Delete
                                  </button></td>
                            </tr>
                         @endforeach
                     </tbody>
                 </table>

            </div>
                 {{ $order->links() }}
             </div>
         </div>
        </div>
    </div>
</div>
@section('title')
Orders
@endsection
