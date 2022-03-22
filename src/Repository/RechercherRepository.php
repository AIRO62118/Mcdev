<?php

namespace App\Repository;

use App\Entity\Rechercher;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rechercher|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rechercher|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rechercher[]    findAll()
 * @method Rechercher[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RechercherRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rechercher::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Rechercher $entity, bool $flush = true): void
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
    public function remove(Rechercher $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }


    public function afficheRecherche()
    {
        return $this->createQueryBuilder('r')
        ->select('competence.libelle, SUM(r.salaire)')
        ->leftJoin('r.competence', 'competence')
        ->groupBy('r.competence')
        ->getQuery()
        ->getResult()
        ;
    }

    public function moyenneRecherche()
    {
        return $this->createQueryBuilder('r')
        ->select('competence.libelle, AVG(r.niveau_demande)')
        ->leftJoin('r.competence', 'competence')
        ->groupBy('r.competence')
        ->getQuery()
        ->getResult()
        ;
    }
/*
    public function nbRecherche_en_un_mois()
    {
        return $this->createQueryBuilder('r')
        ->select('competence.libelle, COUNT(r.id)')
        ->leftJoin('r.competence', 'competence')
        ->groupBy('competence.libelle')
        ->where('r.date_recherche > DATE_SUB(now(),INTERVAL 30 DAY)')
        ->andWhere('r.date_recherche < now()')
        ->getQuery()
        ->getResult()
        ;
    }
*/
    

    // /**
    //  * @return Rechercher[] Returns an array of Rechercher objects
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
    public function findOneBySomeField($value): ?Rechercher
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
