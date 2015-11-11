<?php

/**
 * La Classe Library permet de gérer la blibliothèque.
 *
 */

class Library{

	/* REQUETES */


	private function getBooks($bdd){
		$req = $bdd->query('SELECT books.book_id,books.book_title,books.author_id,authors.author_firstname,authors.author_name 
			FROM books 
			INNER JOIN authors 
			ON books.author_id=authors.author_id',[]);
		return $req->fetchAll();
	}

	private function getBooksAuthor($bdd,$id){
		$req = $bdd->query('SELECT books.book_id,books.book_title,books.author_id,authors.author_firstname,authors.author_name 
			FROM books 
			INNER JOIN authors 
			ON books.author_id=authors.author_id
			WHERE books.author_id=:author_id',['author_id'=>$id]);
		return $req->fetchAll();
	}

	private function getBook($bdd,$id){
		$req = $bdd->query('SELECT books.book_title,books.book_desc,books.author_id,authors.author_firstname,authors.author_name 
			FROM books 
			INNER JOIN authors 
			ON books.author_id=authors.author_id 
			WHERE books.book_id=:book_id',['book_id'=>$id]);
		return $req->fetch();
	}

	private function getAuthor($bdd,$id){
		$req = $bdd->query('SELECT * FROM authors  WHERE authors.author_id=:author_id',['author_id'=>$id]);
		return $req->fetch();
	}

	private function getBooksByAuthor($bdd,$id){
		$req = $bdd->query('SELECT books.book_id,books.book_title FROM books WHERE books.author_id=:author_id',['author_id'=>$id]);
		return $req->fetchAll();
	}

	/*
	*	Récupérer les différents auteurs
	*
	**/

	private function getDistinctAuthors($books){
		$authors=[];
		foreach ($books as $book ) {
			$authors[$book['author_id']]=$book['author_firstname'].' '.$book['author_name'];
		}
		return $authors;
	}

	/*
	*	Création de la liste de livres
	*
	**/

	public function buildListBooks($bdd){
		$books=$this->getBooks($bdd);
		$authors=$this->getDistinctAuthors($books); 
		?>

		<form method="post" action="/index.php?page=booksAuthor">
			<div class="form-group">
			  <label for="sel1">Auteurs</label>
			  <select class="form-control" id="author" name="author">
			    <?php foreach ($authors as $key =>$author): ?>
			    <option value="<?= $key ?>"><?= $author ?></option>
			    <?php endforeach; ?>
			  </select>
			</div>
			<button type="submit" class="btn btn-primary">Trier</button>
        </form>

		<table class="table table-striped">
		    <thead>
		      <tr>
		        <th>Identifiant</th>
		        <th>Titre</th>
		        <th>Auteur</th>
		      </tr>
		    </thead>
		    <tbody>
		<?php foreach ($books as $book): ?>

	      <tr>
	        <td><?= $book['book_id'] ?></td>
	        <td><a href="/index.php?page=book&id=<?= $book['book_id'] ?>"><?= $book['book_title'] ?></a></td>
	        <td><a href="/index.php?page=author&id=<?= $book['author_id'] ?>"><?= $book['author_firstname'] ?> <?= $book['author_name'] ?></a></td>
	      </tr>

    	<?php endforeach; ?>
	    	  </tbody>
		  </table>
		<?php
	}

	/*
	*	Création de la liste de livres par auteur
	*
	**/

	public function buildListBooksAuthor($bdd,$id){
		$books=$this->getBooksAuthor($bdd,$id); 
		$author=$books[0]['author_firstname'].' '.$books[0]['author_name'];
		?>
		<a href="/">Liste de livres</a>
		<div>Livres de <?= $author ?>
		</div>
		<table class="table table-striped">
		    <thead>
		      <tr>
		        <th>Identifiant</th>
		        <th>Titre</th>
		        <th>Auteur</th>
		      </tr>
		    </thead>
		    <tbody>
		<?php foreach ($books as $book): ?>

	      <tr>
	        <td><?= $book['book_id'] ?></td>
	        <td><a href="/index.php?page=book&id=<?= $book['book_id'] ?>"><?= $book['book_title'] ?></a></td>
	        <td><a href="/index.php?page=author&id=<?= $book['author_id'] ?>"><?= $book['author_firstname'] ?> <?= $book['author_name'] ?></a></td>
	      </tr>

    	<?php endforeach; ?>
	    	  </tbody>
		  </table>
		<?php
	}

	/*
	*	Création des détails d'un livre
	*
	**/

	public function buildInfosBook($bdd,$id){
		$book=$this->getBook($bdd,$id); ?>

		<a href="/">Liste de livres</a>

		<?php if($book): ?>
			<div>
				<span style="font-weight:bold;">Titre:</span> <?=  $book['book_title'] ?>
			</div>
			<div>
				  <img src="/img/books/book-<?= $id ?>.jpg" alt="<?= $book['book_title'] ?>">
			</div>
			<div>
				<span style="font-weight:bold;">Description:</span> <?=  $book['book_desc'] ?>
			</div>
			<div>
				<span style="font-weight:bold;">Auteur:</span> 
				<a href="/index.php?page=author&id=<?= $book['author_id'] ?>"><?= $book['author_firstname'] ?> <?= $book['author_name'] ?></a>
			</div>
		<?php else: ?>
			<div class="alert alert-danger" role="alert">Impossible d'afficher les détails de ce livre.</div>
		<? endif; 
	}

	/*
	*	Création des détails d'un auteur
	*
	**/

	public function buildInfosAuthor($bdd,$id){
		$author=$this->getAuthor($bdd,$id); 
		if($author){
			$booksByAuthor=$this->getBooksByAuthor($bdd,$id);
		}
		?>

		<a href="/">Liste de livres</a>

		<?php if($author): ?>
			<div>
				<span style="font-weight:bold;">Prénom:</span> <?=  $author['author_firstname'] ?>
			</div>
			<div>
				<span style="font-weight:bold;">Nom de famille:</span> <?=  $author['author_name'] ?>
			</div>
			<div>
				  <img src="/img/authors/author-<?= $id ?>.jpg" alt="<?= $author['author_name'] ?>">
			</div>
			<div>
				<span style="font-weight:bold;">Description:</span> <?=  $author['author_desc'] ?>
			</div>

			<h3>Livres de <?=  $author['author_firstname'] ?> <?=  $author['author_name'] ?></h3>
			<table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Titre</th>
			      </tr>
			    </thead>

		   		 <tbody>

			<?php foreach ($booksByAuthor as $book): ?>

			    <tr>
			        <td><a href="/index.php?page=book&id=<?= $book['book_id'] ?>"><?= $book['book_title'] ?></a></td>
			    </tr>

	    	<?php endforeach; ?>

	    		</tbody>
		    </table>

		<?php else: ?>
			<div class="alert alert-danger" role="alert">Impossible d'afficher les détails de cet auteur.</div>
		<? endif; 
	}

}