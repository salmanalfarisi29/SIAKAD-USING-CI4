<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class MUser extends Model{
    protected $table = 'tbl_user';
    protected $allowedFields = ['nama','username','password'];
    public function getUser($username)
    {
    $query = $this->db->query("SELECT * FROM user where binary username = '$username'");
    return $query->getResult();
    }
}