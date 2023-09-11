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

    protected $allowedFields = ['reply','repliedBy','reply_id','qn_id','photo','user_id','comment', 'comment_id','commentedBy'];

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
    public function fetchSingle($qn_id)
      {
        $builder = $this->db->table('responses');
        $builder->select('*');
        $builder->where('qn_id',$qn_id,);
        $builder->where('id', '36');
        $result = $builder->get()->getResultArray();
        return $result; 
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
      public function getComQnCount()//Comment Question count in new tabulated
      {
          return $this->select('qn_id, COUNT(*) as comment_count')
                      ->groupBy('qn_id')
                      ->get()
                      ->getResultArray();
      }
      public function fetchReply()//Reply data 4 comments & count in new tabulated
      {
          return $this->select('reply_id, COUNT(*) as replies')
                      ->groupBy('reply_id')
                      ->get()
                      ->getResultArray();
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





