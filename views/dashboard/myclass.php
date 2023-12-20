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
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php foreach ($classes as $class) : ?>
        <div class="col-md-7 mb-4">
          <div class="card pt-4">
            <div class="card-body">
              <div class="mini-card">
                <p>Nom de ma classe: <?= $class['name_of_class'] ?></p>
              </div>
              <div class="students-list">
                <h5>Students in this class:</h5>
                <?php foreach ($class['students'] as $student) : ?>
                 <div class="d-flex align-items-center">
                 <img src="public/users.png" class="card-img-top rounded-full" style="width:20px;margin:20px; height:20px;" alt="User Image">
                  <p><?= $student['first_name'] ?> <?= $student['last_name'] ?></p>
                 </div> 
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </section>


</main>
