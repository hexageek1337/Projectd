<?php namespace App\Models;
use CodeIgniter\Model;
 
class Project_model extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'kode_project';
     
    public function getData($id = null)
    {
        if($id === null){
            return $this->findAll();
        } else {
            return $this->getWhere(['kode_project' => $id]);
        }   
    }

    public function getDataLevel($level = null)
    {
        return $this->where(['level_project' => $level])
                    ->get()
                    ->getResultArray();
    }
 
    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
 
    public function updateData($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('kode_project' => $id));
        return $query;
    }
 
    public function deleteData($id)
    {
        $query = $this->db->table($this->table)->delete(array('kode_project' => $id));
        return $query;
    } 
}