<?php
namespace App\Model;
use App\Model\DB;


class AbstractModel
{
    public $db;
    public $table = null;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function findBy($array)
    {
        $sql = 'select * from '.$this->table.' where ';
        $bind = [];

        $i = 0;
        foreach ($array as $key => $row){
            $sql .=($i > 0 ? ' and ' : '').$key.'=:'.$key;
            $bind[$key] = $row;
            $i++;
        }


        try{
            $stmt = $this->db->prepare($sql, $bind);
            $stmt->execute($bind);
            $data = $stmt->fetch();
        }catch (\Exception $exception){
            die($exception->getMessage());
        }


        return $data;

    }

}