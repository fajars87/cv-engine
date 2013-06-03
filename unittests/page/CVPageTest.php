<?php
/**
 * Author: Sergey Grigoriev
 */

require_once dirname(__FILE__) . '/../../Autoloader.php';

class CVPageTest extends PHPUnit_Framework_TestCase {

    protected function setUp() {
        parent::setUp();
        ob_start();
    }

    protected function tearDown() {
        header_remove();
        parent::tearDown();
    }

    const CV_PAGE_EN_FILE = 'cv_page_en.html';
    const CV_PAGE_DE_FILE = 'cv_page_de.html';
    const CV_PAGE_RU_FILE = 'cv_page_ru.html';

    public function testGetCvPageEn() {
        $cv = new CVPage(Language::LANG_EN);
        $page = $cv->getHtmlPage();

        $expected = file_get_contents(dirname(__FILE__) . '/' . self::CV_PAGE_EN_FILE);

        $this->assertEquals($expected, $page);
    }
}
