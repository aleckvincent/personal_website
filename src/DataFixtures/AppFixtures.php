<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {

        $user = new User();

        $user->setFirstName('Aleck')
        ->setLastName('Vincent Minatchy')
        ->setPhone('0659135332')
        ->setUsername('avincent')
        ->setRoles(['ROLE_ADMIN'])
        ->setPassword($this->encoder->encodePassword($user, 'password'))
        ->setEmail('aleck.vincent@gmail.com')
        ->setCity('Toulouse')
        ->setCountry('France')
        ->setDescription('Hello World')
        ;
        $manager->persist($user);
        $manager->flush();
    }
}
