<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    @if (session()->has('message'))
                    <div class="aler alert-success" role="alert">{{ Session::get('message') }}</div>
       @endif
                    <div class="panel-heading">

                        <div class="row">
                            <div class="col-md-6">
                                Add New Category
                            </div>
                            <div class="col-md-6">
                                <a class=" pull-right btn btn-success" href="/admin/Category">All Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="" wire:submit.prevent="update">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"> Category_name</label>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control input-md"  wire:model="name">
                                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"> Category_Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Slug_category" class="form-control input-md" wire:model="slug">
                                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
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
    {{-- The best athlete wants his opponent at his best. --}}
</div>
