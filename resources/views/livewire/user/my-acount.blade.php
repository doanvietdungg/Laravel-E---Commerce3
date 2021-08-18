



<div class="container bootstrap snippet">
    <div class="row">
        @if (session()->has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>

        @endif
  		<div class="col-sm-10"><h1>User name</h1></div>

    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
            <form class="form" enctype="multipart/form-data" wire:submit.prevent="Update">

      <div class="text-center">
        @if ($new_image)
        <img src="{{ $new_image->temporaryUrl() }}" height="80"  alt="">

        @else

        <img src="{{ asset('assets/images/Users') }}/{{ $image }}"  height="80">
        @endif

        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload" wire:model="new_image">
      </div></hr><br>


          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>


          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul>

          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>

        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>

              </ul>
                 <a href="/user/ChangePassword" class="btn btn-primary">Change Password</a>
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>

                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="first_name"><h4>Name</h4></label>
                              <input type="text" class="form-control"    wire:model="name">
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control"  placeholder="you@email.com" title="enter your email." wire:model="email">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="email"><h4>Address</h4></label>
                              <input  class="form-control" id="location" placeholder="somewhere"  title="enter a location" wire:model="address">
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-xs-6" wire:ignore>
                            <label for="password2"><h4>Birthday</h4></label>
                              <input  class="form-control" name="password2" id="birthday" placeholder=""  title="enter your password2." wire:model="birthday">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>

                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	</form>

              <hr>

             </div><!--/tab-pane-->


        </div><!--/col-9-->
    </div><!--/row-->
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
