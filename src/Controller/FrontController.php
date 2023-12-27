<?php

namespace App\Controller; //App = src 
// /!\PENSZA A IMPOTRTER LES CLASS UTILISÉES DANS LES FICHIERS

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController //herritage de AbstractConroller
{
    /**
     * ici: commentaire
     * 
     * les annotations s'ecrivent dans des commentaires
     * les annotations commencent par un @ pour etre interpretée
     * les annotations utilisent des doubles quotes et le signe egale
     * il y a deux arguments obligatoires:
     * 1er: Route (URL)
     * 2eme: Nom de la route (lien/redirection)
     *      en local:127.0.0.1:8000     /route
     *      en ligne: www.nomDomaine.fr /route
     * @Route("/front", name="frontName")
     * 
     *  #[Route('/front', name:'frontName')]
     * les attribus ne s'ecrivent pas en commentaire
     * les attribus utilisent des simples quotes et le signe :
     * les attribus sont uniquement pour PHP8/SF6 par contre les annotations c'est tout le monde qui peut les utiliser
    */ 

    public function index():Response //typage
    {
        /* 
            La route appelle la fonction qui se trouve en dessous.
            Une route peut avoir une vue(c'est à dire: fichier visible sur le navigateur soit HTML)
            Pour retourner une vue, on utilise la méthode render() provenant de la class AbstractController
            Cette methode contient 2 arguments:
            -1er argument est obligatoire:(str=string) c'est le nom du fichier html.twig situé dans le dossier 'template', il faut également definir son arborescence dans ce dossier
            (La methode render nous positionne directement à la racine du dossier 'template')
            -2 eme arguemnt est facultatif: (array): c'est le tableau des données à vehiculer à la vue
        */
        return $this->render('front/index.html.twig', []);
    }


    //function test(string $prenom, float $age, bool $activation)// ceci est un exemple de typage

    /*
        Exercice:
        1-Créer dans Fontcontroller une nouvelle route
        -creer la route (annotation):
        ->Route          :/home
        ->Nom de la route:homeName

        2- Créer la fonction associée à cette route
        ->function home()

        3-creer une template dans le dossier front
        ->home.html.twig

        4- Retourner ce template dans la fonction home()
        ==> aller voir sur le navigateur 127.0.0.1:8000/home

        5-Dans le template:
            -heritez de la base base.html.twg 
            -integrez le block h1:
            Page d'accueil
            - intégrez le block body dans lequel vous allez afficher l'image

    */ 

    /**
     *  @Route("", name="homeName") 
     * si on retire /home entre les "", notre route sera la page principale du site, et donc on n'aura pas besoin de mettre /home apres le port 8000 dans le navigateur!!!
     */
    public function home():Response

    {   $prenomController='Celia'; //pour afficher ceci dans le template(dans ce cas, home.html.twig), il faut le vehiculer dans l'argument de la méhode render

        dump($prenomController); // c'est pour déboggage, il s'affiche dans le sympony profiler (cible) on peut y  placer des variables, des tableaux et des objets.

        //dump($prenomController);die;-->ceci sert à arreter le code
        //dd('fin'); // dd()= dump die(le die sert à arreter le code la ou on souhaite, tout ce qui se triuvera en dessous de die ne sera pas lu)

        return $this->render('front/home.html.twig', 
        //key=>value
        //key: denomination recupere en twig
        //value:denomination dans la fonction du controller
        ['prenomTwig'=>$prenomController
    ]);
    }

}//fermeture de la class
