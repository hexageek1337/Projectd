<?php namespace App\Models;
use CodeIgniter\Model;
 
class Safelink_model extends Model
{
    protected $table = 'safelink';
    protected $primaryKey = 'kode_safelink';
    protected $allowedFields = ['kode_safelink', 'nama_safelink', 'slug_safelink', 'url_safelink', 'hits_safelink', 'created_safelink'];

    public function goLink($slug)
    {
        $query = $this->db->table($this->table)
                        ->where('slug_safelink', $slug)
                        ->get();

        return $query->getRow();
    }
     
    public function getData($id = null)
    {
        if($id === null){
            return $this->findAll();
        } else {
            return $this->getWhere(['kode_safelink' => $id]);
        }   
    }
 
    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
 
    public function updateData($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('kode_safelink' => $id));
        return $query;
    }

    public function CounterSafelink($data, $id)
    {
        $query = $this->db->table($this->table)->update(array('hits_safelink' => $data+1), array('slug_safelink' => $id));
        return $query;
    }
 
    public function deleteData($id)
    {
        $query = $this->db->table($this->table)->delete(array('kode_safelink' => $id));
        return $query;
    } 
}