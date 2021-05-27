<?php
class Upload_file extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    function do_upload($path, $file_name,$file_type)
    {
        $config['upload_path']          =  $path;
        $config['allowed_types']        =  'png|jpeg|jpg';
        $config['max_size']             = 2048;
        $file_name = time().mt_rand().'.'.$file_type;
        $config['file_name'] = $file_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $config['status'] = false;
            $config['message'] = $error;
        } else {
            $config['status'] = true;  
            $config['message'] = 'file upload success';          
        }
        return $config;
    }
}
