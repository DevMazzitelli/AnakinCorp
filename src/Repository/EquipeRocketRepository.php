<?php

namespace App\Repository;

use App\Entity\EquipeRocket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EquipeRocket>
 *
 * @method EquipeRocket|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipeRocket|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipeRocket[]    findAll()
 * @method EquipeRocket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipeRocketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipeRocket::class);
    }

//    /**
//     * @return EquipeRocket[] Returns an array of EquipeRocket objects
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

//    public function findOneBySomeField($value): ?EquipeRocket
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
