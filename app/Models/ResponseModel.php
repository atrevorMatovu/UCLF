<?php
namespace App\Models;

use CodeIgniter\Model;


class ResponseModel extends Model

{
    protected $table      = 'responses';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['response','qn_id','photo'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function saveResponse($data)
    {
        $rModel = new ResponseModel();
        $builder = $rModel->builder();
        $builder = $this->db->table('responses');
        $res = $builder->insert($data);
       if($this->db->affectedRows()==1)
        {
            return true;
        }else{
            return false;
        }
    }    
      public function fetchResponse($qn_id)
      {
        $builder = $this->db->table('responses');
        $builder->select('*');
        $builder->where('qn_id',$qn_id,);
        $result = $builder->get()->getResultArray();
        return $result; 
      }
      public function countResponses($qn_id)
      {
        $builder = $this->db->table('responses');
        $builder->select('*');
        $builder->where('qn_id', $qn_id);
        $query = $builder->countAllResults();
        return $query;
      }
      
    
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





