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
                                Edit Coupons
                            </div>
                            <div class="col-md-6">
                                <a class=" pull-right btn btn-success" href="/admin/Coupons">All Coupons</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="" wire:submit.prevent="updateCoupons">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"> Code</label>
                                <div class="col-md-4">
                                    <input type="text" value="" placeholder="Code_coupons" class="form-control input-md" wire:model="code" >

                                    @error('code') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Type</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="type">
                                        <option value="0">Fixed</option>
                                        <option value="1">Percent</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Value</label>
                                <div class="col-md-4">
                                    <input type="text" value="" placeholder="Value" class="form-control input-md" wire:model="value" >

                                    @error('value') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Cart_Value</label>
                                <div class="col-md-4">
                                    <input type="text" value="" placeholder="cart_value" class="form-control input-md" wire:model="cart_value" >

                                    @error('cart_value') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Expiry_date</label>
                                <div class="col-md-4"  wire:ignore>
                                    <input type="text" value="" id="expiry_date" placeholder="expiry_date" class="form-control input-md" wire:model="expiry_date" >

                                    @error('expiry_date') <span class="error text-danger">{{ $message }}</span> @enderror

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
@push('scripts')
<script>
    $(function(){
        $('#expiry_date').datetimepicker({
              format: 'Y-MM-DD'
        })
        .on('dp.change',function(){
            var data=$('#expiry_date').val();
            @this.set('expiry_date',data);
        });
    });
</script>

@endpush
