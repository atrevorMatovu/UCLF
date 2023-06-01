<?php
namespace App\Models;

use CodeIgniter\Model;
namespace App\Models;

use CodeIgniter\Model;

class loginModel extends Model
{
    protected $table      = 'membship';
    protected $primaryKey = 'id';

    protected $allowedFields = ['Region', 'State', 'City', 'Address', 'Membership_type', 'Company', 'Position', 'Practice_area', 'user_id', 'Photo', 'Account_status','user_id','activation_date'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
   
    public function createUser($data)
    {
        $memberRegModel = new MemberRegModel();
        $builder = $memberRegModel->builder();
        $builder = $this->db->table('membship');
        $res = $builder->insert($data);
       if($this->db->affectedRows()==1)
        {
            return true;
        }else{
            return false;
        }
    }
    
    public function verifyUserid($id) 
    {
        $builder = $this->db->table('membship');
        $builder->select('*');
        $builder->where('user_id',$id);
        $result = $builder->get()->getRow();
        return $result;    
    }
    

    public function updateAt($id){
        $builder = $this->db->table('membship');
        $builder->where('user_id', $id);
        $builder->update(['updated_at'=>date('Y-m-d h:i:s')]);
        $result = $builder->get()->getRow();
        return $result;
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