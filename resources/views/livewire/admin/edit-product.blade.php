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
                                <a href="{{ route('admin.Product') }}" class="btn btn-success pull-right">
                                    All Product
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>

                        @endif
                        <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                         <div class="form-group">
                             <label class="col-md-4 control-label">Product Name</label>
                             <div class="col-md-4">
                                 <input id="" class="form-control input-md" placeholder="Product-name" type="text"  wire:model="product_name">
                                 @error('product_name') <span class="error text-danger">{{ $message }}</span> @enderror
                             </div>

                         </div>

                         <div class="form-group">
                             <label class="col-md-4 control-label">Product Slug</label>
                             <div class="col-md-4">
                                 <input id="" class="form-control input-md" placeholder="Product_slug" type="text" wire:model="slug" >
                                 @error('slug') <span class="error text-danger">{{ $message }}</span> @enderror
                             </div>

                         </div>

                         <div class="form-group">
                             <label class="col-md-4 control-label">Short Description</label>
                             <div class="col-md-4">
                                 <textarea name="short-des" id="" class="form-control" placeholder="short desciption" wire:model="short_des" ></textarea>
                                 @error('short_des') <span class="error text-danger">{{ $message }}</span> @enderror
                             </div>

                         </div>


                         <div class="form-group">
                             <label class="col-md-4 control-label"> Description</label>
                             <div class="col-md-4">
                                 <textarea name="des" id="" class="form-control" placeholder="desciption" wire:model="description" ></textarea>
                                 @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
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
                             <label  class="col-md-4 control-label">Price sale</label>
                             <div class="col-md-4">
                                 <input id="" class="form-control input-md" type="number" placeholder="price sale" name="price_sale" wire:model="price_sale">

                             </div>

                         </div>

                         <div class="form-group">
                             <label class="col-md-4 control-label">SKU</label>
                             <div class="col-md-4">
                                 <input id="" class="form-control input-md" placeholder="SKU" type="text" name="sku" wire:model="SKU">
                                 @error('SKU') <span class="error text-danger">{{ $message }}</span> @enderror
                             </div>

                         </div>

                         <div class="form-group">
                             <label class="col-md-4 control-label">Status</label>
                             <div class="col-md-4">
                               <select class="form-control" wire:model="status">
                                   <option value="Instock">Instock</option>
                                   <option value="OutStock">Outstock</option>
                               </select>
                             </div>

                         </div>

                         <div class="form-group">
                             <label class="col-md-4 control-label">Featured</label>
                             <div class="col-md-4">
                               <select class="form-control" wire:model="featured">
                                   <option value="0">Yes</option>
                                   <option value="1">No</option>
                               </select>
                             </div>

                         </div>

                         <div class="form-group">
                             <label  class="col-md-4 control-label">Quantity</label>
                             <div class="col-md-4">
                                 <input id="" class="form-control input-md" type="number" name="quty" wire:model="quantity">
                                 @error('quantity') <span class="error text-danger">{{ $message }}</span> @enderror
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

                                 <img src="{{ asset('assets/images/products') }}/{{ $image }}" width="120" alt="">
                                 @endif
                             </div>

                         </div>


                         <div class="form-group">
                             <label class="col-md-4 control-label">Category</label>
                             <div class="col-md-4">
                               <select class="form-control" wire:model="category_id" >
                                 <option >All Category</option>
                                 @foreach ($cate as $item)
                                 <option value="{{ $item->id }}">{{ $item->name }}</option>
                                 @endforeach
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
