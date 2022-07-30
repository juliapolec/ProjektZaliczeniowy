<?php

namespace App\Repository;

use App\Entity\NazwaGryPlanszowe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NazwaGryPlanszowe>
 *
 * @method NazwaGryPlanszowe|null find($id, $lockMode = null, $lockVersion = null)
 * @method NazwaGryPlanszowe|null findOneBy(array $criteria, array $orderBy = null)
 * @method NazwaGryPlanszowe[]    findAll()
 * @method NazwaGryPlanszowe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NazwaGryPlanszoweRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NazwaGryPlanszowe::class);
    }

    public function add(NazwaGryPlanszowe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(NazwaGryPlanszowe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return NazwaGryPlanszowe[] Returns an array of NazwaGryPlanszowe objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NazwaGryPlanszowe
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
