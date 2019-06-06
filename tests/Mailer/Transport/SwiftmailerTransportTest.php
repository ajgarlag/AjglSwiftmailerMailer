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

namespace Ajgl\SwiftmailerMailer\Tests\Mailer\Transport;

use Ajgl\SwiftmailerMailer\Mailer\Transport\SwiftmailerTransport;
use Goetas\Mail\ToSwiftMailParser\MimeParser;
use PHPUnit\Framework\TestCase;
use Swift_Mailer;
use Swift_Message;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\SmtpEnvelope;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\RawMessage;

class SwiftmailerTransportTest extends TestCase
{
    public function testSend(): void
    {
        $swiftMessage = new Swift_Message();

        $mailer = $this->createMock(Swift_Mailer::class);
        $mailer->expects($this->once())->method('send')->with($this->equalTo($swiftMessage));

        $mimeParser = $this->createMock(MimeParser::class);
        $mimeParser->expects($this->once())->method('parseString')->with($this->isType('string'))->willReturn($swiftMessage);

        $transport = new SwiftmailerTransport($mailer, $mimeParser);
        $sentMessage = $transport->send(new RawMessage(''), (new SmtpEnvelope(new Address('foobar@example.com'), [new Address('bazquz@example.net')])));
        $this->assertInstanceOf(SentMessage::class, $sentMessage);
    }
}
