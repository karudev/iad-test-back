<?php
namespace App\Model;
use App\Model\DB;

/**
 * Class AbstractModel
 * @package App\Model
 */
class AbstractModel
{
    public $db;
    public $table = null;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    /**
     * Request with params
     * @param array $array
     * @param bool $multiple
     * @param string $join
     * @param string $sort
     * @param string $order
     * @return array|mixed
     */
    public function findBy($array = [], $multiple = false, $join = '', $sort='id', $order = 'asc')
    {
        $sql = 'select * from '.$this->table;
        $bind = [];

        if($join !== ''){
            $sql.= ' '.$join;
        }

        if(count($array) > 0){
            $sql .= ' where ';
        }

        $i = 0;
        foreach ($array as $key => $row){
            $sql .=($i > 0 ? ' and ' : '').$key.'=:'.$key;
            $bind[$key] = $row;
            $i++;
        }

        $sql .= ' order by '.$sort. ' '.$order;

        try{
            $stmt = $this->db->prepare($sql, $bind);
            $stmt->execute($bind);
            $data = $multiple ? $stmt->fetchAll() : $stmt->fetch() ;
        }catch (\Exception $exception){
            die($exception->getMessage());
        }


        return $data;

    }

    /**
     * Insert with params
     * @param $array
     * @return bool
     */
    public function insert($array)
    {
        $sql = 'insert into '.$this->table .' ( ';
        $bindSql = " values ( ";
        $bind = [];

        $i = 0;
        foreach($array as $key => $row){
            $sql.= ($i > 0 ? ', ' : '').$key;
            $bindSql .=($i > 0 ? ', ' : '').':'.$key;
            $bind[$key] = $row;
            $i++;
        }
        $sql .=' ) ';
        $bindSql .=' ) ';

        $stmt = $this->db->prepare($sql.$bindSql);
        $bool = $stmt->execute($bind);

        return $bool;

    }

}