## ERPSystem后端说明文档
Author: 卓金鑫

## AJAX请求示例

## 1、User
### 登录、注册
- url：`login` `register`

- 登录成功返回格式: Cookie | token
> 返回的token是当前用户调用后面的各种api的令牌



### 获取当前登录用户信息
- url：`api/user/info`

- 请求方式: GET

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

- 请求头:

| Key  | Vaule  | Demo  |
| :------------: | :------------: | :------------: |
| Accept  | application/json  |   |
| Authorization  |  Bearer+当前登录用户的token | Bearer eyJ0eXAiOi...
- 请求参数：

|  参数 | 说明  |  Demo |
| :------------: | :------------: | :------------: |
|  name | 姓名，非必填  |   |
|  duty | 职务，null客户，1老板，2经理，3员工，非必填  |   |
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