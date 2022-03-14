<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
class UserFixtures extends Fixture
{
    private $faker;
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher){
        $this->faker=Factory::create("fr_FR");
        $this->passwordHasher= $passwordHasher;
 }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $user = new User();
            $user->setNom($this->faker->lastName())
            ->setPrenom($this->faker->firstName())
            ->setRoles(array('ROlE_USER'))
            ->setDateDeNaissance($this->faker->dateTime())
            ->setAdresseRegion($this->faker->city())
            ->setAdresseVille($this->faker->city())
            ->setAdresseCP(str_replace(" ", "0",substr($this->faker->postcode(),0,5)))
            ->setEstPremium($this->faker->boolean())
            ->setEmail(strtolower($user->getPrenom()).'.'.strtolower($user->getNom()).'@'.$this->faker->freeEmailDomain())
            ->setPassword($this->passwordHasher->hashPassword($user, strtolower($user->getPrenom())))
            ->setDateInscription($this->faker->dateTimeThisYear());
            $this->addReference('user'.$i, $user);
            $manager->persist($user);
        }
        $manager->flush();
    }
}