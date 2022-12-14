<?php

namespace App\DataFixtures;

use App\Entity\Subfamilia;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Familia;
use Faker\Generator;
class SubfamiliaFixture extends Fixture
{
    private Generator $faker;
    public function __construct()
    {
        $this->faker = Factory::create();
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        // $familia=$manager->getRepository(Familia::class)->findAll();
        $familias=$manager->getRepository(Familia::class)->findAll();
        
        for ($i=0; $i < 20; $i++) { 
            $subfamilia=new Subfamilia();
            $subfamilia->setCodfamilia($familias[$this->faker->numberBetween(0,19)])
            ->setCodSubFamilia($this->faker->numberBetween(0,30000))
            ->setNombre($this->faker->word())
            ->setImagen($this->faker->word());
            $manager->persist($subfamilia);
        }
        $manager->flush();
    }
}
