<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Recette;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class RecetteFixtrures  extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $recettes = [
            [
                'titre' => 'Salade César',
                'description' => 'Laitue romaine, croûtons dorés, parmesan et sauce César maison au citron.',
                'tempsMinutes' => 15,
                'difficulte' => 'facile',
                'image' => 'https://florette.fr/wp-content/uploads/2024/08/Salade-cesar-Florette-3.jpg',
                'favori' => false,
                'categorie' => 'Entrée',
            ],
            [
                'titre' => 'Velouté de potiron',
                'description' => 'Potiron, oignon et crème mixés pour une soupe douce et onctueuse.',
                'tempsMinutes' => 40,
                'difficulte' => 'facile',
                'image' => 'https://www.cookomix.com/wp-content/uploads/2017/10/veloute-potiron-thermomix-800x600.jpg',
                'favori' => true,
                'categorie' => 'Entrée',
            ],
            [
                'titre' => 'Tartare de saumon',
                'description' => 'Saumon frais coupé au couteau, avocat, citron vert et coriandre.',
                'tempsMinutes' => 20,
                'difficulte' => 'moyen',
                'image' => 'https://images.ricardocuisine.com/services/recipes/111504893356cdb80809c57.jpg',
                'favori' => false,
                'categorie' => 'Entrée',
            ],
            [
                'titre' => 'Carbonnade flamande',
                'description' => 'Bœuf mijoté à la bière brune avec oignons, pain d\'épices et moutarde.',
                'tempsMinutes' => 120,
                'difficulte' => 'moyen',
                'image' => 'https://www.google.com/search?q=Carbonnade+flamande&sca_esv=b1f4eb556121911c&hl=fr&udm=2&biw=1528&bih=732&sxsrf=APpeQntq2hronAz5tiv6spLdKy_Mzx7Ihg%3A1791388515099&ei=Y2vGasLSBYf7kdUPhcCx4QY&ved=2ahUKEwiCkOOgoqiXAxWHfaQEHQVgLGwQ4dUDegQIBhAN&uact=5&oq=Carbonnade+flamande&gs_lp=Egtnd3Mtd2l6LWltZyITQ2FyYm9ubmFkZSBmbGFtYW5kZTIHEAAYgAQYCjIPEAAYgAQYChgLGLEDGIMBMgUQABiABDIJEAAYgAQYChgLMgUQABiABDIFEAAYgAQyCRAAGIAEGAoYCzIFEAAYgAQyCRAAGIAEGAoYCzIFEAAYgARItQFQAFgAcAB4AJABAJgBeqABeqoBAzAuMbgBA8gBAPgBAvgBAZgCAaACfpgDAJIHAzAuMaAHtAeyBwMwLjG4B37CBwMwLjHIBwKACAE&sclient=gws-wiz-img#sv=CAMSUxoyKhBlLWR0NnZveHl1VGNXSkZNMg5kdDZ2b3h5dVRjV0pGTToOWUl5WU13dk1PMUhKSU0gBCoXCgFzEhBlLWR0NnZveHl1VGNXSkZNGAEwAVACGAcguISN3wJKCBACGAEgAigB',
                'favori' => true,
                'categorie' => 'Plat',
            ],
            [
                'titre' => 'Poulet au curry',
                'description' => 'Morceaux de poulet dans une sauce curry au lait de coco, servis avec du riz.',
                'tempsMinutes' => 35,
                'difficulte' => 'facile',
                'image' => 'https://ileauxepices.com/blog/wp-content/uploads/2025/05/Kari-Ayam-1024x683.jpg',
                'favori' => false,
                'categorie' => 'Plat',
            ],
            [
                'titre' => 'Risotto aux champignons',
                'description' => 'Riz arborio cuit lentement au bouillon, champignons de Paris et parmesan.',
                'tempsMinutes' => 45,
                'difficulte' => 'difficile',
                'image' => 'https://cdn.pratico-pratiques.com/app/uploads/sites/3/2021/05/26151521/risotto-aux-champignons-et-asperges.jpg',
                'favori' => false,
                'categorie' => 'Plat',
            ],
            [
                'titre' => 'Tarte aux pommes',
                'description' => 'Pâte brisée, compote maison et fines lamelles de pommes caramélisées.',
                'tempsMinutes' => 60,
                'difficulte' => 'moyen',
                'image' => 'https://files.meilleurduchef.com/mdc/photo/recette/tarte-pommes-cap/tarte-pommes-cap-960.jpg',
                'favori' => true,
                'categorie' => 'Dessert',
            ],
            [
                'titre' => 'Mousse au chocolat',
                'description' => 'Chocolat noir fondu et blancs en neige, à préparer la veille.',
                'tempsMinutes' => 25,
                'difficulte' => 'moyen',
                'image' => 'https://www.academiedugout.fr/images/52441/970-580/bistrot_lyonnais_moussechocolat.jpg?poix=50&poiy=50',
                'favori' => false,
                'categorie' => 'Dessert',
            ],
            [
                'titre' => 'Tarte au citron meringuée',
                'description' => 'Crème au citron acidulée sur pâte sablée, recouverte de meringue dorée.',
                'tempsMinutes' => 90,
                'difficulte' => 'difficile',
                'image' => 'https://www.cuisinelolo.fr/wp-content/uploads/2011/11/Tarte-au-citron-meringuee-2-6.jpg',
                'favori' => false,
                'categorie' => 'Dessert',
            ],
            [
                'titre' => 'Limonade maison',
                'description' => 'Citrons pressés, sucre de canne, eau pétillante et feuilles de menthe.',
                'tempsMinutes' => 10,
                'difficulte' => 'facile',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQUnFJh7eCeUQVQdjMtFa1Kk11rJD0JM43Q7Ol3iF_9eA&s=10',
                'favori' => false,
                'categorie' => 'Boisson',
            ],
            [
                'titre' => 'Smoothie fraise banane',
                'description' => 'Fraises, banane, yaourt nature et un filet de miel mixés ensemble.',
                'tempsMinutes' => 5,
                'difficulte' => 'facile',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTK_8dL_ka69tSmS8Ne9Rx3PtTKShK5elgnKAQMippwEH8aJRPwHZahqA8&s=10',
                'favori' => false,
                'categorie' => 'Boisson',
            ],
            [
                'titre' => 'Chocolat chaud épicé',
                'description' => 'Lait entier, chocolat noir, cannelle et une pointe de piment.',
                'tempsMinutes' => 15,
                'difficulte' => 'facile',
                'image' => null,   // pour tester une recette sans image
                'favori' => false,
                'categorie' => 'Boisson',
            ],
        ];

        foreach ($recettes as $res) {
            $recette = new Recette();
            $recette->setTitre($res['titre']);
            $recette->setDescription($res['description']);
            $recette->setTempsMinutes($res['tempsMinutes']);
            $recette->setDifficult($res['difficulte']);
            $recette->setImage($res['image']);
            $recette->setFavori($res['favori']);

            $recette->setCategorie($this->getReference($res['categorie'], Categorie::class));
            $manager->persist($recette);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategorieFixtrures::class,
        ];
    }
}
