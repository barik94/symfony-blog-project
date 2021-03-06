<?php

namespace Blogger\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blogger\BlogBundle\Entity\Blog;

class BlogFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $blog1 = new Blog();
        $blog1->setTitle('A day with Symfony2');
        $blog1->setBlog('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $blog1->setImage('beach.jpg');
        $blog1->setAuthor('dsyph3r');
        $blog1->addTag($this->getReference('tag-1'))->addTag($this->getReference('tag-2'));
        $blog1->setCreated(new \DateTime());
        $blog1->setUpdated($blog1->getCreated());
        $blog1->setCategory($manager->merge($this->getReference('category-1')));
        $manager->persist($blog1);

        $blog2 = new Blog();
        $blog2->setTitle('The first Krematoriy`s album');
        $blog2->setBlog('The russian rock-group Krematoriy passed their first album in 1988 and it`s name was The Vinnus Memuares. They play happy songs about death and etc');
        $blog2->setImage('vine_mem.jpg');
        $blog2->setAuthor('Barik Den');
        $blog2->addTag($this->getReference('tag-1'))->addTag($this->getReference('tag-11'));
        $blog2->setCreated(new \DateTime("2011-07-23 06:12:33"));
        $blog2->setUpdated($blog2->getCreated());
        $blog2->setCategory($manager->merge($this->getReference('category-1')));
        $manager->persist($blog2);

        $blog3 = new Blog();
        $blog3->setTitle('Misdirection. What the eyes see and the ears hear, the mind believes');
        $blog3->setBlog('Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        $blog3->setImage('misdirection.jpg');
        $blog3->setAuthor('Gabriel');
        $blog3->addTag($this->getReference('tag-3'))->addTag($this->getReference('tag-4'))->addTag($this->getReference('tag-5'));
        $blog3->setCreated(new \DateTime("2011-07-16 16:14:06"));
        $blog3->setUpdated($blog3->getCreated());
        $blog3->setCategory($manager->merge($this->getReference('category-1')));
        $manager->persist($blog3);

        $blog4 = new Blog();
        $blog4->setTitle('The grid - A digital frontier');
        $blog4->setBlog('Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.');
        $blog4->setImage('the_grid.jpg');
        $blog4->setAuthor('Kevin Flynn');
        $blog4->addTag($this->getReference('tag-1'))->addTag($this->getReference('tag-4'))->addTag($this->getReference('tag-6'));
        $blog4->setCreated(new \DateTime("2011-06-02 18:54:12"));
        $blog4->setUpdated($blog4->getCreated());
        $blog4->setCategory($manager->merge($this->getReference('category-2')));
        $manager->persist($blog4);

        $blog5 = new Blog();
        $blog5->setTitle('You\'re either a one or a zero. Alive or dead');
        $blog5->setBlog('Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        $blog5->setImage('one_or_zero.jpg');
        $blog5->setAuthor('Gary Winston');
        $blog5->addTag($this->getReference('tag-3'))->addTag($this->getReference('tag-7'))->addTag($this->getReference('tag-8'))->addTag($this->getReference('tag-9'))->addTag($this->getReference('tag-10'))->addTag($this->getReference('tag-1'));
        $blog5->setCreated(new \DateTime("2011-04-25 15:34:18"));
        $blog5->setUpdated($blog5->getCreated());
        $blog5->setCategory($manager->merge($this->getReference('category-3')));
        $manager->persist($blog5);

        $manager->flush();

        $this->addReference('blog-1', $blog1);
        $this->addReference('blog-2', $blog2);
        $this->addReference('blog-3', $blog3);
        $this->addReference('blog-4', $blog4);
        $this->addReference('blog-5', $blog5);
    }

    public function getOrder()
    {
        return 3;
    }

}