<?php
/**
 * Author: Sergey Grigoriev
 */

class DocxGeneratorTest extends PHPUnit_Framework_TestCase {

    public function testGenerateDocx() {
        $generator = new DocxGenerator();
        $generator->generateDocumentEn();
        $generator->generateDocumentDe();
        $generator->generateDocumentRu();
    }
}
