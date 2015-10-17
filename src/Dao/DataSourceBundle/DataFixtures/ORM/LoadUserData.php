<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 12/10/2015
 * Time: 06:33
 */
namespace Dao\DataSourceBundle\DataFixtures\ORM;

use Dao\DataSourceBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('u1');
        $user->setEmail('u1@gmail.com');
        $user->setPlainPassword('123456');

        $encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($user)
        ;
        $user->setPassword($encoder->encodePassword('secret', $user->getSalt()));

        $manager->persist($user);
        $manager->flush();
    }
}