<?php

namespace App\Repository;

use App\Entity\Condo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Condo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Condo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Condo[]    findAll()
 * @method Condo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CondoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Condo::class);
    }

    // /**
    //  * @return Condo[] Returns an array of Condo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Condo
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
