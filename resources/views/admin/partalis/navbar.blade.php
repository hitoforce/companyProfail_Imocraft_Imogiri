 <!-- Navbar Header -->
 <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
     <div class="container-fluid">


         <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">




             <li class="nav-item topbar-user dropdown hidden-caret">
                 <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">

                     <span class="profile-username">
                         <span class="op-7">Web</span>
                         <span class="fw-bold">IMOCRAFT</span>
                     </span>
                 </a>
                 <ul class="dropdown-menu dropdown-user animated fadeIn">
                     <div class="dropdown-user-scroll scrollbar-outer">

                         <li>
                             <div class="dropdown-divider"></div>
                             {{-- <a class="dropdown-item" href="#">My Profile</a>
                             <a class="dropdown-item" href="#">My Balance</a>
                             <a class="dropdown-item" href="#">Inbox</a>
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item" href="#">Account Setting</a> --}}
                             <div class="dropdown-divider"></div>
                             <form action="{{ route('logout') }}" method="POST">
                                 @csrf
                                 <button type="submit" class="btn btn-outline-danger w-100 py-3">
                                     <i class="fas fa-sign-out-alt fa-lg mb-2"></i> Logout
                                 </button>
                             </form>
                         </li>
                     </div>
                 </ul>
             </li>
         </ul>
     </div>
 </nav>
 <!-- End Navbar -->
