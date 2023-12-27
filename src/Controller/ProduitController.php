<?php

namespace App\Controller; //App = src 

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ProduitController extends AbstractController
{   // ce controlleur va contenir toutes les routes du CRUD Produit
    /**
     * cette route va récupérer tous les produits en base de donnéees(=>REQUETE SQL de selection=SELECT)
     * 
     * 
     * @Route("/produit/afficher",name="produit_afficher")
     */


public function produit_afficher(ProduitRepository $produitRepository):Response

{
    /*
        lorsqu'on cree une entite (=table), est generé au meme temps son Repository, celui-ci permet de faire des requetes dans cette table

        la fonction produit_afficher() a besoin d'un objet de la classe ProduitRepository, c'est donc une DEPENDANCE.!!!!!!

        pour creer des dépendances, on les écrit dans les parentheses() de la fonction--> synthaxe: Class $objet 

    */
        //le $produitRepository est l'objet de ma classe ProduitRepository
        //->findAll: je pointe sur la méthode findALL de la class ProduitRrepository
    $produits=$produitRepository->findAll(); //SELECT * FROM produit

    // la méthode findALL retourne un tableau d'objets

    return $this->render('/produit/produit_afficher.html.twig',[
        'produits'=>$produits
    ]);
}


/**
 * la route produit_ajouter permet de creer les produits en base de donnees
 * on utilise un formulaire
 * 
 * Requete INSERT INTO
 * 
 * @Route("/produit/ajouter",name="produit_ajouter")
 */


public function produit_ajouter():Response

{   
    // on instancie la class(entity) Produit
    $produit= new Produit(); //!!ne pas oublier d'importer cette class(bouton droit->importer class)
    dump($produit);

    /*
    pour creer un formulaire, on utilise la methode createForm()bprovenant de la class AbstractController:
    -1er argument : le nom de la class contenant le $builder
    -2eme argument : l'objet issu de la class(entity) Produit

    la class ProduitType et l'objet $produit sont tous les deux issues de la class(Entity) Produit
    */ 


    // on cree un formulaire, un objet form grace à la methode createForm-> cette methode va prendre deux arguments:regarder dans le commentaire precedent
        
    $form=$this->createForm(ProduitType::class, $produit); //ProduitType::class-> on demande sur quel moule=plan de constuction on va se baser, donc on definit le nom de la class qui contient le builder, ici c'est la class ProduitType.!!!!!il ne fzut pas oublier d'importer nos class(ici la class Produit et la class ProduitType)
    

    //$form est un objet, il contient des propriétes et des methodes


    return $this->render('/produit/produit_ajouter.html.twig',[
        'formProduit'=>$form->createView() //creation du code HTML du formulaire(la vue c'est ce qu'on voit sur le navigateur)
    ]);
}
}//fermeture de la class
