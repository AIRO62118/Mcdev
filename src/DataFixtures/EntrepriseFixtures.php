<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Entreprise;
class EntrepriseFixtures extends Fixture
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
    }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $entreprise = new Entreprise();
            $entreprise->setNomEntreprise($this->faker->lastName())
            ->setAdresseVille($this->faker->city())
            ->setAdresseRegion($this->faker->city())
            ->setAdresseCP(str_replace(" ", "0",substr($this->faker->postcode(),0,5)))
            ->setEstPremium($this->faker->boolean())
            ->setDateCréationPage($this->faker->dateTime());
            $this->addReference('entreprise'.$i, $entreprise);
            $manager->persist($entreprise);
        }
        $manager->flush();
    }
}