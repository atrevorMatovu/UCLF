<?php
namespace App\Models;

use CodeIgniter\Model;

class MemberRegModel extends Model

{
    protected $table      = 'members';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['Firstname', 'Lastname', 'Email', 'Password', 'Membership_type', 'Account_status', 'user_id', 'Address', 'Tel', 'activation_date'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function createUser($data)
    {
        $memberRegModel = new MemberRegModel();
        $builder = $memberRegModel->builder();
        $builder = $this->db->table('members');
        $res = $builder->insert($data);
        // $result = $builder->get()->getRow();
        // return $result;
       if($this->db->affectedRows()==1)
        {
            return true;
        }else{
            return false;
        }
    }

    public function verifyUserid($id) 
    {
        $builder = $this->db->table('members');
        $builder->select('*');
        $builder->where('user_id',$id);
        $result = $builder->get()->getRow();
        return $result;    
    }

    public function updateStatus($user_id)
      {
        $builder = $this->db->table('members');
        $builder->where('user_id',$user_id,);
        $builder->update(['Account_status' => 'Pending']);
        $result = $builder->get()->getRow();
        return $result; 
      }

    public function getAll()
    {
        $builder = $this->db->table('members');
        $results = $builder->get()->getResult();
        return $results;
    }

    public function getUser($user_id)
    {
        $builder = $this->db->table('members');
        $builder->where('id', $user_id);
        $result = $builder->get()->getRow();
        return $result;
    }
   
   
      /**/
    
    // Dates
   
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





