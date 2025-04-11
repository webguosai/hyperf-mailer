<?php

declare(strict_types=1);

namespace Webguosai\HyperfMailer\Facade;

use Hyperf\Context\ApplicationContext;
use Webguosai\HyperfMailer\Contract\MailerInterface;

/**
 * @method static MailerInterface send(string $toMail, string $subject, string $body, string $toName, bool $isHtml)
 */
class Mailer
{
    public static function __callStatic($name, $arguments)
    {
        $factory = ApplicationContext::getContainer()->get(MailerInterface::class);

        return $factory->{$name}(...$arguments);
    }

}