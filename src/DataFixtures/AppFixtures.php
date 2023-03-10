<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Books;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // Création des auteurs.
        $listAuthor = [];
        for ($i = 0; $i < 10; $i++) {
            // Création de l'auteur lui-même.
            $author = new Author();
            $author->setFirstName("Prénom " . $i);
            $author->setLastName("Nom " . $i);
            $author->setContry("France" . $i);
            $manager->persist($author);
            // On sauvegarde l'auteur créé dans un tableau.
            $listAuthor[] = $author;
        }


        // Création des livres
        for ($i = 0; $i < 20; $i++) {
            $book = new Books();
            $book->setTitle("Titre " . $i);
            $book->setDescription("Quatrième de couverture numéro : " . $i);
            $book->setColor("Couleur du livre" . $i);
            $book->setQuantity($i);

            $book->setDate(\DateTime::createFromFormat('d-m-Y', '25-12-2001'));
            // On lie le livre à un auteur pris au hasard dans le tableau des auteurs.

            $book->setAuthor($listAuthor[array_rand($listAuthor)]);
            $manager->persist($book);
        }

        $manager->flush();
    }
}
