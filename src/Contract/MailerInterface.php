<?php

declare(strict_types=1);

namespace Webguosai\HyperfMailer\Contract;

use PHPMailer\PHPMailer\Exception;

interface MailerInterface
{
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
    public function send(string $toMail, string $subject, string $body, array $attachments = [], bool $isHtml = true): bool;
}