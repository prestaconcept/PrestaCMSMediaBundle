<?php
/**
 * This file is part of the Bpeek website
 *
 * Developed by PrestaConcept <http://www.prestaconcept.net>
 */
namespace Presta\CMSMediaBundle\Model\Carousel;

use Doctrine\ORM\EntityRepository;

/**
 * @author Nicolas Joubert <njoubert@prestaconcept.net>
 */
class Repository extends EntityRepository
{
    /**
     * Return a list of carousel items
     *
     * @param  integer $limit
     * @return ArrayCollection
     */
    public function findLimited($limit = 0)
    {
        $queryBuilder = $this->createQueryBuilder('c')
            ->where('c.enabled = :enabled')
            ->orderBy('c.rank')
            ->setParameters(array(
                'enabled' => true,
            ));

        if ($limit != 0) {
            $queryBuilder->setMaxResults($limit);
        }

        return $queryBuilder->getQuery()->getResult();
    }
}
