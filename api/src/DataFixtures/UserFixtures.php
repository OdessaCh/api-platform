<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $pwd = '$2y$13$Tfrvb2FWTQmi7MTjabn6l.5UttNp5H5u0gpL60ZDa1JmjsLj5SacK';

        $object = (new User())
            ->setEmail('user@gmail.com')
            ->setRoles(['ROLE_USER'])
            ->setPassword($pwd);
        $manager->persist($object);

        $admin = (new User())
            ->setEmail('admin@gmail.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($pwd);
        $manager->persist($admin);

        $customer = (new User())
            ->setEmail('customer@gmail.com')
            ->setRoles(['ROLE_COACH'])
            ->setPassword($pwd);
        $manager->persist($customer);

        $manager->flush();
    }
}
