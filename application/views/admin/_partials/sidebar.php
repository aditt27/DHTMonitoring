<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url() ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Overview</span>
        </a>
    </li>

    <div class="sidebar-divider"></div>

    <h6 class="sidebar-header ">Devices</h6>
    <?php foreach ($devices as $device) {
        echo "<li class=\"nav-item ";
        echo $this->uri->segment(2) == $device ? 'active': '';
        echo "\">";
        echo "<a class=\"nav-link\" href=\"";
        echo site_url('devices/' . $device);
        echo "\">";
        echo $device;
        echo "</span></a></li>";
    }?>
</ul>