<?php

namespace App\DataFixtures;

use App\Entity\Product;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for($p = 0; $p < 15; $p++) {
            $product = new Product();
            $product->setName('Product#'.$p);
            $product->setDescription('Description du product#'.$p);
            $product->setPrice(random_int(1000, 6000));
            $product->setCreatedAt(new DateTimeImmutable('now'));
            $product->setUpdatedAt(new DateTimeImmutable('now'));
            $manager->persist($product);
        }
        $manager->flush();
    }
}
