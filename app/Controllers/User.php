<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class User extends BaseController
{
    public function myForm(){
        helper(['form']);
        if($this->request->getMethod() == 'post'){
            $rules = [
            "name" => "required|min_length[3]|max_length[40]",
            "email" => "required|valid_email",
            "phone_no" => "required|min_length[9]|max_length[15]",
            "profile_image" => [
                "rules" => "uploaded[profile_image]|max_size[profile_image,1024]|is_image[profile_image]|mime_in[profile_image,image/jpg,image/jpeg,image/gif,image/png]",
                "label" => "Profile Image",
            ],
            "gender" => "in_list[male, female]",
            ];
            $messages = [
                'name' => [
                    'required' => 'Name is required ',
                    'min_length' => 'Minimum length of name is at least 3'
                ],
            ];

    if (!$this->validate($rules,$messages)) {

      return view("my-form", [
        "validation" => $this->validator,
      ]);
    } else {
            $file = $this->request->getFile('profile_image');
            $file_type = $file->getClientMimeType();
            $valid_file_types = array('image/png','image/jpeg','image/jpg');
            $session = session();

            if(in_array($file_type, $valid_file_types)){
                $profile_image = uniqid().'_'.$file->getName();
            if($file->move('images',$profile_image)){
                $userModel = new UserModel();

                $data = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'phone_no' => $this->request->getVar('phone_no'),
                    'profile_image' => '/images/'.$profile_image,
                ];

                if($userModel->insert($data)){
                    $session->setFlashdata('success','Data saved successful');
                }else{
                    $session->setFlashdata('error','Failed to save data');
                }
            }else{
                $session->setFlashdata('error', 'Failed to move file');
            }
        }else{
            $session->setFlashdata('error','Invalid file type selected');
        }
        $data = $userModel->findAll();
        return view('index',['users'=>$data]);
    }
}
    return view('my-form');
        
    }

    public function delete($id){
        $userModel = new UserModel();
        $image_file = $userModel->select('profile_image')->where('id',$id)->first();
        $filename = '.'.$image_file['profile_image'];
        if(file_exists($filename)){
            unlink($filename);
        }
        $userModel->where('id',$id)->delete();
        return redirect()->to(base_url());
    }
}
