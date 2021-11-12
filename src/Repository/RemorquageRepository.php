<?php

namespace App\Repository;

use App\Entity\Remorquage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Remorquage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Remorquage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Remorquage[]    findAll()
 * @method Remorquage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RemorquageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Remorquage::class);
    }

    // /**
    //  * @return Remorquage[] Returns an array of Remorquage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Remorquage
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
