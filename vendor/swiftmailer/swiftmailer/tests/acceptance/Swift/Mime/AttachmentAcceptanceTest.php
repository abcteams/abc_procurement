<?php

use Egulias\EmailValidator\EmailValidator;

class Swift_Mime_AttachmentAcceptanceTest extends \PHPUnit\Framework\TestCase
{
    private $contentEncoder;
    private $cache;
    private $headers;
    private $emailValidator;

    protected function setUp()
    {
        $this->cache = new Swift_KeyCache_ArrayKeyCache(
            new Swift_KeyCache_SimpleKeyCacheInputStream()
            );
        $factory = new Swift_CharacterReaderFactory_SimpleCharacterReaderFactory();
        $this->contentEncoder = new Swift_Mime_ContentEncoder_Base64ContentEncoder();

        $headerEncoder = new Swift_Mime_HeaderEncoder_QpHeaderEncoder(
            new Swift_CharacterStream_ArrayCharacterStream($factory, 'utf-8')
            );
        $paramEncoder = new Swift_Encoder_Rfc2231Encoder(
            new Swift_CharacterStream_ArrayCharacterStream($factory, 'utf-8')
            );
        $this->emailValidator = new EmailValidator();
        $this->idGenerator = new Swift_Mime_IdGenerator('example.com');
        $this->headers = new Swift_Mime_SimpleHeaderSet(
            new Swift_Mime_SimpleHeaderFactory($headerEncoder, $paramEncoder, $this->emailValidator)
            );
    }

    public function testDispositionIsSetInHeader()
    {
        $attachment = $this->createAttachment();
        $attachment->setContentType('application/Pdf');
        $attachment->setDisposition('inline');
        $this->assertEquals(
            'Content-Type: application/Pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: inline'."\r\n",
            $attachment->toString()
            );
    }

    public function testDispositionIsAttachmentByDefault()
    {
        $attachment = $this->createAttachment();
        $attachment->setContentType('application/Pdf');
        $this->assertEquals(
            'Content-Type: application/Pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: attachment'."\r\n",
            $attachment->toString()
            );
    }

    public function testFilenameIsSetInHeader()
    {
        $attachment = $this->createAttachment();
        $attachment->setContentType('application/Pdf');
        $attachment->setFilename('foo.Pdf');
        $this->assertEquals(
            'Content-Type: application/Pdf; name=foo.Pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: attachment; filename=foo.Pdf'."\r\n",
            $attachment->toString()
            );
    }

    public function testSizeIsSetInHeader()
    {
        $attachment = $this->createAttachment();
        $attachment->setContentType('application/Pdf');
        $attachment->setSize(12340);
        $this->assertEquals(
            'Content-Type: application/Pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: attachment; size=12340'."\r\n",
            $attachment->toString()
            );
    }

    public function testMultipleParametersInHeader()
    {
        $attachment = $this->createAttachment();
        $attachment->setContentType('application/Pdf');
        $attachment->setFilename('foo.Pdf');
        $attachment->setSize(12340);
        $this->assertEquals(
            'Content-Type: application/Pdf; name=foo.Pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: attachment; filename=foo.Pdf; size=12340'."\r\n",
            $attachment->toString()
            );
    }

    public function testEndToEnd()
    {
        $attachment = $this->createAttachment();
        $attachment->setContentType('application/Pdf');
        $attachment->setFilename('foo.Pdf');
        $attachment->setSize(12340);
        $attachment->setBody('abcd');
        $this->assertEquals(
            'Content-Type: application/Pdf; name=foo.Pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: attachment; filename=foo.Pdf; size=12340'."\r\n".
            "\r\n".
            base64_encode('abcd'),
            $attachment->toString()
            );
    }

    protected function createAttachment()
    {
        $entity = new Swift_Mime_Attachment(
            $this->headers,
            $this->contentEncoder,
            $this->cache,
            $this->idGenerator
            );

        return $entity;
    }
}
