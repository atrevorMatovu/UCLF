<?php
namespace App\Models;

use CodeIgniter\Model;
use PharIo\Manifest\Email;

class AdminNotifyModel extends Model

{
    protected $table      = 'adminnotified';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['msg', 'status', 'user_id','type'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function saveNotif($data)
    {
        $adnotifyModel = new AdminNotifyModel();
        $builder = $adnotifyModel->builder();
        $builder = $this->db->table('adminnotified');
        $res = $builder->insert($data);
       if($this->db->affectedRows()==1)
        {
            return true;
        }else{
            return false;
        }
    }
    public function readAll($user_id)
      {
        $builder = $this->db->table('adminnotified');
        $builder->where('user_id', $user_id);
        $builder->where('status', '0');
        $builder->update(['status' => '1']);
        $query = $builder->get()->getResultArray();
        return $query;
      }
    public function updateStati($user_id, $statusID)
      {
        $builder = $this->db->table('adminnotified');
        $builder->where('user_id',$user_id,);
        $builder->where('id', $statusID);
        $builder->update(['status' => '1']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }else{
            return false;
        }
      }
      public function fetchNotif($user_id)
      {
        $builder = $this->db->table('adminnotified');
        $builder->select('*');
        $builder->where('user_id',$user_id,);
        $result = $builder->get()->getResultArray();
        return $result; 
      }
      public function count_unread_notifications($user_id)
      {
        $builder = $this->db->table('adminnotified');
        $builder->select('*');
        $builder->where('user_id', $user_id);
        $builder->where('status', '0');
        $query = $builder->countAllResults();
        return $query;
      }

      public function fetchNewNotifications($user_id, $lastStamp)
      {
        $builder = $this->db->table('adminnotified');
        $builder->where('user_id', $user_id);
        $builder->where('created_at >', $lastStamp);
        $builder->orderBy('created_at', 'asc');
        $result = $builder->get()->getResult();
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





