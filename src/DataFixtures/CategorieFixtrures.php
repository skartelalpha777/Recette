<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\Exception\FormSizeFileException;

class CategorieFixtrures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $data = [
            ['nom' => 'Entrée',],
            ['nom' => 'Plat'],
            ['nom' => 'Dessert'],
            ['nom' => 'Boisson'],



        ];
        foreach ($data as $cat) {
            $categorie  = new Categorie();
            $categorie->setNom($cat['nom']);
            $manager->persist($categorie);
            $this->addReference($cat['nom'], $categorie);
        }

        $manager->flush();
    }
}
