<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class AppFixtures
 * @package App\DataFixtures
 */
class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * AppFixtures constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i <=5; $i++)
        {
            ($user = new User())
                ->setFirstName('John' . $i)
                ->setLastName('Dho' . $i)
                ->setEmail('john.dho' . $i . '@gmail.com')
            ;

            // Set password
            $password = $this->encoder->encodePassword($user, 'pass_1234');
            $user->setPassword($password);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
