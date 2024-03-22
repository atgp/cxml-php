<?php

namespace CXmlTest\Validation;

use CXml\Validation\DtdValidator;
use CXml\Validation\Exception\CXmlInvalidException;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class MessageValidatorTest extends TestCase
{
    private $dtdValidator;

    protected function setUp(): void
    {
        $this->dtdValidator = new DtdValidator(__DIR__.'/../../metadata/cxml/dtd/1.2.050');
    }

    public function testValidateSuccess(): void
    {
        $this->expectNotToPerformAssertions();

        $xml = \file_get_contents('tests/metadata/cxml/samples/simple-profile-request.xml');
        $this->dtdValidator->validateAgainstDtd($xml);
    }

    public function testValidateMissingRootNode(): void
    {
        $this->expectException(CXmlInvalidException::class);

        $xml = '<some-node></some-node>';
        $this->dtdValidator->validateAgainstDtd($xml);
    }

    public function testValidateInvalid(): void
    {
        $this->expectException(CXmlInvalidException::class);

        $xml = '<cXML></cXML>';
        $this->dtdValidator->validateAgainstDtd($xml);
    }
}
