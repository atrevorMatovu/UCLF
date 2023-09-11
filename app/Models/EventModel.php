<?php
namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model

{
    protected $table      = 'events';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['eventName','date' ,'venue', 'startTime','endTime'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    
    public function saveEvent($data)
    {
        $eModel = new EventModel();
        $builder = $eModel->builder();
        $builder = $this->db->table('events');
        $res = $builder->insert($data);
       if($this->db->affectedRows()==1)
        {
            return true;
        }else{
            return false;
        }
    }  
    public function fetchEvents()//Events in new tabulated
      {
          $result =  $this->select('id, eventName, date, startTime, endTime, venue')
                      ->groupBy('id')
                      ->get()
                      ->getResultArray();
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
      public function Allcount()
      {
        $builder = $this->db->table('events');
        $builder->select('*');
        
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





