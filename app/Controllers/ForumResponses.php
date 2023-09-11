<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\LoginModel;
use App\Models\adminModel;
use App\Models\MemberRegModel;
use App\Models\ForumModel;
use App\Models\UnotifyModel;
use App\Models\AdminNotifyModel;
use App\Models\ResponseModel;
use App\Models\ReplyModel;
use App\Controllers\route;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\CLIRequest;

class ForumResponses extends BaseController
{
    public $session;
    public $onboardModel;
    public $loginModel;
    public $unotifyModel;
    public function __construct()
    {
        helper(['form', 'html', 'date', 'time']);
        $db = db_connect(); 
        $memberRegModel = new MemberRegModel();
        $this->loginModel = new LoginModel();
        $this->session = \Config\Services::session();
        $email = \Config\Services::email();
    }
    public function forum()
        {
            $loginModel = new loginModel;
            $unotifyModel = new UnotifyModel;
            $fModel = new ForumModel;
            $loggedInUserid = session()->get('loggedInUser');
            
            //Notification logic
            $notif    = $unotifyModel->fetchNotif($loggedInUserid);
            $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);
            
            //Fetching user account data
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            
            //Questions logic(FORUM PAGE)
            $qn = $fModel->fetchQNs($loggedInUserid);

            $data = [
                'title'     => 'UserDashboard',
                'userdata'  => $userdata,
                'notif'     => $notif,
                'notCount'  => $notifCount,
                'qn'        => $qn
            ];

            $data['validation'] = null;

            return View("dashboard/forum", $data);
        } 
        public function updateForm()
        {
        $loginModel = new loginModel;
        $unotifyModel = new UnotifyModel;
        $fModel = new ForumModel;
        //$id = $this->request->getVar('userId');
        $loggedInUserid = session()->get('loggedInUser');
        
        //Notification logic
        $notif    = $unotifyModel->fetchNotif($loggedInUserid);
        $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);
        
        //Fetching user account data
        $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
        
        //Questions logic(FORUM PAGE)
        $qn = $fModel->fetchQNs($loggedInUserid);

        $data = [
            'title'     => 'Forum',
            'userdata'  => $userdata,
            'notif'     => $notif,
            'notCount'  => $notifCount,
            'qn'        => $qn
        ];

        $data['validation'] = null;

        $this->session = \Config\Services::session();
        
        if($this->request->getPost())
        {        
        $rules = [
            'topic' =>[
                'rules'=>'required',
                'errors'=> [
                    'required'=>'Address is required',
                ],
            ],
            'question' =>[
                'rules'=>'required',
                'errors'=> [
                    'required'=>'Question is required.',
                ],
            ],
        ];
       

            if($this->validate($rules) )
            {
               
                $qn_id  = md5(str_shuffle('question'.time()));
                 $fdata = [
                    'topic' => $this->request->getVar('topic'),
                    'category'  => $this->request->getVar('category'),
                    'question'  => $this->request->getVar('question'),
                    'photo'     => $this->request->getVar('photo'),
                    'askedby'   => $this->request->getVar('askedby'),
                    'user_id'   => $loggedInUserid,
                    'qn_id'     => $qn_id
                ];
                //print_r($fdata);
                
                // Save user's forum information in the database
                $QN = $fModel->saveQN($fdata);
                if($QN)
                {
                    if($this->session->get('loggedInUser'))
                    {
                        session()->setFlashdata('success', 'Question saved succesfully.');
                        return redirect()->to('viewTopic');  
                    }                 
                } 
                else
                {
                    session()->setFlashdata('error', 'Failed to save question, try again');
                    return redirect()->to(current_url());
                }                       
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        return view("dashboard/forum",  $data);
        }

        public function forumTopic()
        {
            $loginModel = new loginModel;
            $unotifyModel = new UnotifyModel;
            $fModel = new ForumModel;
            $catModel = new CategoryModel();
            $loggedInUserid = session()->get('loggedInUser');
            
            //Notification logic
            $notif    = $unotifyModel->fetchNotif($loggedInUserid);
            $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);
            
            //Fetching user account data
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            
            //Questions logic(FORUM PAGE)
            $qn = $fModel->fetchQNs($loggedInUserid);
            $qnCount = $fModel->countQNs($loggedInUserid);
            $allQN = $fModel->AllcountQNs();

            //Category Logic
            $category = $catModel->getAll();

           
            $qnCountperTopic = $fModel->getCategoryQuestionCount();
            //var_dump($category);
            $data = [
                'title'     => 'Topic Category',
                'userdata'  => $userdata,
                'notif'     => $notif,
                'notCount'  => $notifCount,
                'category'  => $category,
                'qnc'       => $allQN,
                'qnCountperTopic'=>$qnCountperTopic
            ];
           return view("dashboard/forumQN", $data);
        }
        public function myQuestion()
        {
            $loginModel = new loginModel;
            $unotifyModel = new UnotifyModel;
            $fModel = new ForumModel;
            $loggedInUserid = session()->get('loggedInUser');
            
            //Notification logic
            $notif    = $unotifyModel->fetchNotif($loggedInUserid);
            $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);
            
            //Fetching user account data
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            
            //Questions logic(FORUM PAGE)
            $qn = $fModel->fetchQNs($loggedInUserid);
            $qnCount = $fModel->countQNs($loggedInUserid);

            $data = [
                'title'     => 'My Questions',
                'userdata'  => $userdata,
                'notif'     => $notif,
                'notCount'  => $notifCount,
                'qn'        => $qn,
                'qnc'       => $qnCount
            ];
            return view("dashboard/myQN", $data);
        }
        public function discussion()
        {
            $loginModel = new loginModel;
            $unotifyModel = new UnotifyModel;
            $fModel = new ForumModel;
            $respModel = new ResponseModel;
            $loggedInUserid = session()->get('loggedInUser');
            
            //Notification logic
            $notif    = $unotifyModel->fetchNotif($loggedInUserid);
            $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);
            
            //Fetching user account data
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            
            //Questions logic(FORUM DISCUSSIONQNPAGE)
            $cat = session()->get('category');
            $question = $fModel->topicQNs($cat);
            $catCount = $fModel->topicCount($cat);

            $comms = $respModel->getComQnCount();
            //var_dump($comms);
            $qn = $fModel->fetchQNs($loggedInUserid);
            $qnCount = $fModel->countQNs($loggedInUserid);

            $data = [
                'title'     => 'My Questions',
                'userdata'  => $userdata,
                'notif'     => $notif,
                'notCount'  => $notifCount,
                'cat'       => $cat,
                'qn'        => $question,
                'qnc'       => $catCount,
                'comms'     => $comms
            ];
            
            return view("dashboard/discussionQN", $data);
        }
        public function discussTopic($id = null){   
            $id = $this->request->getVar('category');
            //var_dump($id);
            if (!empty($id))
            {
                session()->set('category', $id);
                return redirect()->to(base_url('discuss' ));    
            }
        }
        public function reviewQN()
        {
            $loginModel = new loginModel;
            $unotifyModel = new UnotifyModel;
            $fModel = new ForumModel;
            $respModel = new ResponseModel;
            $repModel = new ReplyModel;
            $loggedInUserid = session()->get('loggedInUser');
            
            
            //Notification logic
            $notif    = $unotifyModel->fetchNotif($loggedInUserid);
            $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);
            
            //Fetching user account data
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            
            
            //user photos grouped by id
            $userPN = $loginModel->getUsersPN();
            
            //For the Specific Question
            $qn_id = session()->get('qnRead');
            $qn = $fModel->fetchQN($qn_id);            
            
            //For the Comments & replies on said Question
            $com = $respModel->fetchResponse($qn_id);
            $comCount = $respModel->countResponses($qn_id);
            $comment = $respModel->fetchSingle($qn_id);
                       
           //Fetching the replies
            $reply = $repModel->getReply($qn_id);
            $replyCount = $repModel->fetchReplyCount();           

            $data = [
                'title'     => 'Question Review',
                'userdata'  => $userdata,
                'notif'     => $notif,
                'notCount'  => $notifCount,
                'qn'        => $qn,
                'com'       => $com,
                'comCount'  => $comCount ,
                'reply'     => $reply,
                'replyCount'=> $replyCount,
                'userPN'    => $userPN               
            ];
            return view("dashboard/readQN", $data);
        }
        public function readQuestion($qn_id = null)
        {
            $qn_id = $this->request->getVar('qn_id');
            $loginModel = new loginModel;
            $unotifyModel = new UnotifyModel;
            $fModel = new ForumModel;
            $respModel = new ResponseModel;
            $repModel = new ReplyModel;
            $loggedInUserid = session()->get('loggedInUser');
            
            if (!empty($qn_id))
            {
                session()->set('qnRead', $qn_id);
                //session()->setFlashdata('success', '.');
                return redirect()->to('Queryreview');
            }               
        }
        public function QNRevealed($id)
        {
            $loginModel = new loginModel;
            $unotifyModel = new UnotifyModel;
            $fModel = new ForumModel;
            $respModel = new ResponseModel;
            $repModel = new ReplyModel;
            $loggedInUserid = session()->get('loggedInUser');

            if (!empty($id)) {
                //$qdata = $fModel->fetchQN($id);
             } 
            else 
            {
                $this->session->setFlashdata('error', 'Sorry! something wrong with navigating to desired view. Please contact support!');
                return redirect()->to(current_url());
            }
    
        }
        public function makeComment()
        {
            $fModel = new ForumModel();
            $respModel = new ResponseModel;
            $loggedInUserid = session()->get('loggedInUser');
            $this->session = \Config\Services::session();
        
            if($this->request->getPost())
            {        
                $comment_id = md5(str_shuffle('comment'.time()));
                $qn_id  = $this->request->getVar('qn_id');
                $user_id = $loggedInUserid; 
                $data = [
                    'qn_id'     => $qn_id,
                    'user_id'   => $user_id,
                    'comment'   => $this->request->getVar('comment'),
                    'comment_id'=> $comment_id,
                    'commentedBy'=> $this->request->getVar('commentedBy'),
                    'photo'     => $this->request->getVar('photo'),
                ];
                // Save user's comment to a forum question in the database
                $comm = $respModel->saveResponse($data);
                if($comm)
                {
                    if($this->session->get('loggedInUser'))
                    {
                        session()->setFlashdata('success', 'Comment saved succesfully.');
                        return redirect()->to('Queryreview/' . $qn_id);  
                    }                 
                } 
                else
                {
                    session()->setFlashdata('error', 'Failed to save comment, try again.');
                    return redirect()->to(current_url());
                }   
            }   
        }
        public function makeReply()
        {
            $fModel = new ForumModel();
            $repModel = new ReplyModel();
            $loggedInUserid = session()->get('loggedInUser');
            $this->session = \Config\Services::session();
        
            if($this->request->getPost())
            {        
                $resp_id = $this->request->getVar('comment_id');
                $qn_id = $this->request->getVar('qn_id');
                $user_id = $loggedInUserid;
                
                $data = [
                    'qn_id' => $qn_id,
                    'user_id' => $user_id,
                    'reply' => $this->request->getVar('reply'),
                    'comment_id' => $resp_id
                ];
                // Save user's reply to a forum comment in the database
                $reply = $repModel->saveReply($data);
                if($reply)
                {
                    if($this->session->get('loggedInUser'))
                    {
                        session()->setFlashdata('success', 'Reply saved succesfully.');
                        return redirect()->to(current_url());  
                    }                 
                } 
                else
                {
                    session()->setFlashdata('error', 'Failed to save Reply, try again.');
                    return redirect()->to(current_url());
                }   
            }   
        }
        public function makeCommentAjax()
        {
            $fModel = new ForumModel();
            $respModel = new ResponseModel();
            
            $loggedInUserid = session()->get('loggedInUser');
            
            if ($this->request->isAJAX()) {
                $comment_id = md5(str_shuffle('comment' . time()));
                $qn_id = $this->request->getVar('qn_id');
                $user_id = $loggedInUserid;
                
                $data = [
                    'qn_id' => $qn_id,
                    'user_id' => $user_id,
                    'comment' => $this->request->getVar('comment'),
                    'comment_id' => $comment_id,
                    'commentedBy'=> $this->request->getVar('commentedBy'),
                    'photo'     => $this->request->getVar('photo'),
                ];
                
                $comm = $respModel->saveResponse($data);
                
                if ($comm) {
                    $response = ['status' => 'success', 'message' => 'Comment saved successfully.'];
                } else {
                    $response = ['status' => 'error', 'message' => 'Failed to save comment, try again.'];
                }
                
                return $this->response->setJSON($response);
            }
        }
        public function makeReplyAjax()
        {
            $fModel = new ForumModel();
            $repModel = new ReplyModel();
            
            $loggedInUserid = session()->get('loggedInUser');
            //var_dump($this->request->getVar('qn_id'));
            
            if ($this->request->isAJAX()) {
                
                $data = [
                    'qn_id' => $this->request->getVar('qn_id'),
                    'user_id' => $loggedInUserid,
                    'reply' => $this->request->getVar('reply'),
                    'comment_id' => $this->request->getVar('comment_id')
                ];
                //var_dump($data);
                $reply = $repModel->saveReply($data);
                
                if ($reply) {
                    $response = ['status' => 'success', 'message' => 'Reply saved successfully.'];
                } else {
                    $response = ['status' => 'error', 'message' => 'Failed to save Reply, try again.'];
                }                
                return $this->response->setJSON($response);
            }
        }

        public function qnDel()
        {
            $fModel = new ForumModel();
            $loggedInUserid = session()->get('loggedInUser');
            $this->session = \Config\Services::session();
        
            if($this->request->getPost())
            {        
           
                $qn_id  = $this->request->getVar('qn_id');                  
                    
                // Delete user's forum question in the database
                $QN = $fModel->qnDelete($loggedInUserid,$qn_id);
                if($QN)
                {
                    if($this->session->get('loggedInUser'))
                    {
                        session()->setFlashdata('success', 'Question deleted succesfully.');
                        return redirect()->to('myQuestions');  
                    }                 
                } 
                else
                {
                    session()->setFlashdata('error', 'Failed to delete question, try again');
                    return redirect()->to(current_url());
                }   
            }                    
        }
        
    }
    

    