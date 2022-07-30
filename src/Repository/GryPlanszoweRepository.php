<?php

namespace App\Repository;

use App\Entity\GryPlanszowe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GryPlanszowe>
 *
 * @method GryPlanszowe|null find($id, $lockMode = null, $lockVersion = null)
 * @method GryPlanszowe|null findOneBy(array $criteria, array $orderBy = null)
 * @method GryPlanszowe[]    findAll()
 * @method GryPlanszowe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GryPlanszoweRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GryPlanszowe::class);
    }

    public function add(GryPlanszowe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(GryPlanszowe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return GryPlanszowe[] Returns an array of GryPlanszowe objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GryPlanszowe
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
