<?php 
  require_once 'includes/autoloader.php';  
  require 'includes/header.php';

  $bdd=App::getDatabase();
  $statusBdd=$bdd->getStatusBdd();
  if($statusBdd){
    $library=App::getLibrary();
  }
?>
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>Application test C2iS</h1>
          <h2>Gestion de bibliothèque</h2>
        </div>  
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php if(!$statusBdd): ?>
            <div class="alert alert-danger" role="alert">
              <div>Impossible de se connecter à la base de données.</div>
              <div>Veuillez vérifier vos données de connexion.</div>
              <div>Utilisateur='root' , Mot de passe='root', Hôte='localhost' , Nom de la base='appli_C2iS' </div>
            </div>
          <?php else: 

            //Le corps de l'application est construit suivant ce qui est demandé par l'utilisateur.

            $page=(isset($_GET['page']))?$_GET['page']:'';
            if(empty($page) || isset($_GET['id']) && !is_int((int) $_GET['id']) 
              || isset($_POST['author']) && !is_int((int) $_POST['author'])){
               $library->buildListBooks($bdd);
            }else{
               switch ($page) {
                case 'booksAuthor':
                    $library->buildListBooksAuthor($bdd,$_POST['author']);
                    break;
                case 'book':
                    $library->buildInfosBook($bdd,$_GET['id']);
                    break;
                case 'author':
                    $library->buildInfosAuthor($bdd,$_GET['id']);
                    break;
                default:
                   $library->buildListBooks($bdd);
              }
            }
           
           endif; ?>
        </div>  
      </div>

<?php 
  require 'includes/footer.php';
?>