<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Unsubscriber;

class Unsubscriberfixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i=0;$i <10 ; $i++){
           $unsubscriber = new Unsubscriber();
           $unsubscriber->setEmail(sprintf('foo%d',$i));
           $unsubscriber->setHashedEmail(sprintf('setHashedEmail%d',$i));
           $unsubscriber->setOfferId(sprintf('OfferId%d',$i));
           $unsubscriber->setSpsr(sprintf('Spsr%d',$i));
           $unsubscriber->setIsp(sprintf('Isp%d',$i));
           $manager->persist($unsubscriber);


        }

        $manager->flush();
    }
}
