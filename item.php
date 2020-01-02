<?php
if($_SERVER['REQUEST_METHOD']==='GET'){
    header('content-type: application/json');
    $data = file_get_contents('assets/data.json');
    print($data);
    //header('HTTP/1.0 200 OK');
    exit();
}
elseif ($_SERVER['REQUEST_METHOD']==='POST'){
    $inputJSON = file_get_contents('php://input',true);
    $input = json_decode($inputJSON, true);
    if(isset($input['task'])){
        if(!empty($input['task'])){
            $data = json_decode(file_get_contents('assets/data.json'));
            $el=(object)[];
            $el->task = $input['task'];
            $el->status = 'in process';
            print_r($el);
            array_push($data, $el);
            file_put_contents('assets/data.json', json_encode($data));
        }
        else
            header('HTTP/1.0 400');
    }
    else
        header('HTTP/1.0 400');
    exit();
}


elseif ($_SERVER['REQUEST_METHOD']==='PUT'){
    $inputJSON = file_get_contents('php://input',true);
    $input = json_decode($inputJSON, true);
    if(isset($input['task']) && isset($input['update'])){
        if(!empty($input['task']) && !empty($input['update'])){
            $data = json_decode(file_get_contents('assets/data.json'));
            if(count($data)<$input['task']-1){
                header('HTTP/1.0 400');
                exit();
            }
            else{
                $data[$input['task']-1]->task = $input['update'];
            }
            file_put_contents('assets/data.json', json_encode($data));
        }
        else
            header('HTTP/1.0 400');
    }
    elseif (isset($input['task']) && isset($input['status'])){
        if(!empty($input['task']) && !empty($input['status'])){
            $data = json_decode(file_get_contents('assets/data.json'));
            if(count($data)<$input['task']-1){
                header('HTTP/1.0 400');
                exit();
            }
            else{
                if($data[$input['task']-1]->status ==='in process'){
                    $data[$input['task']-1]->status = 'Complete';
                }
                else if($data[$input['task']-1]->status ==='Complete'){
                    $data[$input['task']-1]->status = 'in process';
                }
            }
            file_put_contents('assets/data.json', json_encode($data));
        }
        else
            header('HTTP/1.0 400');
    }
    else
        header('HTTP/1.0 400');
    exit();
}


elseif ($_SERVER['REQUEST_METHOD']==='DELETE'){
    $inputJSON = file_get_contents('php://input',true);
    $input = json_decode($inputJSON, true);
    if(isset($input['task'])){
        if(!empty($input['task'])){
            $data = json_decode(file_get_contents('assets/data.json'));
            if(count($data)<$input['task']-1){
                header('HTTP/1.0 400');
                exit();
            }
            else{
                array_splice($data, $input['task']-1,1);
            }
            file_put_contents('assets/data.json', json_encode($data));
        }
        else
            header('HTTP/1.0 400');
    }
    else
        header('HTTP/1.0 400');
    exit();
}
