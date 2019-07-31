<?php

namespace App\DataFixtures;

use App\Entity\Admins;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminFixture extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new Admins();
        $admin->setLogin('admin');
        $admin->setPassword($this->encoder->encodePassword($admin, 'admin'));
        $admin->setEmployeeNumber('00000000');

        $manager->persist($admin);

        $manager->flush();
    }
}
