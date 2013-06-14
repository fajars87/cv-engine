<?php
/**
 * Author: Sergey Grigoriev
 */

require_once dirname(__FILE__) . '/../../../sources/Autoloader.php';

class DbTest extends PHPUnit_Framework_TestCase {

    public static function setUpBeforeClass() {
        DbInit::initSqliteDbSchema();
        GrigorievInit::initAllData();
    }

    const LANGUAGE_ID_EN = 1;
    const LANGUAGE_ID_DE = 2;
    const LANGUAGE_ID_RU = 3;

    public function testGetI18nMessagesEn() {
        $db = new Db();
        $db->connect();
        $sg_en = $db->getI18nMessages(self::LANGUAGE_ID_EN);

        $this->assertNotEquals(false, $sg_en);

        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_ONLINE_CV, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_ONLINE_CV]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_DOWNLOAD_PDF_VERSION, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_DOWNLOAD_PDF_VERSION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_PERSONAL_INFORMATION, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_PERSONAL_INFORMATION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_ADDRESS, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_ADDRESS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_PHONE, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_PHONE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_EMAIL, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_EMAIL]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_SKYPE, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_SKYPE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_DATE_OF_BIRTH, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_DATE_OF_BIRTH]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_PLACE_OF_BIRTH, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_PLACE_OF_BIRTH]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_MARITAL_STATUS, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_MARITAL_STATUS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_HOMEPAGE, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_HOMEPAGE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_EMPLOYMENT_HISTORY, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_EMPLOYMENT_HISTORY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_DATE, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_DATE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_COMPANY, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_COMPANY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_POSITION, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_POSITION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_RESPONSIBILITIES, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_RESPONSIBILITIES]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_EDUCATION, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_EDUCATION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_EDUCATIONAL_INSTITUTION, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_EDUCATIONAL_INSTITUTION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_FACULTY, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_FACULTY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_DEPARTMENT, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_DEPARTMENT]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_QUALIFICATION, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_QUALIFICATION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_LANGUAGES, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_LANGUAGES]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_COURSES_AND_CERTIFICATES, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_COURSES_AND_CERTIFICATES]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_TITLE, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_TITLE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_AWARDED, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_AWARDED]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_TECHNICAL_SKILLS, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_TECHNICAL_SKILLS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_TECHNOLOGY, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_TECHNOLOGY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_EXPERIENCE_YEARS, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_EXPERIENCE_YEARS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_PROFICIENCY, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_PROFICIENCY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_PROJECTS, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_PROJECTS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_PROJECT_NAME, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_NAME]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_PROJECT_DESCRIPTION, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_DESCRIPTION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_PROJECT_DURATION, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_DURATION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_PRESENT, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_PRESENT]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_LANGUAGE_CEFR, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_LANGUAGE_CEFR]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_LANGUAGE_CEFR_URL, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_LANGUAGE_CEFR_URL]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_TECHNOLOGIES, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_TECHNOLOGIES]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_OPERATING_SYSTEMS, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_OPERATING_SYSTEMS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievEn::I18N_TRANSLATION_VALUE_URL_DOWNLOAD_PRINTABLE_VERSION . GrigorievCommon::PDF_EXT, $sg_en[GrigorievCommon::I18N_TRANSLATION_ID_URL_DOWNLOAD_PDF_VERSION]->{i18n_translations::VALUE});
    }

    public function testGetI18nMessagesDe() {
        $db = new Db();
        $db->connect();
        $sg_de = $db->getI18nMessages(self::LANGUAGE_ID_DE);

        $this->assertNotEquals(false, $sg_de);

        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_ONLINE_CV, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_ONLINE_CV]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_DOWNLOAD_PDF_VERSION, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_DOWNLOAD_PDF_VERSION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_PERSONAL_INFORMATION, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_PERSONAL_INFORMATION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_ADDRESS, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_ADDRESS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_PHONE, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_PHONE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_EMAIL, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_EMAIL]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_SKYPE, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_SKYPE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_DATE_OF_BIRTH, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_DATE_OF_BIRTH]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_PLACE_OF_BIRTH, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_PLACE_OF_BIRTH]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_MARITAL_STATUS, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_MARITAL_STATUS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_HOMEPAGE, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_HOMEPAGE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_EMPLOYMENT_HISTORY, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_EMPLOYMENT_HISTORY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_DATE, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_DATE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_COMPANY, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_COMPANY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_POSITION, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_POSITION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_RESPONSIBILITIES, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_RESPONSIBILITIES]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_EDUCATION, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_EDUCATION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_EDUCATIONAL_INSTITUTION, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_EDUCATIONAL_INSTITUTION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_FACULTY, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_FACULTY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_DEPARTMENT, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_DEPARTMENT]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_QUALIFICATION, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_QUALIFICATION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_LANGUAGES, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_LANGUAGES]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_COURSES_AND_CERTIFICATES, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_COURSES_AND_CERTIFICATES]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_TITLE, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_TITLE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_AWARDED, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_AWARDED]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_TECHNICAL_SKILLS, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_TECHNICAL_SKILLS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_TECHNOLOGY, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_TECHNOLOGY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_EXPERIENCE_YEARS, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_EXPERIENCE_YEARS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_PROFICIENCY, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_PROFICIENCY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_PROJECTS, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_PROJECTS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_PROJECT_NAME, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_NAME]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_PROJECT_DESCRIPTION, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_DESCRIPTION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_PROJECT_DURATION, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_DURATION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_PRESENT, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_PRESENT]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_LANGUAGE_CEFR, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_LANGUAGE_CEFR]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_LANGUAGE_CEFR_URL, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_LANGUAGE_CEFR_URL]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_TECHNOLOGIES, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_TECHNOLOGIES]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_OPERATING_SYSTEMS, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_OPERATING_SYSTEMS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievDe::I18N_TRANSLATION_VALUE_URL_DOWNLOAD_PRINTABLE_VERSION . GrigorievCommon::PDF_EXT, $sg_de[GrigorievCommon::I18N_TRANSLATION_ID_URL_DOWNLOAD_PDF_VERSION]->{i18n_translations::VALUE});
    }

    public function testGetI18nMessagesRu() {
        $db = new Db();
        $db->connect();
        $sg_ru = $db->getI18nMessages(self::LANGUAGE_ID_RU);

        $this->assertNotEquals(false, $sg_ru);

        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_ONLINE_CV, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_ONLINE_CV]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_DOWNLOAD_PDF_VERSION, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_DOWNLOAD_PDF_VERSION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_PERSONAL_INFORMATION, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_PERSONAL_INFORMATION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_ADDRESS, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_ADDRESS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_PHONE, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_PHONE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_EMAIL, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_EMAIL]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_SKYPE, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_SKYPE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_DATE_OF_BIRTH, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_DATE_OF_BIRTH]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_PLACE_OF_BIRTH, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_PLACE_OF_BIRTH]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_MARITAL_STATUS, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_MARITAL_STATUS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_HOMEPAGE, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_HOMEPAGE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_EMPLOYMENT_HISTORY, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_EMPLOYMENT_HISTORY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_DATE, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_DATE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_COMPANY, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_COMPANY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_POSITION, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_POSITION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_RESPONSIBILITIES, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_RESPONSIBILITIES]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_EDUCATION, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_EDUCATION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_EDUCATIONAL_INSTITUTION, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_EDUCATIONAL_INSTITUTION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_FACULTY, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_FACULTY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_DEPARTMENT, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_DEPARTMENT]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_QUALIFICATION, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_QUALIFICATION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_LANGUAGES, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_LANGUAGES]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_COURSES_AND_CERTIFICATES, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_COURSES_AND_CERTIFICATES]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_TITLE, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_TITLE]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_AWARDED, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_AWARDED]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_TECHNICAL_SKILLS, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_TECHNICAL_SKILLS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_TECHNOLOGY, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_TECHNOLOGY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_EXPERIENCE_YEARS, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_EXPERIENCE_YEARS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_PROFICIENCY, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_PROFICIENCY]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_PROJECTS, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_PROJECTS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_PROJECT_NAME, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_NAME]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_PROJECT_DESCRIPTION, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_DESCRIPTION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_PROJECT_DURATION, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_DURATION]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_PRESENT, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_PRESENT]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_LANGUAGE_CEFR, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_LANGUAGE_CEFR]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_LANGUAGE_CEFR_URL, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_LANGUAGE_CEFR_URL]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_TECHNOLOGIES, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_TECHNOLOGIES]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_OPERATING_SYSTEMS, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_OPERATING_SYSTEMS]->{i18n_translations::VALUE});
        $this->assertEquals(GrigorievRu::I18N_TRANSLATION_VALUE_URL_DOWNLOAD_PRINTABLE_VERSION . GrigorievCommon::PDF_EXT, $sg_ru[GrigorievCommon::I18N_TRANSLATION_ID_URL_DOWNLOAD_PDF_VERSION]->{i18n_translations::VALUE});
    }

///////////////////////////
// EN
///////////////////////////
    const PERSON_ID_EN = 1;

    public function testGetPersonalInformationEn() {
        $db = new Db();
        $db->connect();
        $sg_en = $db->getPersonalInformation(Language::LANG_EN);

        $this->assertNotEquals(false, $sg_en);

        $this->assertEquals(self::PERSON_ID_EN, $sg_en->{persons::PK_ID});
        $this->assertEquals(GrigorievEn::PERSON_NAME, $sg_en->{persons::NAME});
        $this->assertEquals(GrigorievEn::PERSON_JOB_TITLE, $sg_en->{persons::JOB_TITLE});
        $this->assertEquals(GrigorievEn::PERSON_ADDRESS, $sg_en->{persons::ADDRESS});
        $this->assertEquals(GrigorievEn::PERSON_PHONE, $sg_en->{persons::PHONE});
        $this->assertEquals(GrigorievEn::PERSON_EMAIL, $sg_en->{persons::EMAIL});
        $this->assertEquals(GrigorievEn::PERSON_SKYPE, $sg_en->{persons::SKYPE});
        $this->assertEquals(GrigorievEn::PERSON_DATE_OF_BIRTH, $sg_en->{persons::DATE_OF_BIRTH});
        $this->assertEquals(GrigorievEn::PERSON_PLACE_OF_BIRTH, $sg_en->{persons::PLACE_OF_BIRTH});
        $this->assertEquals(GrigorievEn::MARITAL_STATUS_SINGLE, $sg_en->{marital_statuses::STATUS});
        $this->assertEquals(GrigorievEn::PERSON_HOMEPAGE, $sg_en->{persons::HOMEPAGE});
        $this->assertEquals(Config::PERSON_UNIQUE_NAME, $sg_en->{persons::UNIQUE_NAME});
    }

    public function testGetEmploymentHistoryEn() {
        $db = new Db();
        $db->connect();
        $sg_en = $db->getEmploymentHistory(self::PERSON_ID_EN);

        $this->assertNotEquals(false, $sg_en);

        $this->assertEquals(GrigorievEn::EMPLOYER_SAM_SOLUTIONS_BELARUS_COMPANY, $sg_en[0]->{employers::COMPANY});
        $this->assertEquals(GrigorievEn::EMPLOYER_SAM_SOLUTIONS_BELARUS_HOMEPAGE, $sg_en[0]->{employers::HOMEPAGE});
        $this->assertEquals(GrigorievEn::EMPLOYER_SAM_SOLUTIONS_BELARUS_ADDRESS, $sg_en[0]->{employers::ADDRESS});
        $this->assertEquals(GrigorievEn::POSITION_TEAM_LEADER, $sg_en[0]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::EMPLOYER_SAM_SOLUTIONS_BELARUS_TL_RESPONSIBILITIES, $sg_en[0]->{employers::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::EMPLOYER_SAM_SOLUTIONS_BELARUS_TL_START_DATE, $sg_en[0]->{employers::START_DATE});
        $this->assertEquals(GrigorievEn::EMPLOYER_SAM_SOLUTIONS_BELARUS_TL_END_DATE, $sg_en[0]->{employers::END_DATE});

        $this->assertEquals(GrigorievEn::EMPLOYER_SAM_SOLUTIONS_BELARUS_COMPANY, $sg_en[1]->{employers::COMPANY});
        $this->assertEquals(GrigorievEn::EMPLOYER_SAM_SOLUTIONS_BELARUS_HOMEPAGE, $sg_en[1]->{employers::HOMEPAGE});
        $this->assertEquals(GrigorievEn::EMPLOYER_SAM_SOLUTIONS_BELARUS_ADDRESS, $sg_en[1]->{employers::ADDRESS});
        $this->assertEquals(GrigorievEn::POSITION_SENIOR_SOFTWARE_ENGINEER, $sg_en[1]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::EMPLOYER_SAM_SOLUTIONS_BELARUS_SSE_RESPONSIBILITIES, $sg_en[1]->{employers::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::EMPLOYER_SAM_SOLUTIONS_BELARUS_SSE_START_DATE, $sg_en[1]->{employers::START_DATE});
        $this->assertEquals(GrigorievEn::EMPLOYER_SAM_SOLUTIONS_BELARUS_SSE_END_DATE, $sg_en[1]->{employers::END_DATE});

        $this->assertEquals(GrigorievEn::EMPLOYER_BSUIR_CPI_COMPANY, $sg_en[2]->{employers::COMPANY});
        $this->assertEquals(GrigorievEn::EMPLOYER_BSUIR_CPI_HOMEPAGE, $sg_en[2]->{employers::HOMEPAGE});
        $this->assertEquals(GrigorievEn::EMPLOYER_BSUIR_CPI_ADDRESS, $sg_en[2]->{employers::ADDRESS});
        $this->assertEquals(GrigorievEn::POSITION_SOFTWARE_ENGINEER, $sg_en[2]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::EMPLOYER_BSUIR_CPI_RESPONSIBILITIES, $sg_en[2]->{employers::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::EMPLOYER_BSUIR_CPI_START_DATE, $sg_en[2]->{employers::START_DATE});
        $this->assertEquals(GrigorievEn::EMPLOYER_BSUIR_CPI_END_DATE, $sg_en[2]->{employers::END_DATE});
    }

    public function testGetEducationEn() {
        $db = new Db();
        $db->connect();
        $sg_en = $db->getEducation(self::PERSON_ID_EN);

        $this->assertNotEquals(false, $sg_en);

        $this->assertEquals(GrigorievEn::EDUCATION_BSEU_EDUCATIONAL_INSTITUTION, $sg_en[0]->{educations::EDUCATIONAL_INSTITUTION});
        $this->assertEquals(GrigorievEn::EDUCATION_BSEU_ADDRESS, $sg_en[0]->{educations::ADDRESS});
        $this->assertEquals(GrigorievEn::EDUCATION_BSEU_DEPARTMENT, $sg_en[0]->{educations::DEPARTMENT});
        $this->assertEquals(GrigorievEn::EDUCATION_BSEU_FACULTY, $sg_en[0]->{educations::FACULTY});
        $this->assertEquals(GrigorievEn::EDUCATION_BSEU_QUALIFICATION, $sg_en[0]->{educations::QUALIFICATION});
        $this->assertEquals(GrigorievEn::EDUCATION_BSEU_START_DATE, $sg_en[0]->{educations::START_DATE});
        $this->assertEquals(GrigorievEn::EDUCATION_BSEU_END_DATE, $sg_en[0]->{educations::END_DATE});

        $this->assertEquals(GrigorievEn::EDUCATION_BSUIR_EDUCATIONAL_INSTITUTION, $sg_en[1]->{educations::EDUCATIONAL_INSTITUTION});
        $this->assertEquals(GrigorievEn::EDUCATION_BSUIR_ADDRESS, $sg_en[1]->{educations::ADDRESS});
        $this->assertEquals(GrigorievEn::EDUCATION_BSUIR_DEPARTMENT, $sg_en[1]->{educations::DEPARTMENT});
        $this->assertEquals(GrigorievEn::EDUCATION_BSUIR_FACULTY, $sg_en[1]->{educations::FACULTY});
        $this->assertEquals(GrigorievEn::EDUCATION_BSUIR_QUALIFICATION, $sg_en[1]->{educations::QUALIFICATION});
        $this->assertEquals(GrigorievEn::EDUCATION_BSUIR_START_DATE, $sg_en[1]->{educations::START_DATE});
        $this->assertEquals(GrigorievEn::EDUCATION_BSUIR_END_DATE, $sg_en[1]->{educations::END_DATE});
    }

    public function testGetLanguagesEn() {
        $db = new Db();
        $db->connect();
        $sg_en = $db->getLanguages(self::PERSON_ID_EN);

        $this->assertNotEquals(false, $sg_en);

        $this->assertEquals(GrigorievEn::LANGUAGE_ENGLISH, $sg_en[0]->{languages::LANGUAGE});
        $this->assertEquals(GrigorievEn::LANGUAGE_LEVEL_B2, $sg_en[0]->{languages::LEVEL});

        $this->assertEquals(GrigorievEn::LANGUAGE_GERMAN, $sg_en[1]->{languages::LANGUAGE});
        $this->assertEquals(GrigorievEn::LANGUAGE_LEVEL_B1, $sg_en[1]->{languages::LEVEL});

        $this->assertEquals(GrigorievEn::LANGUAGE_RUSSIAN, $sg_en[2]->{languages::LANGUAGE});
        $this->assertEquals(GrigorievEn::LANGUAGE_LEVEL_NATIVE, $sg_en[2]->{languages::LEVEL});

        $this->assertEquals(GrigorievEn::LANGUAGE_BELARUSIAN, $sg_en[3]->{languages::LANGUAGE});
        $this->assertEquals(GrigorievEn::LANGUAGE_LEVEL_NATIVE, $sg_en[3]->{languages::LEVEL});
    }

    public function testCoursesAndCertificatesEn() {
        $db = new Db();
        $db->connect();
        $sg_en = $db->getCoursesAndCertificates(self::PERSON_ID_EN);

        $this->assertNotEquals(false, $sg_en);

        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_B1_TITLE, $sg_en[0]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_B1_AWARDED, $sg_en[0]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_B1_DATE, $sg_en[0]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_PRAGMATIC_TDD_TITLE, $sg_en[1]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_PRAGMATIC_TDD_AWARDED, $sg_en[1]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_PRAGMATIC_TDD_DATE, $sg_en[1]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_TDD_IN_JAVA_TITLE, $sg_en[2]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_TDD_IN_JAVA_AWARDED, $sg_en[2]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_TDD_IN_JAVA_DATE, $sg_en[2]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_AGILE_ENGINEERING_PRACTICES_TITLE, $sg_en[3]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_AGILE_ENGINEERING_PRACTICES_AWARDED, $sg_en[3]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_AGILE_ENGINEERING_PRACTICES_DATE, $sg_en[3]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_A2_TITLE, $sg_en[4]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_A2_AWARDED, $sg_en[4]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_A2_DATE, $sg_en[4]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_IBM_RATIONAL_CLEARCASE_TITLE, $sg_en[5]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_IBM_RATIONAL_CLEARCASE_AWARDED, $sg_en[5]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_IBM_RATIONAL_CLEARCASE_DATE, $sg_en[5]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_ESTIMATIONS_FOR_SOFTWARE_PROJECTS_TITLE, $sg_en[6]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_ESTIMATIONS_FOR_SOFTWARE_PROJECTS_AWARDED, $sg_en[6]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_ESTIMATIONS_FOR_SOFTWARE_PROJECTS_DATE, $sg_en[6]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_SOFTWARE_REQUIREMENTS_DEVELOPMENT_AND_MANAGEMENT_TITLE, $sg_en[7]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_SOFTWARE_REQUIREMENTS_DEVELOPMENT_AND_MANAGEMENT_AWARDED, $sg_en[7]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievEn::COURSE_AND_CERTIFICATE_SOFTWARE_REQUIREMENTS_DEVELOPMENT_AND_MANAGEMENT_DATE, $sg_en[7]->{courses_and_certificates::DATE});
    }

    public function testTechnicalSkillsEn() {
        $db = new Db();
        $db->connect();
        $sg_en = $db->getTechnicalSkills(self::PERSON_ID_EN);

        $this->assertNotEquals(false, $sg_en);

        // Programming Languages
        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_JAVA, $sg_en[0]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_JAVA_EXPERIENCE, $sg_en[0]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[0]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_C, $sg_en[1]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_C_EXPERIENCE, $sg_en[1]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[1]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_CPP, $sg_en[2]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_CPP_EXPERIENCE, $sg_en[2]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[2]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_OBJECTIVE_C, $sg_en[3]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_OBJECTIVE_C_EXPERIENCE, $sg_en[3]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_BASIC, $sg_en[3]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_CSHARP, $sg_en[4]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_CSHARP_EXPERIENCE, $sg_en[4]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_BASIC, $sg_en[4]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_SQL, $sg_en[5]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_SQL_EXPERIENCE, $sg_en[5]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[5]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_XML, $sg_en[6]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_XML_EXPERIENCE, $sg_en[6]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[6]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_PHP, $sg_en[7]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_PHP_EXPERIENCE, $sg_en[7]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[7]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_JAVASCRIPT, $sg_en[8]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::PROGRAMMING_LANGUAGE_JAVASCRIPT_EXPERIENCE, $sg_en[8]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_BASIC, $sg_en[8]->{skill_proficiencies::PROFICIENCY});


        // Technologies
        $this->assertEquals(GrigorievEn::TECHNOLOGY_J2SE, $sg_en[9]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_J2SE_EXPERIENCE, $sg_en[9]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[9]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::TECHNOLOGY_J2EE, $sg_en[10]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_J2EE_EXPERIENCE, $sg_en[10]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[10]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::TECHNOLOGY_HIBERNATE, $sg_en[11]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_HIBERNATE_EXPERIENCE, $sg_en[11]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[11]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::TECHNOLOGY_SPRING_FRAMEWORK, $sg_en[12]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_SPRING_FRAMEWORK_EXPERIENCE, $sg_en[12]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_BASIC, $sg_en[12]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::TECHNOLOGY_SWING, $sg_en[13]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_SWING_EXPERIENCE, $sg_en[13]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[13]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::TECHNOLOGY_APACHE_WICKET, $sg_en[14]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_APACHE_WICKET_EXPERIENCE, $sg_en[14]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[14]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::TECHNOLOGY_JAVA_SERVLETS, $sg_en[15]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_JAVA_SERVLETS_EXPERIENCE, $sg_en[15]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[15]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::TECHNOLOGY_JSP, $sg_en[16]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_JSP_EXPERIENCE, $sg_en[16]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[16]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::TECHNOLOGY_APPLETS, $sg_en[17]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_APPLETS_EXPERIENCE, $sg_en[17]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[17]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::TECHNOLOGY_JUNIT, $sg_en[18]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_JUNIT_EXPERIENCE, $sg_en[18]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[18]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::TECHNOLOGY_JNI, $sg_en[19]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_JNI_EXPERIENCE, $sg_en[19]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[19]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::TECHNOLOGY_SOAP, $sg_en[20]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_SOAP_EXPERIENCE, $sg_en[20]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[20]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::TECHNOLOGY_CPP_STDLIB, $sg_en[21]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_CPP_STDLIB_EXPERIENCE, $sg_en[21]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[21]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::TECHNOLOGY_COCOA_FRAMEWORK, $sg_en[22]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_COCOA_FRAMEWORK_EXPERIENCE, $sg_en[22]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_BASIC, $sg_en[22]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::TECHNOLOGY_CARBONLIB, $sg_en[23]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::TECHNOLOGY_CARBONLIB_EXPERIENCE, $sg_en[23]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_BASIC, $sg_en[23]->{skill_proficiencies::PROFICIENCY});

        // Operating Systems
        $this->assertEquals(GrigorievEn::OPERATING_SYSTEM_MS_WINDOWS, $sg_en[24]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::OPERATING_SYSTEM_MS_WINDOWS_EXPERIENCE, $sg_en[24]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[24]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::OPERATING_SYSTEM_LINUX, $sg_en[25]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::OPERATING_SYSTEM_LINUX_EXPERIENCE, $sg_en[25]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[25]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::OPERATING_SYSTEM_MACOS_X10, $sg_en[26]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::OPERATING_SYSTEM_MACOS_X10_EXPERIENCE, $sg_en[26]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[26]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::OPERATING_SYSTEM_ANDROID, $sg_en[27]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::OPERATING_SYSTEM_ANDROID_EXPERIENCE, $sg_en[27]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_BASIC, $sg_en[27]->{skill_proficiencies::PROFICIENCY});

        // RDBMSs
        $this->assertEquals(GrigorievEn::RDBMS_MSSQL, $sg_en[28]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::RDBMS_MSSQL_EXPERIENCE, $sg_en[28]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[28]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::RDBMS_POSTGRESQL, $sg_en[29]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::RDBMS_POSTGRESQL_EXPERIENCE, $sg_en[29]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[29]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::RDBMS_SQLITE, $sg_en[30]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::RDBMS_SQLITE_EXPERIENCE, $sg_en[30]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[30]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::RDBMS_MYSQL, $sg_en[31]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::RDBMS_MYSQL_EXPERIENCE, $sg_en[31]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[31]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::RDBMS_H2, $sg_en[32]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::RDBMS_H2_EXPERIENCE, $sg_en[32]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[32]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::RDBMS_ORACLE, $sg_en[33]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::RDBMS_ORACLE_EXPERIENCE, $sg_en[33]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_BASIC, $sg_en[33]->{skill_proficiencies::PROFICIENCY});

        // Web & Application Servers
        $this->assertEquals(GrigorievEn::WEB_AND_APPLICATION_SERVER_APACHE_HTTP_SERVER, $sg_en[34]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::WEB_AND_APPLICATION_SERVER_APACHE_HTTP_SERVER_EXPERIENCE, $sg_en[34]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[34]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::WEB_AND_APPLICATION_SERVER_APACHE_TOMCAT, $sg_en[35]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::WEB_AND_APPLICATION_SERVER_APACHE_TOMCAT_EXPERIENCE, $sg_en[35]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[35]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::WEB_AND_APPLICATION_SERVER_JBOSS_AS, $sg_en[36]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::WEB_AND_APPLICATION_SERVER_JBOSS_AS_EXPERIENCE, $sg_en[36]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[36]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::WEB_AND_APPLICATION_SERVER_JETTY, $sg_en[37]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::WEB_AND_APPLICATION_SERVER_JETTY_EXPERIENCE, $sg_en[37]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_BASIC, $sg_en[37]->{skill_proficiencies::PROFICIENCY});

        // CASE & Project Tools
        $this->assertEquals(GrigorievEn::CASE_AND_PROJECT_TOOL_SVN, $sg_en[38]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::CASE_AND_PROJECT_TOOL_SVN_EXPERIENCE, $sg_en[38]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[38]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::CASE_AND_PROJECT_TOOL_IBM_CLEARCASE, $sg_en[39]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::CASE_AND_PROJECT_TOOL_IBM_CLEARCASE_EXPERIENCE, $sg_en[39]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[39]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::CASE_AND_PROJECT_TOOL_CVS, $sg_en[40]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::CASE_AND_PROJECT_TOOL_CVS_EXPERIENCE, $sg_en[40]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[40]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::CASE_AND_PROJECT_TOOL_MS_PROJECT, $sg_en[41]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::CASE_AND_PROJECT_TOOL_MS_PROJECT_EXPERIENCE, $sg_en[41]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[41]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::CASE_AND_PROJECT_TOOL_HUDSON_JENKINS, $sg_en[42]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::CASE_AND_PROJECT_TOOL_HUDSON_JENKINS_EXPERIENCE, $sg_en[42]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[42]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::CASE_AND_PROJECT_TOOL_JIRA, $sg_en[43]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::CASE_AND_PROJECT_TOOL_JIRA_EXPERIENCE, $sg_en[43]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[43]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::CASE_AND_PROJECT_TOOL_BUGZILLA, $sg_en[44]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::CASE_AND_PROJECT_TOOL_BUGZILLA_EXPERIENCE, $sg_en[44]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[44]->{skill_proficiencies::PROFICIENCY});

        // IDEs
        $this->assertEquals(GrigorievEn::IDE_ECLIPSE, $sg_en[45]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::IDE_ECLIPSE_EXPERIENCE, $sg_en[45]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[45]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::IDE_MS_VISUAL_STUDIO, $sg_en[46]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::IDE_MS_VISUAL_STUDIO_EXPERIENCE, $sg_en[46]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[46]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::IDE_INTELLIJ_IDEA, $sg_en[47]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::IDE_INTELLIJ_IDEA_EXPERIENCE, $sg_en[47]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[47]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::IDE_INTELLIJ_PHPSTORM, $sg_en[48]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::IDE_INTELLIJ_PHPSTORM_EXPERIENCE, $sg_en[48]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_EXCELLENT, $sg_en[48]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::IDE_NETBEANS, $sg_en[49]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::IDE_NETBEANS_EXPERIENCE, $sg_en[49]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_GOOD, $sg_en[49]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievEn::IDE_XCODE, $sg_en[50]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievEn::IDE_XCODE_EXPERIENCE, $sg_en[50]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievEn::SKILL_PROFICIENCY_BASIC, $sg_en[50]->{skill_proficiencies::PROFICIENCY});
    }

    public function testProjectsEn() {
        $db = new Db();
        $db->connect();
        $sg_en = $db->getProjects(self::PERSON_ID_EN);

        $this->assertNotEquals(false, $sg_en);

        $this->assertEquals(GrigorievEn::PROJECT_AGENTS_NAME, $sg_en[0]->{projects::NAME});
        $this->assertEquals(GrigorievEn::PROJECT_AGENTS_DESCRIPTION, $sg_en[0]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievEn::POSITION_TEAM_LEADER, $sg_en[0]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::PROJECT_AGENTS_RESPONSIBILITIES, $sg_en[0]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::PROJECT_AGENTS_TECHNOLOGIES, $sg_en[0]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievEn::PROJECT_AGENTS_OPERATING_SYSTEMS, $sg_en[0]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievEn::PROJECT_AGENTS_START_DATE, $sg_en[0]->{projects::START_DATE});
        $this->assertEquals(GrigorievEn::PROJECT_AGENTS_END_DATE, $sg_en[0]->{projects::END_DATE});

        $this->assertEquals(GrigorievEn::PROJECT_SVOM_NAME, $sg_en[1]->{projects::NAME});
        $this->assertEquals(GrigorievEn::PROJECT_SVOM_DESCRIPTION, $sg_en[1]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievEn::POSITION_TEAM_LEADER, $sg_en[1]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::PROJECT_SVOM_RESPONSIBILITIES, $sg_en[1]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::PROJECT_SVOM_TECHNOLOGIES, $sg_en[1]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievEn::PROJECT_SVOM_OPERATING_SYSTEMS, $sg_en[1]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievEn::PROJECT_SVOM_START_DATE, $sg_en[1]->{projects::START_DATE});
        $this->assertEquals(GrigorievEn::PROJECT_SVOM_END_DATE, $sg_en[1]->{projects::END_DATE});

        $this->assertEquals(GrigorievEn::PROJECT_SPM_NAME, $sg_en[2]->{projects::NAME});
        $this->assertEquals(GrigorievEn::PROJECT_SPM_DESCRIPTION, $sg_en[2]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievEn::POSITION_TEAM_LEADER_SENIOR_SOFTWARE_ENGINEER, $sg_en[2]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::PROJECT_SPM_RESPONSIBILITIES, $sg_en[2]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::PROJECT_SPM_TECHNOLOGIES, $sg_en[2]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievEn::PROJECT_SPM_OPERATING_SYSTEMS, $sg_en[2]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievEn::PROJECT_SPM_START_DATE, $sg_en[2]->{projects::START_DATE});
        $this->assertEquals(GrigorievEn::PROJECT_SPM_END_DATE, $sg_en[2]->{projects::END_DATE});

        $this->assertEquals(GrigorievEn::PROJECT_VIOM_NAME, $sg_en[3]->{projects::NAME});
        $this->assertEquals(GrigorievEn::PROJECT_VIOM_DESCRIPTION, $sg_en[3]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievEn::POSITION_TEAM_LEADER_SENIOR_SOFTWARE_ENGINEER, $sg_en[3]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::PROJECT_VIOM_RESPONSIBILITIES, $sg_en[3]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::PROJECT_VIOM_TECHNOLOGIES, $sg_en[3]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievEn::PROJECT_VIOM_OPERATING_SYSTEMS, $sg_en[3]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievEn::PROJECT_VIOM_START_DATE, $sg_en[3]->{projects::START_DATE});
        $this->assertEquals(GrigorievEn::PROJECT_VIOM_END_DATE, $sg_en[3]->{projects::END_DATE});

        $this->assertEquals(GrigorievEn::PROJECT_ZDHCP_NAME, $sg_en[4]->{projects::NAME});
        $this->assertEquals(GrigorievEn::PROJECT_ZDHCP_DESCRIPTION, $sg_en[4]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievEn::POSITION_SENIOR_SOFTWARE_ENGINEER, $sg_en[4]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::PROJECT_ZDHCP_RESPONSIBILITIES, $sg_en[4]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::PROJECT_ZDHCP_TECHNOLOGIES, $sg_en[4]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievEn::PROJECT_ZDHCP_OPERATING_SYSTEMS, $sg_en[4]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievEn::PROJECT_ZDHCP_START_DATE, $sg_en[4]->{projects::START_DATE});
        $this->assertEquals(GrigorievEn::PROJECT_ZDHCP_END_DATE, $sg_en[4]->{projects::END_DATE});

        $this->assertEquals(GrigorievEn::PROJECT_MYSQL_APM_NAME, $sg_en[5]->{projects::NAME});
        $this->assertEquals(GrigorievEn::PROJECT_MYSQL_APM_DESCRIPTION, $sg_en[5]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievEn::POSITION_SOFTWARE_ENGINEER, $sg_en[5]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::PROJECT_MYSQL_APM_RESPONSIBILITIES, $sg_en[5]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::PROJECT_MYSQL_APM_TECHNOLOGIES, $sg_en[5]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievEn::PROJECT_MYSQL_APM_OPERATING_SYSTEMS, $sg_en[5]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievEn::PROJECT_MYSQL_APM_START_DATE, $sg_en[5]->{projects::START_DATE});
        $this->assertEquals(GrigorievEn::PROJECT_MYSQL_APM_END_DATE, $sg_en[5]->{projects::END_DATE});

        $this->assertEquals(GrigorievEn::PROJECT_VAULTDR_NAME, $sg_en[6]->{projects::NAME});
        $this->assertEquals(GrigorievEn::PROJECT_VAULTDR_DESCRIPTION, $sg_en[6]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievEn::POSITION_SOFTWARE_ENGINEER, $sg_en[6]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::PROJECT_VAULTDR_RESPONSIBILITIES, $sg_en[6]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::PROJECT_VAULTDR_TECHNOLOGIES, $sg_en[6]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievEn::PROJECT_VAULTDR_OPERATING_SYSTEMS, $sg_en[6]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievEn::PROJECT_VAULTDR_START_DATE, $sg_en[6]->{projects::START_DATE});
        $this->assertEquals(GrigorievEn::PROJECT_VAULTDR_END_DATE, $sg_en[6]->{projects::END_DATE});

        $this->assertEquals(GrigorievEn::PROJECT_LOTUS_NOTES_APM_NAME, $sg_en[7]->{projects::NAME});
        $this->assertEquals(GrigorievEn::PROJECT_LOTUS_NOTES_APM_DESCRIPTION, $sg_en[7]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievEn::POSITION_SOFTWARE_ENGINEER, $sg_en[7]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::PROJECT_LOTUS_NOTES_APM_RESPONSIBILITIES, $sg_en[7]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::PROJECT_LOTUS_NOTES_APM_TECHNOLOGIES, $sg_en[7]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievEn::PROJECT_LOTUS_NOTES_APM_OPERATING_SYSTEMS, $sg_en[7]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievEn::PROJECT_LOTUS_NOTES_APM_START_DATE, $sg_en[7]->{projects::START_DATE});
        $this->assertEquals(GrigorievEn::PROJECT_LOTUS_NOTES_APM_END_DATE, $sg_en[7]->{projects::END_DATE});

        $this->assertEquals(GrigorievEn::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_NAME, $sg_en[8]->{projects::NAME});
        $this->assertEquals(GrigorievEn::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_DESCRIPTION, $sg_en[8]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievEn::POSITION_SOFTWARE_ENGINEER, $sg_en[8]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_RESPONSIBILITIES, $sg_en[8]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_TECHNOLOGIES, $sg_en[8]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievEn::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_OPERATING_SYSTEMS, $sg_en[8]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievEn::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_START_DATE, $sg_en[8]->{projects::START_DATE});
        $this->assertEquals(GrigorievEn::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_END_DATE, $sg_en[8]->{projects::END_DATE});

        $this->assertEquals(GrigorievEn::PROJECT_OASIS_X10_NAME, $sg_en[9]->{projects::NAME});
        $this->assertEquals(GrigorievEn::PROJECT_OASIS_X10_DESCRIPTION, $sg_en[9]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievEn::POSITION_SOFTWARE_ENGINEER, $sg_en[9]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::PROJECT_OASIS_X10_RESPONSIBILITIES, $sg_en[9]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::PROJECT_OASIS_X10_TECHNOLOGIES, $sg_en[9]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievEn::PROJECT_OASIS_X10_OPERATING_SYSTEMS, $sg_en[9]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievEn::PROJECT_OASIS_X10_START_DATE, $sg_en[9]->{projects::START_DATE});
        $this->assertEquals(GrigorievEn::PROJECT_OASIS_X10_END_DATE, $sg_en[9]->{projects::END_DATE});

        $this->assertEquals(GrigorievEn::PROJECT_CDROMTOOL_NAME, $sg_en[10]->{projects::NAME});
        $this->assertEquals(GrigorievEn::PROJECT_CDROMTOOL_DESCRIPTION, $sg_en[10]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievEn::POSITION_SOFTWARE_ENGINEER, $sg_en[10]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::PROJECT_CDROMTOOL_RESPONSIBILITIES, $sg_en[10]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::PROJECT_CDROMTOOL_TECHNOLOGIES, $sg_en[10]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievEn::PROJECT_CDROMTOOL_OPERATING_SYSTEMS, $sg_en[10]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievEn::PROJECT_CDROMTOOL_START_DATE, $sg_en[10]->{projects::START_DATE});
        $this->assertEquals(GrigorievEn::PROJECT_CDROMTOOL_END_DATE, $sg_en[10]->{projects::END_DATE});

        $this->assertEquals(GrigorievEn::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_NAME, $sg_en[11]->{projects::NAME});
        $this->assertEquals(GrigorievEn::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_DESCRIPTION, $sg_en[11]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievEn::POSITION_SOFTWARE_ENGINEER, $sg_en[11]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_RESPONSIBILITIES, $sg_en[11]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_TECHNOLOGIES, $sg_en[11]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievEn::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_OPERATING_SYSTEMS, $sg_en[11]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievEn::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_START_DATE, $sg_en[11]->{projects::START_DATE});
        $this->assertEquals(GrigorievEn::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_END_DATE, $sg_en[11]->{projects::END_DATE});

        $this->assertEquals(GrigorievEn::PROJECT_OASIS_NAME, $sg_en[12]->{projects::NAME});
        $this->assertEquals(GrigorievEn::PROJECT_OASIS_DESCRIPTION, $sg_en[12]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievEn::POSITION_SOFTWARE_ENGINEER, $sg_en[12]->{positions::POSITION});
        $this->assertEquals(GrigorievEn::PROJECT_OASIS_RESPONSIBILITIES, $sg_en[12]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievEn::PROJECT_OASIS_TECHNOLOGIES, $sg_en[12]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievEn::PROJECT_OASIS_OPERATING_SYSTEMS, $sg_en[12]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievEn::PROJECT_OASIS_START_DATE, $sg_en[12]->{projects::START_DATE});
        $this->assertEquals(GrigorievEn::PROJECT_OASIS_END_DATE, $sg_en[12]->{projects::END_DATE});
    }

///////////////////////////
// DE
///////////////////////////
    const PERSON_ID_DE = 2;

    public function testGetPersonalInformationDe() {
        $db = new Db();
        $db->connect();
        $sg_de = $db->getPersonalInformation(Language::LANG_DE);

        $this->assertNotEquals(false, $sg_de);

        $this->assertEquals(self::PERSON_ID_DE, $sg_de->{persons::PK_ID});
        $this->assertEquals(GrigorievDe::PERSON_NAME, $sg_de->{persons::NAME});
        $this->assertEquals(GrigorievDe::PERSON_JOB_TITLE, $sg_de->{persons::JOB_TITLE});
        $this->assertEquals(GrigorievDe::PERSON_ADDRESS, $sg_de->{persons::ADDRESS});
        $this->assertEquals(GrigorievDe::PERSON_PHONE, $sg_de->{persons::PHONE});
        $this->assertEquals(GrigorievDe::PERSON_EMAIL, $sg_de->{persons::EMAIL});
        $this->assertEquals(GrigorievDe::PERSON_SKYPE, $sg_de->{persons::SKYPE});
        $this->assertEquals(GrigorievDe::PERSON_DATE_OF_BIRTH, $sg_de->{persons::DATE_OF_BIRTH});
        $this->assertEquals(GrigorievDe::PERSON_PLACE_OF_BIRTH, $sg_de->{persons::PLACE_OF_BIRTH});
        $this->assertEquals(GrigorievDe::MARITAL_STATUS_SINGLE, $sg_de->{marital_statuses::STATUS});
        $this->assertEquals(GrigorievDe::PERSON_HOMEPAGE, $sg_de->{persons::HOMEPAGE});
        $this->assertEquals(Config::PERSON_UNIQUE_NAME, $sg_de->{persons::UNIQUE_NAME});
    }

    public function testGetEmploymentHistoryDe() {
        $db = new Db();
        $db->connect();
        $sg_de = $db->getEmploymentHistory(self::PERSON_ID_DE);

        $this->assertNotEquals(false, $sg_de);

        $this->assertEquals(GrigorievDe::EMPLOYER_SAM_SOLUTIONS_BELARUS_COMPANY, $sg_de[0]->{employers::COMPANY});
        $this->assertEquals(GrigorievDe::EMPLOYER_SAM_SOLUTIONS_BELARUS_HOMEPAGE, $sg_de[0]->{employers::HOMEPAGE});
        $this->assertEquals(GrigorievDe::EMPLOYER_SAM_SOLUTIONS_BELARUS_ADDRESS, $sg_de[0]->{employers::ADDRESS});
        $this->assertEquals(GrigorievDe::POSITION_TEAM_LEADER, $sg_de[0]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::EMPLOYER_SAM_SOLUTIONS_BELARUS_TL_RESPONSIBILITIES, $sg_de[0]->{employers::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::EMPLOYER_SAM_SOLUTIONS_BELARUS_TL_START_DATE, $sg_de[0]->{employers::START_DATE});
        $this->assertEquals(GrigorievDe::EMPLOYER_SAM_SOLUTIONS_BELARUS_TL_END_DATE, $sg_de[0]->{employers::END_DATE});

        $this->assertEquals(GrigorievDe::EMPLOYER_SAM_SOLUTIONS_BELARUS_COMPANY, $sg_de[1]->{employers::COMPANY});
        $this->assertEquals(GrigorievDe::EMPLOYER_SAM_SOLUTIONS_BELARUS_HOMEPAGE, $sg_de[1]->{employers::HOMEPAGE});
        $this->assertEquals(GrigorievDe::EMPLOYER_SAM_SOLUTIONS_BELARUS_ADDRESS, $sg_de[1]->{employers::ADDRESS});
        $this->assertEquals(GrigorievDe::POSITION_SENIOR_SOFTWARE_ENGINEER, $sg_de[1]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::EMPLOYER_SAM_SOLUTIONS_BELARUS_SSE_RESPONSIBILITIES, $sg_de[1]->{employers::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::EMPLOYER_SAM_SOLUTIONS_BELARUS_SSE_START_DATE, $sg_de[1]->{employers::START_DATE});
        $this->assertEquals(GrigorievDe::EMPLOYER_SAM_SOLUTIONS_BELARUS_SSE_END_DATE, $sg_de[1]->{employers::END_DATE});

        $this->assertEquals(GrigorievDe::EMPLOYER_BSUIR_CPI_COMPANY, $sg_de[2]->{employers::COMPANY});
        $this->assertEquals(GrigorievDe::EMPLOYER_BSUIR_CPI_HOMEPAGE, $sg_de[2]->{employers::HOMEPAGE});
        $this->assertEquals(GrigorievDe::EMPLOYER_BSUIR_CPI_ADDRESS, $sg_de[2]->{employers::ADDRESS});
        $this->assertEquals(GrigorievDe::POSITION_SOFTWARE_ENGINEER, $sg_de[2]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::EMPLOYER_BSUIR_CPI_RESPONSIBILITIES, $sg_de[2]->{employers::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::EMPLOYER_BSUIR_CPI_START_DATE, $sg_de[2]->{employers::START_DATE});
        $this->assertEquals(GrigorievDe::EMPLOYER_BSUIR_CPI_END_DATE, $sg_de[2]->{employers::END_DATE});
    }

    public function testGetEducationDe() {
        $db = new Db();
        $db->connect();
        $sg_de = $db->getEducation(self::PERSON_ID_DE);

        $this->assertNotEquals(false, $sg_de);

        $this->assertEquals(GrigorievDe::EDUCATION_BSEU_EDUCATIONAL_INSTITUTION, $sg_de[0]->{educations::EDUCATIONAL_INSTITUTION});
        $this->assertEquals(GrigorievDe::EDUCATION_BSEU_ADDRESS, $sg_de[0]->{educations::ADDRESS});
        $this->assertEquals(GrigorievDe::EDUCATION_BSEU_DEPARTMENT, $sg_de[0]->{educations::DEPARTMENT});
        $this->assertEquals(GrigorievDe::EDUCATION_BSEU_FACULTY, $sg_de[0]->{educations::FACULTY});
        $this->assertEquals(GrigorievDe::EDUCATION_BSEU_QUALIFICATION, $sg_de[0]->{educations::QUALIFICATION});
        $this->assertEquals(GrigorievDe::EDUCATION_BSEU_START_DATE, $sg_de[0]->{educations::START_DATE});
        $this->assertEquals(GrigorievDe::EDUCATION_BSEU_END_DATE, $sg_de[0]->{educations::END_DATE});

        $this->assertEquals(GrigorievDe::EDUCATION_BSUIR_EDUCATIONAL_INSTITUTION, $sg_de[1]->{educations::EDUCATIONAL_INSTITUTION});
        $this->assertEquals(GrigorievDe::EDUCATION_BSUIR_ADDRESS, $sg_de[1]->{educations::ADDRESS});
        $this->assertEquals(GrigorievDe::EDUCATION_BSUIR_DEPARTMENT, $sg_de[1]->{educations::DEPARTMENT});
        $this->assertEquals(GrigorievDe::EDUCATION_BSUIR_FACULTY, $sg_de[1]->{educations::FACULTY});
        $this->assertEquals(GrigorievDe::EDUCATION_BSUIR_QUALIFICATION, $sg_de[1]->{educations::QUALIFICATION});
        $this->assertEquals(GrigorievDe::EDUCATION_BSUIR_START_DATE, $sg_de[1]->{educations::START_DATE});
        $this->assertEquals(GrigorievDe::EDUCATION_BSUIR_END_DATE, $sg_de[1]->{educations::END_DATE});
    }

    public function testGetLanguagesDe() {
        $db = new Db();
        $db->connect();
        $sg_de = $db->getLanguages(self::PERSON_ID_DE);

        $this->assertNotEquals(false, $sg_de);

        $this->assertEquals(GrigorievDe::LANGUAGE_ENGLISH, $sg_de[0]->{languages::LANGUAGE});
        $this->assertEquals(GrigorievDe::LANGUAGE_LEVEL_B2, $sg_de[0]->{languages::LEVEL});

        $this->assertEquals(GrigorievDe::LANGUAGE_GERMAN, $sg_de[1]->{languages::LANGUAGE});
        $this->assertEquals(GrigorievDe::LANGUAGE_LEVEL_B1, $sg_de[1]->{languages::LEVEL});

        $this->assertEquals(GrigorievDe::LANGUAGE_RUSSIAN, $sg_de[2]->{languages::LANGUAGE});
        $this->assertEquals(GrigorievDe::LANGUAGE_LEVEL_NATIVE, $sg_de[2]->{languages::LEVEL});

        $this->assertEquals(GrigorievDe::LANGUAGE_BELARUSIAN, $sg_de[3]->{languages::LANGUAGE});
        $this->assertEquals(GrigorievDe::LANGUAGE_LEVEL_NATIVE, $sg_de[3]->{languages::LEVEL});
    }

    public function testCoursesAndCertificatesDe() {
        $db = new Db();
        $db->connect();
        $sg_de = $db->getCoursesAndCertificates(self::PERSON_ID_DE);

        $this->assertNotEquals(false, $sg_de);

        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_B1_TITLE, $sg_de[0]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_B1_AWARDED, $sg_de[0]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_B1_DATE, $sg_de[0]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_PRAGMATIC_TDD_TITLE, $sg_de[1]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_PRAGMATIC_TDD_AWARDED, $sg_de[1]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_PRAGMATIC_TDD_DATE, $sg_de[1]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_TDD_IN_JAVA_TITLE, $sg_de[2]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_TDD_IN_JAVA_AWARDED, $sg_de[2]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_TDD_IN_JAVA_DATE, $sg_de[2]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_AGILE_ENGINEERING_PRACTICES_TITLE, $sg_de[3]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_AGILE_ENGINEERING_PRACTICES_AWARDED, $sg_de[3]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_AGILE_ENGINEERING_PRACTICES_DATE, $sg_de[3]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_A2_TITLE, $sg_de[4]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_A2_AWARDED, $sg_de[4]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_A2_DATE, $sg_de[4]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_IBM_RATIONAL_CLEARCASE_TITLE, $sg_de[5]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_IBM_RATIONAL_CLEARCASE_AWARDED, $sg_de[5]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_IBM_RATIONAL_CLEARCASE_DATE, $sg_de[5]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_ESTIMATIONS_FOR_SOFTWARE_PROJECTS_TITLE, $sg_de[6]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_ESTIMATIONS_FOR_SOFTWARE_PROJECTS_AWARDED, $sg_de[6]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_ESTIMATIONS_FOR_SOFTWARE_PROJECTS_DATE, $sg_de[6]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_SOFTWARE_REQUIREMENTS_DEVELOPMENT_AND_MANAGEMENT_TITLE, $sg_de[7]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_SOFTWARE_REQUIREMENTS_DEVELOPMENT_AND_MANAGEMENT_AWARDED, $sg_de[7]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievDe::COURSE_AND_CERTIFICATE_SOFTWARE_REQUIREMENTS_DEVELOPMENT_AND_MANAGEMENT_DATE, $sg_de[7]->{courses_and_certificates::DATE});
    }

    public function testTechnicalSkillsDe() {
        $db = new Db();
        $db->connect();
        $sg_de = $db->getTechnicalSkills(self::PERSON_ID_DE);

        $this->assertNotEquals(false, $sg_de);

        // Programming Languages
        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_JAVA, $sg_de[0]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_JAVA_EXPERIENCE, $sg_de[0]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[0]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_C, $sg_de[1]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_C_EXPERIENCE, $sg_de[1]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[1]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_CPP, $sg_de[2]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_CPP_EXPERIENCE, $sg_de[2]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[2]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_OBJECTIVE_C, $sg_de[3]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_OBJECTIVE_C_EXPERIENCE, $sg_de[3]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_BASIC, $sg_de[3]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_CSHARP, $sg_de[4]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_CSHARP_EXPERIENCE, $sg_de[4]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_BASIC, $sg_de[4]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_SQL, $sg_de[5]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_SQL_EXPERIENCE, $sg_de[5]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[5]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_XML, $sg_de[6]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_XML_EXPERIENCE, $sg_de[6]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[6]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_PHP, $sg_de[7]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_PHP_EXPERIENCE, $sg_de[7]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[7]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_JAVASCRIPT, $sg_de[8]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::PROGRAMMING_LANGUAGE_JAVASCRIPT_EXPERIENCE, $sg_de[8]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_BASIC, $sg_de[8]->{skill_proficiencies::PROFICIENCY});


        // Technologies
        $this->assertEquals(GrigorievDe::TECHNOLOGY_J2SE, $sg_de[9]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_J2SE_EXPERIENCE, $sg_de[9]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[9]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::TECHNOLOGY_J2EE, $sg_de[10]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_J2EE_EXPERIENCE, $sg_de[10]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[10]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::TECHNOLOGY_HIBERNATE, $sg_de[11]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_HIBERNATE_EXPERIENCE, $sg_de[11]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[11]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::TECHNOLOGY_SPRING_FRAMEWORK, $sg_de[12]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_SPRING_FRAMEWORK_EXPERIENCE, $sg_de[12]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_BASIC, $sg_de[12]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::TECHNOLOGY_SWING, $sg_de[13]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_SWING_EXPERIENCE, $sg_de[13]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[13]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::TECHNOLOGY_APACHE_WICKET, $sg_de[14]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_APACHE_WICKET_EXPERIENCE, $sg_de[14]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[14]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::TECHNOLOGY_JAVA_SERVLETS, $sg_de[15]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_JAVA_SERVLETS_EXPERIENCE, $sg_de[15]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[15]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::TECHNOLOGY_JSP, $sg_de[16]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_JSP_EXPERIENCE, $sg_de[16]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[16]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::TECHNOLOGY_APPLETS, $sg_de[17]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_APPLETS_EXPERIENCE, $sg_de[17]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[17]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::TECHNOLOGY_JUNIT, $sg_de[18]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_JUNIT_EXPERIENCE, $sg_de[18]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[18]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::TECHNOLOGY_JNI, $sg_de[19]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_JNI_EXPERIENCE, $sg_de[19]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[19]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::TECHNOLOGY_SOAP, $sg_de[20]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_SOAP_EXPERIENCE, $sg_de[20]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[20]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::TECHNOLOGY_CPP_STDLIB, $sg_de[21]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_CPP_STDLIB_EXPERIENCE, $sg_de[21]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[21]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::TECHNOLOGY_COCOA_FRAMEWORK, $sg_de[22]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_COCOA_FRAMEWORK_EXPERIENCE, $sg_de[22]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_BASIC, $sg_de[22]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::TECHNOLOGY_CARBONLIB, $sg_de[23]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::TECHNOLOGY_CARBONLIB_EXPERIENCE, $sg_de[23]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_BASIC, $sg_de[23]->{skill_proficiencies::PROFICIENCY});

        // Operating Systems
        $this->assertEquals(GrigorievDe::OPERATING_SYSTEM_MS_WINDOWS, $sg_de[24]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::OPERATING_SYSTEM_MS_WINDOWS_EXPERIENCE, $sg_de[24]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[24]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::OPERATING_SYSTEM_LINUX, $sg_de[25]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::OPERATING_SYSTEM_LINUX_EXPERIENCE, $sg_de[25]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[25]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::OPERATING_SYSTEM_MACOS_X10, $sg_de[26]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::OPERATING_SYSTEM_MACOS_X10_EXPERIENCE, $sg_de[26]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[26]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::OPERATING_SYSTEM_ANDROID, $sg_de[27]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::OPERATING_SYSTEM_ANDROID_EXPERIENCE, $sg_de[27]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_BASIC, $sg_de[27]->{skill_proficiencies::PROFICIENCY});

        // RDBMSs
        $this->assertEquals(GrigorievDe::RDBMS_MSSQL, $sg_de[28]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::RDBMS_MSSQL_EXPERIENCE, $sg_de[28]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[28]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::RDBMS_POSTGRESQL, $sg_de[29]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::RDBMS_POSTGRESQL_EXPERIENCE, $sg_de[29]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[29]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::RDBMS_SQLITE, $sg_de[30]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::RDBMS_SQLITE_EXPERIENCE, $sg_de[30]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[30]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::RDBMS_MYSQL, $sg_de[31]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::RDBMS_MYSQL_EXPERIENCE, $sg_de[31]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[31]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::RDBMS_H2, $sg_de[32]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::RDBMS_H2_EXPERIENCE, $sg_de[32]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[32]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::RDBMS_ORACLE, $sg_de[33]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::RDBMS_ORACLE_EXPERIENCE, $sg_de[33]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_BASIC, $sg_de[33]->{skill_proficiencies::PROFICIENCY});

        // Web & Application Servers
        $this->assertEquals(GrigorievDe::WEB_AND_APPLICATION_SERVER_APACHE_HTTP_SERVER, $sg_de[34]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::WEB_AND_APPLICATION_SERVER_APACHE_HTTP_SERVER_EXPERIENCE, $sg_de[34]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[34]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::WEB_AND_APPLICATION_SERVER_APACHE_TOMCAT, $sg_de[35]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::WEB_AND_APPLICATION_SERVER_APACHE_TOMCAT_EXPERIENCE, $sg_de[35]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[35]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::WEB_AND_APPLICATION_SERVER_JBOSS_AS, $sg_de[36]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::WEB_AND_APPLICATION_SERVER_JBOSS_AS_EXPERIENCE, $sg_de[36]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[36]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::WEB_AND_APPLICATION_SERVER_JETTY, $sg_de[37]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::WEB_AND_APPLICATION_SERVER_JETTY_EXPERIENCE, $sg_de[37]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_BASIC, $sg_de[37]->{skill_proficiencies::PROFICIENCY});

        // CASE & Project Tools
        $this->assertEquals(GrigorievDe::CASE_AND_PROJECT_TOOL_SVN, $sg_de[38]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::CASE_AND_PROJECT_TOOL_SVN_EXPERIENCE, $sg_de[38]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[38]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::CASE_AND_PROJECT_TOOL_IBM_CLEARCASE, $sg_de[39]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::CASE_AND_PROJECT_TOOL_IBM_CLEARCASE_EXPERIENCE, $sg_de[39]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[39]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::CASE_AND_PROJECT_TOOL_CVS, $sg_de[40]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::CASE_AND_PROJECT_TOOL_CVS_EXPERIENCE, $sg_de[40]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[40]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::CASE_AND_PROJECT_TOOL_MS_PROJECT, $sg_de[41]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::CASE_AND_PROJECT_TOOL_MS_PROJECT_EXPERIENCE, $sg_de[41]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[41]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::CASE_AND_PROJECT_TOOL_HUDSON_JENKINS, $sg_de[42]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::CASE_AND_PROJECT_TOOL_HUDSON_JENKINS_EXPERIENCE, $sg_de[42]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[42]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::CASE_AND_PROJECT_TOOL_JIRA, $sg_de[43]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::CASE_AND_PROJECT_TOOL_JIRA_EXPERIENCE, $sg_de[43]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[43]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::CASE_AND_PROJECT_TOOL_BUGZILLA, $sg_de[44]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::CASE_AND_PROJECT_TOOL_BUGZILLA_EXPERIENCE, $sg_de[44]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[44]->{skill_proficiencies::PROFICIENCY});

        // IDEs
        $this->assertEquals(GrigorievDe::IDE_ECLIPSE, $sg_de[45]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::IDE_ECLIPSE_EXPERIENCE, $sg_de[45]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[45]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::IDE_MS_VISUAL_STUDIO, $sg_de[46]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::IDE_MS_VISUAL_STUDIO_EXPERIENCE, $sg_de[46]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[46]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::IDE_INTELLIJ_IDEA, $sg_de[47]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::IDE_INTELLIJ_IDEA_EXPERIENCE, $sg_de[47]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[47]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::IDE_INTELLIJ_PHPSTORM, $sg_de[48]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::IDE_INTELLIJ_PHPSTORM_EXPERIENCE, $sg_de[48]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_EXCELLENT, $sg_de[48]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::IDE_NETBEANS, $sg_de[49]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::IDE_NETBEANS_EXPERIENCE, $sg_de[49]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_GOOD, $sg_de[49]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievDe::IDE_XCODE, $sg_de[50]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievDe::IDE_XCODE_EXPERIENCE, $sg_de[50]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievDe::SKILL_PROFICIENCY_BASIC, $sg_de[50]->{skill_proficiencies::PROFICIENCY});
    }

    public function testProjectsDe() {
        $db = new Db();
        $db->connect();
        $sg_de = $db->getProjects(self::PERSON_ID_DE);

        $this->assertNotEquals(false, $sg_de);

        $this->assertEquals(GrigorievDe::PROJECT_AGENTS_NAME, $sg_de[0]->{projects::NAME});
        $this->assertEquals(GrigorievDe::PROJECT_AGENTS_DESCRIPTION, $sg_de[0]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievDe::POSITION_TEAM_LEADER, $sg_de[0]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::PROJECT_AGENTS_RESPONSIBILITIES, $sg_de[0]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::PROJECT_AGENTS_TECHNOLOGIES, $sg_de[0]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievDe::PROJECT_AGENTS_OPERATING_SYSTEMS, $sg_de[0]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievDe::PROJECT_AGENTS_START_DATE, $sg_de[0]->{projects::START_DATE});
        $this->assertEquals(GrigorievDe::PROJECT_AGENTS_END_DATE, $sg_de[0]->{projects::END_DATE});

        $this->assertEquals(GrigorievDe::PROJECT_SVOM_NAME, $sg_de[1]->{projects::NAME});
        $this->assertEquals(GrigorievDe::PROJECT_SVOM_DESCRIPTION, $sg_de[1]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievDe::POSITION_TEAM_LEADER, $sg_de[1]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::PROJECT_SVOM_RESPONSIBILITIES, $sg_de[1]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::PROJECT_SVOM_TECHNOLOGIES, $sg_de[1]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievDe::PROJECT_SVOM_OPERATING_SYSTEMS, $sg_de[1]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievDe::PROJECT_SVOM_START_DATE, $sg_de[1]->{projects::START_DATE});
        $this->assertEquals(GrigorievDe::PROJECT_SVOM_END_DATE, $sg_de[1]->{projects::END_DATE});

        $this->assertEquals(GrigorievDe::PROJECT_SPM_NAME, $sg_de[2]->{projects::NAME});
        $this->assertEquals(GrigorievDe::PROJECT_SPM_DESCRIPTION, $sg_de[2]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievDe::POSITION_TEAM_LEADER_SENIOR_SOFTWARE_ENGINEER, $sg_de[2]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::PROJECT_SPM_RESPONSIBILITIES, $sg_de[2]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::PROJECT_SPM_TECHNOLOGIES, $sg_de[2]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievDe::PROJECT_SPM_OPERATING_SYSTEMS, $sg_de[2]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievDe::PROJECT_SPM_START_DATE, $sg_de[2]->{projects::START_DATE});
        $this->assertEquals(GrigorievDe::PROJECT_SPM_END_DATE, $sg_de[2]->{projects::END_DATE});

        $this->assertEquals(GrigorievDe::PROJECT_VIOM_NAME, $sg_de[3]->{projects::NAME});
        $this->assertEquals(GrigorievDe::PROJECT_VIOM_DESCRIPTION, $sg_de[3]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievDe::POSITION_TEAM_LEADER_SENIOR_SOFTWARE_ENGINEER, $sg_de[3]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::PROJECT_VIOM_RESPONSIBILITIES, $sg_de[3]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::PROJECT_VIOM_TECHNOLOGIES, $sg_de[3]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievDe::PROJECT_VIOM_OPERATING_SYSTEMS, $sg_de[3]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievDe::PROJECT_VIOM_START_DATE, $sg_de[3]->{projects::START_DATE});
        $this->assertEquals(GrigorievDe::PROJECT_VIOM_END_DATE, $sg_de[3]->{projects::END_DATE});

        $this->assertEquals(GrigorievDe::PROJECT_ZDHCP_NAME, $sg_de[4]->{projects::NAME});
        $this->assertEquals(GrigorievDe::PROJECT_ZDHCP_DESCRIPTION, $sg_de[4]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievDe::POSITION_SENIOR_SOFTWARE_ENGINEER, $sg_de[4]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::PROJECT_ZDHCP_RESPONSIBILITIES, $sg_de[4]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::PROJECT_ZDHCP_TECHNOLOGIES, $sg_de[4]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievDe::PROJECT_ZDHCP_OPERATING_SYSTEMS, $sg_de[4]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievDe::PROJECT_ZDHCP_START_DATE, $sg_de[4]->{projects::START_DATE});
        $this->assertEquals(GrigorievDe::PROJECT_ZDHCP_END_DATE, $sg_de[4]->{projects::END_DATE});

        $this->assertEquals(GrigorievDe::PROJECT_MYSQL_APM_NAME, $sg_de[5]->{projects::NAME});
        $this->assertEquals(GrigorievDe::PROJECT_MYSQL_APM_DESCRIPTION, $sg_de[5]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievDe::POSITION_SOFTWARE_ENGINEER, $sg_de[5]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::PROJECT_MYSQL_APM_RESPONSIBILITIES, $sg_de[5]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::PROJECT_MYSQL_APM_TECHNOLOGIES, $sg_de[5]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievDe::PROJECT_MYSQL_APM_OPERATING_SYSTEMS, $sg_de[5]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievDe::PROJECT_MYSQL_APM_START_DATE, $sg_de[5]->{projects::START_DATE});
        $this->assertEquals(GrigorievDe::PROJECT_MYSQL_APM_END_DATE, $sg_de[5]->{projects::END_DATE});

        $this->assertEquals(GrigorievDe::PROJECT_VAULTDR_NAME, $sg_de[6]->{projects::NAME});
        $this->assertEquals(GrigorievDe::PROJECT_VAULTDR_DESCRIPTION, $sg_de[6]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievDe::POSITION_SOFTWARE_ENGINEER, $sg_de[6]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::PROJECT_VAULTDR_RESPONSIBILITIES, $sg_de[6]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::PROJECT_VAULTDR_TECHNOLOGIES, $sg_de[6]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievDe::PROJECT_VAULTDR_OPERATING_SYSTEMS, $sg_de[6]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievDe::PROJECT_VAULTDR_START_DATE, $sg_de[6]->{projects::START_DATE});
        $this->assertEquals(GrigorievDe::PROJECT_VAULTDR_END_DATE, $sg_de[6]->{projects::END_DATE});

        $this->assertEquals(GrigorievDe::PROJECT_LOTUS_NOTES_APM_NAME, $sg_de[7]->{projects::NAME});
        $this->assertEquals(GrigorievDe::PROJECT_LOTUS_NOTES_APM_DESCRIPTION, $sg_de[7]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievDe::POSITION_SOFTWARE_ENGINEER, $sg_de[7]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::PROJECT_LOTUS_NOTES_APM_RESPONSIBILITIES, $sg_de[7]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::PROJECT_LOTUS_NOTES_APM_TECHNOLOGIES, $sg_de[7]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievDe::PROJECT_LOTUS_NOTES_APM_OPERATING_SYSTEMS, $sg_de[7]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievDe::PROJECT_LOTUS_NOTES_APM_START_DATE, $sg_de[7]->{projects::START_DATE});
        $this->assertEquals(GrigorievDe::PROJECT_LOTUS_NOTES_APM_END_DATE, $sg_de[7]->{projects::END_DATE});

        $this->assertEquals(GrigorievDe::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_NAME, $sg_de[8]->{projects::NAME});
        $this->assertEquals(GrigorievDe::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_DESCRIPTION, $sg_de[8]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievDe::POSITION_SOFTWARE_ENGINEER, $sg_de[8]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_RESPONSIBILITIES, $sg_de[8]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_TECHNOLOGIES, $sg_de[8]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievDe::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_OPERATING_SYSTEMS, $sg_de[8]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievDe::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_START_DATE, $sg_de[8]->{projects::START_DATE});
        $this->assertEquals(GrigorievDe::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_END_DATE, $sg_de[8]->{projects::END_DATE});

        $this->assertEquals(GrigorievDe::PROJECT_OASIS_X10_NAME, $sg_de[9]->{projects::NAME});
        $this->assertEquals(GrigorievDe::PROJECT_OASIS_X10_DESCRIPTION, $sg_de[9]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievDe::POSITION_SOFTWARE_ENGINEER, $sg_de[9]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::PROJECT_OASIS_X10_RESPONSIBILITIES, $sg_de[9]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::PROJECT_OASIS_X10_TECHNOLOGIES, $sg_de[9]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievDe::PROJECT_OASIS_X10_OPERATING_SYSTEMS, $sg_de[9]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievDe::PROJECT_OASIS_X10_START_DATE, $sg_de[9]->{projects::START_DATE});
        $this->assertEquals(GrigorievDe::PROJECT_OASIS_X10_END_DATE, $sg_de[9]->{projects::END_DATE});

        $this->assertEquals(GrigorievDe::PROJECT_CDROMTOOL_NAME, $sg_de[10]->{projects::NAME});
        $this->assertEquals(GrigorievDe::PROJECT_CDROMTOOL_DESCRIPTION, $sg_de[10]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievDe::POSITION_SOFTWARE_ENGINEER, $sg_de[10]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::PROJECT_CDROMTOOL_RESPONSIBILITIES, $sg_de[10]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::PROJECT_CDROMTOOL_TECHNOLOGIES, $sg_de[10]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievDe::PROJECT_CDROMTOOL_OPERATING_SYSTEMS, $sg_de[10]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievDe::PROJECT_CDROMTOOL_START_DATE, $sg_de[10]->{projects::START_DATE});
        $this->assertEquals(GrigorievDe::PROJECT_CDROMTOOL_END_DATE, $sg_de[10]->{projects::END_DATE});

        $this->assertEquals(GrigorievDe::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_NAME, $sg_de[11]->{projects::NAME});
        $this->assertEquals(GrigorievDe::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_DESCRIPTION, $sg_de[11]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievDe::POSITION_SOFTWARE_ENGINEER, $sg_de[11]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_RESPONSIBILITIES, $sg_de[11]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_TECHNOLOGIES, $sg_de[11]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievDe::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_OPERATING_SYSTEMS, $sg_de[11]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievDe::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_START_DATE, $sg_de[11]->{projects::START_DATE});
        $this->assertEquals(GrigorievDe::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_END_DATE, $sg_de[11]->{projects::END_DATE});

        $this->assertEquals(GrigorievDe::PROJECT_OASIS_NAME, $sg_de[12]->{projects::NAME});
        $this->assertEquals(GrigorievDe::PROJECT_OASIS_DESCRIPTION, $sg_de[12]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievDe::POSITION_SOFTWARE_ENGINEER, $sg_de[12]->{positions::POSITION});
        $this->assertEquals(GrigorievDe::PROJECT_OASIS_RESPONSIBILITIES, $sg_de[12]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievDe::PROJECT_OASIS_TECHNOLOGIES, $sg_de[12]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievDe::PROJECT_OASIS_OPERATING_SYSTEMS, $sg_de[12]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievDe::PROJECT_OASIS_START_DATE, $sg_de[12]->{projects::START_DATE});
        $this->assertEquals(GrigorievDe::PROJECT_OASIS_END_DATE, $sg_de[12]->{projects::END_DATE});
    }

///////////////////////////
// RU
///////////////////////////
    const PERSON_ID_RU = 3;

    public function testGetPersonalInformationRu() {
        $db = new Db();
        $db->connect();
        $sg_ru = $db->getPersonalInformation(Language::LANG_RU);

        $this->assertNotEquals(false, $sg_ru);

        $this->assertEquals(self::PERSON_ID_RU, $sg_ru->{persons::PK_ID});
        $this->assertEquals(GrigorievRu::PERSON_NAME, $sg_ru->{persons::NAME});
        $this->assertEquals(GrigorievRu::PERSON_JOB_TITLE, $sg_ru->{persons::JOB_TITLE});
        $this->assertEquals(GrigorievRu::PERSON_ADDRESS, $sg_ru->{persons::ADDRESS});
        $this->assertEquals(GrigorievRu::PERSON_PHONE, $sg_ru->{persons::PHONE});
        $this->assertEquals(GrigorievRu::PERSON_EMAIL, $sg_ru->{persons::EMAIL});
        $this->assertEquals(GrigorievRu::PERSON_SKYPE, $sg_ru->{persons::SKYPE});
        $this->assertEquals(GrigorievRu::PERSON_DATE_OF_BIRTH, $sg_ru->{persons::DATE_OF_BIRTH});
        $this->assertEquals(GrigorievRu::PERSON_PLACE_OF_BIRTH, $sg_ru->{persons::PLACE_OF_BIRTH});
        $this->assertEquals(GrigorievRu::MARITAL_STATUS_SINGLE, $sg_ru->{marital_statuses::STATUS});
        $this->assertEquals(GrigorievRu::PERSON_HOMEPAGE, $sg_ru->{persons::HOMEPAGE});
        $this->assertEquals(Config::PERSON_UNIQUE_NAME, $sg_ru->{persons::UNIQUE_NAME});
    }

    public function testGetEmploymentHistoryRu() {
        $db = new Db();
        $db->connect();
        $sg_ru = $db->getEmploymentHistory(self::PERSON_ID_RU);

        $this->assertNotEquals(false, $sg_ru);

        $this->assertEquals(GrigorievRu::EMPLOYER_SAM_SOLUTIONS_BELARUS_COMPANY, $sg_ru[0]->{employers::COMPANY});
        $this->assertEquals(GrigorievRu::EMPLOYER_SAM_SOLUTIONS_BELARUS_HOMEPAGE, $sg_ru[0]->{employers::HOMEPAGE});
        $this->assertEquals(GrigorievRu::EMPLOYER_SAM_SOLUTIONS_BELARUS_ADDRESS, $sg_ru[0]->{employers::ADDRESS});
        $this->assertEquals(GrigorievRu::POSITION_TEAM_LEADER, $sg_ru[0]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::EMPLOYER_SAM_SOLUTIONS_BELARUS_TL_RESPONSIBILITIES, $sg_ru[0]->{employers::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::EMPLOYER_SAM_SOLUTIONS_BELARUS_TL_START_DATE, $sg_ru[0]->{employers::START_DATE});
        $this->assertEquals(GrigorievRu::EMPLOYER_SAM_SOLUTIONS_BELARUS_TL_END_DATE, $sg_ru[0]->{employers::END_DATE});

        $this->assertEquals(GrigorievRu::EMPLOYER_SAM_SOLUTIONS_BELARUS_COMPANY, $sg_ru[1]->{employers::COMPANY});
        $this->assertEquals(GrigorievRu::EMPLOYER_SAM_SOLUTIONS_BELARUS_HOMEPAGE, $sg_ru[1]->{employers::HOMEPAGE});
        $this->assertEquals(GrigorievRu::EMPLOYER_SAM_SOLUTIONS_BELARUS_ADDRESS, $sg_ru[1]->{employers::ADDRESS});
        $this->assertEquals(GrigorievRu::POSITION_SENIOR_SOFTWARE_ENGINEER, $sg_ru[1]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::EMPLOYER_SAM_SOLUTIONS_BELARUS_SSE_RESPONSIBILITIES, $sg_ru[1]->{employers::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::EMPLOYER_SAM_SOLUTIONS_BELARUS_SSE_START_DATE, $sg_ru[1]->{employers::START_DATE});
        $this->assertEquals(GrigorievRu::EMPLOYER_SAM_SOLUTIONS_BELARUS_SSE_END_DATE, $sg_ru[1]->{employers::END_DATE});

        $this->assertEquals(GrigorievRu::EMPLOYER_BSUIR_CPI_COMPANY, $sg_ru[2]->{employers::COMPANY});
        $this->assertEquals(GrigorievRu::EMPLOYER_BSUIR_CPI_HOMEPAGE, $sg_ru[2]->{employers::HOMEPAGE});
        $this->assertEquals(GrigorievRu::EMPLOYER_BSUIR_CPI_ADDRESS, $sg_ru[2]->{employers::ADDRESS});
        $this->assertEquals(GrigorievRu::POSITION_SOFTWARE_ENGINEER, $sg_ru[2]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::EMPLOYER_BSUIR_CPI_RESPONSIBILITIES, $sg_ru[2]->{employers::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::EMPLOYER_BSUIR_CPI_START_DATE, $sg_ru[2]->{employers::START_DATE});
        $this->assertEquals(GrigorievRu::EMPLOYER_BSUIR_CPI_END_DATE, $sg_ru[2]->{employers::END_DATE});
    }

    public function testGetEducationRu() {
        $db = new Db();
        $db->connect();
        $sg_ru = $db->getEducation(self::PERSON_ID_RU);

        $this->assertNotEquals(false, $sg_ru);

        $this->assertEquals(GrigorievRu::EDUCATION_BSEU_EDUCATIONAL_INSTITUTION, $sg_ru[0]->{educations::EDUCATIONAL_INSTITUTION});
        $this->assertEquals(GrigorievRu::EDUCATION_BSEU_ADDRESS, $sg_ru[0]->{educations::ADDRESS});
        $this->assertEquals(GrigorievRu::EDUCATION_BSEU_DEPARTMENT, $sg_ru[0]->{educations::DEPARTMENT});
        $this->assertEquals(GrigorievRu::EDUCATION_BSEU_FACULTY, $sg_ru[0]->{educations::FACULTY});
        $this->assertEquals(GrigorievRu::EDUCATION_BSEU_QUALIFICATION, $sg_ru[0]->{educations::QUALIFICATION});
        $this->assertEquals(GrigorievRu::EDUCATION_BSEU_START_DATE, $sg_ru[0]->{educations::START_DATE});
        $this->assertEquals(GrigorievRu::EDUCATION_BSEU_END_DATE, $sg_ru[0]->{educations::END_DATE});

        $this->assertEquals(GrigorievRu::EDUCATION_BSUIR_EDUCATIONAL_INSTITUTION, $sg_ru[1]->{educations::EDUCATIONAL_INSTITUTION});
        $this->assertEquals(GrigorievRu::EDUCATION_BSUIR_ADDRESS, $sg_ru[1]->{educations::ADDRESS});
        $this->assertEquals(GrigorievRu::EDUCATION_BSUIR_DEPARTMENT, $sg_ru[1]->{educations::DEPARTMENT});
        $this->assertEquals(GrigorievRu::EDUCATION_BSUIR_FACULTY, $sg_ru[1]->{educations::FACULTY});
        $this->assertEquals(GrigorievRu::EDUCATION_BSUIR_QUALIFICATION, $sg_ru[1]->{educations::QUALIFICATION});
        $this->assertEquals(GrigorievRu::EDUCATION_BSUIR_START_DATE, $sg_ru[1]->{educations::START_DATE});
        $this->assertEquals(GrigorievRu::EDUCATION_BSUIR_END_DATE, $sg_ru[1]->{educations::END_DATE});
    }

    public function testGetLanguagesRu() {
        $db = new Db();
        $db->connect();
        $sg_ru = $db->getLanguages(self::PERSON_ID_RU);

        $this->assertNotEquals(false, $sg_ru);

        $this->assertEquals(GrigorievRu::LANGUAGE_ENGLISH, $sg_ru[0]->{languages::LANGUAGE});
        $this->assertEquals(GrigorievRu::LANGUAGE_LEVEL_B2, $sg_ru[0]->{languages::LEVEL});

        $this->assertEquals(GrigorievRu::LANGUAGE_GERMAN, $sg_ru[1]->{languages::LANGUAGE});
        $this->assertEquals(GrigorievRu::LANGUAGE_LEVEL_B1, $sg_ru[1]->{languages::LEVEL});

        $this->assertEquals(GrigorievRu::LANGUAGE_RUSSIAN, $sg_ru[2]->{languages::LANGUAGE});
        $this->assertEquals(GrigorievRu::LANGUAGE_LEVEL_NATIVE, $sg_ru[2]->{languages::LEVEL});

        $this->assertEquals(GrigorievRu::LANGUAGE_BELARUSIAN, $sg_ru[3]->{languages::LANGUAGE});
        $this->assertEquals(GrigorievRu::LANGUAGE_LEVEL_NATIVE, $sg_ru[3]->{languages::LEVEL});
    }

    public function testCoursesAndCertificatesRu() {
        $db = new Db();
        $db->connect();
        $sg_ru = $db->getCoursesAndCertificates(self::PERSON_ID_RU);

        $this->assertNotEquals(false, $sg_ru);

        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_B1_TITLE, $sg_ru[0]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_B1_AWARDED, $sg_ru[0]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_B1_DATE, $sg_ru[0]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_PRAGMATIC_TDD_TITLE, $sg_ru[1]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_PRAGMATIC_TDD_AWARDED, $sg_ru[1]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_PRAGMATIC_TDD_DATE, $sg_ru[1]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_TDD_IN_JAVA_TITLE, $sg_ru[2]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_TDD_IN_JAVA_AWARDED, $sg_ru[2]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_TDD_IN_JAVA_DATE, $sg_ru[2]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_AGILE_ENGINEERING_PRACTICES_TITLE, $sg_ru[3]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_AGILE_ENGINEERING_PRACTICES_AWARDED, $sg_ru[3]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_AGILE_ENGINEERING_PRACTICES_DATE, $sg_ru[3]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_A2_TITLE, $sg_ru[4]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_A2_AWARDED, $sg_ru[4]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_A2_DATE, $sg_ru[4]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_IBM_RATIONAL_CLEARCASE_TITLE, $sg_ru[5]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_IBM_RATIONAL_CLEARCASE_AWARDED, $sg_ru[5]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_IBM_RATIONAL_CLEARCASE_DATE, $sg_ru[5]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_ESTIMATIONS_FOR_SOFTWARE_PROJECTS_TITLE, $sg_ru[6]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_ESTIMATIONS_FOR_SOFTWARE_PROJECTS_AWARDED, $sg_ru[6]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_ESTIMATIONS_FOR_SOFTWARE_PROJECTS_DATE, $sg_ru[6]->{courses_and_certificates::DATE});

        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_SOFTWARE_REQUIREMENTS_DEVELOPMENT_AND_MANAGEMENT_TITLE, $sg_ru[7]->{courses_and_certificates::TITLE});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_SOFTWARE_REQUIREMENTS_DEVELOPMENT_AND_MANAGEMENT_AWARDED, $sg_ru[7]->{courses_and_certificates::AWARDED});
        $this->assertEquals(GrigorievRu::COURSE_AND_CERTIFICATE_SOFTWARE_REQUIREMENTS_DEVELOPMENT_AND_MANAGEMENT_DATE, $sg_ru[7]->{courses_and_certificates::DATE});
    }

    public function testTechnicalSkillsRu() {
        $db = new Db();
        $db->connect();
        $sg_ru = $db->getTechnicalSkills(self::PERSON_ID_RU);

        $this->assertNotEquals(false, $sg_ru);

        // Programming Languages
        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_JAVA, $sg_ru[0]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_JAVA_EXPERIENCE, $sg_ru[0]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[0]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_C, $sg_ru[1]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_C_EXPERIENCE, $sg_ru[1]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[1]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_CPP, $sg_ru[2]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_CPP_EXPERIENCE, $sg_ru[2]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[2]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_OBJECTIVE_C, $sg_ru[3]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_OBJECTIVE_C_EXPERIENCE, $sg_ru[3]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_BASIC, $sg_ru[3]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_CSHARP, $sg_ru[4]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_CSHARP_EXPERIENCE, $sg_ru[4]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_BASIC, $sg_ru[4]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_SQL, $sg_ru[5]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_SQL_EXPERIENCE, $sg_ru[5]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[5]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_XML, $sg_ru[6]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_XML_EXPERIENCE, $sg_ru[6]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[6]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_PHP, $sg_ru[7]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_PHP_EXPERIENCE, $sg_ru[7]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[7]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_JAVASCRIPT, $sg_ru[8]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::PROGRAMMING_LANGUAGE_JAVASCRIPT_EXPERIENCE, $sg_ru[8]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_BASIC, $sg_ru[8]->{skill_proficiencies::PROFICIENCY});


        // Technologies
        $this->assertEquals(GrigorievRu::TECHNOLOGY_J2SE, $sg_ru[9]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_J2SE_EXPERIENCE, $sg_ru[9]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[9]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::TECHNOLOGY_J2EE, $sg_ru[10]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_J2EE_EXPERIENCE, $sg_ru[10]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[10]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::TECHNOLOGY_HIBERNATE, $sg_ru[11]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_HIBERNATE_EXPERIENCE, $sg_ru[11]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[11]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::TECHNOLOGY_SPRING_FRAMEWORK, $sg_ru[12]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_SPRING_FRAMEWORK_EXPERIENCE, $sg_ru[12]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_BASIC, $sg_ru[12]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::TECHNOLOGY_SWING, $sg_ru[13]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_SWING_EXPERIENCE, $sg_ru[13]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[13]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::TECHNOLOGY_APACHE_WICKET, $sg_ru[14]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_APACHE_WICKET_EXPERIENCE, $sg_ru[14]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[14]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::TECHNOLOGY_JAVA_SERVLETS, $sg_ru[15]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_JAVA_SERVLETS_EXPERIENCE, $sg_ru[15]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[15]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::TECHNOLOGY_JSP, $sg_ru[16]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_JSP_EXPERIENCE, $sg_ru[16]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[16]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::TECHNOLOGY_APPLETS, $sg_ru[17]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_APPLETS_EXPERIENCE, $sg_ru[17]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[17]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::TECHNOLOGY_JUNIT, $sg_ru[18]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_JUNIT_EXPERIENCE, $sg_ru[18]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[18]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::TECHNOLOGY_JNI, $sg_ru[19]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_JNI_EXPERIENCE, $sg_ru[19]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[19]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::TECHNOLOGY_SOAP, $sg_ru[20]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_SOAP_EXPERIENCE, $sg_ru[20]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[20]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::TECHNOLOGY_CPP_STDLIB, $sg_ru[21]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_CPP_STDLIB_EXPERIENCE, $sg_ru[21]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[21]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::TECHNOLOGY_COCOA_FRAMEWORK, $sg_ru[22]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_COCOA_FRAMEWORK_EXPERIENCE, $sg_ru[22]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_BASIC, $sg_ru[22]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::TECHNOLOGY_CARBONLIB, $sg_ru[23]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::TECHNOLOGY_CARBONLIB_EXPERIENCE, $sg_ru[23]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_BASIC, $sg_ru[23]->{skill_proficiencies::PROFICIENCY});

        // Operating Systems
        $this->assertEquals(GrigorievRu::OPERATING_SYSTEM_MS_WINDOWS, $sg_ru[24]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::OPERATING_SYSTEM_MS_WINDOWS_EXPERIENCE, $sg_ru[24]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[24]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::OPERATING_SYSTEM_LINUX, $sg_ru[25]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::OPERATING_SYSTEM_LINUX_EXPERIENCE, $sg_ru[25]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[25]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::OPERATING_SYSTEM_MACOS_X10, $sg_ru[26]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::OPERATING_SYSTEM_MACOS_X10_EXPERIENCE, $sg_ru[26]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[26]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::OPERATING_SYSTEM_ANDROID, $sg_ru[27]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::OPERATING_SYSTEM_ANDROID_EXPERIENCE, $sg_ru[27]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_BASIC, $sg_ru[27]->{skill_proficiencies::PROFICIENCY});

        // RDBMSs
        $this->assertEquals(GrigorievRu::RDBMS_MSSQL, $sg_ru[28]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::RDBMS_MSSQL_EXPERIENCE, $sg_ru[28]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[28]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::RDBMS_POSTGRESQL, $sg_ru[29]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::RDBMS_POSTGRESQL_EXPERIENCE, $sg_ru[29]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[29]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::RDBMS_SQLITE, $sg_ru[30]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::RDBMS_SQLITE_EXPERIENCE, $sg_ru[30]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[30]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::RDBMS_MYSQL, $sg_ru[31]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::RDBMS_MYSQL_EXPERIENCE, $sg_ru[31]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[31]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::RDBMS_H2, $sg_ru[32]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::RDBMS_H2_EXPERIENCE, $sg_ru[32]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[32]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::RDBMS_ORACLE, $sg_ru[33]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::RDBMS_ORACLE_EXPERIENCE, $sg_ru[33]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_BASIC, $sg_ru[33]->{skill_proficiencies::PROFICIENCY});

        // Web & Application Servers
        $this->assertEquals(GrigorievRu::WEB_AND_APPLICATION_SERVER_APACHE_HTTP_SERVER, $sg_ru[34]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::WEB_AND_APPLICATION_SERVER_APACHE_HTTP_SERVER_EXPERIENCE, $sg_ru[34]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[34]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::WEB_AND_APPLICATION_SERVER_APACHE_TOMCAT, $sg_ru[35]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::WEB_AND_APPLICATION_SERVER_APACHE_TOMCAT_EXPERIENCE, $sg_ru[35]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[35]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::WEB_AND_APPLICATION_SERVER_JBOSS_AS, $sg_ru[36]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::WEB_AND_APPLICATION_SERVER_JBOSS_AS_EXPERIENCE, $sg_ru[36]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[36]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::WEB_AND_APPLICATION_SERVER_JETTY, $sg_ru[37]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::WEB_AND_APPLICATION_SERVER_JETTY_EXPERIENCE, $sg_ru[37]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_BASIC, $sg_ru[37]->{skill_proficiencies::PROFICIENCY});

        // CASE & Project Tools
        $this->assertEquals(GrigorievRu::CASE_AND_PROJECT_TOOL_SVN, $sg_ru[38]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::CASE_AND_PROJECT_TOOL_SVN_EXPERIENCE, $sg_ru[38]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[38]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::CASE_AND_PROJECT_TOOL_IBM_CLEARCASE, $sg_ru[39]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::CASE_AND_PROJECT_TOOL_IBM_CLEARCASE_EXPERIENCE, $sg_ru[39]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[39]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::CASE_AND_PROJECT_TOOL_CVS, $sg_ru[40]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::CASE_AND_PROJECT_TOOL_CVS_EXPERIENCE, $sg_ru[40]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[40]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::CASE_AND_PROJECT_TOOL_MS_PROJECT, $sg_ru[41]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::CASE_AND_PROJECT_TOOL_MS_PROJECT_EXPERIENCE, $sg_ru[41]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[41]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::CASE_AND_PROJECT_TOOL_HUDSON_JENKINS, $sg_ru[42]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::CASE_AND_PROJECT_TOOL_HUDSON_JENKINS_EXPERIENCE, $sg_ru[42]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[42]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::CASE_AND_PROJECT_TOOL_JIRA, $sg_ru[43]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::CASE_AND_PROJECT_TOOL_JIRA_EXPERIENCE, $sg_ru[43]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[43]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::CASE_AND_PROJECT_TOOL_BUGZILLA, $sg_ru[44]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::CASE_AND_PROJECT_TOOL_BUGZILLA_EXPERIENCE, $sg_ru[44]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[44]->{skill_proficiencies::PROFICIENCY});

        // IDEs
        $this->assertEquals(GrigorievRu::IDE_ECLIPSE, $sg_ru[45]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::IDE_ECLIPSE_EXPERIENCE, $sg_ru[45]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[45]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::IDE_MS_VISUAL_STUDIO, $sg_ru[46]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::IDE_MS_VISUAL_STUDIO_EXPERIENCE, $sg_ru[46]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[46]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::IDE_INTELLIJ_IDEA, $sg_ru[47]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::IDE_INTELLIJ_IDEA_EXPERIENCE, $sg_ru[47]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[47]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::IDE_INTELLIJ_PHPSTORM, $sg_ru[48]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::IDE_INTELLIJ_PHPSTORM_EXPERIENCE, $sg_ru[48]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_EXCELLENT, $sg_ru[48]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::IDE_NETBEANS, $sg_ru[49]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::IDE_NETBEANS_EXPERIENCE, $sg_ru[49]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_GOOD, $sg_ru[49]->{skill_proficiencies::PROFICIENCY});

        $this->assertEquals(GrigorievRu::IDE_XCODE, $sg_ru[50]->{technical_skills::TECHNOLOGY});
        $this->assertEquals(GrigorievRu::IDE_XCODE_EXPERIENCE, $sg_ru[50]->{technical_skills::EXPERIENCE});
        $this->assertEquals(GrigorievRu::SKILL_PROFICIENCY_BASIC, $sg_ru[50]->{skill_proficiencies::PROFICIENCY});
    }

    public function testProjectsRu() {
        $db = new Db();
        $db->connect();
        $sg_ru = $db->getProjects(self::PERSON_ID_RU);

        $this->assertNotEquals(false, $sg_ru);

        $this->assertEquals(GrigorievRu::PROJECT_AGENTS_NAME, $sg_ru[0]->{projects::NAME});
        $this->assertEquals(GrigorievRu::PROJECT_AGENTS_DESCRIPTION, $sg_ru[0]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievRu::POSITION_TEAM_LEADER, $sg_ru[0]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::PROJECT_AGENTS_RESPONSIBILITIES, $sg_ru[0]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::PROJECT_AGENTS_TECHNOLOGIES, $sg_ru[0]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievRu::PROJECT_AGENTS_OPERATING_SYSTEMS, $sg_ru[0]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievRu::PROJECT_AGENTS_START_DATE, $sg_ru[0]->{projects::START_DATE});
        $this->assertEquals(GrigorievRu::PROJECT_AGENTS_END_DATE, $sg_ru[0]->{projects::END_DATE});

        $this->assertEquals(GrigorievRu::PROJECT_SVOM_NAME, $sg_ru[1]->{projects::NAME});
        $this->assertEquals(GrigorievRu::PROJECT_SVOM_DESCRIPTION, $sg_ru[1]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievRu::POSITION_TEAM_LEADER, $sg_ru[1]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::PROJECT_SVOM_RESPONSIBILITIES, $sg_ru[1]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::PROJECT_SVOM_TECHNOLOGIES, $sg_ru[1]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievRu::PROJECT_SVOM_OPERATING_SYSTEMS, $sg_ru[1]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievRu::PROJECT_SVOM_START_DATE, $sg_ru[1]->{projects::START_DATE});
        $this->assertEquals(GrigorievRu::PROJECT_SVOM_END_DATE, $sg_ru[1]->{projects::END_DATE});

        $this->assertEquals(GrigorievRu::PROJECT_SPM_NAME, $sg_ru[2]->{projects::NAME});
        $this->assertEquals(GrigorievRu::PROJECT_SPM_DESCRIPTION, $sg_ru[2]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievRu::POSITION_TEAM_LEADER_SENIOR_SOFTWARE_ENGINEER, $sg_ru[2]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::PROJECT_SPM_RESPONSIBILITIES, $sg_ru[2]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::PROJECT_SPM_TECHNOLOGIES, $sg_ru[2]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievRu::PROJECT_SPM_OPERATING_SYSTEMS, $sg_ru[2]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievRu::PROJECT_SPM_START_DATE, $sg_ru[2]->{projects::START_DATE});
        $this->assertEquals(GrigorievRu::PROJECT_SPM_END_DATE, $sg_ru[2]->{projects::END_DATE});

        $this->assertEquals(GrigorievRu::PROJECT_VIOM_NAME, $sg_ru[3]->{projects::NAME});
        $this->assertEquals(GrigorievRu::PROJECT_VIOM_DESCRIPTION, $sg_ru[3]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievRu::POSITION_TEAM_LEADER_SENIOR_SOFTWARE_ENGINEER, $sg_ru[3]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::PROJECT_VIOM_RESPONSIBILITIES, $sg_ru[3]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::PROJECT_VIOM_TECHNOLOGIES, $sg_ru[3]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievRu::PROJECT_VIOM_OPERATING_SYSTEMS, $sg_ru[3]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievRu::PROJECT_VIOM_START_DATE, $sg_ru[3]->{projects::START_DATE});
        $this->assertEquals(GrigorievRu::PROJECT_VIOM_END_DATE, $sg_ru[3]->{projects::END_DATE});

        $this->assertEquals(GrigorievRu::PROJECT_ZDHCP_NAME, $sg_ru[4]->{projects::NAME});
        $this->assertEquals(GrigorievRu::PROJECT_ZDHCP_DESCRIPTION, $sg_ru[4]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievRu::POSITION_SENIOR_SOFTWARE_ENGINEER, $sg_ru[4]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::PROJECT_ZDHCP_RESPONSIBILITIES, $sg_ru[4]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::PROJECT_ZDHCP_TECHNOLOGIES, $sg_ru[4]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievRu::PROJECT_ZDHCP_OPERATING_SYSTEMS, $sg_ru[4]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievRu::PROJECT_ZDHCP_START_DATE, $sg_ru[4]->{projects::START_DATE});
        $this->assertEquals(GrigorievRu::PROJECT_ZDHCP_END_DATE, $sg_ru[4]->{projects::END_DATE});

        $this->assertEquals(GrigorievRu::PROJECT_MYSQL_APM_NAME, $sg_ru[5]->{projects::NAME});
        $this->assertEquals(GrigorievRu::PROJECT_MYSQL_APM_DESCRIPTION, $sg_ru[5]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievRu::POSITION_SOFTWARE_ENGINEER, $sg_ru[5]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::PROJECT_MYSQL_APM_RESPONSIBILITIES, $sg_ru[5]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::PROJECT_MYSQL_APM_TECHNOLOGIES, $sg_ru[5]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievRu::PROJECT_MYSQL_APM_OPERATING_SYSTEMS, $sg_ru[5]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievRu::PROJECT_MYSQL_APM_START_DATE, $sg_ru[5]->{projects::START_DATE});
        $this->assertEquals(GrigorievRu::PROJECT_MYSQL_APM_END_DATE, $sg_ru[5]->{projects::END_DATE});

        $this->assertEquals(GrigorievRu::PROJECT_VAULTDR_NAME, $sg_ru[6]->{projects::NAME});
        $this->assertEquals(GrigorievRu::PROJECT_VAULTDR_DESCRIPTION, $sg_ru[6]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievRu::POSITION_SOFTWARE_ENGINEER, $sg_ru[6]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::PROJECT_VAULTDR_RESPONSIBILITIES, $sg_ru[6]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::PROJECT_VAULTDR_TECHNOLOGIES, $sg_ru[6]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievRu::PROJECT_VAULTDR_OPERATING_SYSTEMS, $sg_ru[6]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievRu::PROJECT_VAULTDR_START_DATE, $sg_ru[6]->{projects::START_DATE});
        $this->assertEquals(GrigorievRu::PROJECT_VAULTDR_END_DATE, $sg_ru[6]->{projects::END_DATE});

        $this->assertEquals(GrigorievRu::PROJECT_LOTUS_NOTES_APM_NAME, $sg_ru[7]->{projects::NAME});
        $this->assertEquals(GrigorievRu::PROJECT_LOTUS_NOTES_APM_DESCRIPTION, $sg_ru[7]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievRu::POSITION_SOFTWARE_ENGINEER, $sg_ru[7]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::PROJECT_LOTUS_NOTES_APM_RESPONSIBILITIES, $sg_ru[7]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::PROJECT_LOTUS_NOTES_APM_TECHNOLOGIES, $sg_ru[7]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievRu::PROJECT_LOTUS_NOTES_APM_OPERATING_SYSTEMS, $sg_ru[7]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievRu::PROJECT_LOTUS_NOTES_APM_START_DATE, $sg_ru[7]->{projects::START_DATE});
        $this->assertEquals(GrigorievRu::PROJECT_LOTUS_NOTES_APM_END_DATE, $sg_ru[7]->{projects::END_DATE});

        $this->assertEquals(GrigorievRu::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_NAME, $sg_ru[8]->{projects::NAME});
        $this->assertEquals(GrigorievRu::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_DESCRIPTION, $sg_ru[8]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievRu::POSITION_SOFTWARE_ENGINEER, $sg_ru[8]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_RESPONSIBILITIES, $sg_ru[8]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_TECHNOLOGIES, $sg_ru[8]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievRu::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_OPERATING_SYSTEMS, $sg_ru[8]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievRu::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_START_DATE, $sg_ru[8]->{projects::START_DATE});
        $this->assertEquals(GrigorievRu::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_END_DATE, $sg_ru[8]->{projects::END_DATE});

        $this->assertEquals(GrigorievRu::PROJECT_OASIS_X10_NAME, $sg_ru[9]->{projects::NAME});
        $this->assertEquals(GrigorievRu::PROJECT_OASIS_X10_DESCRIPTION, $sg_ru[9]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievRu::POSITION_SOFTWARE_ENGINEER, $sg_ru[9]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::PROJECT_OASIS_X10_RESPONSIBILITIES, $sg_ru[9]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::PROJECT_OASIS_X10_TECHNOLOGIES, $sg_ru[9]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievRu::PROJECT_OASIS_X10_OPERATING_SYSTEMS, $sg_ru[9]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievRu::PROJECT_OASIS_X10_START_DATE, $sg_ru[9]->{projects::START_DATE});
        $this->assertEquals(GrigorievRu::PROJECT_OASIS_X10_END_DATE, $sg_ru[9]->{projects::END_DATE});

        $this->assertEquals(GrigorievRu::PROJECT_CDROMTOOL_NAME, $sg_ru[10]->{projects::NAME});
        $this->assertEquals(GrigorievRu::PROJECT_CDROMTOOL_DESCRIPTION, $sg_ru[10]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievRu::POSITION_SOFTWARE_ENGINEER, $sg_ru[10]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::PROJECT_CDROMTOOL_RESPONSIBILITIES, $sg_ru[10]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::PROJECT_CDROMTOOL_TECHNOLOGIES, $sg_ru[10]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievRu::PROJECT_CDROMTOOL_OPERATING_SYSTEMS, $sg_ru[10]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievRu::PROJECT_CDROMTOOL_START_DATE, $sg_ru[10]->{projects::START_DATE});
        $this->assertEquals(GrigorievRu::PROJECT_CDROMTOOL_END_DATE, $sg_ru[10]->{projects::END_DATE});

        $this->assertEquals(GrigorievRu::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_NAME, $sg_ru[11]->{projects::NAME});
        $this->assertEquals(GrigorievRu::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_DESCRIPTION, $sg_ru[11]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievRu::POSITION_SOFTWARE_ENGINEER, $sg_ru[11]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_RESPONSIBILITIES, $sg_ru[11]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_TECHNOLOGIES, $sg_ru[11]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievRu::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_OPERATING_SYSTEMS, $sg_ru[11]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievRu::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_START_DATE, $sg_ru[11]->{projects::START_DATE});
        $this->assertEquals(GrigorievRu::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_END_DATE, $sg_ru[11]->{projects::END_DATE});

        $this->assertEquals(GrigorievRu::PROJECT_OASIS_NAME, $sg_ru[12]->{projects::NAME});
        $this->assertEquals(GrigorievRu::PROJECT_OASIS_DESCRIPTION, $sg_ru[12]->{projects::DESCRIPTION});
        $this->assertEquals(GrigorievRu::POSITION_SOFTWARE_ENGINEER, $sg_ru[12]->{positions::POSITION});
        $this->assertEquals(GrigorievRu::PROJECT_OASIS_RESPONSIBILITIES, $sg_ru[12]->{projects::RESPONSIBILITIES});
        $this->assertEquals(GrigorievRu::PROJECT_OASIS_TECHNOLOGIES, $sg_ru[12]->{projects::TECHNOLOGIES});
        $this->assertEquals(GrigorievRu::PROJECT_OASIS_OPERATING_SYSTEMS, $sg_ru[12]->{projects::OPERATING_SYSTEMS});
        $this->assertEquals(GrigorievRu::PROJECT_OASIS_START_DATE, $sg_ru[12]->{projects::START_DATE});
        $this->assertEquals(GrigorievRu::PROJECT_OASIS_END_DATE, $sg_ru[12]->{projects::END_DATE});
    }

    public static function tearDownAfterClass() {
    }
}
