<?php namespace App\Models;
use CodeIgniter\Model;
 
class Admin_model extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'username_user';
 
    public function resolveLogin($username, $password)
    {
        $query = $this->db->table($this->table)
                        ->select('password_user')
                        ->where('username_user', $username)
                        ->get();
        $hash = $query->getRow()->password_user;

        return $this->verify_password_hash($password, $hash);
    }

    /**
     * hash_password function.
     *
     * @access private
     * @param mixed $password
     * @return string|bool could be a string on success, or bool false on failure
     */
    private function hash_password($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * verify_password_hash function.
     *
     * @access private
     * @param mixed $password
     * @param mixed $hash
     * @return bool
     */
    private function verify_password_hash($password, $hash) {
        return password_verify($password, $hash);
    }
}