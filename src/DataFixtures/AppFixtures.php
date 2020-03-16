<?php

namespace App\DataFixtures;

use App\Entity\Resume;
use App\Entity\User;
use DateTime;
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

        /** USER CREATION */
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
        ->setDescription("It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. ")
        ;
        $manager->persist($user);

        /** RESUME CREATION */

        $resume1 = new Resume();
        $resume1->setTitle('Bachelor Chef de Projet Digital')
        ->setType('School')
        ->setLocation('IESA Multimédia Paris')
        ->setStart(new DateTime('2018-03-01'))
        ->setOngoing(false)
        ->setDescription("It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. ")
        ;

        $resume2 = new Resume();
        $resume2->setTitle('Consultant Java JEE Fullstack')
        ->setType('Work')
        ->setLocation('Sopra Steria')
        ->setStart(new DateTime('2018-12-03'))
        ->setOngoing(true)
        ->setDescription("It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. ")
        ;

        $manager->persist($resume1);
        $manager->persist($resume2);

        $manager->flush();
    }
}
