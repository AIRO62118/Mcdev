<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Competence;
class CompetenceFixtures extends Fixture
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
    }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $competence = new Competence();
            $competence->setLibelle($this->faker->lastName());
            $this->addReference('competence'.$i, $competence);
            $manager->persist($competence);
        }
        $manager->flush();
    }
}