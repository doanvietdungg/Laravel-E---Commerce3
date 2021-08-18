<div class="container">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
             @if (session()->has('message'))
             <div class="alert alert-success" role="alert" >{{ Session::get('message') }}</div>

             @endif
             <div class="panel-heading">
                 All Categories
                 <a class=" btn btn-success" href="/admin/Add_category">Add Category</a>
             </div>

             <div class="panel-body">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th>ID</th>
                             <th>Name</th>
                             <th>Slug</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($cate as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td><a class=" btn btn-primary" href="/admin/Edit_category/{{ $item->slug }}">Edit</a></td>
                                <td> <button type="button" onclick="confirm('Are you sure') || event.stopImmediatePropagation()"  class="btn btn-danger"  class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"  wire:click=delete({{ $item->id }})>
                                    Delete
                                  </button></td>
                            </tr>
                         @endforeach
                     </tbody>
                 </table>

            </div>
                 {{ $cate->links() }}
             </div>
         </div>
        </div>
    </div>
</div>
@section('title')
Admin_category
@endsection
