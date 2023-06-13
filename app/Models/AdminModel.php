<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model

{
    protected $table      = 'admins';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['email', 'password', 'username'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function verifyEmail($email)
    {
        $builder = $this->db->table('admins');
        $builder->select("email, password, username");
        $builder->where('email', $email);
        $result = $builder->get()->getRowArray();
        return $result;        
    }

    public function verifyPassword($pwd)
    {
        $builder = $this->db->table('admins');
        $builder->select("email, password, username");
        $builder->where('password', $pwd);
        $result = $builder->get()->getRow();
        return $result;        
    }

    public function createUser($data)
    {
        $adminModel = new AdminModel();
        $builder = $adminModel->builder();
        $builder = $this->db->table('admins');
        $res = $builder->insert($data);
       if($this->db->affectedRows()==1)
        {
            return true;
        }else{
            return false;
        }
    }
  

       // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

}  





