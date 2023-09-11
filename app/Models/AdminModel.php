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

    protected $allowedFields = ['email', 'password', 'username', 'photo', 'position', 'Tel'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function verifyEmail($email)
    {
        $builder = $this->db->table('admins');
        $builder->select("email, password, username, photo, position, Tel");
        $builder->where('email', $email);
        $result = $builder->get()->getRowArray();
        return $result;        
    }
    public function getEmail($email)
    {
        $builder = $this->db->table('admins');
        $builder->select("id, email, password, username");
        $builder->where('email', $email);
        $res = $builder->get()->getRow();
        return $res;   
    }
    public function updateAdmin($email, $userdata)
    {
        $adminModel = new AdminModel();
        $builder = $adminModel->builder();
        $builder = $this->db->table('admins');
        $builder->set([
            'username' => $userdata['username'],
            'position'  => $userdata['position'],
            'photo'     => $userdata['photo'],
            'email'     => $userdata['email'],
            'Tel'       => $userdata['Tel']
          ]);
        $builder->where('email', $email);
        $builder->update();
    
        if($this->db->affectedRows() == 1)
        {
            return true;
        }else{
            return false;
        }
    }
    
    public function updatePassword($email, $new_password)
    {
        $data = [
            'password' => password_hash($new_password, PASSWORD_DEFAULT),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    
        $builder = $this->db->table('admins');
        $builder->where('email', $email);
        $builder->update($data);
    
        if($this->db->affectedRows() == 1)
        {
            return true;
        }else{
            return false;
        }
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





