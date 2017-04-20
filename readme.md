# Laravel 框架

----------

## 配置
分别更改```/storage```、```/bootstrap/cache```、```/public``` 权限为777
加入.env文件

----------
## 更改
将```index.php```移动到根目录，更改```index.php```下的代码目录
并且将public目录下的```.htaccess```文件移出
##### 配置https：
修改```.htaccess```：
``` php
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews
    </IfModule>

    RewriteEngine On

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)/$ /$1 [L,R=301]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Https
    RewriteBase /
    RewriteCond %{SERVER_PORT} !^443$
    RewriteRule ^.*$ https://%{SERVER_NAME}%{REQUEST_URI} [L,R=301]
</IfModule>
```
#### 中间件
修改中间件配置，将```csrf```在```web group```中拿出并单独建立csrf中间件
选择性针对部分api post接口进行保护

