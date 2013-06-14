<?php
/**
 * Author: Sergey Grigoriev
 */

abstract class AbstractPage {
    public function printHtmlPage() {
        echo $this->getHtmlPage();
    }

    abstract public function getHtmlPage();
}

