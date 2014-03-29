<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 28.03.14
 * Time: 16:50
 */

namespace Blogger\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blogger\BlogBundle\Entity\Role;

class RoleFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $role1 = new Role();
        $role1->setName('administrator');
        $role1->setRole('ROLE_ADMIN');
        $manager->persist($role1);

        $role2 = new Role();
        $role2->setName('user');
        $role2->setRole('ROLE_USER');
        $manager->persist($role2);

        $role3 = new Role();
        $role3->setName('anonymous');
        $role3->setRole('IS_AUTHENTICATED_ANONYMOUSLY');
        $manager->persist($role3);

        $manager->flush();

        $this->addReference('administrator', $role1);
        $this->addReference('user', $role2);
        $this->addReference('anonymous', $role3);
    }

    public function getOrder()
    {
        return 1;
    }
} 