<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class ProduitType extends AbstractType
{
    // les class Type sont des moules
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder //-> va permettre la construction du form
            //titre est un le 1er argument obligatoire, colortype est le 2eme argument
            ->add('titre', TextType::class)
             // on peut mettre nos contraintes de securité, exemple, le prix doit etre supp à 0
            ->add('prix', MoneyType::class,[
                    //k => v (cle en face valeur//
                'label' =>'Prix du produit',
                'attr'=>[
                    'placeholder'=>'Saisir le prix du produit',

                    'class'=>'bg-warning border-danger'
                ]
                /**
                 * attr= attribu de type array, le array est vide par defaut mais on peut mettre des parametres dedans
                 * !!le placeholder n'est oas une valeur, c'est un message grisé qui va s'afficher dans l'input
                 * ! bg: style de bootstrap
                 * 
                 * 
                 * form-control:c'est une class qui donne une forme à l'input avec !!bootstrap-> pour avoir les memes formes des inputs dans mon formilaire(à chaque fois qu'un formulaire est detecté, la forme sera appliquee-->dossier config->packages->twig.yaml(le fichier de configuration du twig) et on met la configuration que l'on souhaite par exemple=> form_themes:['bootstrap_5_layout.html.twig'] !! on peut retirer la class form-control et grace à la configuration, les formulaires auront les memes formes
                 * 
                 * */

            ])

            ->add('description')
        ;
        /*

        l'objet $builder permet de construire le formulaire
        chaque methode add()va correspondre à un element du formulaire

        3 arguments dans la methode add():

        1-(string) nom de la propriete dans l'entity (si le formulaire est lié à une entity)

        2-(Nom de la Class): definir le type de l'element(select?,textarea?...ect)

        3- (array): tableau des options (label, attr...)




        ----------------------------------------------
        en HTML, il y a 3 balises pour les formulaires:
            -Select
            -textarea
            -input type: text, password, hidden, date, color, number, checkbox radio...
            (select et textarea sont des exceptions, ce ne sont pas des input)

         */



    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
