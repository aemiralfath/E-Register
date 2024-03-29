<!-- Sidebar -->
<ul class="sidebar navbar-nav">
        <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active':''?>">
          <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Customers:</h6>
            <a class="dropdown-item" href="<?php echo site_url('admin/event') ?>">List Event</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/customers') ?>">List Customers</a>    
            
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin/login-register/charts.html') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin/customers') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li>
      </ul>