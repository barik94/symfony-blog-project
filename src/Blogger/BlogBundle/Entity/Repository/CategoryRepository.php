<?php

namespace Blogger\BlogBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
    public function getAllCategories()
    {
        $fullCategories = $this->createQueryBuilder('c')
            ->select('c')
            ->where('c.quantOfPosts != 0')
            ->addOrderBy('c.catName', 'ASC');

        return $fullCategories->getQuery()
            ->getResult();
    }

    public function findBySlug($slug) {
        $qb = $this->createQueryBuilder('c')
            ->select('c')
            ->where('c.slug = :slug')
            ->setParameter('slug', $slug);
        return $qb->getQuery()->getOneOrNullResult();
    }

    public function getQuantityOfPostsInAllCategories()
    {
        $categories = $this->getAllCategories();

        foreach ($categories as $category) {
            $em = $this->getEntityManager();
            $category->setQuantOfPosts($em->getRepository('BloggerBlogBundle:Blog')->getQuantityOfPostsInCategory($category));
        }

    }
}
