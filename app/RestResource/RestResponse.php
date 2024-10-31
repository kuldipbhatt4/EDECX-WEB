<?php
namespace App\RestResource;

use Illuminate\Support\Facades\Response;

class RestResponse {

    public function sayHello(){
        echo 'Hello from facade';
    }

    public function success($data=[],$msg='Success Response'){
        $response = [];

        $response['status'] = true;
        $response['code'] = 200;
        $response['message'] = $msg;
        $response['data']= $data;
        $response['error']= [];
        return Response::json($response,200);
    }

    public function success_new($status,$data=[],$msg='Success Response'){
        $response = [];

        $response['status'] = $status;
        $response['code'] = 200;
        $response['message'] = $msg;
        $response['data']= $data;
        $response['error']= [];
        return Response::json($response,200);
    }

    public function error($msg='Woops! Something went wrong.'){
        $response = [];

        $response['status'] = false;
        $response['code'] = 500;
        $response['message'] = $msg;
        return Response::json($response,500);
    }

    public function warning($msg='Warning accrued',$code=403){
        $response = [];

        $response['status'] = false;
        $response['code'] = $code;
        $response['message'] = $msg;
        return Response::json($response,$code);
    }


}
