<?php  
 include 'header.php';
 include 'aside.php';
?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Accueil</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
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
    <tr>
      <td>
        <p class="">soufian</p>
      </td>
      <td>
        <span class="">boushaba</span>
      </td>
      <td>
        <span class="">boushaba@gmail.com</span>
      </td>
      <td>
        <a type="button" class="btn btn-warning">Ban</a>
        <a type="button" class="btn btn-danger">suprimer</a>
        <a type="button" class="btn btn-success">modifier</a>
      </td>
    </tr>
   
  </tbody>
</table>


</section>
</main>

<?php include 'footer.php' ?>