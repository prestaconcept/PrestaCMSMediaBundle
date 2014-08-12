<?php
/**
 * This file is part of the PrestaCMSMediaBundle
 *
 * (c) PrestaConcept <www.prestaconcept.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
            ->orderBy('c.position')
            ->setParameters(array(
                'enabled' => true,
            ));

        if ($limit != 0) {
            $queryBuilder->setMaxResults($limit);
        }

        return $queryBuilder->getQuery()->getResult();
    }
}
