
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
    <!-- Button to trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
      Ajouter classe
    </button>

    <table class="table align-middle pl-4 mb-0 mt-2 bg-white shadow">
      <thead class="bg-light">
        <tr>
          <th>Id</th>
          <th>name</th>
          <th>formateur</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        
      <?php foreach ($classes as $class) :  ?>
        <tr>
            <td><?= $class['class_id'] ?></td>
            <td><?= $class['name_of_class'] ?></td>
            <td><?= $class['formateur_id'] ?></td>
            <td>
            
            <a href="index.php?action=deleteclass&idclass=<?= $class['class_id'] ?>" type="button" class="btn btn-danger">supremier</a>
              <a type="button" class="btn btn-success" data-toggle="modal" data-target="#addUserModal<?= $class['class_id'] ?>">modifier</a>



              <div class="modal fade" id="addUserModal<?= $class['class_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">modifier formateur</h1>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="index.php?action=class">
                        <input type="hidden" name="class_id" value="<?= $class['class_id'] ?>">
                        <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Enter your name" value="<?= $class['name_of_class'] ?>" name="firstname" required>
                        </div>
                       
                        


                        <div class="mb-3">
                          <button type="submit" name="submit" value="enregisteruser" class="btn btn-primary form-control">enregistrer</button>
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

    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">ajouter class</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="index.php?action=class">
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="classe name" name="classe_name" required>
              </div>
              <div>
                
                <ul>
                <?php foreach ($unassignedApprenants as $apprenant) : ?>
                    <li style="text-decoration: none;">
                        <input type="checkbox" name="selected_apprenants[]" value="<?= $apprenant['user_id'] ?>">
                        <?= $apprenant['first_name'] . ' ' . $apprenant['last_name'] ?>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>

              <div class="mb-3">
                <button type="submit" name="submit" value="ajouterclass" class="btn btn-primary form-control">ajouter</button>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>