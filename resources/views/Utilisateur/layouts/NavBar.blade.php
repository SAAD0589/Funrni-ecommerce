 <!-- Start Header/Navigation -->
 <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

     <div class="container">
         <a class="navbar-brand" href="index.html">Furni<span>.</span></a>

         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
             aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarsFurni">
             <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                 <li class="nav-item {{ request()->routeIs('Produit.index') ? 'active' : '' }}">
                     <a class="nav-link" href="{{ route('Produit.index') }}">Home</a>
                 </li>
                 <li class="nav-item {{ request()->routeIs('Produits') ? 'active' : '' }}">
                     <a class="nav-link" href="{{ route('Produits') }}">Shop</a>
                 </li>
                 <li class="nav-item {{ request()->routeIs('AboutUs') ? 'active' : '' }}">
                     <a class="nav-link" href="{{ route('AboutUs') }}">About us</a>
                 </li>
                 <li class="nav-item {{ request()->routeIs('Contact') ? 'active' : '' }}">
                     <a class="nav-link" href="{{ route('Contact') }}">Contact us</a>
                 </li>
             </ul>


             <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                 @if (Auth::check())
                     <li class="nav-item dropdown mt-2 text-light fw-bold">

                         {{ Auth::user()->name }}
                         {{ Auth::user()->prenom }}
                     </li>
                 @else
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <img src={{ asset('assets/images/user.svg') }}>
                         </a>
                         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <a class="dropdown-item" href="/login">Login</a>
                             <a class="dropdown-item" href="/register">Sign Up</a>
                         </div>
                     </li>
                 @endif
                 <li>
                     <a class="nav-link" href="{{ route('Panier') }}">
                         <img src={{ asset('assets/images/cart.svg') }}>
                     </a>
                 </li>

                 @if (Auth::check())
                     <li class="nav-item mt-2">
                         <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                             <img class="iconLogout" src={{ asset('assets/images/Logout.svg') }}>
                         </a>
                     </li>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                 @endif
             </ul>
         </div>
     </div>

 </nav>
 <!-- End Header/Navigation -->
