<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    
    /**
     * @Route("/show_author/{name}", name="show_author")
    */

    public function showAuthor(string $name):Response
    {
        return $this->render('author/index.html.twig', [
            'name' => $name,
        ]);
    }

    /**
    * @Route("/authors", name="list_authors")
    */

    public function list(){
        $authors = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
            'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
            ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
            'taha.hussein@gmail.com', 'nb_books' => 300),
            );
            return $this->render('author/list.html.twig', [
                'authors' => $authors,
            ]);    
    }

    /**
     * @Route("/auhtorDetails/{id}", name="author_details")
     */

     public function authorDetails($id): Response
     {
         // Recherchez l'auteur correspondant à l'ID dans le tableau $authors
         $authors = array(
             array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg', 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com ', 'nb_books' => 100),
             array('id' => 2, 'picture' => '/images/william-shakespeare.jpg', 'username' => ' William Shakespeare', 'email' => ' william.shakespeare@gmail.com', 'nb_books' => 200),
             array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg', 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
         );
 
         $author = null;
         foreach ($authors as $authorData) {
             if ($authorData['id'] == $id) {
                 $author = $authorData;
                 break;
             }
         }
 
         if (!$author) {
             throw $this->createNotFoundException('Aucun auteur trouvé pour cet ID : ' . $id);
         }
 
         return $this->render('author/showAuthor.html.twig', [
             'author' => $author,
         ]);
     }
}

 
 



