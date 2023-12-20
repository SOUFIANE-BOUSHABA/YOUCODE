
<?php  
 include 'header.php';
 include 'aside.php';
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Accueil</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Accueil</a></li>
        <li class="breadcrumb-item active">Gestion des Utilisateurs </li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">

<div class="row">
<?php foreach ($users as $user) : ?>
  <div class="col-md-4 mb-4">
    <div class="card">
      <img src="public/users.png" class="card-img-top rounded-full" style="width:70px;margin:20px; height:70px;" alt="User Image">
      <div class="card-body">
      <?php
        $roleBadge = '';
        switch ($user['role_id']) {
          case 1:
            $roleBadge = '<span class="badge badge-warning">Admin</span>';
            break;
          case 2:
            $roleBadge = '<span class="badge badge-success">Formateur</span>';
            break;
          case 3:
            $roleBadge = '<span class="badge badge-info">Apprenant</span>';
            break;
          default:
            break;
        }
        echo $roleBadge;
        ?>
        <h5 class="card-title"><?= $user['first_name'] ?> <?= $user['last_name'] ?></h5>
        <p class="card-text"><?= $user['email'] ?></p>
      
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal<?= $user['user_id'] ?>">
          Contacter
        </button>
      </div>
    </div>
  </div>


<?php endforeach; ?>
</div>

</section>
