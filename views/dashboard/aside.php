<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
<?php if(isset($_SESSION['roleee_id']) && $_SESSION['roleee_id']==1){?>
<li class="nav-item">
    <a class="nav-link " href="index.php">
      <i class="bi bi-grid"></i>
      <span>Statistiques  </span>
    </a>
  </li>

  <li class="nav-item ">
    <a class="nav-link collapsed" href="index.php?action=formateur">
      <i class="bi bi-grid"></i>
      <span>Formateur</span>
    </a>
  </li>
  <li class="nav-item ">
    <a class="nav-link collapsed" href="index.php?action=aprennat">
      <i class="bi bi-grid"></i>
      <span>apprenant</span>
    </a>
  </li> <?php } ?>
  <?php if(isset($_SESSION['roleee_id']) && $_SESSION['roleee_id']==2){?>
  <li class="nav-item ">
    <a class="nav-link collapsed" href="index.php?action=class">
      <i class="bi bi-grid"></i>
      <span>Classes </span>
    </a>
  </li> <?php } ?>
 
  <li class="nav-item ">
    <a class="nav-link collapsed" href="index.php?action=Profil">
      <i class="bi bi-grid"></i>
      <span>Profil </span>
    </a>
  </li>
  <li class="nav-item ">
    <a class="nav-link collapsed" href="index.php?action=users">
      <i class="bi bi-grid"></i>
      <span>Users</span>
    </a>
  </li>

 
</ul>

</aside>