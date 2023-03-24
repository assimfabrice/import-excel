<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $userPasswordHasher;
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for($u = 0; $u < 10; $u++)
        {
            $user = new User();
            $user->setFirstName('First name#'.$u);
            $user->setLastName('Last name#'.$u);
            $user->setEmail('admin'.$u.'@gmail.com');
            $plainTextPassword = '0000';
            $hashedPassword = $this->userPasswordHasher->hashPassword($user, $plainTextPassword);
            $user->setPassword($hashedPassword);
            $user->setCreatedAt(new DateTimeImmutable('now'));
            $user->setUpdatedAt(new DateTimeImmutable('now'));
            $manager->persist($user);
        }
        $manager->flush();
    }
}
