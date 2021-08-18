<x-guest-layout>
    <!--main area-->
     <main id="main" class="main-site left-sidebar">

         <div class="container">

             <div class="wrap-breadcrumb">
                 <ul>
                     <li class="item-link"><a href="/" class="link">home</a></li>
                     <li class="item-link"><span>Forgot password</span></li>
                 </ul>
             </div>
             <div class="row">
                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                     <div class=" main-content-area">
                         <div class="wrap-login-item ">
                             <div class="login-form form-item form-stl">
                                 <x-jet-validation-errors class="mb-4" />
                                 <form method="post" action="{{ route('password.email') }}"  name="frm-login">
                                     @csrf
                                     <fieldset class="wrap-title">
                                         <h3 class="form-title">Forgot password</h3>
                                     </fieldset>
                                     <fieldset class="wrap-input">
                                         <label for="frm-login-uname">Email Address:</label>
                                         <input type="text" id="frm-login-uname" name="email" placeholder="Type your email address" :value="old('email')" required autofocus>
                                     </fieldset>


                                     <input type="submit" class="btn btn-submit" value="Password reset link" name="submit">


                                 </form>
                             </div>
                         </div>
                     </div><!--end main products area-->
                 </div>
             </div><!--end row-->

         </div><!--end container-->

     </main>
     <!--main area-->
 </x-guest-layout>
