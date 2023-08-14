<?php
namespace App\Models;

use CodeIgniter\Model;

class ForumModel extends Model

{
    protected $table      = 'forums';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['topic','category' ,'question', 'user_id','qn_id', 'photo', 'askedby'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function saveQN($data)
    {
        $fModel = new ForumModel();
        $builder = $fModel->builder();
        $builder = $this->db->table('forums');
        $builder->insert($data);
        $result = $builder->get()->getRow();
        return $result;
      //  if($this->db->affectedRows()==1)
      //   {
      //       return true;
      //   }else{
      //       return false;
      //   }
    }  
    public function createUser($data)
    {
        $fModel = new ForumModel();
        $builder = $fModel->builder();
        $builder = $this->db->table('forums');
        $res = $builder->insert($data);
       if($this->db->affectedRows()==1)
        {
            return true;
        }else{
            return false;
        }
    }  
      public function fetchQNs($user_id)
      {
        $builder = $this->db->table('forums');
        $builder->select('*');
        $builder->where('user_id',$user_id,);
        $result = $builder->get()->getResultArray();
        return $result; 
      }
      public function fetchQN($qn_id)
      {
        $builder = $this->db->table('forums');
        $builder->select('*');
        $builder->where('qn_id',$qn_id,);
        $result = $builder->get()->getRowArray();
        return $result; 
      }
      public function topicQNs($user_id)
      {
        $builder = $this->db->table('forums');
        $builder->select('*');
        $builder->where('category',$user_id,);
        $result = $builder->get()->getResultArray();
        return $result; 
      }
      public function topicCount($user_id)
      {
        $builder = $this->db->table('forums');
        $builder->select('*');
        $builder->where('category', $user_id);
        //$builder->where('status', '0');
        $query = $builder->countAllResults();
        return $query;
      }
      public function getCategoryQuestionCount()
      {
          return $this->select('category, COUNT(*) as question_count')
                      ->groupBy('category')
                      ->get()
                      ->getResultArray();
      }
      public function countQNs($user_id)
      {
        $builder = $this->db->table('forums');
        $builder->select('*');
        $builder->where('user_id', $user_id);
        //$builder->where('status', '0');
        $query = $builder->countAllResults();
        return $query;
      }
      public function qnDelete($user_id, $qn_id)
      {
        $builder = $this->db->table('forums');
        $builder->select('*');
        $builder->where('user_id', $user_id);
        $builder->where('qn_id', $qn_id)->delete();
        $res = $builder->get()->getResultArray();
        return $res;
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





