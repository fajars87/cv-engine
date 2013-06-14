<?php
/**
 * Author: Sergey Grigoriev
 */

require_once dirname(__FILE__) . '/../../../sources/Autoloader.php';

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
