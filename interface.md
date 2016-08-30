login

action: host/login
type:   post
params: username
        password
        rememberMe      0 || 1

return: 
{
    result: true,
    data： {
        userToken: token,
    }
}

{
    result: false,
    errors: [
        'password is not correct！'
    ]
}

register

action: host/api/register
type:   post
params: username
        password
        rePassword
        role            0 || 1 
        
        
        0  local
        1  tourist

如果是本地人需要传入以下参数：
params: country         //中英处理方式待定
        city
        realname
        
        
        //注册成功自动登陆
return：
{
   result: true,
    data： {
        userToken: token,
    }
}

{
   result: false,
   errors: [
       'information'
   ]
}

locals

action: host/locals
type:   get

return:
[
    {
        username: 'zhangsan@sina.com'
        realname: '张三',
        city: 'chengdu',
        country: 'zhongguo'
        img-src: 'http://localhost/img/123.png'
    }
]

city

action: host/city
type:   get

return:
[
    {
        title: 'Lisbon 里斯本',
        img-src: 'http://localhost/img/123.png'
        content-en: 'No matter who you are, where are you from, Lisbon has your story......
        content-zh: '无论你是谁，来自哪里，里斯本都有属于你的故事...... '
    }
]


message

action: message/{userToken}
type:   get

return: 
[
    {
        user: 'zhangsan',
        message: 'wegwjgoiwpghwerg'
    }
]


newMessage

action: newMessage
type:   post

params: token
        target //发送消息目标用户名，如果是自己为空
        message
        
return：
{
   result: true
}

{
   result: false,
   errors: [
       'information'
   ]
}