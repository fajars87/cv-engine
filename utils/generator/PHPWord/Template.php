<?php
/**
 * PHPWord
 *
 * Copyright (c) 2011 PHPWord
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPWord
 * @package    PHPWord
 * @copyright  Copyright (c) 010 PHPWord
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    Beta 0.6.3, 08.07.2011
 */


/**
 * PHPWord_DocumentProperties
 *
 * @category   PHPWord
 * @package    PHPWord
 * @copyright  Copyright (c) 2009 - 2011 PHPWord (http://www.codeplex.com/PHPWord)
 */
class PHPWord_Template {

    /**
     * ZipArchive
     *
     * @var ZipArchive
     */
    private $_objZip;

    /**
     * Temporary Filename
     *
     * @var string
     */
    private $_tempFileName;

    /**
     * Document XML
     *
     * @var string
     */
    private $_documentXML;

    /**
     * Header1 XML
     * Custom code by Matt Bowden (blenderstyle) 04/12/2011
     *
     * @var string
     */
    private $_header1XML;

    /**
     * Header2 XML
     * Custom code by Matt Bowden (blenderstyle) 04/12/2011
     *
     * @var string
     */
    private $_header2XML;

    /**
     * Header3 XML
     * Custom code by Matt Bowden (blenderstyle) 04/12/2011
     *
     * @var string
     */
    private $_header3XML;

    /**
     * Footer1 XML
     * Custom code by Matt Bowden (blenderstyle) 04/12/2011
     *
     * @var string
     */
    private $_footer1XML;

    /**
     * Footer2 XML
     * Custom code by Matt Bowden (blenderstyle) 04/12/2011
     *
     * @var string
     */
    private $_footer2XML;

    /**
     * Footer3 XML
     * Custom code by Matt Bowden (blenderstyle) 04/12/2011
     *
     * @var string
     */
    private $_footer3XML;

    /**
     * Create a new Template Object
     *
     * @param string $strFilename
     */
    public function __construct($strFilename) {
        $path = dirname($strFilename);
        $this->_tempFileName = $path . DIRECTORY_SEPARATOR . time() . '.docx';

        copy($strFilename, $this->_tempFileName); // Copy the source File to the temp File

        $this->_objZip = new ZipArchive();
        $this->_objZip->open($this->_tempFileName);

        $this->_documentXML = $this->_objZip->getFromName('word/document.xml');
        $this->_header1XML = $this->_objZip->getFromName('word/header1.xml'); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_header2XML = $this->_objZip->getFromName('word/header2.xml'); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_header3XML = $this->_objZip->getFromName('word/header3.xml'); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_footer1XML = $this->_objZip->getFromName('word/footer1.xml'); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_footer2XML = $this->_objZip->getFromName('word/footer2.xml'); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_footer3XML = $this->_objZip->getFromName('word/footer3.xml'); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
    }

    /**
     * Set a Template value
     *
     * @param mixed $search
     * @param mixed $replace
     */
    public function setValue($search, $replace) {
        /**
         * Custom code by 2tamara 22/08/2011
         *
         * For example: <w:t>${test}</w:t>
         * If your Variables look like this, setValue will work fine...
         * But for several reasons your variable could also look like this:
         * <w:t>${</w:t></w:r><w:r w:rsidR="009D2466"><w:t>test</w:t></w:r><w:r><w:t>}</w:t>
         *
         * http://phpword.codeplex.com/discussions/268012
         */

        if (substr($search, 0, 2) !== '${' && substr($search, -1) !== '}') {
            $search = '${' . $search . '}';
        }

        preg_match_all('/\$[^\$]+?}/', $this->_documentXML, $matches);
        for ($i = 0; $i < count($matches[0]); $i++) {
            $matches_new[$i] = preg_replace('/(<[^<]+?>)/', '', $matches[0][$i]);
            $this->_documentXML = str_replace($matches[0][$i], $matches_new[$i], $this->_documentXML);
        }

        preg_match_all('/\$[^\$]+?}/', $this->_header1XML, $matches);
        for ($i = 0; $i < count($matches[0]); $i++) {
            $matches_new[$i] = preg_replace('/(<[^<]+?>)/', '', $matches[0][$i]);
            $this->_header1XML = str_replace($matches[0][$i], $matches_new[$i], $this->_header1XML);
        }

        preg_match_all('/\$[^\$]+?}/', $this->_header2XML, $matches);
        for ($i = 0; $i < count($matches[0]); $i++) {
            $matches_new[$i] = preg_replace('/(<[^<]+?>)/', '', $matches[0][$i]);
            $this->_header2XML = str_replace($matches[0][$i], $matches_new[$i], $this->_header2XML);
        }

        preg_match_all('/\$[^\$]+?}/', $this->_header3XML, $matches);
        for ($i = 0; $i < count($matches[0]); $i++) {
            $matches_new[$i] = preg_replace('/(<[^<]+?>)/', '', $matches[0][$i]);
            $this->_header3XML = str_replace($matches[0][$i], $matches_new[$i], $this->_header3XML);
        }

        preg_match_all('/\$[^\$]+?}/', $this->_footer1XML, $matches);
        for ($i = 0; $i < count($matches[0]); $i++) {
            $matches_new[$i] = preg_replace('/(<[^<]+?>)/', '', $matches[0][$i]);
            $this->_footer1XML = str_replace($matches[0][$i], $matches_new[$i], $this->_footer1XML);
        }

        preg_match_all('/\$[^\$]+?}/', $this->_footer2XML, $matches);
        for ($i = 0; $i < count($matches[0]); $i++) {
            $matches_new[$i] = preg_replace('/(<[^<]+?>)/', '', $matches[0][$i]);
            $this->_footer2XML = str_replace($matches[0][$i], $matches_new[$i], $this->_footer2XML);
        }

        preg_match_all('/\$[^\$]+?}/', $this->_footer3XML, $matches);
        for ($i = 0; $i < count($matches[0]); $i++) {
            $matches_new[$i] = preg_replace('/(<[^<]+?>)/', '', $matches[0][$i]);
            $this->_footer3XML = str_replace($matches[0][$i], $matches_new[$i], $this->_footer3XML);
        }

        $this->_documentXML = str_replace($search, $replace, $this->_documentXML);
        $this->_header1XML = str_replace($search, $replace, $this->_header1XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_header2XML = str_replace($search, $replace, $this->_header2XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_header3XML = str_replace($search, $replace, $this->_header3XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_footer1XML = str_replace($search, $replace, $this->_footer1XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_footer2XML = str_replace($search, $replace, $this->_footer2XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_footer3XML = str_replace($search, $replace, $this->_footer3XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
    }

    /**
     * Save Template
     *
     * @param string $strFilename
     */
    public function save($strFilename) {
        if (file_exists($strFilename)) {
            unlink($strFilename);
        }

        $this->_objZip->addFromString('word/document.xml', $this->_documentXML);
        $this->_objZip->addFromString('word/header1.xml', $this->_header1XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_objZip->addFromString('word/header2.xml', $this->_header2XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_objZip->addFromString('word/header3.xml', $this->_header3XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_objZip->addFromString('word/footer1.xml', $this->_footer1XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_objZip->addFromString('word/footer2.xml', $this->_footer2XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011
        $this->_objZip->addFromString('word/footer3.xml', $this->_footer3XML); // Custom code by Matt Bowden (blenderstyle) 04/12/2011

        // Close zip file
        if ($this->_objZip->close() === false) {
            throw new Exception('Could not close zip file.');
        }

        rename($this->_tempFileName, $strFilename);
    }
}

?>