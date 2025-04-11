<?php

declare(strict_types=1);

use Hyperf\Context\ApplicationContext;
use Webguosai\HyperfMailer\Contract\MailerInterface;

if (!function_exists('mailer')) {
    /**
     * 获取APP应用请求实例.
     */
    function mailer(): MailerInterface
    {
        $container = ApplicationContext::getContainer();

        return $container->get(MailerInterface::class);
    }
}