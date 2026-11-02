<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{

    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passworHasher)
    {
        $this->passwordHasher = $passworHasher;
    }
    public function load(ObjectManager $manager): void
    {

        $data = [
            ["nom" => "Diallo", "prenom" => "Alpha", "email" => "admin@gmail.com", "password" => "password"],
            ["nom" => "Romain", "prenom" => "Molina", "email" => "user@gmail.com", "password" => "password"],

        ];

        foreach ($data as $index => $person) {
            $user = new User();
            $user->setNom($person['nom']);
            $user->setPrenom($person['prenom']);
            $user->setEmail($person['email']);
            $hashedPassword = $this->passwordHasher->hashPassword($user, $person['password']);
            $user->setPassword($hashedPassword);
            if ($index == 0) {
                $user->setRoles(['ROLE_ADMIN']);
            }
            $manager->persist($user);
        }
        // $product = new Product();


        $manager->flush();
    }
}
