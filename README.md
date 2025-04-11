<h1 align="center">hyperf-mailer</h1>

<p align="center">
<a href="https://packagist.org/packages/webguosai/hyperf-mailer"><img src="https://poser.pugx.org/webguosai/hyperf-mailer/v/stable" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/webguosai/hyperf-mailer"><img src="https://poser.pugx.org/webguosai/hyperf-mailer/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/webguosai/hyperf-mailer"><img src="https://poser.pugx.org/webguosai/hyperf-mailer/v/unstable" alt="Latest Unstable Version"></a>
<a href="https://packagist.org/packages/webguosai/hyperf-mailer"><img src="https://poser.pugx.org/webguosai/hyperf-mailer/license" alt="License"></a>
</p>


## 简介

这个库只做`smtp`发送

## 运行环境

- php >= 8.1
- composer
- hyperf >= 3.1

## 安装

```bash
composer require webguosai/hyperf-mailer -vvv
```

## 配置

发布配置

```bash
php bin/hyperf.php vendor:publish webguosai/hyperf-mailer
```

配置文件

```php
use function Hyperf\Support\env;

return [
    'host'     => env('MAIL_HOST', 'smtp.exmail.qq.com'),
    'port'     => env('MAIL_PORT', 465),
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],
];
```

## 使用

### 发送邮件

```php
try {
    mailer()->send(string $toMail, string $subject, string $body, array $attachments, bool $isHtml);
} catch (\PHPMailer\PHPMailer\Exception $e) {
    var_dump($e->getMessage());
}
```

### Facade 发送

```php
use Webguosai\HyperfSms\Facade;

Mailer::send(string $toMail, string $subject, string $body, array $attachments, bool $isHtml);
```

### 文档

https://github.com/PHPMailer/PHPMailer?tab=readme-ov-file#a-simple-example

## License

MIT
