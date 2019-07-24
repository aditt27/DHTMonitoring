<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <a class="navbar-brand mr-1" href="<?php echo site_url() ?>"><?php echo SITE_NAME ?></a>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>

    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i> <?php if(isset($_SESSION['user'])) echo $_SESSION['user'];?>
            </a>
            <?php if(isset($_SESSION['user'])) { ?>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a data-toggle="modal" data-target="#ChangePassModal" href="#" class="dropdown-item">Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('logout/')?>"">Logout</a>
                </div>
            <?php } else { ?>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?php echo site_url('login/')?>"">Login</a>
                </div>
            <?php }?>

        </li>
    </ul>

</nav>