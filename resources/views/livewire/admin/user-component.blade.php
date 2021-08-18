<div class="container">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
             @if (session()->has('message'))
             <div class="alert alert-success" role="alert" >{{ Session::get('message') }}</div>

             @endif
             <div class="panel-heading">
               <h3>All User</h3>

             </div>

             <div class="panel-body">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th>ID</th>
                             <th>Name</th>
                             <th>Image</th>
                             <th>Email</th>
                             <th>UType</th>

                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($user as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td><img src="{{ asset('assets/images/Users') }}/{{ $item->image }}" width="90" alt=""></td>
                                <td>{{ $item->email }}</td>
                                <td>
                            @if ($item->utype == "ADM")
                                     <div  class=" btn btn-success"> Admin </div>
                                       @else
                                       <div  class=" btn btn-success" >User</div>
                            @endif
                                </td>
                                <td><a class=" btn btn-primary" href="/admin/EditUser/{{ $item->id }}">Edit</a></td>
                                <td> <button type="button" onclick="confirm('Are you sure') || event.stopImmediatePropagation()"  class="btn btn-danger"  class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"  wire:click=delete({{ $item->id }})>
                                    Delete
                                  </button></td>
                            </tr>
                         @endforeach
                     </tbody>
                 </table>

            </div>
                 {{ $user->links() }}
             </div>
         </div>
        </div>
    </div>
</div>
@section('title')
Admin_category
@endsection
