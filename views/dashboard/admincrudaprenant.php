
<?php  
 include 'header.php';
 include 'aside.php';
 if (!isset($_SESSION['roleee_id'])) {
  header('Location: index.php?action=login');
  exit();
}
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
    <!-- Button to trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
      Ajouter aprennat
    </button>

    <table class="table align-middle pl-4 mb-0 mt-2 bg-white shadow">
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
              <a href="index.php?action=suprimmerAprennat&idAprennat=<?= $user['user_id'] ?>" type="button" class="btn btn-danger">supprimer</a>
              <a type="button" class="btn btn-success" data-toggle="modal" data-target="#addUserModal<?= $user['user_id'] ?>">modifier</a>



              <div class="modal fade" id="addUserModal<?= $user['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">modifier aprennat</h1>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="index.php?action=aprennat">
                        <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                        <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Enter your name" value="<?= $user['first_name'] ?>" name="firstname" required>
                        </div>
                        <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Enter your name" value="<?= $user['last_name'] ?>" name="lastname" required>
                        </div>
                        <div class="mb-3">
                          <input type="email" class="form-control" placeholder="Enter your email" value="<?= $user['email'] ?>" name="email" required>
                        </div>
                        <div class="mb-3">
                          <input type="password" class="form-control" placeholder="Create password" name="password" required>
                        </div>
                         <div class="mb-3">
                          <select class="form-control" name="role_id" id="role_id">
                            <option value="1">admin</option>
                            <option value="2">formateur</option>
                            <option value="3">aprennat</option>
                          </select>
                        </div>


                        <div class="mb-3">
                          <button type="submit" name="submit" value="enregisterAprenant" class="btn btn-primary form-control">enregistrer</button>
                        </div>

                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                  </div>
                </div>
              </div>




            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- Bootstrap Modal for adding a new user -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">ajouter aprennat</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="index.php?action=aprennat">
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Enter your name" name="firstname" required>
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Enter your name" name="lastname" required>
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
              </div>
              <div class="mb-3">
                <input type="password" class="form-control" placeholder="Create password" name="password" required>
              </div>


              <div class="mb-3">
                <button type="submit" name="submit" value="ajouterAprennat" class="btn btn-primary form-control">ajouter</button>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>