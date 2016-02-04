<?php

namespace Sm\JobsBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
    public function getWithJobs()
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT c FROM JobsBundle:Category c LEFT JOIN c.jobs j WHERE j.expires_at > :date AND j.is_activated = :activated'
        )->setParameter('date', date('Y-m-d H:i:s', time()))->setParameter('activated', 1);

        return $query->getResult();
    }

    /**
     * @param $slug
     * @return null|object
     */
    public function findOneBySlug($slug)
    {
        return $this->findOneBy(array('slug' => $slug));

    }
}