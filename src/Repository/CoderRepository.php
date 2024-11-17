<?php

namespace App\Repository;

use App\Entity\Coder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Coder>
 */
class CoderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Coder::class);
    }

    public function findAllActive(): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.fired = FALSE')
            ->getQuery()
            ->getResult()
        ;
    }

    public function avgAge(): float
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT AVG(EXTRACT(DAY FROM CURRENT_DATE - birthdate::TIMESTAMP)/365) 
            FROM coder
            WHERE fired = FALSE
            ';

        $resultSet = $conn->executeQuery($sql);

        return $resultSet->fetchOne();
    }
}
