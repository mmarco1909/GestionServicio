<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr;

/**
 * RangoRamRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RangoRamRepository extends EntityRepository {

    /**
     * @param array $get
     * @param bool $flag
     * @return array|\Doctrine\ORM\Query
     */
    public function ajaxrangoTable(array $get, $flag = false, $ram) {

        /* Indexed column (used for fast and accurate table cardinality) */
        $alias = 'up';

        /* DB table to use */
        $tableObjectName = 'SistemaBundle:RangoRam';

        /**
         * Set to default
         */
        if (!isset($get['columns']) || empty($get['columns']))
            $get['columns'] = array('id');

        $aColumns = array();
        foreach ($get['columns'] as $value)
            $aColumns[] = $alias . '.' . $value;

            $cb = $this->getEntityManager()
                ->getRepository($tableObjectName)
                ->createQueryBuilder($alias)
                ->select(str_replace(" , ", " ", implode(", ", $aColumns)))
                ->where($alias.".ramIni <= :ram_id")
                ->andWhere($alias.".ramFin > :ram_id")
                ->setParameter('ram_id', $ram);
                //->setMaxResults(3000);      

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
    public function  getRango($ram) {
        $consulta_rango = $this->getEntityManager()
                ->createQuery('select o from SistemaBundle:RangoRam o '
                . 'where o.ramIni <= :v_ram '
                . 'and o.ramFin > :v_ram')
                ->setparameter('v_ram', $ram)
                ->getResult();
        
        return $consulta_rango;

    }
    
    
}
