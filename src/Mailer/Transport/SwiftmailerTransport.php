<?php

declare(strict_types=1);

/*
 * AJGL Swift Mailer transport for Symfony Mailer
 *
 * Copyright (c) Antonio J. García Lagar <aj@garcialagar.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ajgl\SwiftmailerMailer\Mailer\Transport;

use Goetas\Mail\ToSwiftMailParser\MimeParser;
use Psr\Log\LoggerInterface;
use Swift_Mailer;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;

class SwiftmailerTransport extends AbstractTransport
{
    private $mailer;
    private $mimeParser;

    public function __construct(Swift_Mailer $mailer, MimeParser $mimeParser, EventDispatcherInterface $dispatcher = null, LoggerInterface $logger = null)
    {
        parent::__construct($dispatcher, $logger);

        $this->mailer = $mailer;
        $this->mimeParser = $mimeParser;
    }

    protected function doSend(SentMessage $message): void
    {
        $swiftMessage = $this->mimeParser->parseString($message->toString(), true);
        $this->mailer->send($swiftMessage);
    }
}
