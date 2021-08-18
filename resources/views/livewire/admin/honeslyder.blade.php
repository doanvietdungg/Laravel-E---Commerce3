<div class="container">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
             @if (session()->has('message'))
             <div class="alert alert-success" role="alert" >{{ Session::get('message') }}</div>

             @endif
             <div class="panel-heading">
                 All Product
                 <a class=" btn btn-success" href="/admin/AddSlides">Add Slide</a>
             </div>

             <div class="panel-body">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th>ID</th>
                             <th>Title</th>
                             <th>SubTitle</th>
                             <th>Price</th>
                             <th>Link</th>
                             <th>Image</th>
                             <th>Status</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($slide as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->subtitle }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->link }}</td>
                                <td><img src="{{ asset('assets/images/Sliders') }}/{{ $item->image }}" width="80" alt=""></td>

                                <td>{{ $item->status }}</td>

                                <td><a class=" btn btn-primary" href="/admin/EditSlides/{{ $item->id }}">Edit</a></td>
                                <td> <button type="button" onclick="confirm('Are you sure') || event.stopImmediatePropagation()"  class="btn btn-danger"  class="btn btn-danger" wire:click=delete({{ $item->id }})>
                                    Delete
                                  </button></td>
                            </tr>
                       @endforeach
                     </tbody>
                 </table>

            </div>
               {{-- //  {{ $prd->links() }} --}}
             </div>
         </div>
        </div>
    </div>
</div>
@section('title')
Admin_Slides
@endsection
