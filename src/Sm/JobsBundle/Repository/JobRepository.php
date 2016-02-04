<?php

namespace Sm\JobsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class JobRepository
 * @package Sm\JobsBundle\Repository
 */
class JobRepository extends EntityRepository
{
    /**
     * THIS FIRST FUNCTION BUILDS A RESULT SET OF JOBS WHICH: HAVE NOT EXPIRED, ARE PUBLISHED (ACTIVATED),
     * ORDERED BY EXPIRY DATE (DESC), LESS THAN THE MAX # S(SET IN PARAM),
     * OFFSET IF A PAGER IS USED (ON CAT PAGES), FILTERED BY CAT ON CAT PAGES
     */
    /**
     * @param null $category_id
     * @param null $max
     * @param null $offset
     * @return array
     */
    public function getActiveJobs($category_id = null, $max = null, $offset = null)
    {
        $qb = $this->createQueryBuilder('j')
            ->where('j.expires_at > :date')
            ->setParameter('date', date('Y-m-d H:i:s', time()))
            ->andWhere('j.is_activated = :activated')
            ->setParameter('activated', 1)
            ->orderBy('j.expires_at', 'DESC');

        if($max)
        {
            $qb->setMaxResults($max);
        }

        if($offset)
        {
            $qb->setFirstResult($offset);
        }

        if($category_id)
        {
            $qb->andWhere('j.category = :category_id')
                ->setParameter('category_id', $category_id);
        }

        $query = $qb->getQuery();

        return $query->getResult();
    }

    /**
     * RETURNS A COUNT OF JOBS BY CATEGORY, WHICH ARE NOT EXPIRED, WHICH ARE PUBLISHED (ACTIVATED)
     */
    /**
     * @param null $category_id
     * @return mixed
     */
    public function countActiveJobs($category_id = null)
    {
        $qb = $this->createQueryBuilder('j')
            ->select('count(j.id)')
            ->where('j.expires_at > :date')
            ->setParameter('date', date('Y-m-d H:i:s', time()))
            ->andWhere('j.is_activated = :activated')
            ->setParameter('activated', 1);

        if($category_id)
        {
            $qb->andWhere('j.category = :category_id')
                ->setParameter('category_id', $category_id);
        }

        $query = $qb->getQuery();

        return $query->getSingleScalarResult();
    }

    /**
     * RETURNS A JOB RECORD, WHICH IS NOT EXPIRED, WHICH IS PUBLISHED (ACTIVATED), BY ID
     */
    /**
     * @param $id
     * @return mixed|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getActiveJob($id)
    {
        $query = $this->createQueryBuilder('j')
            ->where('j.id = :id')
            ->setParameter('id', $id)
            ->andWhere('j.expires_at > :date')
            ->setParameter('date', date('Y-m-d H:i:s', time()))
            ->andWhere('j.is_activated = :activated')
            ->setParameter('activated', 1)
            ->setMaxResults(1)
            ->getQuery();

        try {
            $job = $query->getSingleResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $job = null;
        }

        return $job;
    }
    public function findOneById($id)
    {
        return $this->findOneBy(array('id' => $id));
    }
    public function findOneBySlug($slug)
    {
        return $this->findOneBy(array('slug' => $slug));
    }

    public function findOneByToken($token)
    {
        return $this->findOneBy(array('token' => $token));
    }
}