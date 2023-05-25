 <!-- partial:partials/_header.html -->
 <nav class="t-header">
     <div class="t-header-brand-wrapper">
         <a href="index.html">
             <img class="logo" src="{{ asset('images/logo/oic-logo.png') }}" alt="">
             <h1>| ASSETS</h1>
             <img class="logo-mini" src="{{ asset('images/logo_mini.svg') }}" alt="">
         </a>
     </div>
     <div class="t-header-content-wrapper">
         <div class="t-header-content">
             <div class="t-header-content-wrapper">
                 <form action="{{ route('logout') }}" id="logout" method="POST">
                     @csrf
                     <a type="submit" class="btn btn-info text-white" role="button"
                         onclick="document.getElementById('logout').submit();">
                         Log - Out
                     </a>
                 </form>
             </div>
         </div>
     </div>
 </nav>
