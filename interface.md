# 西南家政APP接口文档

## 最新接口
### 一、客户端支付成功回调接口（已完成,前端可以直接开发）

#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://www.zgxnjz.cn/index.php/Home/Order/clientNotifyUrl`
#### 3.请求体参数：

|     参数      | 参数名称  | 是否必填  |                                备注                               |
|--------------|:---------:|----------|-------------------------------------------------------------------|
| order_numbers|   订单号   |   必输   | ES2017112422553882528,ES2017112423350187819,ES2017112423544636096 |

#### 4.返回值
##### 1).成功返回
      {
        "status":200,
        "msg":"pay success",
      }
   
##### 2).失败返回
###### a.请求参数为空

      {
       "status":400,
       "msg":"client params is null"
      }

###### b.服务端添加失败

     {
        "status": 200,
        "msg": "server get data from database fail",
        "data": []
     }


### 二、获取客户服务电话号码接口（已完成,前端可以直接开发）

#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://www.zgxnjz.cn/index.php/Home/user/getCosterTelPhone`
#### 3.请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|     无     |              |                   |                      |

#### 4.返回值
##### 1).成功返回
       {
         "status": 200,
         "msg": "success",
         "data": [
             {
                 "cos_phone": "13552539657"
             },
             {
                 "cos_phone": "13796003249"
             },
             {
                 "cos_phone": "13796003244"
             }
         ]
       }
   
##### 2).失败返回

     {
        "status": 200,
        "msg": "database is null",
        "data": []
     }
     
     
### 三、添加客户反馈（已完成,前端可以直接开发）

#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://www.zgxnjz.cn/index.php/Home/Backinfo/setCustomerBack`
#### 3.请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|     无     |              |                   |                      |

#### 4.请求头参数

| 请求头参数      |     参数名称  |    是否必填        |          备注        |
|----------------|:------------:|-------------------|----------------------|
|x-access-token  |   token令牌   |      必输         |     标识每一个用户    |


#### 4.返回值
##### 1).成功返回

        {
           "status":200,
           "msg":"success",
           "data":     
           {
              "binfo_id":"18",
              "binfo_title":"dddd",
              "binfo_content":"aaaaaa",
              "binfo_status":"0",
              "user_id":"147",
              "username":"sfdhsdj",
              "add_time":"1511874450",
              "hd_time":"0"
           }
        }
     
   
##### 2).失败返回

###### a.请求参数为空

      {
       "status":400,
       "msg":"client params is null"
      }

###### b.服务端添加失败

        {
           "status":200,
           "msg":"success",
           "data": {}
        }


### 四、获取客户反馈信息（已完成,前端可以直接开发）

#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://www.zgxnjz.cn/index.php/Home/Backinfo/getSelfBinfo`
#### 3.请求体参数：

| 参数         |     参数名称  |    是否必填        |          备注        |
|--------------|:------------:|-------------------|----------------------|
|binfo_title   |   反馈主题    |         必输      |                      |
|binfo_content |   反馈内容    |         必输      |                      |

#### 4.请求头参数

| 请求头参数      |     参数名称  |    是否必填        |          备注        |
|----------------|:------------:|-------------------|----------------------|
|x-access-token  |   token令牌   |      必输         |     标识每一个用户    |


#### 4.返回值
##### 1).成功返回

        {
            "status": 200,
            "msg": "success",
            "data": [
                {
                    "binfo_id": "15",
                    "binfo_title": "订单失败",
                    "binfo_content": "凄凄切切群群群群群群群群群群群群群群群群群群群群群群群群",
                    "binfo_status": "1",
                    "user_id": "147",
                    "username": "sfdhsdj",
                    "add_time": "1511873023",
                    "hd_time": "0"
                },
                {
                    "binfo_id": "16",
                    "binfo_title": "订单失败",
                    "binfo_content": "是是是是是是是是是是是是是是是生生世世",
                    "binfo_status": "1",
                    "user_id": "147",
                    "username": "sfdhsdj",
                    "add_time": "1511873079",
                    "hd_time": "0"
                },
                {
                    "binfo_id": "17",
                    "binfo_title": "dddd",
                    "binfo_content": "aaaaaa",
                    "binfo_status": "0",
                    "user_id": "147",
                    "username": "sfdhsdj",
                    "add_time": "1511873093",
                    "hd_time": "0"
                },
                {
                    "binfo_id": "18",
                    "binfo_title": "dddd",
                    "binfo_content": "aaaaaa",
                    "binfo_status": "0",
                    "user_id": "147",
                    "username": "sfdhsdj",
                    "add_time": "1511874450",
                    "hd_time": "0"
                }
            ]
        }

      
   
##### 2).失败返回

###### a.请求参数为空

      {
       "status":400,
       "msg":"client params is null"
      }

###### b.服务端获取数据失败

        {
            "status": 200,
            "msg": "get self back info fail",
            "data": []
        }
            
----------------------------------------------------------------------------------------------------------------

## 接口改造部分
### 一.获取注册验证码接口（已完成,前端可以直接开发）
#### 1.请求方式 ：get
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/User/checkAndGetVerifyCode`
#### 3.请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  phone     |    手机号     |      必输         |     手机号11位        |

#### 4.返回值
##### 1).成功返回
  
      {
         "status": 200,
         "msg": 
         {
             "0": "20171119112804"
         },
         "data":
         {
             "0": "8346a91fed9a481ab0bbc897e680c8f1"
         }
      }
   
##### 2).失败返回
###### a.客户端传参错误

    {
        "status": 403,
        "msg": "Phone Number Is Not Rules"
    }
    
###### b.手机号码已经注册 

    {
        "status": 402,
        "msg": "Phone Number Have Already Register"
    }

###### c.验证码申请过于频繁

    {
        "status": 401,
        "msg": "Get Verify Code Frequently"
    }
    
###### d.验证码申请达到一天中的既定次数    

    {
       "status": "300",
       "msg": 
       {
           "0": "验证码超出同模板同号码天发送上限"
       }
    }

 
### 二.短信注册接口
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/User/registerPhone`
#### 3.请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  username  |    用户名     |      必输         |                      |
|  phone     |    手机号     |      必输         |     手机号11位        |
|  user_email|    邮箱       |      必输         |                      |  
|  pwd_one   |    密码       |      必输         |                      |
|  pwd_two   |    确认密码   |      必输         |                      |  
|  chknumber |    验证码     |      必输         |                      |  

#### 4.返回值
##### 1).成功返回
  
      {
        "status":200,
        "msg":"success",
        "data": 
            {
               "token":"IvkQhlLSyvjvHOa+XuEaseEIpSZM8VUM6PAbuX74QbYU2UNg9o5xlMS7Yd5ZbFkQ2N2y28nTBds9Md3M
                       /KDzNE5yfFTyVgcR0qgtGxPgJV0="
            }      
       }
   
##### 2).失败返回
###### a.客户端传参错误

    {
        "status": 401,
        "msg": "params can not null"
    }
    
###### b.该用户名已经被注册

    {
       "status":402,
       "msg":"This UserName Is Already Rigster"
    }

###### c.手机号码不符合规则

     {
        "status":406,
        "msg":"Input phone Number is match rules"
     }
      
###### d.手机号码已经注册 

     {
         "status": 405,
         "msg": "Phone Number Have Already Register"
     }

###### e.验证码错误

     {
         "status": 403,
         "msg": "Input Verify Code Is Wrong"
     }

###### f.两次输入的密码不一样

    {
       "status":404,
       "msg":"twice password is different"
    }
    
###### g.邮箱格式不符合规则

    {
       "status":407,
       "msg":"Email is not match rules"
    }


### 三.修改手机号码获取验证码接口（已完成,前端可以直接开发）
#### 1.请求方式 ：get
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/User/uptPhoneNumVerifyCode`
#### 3.请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  phone     |    手机号     |      必输         |     手机号11位        |

#### 4.返回值
##### 1).成功返回
  
      {
         "status": 200,
         "msg": 
         {
             "0": "20171119112804"
         },
         "data":
         {
             "0": "8346a91fed9a481ab0bbc897e680c8f1"
         }
      }
   
##### 2).失败返回
###### a.客户端传参错误

    {
        "status": 403,
        "msg": "Phone Number Is Not Rules"
    }
    
###### b.手机号码已经注册 

    {
        "status": 402,
        "msg": "Phone Number Have Already Register"
    }

###### b.验证码申请过于频繁

    {
        "status": 401,
        "msg": "Get Verify Code Frequently"
    }
    
###### c.验证码申请达到一天中的既定次数

     {
         "status": "300",
         "msg": 
         {
             "0": "验证码超出同模板同号码天发送上限"
         }
      }
### 四.修改手机号码接口
#### 1.请求方式 ：Get
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/User/updatePhoneNumber`
#### 3.请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  phone     |    手机号     |      必输         |     手机号11位        |
|  verifyNum |    验证码     |      必输         |                      |  

| 请求头参数      |     参数名称  |    是否必填        |          备注        |
|----------------|:------------:|-------------------|----------------------|
|x-access-token  |   token令牌   |      必输         |     标识每一个用户    |

#### 4.返回值
##### 1).成功返回
  
          {
          "status":200,
          "msg":"success",
          "data":
          {
             "user_id":"133",
             "username":"guosj",
             "user_pho":null,
             "token":"IvkQhlLSyvjvHOa+XuEaseEIpSZM8VUM4Ji9S+NaBDMU2UNg9o5xlFsrAkszlRc9"}
          }

##### 2).失败返回
###### a.参数为空错误

     {
       "status":401,
        "msg":"client error, param is null"
     }
    
###### b.修改失败

     {
        "status":404,
        "msg":"Update Fail"
     }
   
###### b..验证码错误

      {
           "status":403,
           "msg":"Verify Code Is Wrong"
      }

###### b.服务端出错，没有相应的Token

      {
           "status":500,
           "msg":"server error"
      }


### 五.忘记密码获取验证码接口（已完成,前端可以直接开发）
#### 1.请求方式 ：get
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/User/wjPwdGetVerifyCode`
#### 3.请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  phone     |    手机号     |      必输         |     手机号11位        |

#### 4.返回值
##### 1).成功返回
  
      {
         "status": 200,
         "msg": 
         {
             "0": "20171119112804"
         },
         "data":
         {
             "0": "8346a91fed9a481ab0bbc897e680c8f1"
         }
      }
   
##### 2).失败返回
###### a.客户端传参错误

    {
        "status": 403,
        "msg": "Phone Number Is Not Rules"
    }
    
###### b.手机号码已经注册 

    {
        "status": 402,
        "msg": "Phone Number Have Already Register"
    }

###### b.验证码申请过于频繁

    {
        "status": 401,
        "msg": "Get Verify Code Frequently"
    }
    
###### c.验证码申请达到一天中的既定次数

    {
       "status": "300",
       "msg": 
       {
           "0": "验证码超出同模板同号码天发送上限"
       }
    }


### 六.忘记密码接口
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/User/wjUpdPwdVerify`
#### 3.请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  phone     |    手机号     |      必输         |     手机号11位        |
|  verifyNum |    验证码     |      必输         |                      |  
|  newpwdone |    新密码     |      必输         |                      |  
|  newpwdtwo |   确认新密码  |      必输         |                      |  


#### 4.返回值
##### 1).成功返回
  
    {
          "status":200,
          "msg":"success",
          "data":
          {
             "user_id":"133",
             "username":"guosj",
             "user_pho":null,
             "token":"IvkQhlLSyvjvHOa+XuEaseEIpSZM8VUM4Ji9S+NaBDMU2UNg9o5xlFsrAkszlRc9"}
          }
     }
   
##### 2).失败返回
###### a.参数为空错误
   
    {
      "status":401,
       "msg":"client error, param is null"
    }
    
###### b.修改失败

    {
       "status":404,
       "msg":"Update Fail"
    }
   
###### b..验证码错误

     {
          "status":403,
          "msg":"Input Verify Code Is Wrong"
     }
     
###### b.两次输入的密码不一样

     {
          "status":402,
          "msg":"Twice Input Password Is Different"
     }
     
     
### 七.修改密码接口
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/User/modifyPwd`
#### 3.请求体参数：

| 参数           |     参数名称  |    是否必填        |          备注        |
|----------------|:------------:|-------------------|----------------------|
|  old_password  |    老密码     |      必输         |                      |
|  password_one  |    新密码     |      必输         |                      |
|  password_two  |    确认新密码  |      必输        |                      |  

| 请求头参数      |     参数名称  |    是否必填        |          备注        |
|----------------|:------------:|-------------------|----------------------|
|x-access-token  |   token令牌   |      必输         |     标识每一个用户    |

#### 4.返回值
##### 1).成功返回
  
    {
       "status":200,
       "msg":"success",
    }
   
##### 2).失败返回
###### a.参数为空错误
   
    {
       "status":401,
       "msg":"client error, param is null"
    }
    
###### b.修改失败

    {
       "status":404,
       "msg":"Update Fail"
    }
     
###### c.两次输入的密码不一样

    {
          "status":402,
          "msg":"Twice Input Password Is Different"
    }
    
###### d.校验token失败

     {
          "status":500,
          "msg":"server error"
     }

-------------------------------------------------------------------------------------------------------------------------

### 一.注册接口（已完成,前端可以直接开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/User/register`
#### 3.请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  username  |    用户名     |      必输         |                      |
|  phone     |    手机号     |      必输         |     手机号11位        |
|  password  |    密码       |      必输         |     必须大于6位       |  

#### 4.返回值
##### 1).成功返回
  
    {
       "status":200,
       "msg":"success",
       "data":
        {
           "token":"4nMa13qPBlhH0gXHfWlq7GeaZuX86RdTOQZO36+4WWwRTaCtVQkXhX9NTMktCSlMeNZnow0qtpzoyOLAchRCfo0uKKO5gjby"
        }
    }
   
##### 2).失败返回
###### a.服务端出错
   
     {
      "status":500,
       "msg":"server error"
    }
    
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 二.登陆接口（需要修改，暂时待定）
#### 1.请求方式 ：Get
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/User/login`
#### 3..请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  phone     |    手机号     |      必输         |     手机号11位        |
|  password  |    密码       |      必输         |     必须大于6位       |  

#### 4.返回值
##### 1).成功返回
  
     {
        "status": 200,
        "msg": "success",
        "data": {
            "user_id": "85",
            "username": "suzhen",
            "user_pho": null,
            "token": "IvkQhlLSyvjvHOa+XuEasYPP2oE5nqAWnrJ+MIpr9/uOh0hww8ePRu72NxIZnMNn107YmdqlYIvPU4SWe/IcFT5TQSwwCmB9"
        }
     }
   
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
       "status":400,
       "msg":"clinet error"
    }
    
### 三.修改密码接口（已完成，前端可以直接进行开发）
#### 1.请求方式 ：Get
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/User/modifyPwd`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|old_password|    原密码     |     必输          |                      |
|  password  |    新密码     |     必输          |                      |

#### 4.返回值
##### 1).成功返回

    {
        "status": 200,
        "msg": "success"
    }

##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
       "status":400,
       "msg":"clinet error"
    }


### 四.招聘列表接口（已完成，前端可以直接进行开发）
#### 1.请求方式 ：PSOT
#### 2.接口地址：
     `http://39.108.170.199/index.php/Home/Hire/getHireList`
#### 3.请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|    无      |               |                  |                      |
#### 4.返回值

##### 1).成功返回

     {
         "status": 200,
         "msg": "success",
         "data": [
             {
                 "hire_id": "3",
                 "hire_name": "管道工招聘",
                 "hire_area": "毕节市七星关区",
                 "work_area": "毕节市七星关区",
                 "upd_time": "3"
             },
             {
                 "hire_id": "4",
                 "hire_name": "管道工聘",
                 "hire_area": "毕节市七星关区",
                 "work_area": "毕节市七星关区",
                 "upd_time": "3"
             },
             {
                 "hire_id": "5",
                 "hire_name": "管道工ww聘",
                 "hire_area": "毕节市七星关区",
                 "work_area": "毕节市七星关区",
                 "upd_time": "3"
             }
         ]
     }
     
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
### 五.单条招聘信息详细接口（已完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://39.108.170.199/index.php/Home/Hire/getHireDetail`
#### 3.请求头
#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  hire_id   |  招聘ID      |      必输         |     标识每一条信息    |

#### 5.返回值
##### 1).成功返回

      {
         "status": 200,
         "msg": "success",
         "hire": {
             "hire_id": "3",
             "hire_name": "管道工招聘",
             "hire_area": "毕节市七星关区",
             "hire_degree": null,
             "work_area": "毕节市七星关区",
             "work_year": null,
             "work_exp": "1-3年的管道工工作经验",
             "office_salary": "333.00",
             "hire_person": "郭世江",
             "hire_tel": "18210042149",
             "hire_qq": "1294928442",
             "hire_wechat": "guo20123762",
             "hire_email": "guoshijiang2012@163.com",
             "add_time": "2",
             "upd_time": "3"
         },
         "hireInfo": [
             {
                 "work_need": "aaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                 "work_duty": "aaaaaaaaaaaaaaaaaaa"
             },
             {
                 "work_need": "www",
                 "work_duty": "ww"
             },
             {
                 "work_need": "xx",
                 "work_duty": "xxx"
             }
         ]
     }
 
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 六.行业客户接口（已完成，前端可以进行开发）
#### 1.请求方式 ：PSOT
#### 2.接口地址：
     `http://39.108.170.199/index.php/Home/Bigcustomer/getCustomerList`
#### 3..请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|    无      |               |                  |                      |
#### 4.返回值
##### 1).成功返回

     {
     "status": 200,
     "msg": "success",
     "data": [
         {
             "bct_simg": ""
         },
         {
             "bct_simg": ""
         },
         {
             "bct_simg": ""
         },
         {
             "bct_simg": ""
         },
         {
             "bct_simg": ""
         },
         {
             "bct_simg": null
         },
         {
             "bct_simg": ""
         }
      ]
    }


### 七.家政服务接口（已完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Index/homeservice`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|    无      |              |                   |                      |


#### 5.返回值
 |       参数     |     参数名称  |    是否为空       |          备注        |
 |----------------|:------------:|----------------- |----------------------|
 |  yuangong_id   |  员工ID号    |    不能为空       |                      |
 |  yuangong_s_tx |  员工头像    |    不能为空       |                      |
 |  yuangong_name |  员工姓名    |    不能为空       |                      |
 |yuangong_jianjie|  员工简介    |    可以为空       |                      |
 |  yg_star       |  员工星级    |    可以为空       |                      |
 | yuangong_price |  员工价格    |    可以为空       |                      |



 |       参数     |     参数名称           |    是否为空       |          备注        |
 |----------------|:---------------------:|----------------- |----------------------|
 | cleaner        |  保洁员               |                   |                     |
 | duenna         |  保姆                 |                   |                     |
 | nutritionist   |  营养师               |                   |                     |
 | nursery        |  育婴师               |                   |                     |
 | prolactor      |  催乳师               |                   |                     |
 | careworker     |  护工                 |                   |                     |
 | ewclean        |  外墙清洗             |                   |                     |
 | pipeulock      |  管道疏通与开锁服务    |                   |                     |   
##### 1).成功返回

          
     { 
       "status": 200,
       "msg": "success",
       "data": {
           "cleaner": [
               {
                   "yuangong_id": "12",
                   "yuangong_s_tx": "./Yuangongtouxiang/2017-07-25/s_59769e0226505.png",
                   "yuangong_name": "苏镇",
                   "yuangong_jianjie": "傻逼一个",
                   "yg_star": null,
                   "yuangong_price": "55元/小时"
               },
               {
                   "yuangong_id": "26",
                   "yuangong_s_tx": "./Yuangongtouxiang/2017-08-05/s_5984bafe6f3c9.png",
                   "yuangong_name": "aaaaa",
                   "yuangong_jianjie": "aaaaaaaaaaaaaaa",
                   "yg_star": null,
                   "yuangong_price": "aaaaaaaa"
               },
               {
                   "yuangong_id": "24",
                   "yuangong_s_tx": "./Yuangongtouxiang/2017-08-05/s_59853dcd61125.JPG",
                   "yuangong_name": "江哥",
                   "yuangong_jianjie": "驱蚊器翁群无",
                   "yg_star": null,
                   "yuangong_price": "111"
               }
           ],
           "duenna": [
               {
                   "yuangong_id": "17",
                   "yuangong_s_tx": "./Yuangongtouxiang/2017-07-25/s_5976a0048212a.png",
                   "yuangong_name": "小郭",
                   "yuangong_jianjie": "电风扇鬼斧神工",
                   "yg_star": null,
                   "yuangong_price": "1000元/小时"
               },
               {
                   "yuangong_id": "13",
                   "yuangong_s_tx": "./Yuangongtouxiang/2017-07-25/s_59769df0015c2.png",
                   "yuangong_name": "徐世军",
                   "yuangong_jianjie": "是多少",
                   "yg_star": null,
                   "yuangong_price": "55元/小时"
               },
               {
                   "yuangong_id": "22",
                   "yuangong_s_tx": null,
                   "yuangong_name": "国税局",
                   "yuangong_jianjie": "啥地方的萨芬的范德萨发的",
                   "yg_star": null,
                   "yuangong_price": "123"
               }
           ],
           "nutritionist": [
               {
                   "yuangong_id": "14",
                   "yuangong_s_tx": "./Yuangongtouxiang/2017-07-25/s_59769ddb5bbff.png",
                   "yuangong_name": "啊啊",
                   "yuangong_jianjie": "手动阀",
                   "yg_star": null,
                   "yuangong_price": "55元/小时"
               },
               {
                   "yuangong_id": "23",
                   "yuangong_s_tx": null,
                   "yuangong_name": "刚上",
                   "yuangong_jianjie": "手动阀奥奥奥奥奥奥奥奥奥奥奥奥奥奥",
                   "yg_star": null,
                   "yuangong_price": "1000"
               }
           ],
           "nursery": [],
           "prolactor": [
               {
                   "yuangong_id": "18",
                   "yuangong_s_tx": null,
                   "yuangong_name": "好不好",
                   "yuangong_jianjie": "111111111111111111111111111111",
                   "yg_star": null,
                   "yuangong_price": "111111111111111"
               },
               {
                   "yuangong_id": "25",
                   "yuangong_s_tx": null,
                   "yuangong_name": "王建林",
                   "yuangong_jianjie": "万达家政掌门人",
                   "yg_star": null,
                   "yuangong_price": "10000"
               }
           ],
           "careworker": [],
           "ewclean": [
               {
                   "yuangong_id": "16",
                   "yuangong_s_tx": "./Yuangongtouxiang/2017-07-25/s_59769dba5304e.png",
                   "yuangong_name": "王五",
                   "yuangong_jianjie": "但事实上所所所所所所所所",
                   "yg_star": null,
                   "yuangong_price": "55元/小时"
               },
               {
                   "yuangong_id": "21",
                   "yuangong_s_tx": null,
                   "yuangong_name": "苏珊",
                   "yuangong_jianjie": "我是暗访爬得商品房噶没犯法啊防守打法",
                   "yg_star": null,
                   "yuangong_price": "111"
               }
           ],
           "pipeulock": [
               {
                   "yuangong_id": "19",
                   "yuangong_s_tx": null,
                   "yuangong_name": "小米",
                   "yuangong_jianjie": "呜呜呜呜无的方式发生发的撒地方撒艾弗森的的方式",
                   "yg_star": null,
                   "yuangong_price": "100"
               },
               {
                   "yuangong_id": "20",
                   "yuangong_s_tx": null,
                   "yuangong_name": "阿军",
                   "yuangong_jianjie": "阿发空间说说服务群文件放到搜人情味job紧迫而未能股份全道具",
                   "yg_star": null,
                   "yuangong_price": "1000"
               },
               {
                   "yuangong_id": "15",
                   "yuangong_s_tx": "./Yuangongtouxiang/2017-07-25/s_59769dcba5189.png",
                   "yuangong_name": "郭世江",
                   "yuangong_jianjie": "帅爆了",
                   "yg_star": null,
                   "yuangong_price": "55元/小时"
               }
           ]
       }
     }
   
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    

### 八.保洁员 保姆 营养师 育婴师 催乳师护工 外墙清洗 管道疏通与开锁服务接口（已完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Index/getEmployeeList`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          参数值                |      备注                    |
|------------|:------------:|-------------------|--------------------------------|-----------------------------|
|  cat_id    |   分类       |     必输           | 10, 11, 12, 13, 14, 15, 16, 17 |  10:保洁员 11:保姆 12:营养师 13:育婴师 14:催乳师 15:护工  16:外墙清洗 17:管道疏通与开锁服务  |                 


#### 5.返回值
 |       参数     |     参数名称  |    是否为空       |          备注        |
 |----------------|:------------:|----------------- |----------------------|
 |  yuangong_id   |  员工ID号    |    不能为空       |                      |
 |  yuangong_s_tx |  员工头像    |    不能为空       |                      |
 |  yuangong_name |  员工姓名    |    不能为空       |                      |
 |yuangong_jianjie|  员工简介    |    可以为空       |                      |
 |  yg_star       |  员工星级    |    可以为空       |                      |
 | yuangong_price |  员工价格    |    可以为空       |                      |



 |       参数     |     参数名称           |    是否为空       |          备注        |
 |----------------|:---------------------:|----------------- |----------------------|
 |    data        |    保洁员              |                   |                     |

##### 1).成功返回

        {
       "status": 200,
       "msg": "success",
       "data": [
           {
               "yuangong_id": "12",
               "yuangong_s_tx": "./Yuangongtouxiang/2017-07-25/s_59769e0226505.png",
               "yuangong_name": "苏镇",
               "yuangong_jianjie": "傻逼一个",
               "yg_star": null,
               "yuangong_price": "55元/小时"
           },
           {
               "yuangong_id": "26",
               "yuangong_s_tx": "./Yuangongtouxiang/2017-08-05/s_5984bafe6f3c9.png",
               "yuangong_name": "aaaaa",
               "yuangong_jianjie": "aaaaaaaaaaaaaaa",
               "yg_star": null,
               "yuangong_price": "aaaaaaaa"
           },
           {
               "yuangong_id": "24",
               "yuangong_s_tx": "./Yuangongtouxiang/2017-08-05/s_59853dcd61125.JPG",
               "yuangong_name": "江哥",
               "yuangong_jianjie": "驱蚊器翁群无",
               "yg_star": null,
               "yuangong_price": "111"
           },
           {
               "yuangong_id": "28",
               "yuangong_s_tx": "./Yuangongtouxiang/2017-08-06/s_5986a9d577a83.jpg",
               "yuangong_name": "小过",
               "yuangong_jianjie": "sad",
               "yg_star": null,
               "yuangong_price": "33"
           }
        ]
     }  
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 九.员工单条详细信息（已完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Index/getOneEmployeeDetail`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          参数值                |      备注                    |
|------------|:------------:|-------------------|--------------------------------|-----------------------------|
|yuangong_id |     员工ID   |     必输           |                                |                             |
|  user_id   |     会员ID   |     必输           |                                |                             |


#### 5.返回值
 |       参数     |     参数名称  |    是否为空       |          备注        |
 |----------------|:------------:|----------------- |----------------------|
 |  yuangong_s_tx |  员工头像    |    不能为空       |                      |
 |  yuangong_name |  员工姓名    |    不能为空       |                      |
 |  service_num   |  服务次数    |    不能为空       |                      |
 |yuangong_jianjie|  员工简介    |    可以为空       |                      |
 |yuangong_tuijian|  经理推荐    |    可以为空       |                      |
 | yuangong_price |  公司报价    |    可以为空       |                      |
 | comd_address   |  公司详细地址|    可以为空       |                      |
 | homd_address   |  家庭详细地址|    可以为空       |                      |
 |   cmt_msg      |  评论内容    |     可以为空      |                      |


 |       参数     |     参数名称           |    是否为空       |          备注        |
 |----------------|:---------------------:|----------------- |----------------------|
 |  employeeinfo  |    员工信息            |                   |                     |
 |  addrinfo      |    地址信息            |                   |                     |
 |  commentinfo   |    评论信息            |                   |                     |
 
 ##### 1).成功返回
 
       {
          "status": 200,
          "msg": "success",
          "data": {
              "employeeinfo": [
                  {
                      "yuangong_s_tx": "./Yuangongtouxiang/2017-08-06/s_5986a8b304215.jpg",
                      "yuangong_name": "好不好",
                      "service_num": "132",
                      "yuangong_jianjie": "aaaaaaaaaaaa",
                      "yuangong_tuijian": "qqqqqqqqqqq",
                      "yuangong_price": "111111元/年"
                  }
              ],
              "addrinfo": [
                  {
                      "comd_address": "北京市海定区中关村大街豪景大厦",
                      "homd_address": "北京市昌平区沙河镇满井西村"
                  }
              ],
              "commentinfo": [
                  {
                      "cmt_msg": "好评"
                  },
                  {
                      "cmt_msg": "好评"
                  },
                  {
                      "cmt_msg": "好评"
                  }
              ]
          }
      }
      
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
### 十.获取评论列表接口（已废弃）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Comment/getCmtList`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          参数值                |      备注                    |
|------------|:------------:|-------------------|--------------------------------|-----------------------------|
|yuangong_id |     员工ID   |     必输           |                                |                             |
| page_index |     页数     |     必输           |                                |                             |


#### 5.返回值
 |       参数     |     参数名称  |    是否为空       |          备注        |
 |----------------|:------------:|----------------- |----------------------|
 |  username      |  会员名字    |    不能为空       |                      |
 |  cmt_id        |  评论ID      |    不能为空       |                      |
 |  cmt_msg       |  评论内容    |    不能为空       |                      |
 |  cmt_star      |  评论星级    |    可以为空       |                      |
 |  cmttime       |  评论时间    |    可以为空       |                      |
 |  back_msg      |  评论回复内容|    可以为空       |                      |
 |  back_id       |  评论回复ID  |    可以为空       |                      |
 |  backtime      |  评论回复时间|    可以为空       |                      |


 |       参数     |     参数名称           |    是否为空       |          备注        |
 |----------------|:---------------------:|----------------- |----------------------|
 |  comment       |    评论信息            |                   |                     |
 |  backinfo      |    回复信息            |                   |                     |
 
 ##### 1).成功返回
 
      {
         "status": 200,
         "msg": "success",
         "data": {
             "comment": [
                 {
                     "username": "guosj",
                     "cmt_id": "19",
                     "cmt_msg": "aaaaaaaaaaaaaaaaaaa",
                     "cmt_star": "3",
                     "cmttime": "1970-01-01 08:00",
                     "backinfo": [
                         {
                             "username": "suzhen",
                             "back_msg": "qqqqqqqqqqqqqq",
                             "back_id": "18",
                             "backtime": "2017-08-10 20:13",
                             "cmt_id": "19"
                         }
                     ]
                 },
                 {
                     "username": "guosj",
                     "cmt_id": "18",
                     "cmt_msg": "aaaaaaaaaaaaaaaaaaa",
                     "cmt_star": "3",
                     "cmttime": "1970-01-01 08:00"
                 },
                 {
                     "username": "guosj",
                     "cmt_id": "17",
                     "cmt_msg": "aaaaaaaaaaaaaaaaaaa",
                     "cmt_star": "3",
                     "cmttime": "1970-01-01 08:00"
                 },
                 {
                     "username": "guosj",
                     "cmt_id": "16",
                     "cmt_msg": "aaaaaaaaaaaaaaaaaaa",
                     "cmt_star": "3",
                     "cmttime": "1970-01-01 08:00"
                 },
                 {
                     "username": "guosj",
                     "cmt_id": "15",
                     "cmt_msg": "好评",
                     "cmt_star": "3",
                     "cmttime": "1970-01-01 08:18"
                 }
             ]
         }
     } 
     
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }


### 十一.添加评论接口（已废弃）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Comment/addCmt`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          参数值                |      备注                    |
|------------|:------------:|-------------------|--------------------------------|-----------------------------|
|  cmt_star  |    平论星级   |     必输           |                                |                             |
|  cmt_msg   |    平论内容   |     必输           |                                |                             |
|yuangong_id |     员工ID    |     必输           |                                |                             |
|  user_id   |     会员ID    |     必输           |                                |                             |


#### 5.返回值
 |       参数     |     参数名称  |    是否为空       |          备注        |
 |----------------|:------------:|----------------- |----------------------|
 |  username      |  会员名字    |    不能为空       |                      |
 |  cmt_id        |  评论ID      |    不能为空       |                      |
 |  cmt_msg       |  评论内容    |    不能为空       |                      |
 |  cmt_star      |  评论星级    |    可以为空       |                      |
 |  cmttime       |  评论时间    |    可以为空       |                      |
 
 ##### 1).成功返回
 
       {
          "status": 200,
          "msg": "success",
          "data": {
              "comment": {
                  "username": "suzhen",
                  "cmt_id": "22",
                  "cmt_msg": "服务不错",
                  "cmt_star": "2.5",
                  "cmttime": "2017-08-10 20:45"
              }
          }
      }
      
 ##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
### 十二.评论回复接口（已废弃）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Comment/sendBack`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          参数值                |      备注                    |
|------------|:------------:|-------------------|--------------------------------|-----------------------------|
|  cmt_id    |    平论ID    |     必输           |                                |                             |
|  back_msg  |  评论回复内容 |     必输           |                                |                             |
|  user_id   |     会员ID    |     必输           |                                |                             |


#### 5.返回值
 |       参数     |     参数名称  |    是否为空       |          备注        |
 |----------------|:------------:|----------------- |----------------------|
 |  username      |  会员名字    |    不能为空       |                      |
 |  back_id       |  评论回复ID  |    不能为空       |                      |
 |  back_msg      |  评论回复内容 |    不能为空       |                      |
 |  backtime      |  评论回复时间 |    可以为空       |                      |
 
 ##### 1).成功返回
 
       {
          "status": 200,
          "msg": "success",
          "data": {
              "comment": {
                  "username": "suzhen",
                  "back_id": "19",
                  "back_msg": "sssssssssss",
                  "backtime": "2017-08-10 20:51"
              }
          }
      }
      
 ##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
### 十三.删除评论信息接口（已废弃）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Comment/delCmt`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          参数值                |      备注                    |
|------------|:------------:|-------------------|--------------------------------|-----------------------------|
|  cmt_id    |    平论ID    |     必输           |                                |                             |


#### 5.返回值
##### 1).成功返回
 
      {
        "status": 200,
        "msg": "delete commet success!"
      }
      
 ##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 十四.商品类别图标接口（已完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Goods/getCat`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          参数值                |      备注                    |
|------------|:------------:|-------------------|--------------------------------|-----------------------------|
|  无        |    无        |     无            |                                |                             |


#### 5.返回值
##### 1).成功返回

      {
          "status": 200,
          "msg": "success",
          "data": {
              "gzImg": {
                  "img_name": "贵州特产",
                  "img_img": "./IconImgs/2017-08-13/598fe1c698c12.png"
              },
              "qjImg": {
                  "img_name": "清洁用品",
                  "img_img": "./IconImgs/2017-08-13/598fdd90bb5ad.png"
              }
          }
      }

 ##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 十五.商品六条记录接口（已完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Goods/shopSixRecord`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          参数值                |      备注                    |
|------------|:------------:|-------------------|--------------------------------|-----------------------------|
|  无        |    无        |     无            |                                |                             |


#### 5.返回值
##### 1).成功返回

      {
          "status": 200,
          "msg": "success",
          "data": {
              "gzGoods": [
                  {
                      "cat_id": "56",
                      "goods_id": "12",
                      "goods_s_logo": "./Goodsimgs/2017-08-03/s_5982d50e3dde8.jpg",
                      "goods_introduce": "撒个放大电饭锅撒的发生",
                      "goods_price": "1080.00"
                  },
                  {
                      "cat_id": "56",
                      "goods_id": "13",
                      "goods_s_logo": "./Goodsimgs/2017-08-13/s_598feec3d9781.jpg",
                      "goods_introduce": "味道还不错",
                      "goods_price": "11.00"
                  },
                  {
                      "cat_id": "56",
                      "goods_id": "14",
                      "goods_s_logo": "./Goodsimgs/2017-08-13/s_598ff05711298.jpg",
                      "goods_introduce": "刺梨为蔷薇科植物缫丝花的果实,又名茨梨、木梨子,文先果,是滋补健身的营养珍果。",
                      "goods_price": "11.00"
                  },
                  {
                      "cat_id": "56",
                      "goods_id": "15",
                      "goods_s_logo": "./Goodsimgs/2017-08-13/s_598ff18be1aeb.jpg",
                      "goods_introduce": "竹荪（Dictyophora indusiata (Vent.ex Pers) Fisch）又名竹笙、竹参，常见并可供食用的有4种",
                      "goods_price": "100.00"
                  },
                  {
                      "cat_id": "56",
                      "goods_id": "16",
                      "goods_s_logo": "./Goodsimgs/2017-08-13/s_598ff24804dcd.jpg",
                      "goods_introduce": "果实可以作为水果食用，外表色泽鲜艳、晶莹美丽、红如玛瑙，黄如凝脂，果实富含糖、蛋白质、维生素及钙、铁、磷、钾等多种元素",
                      "goods_price": "250.00"
                  },
                  {
                      "cat_id": "56",
                      "goods_id": "17",
                      "goods_s_logo": "./Goodsimgs/2017-08-13/s_598ff319cdd9d.jpg",
                      "goods_introduce": "杜仲游离氨基酸极少，含有的少量蛋白质，是和绝大多数食品类似的完全蛋白，即能够水解检出对人体必需的8种氨基酸。测定了杜仲所含的15种矿物元素，其中有锌、铜、铁等微量元素，及钙、磷、钾、镁等宏量元素",
                      "goods_price": "1280.00"
                  }
              ],
              "qjGoods": [
                  {
                      "cat_id": "57",
                      "goods_id": "11",
                      "goods_s_logo": "./Goodsimgs/2017-08-03/s_5982dafc7409f.jpg",
                      "goods_introduce": "啊啊啊啊啊啊啊啊啊啊啊啊啊啊呃呃呃呃呃呃鹅鹅鹅鹅鹅鹅饿大发多少",
                      "goods_price": "23135.00"
                  },
                  {
                      "cat_id": "57",
                      "goods_id": "10",
                      "goods_s_logo": "./Goodsimgs/2017-08-03/s_5982db63ba51d.jpg",
                      "goods_introduce": "浮动的多多方法方法付付付付付多付vfdf都是谁方式方式方式是的的 的顶顶顶顶顶大多多多多的顶顶顶顶顶大多多多多多多多多多多多",
                      "goods_price": "15.00"
                  },
                  {
                      "cat_id": "57",
                      "goods_id": "19",
                      "goods_s_logo": "./Goodsimgs/2017-08-13/s_598ff4c26ea38.jpg",
                      "goods_introduce": "啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊",
                      "goods_price": "12.00"
                  },
                  {
                      "cat_id": "57",
                      "goods_id": "20",
                      "goods_s_logo": "./Goodsimgs/2017-08-13/s_598ff5bc699a7.jpg",
                      "goods_introduce": "指针指针做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做做",
                      "goods_price": "12.00"
                  },
                  {
                      "cat_id": "57",
                      "goods_id": "21",
                      "goods_s_logo": "./Goodsimgs/2017-08-13/s_598ff6120535c.jpg",
                      "goods_introduce": "是方法付付付付付付付付付付付付付付付付付付付付付付付付付付付付付付付付付付付付付付付v惺惺惜惺惺想寻寻寻寻寻寻寻",
                      "goods_price": "11.00"
                  },
                  {
                      "cat_id": "57",
                      "goods_id": "22",
                      "goods_s_logo": "./Goodsimgs/2017-08-13/s_598ff668ccd5a.jpg",
                      "goods_introduce": "惺惺惜惺惺想寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻",
                      "goods_price": "15.00"
                  }
              ]
          }
      }

##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
  
  
### 十六.商品分页接口（已完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Goods/getPerSixGoodsList`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          参数值                |      备注                    |
|------------|:------------:|-------------------|--------------------------------|-----------------------------|
|  cat_id    |    分类ID    |     必输           |                                |                             |
| page_index |    页数索引  |     必输           |                                |                             |


#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "success",
         "data": {
             "goodSixList": [
                 {
                     "goods_id": "12",
                     "goods_s_logo": "./Goodsimgs/2017-08-03/s_5982d50e3dde8.jpg",
                     "goods_name": "洗衣机",
                     "goods_introduce": "撒个放大电饭锅撒的发生",
                     "goods_price": "1080.00"
                 },
                 {
                     "goods_id": "13",
                     "goods_s_logo": "./Goodsimgs/2017-08-13/s_598feec3d9781.jpg",
                     "goods_name": "老干妈",
                     "goods_introduce": "味道还不错",
                     "goods_price": "11.00"
                 },
                 {
                     "goods_id": "11",
                     "goods_s_logo": "./Goodsimgs/2017-08-03/s_5982dafc7409f.jpg",
                     "goods_name": "扫把",
                     "goods_introduce": "啊啊啊啊啊啊啊啊啊啊啊啊啊啊呃呃呃呃呃呃鹅鹅鹅鹅鹅鹅饿大发多少",
                     "goods_price": "23135.00"
                 },
                 {
                     "goods_id": "10",
                     "goods_s_logo": "./Goodsimgs/2017-08-03/s_5982db63ba51d.jpg",
                     "goods_name": "洗衣液",
                     "goods_introduce": "浮动的多多方法方法付付付付付多付vfdf都是谁方式方式方式是的的 的顶顶顶顶顶大多多多多的顶顶顶顶顶大多多多多多多多多多多多",
                     "goods_price": "15.00"
                 },
                 {
                     "goods_id": "14",
                     "goods_s_logo": "./Goodsimgs/2017-08-13/s_598ff05711298.jpg",
                     "goods_name": "刺梨",
                     "goods_introduce": "刺梨为蔷薇科植物缫丝花的果实,又名茨梨、木梨子,文先果,是滋补健身的营养珍果。",
                     "goods_price": "11.00"
                 },
                 {
                     "goods_id": "15",
                     "goods_s_logo": "./Goodsimgs/2017-08-13/s_598ff18be1aeb.jpg",
                     "goods_name": "竹荪",
                     "goods_introduce": "竹荪（Dictyophora indusiata (Vent.ex Pers) Fisch）又名竹笙、竹参，常见并可供食用的有4种",
                     "goods_price": "100.00"
                 }
             ]
         }
     }

##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 十七.获取商品属性接口（已完成，前端可以进行开发）
#### 1.请求方式 ：Get
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Goods/getGoodsAttrName`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          参数值                |      备注                    |
|------------|:------------:|-------------------|--------------------------------|-----------------------------|
|  goods_id  |    商品ID    |     必输           |                                |                             |

#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "success",
         "data": {
             "goodsAttr": [
                 {
                     "goods_name": "洗衣机【红色】"
                 },
                 {
                     "goods_name": "洗衣机【黄色】"
                 },
                 {
                     "goods_name": "洗衣机【绿色】"
                 }
             ]
         }
     }
     
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 十八.商品详情接口（已完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Goods/getDetailGoodsInfo`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          参数值                |      备注                    |
|------------|:------------:|-------------------|--------------------------------|-----------------------------|
|  goods_id  |    商品ID    |     必输           |                                |                             |


#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "success",
         "data": {
             "goods_s_xc1": "./Goodsimgs/2017-08-13/s_598ff668d2507.jpg",
             "goods_s_xc2": "./Goodsimgs/2017-08-13/s_598ff668d27db.jpg",
             "goods_s_xc3": "./Goodsimgs/2017-08-13/s_598ff668d2a54.jpg",
             "goods_price": "15.00",
             "goods_name": "海飞丝",
             "goods_introduce": "惺惺惜惺惺想寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻寻",
             "goods_weight": "12"
         }
     }
     
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
    
### 十九.根据商品属性名称查询商品接口（已完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Goods/findGoodsByAttrName`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |          参数值                |      备注                    |
|------------|:------------:|-------------------|--------------------------------|-----------------------------|
|  goods_id  |    商品ID    |     必输           |                                |                             |
|  goods_name|  商品属性名称 |     必输           |                                |                             |


#### 5.返回值
##### 1).成功返回

     {
        "status": 200,
        "msg": "success",
        "data": {
            "goods_s_xc1": "./Goodsimgs/2017-08-03/s_5982dcb34b709.jpg",
            "goods_s_xc2": "./Goodsimgs/2017-08-03/s_5982dcb34d22f.jpg",
            "goods_s_xc3": "./Goodsimgs/2017-08-03/s_5982dcb34ef36.jpg",
            "goods_price": "88.00",
            "goods_name": "洗衣粉【白色】",
            "goods_introduce": "啊啊啊啊啊啊啊啊啊啊啊啊啊啊呃呃呃呃呃呃鹅鹅鹅鹅鹅鹅饿大发多少",
            "goods_weight": "50"
        }
    } 
     
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
    
### 二十.加入购物车接口（已完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Shop/addShopCart`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |  参数值     |      备注                    |
|------------|:------------:|-------------------|-------------|-----------------------------|
| yuangong_id|    员工ID    |     非必输         |             |                             |
| goodtype_id|    商品ID    |     非必输         |             |                             |
|  now_num   |加入商品的数量 |      必输          |             |                             |


#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "success",
         "data": {
             "shop_id": "129",
             "user_id": "85",
             "goodtype_id": "0",
             "yuangong_id": "17",
             "is_show": "0",
             "is_goods": "1",
             "goods_name": "小郭",
             "goods_introduce": "电风扇鬼斧神工",
             "goods_log": "./Yuangongtouxiang/2017-07-25/s_5976a0048212a.png",
             "goods_price": "1000.00",
             "goods_buy_number": "10",
             "goods_total_price": "10000.00",
             "add_time": "1503723497",
             "upd_time": "1503723497"
         }
     }
     
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
    
### 二十一.将商品从购物车中删除（已完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Shop/delGdOrEmCart`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |  参数值     |      备注                    |
|------------|:------------:|-------------------|-------------|-----------------------------|
| yuangong_id|    员工ID    |     非必输         |             |                             |
| goodtype_id|    商品ID    |     非必输         |             |                             |

#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "delete success"
     }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }



### 二十二.获取购物车列表信息（已完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Shop/getCartInfo`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

#### 5.返回值
##### 1).成功返回

        {
            "status": 200,
            "msg": "success",
            "data": [
                {
                    "shop_id": "130",
                    "user_id": "85",
                    "goodtype_id": "0",
                    "yuangong_id": "17",
                    "is_show": "0",
                    "is_goods": "1",
                    "goods_name": "小郭",
                    "goods_introduce": "电风扇鬼斧神工",
                    "goods_log": "./Yuangongtouxiang/2017-07-25/s_5976a0048212a.png",
                    "goods_price": "1000.00",
                    "goods_buy_number": "10",
                    "goods_total_price": "10000.00",
                    "add_time": "1503723819",
                    "upd_time": "1503723819"
                },
                {
                    "shop_id": "131",
                    "user_id": "85",
                    "goodtype_id": "0",
                    "yuangong_id": "0",
                    "is_show": "0",
                    "is_goods": "0",
                    "goods_name": "洗洁精【黄色】",
                    "goods_introduce": "味道还不错",
                    "goods_log": "./Goodsimgs/2017-08-10/s_598c297cbac0c.jpg",
                    "goods_price": "55.00",
                    "goods_buy_number": "10",
                    "goods_total_price": "550.00",
                    "add_time": "1503723851",
                    "upd_time": "1503723851"
                },
                {
                    "shop_id": "132",
                    "user_id": "85",
                    "goodtype_id": "0",
                    "yuangong_id": "0",
                    "is_show": "0",
                    "is_goods": "0",
                    "goods_name": "自动洗衣机",
                    "goods_introduce": "撒个放大电饭锅撒的发生",
                    "goods_log": "./Goodsimgs/2017-08-03/s_5982d5baa32d1.jpg",
                    "goods_price": "3060.00",
                    "goods_buy_number": "10",
                    "goods_total_price": "30600.00",
                    "add_time": "1503723859",
                    "upd_time": "1503723859"
                }
            ]
        }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 二十三.商品数量变化同步接口（已完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Shop/gdorepChangeNumber`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |  参数值     |      备注                    |
|------------|:------------:|-------------------|-------------|-----------------------------|
| yuangong_id|    员工ID    |     非必输         |             |                             |
| goodtype_id|    商品ID    |     非必输         |             |                             |
|  now_num   |加入商品的数量 |      必输          |             |                             |


#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "success",
         "data": {
             "shop_id": "130",
             "user_id": "85",
             "goodtype_id": "0",
             "yuangong_id": "17",
             "is_show": "0",
             "is_goods": "1",
             "goods_name": "小郭",
             "goods_introduce": "电风扇鬼斧神工",
             "goods_log": "./Yuangongtouxiang/2017-07-25/s_5976a0048212a.png",
             "goods_price": "1000.00",
             "goods_buy_number": "210",
             "goods_total_price": "210000.00",
             "add_time": "1503723819",
             "upd_time": "1503723819"
         }
     }

##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
    
### 二十四.获取培训条数接口（已完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Training/getTrainList`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |  参数值     |      备注                    |
|------------|:------------:|-------------------|-------------|-----------------------------|
|     无     |              |                   |             |                             |


#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "success",
         "data": [
             {
                 "train_id": "35",
                 "train_cname": "保洁员培训",
                 "train_teacher": "张果",
                 "train_way": "0",
                 "upd_time": "1503761149"
             },
             {
                 "train_id": "36",
                 "train_cname": "公务员培训",
                 "train_teacher": "郭世江",
                 "train_way": "0",
                 "upd_time": "1503761744"
             }
         ]
     }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
### 二十五.获取培训信息详情接口（已完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Training/getTrainDetail`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |  参数值     |      备注                    |
|------------|:------------:|-------------------|-------------|-----------------------------|
|  train_id  |    培训ID     |       必输        |             |                             |


#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "success",
         "data": {
             "train": {
                 "train_id": "35",
                 "train_cname": "保洁员培训",
                 "train_teacher": "张果",
                 "train_price": "12000.00",
                 "train_pnum": "12",
                 "train_time": "2017",
                 "train_way": "0",
                 "train_addr": "贵州毕节",
                 "train_tel": "18210042149",
                 "train_qq": "1294928442",
                 "train_wechat": "guo20123762",
                 "add_time": "1503761149",
                 "upd_time": "1503761149"
             },
             "tInfo": [
                 {
                     "tinfo_item": "凄凄切切群ww",
                     "tinfo_content": "凄凄切切wwq"
                 },
                 {
                     "tinfo_item": "请求搜索qq",
                     "tinfo_content": "是是是大多数qq"
                 },
                 {
                     "tinfo_item": "凄xxc凄切切群群群群群群群群群群群群群群群群群群群群群群群群",
                     "tinfo_content": "是xxx是是是是是是是是是是是是是是生生世世"
                 }
             ]
         }
     }

##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
### 二十六.获取动态分类接口（已完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Dynamic/getBynamicCat`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |  参数值     |      备注                    |
|------------|:------------:|-------------------|-------------|-----------------------------|
|     无     |              |                   |             |                             |


#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "success",
         "data": {
             "dymamicCat": [
                 {
                     "cat_id": "60",
                     "cat_name": "订单助手"
                 },
                 {
                     "cat_id": "61",
                     "cat_name": "活动消息"
                 },
                 {
                     "cat_id": "62",
                     "cat_name": "家政服务流程"
                 },
                 {
                     "cat_id": "63",
                     "cat_name": "我的消息"
                 },
                 {
                     "cat_id": "65",
                     "cat_name": "公司简介"
                 }
             ]
         }
     }

##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
### 二十七.获取动态列表全部接口（已完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Dynamic/getAllDynamicList`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |  参数值     |      备注                    |
|------------|:------------:|-------------------|-------------|-----------------------------|
|     无     |              |                   |             |                             |


#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "success",
         "data": [
             {
                 "dyn_id": "6",
                 "dyn_pho_headimg": "./DynamicImg/2017-08-13/s_59901d7609922.jpg",
                 "dyn_title": "啊啊啊啊啊",
                 "dyn_content": "<p>aSSSSSSSSSSAA</p>",
                 "upd_time": "1502616950"
             },
             {
                 "dyn_id": "10",
                 "dyn_pho_headimg": "./DynamicImg/2017-08-27/s_59a1a2e8415d1.jpg",
                 "dyn_title": "家政服务",
                 "dyn_content": "<p>凄凄切切群群群群群群群群群群群群群群群群群群群群群群群</p>",
                 "upd_time": "1503765224"
             },
             {
                 "dyn_id": "12",
                 "dyn_pho_headimg": "./DynamicImg/2017-08-27/s_59a1a320c8cd4.jpg",
                 "dyn_title": "公司简介",
                 "dyn_content": "<p>啊啊啊啊啊啊啊啊啊啊啊啊啊</p>",
                 "upd_time": "1503765280"
             },
             {
                 "dyn_id": "13",
                 "dyn_pho_headimg": "./DynamicImg/2017-08-27/s_59a1b20042237.jpg",
                 "dyn_title": "活动",
                 "dyn_content": "<p>啊啊啊啊啊啊啊啊啊啊啊啊啊</p>",
                 "upd_time": "1503769088"
             },
             {
                 "dyn_id": "14",
                 "dyn_pho_headimg": "./DynamicImg/2017-08-27/s_59a1b236c98a3.png",
                 "dyn_title": "告用户书",
                 "dyn_content": "<p>线程池错错错错错曹操曹操错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错错</p>",
                 "upd_time": "1503769142"
             },
             {
                 "dyn_id": "15",
                 "dyn_pho_headimg": "./DynamicImg/2017-08-27/s_59a1b26d33ed8.png",
                 "dyn_title": "顶顶顶顶",
                 "dyn_content": "<p>的顶顶顶顶顶大多多多</p>",
                 "upd_time": "1503769197"
             }
         ]
     }

##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }


### 二十八.根据分类获取动态列表接口（已完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Dynamic/getDynamicByCatId`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |  参数值     |      备注                    |
|------------|:------------:|-------------------|-------------|-----------------------------|
|  cat_id    |   分类ID      |     必输          |             |                             |


#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "success",
         "data": [
             {
                 "dyn_id": "6",
                 "dyn_pho_headimg": "./DynamicImg/2017-08-13/s_59901d7609922.jpg",
                 "dyn_title": "啊啊啊啊啊",
                 "dyn_content": "<p>aSSSSSSSSSSAA</p>",
                 "upd_time": "1502616950"
             },
             {
                 "dyn_id": "15",
                 "dyn_pho_headimg": "./DynamicImg/2017-08-27/s_59a1b26d33ed8.png",
                 "dyn_title": "顶顶顶顶",
                 "dyn_content": "<p>的顶顶顶顶顶大多多多</p>",
                 "upd_time": "1503769197"
             }
         ]
     }

##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 二十九.获取详细动态内容接口（已完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Dynamic/getPassageDetailContent`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |  参数值     |      备注                    |
|------------|:------------:|-------------------|-------------|-----------------------------|
|  dyn_id    |   动态ID      |     必输          |             |                             |


#### 5.返回值
##### 1).成功返回

     {
        "status": 200,
        "msg": "success",
        "data": {
            "dyn_title": "家政服务",
            "upd_time": "1503765224",
            "dyn_content": "<p>凄凄切切群群群群群群群群群群群群群群群群群群群群群群群</p>",
            "dyn_pho_centerimg": "./DynamicImg/2017-08-27/s_59a1a2e841bc7.jpg",
            "dyn_pho_bottomimg": "./DynamicImg/2017-08-27/s_59a1a2e841f73.jpg"
        }
    }   

##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
    
### 三十.获取地址列表接口（已废弃）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Address/getAddressList`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |  参数值     |      备注                    |
|------------|:------------:|-------------------|-------------|-----------------------------|
|      无    |              |                   |             |                             |


#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "success",
         "data": [
             {
                 "addr_id": "1",
                 "hcomd_address": "北京市海定区中关村大街豪景大厦"
             },
             {
                 "addr_id": "2",
                 "hcomd_address": "北京市朝阳区望京soho T2 A座709"
             },
             {
                 "addr_id": "3",
                 "hcomd_address": "北京市海定区中关村大街知春大厦"
             },
             {
                 "addr_id": "4",
                 "hcomd_address": "北京市昌平区金燕龙大厦A做308"
             },
             {
                 "addr_id": "6",
                 "hcomd_address": "北京市海定区中关村软件园百度科技大厦"
             },
             {
                 "addr_id": "7",
                 "hcomd_address": "北京市海定区中关村软件园百度科技大厦"
             },
             {
                 "addr_id": "8",
                 "hcomd_address": "北京市海定区中关村软件园百度科技大厦"
             },
             {
                 "addr_id": "9",
                 "hcomd_address": "北京市海定区中关村软件园百度科技大厦"
             }
         ]
     }

##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 三十一.添加新地址接口（已废弃）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Address/createAddress`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |      备注                    |
|---------------|:------------:|-------------------|-------------|-----------------------------|
| hcomd_address |    地址名称   |                   |             |                             |


#### 5.返回值
##### 1).成功返回

    {
        "status": 200,
        "msg": "success",
        "data": {
            "addr_id": "10",
            "hcomd_address": "北京市海定区中关村软件园百度科技大厦?hcomd_address=北京市海定区中关村软件园百度科技大厦"
        }
    }

##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    

### 三十二.获取地址列表接口（已开发完，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Consigne/getAddressList`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |      备注                    |
|---------------|:------------:|-------------------|-------------|-----------------------------|
|      无       |              |                   |             |                             |


#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "success",
         "data": [
             {
                 "cgn_id": "2",
                 "user_id": "85",
                 "cgn_bool": "1",
                 "cgn_name": "苏大妹",
                 "cgn_tel": "18210142139",
                 "cgn_addr": "上海浦东新3区",
                 "cgn_daddr": "开瓶器大酒店"
             },
             {
                 "cgn_id": "3",
                 "user_id": "85",
                 "cgn_bool": "0",
                 "cgn_name": "苏小妹",
                 "cgn_tel": "13796002343",
                 "cgn_addr": "北京市海定区",
                 "cgn_daddr": "百度科技楼3号6009室"
             },
             {
                 "cgn_id": "4",
                 "user_id": "85",
                 "cgn_bool": "0",
                 "cgn_name": "苏镇",
                 "cgn_tel": "13796003244",
                 "cgn_addr": "黑龙江省哈尔滨市",
                 "cgn_daddr": "黑龙江大学A去9栋714室"
             },
             {
                 "cgn_id": "6",
                 "user_id": "85",
                 "cgn_bool": "0",
                 "cgn_name": "苏镇",
                 "cgn_tel": "13798786532",
                 "cgn_addr": "北京市海淀区",
                 "cgn_daddr": "中科院大厦A栋3009室"
             },
             {
                 "cgn_id": "30",
                 "user_id": "85",
                 "cgn_bool": "0",
                 "cgn_name": "苏镇",
                 "cgn_tel": "13796003244",
                 "cgn_addr": "山东省菏泽市曹县",
                 "cgn_daddr": "卡拉乡某某大楼2号楼2009室"
             }
         ]
     }

##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
    
    
### 三十三.添加新地址接口（已开发完，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Consigne/createAddress`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |      备注                    |
|---------------|:------------:|-------------------|-------------|-----------------------------|
|    cgn_name   |  收货人姓名   |        必输       |             |                             |
|    cgn_tel    |  收货人电话   |        必输       |             |                             |
|   cgn_addr    |  收货人地址   |        必输       |             |                             |
|   cgn_daddr   |收货人详细地址  |       必输       |             |                             |



#### 5.返回值
##### 1).成功返回

      {
         "status": 200,
         "msg": "success",
         "data":
          {
              "cgn_id": "2",
              "user_id": "85",
              "cgn_bool": "1",
              "cgn_name": "苏大妹",
              "cgn_tel": "18210142139",
              "cgn_addr": "上海浦东新3区",
              "cgn_daddr": "开瓶器大酒店"
          }
      }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }


### 三十三.修改地址信息接口（已开发完，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Consigne/updateAddress`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |      备注                    |
|---------------|:------------:|-------------------|-------------|-----------------------------|
|    cgn_id     |  地址主键ID   |        必输       |             |                             |
|    cgn_name   |  收货人姓名   |        非必输     |             |                             |
|    cgn_tel    |  收货人电话   |        非必输     |             |                             |
|   cgn_addr    |  收货人地址   |        非必输     |             |                             |
|   cgn_daddr   |收货人详细地址  |       非必输      |             |                             |


#### 5.返回值
##### 1).成功返回

    {
        "status": 200,
        "msg": "success",
        "data": {
            "cgn_id": "2",
            "user_id": "85",
            "cgn_bool": "1",
            "cgn_name": "苏大妹",
            "cgn_tel": "18210142149",
            "cgn_addr": "上海浦东新3区",
            "cgn_daddr": "开瓶器大酒店"
        }
    }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }



### 三十三.删除地址信息接口（已开发完，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Consigne/delAddress`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |      备注                    |
|---------------|:------------:|-------------------|-------------|-----------------------------|
|    cgn_id     |  地址主键ID   |        必输       |             |                             |


#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "delete success"
     }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }



### 三十三.设置默认地址接口（已开发完，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Consigne/setDefultAddress`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |      备注                    |
|---------------|:------------:|-------------------|-------------|-----------------------------|
|    cgn_id     |  地址主键ID   |        必输       |             |                             |


#### 5.返回值
##### 1).成功返回

      {
          "status": 200,
          "msg": "success",
          "data": {
              "cgn_id": "3",
              "user_id": "85",
              "cgn_bool": "1",
              "cgn_name": "苏小妹",
              "cgn_tel": "13796002343",
              "cgn_addr": "北京市海定区",
              "cgn_daddr": "百度科技楼3号6009室"
          }
      }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 三十三.添加评论（已开发完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://www.zgxnjz.cn/index.php/Home/Comment/addCmt`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |            备注              |
|---------------|:------------:|-------------------|-------------|-----------------------------|
|    cmt_star   |  评论星级     |       必输        |             |                             |
|    cmt_msg    |  评论内容     |       必输        |             |                             |
| yuangong_id   |  员工ID       |      非必输       |             |                             |
| goodtype_id   |  商品ID       |      非必输       |             |                             |

#### 5.返回值
##### 1).成功返回
      {
         "status": 200,
         "msg": "success",
         -"data": {
         "username": "suzhen",
         "cmt_id": "52",
         "cmt_msg": "服务不错",
         "cmt_star": "1",
         "cmttime": "2017-09-04 22:39"
         }
      }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 三十四.获取评论列表（已开发完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://www.zgxnjz.cn/index.php/Home/Comment/getCmtList`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |            备注              |
|---------------|:------------:|-------------------|-------------|-----------------------------|
| yuangong_id   |  员工ID       |      非必输       |             |                             |
| goodtype_id   |  商品ID       |      非必输       |             |                             |
|  page_index   |  页数索引      |       必输        |             |                             |


#### 5.返回值
##### 1).成功返回

      {
         "status": 200,
         "msg": "success",
         -"data": {
            -"comment": [
                -{
                "username": "suzhen",
                "user_pho": null,
                "cmt_id": "62",
                "cmt_msg": "1去打打",
                "cmt_star": "3",
                "cmttime": "2017-09-04 22:44",
                -"backinfo": [
                    -{
                    "username": "suzhen",
                    "back_msg": "认可一楼",
                    "back_id": "26",
                    "backtime": "2017-09-04 22:48",
                    "cmt_id": "62"
                    },
                    -{
                    "username": "suzhen",
                    "back_msg": "认可一楼",
                    "back_id": "27",
                    "backtime": "2017-09-04 22:48",
                    "cmt_id": "62"
                    },
                    -{
                    "username": "suzhen",
                    "back_msg": "认可一楼",
                    "back_id": "28",
                    "backtime": "2017-09-04 22:48",
                    "cmt_id": "62"
                    },
                    -{
                    "username": "suzhen",
                    "back_msg": "认可一楼",
                    "back_id": "29",
                    "backtime": "2017-09-04 22:48",
                    "cmt_id": "62"
                    },
                    -{
                    "username": "suzhen",
                    "back_msg": "认可一楼",
                    "back_id": "30",
                    "backtime": "2017-09-04 22:50",
                    "cmt_id": "62"
                    }
                ]
                },
                -{
                "username": "suzhen",
                "user_pho": null,
                "cmt_id": "61",
                "cmt_msg": "1去打打",
                "cmt_star": "3",
                "cmttime": "2017-09-04 22:44"
                },
                -{
                "username": "suzhen",
                "user_pho": null,
                "cmt_id": "60",
                "cmt_msg": "1去打打",
                "cmt_star": "3",
                "cmttime": "2017-09-04 22:44"
                },
                -{
                "username": "suzhen",
                "user_pho": null,
                "cmt_id": "59",
                "cmt_msg": "1去打打",
                "cmt_star": "3",
                "cmttime": "2017-09-04 22:44"
                },
                -{
                "username": "suzhen",
                "user_pho": null,
                "cmt_id": "58",
                "cmt_msg": "1去打打",
                "cmt_star": "3",
                "cmttime": "2017-09-04 22:43"
                }
            ]
         }
      }
      
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 三十五.评论回复接口（已开发完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://www.zgxnjz.cn/index.php/Home/Comment/sendBack`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |            备注              |
|---------------|:------------:|-------------------|-------------|-----------------------------|
|    cmt_id     |  评论ID       |       必输        |             |                             |
|    back_msg   |  评论回复内容  |       必输        |             |                             |

#### 5.返回值
##### 1).成功返回

      {
         "status": 200,
         "msg": "success",
         -"data": {
         "username": "suzhen",
         "back_id": "30",
         "back_msg": "认可一楼",
         "backtime": "2017-09-04 22:50"
         }
      }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 三十六.删除评论接口（已开发完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
    `http://www.zgxnjz.cn/index.php/Home/Comment/delCmt`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |            备注              |
|---------------|:------------:|-------------------|-------------|-----------------------------|
|    cmt_id     |  评论ID       |       必输        |             |                             |

#### 5.返回值
##### 1).成功返回
    {
       "status": 200,
       "msg": "delete commet success!"
    }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }


### 三十七.生成订单接口（已开发完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
    `http://zgxnjz.cn/index.php/Home/Order/generateOrder`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |      备注                    |
|---------------|:------------:|-------------------|-------------|-----------------------------|
|    shop_ids   | 购物车的ID集合|     必输           |             | 传值方式为：90,91,92,93,94   |
|    cgn_id     | 收货人地址ID  |     必输           |             |                             |
|  order_post   |   邮寄方式    |    非必输          |             |                             |


#### 5.返回值
##### 1).成功返回

    {
       "status": 200,
       "msg": "add success"
   }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 三十八.获取全部订单接口（已开发完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
      `http://zgxnjz.cn/index.php/Home/Order/getAllOrderList`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |      备注                    |
|---------------|:------------:|-------------------|-------------|-----------------------------|

#### 5.返回值
##### 1).成功返回

       {
           "status": 200,
           "msg": "success",
           "data": {
               "oderinfo": [
                   {
                       "order_id": "31",
                       "order_number": "ES2017090910494469216",
                       "order_pay": "0",
                       "order_price": "111.00",
                       "order_status": "1",
                       "goods_buy_number": "1",
                       "goods_log": "./Yuangongtouxiang/2017-08-05/s_59853dcd61125.JPG",
                       "goods_introduce": "驱蚊器翁群无",
                       "add_time": "2017-09-09 10:49"
                   },
                   {
                       "order_id": "32",
                       "order_number": "ES2017090910494417825",
                       "order_pay": "0",
                       "order_price": "400.00",
                       "order_status": "1",
                       "goods_buy_number": "4",
                       "goods_log": "./Goodsimgs/2017-09-05/s_59aeb3dbd8cab.png",
                       "goods_introduce": "啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊是是是是是是是是是是是是是是是所所",
                       "add_time": "2017-09-09 10:49"
                   },
                   {
                       "order_id": "33",
                       "order_number": "ES2017090910494472299",
                       "order_pay": "0",
                       "order_price": "55.00",
                       "order_status": "2",
                       "goods_buy_number": "1",
                       "goods_log": "./Yuangongtouxiang/2017-07-25/s_59769e0226505.png",
                       "goods_introduce": "傻逼一个",
                       "add_time": "2017-09-09 10:49"
                   }
               ]
           }
       }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 三十九.根据状态查询订单接口（已开发完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Order/getOrderListByStatus`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |      备注                    |
|---------------|:------------:|-------------------|-------------|-----------------------------|
| order_status  |   订单状态    |     必输           |             |                            |


#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "success",
         "data": {
             "oderinfo": [
                 {
                     "order_id": "31",
                     "order_number": "ES2017090910494469216",
                     "order_pay": "0",
                     "order_price": "111.00",
                     "order_status": "1",
                     "goods_buy_number": "1",
                     "goods_log": "./Yuangongtouxiang/2017-08-05/s_59853dcd61125.JPG",
                     "goods_introduce": "驱蚊器翁群无",
                     "add_time": "2017-09-09 10:49"
                 },
                 {
                     "order_id": "32",
                     "order_number": "ES2017090910494417825",
                     "order_pay": "0",
                     "order_price": "400.00",
                     "order_status": "1",
                     "goods_buy_number": "4",
                     "goods_log": "./Goodsimgs/2017-09-05/s_59aeb3dbd8cab.png",
                     "goods_introduce": "啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊是是是是是是是是是是是是是是是所所",
                     "add_time": "2017-09-09 10:49"
                 }
             ]
         }
     }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
### 四十.用户自己取消订单接口（已开发完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
    `http://zgxnjz.cn/index.php/Home/Order/cancelOrderBycustomer`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |      备注                    |
|---------------|:------------:|-------------------|-------------|-----------------------------|
|   order_ids   | 订单的ID集合  |     必输           |             | 传值方式为：90,91,92,93,94   |


#### 5.返回值
##### 1).成功返回

       {
          "status": 200,
          "msg": "cancel success"
       }
   
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
  
### 四十一.系统自动取消订单接口（后台自己处理，该接口不需要前端开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
    `http://zgxnjz.cn/index.php/Home/Order/cancelOrderAtomic`


### 四十二.删除订单接口（已开发完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Order/delOrder`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |      备注                    |
|---------------|:------------:|-------------------|-------------|-----------------------------|
|   order_ids   | 订单的ID集合  |     必输           |             | 传值方式为：90,91,92,93,94   |


#### 5.返回值
##### 1).成功返回

      {
         "status": 200,
         "msg": "delete success"
      }
   
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
### 四十三.获取订单状态接口（已开发完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Order/getOrderAllStatus`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |      备注                    |
|---------------|:------------:|-------------------|-------------|-----------------------------|


#### 5.返回值
##### 1).成功返回

         {
            "status": 200,
            "msg": "success",
            "data": {
             "ostatusinfo": [
                  {
                      "status_id": "2",
                      "status_value": "已取消"
                  },
                  {
                     "status_id": "4",
                     "status_value": "已完成"
                  },
                  {
                     "status_id": "1",
                     "status_value": "待付款"
                  },
                  {
                     "status_id": "3",
                     "status_value": "进行中"
                  }
              ]
           }
         }

##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
### 四十四.获取订单详情接口（已开发完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Order/getODInfoById`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数          |     参数名称  |    是否必填        |  参数值     |      备注                    |
|---------------|:------------:|-------------------|-------------|-----------------------------|
|   order_id    |    订单ID    |     必输           |             |                             |

#### 5.返回值
##### 1).成功返回

        
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }
    
    
### 四十五.用户信息维护接口（已完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
      http://zgxnjz.cn/index.php/Home/User/userInfoStable
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

|      参数    |     参数名称  |    是否必填        |  参数值     |      备注        |
|--------------|:------------:|-------------------|-------------|-----------------|
|  username    |    用户名     |      非必输       |             |                  |
|  phone       |   电话号码    |      非必输       |             |                  |
|user_real_name|   真实名字    |      非必输       |             |                  |
|  user_pho    |   用户头像    |      非必输       |             |                  |
|  user_birth  |   会员生日    |      非必输       |             |                  |
|  user_age    |   会员年龄    |      非必输       |             |                  |
|  user_card   |   身份证号码  |      非必输       |             |                  |
|  user_email  |     邮箱      |     非必输        |             |                  |
|   user_qq    |     QQ       |      非必输        |             |                 |
|  user_wechat |    微信       |     非必输        |             |                 |

#### 5.返回值
##### 1).成功返回

    {
        "status": 200,
        "msg": "add userinfo success",
    }
    
    {
        "status": 200,
        "msg": "update userinfo success",
    }
    
    {
        "status": 200,
        "msg": "update userinfo fail",
    }
    
##### 2).失败返回
###### a.服务端出错
   
     {
        "status":500,
        "msg":"server error"
     }
   
###### b.客户端出错
   
    {
       "status":400,
       "msg":"clinet error"
    }

### 四十六.确认收货接口（已完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：
      http://zgxnjz.cn/index.php/Home/Order/confirmOrder
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

|      参数    |     参数名称  |    是否必填        |  参数值     |      备注        |
|--------------|:------------:|-------------------|-------------|-----------------|
|  order_id    |    订单ID    |         必输       |             |                  |


#### 5.返回值
##### 1).成功返回

     {
      "status": 200,
      "msg": "confirm success"
     }
    
##### 2).失败返回
###### a.服务端出错
   
     {
        "status":500,
        "msg":"server error"
     }
   
###### b.客户端出错
   
    {
       "status":400,
       "msg":"clinet error"
    }


## 附注:优化的接口

### 一.将商品从购物车中删除（已完成，前端可以进行开发）
#### 1.请求方式 ：POST
#### 2.接口地址：
     `http://zgxnjz.cn/index.php/Home/Shop/delGdOrEmCart`
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |  参数值     |      备注                    |
|------------|:------------:|-------------------|-------------|-----------------------------|
|  shop_ids  | 购物车ID集合  |      必输         |             | 传值方式：11,12,13           |

#### 5.返回值
##### 1).成功返回

     {
         "status": 200,
         "msg": "delete success"
     }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }

### 二.登录接口优化（已完成，前端可以进行开发）
#### 1.请求方式 ：GET
#### 2.接口地址：

        http://www.zgxnjz.cn/index.php/Home/User/login
#### 3.请求头

| 请求头参数  |     参数名称  |    是否必填        |          备注        |
|------------|:------------:|-------------------|----------------------|
|  token     |   token令牌   |      必输         |     标识每一个用户    |

#### 4.请求体参数：

| 参数       |     参数名称  |    是否必填        |  参数值     |      备注                    |
|------------|:------------:|-------------------|-------------|-----------------------------|
|  phone     |   电话号码    |      必输         |             |                             |
|  password  |    密码       |      必输         |             |                             |



#### 5.返回值
##### 1).成功返回

       {
       "status": 200,
       "msg": "success",
       "data": {
           "UserInfo": {
               "user_id": "87",
               "username": "guosj",
               "user_pho": null,
               "token": "IvkQhlLSyvjvHOa+XuEasYPP2oE5nqAWKkduGtQ/v/KOh0hww8ePRu72NxIZnMNn107YmdqlYIt0OMaH4w7GQxlhuYo9k1bv"
           },
           "cosSerinfo": [
               {
                   "cos_phone": "15167671243"
               },
               {
                   "cos_phone": "13796003888"
               },
               {
                   "cos_phone": "18210042143"
               }
           ]
       }
    }
##### 2).失败返回
###### a.服务端出错
   
     {
       "status":500,
       "msg":"server error"
     }
   
###### b.客户端出错
   
    {
      "status":400,
       "msg":"clinet error"
    }



