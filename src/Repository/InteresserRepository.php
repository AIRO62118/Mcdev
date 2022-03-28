<?php

namespace App\Repository;

use App\Entity\Interesser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Interesser|null find($id, $lockMode = null, $lockVersion = null)
 * @method Interesser|null findOneBy(array $criteria, array $orderBy = null)
 * @method Interesser[]    findAll()
 * @method Interesser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InteresserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Interesser::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Interesser $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Interesser $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Interesser[] Returns an array of Interesser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Interesser
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function afficheFavori($entreprise)
    {
        return $this->createQueryBuilder('u')
        ->andWhere('u.entreprise = :entreprise')
        ->setParameter('entreprise', $entreprise)
        ->orderBy('u.user', 'ASC')
        ->getQuery()
        ->getResult()
        ;
    }

}
