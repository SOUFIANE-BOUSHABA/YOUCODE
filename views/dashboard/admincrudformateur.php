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
<!--Content  ------------------------------------------------>

<table class="table align-middle pl-4 mb-0 bg-white shadow">
  <thead class="bg-light">
    <tr>
      <th>nom</th>
      <th>prenom</th>
      <th>email</th>
      <th>action</th>
    </tr>
  </thead>
  <tbody>
    
    <?php foreach ($users as $user) : ?>
      <tr>
        <td>
          <p class=""><?= $user['first_name'] ?></p>
        </td>
        <td>
          <span class=""><?= $user['last_name'] ?></span>
        </td>
        <td>
          <span class=""><?= $user['email'] ?></span>
        </td>
        <td>
          <a type="button" class="btn btn-warning">Ban</a>
          <a href="index.php?action=suprimmerformateur&idfr=<?= $user['user_id'] ?>" type="button" class="btn btn-danger">supprimer</a>
          <a type="button" class="btn btn-success">modifier</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>


</section>
</main>

<?php include 'footer.php' ?>