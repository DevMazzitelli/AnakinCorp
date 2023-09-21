<?php

namespace App\Repository;

use App\Entity\EquipeApexLegends;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EquipeApexLegends>
 *
 * @method EquipeApexLegends|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipeApexLegends|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipeApexLegends[]    findAll()
 * @method EquipeApexLegends[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipeApexLegendsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipeApexLegends::class);
    }

//    /**
//     * @return EquipeApexLegends[] Returns an array of EquipeApexLegends objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EquipeApexLegends
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
