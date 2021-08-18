<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        Manager Home Categories
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="updateHome_cate">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Choose categories</label>
                                <div class="col-md-4" wire:ignore>
                                    <select class="sel_categories form-control" name="categories[]"  multiple="multiple" wire:model="selected_categories" >
                                        @foreach ($cate as $item)
                                           <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">No of product</label>
                                <div class="col-md-4">
                                   <input type="text" class="form-control input-md" wire:model="numberofprofucts">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">No of product</label>
                                <div class="col-md-4">
                                   <button type="submit" class=" btn btn-primary">Submit</button>
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
    $(document).ready(function(){
        $('.sel_categories').select2("");
        $('.sel_categories').on('change',function(e){
            var data = $('.sel_categories').select2("val");
            @this.set('selected_categories',data);

        });

    });
</script>
@endpush
