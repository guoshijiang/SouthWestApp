
# 西南家政表结构文档

#### 1.管理员表

 | 字段标识      |    数据类型    |    长度       |          是否为空   |      描述      |      备注             |
 |------------  |-------------- |--------------|-------------------- |---------------| ----------------------|
 |    mg_id     |   int         |     11       |        必输         |   主键id       |                       |
 |   mg_name    |   varchar(32) |     32       |        必输         |  管理员姓名     |                      |
 |   mg_pwd     |   varchar()   |     32       |        必输         |    密码        |                       |  
 |   mg_time    |   int         |     10       |        必输         |   添加时间      |                       |
 |   role_id    |   tinyint     |     3        |        必输         |    角色ID       | 对应角色表里面的角色ID |
 
#### 2.角色表
 | 字段标识      |    数据类型    |    长度       |          是否为空   |      描述      |      备注                          |
 |------------  |-------------- |--------------|-------------------- |--------------- | -----------------------------------|
 |    role_id   |   smallint    |     6        |        必输         |   角色ID        |                                   |
 |   role_name  |   varchar(32) |     64       |        必输         |   角色名称      |                                    |
 | role_auth_ids|   varchar()   |     512      |        必输         |  权限ids,1,2,5  |                                    |  
 |  role_auth_ac|   text        |              |        非必输       |   控制器-操作    |  控制器-操作 控制器-操作 控制器-操作  |
  
#### 3.权限表

 | 字段标识    | 数据类型      | 长度 | 是否为空  |      描述        |    备注        |
 |------------|--------------|------|----------|------------------|----------------|
 | auth_id    |   smallint   | 6    |   必输   | 主键ID            |     自动增长    |
 | auth_name  |   varchar    | 20   |   必输   |     权限名称       |                |
 | auth_pid   |  smallint    | 6    |   必输   |       父ID        |                 |
 | auth_c     |   varchar    | 32   |   必输   |      控制器        |                |
 | auth_a     |   varchar    | 32   |   必输   |     操作方法       |                |
 | auth_path  |   varchar    | 32   |  非必输  |      全路径        |    全路径       |
 | auth_level |   tinyint    |  4   |   必输   |     权限等级       |   从0开始计数   |
 
#### 4.分类表

| 字段标识   |   数据类型    | 长度  | 是否为空 | 描述    | 备注          |
|-----------|---------------|------|----------|--------|----------------|
| cat_id    |   mediumint   |   8  |   必输   |  分类ID |    自动增长    |
| cat_name  |    varchar    |  32  |   必输   | 分类名称 |               |
| cat_pid   |   mediumint   |   8  |   必输   | 上级ID   |                |
| cat_path  |    varchar    |   32 |   必输   |  全路径  |                |
| cat_level |    tinyint    |   4  |   必输   |   等级   |                |

#### 5.用户名

|  字段标识  | 数据类型  | 长度  | 是否为空  | 描述       | 备注          |
|-----------|-----------|------|-----------|---------- |---------------|
| user_id   | int       | 10   |  必输     |  用户ID    | 自动增长      |
| username  | varchar   | 16   |  必输     |  用户名    |               |
| password  | varchar   | 32   |  必输     |  密码      |               |
| token     | text      |      |  非必输   |  令牌      |               |
| phone     | varchar   | 11   |  非必输   |  手机      |               |
| regtime   | timestamp |      |  必输     |  注册时间  |               |
| logintime | timestamp |      |  非必输   |  登录时间  |               |
| loginip   | varchar   | 15   |  非必输   |  登录IP    |               |

#### 6.用户信息表

| 字段标识        | 数据类型  | 长度 | 是否为空 |    描述     |       备注     |
|----------------|----------|------|---------|-------------|----------------|
| user_info_id   |   int    |  11  |  必输    | 主键ID      |                |
| user_real_name |  varchar |  20  | 非必输   |用户真实姓名  |                |
| user_pho       |  varcahr |  128 | 非必输   |    头像     |                |
| user_sex       |   int    |  11  | 非必输   |    性别     |                |
| user_age       |  varchar |  10  | 非必输   |    年龄     |                |
| user_card      |  varchar |  18  | 非必输   |    卡号     |                |
| user_phone     |  varchar |  11  | 非必输   |   电话号码  |                |
| user_email     |  varchar |  32  | 非必输   |     邮箱    |                |
| user_id        |   int    |  11  |  必输    |   用户id    |                |
| user_qq        |  varchar |  16  | 非必输   |     QQ      |                |
| user_wechat    |  varchar |  20  | 非必输   |     微信    |                |

#### 7.家政服务员工信息表

| 字段标识          |   数据类型 | 长度  | 是否为空|    描述    |     备注       |
|------------------|----------- |------|------- |------------|----------------|
| yuangong_id      |   int      |  6   | 必输   |    主键ID   | auto_increment |
| cat_id           |   int      |  4   | 必输   |    分类ID   |                |
| yuangong_name    | varchar    | 32   | 必输   |   员工姓名   |                |
| yuangong_phone   | varchar    | 11   | 必输   |   员工手机号 |                |
| yuangong_jianjie |  text      |      |非必输  |   员工简介   |                |
| yuangong_b_tx    | varchar    | 128  |非必输  | 员工头像大图  |                |
| yuangong_s_tx    | varchar    | 128  |非必输  | 员工头像小图  |                |
| yuangong_address |  text      |      | 必输   |  员工住址    |                |
| yuangong_extratel| varchar    | 11   | 必输   |  紧急联系人  |                |
| add_time         |   int      | 10   | 必输   |  添加时间    |                |
| upd_time         |   int      | 10   | 必输   |  修改时间    |                |

#### 9.家政服务员工属性表

| 字段标识        |   数据类型 | 长度  | 是否为空|    描述      |     备注                            |
|----------------|----------- |------|---------|-------------|-------------------------------------|
| ygattr_id      |   int      |  6   |  必输   |  主键ID      |                                     |
| yuangong_id    |   int      |  6   |  必输   |  员工ID      |                                     |
| yuangong_name  |  varchar   | 32   |  必输   |  员工姓名     |                                     |
| ygattr_buyway  |   enum     |      |  必输   |  员工购买方式 |  0按时 1按天 2按季度 3按年 4大客户预约 |
| is_flag        |   enum     |      |  必输   |  是否被购买   |      0表示未购买，1表示购买           |
| ygattr_level   |   enum     |      |  必输   |  员工级别     |     0初级，1中级 2中高级 3高级        |


#### 10.员工星级定价表
| 字段标识     | 数据类型 | 长度   | 是否为空 |    描述  |                备注                        |
|-------------|----------|--------|---------|---------|--------------------------------------------|
| star_id     |   int    | 6     |  必输   |   主键ID  |                                            |
| cmt_star    |   enum   | 6     |  必输   |   服务星级|'1','1.5','2','2.5','3','3.5','4','4.5','5' |
| satr_price  |   int    | 6     |  必输   |   星级价格|                                            |
| yuangong_id |   int    | 6     |  必输   |  员工ID   |                                            |
| add_time    | int       |  10  |  必输   |  添加时间 |                                              |
| upd_time    | int       |  10  |  必输   |  修改时间 |                                              |



#### 11.评价表
| 字段标识     | 数据类型   | 长度 |是否为空 |   描述   | 备注                                         |
|-------------|-----------|------|--------|----------|----------------------------------------------|
| cmt_id      | int       |   6  | 必输   |   主键ID  |                                              |
| cmt_msg     | text      |      | 非必输 |  评论内容 |                                              |
| user_id     | mediumint |   8  | 必输   |   会员ID  |                                              |
| goods_id    | mediumint |   8  | 非必输 |   商品ID  |                                              |
| yuangong_id | mediumint |   8  | 非必输 |   员工ID  |                                              |
| cmt_star    | enum      |      | 必输   |  评论星级 | '1','1.5','2','2.5','3','3.5','4','4.5','5'  |
| cmt_sernum  | mediumint |   8  | 必输   |  服务次数 |                                              |
| cmt_zannum  | mediumint |   8  | 必输   |  点赞次数 |                                              |
| is_show     | enum      |      | 必输   |  是否显示 |                     0不显示  1显示            |
| add_time    | int       |  10  | 必输   |  添加时间 |                                              |
| upd_time    | int       |  10  | 必输   |  修改时间 |                                              |


#### 12.评价回复表
| 字段标识     | 数据类型   | 长度 |是否为空 |   描述   | 备注                                         |
|-------------|-----------|------|--------|----------|----------------------------------------------|
| back_id     | int       |   6  | 必输   |   主键ID  |                                              |
| back_msg    | text      |      | 非必输 |  回复内容 |                                              |
| user_id     | mediumint |   8  | 必输   |   会员ID  |                                              |
| cmt_id      | int       |   6  | 必输   |   评论ID  |                                              |
| is_show     | enum      |      | 必输   |  是否显示 |                     0不显示  1显示            |
| add_time    | int       |  10  | 必输   |  添加时间 |                                              |
| upd_time    | int       |  10  | 必输   |  修改时间 |                                              |

#### 13.评价相册表
| 字段标识    | 数据类型  | 长度  | 是否为空 |  描述     |      备注       |
|------------|----------|-------|---------|-----------|-----------------|
| cmt_pho_id | int      | 10    | 必输     | 主键ID    |                 |
| cmt_id     | int      | 10    | 必输     | 评论ID    |                 |
| back_id    | int      |   6   | 必输     | 回复ID    |                 |
| is_show    | enum     |       | 必输     | 是否显示   | 0不显示  1显示  |
| cmt_yimg   | varchar  | 128   | 非必输   | 评论原图   |                |
| cmt_Simg   | varchar  | 128   | 非必输   | 评论小图   |                |


#### 14.招聘表
| 字段标识     | 数据类型  | 长度  | 是否为空 |  描述       |                     备注                               |
|-------------|----------|-------|---------|-------------|--------------------------------------------------------|
| hire_id     | int      | 6     | 必输     | 主键ID      |                                                        |
| hire_office | varchar  | 64    | 必输     | 招聘职位    |                                                        |
| hire_area   | varcahr  | 64    | 必输     | 招聘区域    |                                                        |
| degree_need | enum     |       | 必输     | 学历要求    | 0小学 1中学 2中职 3高职 4大专 5本科 6硕士研究生 7博士研究生|
| work_area   | varchar  | 128   | 必输     | 工作区域    |                                                        |
| work_year   | varchar  | 128   | 必输     | 工作年限    |        0 1-3年  1 3-5年 2 5-10年 3 10年以上             |
| work_exp    | text     |       | 非必输   | 工作经验    |                       相关工作经验                      |
| off_salary  | int      | 11    | 必输     | 薪资待遇    |                                                        |
| hire_person | varchar  | 20    | 必输     | 招聘联系人  |                                                         |
| hire_tel    | varchar  | 11    | 非必输   | 联系电话    |                                                         |
| hire_qq     | varchar  | 16    | 非必输   | 联系QQ      |                                                         |
| hire_wechat | varchar  | 64    | 必输     | 联系微信    |                                                         |
| hire_email  | varchar  | 64    | 非必输   | 简历发送邮箱|                                                          |
| add_time    | int      | 10    | 非必输   | 添加时间    |                                                         |
| upd_time    | int      | 10    | 非必输   | 修改时间    |                                                         |

#### 15.招聘信息表

| 字段标识    | 数据类型  | 长度  | 是否为空 |  描述     |      备注       |
|------------|----------|-------|---------|-----------|-----------------|
| hireinfo_id| int      | 10    | 必输     | 主键ID    |                 |
| hire_id    | int      | 10    | 必输     | 招聘ID    |                 |
| work_need  | text     |       | 非必输   | 岗位要求   |                 |
| work_duty  | text     |       | 非必输   | 岗位职责   |                 |

#### 16.咨询动态表
|      字段标识      |  数据类型  | 长度  | 是否为空   |    描述   | 备注          |
|-------------------|------------|------|-----------|-----------|---------------|
| dyn_id            | int        | 10   |  必输     |   主键ID   |               |
| dyn_title         | varchar    | 128  |  非必输   |  动态标题  |                |
| cat_id            | mediumint  | 8    |  必输     |   分类ID   |                |
| dyn_content       | text       |      |  非必输   |  动态内容  |                |
| dyn_pho_yheadimg  | varchar    | 128  |  非必输   |  动态头配图 |      原图      |
| dyn_pho_ycenterimg| varchar    | 128  |  非必输   |  动态中配图 |      原图      |
| dyn_pho_ybottomimg| varchar    | 128  |  非必输   | 动态底部配图|      原图      |
| dyn_pho_sheadimg  | varchar    | 128  |  非必输   |  动态头配图 |     缩略图     |
| dyn_pho_scenterimg| varchar    | 128  |  非必输   |  动态中配图 |     缩略图     |
| dyn_pho_sbottomimg| varchar    | 128  |  非必输   | 动态底部配图|     缩略图      |
| add_time          | int        | 10   |  必输     |  添加时间   |                |
| upd_time          | int        | 10   |  必输     |  修改时间   |                |

#### 17.动态相册表

|      字段标识  |  数据类型  | 长度  | 是否为空   |    描述   | 备注          |
|---------------|------------|------|-----------|-----------|---------------|
| pho _id       | int        | 10   |  必输     |   主键ID   |               |
| dyn_id        | text       |      |  必输     |  动态ID    |                |
| dyn_pho_yimg  | varchar    | 128  |  必输     |  原图     |             |
| dyn_pho_simg  | varchar    | 128  |  必输     | 缩略图     |           |

#### 18.行业客户表

| 字段标识     | 数据类型 | 长度  |  是否为空  |    描述      | 备注          |
|-------------|----------|------|------------|-------------|----------------|
| bct_id      |   int    | 10   |   必输      | 主键ID     |                 |
| bct_title   | varchar  | 128  |   非必输    | 行业客户标题|                |
| bct_yimg    | varchar  | 128  |   非必输    | 行业客户logo|                |
| bct_simg    | varchar  | 128  |   非必输    | 行业缩略logo|                |
| bct_content |   text   |      |   非必输    | 行业客户简介 |                |
| add_time    |   int    | 10   |   必输      | 添加时间    |                |
| upd_time    |   int    | 10   |   必输      | 修改时间    |                |

#### 19.培训表
| 字段标识     | 数据类型 | 长度  |  是否为空|    描述        | 备注          |
|-------------|----------|------|----------|---------------|----------------|
| train_id    | mediumint| 8    |   必输   | 主键id         |                |
| train_cname | varchar  | 128  |   必输   | 培训课程名称    |                |
|train_teacher| varchar  | 20   |   非必输 | 培训讲师        |                |
| train_price | decimal  | 10,2 |   必输   | 培训需要交的费用 |                |
| train_pnum  | tinyint  | 3    |   非必输 | 培训人数限定     |                |
| train_time  | int      | 11   |   必输   | 培训时间        |                |
| train_way   | enum     |      |   必输   | 培训方式        |0:面授 1:网络授课|
| add_time    | int      | 11   |   必输   | 添加时间        |                |
| upd_time    | int      | 11   |   必输   | 修改时间        |                |

#### 20.培训信息表

| 字段标识     | 数据类型 | 长度  |  是否为空 |    描述         | 备注          |
|-------------|----------|------|----------|-----------------|----------------|
| tinfo_id    | mediumint| 8    | 必输      | 主键id          |                |
| train_id    | smallint | 5    | 必输      | 培训信息所属培训 |                |
| tinfo_item  | varchar  | 128  | 非必输    | 培训条目         |                |
|tinfo_content| text     |      | 非必输    | 培训内容         |                |

#### 22.商品表

|      字段标识    | 数据类型 | 长度  |  是否为空 |    描述         | 备注          |
|-----------------|----------|------|----------|-----------------|----------------|
| goods_id        | int      | 5    | 必输      |                | auto_increment |
| goods_name      | varchar  | 128  | 必输      |                |                |
| goods_price     | decimal  | 10,2 | 必输      |                |                |
| goods_number    | int      | 7    | 必输      |                |                |
| goods_weight    | smallint | 5    | 必输      |                |                |
| goods_introduce | text     |      | 非必输    |                |                |
| cat_id          | smallint | 5    | 必输      |                |                |
| country         | varchar  | 128  | 非必输    |                |                |
| is_rec          | enum     |      | 必输      |                |                |
| goods_b_logo    | varchar  | 128  | 必输      |                |                |
| goods_s_logo    | varchar  | 128  | 必输      |                |                |
| goods_xc1       | varchar  | 128  | 非必输    |                |                |
| goods_s_xc1     | varchar  | 128  | 非必输    |                |                |
| goods_xc2       | varchar  | 128  | 非必输    |                |                |
| goods_s_xc2     | varchar  | 128  | 非必输    |                |                |
| goods_xc3       | varchar  | 128  | 非必输    |                |                |
| goods_s_xc3     | varchar  | 128  | 非必输    |                |                |
| add_time        | int      | 11   | 必输      |                |                |
| upd_time        | int      | 11   | 必输      |                |                |

#### 23.商品属性表

|      字段标识    | 数据类型 | 长度  |  是否为空 |    描述         | 备注          |
|-----------------|----------|------|----------|-----------------|----------------|
| goodtype_id     | int      | 8    | 必输      |                |                |
| goods_id        | int      | 5    | 必输      |                |                |
| goods_name      | varchar  | 128  | 必输      |                |                |
| goods_price     | decimal  | 10,2 | 必输      |                |                |
| goods_number    | int      | 7    | 必输      |                |                |
| goods_weight    | smallint | 5    | 必输      |                |                |
| goods_xc1       | varchar  | 128  | 非必输    |                |                |
| goods_s_xc1     | varchar  | 128  | 非必输    |                |                |
| goods_xc2       | varchar  | 128  | 非必输    |                |                |
| goods_s_xc2     | varchar  | 128  | 非必输    |                |                |
| goods_xc3       | varchar  | 128  | 非必输    |                |                |
| goods_s_xc3     | varchar  | 128  | 非必输    |                |                |
| add_time        | int      | 11   | 必输      |                |                |
| upd_time        | int      | 11   | 必输      |                |                |

#### 24.商品订单关联表
| 字段标识              | 数据类型    | 长度   |  是否为空 |    描述        |    备注      |
|----------------------|-------------|-------|-----------|---------------|--------------|
| id                   | int         | 10    |   必输    | 主键id         |              |
| order_id             | int         | 10    |   必输    | 订单id         |              |
| goods_id             | mediumint   | 8     |   必输    | 商品id         |              |
| goods_price          | decimal     | 10,2  |   必输    | 商品单价        |             |
| goods_number         | tinyint     | 4     |   必输    | 购买单个商品数量 |             |
| goods_total_price    | decimal     | 10,2  |   必输    | 商品小计价格    |              |

#### 25.订单表

| 字段标识              | 数据类型    | 长度  |  是否为空 |    描述      |              备注                 |
|----------------------|-------------|------|----------|-------------|------------------------------------|
| order_id             | int         | 10   |  必输    |  订单ID      |      主键                          |
| order_number         | varchar     | 32   |  必输    |  订单编号    |                                    |
| order_price          | decimal     | 10,2 |  必输    |  订单总价格  |                                    |
| order_post           | enum        |      |  必输    |  快递公司    |            0圆通 1申通 2顺丰        |
| order_pay            | enum        |      |  必输    |  支付方式    |     0支付宝 1微信  2银行卡快捷支付   |
| order_fapiao_title   | enum        |      |  必输    |  发票抬头    |         0个人 1公司                 |
| order_fapiao_company | varchar     | 32   |  必输    |  公司名称    |                                    |
| order_fapiao_content | varchar     | 32   |  必输    |  发票内容    |                                    |
| cgn_id               | int         | 10   |  必输    |  收货人地址  |                                    |
| order_status         | enum        |      |  必输    |  订单状态    | 0未付款 1已付款 2已评价 3已收货      |
| add_time             | int         | 10   |  必输    |  添加时间    |                                    |
| upd_time             | int         | 10   |  必输    |  修改时间    |                                    |


#### 26.地址维护表

| 字段标识      | 数据类型  | 长度  |  是否为空  |    描述      | 备注          |
|--------------|----------|-------|------------|-------------|----------------|
| addr_id      |   int    | 10    |   必输     | 地址ID       |                |
| user_id      | int      | 10    |  必输      | 会员ID       |                |
| comp_address | varchar  | 255   |  非必输    | 单位地址      |               |                
| comd_address | text     |       |  非必输    | 单位详细地址  |                |                
| home_address | varchar  | 255   |  非必输    | 家庭地址      |                |
| homd_address | text     |       |  非必输    | 单位详细地址  |                |
| add_time     | int      | 10    |  必输      | 添加时间     |                |
| upd_time     | int      | 10    |  必输      | 修改时间     |                |

#### 27.图片图标表

| 字段标识  | 数据类型  | 长度  |  是否为空  |    描述      | 备注      |
|----------|----------|-------|------------|-------------|-----------|
| img_id   | mediumint|   8   |    必输    |  图片图标ID  |   主键    |
| img_name | varchar  |  128  |    必输    |   图片图标   |   唯一键  |
| img_img  | char     |  128  |    必输    |   图片图标   |   唯一键  |
| add_time | int      |  11   |    必输    |   添加时间   |           |
| upd_time | int      |  11   |    必输    |   修改时间   |           |

#### 28.收货人表
| 字段标识  | 数据类型  | 长度  |是否为空|    描述      | 备注      |
|----------|----------|-------|--------|-------------|-----------|
| cgn_id   | int      | 10    | 必输   | 主键id       |           |
| user_id  | int      | 10    | 必输   | 会员ID       |           |
| cgn_name | varchar  | 32    | 必输   | 收货人名称    |           |
| cgn_tel  | varchar  | 11    | 必输   | 收货人电话    |           |
| cgn_addr | varchar  | 128   | 必输   | 收货人详细地址 |          |
| cgn_post | varchar  | 10    | 非必输 | 收货人邮编    |           |




