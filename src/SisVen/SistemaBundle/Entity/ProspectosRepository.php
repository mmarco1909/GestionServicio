<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr;

/**
 * ProspectosRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProspectosRepository extends EntityRepository {

    /**
     * @param array $get
     * @param bool $flag
     * @return array|\Doctrine\ORM\Query
     */
    public function ajaxTable(array $get, $flag = false, $matricula, $producto, $etapa, $estado) {

        /* Indexed column (used for fast and accurate table cardinality) */
        $alias = 'up';

        /* DB table to use */
        $tableObjectName = 'SistemaBundle:Prospectos';

        /**
         * Set to default
         */
        if (!isset($get['columns']) || empty($get['columns']))
            $get['columns'] = array('id');

        $aColumns = array();
        foreach ($get['columns'] as $value)
            $aColumns[] = $alias . '.' . $value;

        
        if ($etapa=='1'){
            $cb = $this->getEntityManager()
                ->getRepository($tableObjectName)
                ->createQueryBuilder($alias)
                ->select(str_replace(" , ", " ", implode(", ", $aColumns)))
                ->where($alias.".matAse = :user_id")
                ->andWhere($alias.".idProducto= :prod_id")
                ->andWhere($alias.".idProcesoEstado in (1, 2)")
                ->andWhere($alias.".idProcesoEtapa in (1, 2)")
                ->setParameter('user_id', $matricula)
                ->setParameter('prod_id', $producto);
//                ->setParameter('etapa_id', $etapa)
//                 ->setParameter('etapa_id2', '2');
                //->setMaxResults(3000);      
        }elseif ($etapa=='5'){
           $cb = $this->getEntityManager()
                ->getRepository($tableObjectName)
                ->createQueryBuilder($alias)
                ->select(str_replace(" , ", " ", implode(", ", $aColumns)))
                ->where($alias.".matAse = :user_id")
                ->andWhere($alias.".idProducto= :prod_id")
                ->andWhere($alias.".idProcesoEstado in (5, 6)")
                ->andWhere($alias.".idProcesoEtapa= :etapa_id")                
                ->setParameter('user_id', $matricula)
                ->setParameter('prod_id', $producto)               
                ->setParameter('etapa_id', $etapa);                 
                //->setMaxResults(3000);      
        }else{
            $cb = $this->getEntityManager()
                ->getRepository($tableObjectName)
                ->createQueryBuilder($alias)
                ->select(str_replace(" , ", " ", implode(", ", $aColumns)))
                ->where($alias.".matAse = :user_id")
                ->andWhere($alias.".idProducto= :prod_id")
                ->andWhere($alias.".idProcesoEstado= :estado_id")
                ->andWhere($alias.".idProcesoEtapa= :etapa_id")                
                ->setParameter('user_id', $matricula)
                ->setParameter('prod_id', $producto)               
                ->setParameter('etapa_id', $etapa)
                ->setParameter('estado_id', $estado);
                //->setMaxResults(3000);      
        }

        if (isset($get['iDisplayStart']) && $get['iDisplayLength'] != '-1') {
            $cb->setFirstResult((int) $get['iDisplayStart'])
                    ->setMaxResults((int) $get['iDisplayLength']);
        }

        /*
         * Ordering
         */
        if (isset($get['iSortCol_0'])) {
            for ($i = 0; $i < intval($get['iSortingCols']); $i++) {
                if ($get['bSortable_' . intval($get['iSortCol_' . $i])] == "true") {
                    $cb->orderBy($aColumns[(int) $get['iSortCol_' . $i]], $get['sSortDir_' . $i]);
                }
            }
        }

        /*
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        if (isset($get['sSearch']) && $get['sSearch'] != '') {
            $aLike = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if (isset($get['bSearchable_' . $i]) && $get['bSearchable_' . $i] == "true") {
                    $aLike[] = $cb->expr()->like($aColumns[$i], '\'%' . $get['sSearch'] . '%\'');
                }
            }
            if (count($aLike) > 0)
                $cb->andWhere(new Expr\Orx($aLike));
            else
                unset($aLike);
        }

        /*
         * SQL queries
         * Get data to display
         */
        $query = $cb->getQuery();

        if ($flag)
            return $query;
        else
            return $query->getResult();
    }
    
    /**
     * @return array|\Doctrine\ORM\Query
     */
    public function getCitas($matricula) {
        /* Indexed column (used for fast and accurate table cardinality) */
        $alias = 'up';

        /* DB table to use */
        $tableObjectName = 'SistemaBundle:Prospectos';        
        
        $aColumns = array();
        $aColumns[] = $alias . '.' . 'cuspp';
        $aColumns[] = $alias . '.' . 'idProducto';
        $aColumns[] = $alias . '.' . 'primerNm';
        $aColumns[] = $alias . '.' . 'segundoNm';
        $aColumns[] = $alias . '.' . 'primerAp';
        $aColumns[] = $alias . '.' . 'segundoAp';
        $aColumns[] = $alias . '.' . 'gestFechaSiguiente';
        $aColumns[] = $alias . '.' . 'idProcesoEtapa';

        $cb = $this->getEntityManager()
                ->getRepository($tableObjectName)
                ->createQueryBuilder($alias)
                ->select(str_replace(" , ", " ", implode(", ", $aColumns)))
                ->where($alias.".matAse = :user_id")               
                ->andWhere($alias.".idProcesoEtapa in (2, 3, 4, 5)")                
                ->setParameter('user_id', $matricula);          
        $query = $cb->getQuery();

        if (1)
            return $query;
        else
            return $query->getResult();
    }

    /**
     * @return array|\Doctrine\ORM\Query
     */
    public function getCitasSup($matricula) {
        /* Indexed column (used for fast and accurate table cardinality) */
        $alias = 'up';

        /* DB table to use */
        $tableObjectName = 'SistemaBundle:Prospectos';        
        
        $aColumns = array();
        $aColumns[] = $alias . '.' . 'cuspp';
        $aColumns[] = $alias . '.' . 'idProducto';
        $aColumns[] = $alias . '.' . 'primerNm';
        $aColumns[] = $alias . '.' . 'segundoNm';
        $aColumns[] = $alias . '.' . 'primerAp';
        $aColumns[] = $alias . '.' . 'segundoAp';
        $aColumns[] = $alias . '.' . 'gestFechaSiguiente';
        $aColumns[] = $alias . '.' . 'idProcesoEtapa';
        $aColumns[] = $alias . '.' . 'nomAse';

        $cb = $this->getEntityManager()
                ->getRepository($tableObjectName)
                ->createQueryBuilder($alias)
                ->select(str_replace(" , ", " ", implode(", ", $aColumns)))
                ->where($alias.".matSup = :user_id")               
                ->andWhere($alias.".idProcesoEtapa in (2, 3, 4, 5)")                
                ->setParameter('user_id', $matricula);          
        $query = $cb->getQuery();

        if (1)
            return $query;
        else
            return $query->getResult();
    }

    
    /**
     * @return int
     */
    public function getCount() {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT COUNT(a) FROM SistemaBundle:Prospectos a')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }

    /**
     * @return int
     */

    public function getNroProspectos($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT COUNT(a) FROM SistemaBundle:Prospectos a '
                        . 'where a.matAse= :matricula '
                        . 'and a.idProducto= :producto ')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }

    /**
     * @return int
     */

    public function getNroProspectosSup($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT COUNT(a) FROM SistemaBundle:Prospectos a '
                        . 'where a.matSup= :matricula '
                        . 'and a.idProducto= :producto ')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }

    /**
     * @return int
     */

    public function getNroProspectosGer($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT COUNT(a) FROM SistemaBundle:Prospectos a '
                        . 'where a.matGer= :matricula '
                        . 'and a.idProducto= :producto ')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }
    
    public function getNroProspectado($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT COUNT(a) FROM SistemaBundle:Prospectos a '
                        . 'where a.matAse= :matricula '
                        . 'and a.idProducto= :producto '
                        . 'and a.idProcesoEtapa>= :etapa')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setParameter('etapa', '1')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }

    public function getNroProspectadoSup($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT COUNT(a) FROM SistemaBundle:Prospectos a '
                        . 'where a.matSup= :matricula '
                        . 'and a.idProducto= :producto '
                        . 'and a.idProcesoEtapa>= :etapa')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setParameter('etapa', '1')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }
    
    public function getNroProspectadoGer($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT COUNT(a) FROM SistemaBundle:Prospectos a '
                        . 'where a.matGer= :matricula '
                        . 'and a.idProducto= :producto '
                        . 'and a.idProcesoEtapa>= :etapa')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setParameter('etapa', '1')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }

    public function getNroVisitas($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT COUNT(a) FROM SistemaBundle:Prospectos a '
                        . 'where a.matAse= :matricula '
                        . 'and a.idProducto= :producto '
                        . 'and a.idProcesoEtapa in (3, 4, 5)')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }

    public function getNroVisitasSup($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT COUNT(a) FROM SistemaBundle:Prospectos a '
                        . 'where a.matSup= :matricula '
                        . 'and a.idProducto= :producto '
                        . 'and a.idProcesoEtapa in (3, 4, 5)')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }

    public function getNroVisitasGer($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT COUNT(a) FROM SistemaBundle:Prospectos a '
                        . 'where a.matGer= :matricula '
                        . 'and a.idProducto= :producto '
                        . 'and a.idProcesoEtapa in (3, 4, 5)')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }
    
    
    public function getNroCierres($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT COUNT(a) FROM SistemaBundle:Prospectos a '
                        . 'where a.matAse= :matricula '
                        . 'and a.idProducto= :producto '
                        . 'and a.idProcesoEtapa = :etapa')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setParameter('etapa', '4')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }

    public function getNroCierresSup($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT COUNT(a) FROM SistemaBundle:Prospectos a '
                        . 'where a.matSup= :matricula '
                        . 'and a.idProducto= :producto '
                        . 'and a.idProcesoEtapa = :etapa')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setParameter('etapa', '4')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }

    public function getNroCierresGer($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT COUNT(a) FROM SistemaBundle:Prospectos a '
                        . 'where a.matGer= :matricula '
                        . 'and a.idProducto= :producto '
                        . 'and a.idProcesoEtapa = :etapa')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setParameter('etapa', '4')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }

    
    public function getRamCierres($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT SUM(a.gestRam) FROM SistemaBundle:Prospectos a '
                        . 'where a.matAse= :matricula '
                        . 'and a.idProducto= :producto '
                        . 'and a.idProcesoEtapa = :etapa')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setParameter('etapa', '4')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }

    public function getRamCierresSup($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT SUM(a.gestRam) FROM SistemaBundle:Prospectos a '
                        . 'where a.matSup= :matricula '
                        . 'and a.idProducto= :producto '
                        . 'and a.idProcesoEtapa = :etapa')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setParameter('etapa', '4')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }
    
    public function getRamCierresGer($matricula) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT SUM(a.gestRam) FROM SistemaBundle:Prospectos a '
                        . 'where a.matGer= :matricula '
                        . 'and a.idProducto= :producto '
                        . 'and a.idProcesoEtapa = :etapa')
                ->setParameter('matricula', $matricula)
                ->setParameter('producto', 'TRA')
                ->setParameter('etapa', '4')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }

    
    public function getMetaProspectado() {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT COUNT(a) FROM SistemaBundle:Prospectos a '
                        . 'where a.matAse=18 '
                        . 'and a.idProducto=1 '
                        . 'and a.idProcesoEtapa=1 ')
                ->setMaxResults(1)
                ->getResult();
        return $aResultTotal[0][1];
    }
    
    public function getPorCuspp($cuspp) {
        $aResultTotal = $this->getEntityManager()
                ->createQuery('SELECT a.cuspp FROM SistemaBundle:Prospectos a '
                        . 'where a.cuspp='."'".$cuspp."'")                              
                ->getResult();       
        return $aResultTotal;
    }
    
    
    
}
