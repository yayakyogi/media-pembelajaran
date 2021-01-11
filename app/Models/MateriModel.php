<?php namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model{
    protected $table = "materi";
    public function getMateri(){
        $builder = $this->db->table('materi');
        return $builder->get();
    }
    public function saveMateri($data){
        $query = $this->db->table('materi')->insert($data);
        return $query;
    }
    public function updateMateri($data,$id){
        $query = $this->db->table('materi')->update($data,array('materi_id' => $id));
        return $query;
    }
    public function deleteMateri($id){
        $query = $this->db->table('materi')->delete(array('materi_id' => $id));
    }
}