<?php

namespace Alloy\Services;

class Commons {

    public function randomString($length = 6) {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    public function formatKey($str, $sep = '_') {
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        return trim($res, $sep);
    }

    public function caculatePercent($contentAnswer, $optionAnswer, $imageAnswer, $dirAnswer) {
        if(count($optionAnswer) < 2) {
            return array('status' => false, 'message' => 'Đáp án không được để trống');
        }
        
        $totalCorrect = 0;
        foreach($optionAnswer as $key => $val) {
            $val > 0 ? $totalCorrect++ : 1 === 1;
        }
        
        if($totalCorrect < 1) {
            return array('status' => false, 'message' => 'Phải có ít nhất một đáp án đúng');
        }
        
        $percent = 100 / $totalCorrect;       
        $totalCorrect > 1 ? $type = 'checkbox' : $type = 'radio';
        $return = array('status' => true, 'type' => $type, 'data' => array());
        foreach($optionAnswer as $key => $val) {
            if($key < 1) {
                continue;
            }
                
            $image = '';
            if(!empty(\Request::file('answer_image')[$key])) {
                $image = $this->upload(\Request::file('answer_image')[$key], $dirAnswer, 'file'); 
                $image = ($image !== false) ? $image : '';
            }
                                
            $verifyPercent = ($val > 0) ? $percent : 5;                   
            $return['data'][$key] = array('name' => $contentAnswer[$key], 'percent' => $verifyPercent, 'image' => $image);
        }        
        
        return $return;
    }
    
    public function upload($file, $path, $option = 'filename') {              
        if (!(\Request::hasFile($file)) && $option == 'filename') {              
            return false;           
        }   

        if (!is_dir(public_path($path))) {
            mkdir(public_path($path), 0755);
        }

        $fileRequest = ($option == 'filename') ? \Request::file($file) : $file;
        
        $extension = $fileRequest->getClientOriginalName();
        $fileName = rand(11111, 99999) . '-' . $extension;
        $fileRequest->move(public_path($path), $fileName);

        return $fileName;        
    }

}
