<?php

namespace Blogger\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blogger\BlogBundle\Entity\Category;

class CategoryFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setcatName('Sport');
        $category1->setQuantOfPosts(3);
        $category1->setSlug('sport');
        $category1->setIsDefault(0);
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setcatName('News');
        $category2->setQuantOfPosts(1);
        $category2->setSlug('news');
        $category2->setIsDefault(1);
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setCatName('Music');
        $category3->setQuantOfPosts(1);
        $category3->setSlug('music');
        $category3->setIsDefault(0);
        $manager->persist($category3);

        $category4 = new Category();
        $category4->setCatName('Movie');
        $category4->setQuantOfPosts(0);
        $category4->setSlug('movie');
        $category4->setIsDefault(0);
        $manager->persist($category4);

        $manager->flush();

        $this->addReference('category-1', $category1);
        $this->addReference('category-2', $category2);
        $this->addReference('category-3', $category3);
        $this->addReference('category-4', $category4);
    }

    public function getOrder()
    {
        return 1;
    }
} 