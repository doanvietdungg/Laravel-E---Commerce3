<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Slide
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.Slides') }}" class="btn btn-success pull-right">
                                    All Slide
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
                             <label class="col-md-4 control-label">Title</label>
                             <div class="col-md-4">
                                 <input id="" class="form-control input-md" placeholder="title" type="text"  wire:model="title" >
                                 @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
                             </div>

                         </div>

                         <div class="form-group">
                             <label class="col-md-4 control-label">SubTitle</label>
                             <div class="col-md-4">
                                 <input id="" class="form-control input-md" placeholder="SubTitle" type="text" wire:model="SubTitle" >
                                 @error('SubTitle') <span class="error text-danger">{{ $message }}</span> @enderror
                             </div>

                         </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Price</label>
                            <div class="col-md-4">
                                <input id="" class="form-control input-md" type="number" placeholder="Price" name="price" wire:model="price">
                                @error('price') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>


                         <div class="form-group">
                             <label class="col-md-4 control-label"> Link</label>
                             <div class="col-md-4">
                                 <textarea name="des" id="" class="form-control" placeholder="Link" wire:model="Link" ></textarea>
                                 @error('Link') <span class="error text-danger">{{ $message }}</span> @enderror
                             </div>

                         </div>



                         <div class="form-group">
                            <label  class="col-md-4 control-label">Product image</label>
                            <div class="col-md-4">
                                <input id="" class=" input-file" type="file"  name="img" wire:model="newImage">
                                @error('newImage') <span class="error text-danger">{{ $message }}</span> @enderror
                                @if ($newImage)
                                <img src="{{ $newImage->temporaryUrl() }}" width="120" alt="">
                                @else

                                <img src="{{ asset('assets/images/Sliders') }}/{{ $image }}" width="120" alt="">
                                @endif
                            </div>

                        </div>



                         <div class="form-group">
                             <label class="col-md-4 control-label">Status</label>
                             <div class="col-md-4">
                               <select class="form-control" wire:model="status">
                                   <option value="active">active</option>
                                   <option value="inactive">inactive</option>
                               </select>
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
