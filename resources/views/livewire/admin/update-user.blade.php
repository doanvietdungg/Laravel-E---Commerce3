<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.User') }}" class="btn btn-success pull-right">
                                    All User
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>

                        @endif
                        <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="update">
                         <div class="form-group">
                             <label class="col-md-4 control-label">User Name</label>
                             <div class="col-md-4">
                                 <input id="" class="form-control input-md" placeholder="Product-name" type="text"  wire:model="name">
                                 @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                             </div>

                         </div>

                         <div class="form-group">
                             <label class="col-md-4 control-label">Email</label>
                             <div class="col-md-4">
                                 <input id="" class="form-control input-md" placeholder="Product_slug" type="text" wire:model="email" >
                                 @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                             </div>

                         </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Address</label>
                            <div class="col-md-4">
                                <input id="" class="form-control input-md" placeholder="Address" type="text" wire:model="address" >
                                @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>

                         <div class="form-group">
                             <label class="col-md-4 control-label">Birthday</label>
                             <div class="col-md-4"  wire:ignore>
                                 <input name="short-des" id="birthday" class="form-control" placeholder="short desciption" wire:model="birthday" ></input>
                                 @error('birthday') <span class="error text-danger">{{ $message }}</span> @enderror
                             </div>

                         </div>






                         <div class="form-group">
                             <label class="col-md-4 control-label">Admin/User</label>
                             <div class="col-md-4">
                               <select class="form-control" wire:model="utype">
                                   <option value="ADM">Admin</option>
                                   <option value="USR">User</option>
                               </select>
                             </div>

                         </div>



                         <div class="form-group">
                             <label  class="col-md-4 control-label">Product image</label>
                             <div class="col-md-4">
                                 <input id="" class=" input-file" type="file"  name="img" wire:model="new_image">
                                 @error('newImage') <span class="error text-danger">{{ $message }}</span> @enderror
                                 @if ($new_image)
                                 <img src="{{ $new_image->temporaryUrl() }}" width="120" alt="">

                                 @else

                                 <img src="{{ asset('assets/images/Users') }}/{{ $image }}" width="120" alt="">
                                 @endif
                             </div>

                         </div>



                             <div class="form-group">
                                 <label class="col-md-4 control-label"></label>
                                 <div class="col-md-4">
                                     <button type="submit" class="btn btn-primary">Submit</button>
                                 </div>

                             </div>
                     </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 @push('scripts')
 <script>
     $(function(){
         $('#birthday').datetimepicker({
               format: 'Y-MM-DD'
         })
         .on('dp.change',function(){
             var data=$('#birthday').val();
             @this.set('birthday',data);
         });
     });
 </script>

 @endpush
