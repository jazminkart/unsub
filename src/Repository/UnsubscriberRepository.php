<?php

namespace App\Repository;

use App\Entity\Unsubscriber;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Unsubscriber|null find($id, $lockMode = null, $lockVersion = null)
 * @method Unsubscriber|null findOneBy(array $criteria, array $orderBy = null)
 * @method Unsubscriber[]    findAll()
 * @method Unsubscriber[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnsubscriberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Unsubscriber::class);
    }

    // /**
    //  * @return Unsubscriber[] Returns an array of Unsubscriber objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Unsubscriber
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
