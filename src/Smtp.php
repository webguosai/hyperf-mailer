<?php

namespace Webguosai\HyperfMailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Webguosai\HyperfMailer\Contract\MailerInterface;

class Smtp implements MailerInterface
{
    public function __construct(protected array $config)
    {

    }

    /**
     * 发送邮件
     * @param string $toMail 收件人邮箱
     * @param string $subject 主题
     * @param string $body 内容
     * @param array $attachments 附件：文件路径
     * @param bool $isHtml HTML格式
     * @return bool
     * @throws Exception
     */
    public function send(string $toMail, string $subject, string $body, array $attachments = [], bool $isHtml = true): bool
    {
        $mail = new PHPMailer(true);

        // 服务器设置
        $mail->isSMTP(); // 使用 SMTP 服务
        $mail->Host       = $this->config['host']; // 设置 SMTP 服务器地址
        $mail->SMTPAuth   = true; // 启用 SMTP 认证
        $mail->Username   = $this->config['username']; // SMTP 用户名
        $mail->Password   = $this->config['password']; // SMTP 密码
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // 启用加密方式（SMTPS 或 STARTTLS）
        $mail->Port       = $this->config['port']; // SMTP 端口

        // 收件人
        $mail->setFrom($this->config['from']['address'], $this->config['from']['name']); // 发件人邮箱和名称
        $mail->addAddress($toMail, $toMail); // 收件人邮箱和名称
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // 附件文件
        foreach ($attachments as $attachment) {
            $mail->addAttachment($attachment);
        }

        // 内容
        $mail->isHTML($isHtml); // 设置邮件格式为 HTML
        $mail->Subject = $subject; // 邮件主题
        $mail->Body    = $body; // HTML 邮件内容

        return $mail->send();
    }
}