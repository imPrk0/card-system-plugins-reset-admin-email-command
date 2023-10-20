# 发卡系统重置管理员邮箱插件

> 本插件服务于 [发卡系统](https://github.com/Tai7sy/card-system/issues)。  
> 用于懒人使用命令行快速重置用户的邮箱。


### 使用教程

请按照和本项目一样的目录也就是 `/app/Console/Commands` 里面存入名为 [`ResetAdminEmail.php`](https://github.com/imPrk0/card-system-plugins-reset-admin-email-command/blob/main/app/Console/Commands/ResetAdminEmail.php) 的文件即可。


### 命令说明

> php artisan reset:email <欲被修改的邮箱> [用户 ID]

 - **欲被修改的邮箱**: 你要改成什么邮箱就写在这里
 - **用户 ID**_(可选)_: 你要修改的用户 ID，管理员和默认都是 `1`

比如我要将管理员修改成 `admin@example.com` 那么我可以如此执行：

```sh
> php artisan reset:email admin@example.com
the email of 1 has been set to admin@example.com
```


### 温馨提示

如果有下面的提示，说明你没有正确将文件放入对应目录：

> Command "reset:email" is not defined.  
>
> Did you mean one of these?  
>   xxx

如果提示黄色的警告（如下面那样），如果报错信息中用户 ID 写的是 1，那么你数据库也太牛逼了，不知道你做什么了，都弄没了。
开源版一般只要修改 1，因为非 1 用户无商品编辑权限。

> can't find the user: 1
