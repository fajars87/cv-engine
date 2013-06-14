<?php
/**
 * Author: Sergey Grigoriev
 */

class DocxGeneratorTest extends PHPUnit_Framework_TestCase {

    public function testGenerateDocxEn() {
        $generator = new DocxGenerator();
        $generator->generateDocumentEn();
    }

    public function testGenerateDocxDe() {
        $generator = new DocxGenerator();
        $generator->generateDocumentDe();
    }

    public function testGenerateDocxRu() {
        $generator = new DocxGenerator();
        $generator->generateDocumentRu();
    }
}
