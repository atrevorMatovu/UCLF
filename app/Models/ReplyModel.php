<?php
namespace App\Models;

use CodeIgniter\Model;


class ReplyModel extends Model
{
    protected $table      = 'reply';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['reply','repliedBy','reply_id','qn_id','photo','user_id'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function saveReply($data)
    {
        $rModel = new ResponseModel();
        $builder = $rModel->builder();
        $builder = $this->db->table('reply');
        $res = $builder->insert($data);
       if($this->db->affectedRows()==1)
        {
            return true;
        }else{
            return false;
        }
    }    
      public function getReply($qn_id)
      {
        $builder = $this->db->table('reply');
        $builder->select('*');
        $builder->where('qn_id',$qn_id,);
        $result = $builder->get()->getResultArray();
        return $result; 
      }
      
      public function fetchReplyCount()//Replies data to comment & count in new tabulated
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





