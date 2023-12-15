 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-light navbar-white">
     <div class="container">
         <a href="<?= base_url('home'); ?>" class="navbar-brand">
             <!-- <img src="<?= base_url('assets/img/icon.png') ?>" class="brand-image " style="opacity: .8"> -->
             <span class="info-box-icon"><i class="fas fa-home"></i></span>
             <span class="brand-text font-weight-light">Pasukan Timur</span>
         </a>

         <!-- Left navbar links -->
         <ul class="navbar-nav">
             <!-- 
             <li class="nav-item d-none d-sm-inline-block">
                 <a href="<?= base_url('dtdc'); ?>" class="nav-link">DTDC</a>
             </li> -->
             <!-- Nav Item - User Information -->
             <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-circle elevation-2" alt="User Image" style="height:24px;width:24px">
                     <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                 </a>
                 <!-- Dropdown - User Information -->
                 <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                     <a class="dropdown-item" href="<?= base_url('user'); ?>">
                         <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                         My Profile
                     </a>
                     <a class="dropdown-item" href="<?= base_url('user/edit'); ?>">
                         <i class="fas fa-fw fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                         Edit Profile
                     </a>
                     <a class="dropdown-item" href="<?= base_url('user/changepassword'); ?>">
                         <i class="fas fa-fw fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                         Change Password
                     </a>

                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                         <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                         Logout
                     </a>
                 </div>
             </li>
             <!-- <li class="nav-item"> -->
         </ul>

         <!-- SEARCH FORM -->
         <!-- <form class="form-inline ml-3">
             <div class="input-group input-group-sm">
                 <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-navbar" type="submit">
                         <i class="fas fa-search"></i>
                     </button>
                 </div>
             </div>
         </form> -->


     </div>
 </nav>
 <!-- /.navbar -->