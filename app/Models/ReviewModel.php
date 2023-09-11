<?php
namespace App\Models;

use CodeIgniter\Model;


class ReviewModel extends Model

{
    protected $table      = 'reviews';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['user_id','admin', 'comment'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function saveResponse($data)
    {
        $rModel = new ReviewModel();
        $builder = $rModel->builder();
        $builder = $this->db->table('reviews');
        $res = $builder->insert($data);
       if($this->db->affectedRows()==1)
        {
            return true;
        }else{
            return false;
        }
    }  
    public function getReview($user_id)
      {
        $builder = $this->db->table('reviews');
        $builder->select('user_id, comment, created_at');
        $builder->where('user_id',$user_id,);
        $builder->orderBy('created_at', 'DESC'); // Sort by created_at in descending order
        $builder->limit(1);
        $result = $builder->get()->getRowArray();
        return $result; 
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





