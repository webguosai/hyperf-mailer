<?php

declare(strict_types=1);

namespace Webguosai\HyperfMailer;

use Webguosai\HyperfMailer\Contract\MailerInterface;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                MailerInterface::class => MailerFactory::class,
            ],
            'annotations'  => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish'      => [
                [
                    'id'          => 'config',
                    'description' => 'The config for mailer component.',
                    'source'      => __DIR__ . '/../publish/mailer.php',
                    'destination' => BASE_PATH . '/config/autoload/mailer.php',
                ],
            ],
        ];
    }
}
