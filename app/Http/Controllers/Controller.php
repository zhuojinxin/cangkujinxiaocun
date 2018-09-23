<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function dataEncode($data = [], $httpStatus = '200', $errcode = '0', $errmsg = ''){
        /*
         *  errcode 错误代码一览
         *  0：          正常
         *  500000:     授权失败
         *  500400:     请求参数不完整
         *  500404:     未找到所请求的资源
         *  500501:     服务器原因导致的数据更新失败
         *  500502:     服务器原因导致的数据创建失败
         *  500503:     服务器原因导致的数据删除失败
         * */

        $result = [
            'msg' => $errmsg,
            'code' => $errcode,
            'data' => $data
        ];
        return response()->json($result,$httpStatus);
    }
}
