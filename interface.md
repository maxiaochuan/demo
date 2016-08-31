##login

####action: host/login
####type:   post
```
params: username
        password
        rememberMe      0 || 1
```
```
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
```
##register

####action: host/api/register
####type:   post
```
params: username
        password
        rePassword
        role            0  => local || 1  => tourist
        country         //中英处理方式待定
        city
        realname
```
```
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
```
##locals

####action: host/locals
####type:   get
```
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
```
##city

####action: host/city
####type:   get
```
return:
{
    title: {
        content-en : "Some people missed their wonderful childhood, some others missed their wonderful youth......no more miss anything wonderful......go travel!"
        content-zh : "有些人，错过了出生；有些人，错过了青春；别再错过余生——为了生命更加精彩，去旅行！"
        img-src : "http://localhost/img/11920.jpg"
    }
    list: [
              {
                  title: 'Lisbon 里斯本',
                  img-src: 'http://localhost/img/123.png'
                  content-en: 'No matter who you are, where are you from, Lisbon has your story......
                  content-zh: '无论你是谁，来自哪里，里斯本都有属于你的故事...... '
              }
          ]
}
```

##message

####action: message/{userToken}
####type:   get
```
return: 
[
    {
        user: 'zhangsan',
        message: 'wegwjgoiwpghwerg'
    }
]
```

##newMessage

####action: newMessage
####type:   post
```
params: token
        target //发送消息目标用户名，如果是自己为空
        message
```
```
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
```



数据库  header

type: 1  => 城市title
