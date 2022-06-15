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
        
        $admin2 = new User();
        $admin2->setEmail('greg.marini@hotmail.fr');
        $admin2->setRoles(['ROLE_USER', 'ROLE_COMMERCANT', 'ROLE_ADMIN']);
        $hashpassword = $this->hasher->hashPassword($admin2, 'password');
        $admin2->setPassword($hashpassword);        
        $admin2->setNom('Grégory Marini');
        $admin2->setTypeUser(1);
        $manager->persist($admin2);

        $commercant = new User();
        $commercant->setEmail('thiebaut_pinardon@yahoo.fr');
        $commercant->setRoles(['ROLE_USER', 'ROLE_ADMIN', 'ROLE_COMMERCANT']);
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

        $commercant2 = new User();
        $commercant2->setEmail('orange@orange.fr');
        $commercant2->setRoles(['ROLE_USER', 'ROLE_COMMERCANT']);
        $hashpassword = $this->hasher->hashPassword($commercant2, 'password');
        $commercant2->setPassword($hashpassword);
        $commercant2->setNom('Orange');
        $commercant2->setTypeUser(1);
        $manager->persist($commercant2);

        $commercant3 = new User();
        $commercant3->setEmail('mae@mae.fr');
        $commercant3->setRoles(['ROLE_USER', 'ROLE_COMMERCANT']);
        $hashpassword = $this->hasher->hashPassword($commercant3, 'password');
        $commercant3->setPassword($hashpassword);
        $commercant3->setNom('Mae');
        $commercant3->setTypeUser(1);
        $manager->persist($commercant3);

        $commercant4 = new User();
        $commercant4->setEmail('breal@breal.fr');
        $commercant4->setRoles(['ROLE_USER', 'ROLE_COMMERCANT']);
        $hashpassword = $this->hasher->hashPassword($commercant4, 'password');
        $commercant4->setPassword($hashpassword);
        $commercant4->setNom('Breal');
        $commercant4->setTypeUser(1);
        $manager->persist($commercant4);

        $commercant5 = new User();
        $commercant5->setEmail('sushi@sushi.fr');
        $commercant5->setRoles(['ROLE_USER', 'ROLE_COMMERCANT']);
        $hashpassword = $this->hasher->hashPassword($commercant5, 'password');
        $commercant5->setPassword($hashpassword);
        $commercant5->setNom('Sensei Sushi');
        $commercant5->setTypeUser(1);
        $manager->persist($commercant5);

        $commercant6 = new User();
        $commercant6->setEmail('comeback@comeback.fr');
        $commercant6->setRoles(['ROLE_USER', 'ROLE_COMMERCANT']);
        $hashpassword = $this->hasher->hashPassword($commercant6, 'password');
        $commercant6->setPassword($hashpassword);
        $commercant6->setNom('Come Back');
        $commercant6->setTypeUser(1);
        $manager->persist($commercant6);

        $commercant7 = new User();
        $commercant7->setEmail('camaieu@camaieu.fr');
        $commercant7->setRoles(['ROLE_USER', 'ROLE_COMMERCANT']);
        $hashpassword = $this->hasher->hashPassword($commercant6, 'password');
        $commercant7->setPassword($hashpassword);
        $commercant7->setNom('Camaieu');
        $commercant7->setTypeUser(1);
        $manager->persist($commercant7);

        $commercant8 = new User();
        $commercant8->setEmail('sharoom@sharoom.fr');
        $commercant8->setRoles(['ROLE_USER', 'ROLE_COMMERCANT']);
        $hashpassword = $this->hasher->hashPassword($commercant6, 'password');
        $commercant8->setPassword($hashpassword);
        $commercant8->setNom('Camaieu');
        $commercant8->setTypeUser(1);
        $manager->persist($commercant8);

        $manager->flush();

        $this->addReference('admin2', $admin2);
        $this->addReference('admin', $admin);
        $this->addReference('commercant', $commercant);
        $this->addReference('commercant2', $commercant2);
        $this->addReference('commercant3', $commercant3);
        $this->addReference('commercant4', $commercant4);
        $this->addReference('commercant5', $commercant5);
        $this->addReference('commercant6', $commercant6);
        $this->addReference('commercant7', $commercant7);
        $this->addReference('commercant8', $commercant8);


    }
}
