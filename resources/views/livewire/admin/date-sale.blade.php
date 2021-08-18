<div>
   <div class="container" style="padding: 30px 0;">
       <div class="row">
           <div class="col-md-12">
               <div class="panel panel-default">
                   @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                   @endif
                   <div class="panel-heading">
                       Sale Setting
                   </div>
                   <div class="panel-body">
                       <form action="" class="form-horizontal"  wire:submit.prevent="updateTime">
                           <div class="form-group">
                               <label for="status" class="col-md-4 control-label">Status</label>
                             <div class="col-md-4" >
                                 <select name="" class="form-control" id="" wire:model="status" wire:ignore>
                                     <option value="0">Active</option>
                                     <option value="1">Inactive</option>
                                 </select>
                             </div>
                           </div>

                           <div class="form-group">
                            <label for="status" class="col-md-4 control-label">SaleDate</label>
                          <div class="col-md-4">
                             <input type="text" id="sale-date" placeholder="YYYT/MM/DD H:M:S" class="form-control input-md" wire:model="sale_date" wire:ignore>
                          </div>
                        </div>


                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label"></label>
                          <div class="col-md-4">
                          <button type="submit" class="btn btn-primary">Update</button>
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
        $('#sale-date').datetimepicker({
            format : 'Y-MM-DD h:m:s',
        })

        .on('dp.change',function(ev){
            var data=$('#sale-date').val();
            @this.set('sale_date',data);
        });

    });
</script>
@endpush
