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
        ->setDescription('Hello World')
        ;
        $manager->persist($user);

        /** RESUME CREATION */

        $resume1 = new Resume();
        $resume1->setTitle('Bachelor Chef de Projet Digital')
        ->setType('School')
        ->setLocation('IESA Multimédia Paris')
        ->setStart(new DateTime('2018-03-01'))
        ->setOngoing(false)
        ->setDescription('<p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento, concitatus orator, cum quaestor non hos sed tribunos fabricarum insimulasset promittentes armorum si novas res agitari conperissent.</p>

        <p>Hae duae provinciae bello quondam piratico catervis mixtae praedonum a Servilio pro consule missae sub iugum factae sunt vectigales. et hae quidem regiones velut in prominenti terrarum lingua positae ob orbe eoo monte Amano disparantur.</p>
        
        <p>Dein Syria per speciosam interpatet diffusa planitiem. hanc nobilitat Antiochia, mundo cognita civitas, cui non certaverit alia advecticiis ita adfluere copiis et internis, et Laodicia et Apamia itidemque Seleucia iam inde a primis auspiciis florentissimae.</p>')
        ;

        $resume2 = new Resume();
        $resume2->setTitle('Consultant Java JEE Fullstack')
        ->setType('Work')
        ->setLocation('Sopra Steria')
        ->setStart(new DateTime('2018-12-03'))
        ->setOngoing(true)
        ->setDescription('<p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento, concitatus orator, cum quaestor non hos sed tribunos fabricarum insimulasset promittentes armorum si novas res agitari conperissent.</p>

        <p>Hae duae provinciae bello quondam piratico catervis mixtae praedonum a Servilio pro consule missae sub iugum factae sunt vectigales. et hae quidem regiones velut in prominenti terrarum lingua positae ob orbe eoo monte Amano disparantur.</p>
        
        <p>Dein Syria per speciosam interpatet diffusa planitiem. hanc nobilitat Antiochia, mundo cognita civitas, cui non certaverit alia advecticiis ita adfluere copiis et internis, et Laodicia et Apamia itidemque Seleucia iam inde a primis auspiciis florentissimae.</p>')
        ;

        $manager->persist($resume1);
        $manager->persist($resume2);

        $manager->flush();
    }
}
