<div class="container">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
             @if (session()->has('message'))
             <div class="alert alert-success" role="alert" >{{ Session::get('message') }}</div>

             @endif
             <div class="panel-heading">
                 All Product
                 <a class=" btn btn-success" href="/admin/AddProduct">Add Product</a>
             </div>

             <div class="panel-body">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th>ID</th>
                             <th>Name</th>
                             <th>Category</th>
                             <th>Image</th>
                             <th>Price</th>
                             <th>Price_sale</th>
                             <th>Status</th>
                             <th>Date</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($prd as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td><img src="{{ asset('assets/images/products') }}/{{ $item->image }}" width="80" alt=""></td>
                                <td>{{ $item->regular_price }}</td>
                                <td>{{ $item->sale_price }}</td>
                                <td>{{ $item->stock_status }}</td>
                                <td>{{ $item->created_at }} : {{ $item->updated_at }}</td>
                                <td><a class=" btn btn-primary" href="/admin/EditProduct/{{ $item->slug }}">Edit</a></td>
                                <td> <button type="button" onclick="confirm('Are you sure') || event.stopImmediatePropagation()" class="btn btn-danger"  class="btn btn-danger" wire:click=delete({{ $item->id }})>
                                    Delete
                                  </button></td>
                            </tr>
                         @endforeach
                     </tbody>
                 </table>

            </div>
                 {{ $prd->links() }}
             </div>
         </div>
        </div>
    </div>
</div>
@section('title')
Admin_Product
@endsection
