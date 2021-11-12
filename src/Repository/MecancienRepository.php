<?php

namespace App\Repository;

use App\Entity\Mecancien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mecancien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mecancien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mecancien[]    findAll()
 * @method Mecancien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MecancienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mecancien::class);
    }

    // /**
    //  * @return Mecancien[] Returns an array of Mecancien objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mecancien
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
