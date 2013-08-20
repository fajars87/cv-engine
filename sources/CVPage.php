<?php
/**
 * Author: Sergey Grigoriev
 */

class CVPage extends AbstractPage {
    private $language;
    private $db;
    private $person;
    private $I18nMessages;

    function __construct($lang) {
        $this->language = $lang;
        Language::setLanguage($lang);

        $this->db = new Db();
        $this->db->connect();
        $this->person = $this->db->getPersonalInformation($lang);
        $this->I18nMessages = $this->db->getI18nMessages($this->person->{persons::FK_I18N_LANGUAGE_ID});
    }

    public function getHtmlPage() {
        return $this->getDocumentType() . $this->getHtml();
    }

    private function getDocumentType() {
        return
            '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">' . PHP_EOL;
    }

    public function getHtml() {
        return
            '<html xmlns = "http://www.w3.org/1999/xhtml">' . PHP_EOL .
            $this->getHead() .
            $this->getBody() .
            '</html>' . PHP_EOL;
    }

    public function getHead() {
        return
            '<head>' . PHP_EOL .
            '	<meta name = "description" content = "Sergey Grigoriev - Online Curriculum Vitae" />' . PHP_EOL .
            '	<meta name = "keywords" content = "Sergey, Grigoriev, Sergey Grigoriev, Software, Developer, Programmer, Minsk, Belarus, SaM Solutions, Team Leader, Engineer, Senior, Application design and development, Belarusian State Economic University, International Economic Relations, World Economics, Economist, Belarusian State University of Informatics and Radioelectronics, Computer Systems and Networks, Software for Information Technologies, Software Engineer, Diploma with Honors, Java, C, C++, SQl, XML, JavaScript, J2SE, J2EE, Hibernate, MS Windows, Linux, Mac OS X" />' . PHP_EOL .
            '	<meta name = "author" content = "Sergey Grigoriev" />' . PHP_EOL .
            '	<meta http-equiv = "content-type" content = "text/html; charset=utf-8" />' . PHP_EOL .
            '	<link rel = "icon" href = "template/images/cv.ico" />' . PHP_EOL .
            '	<title>Sergey Grigoriev - Online Curriculum Vitae</title>' . PHP_EOL .
            '	<link href = "template/css/styles.css" rel = "stylesheet" type = "text/css" />' . PHP_EOL .
            '	<script src = "template/js/switch_language.js" charset = "utf-8" type = "text/javascript"> </script>' . PHP_EOL .
            '</head>' . PHP_EOL;
    }

    public function getBody() {
        return
            '<body>' . PHP_EOL .
            $this->getContainer() .
            '</body>' . PHP_EOL;
    }

    private function getContainer() {
        return
            '	<div id = "container">' . PHP_EOL .
            $this->getTopWorkArea() .
            $this->getFreeSpace() .
            $this->getMiddleWorkArea() .
            $this->getFreeSpace() .
            $this->getBottomWorkArea() .
            '	</div>' . PHP_EOL;
    }

    private function getTopWorkArea() {
        return
            '		<div id = "frame-top_workarea">' . PHP_EOL .
            $this->getPrintable() .
            $this->getI18n() .
            '		</div>' . PHP_EOL .
            '' . PHP_EOL .
            '		<div id = "frame-top_btmline"> </div>' . PHP_EOL .
            '' . PHP_EOL;
    }

    private function getPrintable() {
        return
            '			<div id = "printable">' . PHP_EOL .
            '				<table class = "links">' . PHP_EOL .
            '					<tbody>' . PHP_EOL .
            '						<tr>' . PHP_EOL .
            '							<td> <a href = "' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_URL_DOWNLOAD_PDF_VERSION]->{i18n_translations::VALUE} . '"> <img src = "template/images/ext/pdf.png" height = "32" width = "32" alt = "PDF" /> </a> </td>' . PHP_EOL .
            '							<td> <a href = "' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_URL_DOWNLOAD_PDF_VERSION]->{i18n_translations::VALUE} . '" style = "color:#EEEEEE;">' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_DOWNLOAD_PDF_VERSION]->{i18n_translations::VALUE} . '</a> </td>' . PHP_EOL .
            '						</tr>' . PHP_EOL .
            '					</tbody>' . PHP_EOL .
            '				</table>' . PHP_EOL .
            '			</div>' . PHP_EOL;
    }

    private function getI18n() {
        return
            '			<div id = "i18n">' . PHP_EOL .
            '				<table class = "links">' . PHP_EOL .
            '					<tbody>' . PHP_EOL .
            '						<tr>' . PHP_EOL .
            '							<td> <a href = "javascript:switchLanguage(\'en\');"> <img src = "template/images/i18n/en.png" height = "32" width = "32" alt = "EN" /> </a> </td>' . PHP_EOL .
            '							<td> <a href = "javascript:switchLanguage(\'de\');"> <img src = "template/images/i18n/de.png" height = "32" width = "32" alt = "DE" /> </a> </td>' . PHP_EOL .
            '							<td> <a href = "javascript:switchLanguage(\'ru\');"> <img src = "template/images/i18n/ru.png" height = "32" width = "32" alt = "RU" /> </a> </td>' . PHP_EOL .
            '						</tr>' . PHP_EOL .
            '					</tbody>' . PHP_EOL .
            '				</table>' . PHP_EOL .
            '			</div>' . PHP_EOL;
    }

    private function getFreeSpace() {
        return
            '		<div class = "free_space"> </div>' . PHP_EOL;
    }

    private function getMiddleWorkArea() {
        return
            '		<div id = "frame-middle_topline"> </div>' . PHP_EOL .
            '' . PHP_EOL .
            '		<div id = "frame-middle_workarea">' . PHP_EOL .
            '' . PHP_EOL .
            $this->getPage() .
            '		</div>' . PHP_EOL .
            '' . PHP_EOL .
            '		<div id = "frame-middle_btmline"> </div>' . PHP_EOL .
            '' . PHP_EOL;
    }

    private function getPage() {
        return
            '			<div id = "page">' . PHP_EOL .
            '				<div class = "clear"> </div>' . PHP_EOL .
            '' . PHP_EOL .
            $this->getPhoto() .
            $this->getPersonalInformation() .
            $this->getEmploymentHistory() .
            $this->getEducation() .
            $this->getLanguages() .
            $this->getCoursesAndCertificates() .
            $this->getTechnicalSkills() .
            $this->getProjects() .
            '' . PHP_EOL .
            '				<div class = "clear"> </div>' . PHP_EOL .
            '			</div>' . PHP_EOL .
            '' . PHP_EOL;
    }

    private function getPhoto() {
        return
            '				<div id = "photo">' . PHP_EOL .
            '					<img src = "template/images/photo.png" height = "200" width = "147" alt = "' . $this->person->{persons::NAME} . '" />' . PHP_EOL .
            '				</div>' . PHP_EOL;
    }

    private function getPersonalInformation() {
        return
            '				<div id = "info">' . $this->person->{persons::NAME} . '</div>' . PHP_EOL .
            '				<h2>' . $this->person->{persons::JOB_TITLE} . '</h2>' . PHP_EOL .
            '' . PHP_EOL .
            '				<div class = "clear"> </div>' . PHP_EOL .
            '' . PHP_EOL .
            '				<h2>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_PERSONAL_INFORMATION]->{i18n_translations::VALUE} . '</h2>' . PHP_EOL .
            '' . PHP_EOL .
            '				<div class = "table_top_border"> </div>' . PHP_EOL .
            '					<table class = "description">' . PHP_EOL .
            '						<tbody>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_ADDRESS]->{i18n_translations::VALUE} . ' :</td>				<td>' . $this->person->{persons::ADDRESS} . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_PHONE]->{i18n_translations::VALUE} . ' :</td>				<td>' . $this->person->{persons::PHONE} . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_EMAIL]->{i18n_translations::VALUE} . ' :</td>				<td> <a href = "mailto:' . $this->person->{persons::EMAIL} . '">' . $this->person->{persons::EMAIL} . '</a> </td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_SKYPE]->{i18n_translations::VALUE} . ' :</td>				<td> <a href = "skype:' . $this->person->{persons::SKYPE} . '">' . $this->person->{persons::SKYPE} . '</a> </td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_DATE_OF_BIRTH]->{i18n_translations::VALUE} . ' :</td>		<td>' . I18n::localizedDate($this->person->{persons::DATE_OF_BIRTH}, $this->language, I18n::DATE_MONTH_YEAR) . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_PLACE_OF_BIRTH]->{i18n_translations::VALUE} . ' :</td>		<td>' . $this->person->{persons::PLACE_OF_BIRTH} . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_MARITAL_STATUS]->{i18n_translations::VALUE} . ' :</td>		<td>' . $this->person->{marital_statuses::STATUS} . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_HOMEPAGE]->{i18n_translations::VALUE} . ' :</td>				<td> <a href = "' . $this->person->{persons::HOMEPAGE} . '">' . $this->person->{persons::HOMEPAGE} . '</a> </td> </tr>' . PHP_EOL .
            '						</tbody>' . PHP_EOL .
            '					</table>' . PHP_EOL .
            '				<div class = "table_bottom_border"> </div>' . PHP_EOL .
            '' . PHP_EOL .
            '				<div class = "clear"> </div>' . PHP_EOL;
    }

    private function getEmploymentHistory() {
        $employers = $this->db->getEmploymentHistory($this->person->{persons::PK_ID});

        $result =
            '				<h2>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_EMPLOYMENT_HISTORY]->{i18n_translations::VALUE} . '</h2>' . PHP_EOL .
            '' . PHP_EOL;

        foreach ($employers as $employer) {
            $result .=
            '				<div class = "table_top_border"> </div>' . PHP_EOL .
            '					<table class = "description">' . PHP_EOL .
            '						<tbody>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_DATE]->{i18n_translations::VALUE} . ' :</td>					<td>' . I18n::localizedDate($employer->{employers::START_DATE}, $this->language) . ' - ' . I18n::localizedDate($employer->{employers::END_DATE}, $this->language) . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_COMPANY]->{i18n_translations::VALUE} . ' :</td>				<td>' . $employer->{employers::COMPANY} . ', ' . $employer->{employers::HOMEPAGE} . ' </td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_ADDRESS]->{i18n_translations::VALUE} . ' :</td>				<td>' . $employer->{employers::ADDRESS} . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_POSITION]->{i18n_translations::VALUE} . ' :</td>				<td>' . $employer->{positions::POSITION} . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_RESPONSIBILITIES]->{i18n_translations::VALUE} . ' :</td>		<td>' . $employer->{employers::RESPONSIBILITIES} . '</td> </tr>' . PHP_EOL .
            '						</tbody>' . PHP_EOL .
            '					</table>' . PHP_EOL .
            '				<div class = "table_bottom_border"> </div>' . PHP_EOL;
        }

        $result .=
            '' . PHP_EOL .
            '				<div class = "clear"> </div>' . PHP_EOL;

        return $result;
    }

    private function getEducation() {
        $educational_institutions = $this->db->getEducation($this->person->{persons::PK_ID});

        $result =
            '				<h2>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_EDUCATION]->{i18n_translations::VALUE} . '</h2>' . PHP_EOL .
            '' . PHP_EOL;

        foreach ($educational_institutions as $university) {
            $result .=
            '				<div class = "table_top_border"> </div>' . PHP_EOL .
            '					<table class = "description">' . PHP_EOL .
            '						<tbody>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_DATE]->{i18n_translations::VALUE} . ' :</td>					<td>' . I18n::localizedDate($university->{educations::START_DATE}, $this->language) . ' - ' . I18n::localizedDate($university->{educations::END_DATE}, $this->language) . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_EDUCATIONAL_INSTITUTION]->{i18n_translations::VALUE} . ' :</td><td>' . $university->{educations::EDUCATIONAL_INSTITUTION} . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_ADDRESS]->{i18n_translations::VALUE} . ' :</td>				<td>' . $university->{educations::ADDRESS} . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_FACULTY]->{i18n_translations::VALUE} . ' :</td>				<td>' . $university->{educations::FACULTY} . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_DEPARTMENT]->{i18n_translations::VALUE} . ' :</td>			<td>' . $university->{educations::DEPARTMENT} . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_QUALIFICATION]->{i18n_translations::VALUE} . ' :</td>		<td>' . $university->{educations::QUALIFICATION} . '</td> </tr>' . PHP_EOL .
            '						</tbody>' . PHP_EOL .
            '					</table>' . PHP_EOL .
            '				<div class = "table_bottom_border"> </div>' . PHP_EOL;
        }

        $result .=
            '' . PHP_EOL .
            '				<div class = "clear"> </div>' . PHP_EOL;

        return $result;
    }

    private function getLanguages() {
        $languages = $this->db->getLanguages($this->person->{persons::PK_ID});

        $result =
            '				<h2>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_LANGUAGES]->{i18n_translations::VALUE} . '</h2>' . PHP_EOL .
            '' . PHP_EOL .
            '				<div class = "table_top_border"> </div>' . PHP_EOL .
            '					<table class = "description">' . PHP_EOL .
            '						<tbody>' . PHP_EOL;

        foreach ($languages as $language) {
            $languageLevel = $language->{languages::LEVEL};
            if ($languageLevel === GrigorievEn::LANGUAGE_LEVEL_NATIVE || $languageLevel === GrigorievDe::LANGUAGE_LEVEL_NATIVE || $languageLevel === GrigorievRu::LANGUAGE_LEVEL_NATIVE) {
                $result .=
            '							<tr> <td>' . $language->{languages::LANGUAGE} . ' :</td>				<td>' . $languageLevel . '</td> </tr>' . PHP_EOL;
            } else {
                $result .=
            '							<tr> <td>' . $language->{languages::LANGUAGE} . ' :</td>				<td>' . $languageLevel . '<a href="' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_LANGUAGE_CEFR_URL]->{i18n_translations::VALUE} . '">' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_LANGUAGE_CEFR]->{i18n_translations::VALUE} . '</a> </td> </tr>' . PHP_EOL;
            }
        }

        $result .=
            '						</tbody>' . PHP_EOL .
            '					</table>' . PHP_EOL .
            '				<div class = "table_bottom_border"> </div>' . PHP_EOL .
            '' . PHP_EOL .
            '				<div class = "clear"> </div>' . PHP_EOL;

        return $result;
    }

    private function getCoursesAndCertificates() {
        $coursesAndCertificates = $this->db->getCoursesAndCertificates($this->person->{persons::PK_ID});

        $result =
            '				<h2>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_COURSES_AND_CERTIFICATES]->{i18n_translations::VALUE} . '</h2>' . PHP_EOL .
            '' . PHP_EOL;

        foreach ($coursesAndCertificates as $certificate) {
            $result .=
            '				<div class = "table_top_border"> </div>' . PHP_EOL .
            '					<table class = "description">' . PHP_EOL .
            '						<tbody>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_TITLE]->{i18n_translations::VALUE} . ' :</td>				<td>' . $certificate->{courses_and_certificates::TITLE} . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_AWARDED]->{i18n_translations::VALUE} . ' :</td>				<td>' . $certificate->{courses_and_certificates::AWARDED} . '</td> </tr>' . PHP_EOL .
            '							<tr> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_DATE]->{i18n_translations::VALUE} . ' :</td>					<td>' . I18n::localizedDate($certificate->{courses_and_certificates::DATE}, $this->language) . '</td> </tr>' . PHP_EOL .
            '						</tbody>' . PHP_EOL .
            '					</table>' . PHP_EOL .
            '				<div class = "table_bottom_border"> </div>' . PHP_EOL;
        }

        $result .=
            '' . PHP_EOL .
            '				<div class = "clear"> </div>' . PHP_EOL;

        return $result;
    }

    private function getTechnicalSkills() {
        $skills = $this->db->getTechnicalSkills($this->person->{persons::PK_ID});

        $result =
            '				<h2>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_TECHNICAL_SKILLS]->{i18n_translations::VALUE} . '</h2>' . PHP_EOL .
            '' . PHP_EOL .
            '				<div class = "table_top_border"> </div>' . PHP_EOL .
            '				<table class = "description">' . PHP_EOL .
            '					<tbody>' . PHP_EOL .
            '						<tr> <td style = "background-color: transparent;"> </td> <td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_TECHNOLOGY]->{i18n_translations::VALUE} . '</td>	<td style = "text-align:center; width:100px">' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_EXPERIENCE_YEARS]->{i18n_translations::VALUE} . '</td> <td style = "text-align:center; width:120px">' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_PROFICIENCY]->{i18n_translations::VALUE} . '</td> </tr>' . PHP_EOL .
            '					</tbody>' . PHP_EOL .
            '				</table>' . PHP_EOL .
            '' . PHP_EOL;

        $previousCategory = '';
        $isFirst = true;
        foreach ($skills as $skill) {
            $category = $skill->{skill_categories::CATEGORY};

            if ($previousCategory !== $category && !$isFirst) {
                $result .=
            '						</tbody>' . PHP_EOL .
            '					</table>' . PHP_EOL .
            '					<div class = "table_bottom_border"> </div>' . PHP_EOL;
            }

            if ($previousCategory !== $category) {
                $result .=
            '					<div class = "table_top_border"> </div>' . PHP_EOL .
            '					<table class = "description">' . PHP_EOL .
            '						<tbody>' . PHP_EOL .
            '							<tr> <td>' . $skill->{skill_categories::CATEGORY} . ' :</td>	<td>' . $skill->{technical_skills::TECHNOLOGY} . '</td>						<td style = "text-align:center; width:100px">' . $skill->{technical_skills::EXPERIENCE} . '</td>		<td style = "text-align:center; width:120px">' . $skill->{skill_proficiencies::PROFICIENCY} . '</td> </tr>' . PHP_EOL;
            } else {
                $result .=
            '							<tr> <td></td>				<td>' . $skill->{technical_skills::TECHNOLOGY} . '</td>						<td style = "text-align:center; width:100px">' . $skill->{technical_skills::EXPERIENCE} . '</td>		<td style = "text-align:center; width:120px">' . $skill->{skill_proficiencies::PROFICIENCY} . '</td> </tr>' . PHP_EOL;
            }

            $previousCategory = $category;
            $isFirst = false;
        }

        $result .=
            '						</tbody>' . PHP_EOL .
            '					</table>' . PHP_EOL .
            '					<div class = "table_bottom_border"> </div>' . PHP_EOL;

        $result .=
            '' . PHP_EOL .
            '				<div class = "clear"> </div>' . PHP_EOL;

        return $result;
    }


    private function getProjects() {
        $projects = $this->db->getProjects($this->person->{persons::PK_ID});

        $result =
            '				<h2>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_PROJECTS]->{i18n_translations::VALUE} . '</h2>' . PHP_EOL .
                '' . PHP_EOL;

        foreach ($projects as $project) {
            $result .=
            '					<div class="table_top_border"></div>' . PHP_EOL .
            '					<table class="description">' . PHP_EOL .
            '						<tbody>' . PHP_EOL .
            '							<tr><td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_NAME]->{i18n_translations::VALUE} . ' :</td>					<td>' . $project->{projects::NAME} . '</td></tr>' . PHP_EOL .
            '							<tr><td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_DESCRIPTION]->{i18n_translations::VALUE} . ' :</td>			<td>' . $project->{projects::DESCRIPTION} . '</td></tr>' . PHP_EOL .
            '							<tr><td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_POSITION]->{i18n_translations::VALUE} . ' :</td>						<td>' . $project->{positions::POSITION} . '</td></tr>' . PHP_EOL .
            '							<tr><td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_RESPONSIBILITIES]->{i18n_translations::VALUE} . ' :</td>				<td>' . $project->{projects::RESPONSIBILITIES} . '</td></tr>' . PHP_EOL .
            '							<tr><td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_TECHNOLOGIES]->{i18n_translations::VALUE} . ' :</td>					<td>' . $project->{projects::TECHNOLOGIES} . '</td></tr>' . PHP_EOL .
            '							<tr><td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_OPERATING_SYSTEMS]->{i18n_translations::VALUE} . ' :</td>			<td>' . $project->{projects::OPERATING_SYSTEMS} . '</td></tr>' . PHP_EOL .
            '							<tr><td>' . $this->I18nMessages[GrigorievCommon::I18N_TRANSLATION_ID_PROJECT_DURATION]->{i18n_translations::VALUE} . ' :</td>				<td>' . I18n::localizedDate($project->{projects::START_DATE}, $this->language) . ' - ' . I18n::localizedDate($project->{projects::END_DATE}, $this->language) . '</td></tr>' . PHP_EOL .
            '						</tbody>' . PHP_EOL .
            '					</table>' . PHP_EOL .
            '				<div class="table_bottom_border"></div>' . PHP_EOL;
        }

        $result .=
            '' . PHP_EOL .
            '				<div class = "clear"> </div>' . PHP_EOL;

        return $result;
    }

    private function getBottomWorkArea() {
        return
            '' . PHP_EOL .
            '		<div id = "frame-bottom_topline"> </div>' . PHP_EOL .
            '' . PHP_EOL .
            '		<div id = "frame-bottom_workarea">' . PHP_EOL .
            $this->getW3c() .
            $this->getCopyright() .
            '		</div>' . PHP_EOL .
            '' . PHP_EOL;
    }

    private function getW3c() {
        return
            '			<div id = "w3c">' . PHP_EOL .
            '				<table class = "links">' . PHP_EOL .
            '					<tbody>' . PHP_EOL .
            '						<tr>' . PHP_EOL .
            '							<td> <a href = "http://validator.w3.org/check?uri=referer"> <img src = "template/images/valid-xhtml11.png" height = "31" width = "88" alt = "Valid XHTML 1.1"/> </a> </td>' . PHP_EOL .
            '							<td> <a href = "http://jigsaw.w3.org/css-validator/check/referer"> <img src = "template/images/vcss.png" height = "31" width = "88" alt = "Valid CSS!" /> </a > </td>' . PHP_EOL .
            '						</tr>' . PHP_EOL .
            '					</tbody>' . PHP_EOL .
            '				</table>' . PHP_EOL .
            '			</div>' . PHP_EOL;
    }

    private function getCopyright() {
        return
            '			<div id = "copyright">' . PHP_EOL .
            '				<table class = "links">' . PHP_EOL .
            '					<tbody>' . PHP_EOL .
            '						<tr>' . PHP_EOL .
            '							<td style = "height:31px">Sergey Grigoriev &copy; 2011 - ' . date('Y') . '</td>' . PHP_EOL .
            '						</tr>' . PHP_EOL .
            '					</tbody>' . PHP_EOL .
            '				</table>' . PHP_EOL .
            '			</div>' . PHP_EOL;
    }

}