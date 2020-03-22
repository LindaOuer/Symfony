<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use Faker;

use App\Entity\Article;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');
        $populator = new \Faker\ORM\Doctrine\Populator($faker, $manager = $manager);
        
        $populator->addEntity('App\Entity\Article', 10, array(
            'createdAt' => (new \DateTime()),
            'image' => 'http://placehold.it/350x150',
          ));
        $insertedPKs = $populator->execute();

        $manager->flush();
    }
}
