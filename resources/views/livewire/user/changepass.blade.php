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
                               Change password
                            </div>

                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="" wire:submit.prevent="changepass" >
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"> Old Password</label>
                                <div class="col-md-4">
                                    <input type="password" value="" class="form-control input-md"wire:model="old_pass" >

                                    @error('old_pass') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">New Password</label>
                                <div class="col-md-4">
                                    <input type="password" value=""  class="form-control input-md" wire:model="new_pass" >

                                    @error('new_pass') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Confirm Password </label>
                                <div class="col-md-4"  wire:ignore>
                                    <input type="password" value="" id="expiry_date" class="form-control input-md" wire:model="confirm_password" >

                                    @if (session()->has('error'))
                                    <div class="aler alert-danger" role="alert">{{ Session::get('error') }}</div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                      <button type="submit" class="btn btn-primary">Save</button>
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

