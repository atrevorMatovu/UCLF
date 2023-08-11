<?php
namespace App\Models;

use CodeIgniter\Model;
namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'members';
    protected $primaryKey = 'id';

    protected $allowedFields = ['FirstName', 'LastName', 'Email', 'Password', 'Membership_type', 'Tel', 'Address','Account_status','user_id','Region', 'State', 'City', 'Address', 'Company', 'Position', 'Practice_area', 'user_id', 'Photo','activation_date'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    
    public function getMemberCountsByMembershipType()
    {
        $builder = $this->db->table('members');

        $builder->select('Membership_type, COUNT(*) as total_members');
        $builder->groupBy('Membership_type');
        $builder->whereIn('Membership_type', ['individual', 'student', 'life', 'institutional', 'law-fellowship']);

        $query = $builder->countAllResults();

        return $query;
    }

    public function getTotalMembers()
    {
        $builder = $this->db->table('members');

        $builder->selectCount('* as total_members');

        $query = $builder->countAllResults();

        return $query;
    }
    public function verifyUserid($id) 
    {
        $builder = $this->db->table('members');
        $builder->select('*');
        $builder->where('user_id',$id);
        $result = $builder->get()->getRow();
        return $result;    
    }
    public function verifyEmail($email)
    {
        $builder = $this->db->table('members');
        $builder->select("user_id, Email, FirstName, LastName, Membership_type, Tel, Password, Account_status");
        $builder->where('Email', $email);
        $result = $builder->get()->getRowArray();
        return $result;        
    }

    public function verifyUser($id)
    {
        $builder = $this->db->table('members');
        $builder->select("user_id, Email, FirstName, LastName, Membership_type, Tel, Account_status, Region, State, City, Address, Company, Position, Practice_area, Photo");
        $builder->where('user_id', $id);
        $result = $builder->get()->getRowArray();
        return $result;           
    }

    public function verifyEmailAndPassword($email, $password)
    {
    $builder = $this->db->table('members');
    $builder->select("user_id, Email, Password, Account_status");
    $builder->where('Email', $email);
    $result = $builder->get();

    if($result->getNumRows() == 1)
        {
            $row = $result->getRow();
            $password_hash = $row->Password;

            if(password_verify($password, $password_hash) && $row->Account_status == 'Pending')
            {
                return $row->user_id; // Return the user ID if everything checks out
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }


    public function updateAt($id){
        $builder = $this->db->table('members');
        $builder->where('user_id', $id);
        $builder->update(['updated_at'=>date('Y-m-d h:i:s')]);
        $result = $builder->get()->getRow();
        return $result;
    }

    public function updatePassword($user_id, $new_password)
    {
        $data = [
            'Password' => password_hash($new_password, PASSWORD_DEFAULT),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    
        $builder = $this->db->table('members');
        $builder->where('user_id', $user_id);
        $builder->update($data);
    
        if($this->db->affectedRows() == 1)
        {
            return true;
        }else{
            return false;
        }
    }
    public function updateAccountStatus($userId, $status)
    {
        $data = [
            'Account_status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ];
    
        $builder = $this->db->table('members');
        $builder->where('user_id', $userId);
        $builder->update($data);
        $result = $builder->get()->getRowArray();
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