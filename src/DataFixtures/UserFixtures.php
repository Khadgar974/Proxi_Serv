<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('scottereau_ec@yahoo.fr');
        $admin->setRoles(['ROLE_USER', 'ROLE_COMMERCANT', 'ROLE_ADMIN']);
        $hashpassword = $this->hasher->hashPassword($admin, 'Samuel');
        $admin->setPassword($hashpassword);        
        $admin->setNom('Samuel Cottereau');
        $admin->setTypeUser(1);
        $manager->persist($admin);

        $commercant = new User();
        $commercant->setEmail('titiviking27@gmail.com');
        $commercant->setRoles(['ROLE_USER', 'ROLE_COMMERCANT']);
        $hashpassword = $this->hasher->hashPassword($commercant, 'Thiebaut');
        $commercant->setPassword($hashpassword);
        $commercant->setNom('Thiebaut Pinardon');
        $commercant->setTypeUser(1);
        $manager->persist($commercant);


        $user = new User();
        $user->setEmail('gregmarini@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $hashpassword = $this->hasher->hashPassword($user, 'Gregory');
        $user->setPassword($hashpassword);
        $user->setNom('Grégory Marini');
        $user->setTypeUser(0);
        $manager->persist($user);



        $manager->flush();

        $this->addReference('user', $user);
        $this->addReference('admin', $admin);
        $this->addReference('commercant', $commercant);
    }
}
