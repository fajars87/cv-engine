<?php
/**
 * Author: Sergey Grigoriev
 */

class DocxGenerator {
    private $PHPWord;
    private $document;
    private $language;

    public function generateDocumentEn() {
        $this->generateDocument(Language::LANG_EN, dirname(__FILE__) . '/files/S.Grigoriev_CV.docx');
    }

    public function generateDocumentDe() {
        $this->generateDocument(Language::LANG_DE, dirname(__FILE__) . '/files/S.Grigoriev_Lebenslauf.docx');
    }

    public function generateDocumentRu() {
        $this->generateDocument(Language::LANG_RU, dirname(__FILE__) . iconv('UTF-8', 'WINDOWS-1251', '/files/С.Григорьев_резюме.docx'));
    }

    public function generateDocument($lang, $output) {
        $this->language = $lang;

        $db = new Db();
        $db->connect();

        $this->PHPWord = new PHPWord();
        $this->document = $this->PHPWord->loadTemplate(dirname(__FILE__) . '/files/S.Grigoriev_CV_template.docx');

        $person = $db->getPersonalInformation($lang);
        $I18nMessages = $db->getI18nMessages($person->{persons::FK_I18N_LANGUAGE_ID});
        $employers = $db->getEmploymentHistory($person->{persons::PK_ID});
        $educational_institutions = $db->getEducation($person->{persons::PK_ID});
        $languages = $db->getLanguages($person->{persons::PK_ID});
        $coursesAndCertificates = $db->getCoursesAndCertificates($person->{persons::PK_ID});
        $skills = $db->getTechnicalSkills($person->{persons::PK_ID});
        $projects = $db->getProjects($person->{persons::PK_ID});

        $this->setI18nMessages($I18nMessages);
        $this->setPersonalInformation($person);
        $this->setEmploymentHistory($employers);
        $this->setEducation($educational_institutions);
        $this->setLanguages($languages, $I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_LANGUAGE_CEFR]->{i18n_translations::VALUE});
        $this->setCoursesAndCertificates($coursesAndCertificates);
        $this->setTechnicalSkills($skills);
        $this->setProjects($projects);

        $this->document->save($output);
    }

    private function setI18nMessages($messages) {
        $this->document->setValue(Generator::PERSONAL_INFORMATION, $messages[GrigorievCommon::I18N_TRANSLATION_ID_PERSONAL_INFORMATION]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::ADDRESS, $messages[GrigorievCommon::I18N_TRANSLATION_ID_ADDRESS]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::PHONE, $messages[GrigorievCommon::I18N_TRANSLATION_ID_PHONE]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::EMAIL, $messages[GrigorievCommon::I18N_TRANSLATION_ID_EMAIL]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::SKYPE, $messages[GrigorievCommon::I18N_TRANSLATION_ID_SKYPE]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::DATE_OF_BIRTH, $messages[GrigorievCommon::I18N_TRANSLATION_ID_DATE_OF_BIRTH]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::PLACE_OF_BIRTH, $messages[GrigorievCommon::I18N_TRANSLATION_ID_PLACE_OF_BIRTH]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::STATUS, $messages[GrigorievCommon::I18N_TRANSLATION_ID_MARITAL_STATUS]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::HOMEPAGE, $messages[GrigorievCommon::I18N_TRANSLATION_ID_HOMEPAGE]->{i18n_translations::VALUE});

        $this->document->setValue(Generator::EMPLOYMENT_HISTORY, $messages[GrigorievCommon::I18N_TRANSLATION_ID_EMPLOYMENT_HISTORY]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::PERIOD, $messages[GrigorievCommon::I18N_TRANSLATION_ID_DATE]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::COMPANY, $messages[GrigorievCommon::I18N_TRANSLATION_ID_COMPANY]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::ADDRESS, $messages[GrigorievCommon::I18N_TRANSLATION_ID_ADDRESS]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::POSITION, $messages[GrigorievCommon::I18N_TRANSLATION_ID_POSITION]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::RESPONSIBILITIES, $messages[GrigorievCommon::I18N_TRANSLATION_ID_RESPONSIBILITIES]->{i18n_translations::VALUE});

        $this->document->setValue(Generator::EDUCATION, $messages[GrigorievCommon::I18N_TRANSLATION_ID_EDUCATION]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::EDUCATIONAL_INSTITUTION, $messages[GrigorievCommon::I18N_TRANSLATION_ID_EDUCATIONAL_INSTITUTION]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::FACULTY, $messages[GrigorievCommon::I18N_TRANSLATION_ID_FACULTY]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::DEPARTMENT, $messages[GrigorievCommon::I18N_TRANSLATION_ID_DEPARTMENT]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::QUALIFICATION, $messages[GrigorievCommon::I18N_TRANSLATION_ID_QUALIFICATION]->{i18n_translations::VALUE});

        $this->document->setValue(Generator::LANGUAGES, $messages[GrigorievCommon::I18N_TRANSLATION_ID_LANGUAGES]->{i18n_translations::VALUE});

        $this->document->setValue(Generator::COURSES_AND_CERTIFICATES, $messages[GrigorievCommon::I18N_TRANSLATION_ID_COURSES_AND_CERTIFICATES]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::TITLE, $messages[GrigorievCommon::I18N_TRANSLATION_ID_TITLE]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::AWARDED, $messages[GrigorievCommon::I18N_TRANSLATION_ID_AWARDED]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::DATE, $messages[GrigorievCommon::I18N_TRANSLATION_ID_DATE]->{i18n_translations::VALUE});

        $this->document->setValue(Generator::TECHNICAL_SKILLS, $messages[GrigorievCommon::I18N_TRANSLATION_ID_TECHNICAL_SKILLS]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::TECHNOLOGY, $messages[GrigorievCommon::I18N_TRANSLATION_ID_TECHNOLOGY]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::EXPERIENCE_YEARS, $messages[GrigorievCommon::I18N_TRANSLATION_ID_EXPERIENCE_YEARS]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::PROFICIENCY, $messages[GrigorievCommon::I18N_TRANSLATION_ID_PROFICIENCY]->{i18n_translations::VALUE});


        $this->document->setValue(Generator::PROJECTS, $messages[GrigorievCommon::I18N_TRANSLATION_ID_PROJECTS]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::PROJECT_NAME, $messages[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_NAME]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::PROJECT_DESCRIPTION, $messages[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_DESCRIPTION]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::TECHNOLOGIES, $messages[GrigorievCommon::I18N_TRANSLATION_ID_TECHNOLOGIES]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::OPERATING_SYSTEMS, $messages[GrigorievCommon::I18N_TRANSLATION_ID_OPERATING_SYSTEMS]->{i18n_translations::VALUE});
        $this->document->setValue(Generator::PROJECT_DURATION, $messages[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_DURATION]->{i18n_translations::VALUE});
    }

    private function setPersonalInformation($person) {
        $this->document->setValue(Generator::PERSON . Generator::NAME . Generator::VALUE, $person->{persons::NAME});
        $this->document->setValue(Generator::PERSON . Generator::JOB_TITLE . Generator::VALUE, $person->{persons::JOB_TITLE});

        $this->document->setValue(Generator::PERSON . Generator::ADDRESS . Generator::VALUE, $person->{persons::ADDRESS});
        $this->document->setValue(Generator::PERSON . Generator::PHONE . Generator::VALUE, $person->{persons::PHONE});
        $this->document->setValue(Generator::PERSON . Generator::EMAIL . Generator::VALUE, $person->{persons::EMAIL});
        $this->document->setValue(Generator::PERSON . Generator::SKYPE . Generator::VALUE, $person->{persons::SKYPE});
        $this->document->setValue(Generator::PERSON . Generator::DATE_OF_BIRTH . Generator::VALUE, $person->{persons::DATE_OF_BIRTH});
        $this->document->setValue(Generator::PERSON . Generator::PLACE_OF_BIRTH . Generator::VALUE, $person->{persons::PLACE_OF_BIRTH});
        $this->document->setValue(Generator::PERSON . Generator::STATUS . Generator::VALUE, $person->{marital_statuses::STATUS});
        $this->document->setValue(Generator::PERSON . Generator::HOMEPAGE . Generator::VALUE, $person->{persons::HOMEPAGE});
    }

    private function setEmploymentHistory($employers) {
        $count = count($employers);

        foreach ($employers as $employer) {
            $this->document->setValue(Generator::EMPLOYER . $count . Generator::UNDERSCORE . Generator::PERIOD . Generator::VALUE, I18n::localizedDate($employer->{employers::START_DATE}, $this->language) . ' - ' . I18n::localizedDate($employer->{employers::END_DATE}, $this->language));
            $this->document->setValue(Generator::EMPLOYER . $count . Generator::UNDERSCORE . Generator::COMPANY . Generator::VALUE, $employer->{employers::COMPANY});
            $this->document->setValue(Generator::EMPLOYER . $count . Generator::UNDERSCORE . Generator::HOMEPAGE . Generator::VALUE, $employer->{employers::HOMEPAGE});
            $this->document->setValue(Generator::EMPLOYER . $count . Generator::UNDERSCORE . Generator::ADDRESS . Generator::VALUE, $employer->{employers::ADDRESS});
            $this->document->setValue(Generator::EMPLOYER . $count . Generator::UNDERSCORE . Generator::POSITION . Generator::VALUE, $employer->{positions::POSITION});
            $this->document->setValue(Generator::EMPLOYER . $count . Generator::UNDERSCORE . Generator::RESPONSIBILITIES . Generator::VALUE, $employer->{employers::RESPONSIBILITIES});

            $count--;
        }
    }

    private function setEducation($educational_institutions) {
        $count = count($educational_institutions);

        foreach ($educational_institutions as $university) {
            $this->document->setValue(Generator::UNIVERSITY . $count . Generator::UNDERSCORE . Generator::PERIOD . Generator::VALUE, I18n::localizedDate($university->{educations::START_DATE}, $this->language) . ' - ' . I18n::localizedDate($university->{educations::END_DATE}, $this->language));
            $this->document->setValue(Generator::UNIVERSITY . $count . Generator::UNDERSCORE . Generator::EDUCATIONAL_INSTITUTION . Generator::VALUE, $university->{educations::EDUCATIONAL_INSTITUTION});
            $this->document->setValue(Generator::UNIVERSITY . $count . Generator::UNDERSCORE . Generator::ADDRESS . Generator::VALUE, $university->{educations::ADDRESS});
            $this->document->setValue(Generator::UNIVERSITY . $count . Generator::UNDERSCORE . Generator::FACULTY . Generator::VALUE, $university->{educations::FACULTY});
            $this->document->setValue(Generator::UNIVERSITY . $count . Generator::UNDERSCORE . Generator::DEPARTMENT . Generator::VALUE, $university->{educations::DEPARTMENT});
            $this->document->setValue(Generator::UNIVERSITY . $count . Generator::UNDERSCORE . Generator::QUALIFICATION . Generator::VALUE, $university->{educations::QUALIFICATION});

            $count--;
        }
    }

    private function setLanguages($languages, $cefr) {
        $count = 1;

        foreach ($languages as $language) {
            $languageLevel = $language->{languages::LEVEL};
            if ($languageLevel === GrigorievEn::LANGUAGE_LEVEL_NATIVE || $languageLevel === GrigorievDe::LANGUAGE_LEVEL_NATIVE || $languageLevel === GrigorievRu::LANGUAGE_LEVEL_NATIVE) {
            } else {
                $languageLevel = $language->{languages::LEVEL} . $cefr;
            }

            $this->document->setValue(Generator::LANGUAGE . $count . Generator::VALUE, $language->{languages::LANGUAGE});
            $this->document->setValue(Generator::LANGUAGE . $count . Generator::UNDERSCORE . Generator::LEVEL . Generator::VALUE, $languageLevel);

            $count++;
        }
    }

    private function setCoursesAndCertificates($coursesAndCertificates) {
        $count = count($coursesAndCertificates);

        foreach ($coursesAndCertificates as $certificate) {
            $this->document->setValue(Generator::CAC . $count . Generator::UNDERSCORE . Generator::TITLE . Generator::VALUE, $certificate->{courses_and_certificates::TITLE});
            $this->document->setValue(Generator::CAC . $count . Generator::UNDERSCORE . Generator::AWARDED . Generator::VALUE, $certificate->{courses_and_certificates::AWARDED});
            $this->document->setValue(Generator::CAC . $count . Generator::UNDERSCORE . Generator::DATE . Generator::VALUE, I18n::localizedDate($certificate->{courses_and_certificates::DATE}, $this->language));

            $count--;
        }
    }

    private function setTechnicalSkills($skills) {
        $previousCategory = '';

        $categoryNumber = 0;
        $count = 1;

        foreach ($skills as $skill) {
            $category = $skill->{skill_categories::CATEGORY};

            if ($previousCategory !== $category) {
                $categoryNumber++;
                $count = 1;
                $this->document->setValue(Generator::SKILLS . Generator::C . $categoryNumber, $skill->{skill_categories::CATEGORY});
            }

            $this->document->setValue(Generator::C . $categoryNumber . Generator::UNDERSCORE . Generator::T . $count . Generator::UNDERSCORE . Generator::N, $skill->{technical_skills::TECHNOLOGY});
            $this->document->setValue(Generator::C . $categoryNumber . Generator::UNDERSCORE . Generator::T . $count . Generator::UNDERSCORE . Generator::E, $skill->{technical_skills::EXPERIENCE});
            $this->document->setValue(Generator::C . $categoryNumber . Generator::UNDERSCORE . Generator::T . $count . Generator::UNDERSCORE . Generator::P, $skill->{skill_proficiencies::PROFICIENCY});

            $count++;

            $previousCategory = $category;
        }
    }

    private function setProjects($projects) {
        $count = count($projects);

        foreach ($projects as $project) {
            $this->document->setValue(Generator::PROJECT . $count . Generator::UNDERSCORE . Generator::PROJECT_NAME . Generator::VALUE, $project->{projects::NAME});
            $this->document->setValue(Generator::PROJECT . $count . Generator::UNDERSCORE . Generator::PROJECT_DESCRIPTION . Generator::VALUE, $project->{projects::DESCRIPTION});
            $this->document->setValue(Generator::PROJECT . $count . Generator::UNDERSCORE . Generator::POSITION . Generator::VALUE, $project->{positions::POSITION});
            $this->document->setValue(Generator::PROJECT . $count . Generator::UNDERSCORE . Generator::RESPONSIBILITIES . Generator::VALUE, $project->{projects::RESPONSIBILITIES});
            $this->document->setValue(Generator::PROJECT . $count . Generator::UNDERSCORE . Generator::TECHNOLOGIES . Generator::VALUE, $project->{projects::TECHNOLOGIES});
            $this->document->setValue(Generator::PROJECT . $count . Generator::UNDERSCORE . Generator::OPERATING_SYSTEMS . Generator::VALUE, $project->{projects::OPERATING_SYSTEMS});
            $this->document->setValue(Generator::PROJECT . $count . Generator::UNDERSCORE . Generator::PROJECT_DURATION . Generator::VALUE, I18n::localizedDate($project->{projects::START_DATE}, $this->language) . ' - ' . I18n::localizedDate($project->{projects::END_DATE}, $this->language));

            $count--;
        }
    }
}