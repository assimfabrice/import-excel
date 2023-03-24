<?php

namespace App\Repository;

use App\Entity\Product;
use App\Entity\ProductSearchEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Products>
 *
 * @method Products|null find($id, $lockMode = null, $lockVersion = null)
 * @method Products|null findOneBy(array $criteria, array $orderBy = null)
 * @method Products[]    findAll()
 * @method Products[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Product $entity, bool $flush = true): void
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
    public function remove(Product $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
    public function findQuery()
    {
        return $this->createQueryBuilder('p');                
    }
    public function findAllQuery(ProductSearchEntity $productSearchEntity):Query
    {
        $query = $this->findQuery();
        if($productSearchEntity->getName()){
            $query = $query                
                ->andWhere('p.name LIKE :name')                
                ->setParameter('name', "%{$productSearchEntity->getName()}%");
        }
        return $query->getQuery();
    }
    public function search(): array
    {
        return $this->createQueryBuilder('p')
            ->setMaxResults(15)
            ->getQuery()
            ->getArrayResult()
        ;
    }
}
