# ERPSystem后端说明文档
作者QQ：421484530
# 文档目录
[TOC]
# API推荐调试工具
Chrome的POSTMAN扩展程序
# AJAX请求示例

```javascript
//引入两个库
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.js"></script>

//调用接口
 $.ajax({
   url: '../api/user/info',
   dataType: 'json',
   headers: {
	          'Accept':'application/json',
              'Authorization':'Bearer '+$.cookie('token')
          },
   method: 'GET',
   success: function(res){
	   console.log(res);

   }
});
```

# API未授权响应
```json
{
    "message": "Unauthenticated."
}
```
# 接口说明
## 1、User
### 登录、注册
- url：`login` `register`

- 登录成功返回格式: Cookie | token
> 返回的token是当前用户调用后面的各种api的令牌

### 获取所有用户信息
- url：`api/user/all`

- 请求方式: GET

- 权限：每个用户都可以请求

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...

- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data": [
        {
            "id": 1,
            "name": "zhuojinxin",
            "duty": 1,
            "identitycard": null,
            "phone": null,
            "email": "1@1.com",
            "gender": 0,
            "birthdata": null,
            "created_at": "2018-09-26 12:45:45",
            "updated_at": "2018-09-26 12:45:45"
        }
    ]
}
```


### 获取当前登录用户信息
- url：`api/user/info`

- 请求方式: GET

- 权限：每个用户都可以请求

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...

- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data": {
        "id": 3,
        "name": "卓金鑫",
        "duty": null,
        "identitycard": null,
        "phone": "13539823314",
        "email": "2@1.com",
        "gender": 0,
        "birthdata": null,
        "created_at": "2018-09-22 07:08:48",
        "updated_at": "2018-09-23 15:08:56"
    }
}
```

### 更新当前登录用户信息
API会根据token（Authorization）找到当前登录的用户
- url：`api/user/info`

- 请求方式: POST

- 权限：每个用户都可以请求

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...
- 请求参数：

|  参数 | 说明  |  Demo |
| :------------: | :------------: | :------------: |
|  name | 姓名，非必填  |   |
|  identitycard | 身份证，非必填  |   |
|  phone | 电话，非必填  |   |
| email  | 邮箱，非必填  |   |
|  gender |  性别，0男，1女，非必填 |   |
| birthdata  |  生日，非必填 |   |


- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data": {
        "id": 3,
        "name": "卓金鑫",
        "duty": null,
        "identitycard": null,
        "phone": "13539823314",
        "email": "2@1.com",
        "gender": 0,
        "birthdata": null,
        "created_at": "2018-09-22 07:08:48",
        "updated_at": "2018-09-23 15:08:56"
    }
}
```

### 获取当前登录用户信息
- url：`api/user/info`

- 请求方式: GET

- 权限：每个用户都可以请求

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...

- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data": {
        "id": 3,
        "name": "卓金鑫",
        "duty": null,
        "identitycard": null,
        "phone": "13539823314",
        "email": "2@1.com",
        "gender": 0,
        "birthdata": null,
        "created_at": "2018-09-22 07:08:48",
        "updated_at": "2018-09-23 15:08:56"
    }
}
```

### 获取指定用户信息
API会根据token（Authorization）找到当前登录的用户
- url：`api/user/userinfo`

- 请求方式: POST

- 权限：老板，经理，员工有权限请求，客户没有

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...
- 请求参数：

|  参数 | 说明  |  Demo |
| :------------: | :------------: | :------------: |
|  id | 用户ID，必填，切一定是数据表存在的用户ID  |   |



- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data": {
        "id": 3,
        "name": "卓金鑫",
        "duty": null,
        "identitycard": null,
        "phone": "13539823314",
        "email": "2@1.com",
        "gender": 0,
        "birthdata": null,
        "created_at": "2018-09-22 07:08:48",
        "updated_at": "2018-09-23 15:08:56"
    }
}
```
### 修改指定用户职务
API会根据token（Authorization）找到当前登录的用户
- url：`api/user/changeduty`

- 请求方式: POST

- 权限：老板有权限请求

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...
- 请求参数：

|  参数 | 说明  |  Demo |
| :------------: | :------------: | :------------: |
|  id | 用户ID，必填，切一定是数据表存在的用户ID  |   |
|  duty | 职务，1老板，2经理，3员工，null客户  |   |



- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data": {
        "id": 3,
        "name": "卓金鑫",
        "duty": 1,
        "identitycard": null,
        "phone": "13539823314",
        "email": "2@1.com",
        "gender": 0,
        "birthdata": null,
        "created_at": "2018-09-22 07:08:48",
        "updated_at": "2018-09-23 15:08:56"
    }
}
```
### 用户删除
API会根据token（Authorization）找到当前登录的用户
- url：`api/user/del/{id}`

- 请求方式: DELETE

- 权限：

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...




- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data":true
}
```

## 2、Goods
### 获取所有商品信息
- url：`api/goods/info`

- 请求方式: GET

- 权限：老板，经理，员工有权限请求，客户没有

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...

- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data": [
        {
            "user_name": "zhuojinxin",
            "id": 1,
            "name": "妹子一枚",
            "user_id": 1,
            "price": 1,
            "spec": "大萌妹",
            "remarks": null,
            "created_at": "2018-10-05 12:08:30",
            "updated_at": "2018-10-05 12:08:30"
        },
        {
            "user_name": "zhuojinxin",
            "id": 2,
            "name": "9999显卡",
            "user_id": 1,
            "price": 9999,
            "spec": null,
            "remarks": null,
            "created_at": "2018-10-05 12:08:58",
            "updated_at": "2018-10-05 12:08:58"
        },
        {
            "user_name": "zhuojinxin",
            "id": 3,
            "name": "软妹子",
            "user_id": 1,
            "price": 1,
            "spec": null,
            "remarks": null,
            "created_at": "2018-10-11 03:57:48",
            "updated_at": "2018-10-11 03:57:48"
        }
    ]
}
```
###获取指定商品信息
- url：`api/goods/{id}`

- 请求方式: GET

- 权限：老板，经理，员工有权限请求，客户没有

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...

```json
{
    "msg": "",
    "code": "0",
    "data": {
        "id": 1,
        "name": "妹子一枚",
        "user_id": 1,
        "price": 1,
        "spec": "大萌妹",
        "remarks": null,
        "created_at": "2018-10-05 12:08:30",
        "updated_at": "2018-10-05 12:08:30"
    }
}
```
### 编辑指定商品信息
API会根据token（Authorization）找到当前登录的用户
- url：`api/goods/info`

- 请求方式: POST

- 权限：老板，经理，员工有权限请求，客户没有

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...
- 请求参数：

|  参数 | 说明  |  Demo |
| :------------: | :------------: | :------------: |
|  id | 商品ID，必填  |   |
|  name | 商品名称，非必填  |   |
|  spec | 规格，非必填  |   |
| price  | 价格，非必填  |   |
| remarks  | 备注，非必填  |   |



- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data": {
        "id": 1,
        "user_id": 3,
        "name": "RTX 2080 Ti“煤气灶”",
        "spec": "9999高端显卡",
        "remarks": "emmmmm",
        "created_at": "2018-09-24 06:24:40",
        "updated_at": "2018-09-24 09:05:41"
    }
}
```
### 添加新商品信息
API会根据token（Authorization）找到当前登录的用户
- url：`api/goods/info`

- 请求方式: POST

- 权限：老板，经理，员工有权限请求，客户没有

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...
- 请求参数：

>注意：添加商品和编辑商品是同一个URL，当在传递参数给服务器时，如果没有传递id参数，则执行添加新商品操作。

|  参数 | 说明  |  Demo |
| :------------: | :------------: | :------------: |
|  name | 商品名称，必填  |   |
|  price | 价格，必填  |   |
|  spec | 规格，非必填  |   |
| remarks  | 备注，非必填  |   |



- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data": {
        "name": "新宠",
        "user_id": 3,
        "updated_at": "2018-09-24 09:06:37",
        "created_at": "2018-09-24 09:06:37",
        "id": 3
    }
}
```

### 商品删除
API会根据token（Authorization）找到当前登录的用户
- url：`api/goods/del/{id}`

- 请求方式: DELETE

- 权限：

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...




- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data":true
}
```
## 3、仓库
###查看所有仓库
- url：`api/erp/info`

- 请求方式: GET

- 权限：老板，经理，员工有权限请求，客户没有

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...

- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data": [
        {
            "id": 3,
            "name": "华农1号仓",
            "remarks": null,
            "created_at": "2018-09-24 09:52:29",
            "updated_at": "2018-09-24 09:52:29"
        },
        {
            "id": 4,
            "name": "华农2号仓",
            "remarks": null,
            "created_at": "2018-09-24 09:52:33",
            "updated_at": "2018-09-24 09:52:33"
        }
    ]
}
```
### 编辑仓库信息
API会根据token（Authorization）找到当前登录的用户
- url：`api/erp/info`

- 请求方式: POST

- 权限：老板，经理，员工有权限请求，客户没有

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...
- 请求参数：

|  参数 | 说明  |  Demo |
| :------------: | :------------: | :------------: |
|  id | 仓库ID，必填  |   |
|  name |  仓库名称，非必填  |   |

| remarks  | 备注，非必填  |   |



- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data": {
        "name": "华农3号仓",
        "remarks": null,
        "updated_at": "2018-09-24 10:27:53",
        "created_at": "2018-09-24 10:27:53",
        "id": 5
    }
}
```
### 添加新仓库
API会根据token（Authorization）找到当前登录的用户
- url：`api/erp/info`

- 请求方式: POST

- 权限：老板，经理，员工有权限请求，客户没有

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...
- 请求参数：

>注意：添加商品和编辑商品是同一个URL，当在传递参数给服务器时，如果没有传递id参数，则执行添加新商品操作。

|  参数 | 说明  |  Demo |
| :------------: | :------------: | :------------: |
|  name |  仓库名称，非必填  |   |
| remarks  | 备注，非必填  |   |



- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data": {
        "name": "华农3号仓",
        "remarks": null,
        "updated_at": "2018-09-24 10:27:53",
        "created_at": "2018-09-24 10:27:53",
        "id": 5
    }
}
```
### 获取所有商品库存信息
- url：`api/erp/stock`

- 请求方式: GET

- 权限：每个用户都可以请求

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...

- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data": [
        {
            "good_name": "帅哥一枚",
            "user_name": "zhuojinxin",
            "warehouses_name": "华农第一仓",
            "id": 1,
            "good_id": 1,
            "user_id": 1,
            "warehouse_id": 1,
            "amount": 154,
            "created_at": "2018-09-27 11:52:57",
            "updated_at": "2018-09-28 05:54:10"
        }
    ]
}
```

###入库

API会根据token（Authorization）找到当前登录的用户
- url：`api/erp/ruku`

- 请求方式: POST

- 权限：老板，经理，员工有权限请求，客户没有

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...
- 请求参数：

>注意：添加商品和编辑商品是同一个URL，当在传递参数给服务器时，如果没有传递id参数，则执行添加新商品操作。

|  参数 | 说明  |  Demo |
| :------------: | :------------: | :------------: |
|  warehouse_id | 入库仓库id，必填  |   |
|  good_id | 入库商品id，必填  |   |
| amount  | 入库数量，必填  |   |
| remarks  | 备注，必填  |   |



- 返回格式示例:
> 返回包含当前商品库存信息，当前这条入库记录信息，商品名称价格详细信息

```json
{
    "msg": "",
    "code": "0",
    "data": [
        {
            "id": 1,
            "good_id": 1,
            "user_id": 1,
            "warehouse_id": 1,
            "amount": 132,
            "created_at": "2018-09-27 11:52:57",
            "updated_at": "2018-09-28 03:07:56"
        },
        {
            "warehouse_id": "1",
            "good_id": "1",
            "amount": "22",
            "remarks": "3333",
            "user_id": 1,
            "name": "receive",
            "updated_at": "2018-09-28 03:07:56",
            "created_at": "2018-09-28 03:07:56",
            "id": 6
        },
        {
            "id": 1,
            "name": "帅哥一枚",
            "user_id": 1,
            "price": 22,
            "spec": null,
            "remarks": null,
            "created_at": "2018-09-26 12:56:07",
            "updated_at": "2018-09-26 12:56:07"
        }
    ]
}
```
###出库

API会根据token（Authorization）找到当前登录的用户
- url：`api/erp/chuku`

- 请求方式: POST

- 权限：老板，经理，员工有权限请求，客户没有

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...
- 请求参数：

>注意：添加商品和编辑商品是同一个URL，当在传递参数给服务器时，如果没有传递id参数，则执行添加新商品操作。

|  参数 | 说明  |  Demo |
| :------------: | :------------: | :------------: |
|  warehouse_id | 出库仓库id，必填  |   |
|  good_id | 出库商品id，必填  |   |
| amount  | 出库数量，必填  |   |
| remarks  | 备注，必填  |   |



- 返回格式示例:
> 返回包含当前商品库存信息，当前这条入库记录信息，商品名称价格详细信息

```json
{
    "msg": "",
    "code": "0",
    "data": [
        {
            "id": 1,
            "good_id": 1,
            "user_id": 1,
            "warehouse_id": 1,
            "amount": 110,
            "created_at": "2018-09-27 11:52:57",
            "updated_at": "2018-09-28 03:10:31"
        },
        {
            "warehouse_id": "1",
            "good_id": "1",
            "amount": "22",
            "remarks": "3333",
            "user_id": 1,
            "name": "send",
            "updated_at": "2018-09-28 03:10:31",
            "created_at": "2018-09-28 03:10:31",
            "id": 7
        },
        {
            "id": 1,
            "name": "帅哥一枚",
            "user_id": 1,
            "price": 22,
            "spec": null,
            "remarks": null,
            "created_at": "2018-09-26 12:56:07",
            "updated_at": "2018-09-26 12:56:07"
        }
    ]
}
```
### 获取所有出入库记录
API会根据token（Authorization）找到当前登录的用户
- url：`api/erp/log`

- 请求方式: GET

- 权限：老板，经理，员工有权限请求，客户没有

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...




- 返回格式示例:
```json
[
    {
        "user_name": "zhuojinxin",
        "warehouse_name": "华农第一仓",
        "good_name": "帅哥一枚",
        "id": 1,
        "name": "receive",
        "good_id": 1,
        "warehouse_id": 1,
        "user_id": 1,
        "amount": 22,
        "remarks": "3333",
        "created_at": "2018-09-27 12:06:06",
        "updated_at": "2018-09-27 12:06:06"
    },
    {
        "user_name": "zhuojinxin",
        "warehouse_name": "华农第一仓",
        "good_name": "帅哥一枚",
        "id": 2,
        "name": "receive",
        "good_id": 1,
        "warehouse_id": 1,
        "user_id": 1,
        "amount": 22,
        "remarks": "3333",
        "created_at": "2018-09-27 12:09:58",
        "updated_at": "2018-09-27 12:09:58"
    },
    {
        "user_name": "zhuojinxin",
        "warehouse_name": "华农第一仓",
        "good_name": "帅哥一枚",
        "id": 3,
        "name": "receive",
        "good_id": 1,
        "warehouse_id": 1,
        "user_id": 1,
        "amount": 22,
        "remarks": "3333",
        "created_at": "2018-09-27 12:18:48",
        "updated_at": "2018-09-27 12:18:48"
    },
    {
        "user_name": "zhuojinxin",
        "warehouse_name": "华农第一仓",
        "good_name": "帅哥一枚",
        "id": 4,
        "name": "send",
        "good_id": 1,
        "warehouse_id": 1,
        "user_id": 1,
        "amount": 22,
        "remarks": "3333",
        "created_at": "2018-09-28 03:03:56",
        "updated_at": "2018-09-28 03:03:56"
    },
    {
        "user_name": "zhuojinxin",
        "warehouse_name": "华农第一仓",
        "good_name": "帅哥一枚",
        "id": 5,
        "name": "send",
        "good_id": 1,
        "warehouse_id": 1,
        "user_id": 1,
        "amount": 22,
        "remarks": "3333",
        "created_at": "2018-09-28 03:04:01",
        "updated_at": "2018-09-28 03:04:01"
    },
    {
        "user_name": "zhuojinxin",
        "warehouse_name": "华农第一仓",
        "good_name": "帅哥一枚",
        "id": 6,
        "name": "receive",
        "good_id": 1,
        "warehouse_id": 1,
        "user_id": 1,
        "amount": 22,
        "remarks": "3333",
        "created_at": "2018-09-28 03:07:56",
        "updated_at": "2018-09-28 03:07:56"
    },
    {
        "user_name": "zhuojinxin",
        "warehouse_name": "华农第一仓",
        "good_name": "帅哥一枚",
        "id": 7,
        "name": "send",
        "good_id": 1,
        "warehouse_id": 1,
        "user_id": 1,
        "amount": 22,
        "remarks": "3333",
        "created_at": "2018-09-28 03:10:31",
        "updated_at": "2018-09-28 03:10:31"
    },
    {
        "user_name": "zhuojinxin",
        "warehouse_name": "华农第一仓",
        "good_name": "帅哥一枚",
        "id": 8,
        "name": "receive",
        "good_id": 1,
        "warehouse_id": 1,
        "user_id": 1,
        "amount": 22,
        "remarks": "3333",
        "created_at": "2018-09-28 05:53:50",
        "updated_at": "2018-09-28 05:53:50"
    },
    {
        "user_name": "zhuojinxin",
        "warehouse_name": "华农第一仓",
        "good_name": "帅哥一枚",
        "id": 9,
        "name": "receive",
        "good_id": 1,
        "warehouse_id": 1,
        "user_id": 1,
        "amount": 22,
        "remarks": "3333",
        "created_at": "2018-09-28 05:54:10",
        "updated_at": "2018-09-28 05:54:10"
    }
]
```
### 仓库删除
API会根据token（Authorization）找到当前登录的用户
- url：`api/erp/del/{id}`

- 请求方式: DELETE

- 权限：

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...




- 返回格式示例:
```json
{
    "msg": "",
    "code": "0",
    "data":true
}
```


## 4、商品二维码生成
url:`code/{id}`
在url中传递商品的id即可生成此商品二维码
用于扫码枪APP
扫码枪APP下载地址：
https://tinywebdb.oss-cn-shanghai.aliyuncs.com/smq.apk
