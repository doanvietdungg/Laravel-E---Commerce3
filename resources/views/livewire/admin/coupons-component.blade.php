<div class="container">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
             @if (session()->has('message'))
             <div class="alert alert-success" role="alert" >{{ Session::get('message') }}</div>

             @endif
             <div class="panel-heading">
                 All Coupons
                 <a class=" btn btn-success" href="/admin/AddCoupons">Add Coupons</a>
             </div>

             <div class="panel-body">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th>ID</th>
                             <th>Code</th>
                             <th>Type</th>
                             <th>Value</th>
                             <th>Cart value</th>
                             <th>Expiry_date</th>
                             <th>Action</th>

                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($coupons as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->type }}</td>
                                @if ($item->type == 'fixed')
                                    <td>${{ $item->value }}</td>
                                    @else
                                    <td>{{ $item->value }}%</td>
                                @endif

                                <td>{{ $item->cart_value }}</td>
                                <td>{{ $item->expiry_date }}</td>

                                <td><a class=" btn btn-primary" href="/admin/EditCoupons/{{ $item->id }}">Edit</a></td>
                                <td> <button type="button" onclick="confirm('Are you sure') || event.stopImmediatePropagation()" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"  wire:click=delete({{ $item->id }})>
                                    Delete
                                  </button></td>
                            </tr>
                         @endforeach
                     </tbody>
                 </table>

            </div>

             </div>
         </div>
        </div>
    </div>
</div>
@section('title')
Admin_category
@endsection
