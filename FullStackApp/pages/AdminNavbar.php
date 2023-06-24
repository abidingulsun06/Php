<?php

use fullStackApp\Session;

?>
<nav class="navbar align-items-start justify-content-start p-3 flex-column navbar-dark bg-dark" style="height: 100%">
  <a class="navbar-brand text-danger" href="#">Admin Template</a>
  <ul class="my-nav m-0 p-0">
    <li class="nav-item">
      <a class="nav-link active text-white" aria-current="page" href="members.php">Members</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="#">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="#">Admin</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Dropdown
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="<?php Session::delAll(); ?>">
        Logout</a>
    </li>
  </ul>
</nav>