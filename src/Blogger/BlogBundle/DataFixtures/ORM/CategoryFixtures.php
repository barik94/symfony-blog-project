<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 24.03.14
 * Time: 15:55
 */

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
        $category1->setQuantOfPosts(1);
        $category1->setSlug('sport');
        $category1->setIsDefault(0);
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setcatName('News');
        $category2->setQuantOfPosts(3);
        $category2->setSlug('news');
        $category2->setIsDefault(1);
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setCatName('Music');
        $category3->setQuantOfPosts(1);
        $category3->setSlug('music');
        $category3->setIsDefault(0);
        $manager->persist($category3);

        $manager->flush();

        $this->addReference('category-1', $category1);
        $this->addReference('category-2', $category2);
        $this->addReference('category-3', $category3);
    }

    public function getOrder()
    {
        return 1;
    }
} 