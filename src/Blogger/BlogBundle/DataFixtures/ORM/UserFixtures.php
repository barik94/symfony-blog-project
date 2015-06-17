<?php

namespace Blogger\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blogger\BlogBundle\Entity\User;
use Blogger\BlogBundle\Service\Sha256Salted;

class UserFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername('Denis');
        $user1->setEmail('den@gmail.com');
        $user1->setPassword(Sha256Salted::encodePasswordStatic('7777777' , $user1->getSalt()));
        $user1->addRole($manager->merge($this->getReference('user')));
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('admin');
        $user2->setEmail('admin@gmail.com');
        $user2->setPassword(Sha256Salted::encodePasswordStatic('7777777' , $user2->getSalt()));
        $user2->addRole($manager->merge($this->getReference('administrator')));
        $manager->persist($user2);

        $manager->flush();

        $this->addReference('Denis', $user1);
        $this->addReference('admin', $user2);
    }

    public function getOrder()
    {
        return 2;
    }
} 