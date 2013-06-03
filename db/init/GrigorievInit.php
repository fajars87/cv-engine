<?php
/**
 * Author: Sergey Grigoriev
 */

class GrigorievInit {
    const EN = 'GrigorievEn';
    const DE = 'GrigorievDe';
    const RU = 'GrigorievRu';

    private static $db;

    public static function initAllData() {
        self::openDb();
        self::initEnData();
        self::initDeData();
        self::initRuData();
    }

    private static function openDb() {
        ORM::configure(Config::getDbConnectionString());
        self::$db = ORM::get_db();
    }

    private static function initData($class) {
        self::$db->beginTransaction();
        self::initI18nLanguages($class);
        self::initMaritalStatuses($class);
        self::initPersons($class);
        self::initPositions($class);
        self::initEmployers($class);
        self::initEducations($class);
        self::initLanguages($class);
        self::initCoursesAndCertificates($class);
        self::initSkillProficiencies($class);
        self::initSkillCategories($class);
        self::initTechnicalSkills($class);
        self::initProjects($class);
        self::initI18nTranslations($class);
        self::$db->commit();
    }

    private static function initEnData() {
        self::initData(self::EN);
    }

    private static function initDeData() {
        self::initData(self::DE);
    }

    private static function initRuData() {
        self::initData(self::RU);
    }

    private static function getI18nLanguageIdSelect($class) {
        $lang_id = '(SELECT ' . i18n_languages::PK_ID .
            ' FROM ' . i18n_languages::tableName() .
            ' WHERE ' . i18n_languages::LANGUAGE . '="' . $class::LANG . '"' .
            ' LIMIT 1)';
        return $lang_id;
    }

    private static function getUserIdSelectByLang($class, $languageId) {
        $personId = '(SELECT ' . persons::PK_ID .
            ' FROM ' . persons::tableName() .
            ' WHERE ' . persons::UNIQUE_NAME . '="' . $class::PERSON_PERSON_UNIQUE_NAME . '"' .
            ' AND ' . persons::FK_I18N_LANGUAGE_ID . '=' . $languageId .
            ' LIMIT 1)';
        return $personId;
    }

    private static function getUserIdSelect($class) {
        return self::getUserIdSelectByLang($class, self::getI18nLanguageIdSelect($class));
    }

    private static function getPositionIdSelect($class, $position) {
        $positionId = '(SELECT ' . positions::PK_ID .
            ' FROM ' . positions::tableName() .
            ' WHERE ' . positions::POSITION . '="' . $position . '"' .
            ' LIMIT 1)';
        return $positionId;
    }

    private static function getPositionSoftwareEngineerIdSelect($class) {
        return self::getPositionIdSelect($class, $class::POSITION_SOFTWARE_ENGINEER);
    }

    private static function getPositionSeniorSoftwareEngineerIdSelect($class) {
        return self::getPositionIdSelect($class, $class::POSITION_SENIOR_SOFTWARE_ENGINEER);
    }

    private static function getPositionTeamLeaderSeniorSoftwareEngineerIdSelect($class) {
        return self::getPositionIdSelect($class, $class::POSITION_TEAM_LEADER_SENIOR_SOFTWARE_ENGINEER);
    }

    private static function getPositionTeamLeaderIdSelect($class) {
        return self::getPositionIdSelect($class, $class::POSITION_TEAM_LEADER);
    }

    private static function getMaritalStatusIdSelect($class, $maritalStatus) {
        $maritalStatusId = '(SELECT ' . marital_statuses::PK_ID .
            ' FROM ' . marital_statuses::tableName() .
            ' WHERE ' . marital_statuses::STATUS . '="' . $maritalStatus . '"' .
            ' LIMIT 1)';
        return $maritalStatusId;
    }

    private static function getSingleIdSelect($class) {
        return self::getMaritalStatusIdSelect($class, $class::MARITAL_STATUS_SINGLE);
    }

    private static function getMarriedIdSelect($class) {
        return self::getMaritalStatusIdSelect($class, $class::MARITAL_STATUS_MARRIED);
    }

    private static function getI18nLanguageInsert($language) {
        $insert = 'INSERT INTO ' . i18n_languages::tableName() . '(' .
            i18n_languages::LANGUAGE .
            ') VALUES ("' .
            $language .
            '")';
        return $insert;
    }

    private static function initI18nLanguages($class) {
        $sql = self::getI18nLanguageInsert($class::LANG);

        return self::$db->exec($sql);
    }

    private static function getMaritalStatusInsert($maritalStatus) {
        $insert = 'INSERT INTO ' . marital_statuses::tableName() . ' (' .
            marital_statuses::STATUS .
            ') VALUES ("' .
            $maritalStatus .
            '");';
        return $insert;
    }

    private static function initMaritalStatuses($class) {
        $sql = self::getMaritalStatusInsert($class::MARITAL_STATUS_SINGLE);
        $sql .= self::getMaritalStatusInsert($class::MARITAL_STATUS_MARRIED);

        return self::$db->exec($sql);
    }

    private static function getPersonInsert($name, $jobTitle, $address, $phone, $email, $skype, $dateOfBirth, $placeOfBirth, $singleId, $homepage, $uniqueName, $langId) {
        $insert = 'INSERT INTO ' . persons::tableName() . ' (' .
            persons::NAME . ', ' .
            persons::JOB_TITLE . ', ' .
            persons::ADDRESS . ', ' .
            persons::PHONE . ', ' .
            persons::EMAIL . ', ' .
            persons::SKYPE . ', ' .
            persons::DATE_OF_BIRTH . ', ' .
            persons::PLACE_OF_BIRTH . ', ' .
            persons::FK_MARITAL_STATUS_ID . ', ' .
            persons::HOMEPAGE . ', ' .
            persons::UNIQUE_NAME . ', ' .
            persons::FK_I18N_LANGUAGE_ID .
            ') VALUES ("' .
            $name . '", "' .
            $jobTitle . '", "' .
            $address . '", "' .
            $phone . '", "' .
            $email . '", "' .
            $skype . '", "' .
            $dateOfBirth . '", "' .
            $placeOfBirth . '", ' .
            $singleId . ', "' .
            $homepage . '", "' .
            $uniqueName . '", ' .
            $langId .
            ');';
        return $insert;
    }

    private static function initPersons($class) {
        $singleId = self::getSingleIdSelect($class);
        $personId = self::getI18nLanguageIdSelect($class);

        $sql = self::getPersonInsert(
            $class::PERSON_NAME,
            $class::PERSON_JOB_TITLE,
            $class::PERSON_ADDRESS,
            $class::PERSON_PHONE,
            $class::PERSON_EMAIL,
            $class::PERSON_SKYPE,
            $class::PERSON_DATE_OF_BIRTH,
            $class::PERSON_PLACE_OF_BIRTH,
            $singleId,
            $class::PERSON_HOMEPAGE,
            $class::PERSON_PERSON_UNIQUE_NAME,
            $personId
        );

        return self::$db->exec($sql);
    }

    private static function getPositionInsert($position) {
        $insert = 'INSERT INTO ' . positions::tableName() . ' (' .
            positions::POSITION .
            ') VALUES ("' .
            $position . '"' .
            ');';
        return $insert;
    }

    private static function initPositions($class) {
        $sql = self::getPositionInsert($class::POSITION_SOFTWARE_ENGINEER);
        $sql .= self::getPositionInsert($class::POSITION_SENIOR_SOFTWARE_ENGINEER);
        $sql .= self::getPositionInsert($class::POSITION_TEAM_LEADER_SENIOR_SOFTWARE_ENGINEER);
        $sql .= self::getPositionInsert($class::POSITION_TEAM_LEADER);

        return self::$db->exec($sql);
    }

    private static function getEmployerInsert($company, $homepage, $address, $positionId, $responsibilities, $startDate, $endDate, $personId) {
        $insert = 'INSERT INTO ' . employers::tableName() . ' (' .
            employers::COMPANY . ', ' .
            employers::HOMEPAGE . ', ' .
            employers::ADDRESS . ', ' .
            employers::FK_POSITION_ID . ', ' .
            employers::RESPONSIBILITIES . ', ' .
            employers::START_DATE . ', ' .
            employers::END_DATE . ', ' .
            employers::FK_PERSON_ID .
            ') VALUES ("' .
            $company . '", "' .
            $homepage . '", "' .
            $address . '", ' .
            $positionId . ', "' .
            $responsibilities . '", "' .
            $startDate . '", "' .
            $endDate . '", ' .
            $personId .
            ');';
        return $insert;
    }

    private static function initEmployers($class) {
        $softwareEngineerId = self::getPositionSoftwareEngineerIdSelect($class);
        $seniorSoftwareEngineerId = self::getPositionSeniorSoftwareEngineerIdSelect($class);
        $teamLeaderId = self::getPositionTeamLeaderIdSelect($class);
        $languageId = self::getI18nLanguageIdSelect($class);
        $personId = self::getUserIdSelectByLang($class, $languageId);

        $sql = self::getEmployerInsert(
            $class::EMPLOYER_SAM_SOLUTIONS_BELARUS_COMPANY,
            $class::EMPLOYER_SAM_SOLUTIONS_BELARUS_HOMEPAGE,
            $class::EMPLOYER_SAM_SOLUTIONS_BELARUS_ADDRESS,
            $teamLeaderId,
            $class::EMPLOYER_SAM_SOLUTIONS_BELARUS_TL_RESPONSIBILITIES,
            $class::EMPLOYER_SAM_SOLUTIONS_BELARUS_TL_START_DATE,
            $class::EMPLOYER_SAM_SOLUTIONS_BELARUS_TL_END_DATE,
            $personId
        );
        $sql .= self::getEmployerInsert(
            $class::EMPLOYER_SAM_SOLUTIONS_BELARUS_COMPANY,
            $class::EMPLOYER_SAM_SOLUTIONS_BELARUS_HOMEPAGE,
            $class::EMPLOYER_SAM_SOLUTIONS_BELARUS_ADDRESS,
            $seniorSoftwareEngineerId,
            $class::EMPLOYER_SAM_SOLUTIONS_BELARUS_SSE_RESPONSIBILITIES,
            $class::EMPLOYER_SAM_SOLUTIONS_BELARUS_SSE_START_DATE,
            $class::EMPLOYER_SAM_SOLUTIONS_BELARUS_SSE_END_DATE,
            $personId
        );
        $sql .= self::getEmployerInsert(
            $class::EMPLOYER_BSUIR_CPI_COMPANY,
            $class::EMPLOYER_BSUIR_CPI_HOMEPAGE,
            $class::EMPLOYER_BSUIR_CPI_ADDRESS,
            $softwareEngineerId,
            $class::EMPLOYER_BSUIR_CPI_RESPONSIBILITIES,
            $class::EMPLOYER_BSUIR_CPI_START_DATE,
            $class::EMPLOYER_BSUIR_CPI_END_DATE,
            $personId
        );

        return self::$db->exec($sql);
    }

    private static function getEducationInsert($educationalInstitution, $address, $faculty, $department, $qualification, $startDate, $endDate, $personId) {
        $insert = 'INSERT INTO ' . educations::tableName() . ' (' .
            educations::EDUCATIONAL_INSTITUTION . ', ' .
            educations::ADDRESS . ', ' .
            educations::FACULTY . ', ' .
            educations::DEPARTMENT . ', ' .
            educations::QUALIFICATION . ', ' .
            educations::START_DATE . ', ' .
            educations::END_DATE . ', ' .
            employers::FK_PERSON_ID .
            ') VALUES ("' .
            $educationalInstitution . '", "' .
            $address . '", "' .
            $faculty . '", "' .
            $department . '", "' .
            $qualification . '", "' .
            $startDate . '", "' .
            $endDate . '", ' .
            $personId .
            ');';
        return $insert;
    }

    private static function initEducations($class) {
        $personId = self::getUserIdSelect($class);
        $sql = self::getEducationInsert(
            $class::EDUCATION_BSUIR_EDUCATIONAL_INSTITUTION,
            $class::EDUCATION_BSUIR_ADDRESS,
            $class::EDUCATION_BSUIR_FACULTY,
            $class::EDUCATION_BSUIR_DEPARTMENT,
            $class::EDUCATION_BSUIR_QUALIFICATION,
            $class::EDUCATION_BSUIR_START_DATE,
            $class::EDUCATION_BSUIR_END_DATE,
            $personId
        );
        $sql .= self::getEducationInsert(
            $class::EDUCATION_BSEU_EDUCATIONAL_INSTITUTION,
            $class::EDUCATION_BSEU_ADDRESS,
            $class::EDUCATION_BSEU_FACULTY,
            $class::EDUCATION_BSEU_DEPARTMENT,
            $class::EDUCATION_BSEU_QUALIFICATION,
            $class::EDUCATION_BSEU_START_DATE,
            $class::EDUCATION_BSEU_END_DATE,
            $personId
        );

        return self::$db->exec($sql);
    }


    private static function getLanguageInsert($language, $level, $personId) {
        $insert = 'INSERT INTO ' . languages::tableName() . ' (' .
            languages::LANGUAGE . ', ' .
            languages::LEVEL . ', ' .
            employers::FK_PERSON_ID .
            ') VALUES ("' .
            $language . '", "' .
            $level . '", ' .
            $personId .
            ');';
        return $insert;
    }

    private static function initLanguages($class) {
        $personId = self::getUserIdSelect($class);
        $sql = self::getLanguageInsert(
            $class::LANGUAGE_ENGLISH,
            $class::LANGUAGE_LEVEL_B2,
            $personId
        );
        $sql .= self::getLanguageInsert(
            $class::LANGUAGE_GERMAN,
            $class::LANGUAGE_LEVEL_A2,
            $personId
        );
        $sql .= self::getLanguageInsert(
            $class::LANGUAGE_RUSSIAN,
            $class::LANGUAGE_LEVEL_NATIVE,
            $personId
        );
        $sql .= self::getLanguageInsert(
            $class::LANGUAGE_BELARUSIAN,
            $class::LANGUAGE_LEVEL_NATIVE,
            $personId
        );

        return self::$db->exec($sql);
    }

    private static function getCourseAndCertificateInsert($title, $awarded, $date, $personId) {
        $insert = 'INSERT INTO ' . courses_and_certificates::tableName() . ' (' .
            courses_and_certificates::TITLE . ', ' .
            courses_and_certificates::AWARDED . ', ' .
            courses_and_certificates::DATE . ', ' .
            employers::FK_PERSON_ID .
            ') VALUES ("' .
            $title . '", "' .
            $awarded . '", "' .
            $date . '", ' .
            $personId .
            ');';
        return $insert;
    }

    private static function initCoursesAndCertificates($class) {
        $personId = self::getUserIdSelect($class);
        $sql = self::getCourseAndCertificateInsert(
            $class::COURSE_AND_CERTIFICATE_SOFTWARE_REQUIREMENTS_DEVELOPMENT_AND_MANAGEMENT_TITLE,
            $class::COURSE_AND_CERTIFICATE_SOFTWARE_REQUIREMENTS_DEVELOPMENT_AND_MANAGEMENT_AWARDED,
            $class::COURSE_AND_CERTIFICATE_SOFTWARE_REQUIREMENTS_DEVELOPMENT_AND_MANAGEMENT_DATE,
            $personId
        );
        $sql .= self::getCourseAndCertificateInsert(
            $class::COURSE_AND_CERTIFICATE_ESTIMATIONS_FOR_SOFTWARE_PROJECTS_TITLE,
            $class::COURSE_AND_CERTIFICATE_ESTIMATIONS_FOR_SOFTWARE_PROJECTS_AWARDED,
            $class::COURSE_AND_CERTIFICATE_ESTIMATIONS_FOR_SOFTWARE_PROJECTS_DATE,
            $personId
        );
        $sql .= self::getCourseAndCertificateInsert(
            $class::COURSE_AND_CERTIFICATE_IBM_RATIONAL_CLEARCASE_TITLE,
            $class::COURSE_AND_CERTIFICATE_IBM_RATIONAL_CLEARCASE_AWARDED,
            $class::COURSE_AND_CERTIFICATE_IBM_RATIONAL_CLEARCASE_DATE,
            $personId
        );
        $sql .= self::getCourseAndCertificateInsert(
            $class::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_A2_TITLE,
            $class::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_A2_AWARDED,
            $class::COURSE_AND_CERTIFICATE_GOETHE_ZERTIFIKAT_A2_DATE,
            $personId
        );
        $sql .= self::getCourseAndCertificateInsert(
            $class::COURSE_AND_CERTIFICATE_AGILE_ENGINEERING_PRACTICES_TITLE,
            $class::COURSE_AND_CERTIFICATE_AGILE_ENGINEERING_PRACTICES_AWARDED,
            $class::COURSE_AND_CERTIFICATE_AGILE_ENGINEERING_PRACTICES_DATE,
            $personId
        );
        $sql .= self::getCourseAndCertificateInsert(
            $class::COURSE_AND_CERTIFICATE_TDD_IN_JAVA_TITLE,
            $class::COURSE_AND_CERTIFICATE_TDD_IN_JAVA_AWARDED,
            $class::COURSE_AND_CERTIFICATE_TDD_IN_JAVA_DATE,
            $personId
        );
        $sql .= self::getCourseAndCertificateInsert(
            $class::COURSE_AND_CERTIFICATE_PRAGMATIC_TDD_TITLE,
            $class::COURSE_AND_CERTIFICATE_PRAGMATIC_TDD_AWARDED,
            $class::COURSE_AND_CERTIFICATE_PRAGMATIC_TDD_DATE,
            $personId
        );

        return self::$db->exec($sql);
    }

    private static function getSkillProficiencyInsert($proficiency) {
        $insert = 'INSERT INTO ' . skill_proficiencies::tableName() . ' (' .
            skill_proficiencies::PROFICIENCY .
            ') VALUES ("' .
            $proficiency . '"' .
            ');';
        return $insert;
    }

    private static function initSkillProficiencies($class) {
        $sql = self::getSkillProficiencyInsert(
            $class::SKILL_PROFICIENCY_EXCELLENT
        );
        $sql .= self::getSkillProficiencyInsert(
            $class::SKILL_PROFICIENCY_GOOD
        );
        $sql .= self::getSkillProficiencyInsert(
            $class::SKILL_PROFICIENCY_BASIC
        );

        return self::$db->exec($sql);
    }

    private static function getSkillCategoryInsert($categoryId, $category) {
        $insert = 'INSERT INTO ' . skill_categories::tableName() . ' (' .
            skill_categories::CATEGORY_ID . ', ' .
            skill_categories::CATEGORY .
            ') VALUES (' .
            $categoryId . ', "' .
            $category . '"' .
            ');';
        return $insert;
    }

    private static function initSkillCategories($class) {
        $sql = self::getSkillCategoryInsert(
            GrigorievCommon::SKILL_CATEGORY_ID_PROGRAMMING_LANGUAGES,
            $class::SKILL_CATEGORY_PROGRAMMING_LANGUAGES
        );
        $sql .= self::getSkillCategoryInsert(
            GrigorievCommon::SKILL_CATEGORY_ID_TECHNOLOGIES,
            $class::SKILL_CATEGORY_TECHNOLOGIES
        );
        $sql .= self::getSkillCategoryInsert(
            GrigorievCommon::SKILL_CATEGORY_ID_OPERATING_SYSTEMS,
            $class::SKILL_CATEGORY_OPERATING_SYSTEMS
        );
        $sql .= self::getSkillCategoryInsert(
            GrigorievCommon::SKILL_CATEGORY_ID_RDBMSS,
            $class::SKILL_CATEGORY_RDBMSS
        );
        $sql .= self::getSkillCategoryInsert(
            GrigorievCommon::SKILL_CATEGORY_ID_WEB_AND_APPLICATION_SERVERS,
            $class::SKILL_CATEGORY_WEB_AND_APPLICATION_SERVERS
        );
        $sql .= self::getSkillCategoryInsert(
            GrigorievCommon::SKILL_CATEGORY_ID_CASE_AND_PROJECT_TOOLS,
            $class::SKILL_CATEGORY_CASE_AND_PROJECT_TOOLS
        );
        $sql .= self::getSkillCategoryInsert(
            GrigorievCommon::SKILL_CATEGORY_ID_IDES,
            $class::SKILL_CATEGORY_IDES
        );

        return self::$db->exec($sql);
    }

    private static function getTechnicalSkillInsert($categoryId, $technology, $experience, $proficiencyId, $personId) {
        $insert = 'INSERT INTO ' . technical_skills::tableName() . ' (' .
            technical_skills::FK_CATEGORY_ID . ', ' .
            technical_skills::TECHNOLOGY . ', ' .
            technical_skills::EXPERIENCE . ', ' .
            technical_skills::FK_PROFICIENCY_ID . ', ' .
            technical_skills::FK_PERSON_ID .
            ') VALUES (' .
            $categoryId . ', "' .
            $technology . '", "' .
            $experience . '", ' .
            $proficiencyId . ', ' .
            $personId .
            ');';
        return $insert;
    }

    private static function getSkillProficiencyIdSelect($proficiency) {
        $proficiencyId = '(SELECT ' . skill_proficiencies::PK_ID .
            ' FROM ' . skill_proficiencies::tableName() .
            ' WHERE ' . skill_proficiencies::PROFICIENCY . '="' . $proficiency . '"' .
            ' LIMIT 1)';
        return $proficiencyId;
    }

    private static function getSkillProficiencyExcellentIdSelect($class) {
        return self::getSkillProficiencyIdSelect($class::SKILL_PROFICIENCY_EXCELLENT);
    }

    private static function getSkillProficiencyGoodIdSelect($class) {
        return self::getSkillProficiencyIdSelect($class::SKILL_PROFICIENCY_GOOD);
    }

    private static function getSkillProficiencyBasicIdSelect($class) {
        return self::getSkillProficiencyIdSelect($class::SKILL_PROFICIENCY_BASIC);
    }

    private static function getSkillCategoryIdSelect($category) {
        $categoryId = '(SELECT ' . skill_categories::PK_ID .
            ' FROM ' . skill_categories::tableName() .
            ' WHERE ' . skill_categories::CATEGORY . '="' . $category . '"' .
            ' LIMIT 1)';
        return $categoryId;
    }

    private static function getSkillCategoryProgrammingLanguagesIdSelect($class) {
        return self::getSkillCategoryIdSelect($class::SKILL_CATEGORY_PROGRAMMING_LANGUAGES);
    }

    private static function getSkillCategoryTechnologiesIdSelect($class) {
        return self::getSkillCategoryIdSelect($class::SKILL_CATEGORY_TECHNOLOGIES);
    }

    private static function getSkillCategoryOperatingSystemsIdSelect($class) {
        return self::getSkillCategoryIdSelect($class::SKILL_CATEGORY_OPERATING_SYSTEMS);
    }

    private static function getSkillCategoryRdbmssIdSelect($class) {
        return self::getSkillCategoryIdSelect($class::SKILL_CATEGORY_RDBMSS);
    }

    private static function getSkillCategoryWebAndApplicationServersIdSelect($class) {
        return self::getSkillCategoryIdSelect($class::SKILL_CATEGORY_WEB_AND_APPLICATION_SERVERS);
    }

    private static function getSkillCategoryCaseAndProjectToolsIdSelect($class) {
        return self::getSkillCategoryIdSelect($class::SKILL_CATEGORY_CASE_AND_PROJECT_TOOLS);
    }

    private static function getSkillCategoryIdesIdSelect($class) {
        return self::getSkillCategoryIdSelect($class::SKILL_CATEGORY_IDES);
    }


    private static function initTechnicalSkills($class) {
        $excellentId = self::getSkillProficiencyExcellentIdSelect($class);
        $goodId = self::getSkillProficiencyGoodIdSelect($class);
        $basicId = self::getSkillProficiencyBasicIdSelect($class);
        $programmingLanguageId = self::getSkillCategoryProgrammingLanguagesIdSelect($class);
        $technologyId = self::getSkillCategoryTechnologiesIdSelect($class);
        $operatingSystemId = self::getSkillCategoryOperatingSystemsIdSelect($class);
        $rdbmsId = self::getSkillCategoryRdbmssIdSelect($class);
        $webAndApplicationServerId = self::getSkillCategoryWebAndApplicationServersIdSelect($class);
        $caseAndProjectToolId = self::getSkillCategoryCaseAndProjectToolsIdSelect($class);
        $ideId = self::getSkillCategoryIdesIdSelect($class);
        $personId = self::getUserIdSelect($class);

        // Programming languages
        $sql = self::getTechnicalSkillInsert(
            $programmingLanguageId,
            $class::PROGRAMMING_LANGUAGE_JAVA,
            $class::PROGRAMMING_LANGUAGE_JAVA_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $programmingLanguageId,
            $class::PROGRAMMING_LANGUAGE_C,
            $class::PROGRAMMING_LANGUAGE_C_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $programmingLanguageId,
            $class::PROGRAMMING_LANGUAGE_CPP,
            $class::PROGRAMMING_LANGUAGE_CPP_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $programmingLanguageId,
            $class::PROGRAMMING_LANGUAGE_OBJECTIVE_C,
            $class::PROGRAMMING_LANGUAGE_OBJECTIVE_C_EXPERIENCE,
            $basicId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $programmingLanguageId,
            $class::PROGRAMMING_LANGUAGE_CSHARP,
            $class::PROGRAMMING_LANGUAGE_CSHARP_EXPERIENCE,
            $basicId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $programmingLanguageId,
            $class::PROGRAMMING_LANGUAGE_SQL,
            $class::PROGRAMMING_LANGUAGE_SQL_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $programmingLanguageId,
            $class::PROGRAMMING_LANGUAGE_XML,
            $class::PROGRAMMING_LANGUAGE_XML_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $programmingLanguageId,
            $class::PROGRAMMING_LANGUAGE_PHP,
            $class::PROGRAMMING_LANGUAGE_PHP_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $programmingLanguageId,
            $class::PROGRAMMING_LANGUAGE_JAVASCRIPT,
            $class::PROGRAMMING_LANGUAGE_JAVASCRIPT_EXPERIENCE,
            $basicId,
            $personId
        );

        // Technologies
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_J2SE,
            $class::TECHNOLOGY_J2SE_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_J2EE,
            $class::TECHNOLOGY_J2EE_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_HIBERNATE,
            $class::TECHNOLOGY_HIBERNATE_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_SPRING_FRAMEWORK,
            $class::TECHNOLOGY_SPRING_FRAMEWORK_EXPERIENCE,
            $basicId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_SWING,
            $class::TECHNOLOGY_SWING_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_APACHE_WICKET,
            $class::TECHNOLOGY_APACHE_WICKET_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_JAVA_SERVLETS,
            $class::TECHNOLOGY_JAVA_SERVLETS_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_JSP,
            $class::TECHNOLOGY_JSP_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_APPLETS,
            $class::TECHNOLOGY_APPLETS_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_JUNIT,
            $class::TECHNOLOGY_JUNIT_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_JNI,
            $class::TECHNOLOGY_JNI_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_SOAP,
            $class::TECHNOLOGY_SOAP_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_CPP_STDLIB,
            $class::TECHNOLOGY_CPP_STDLIB_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_COCOA_FRAMEWORK,
            $class::TECHNOLOGY_COCOA_FRAMEWORK_EXPERIENCE,
            $basicId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $technologyId,
            $class::TECHNOLOGY_CARBONLIB,
            $class::TECHNOLOGY_CARBONLIB_EXPERIENCE,
            $basicId,
            $personId
        );

        // Operating Systems
        $sql .= self::getTechnicalSkillInsert(
            $operatingSystemId,
            $class::OPERATING_SYSTEM_MS_WINDOWS,
            $class::OPERATING_SYSTEM_MS_WINDOWS_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $operatingSystemId,
            $class::OPERATING_SYSTEM_LINUX,
            $class::OPERATING_SYSTEM_LINUX_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $operatingSystemId,
            $class::OPERATING_SYSTEM_MACOS_X10,
            $class::OPERATING_SYSTEM_MACOS_X10_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $operatingSystemId,
            $class::OPERATING_SYSTEM_ANDROID,
            $class::OPERATING_SYSTEM_ANDROID_EXPERIENCE,
            $basicId,
            $personId
        );

        // RDBMSs
        $sql .= self::getTechnicalSkillInsert(
            $rdbmsId,
            $class::RDBMS_MSSQL,
            $class::RDBMS_MSSQL_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $rdbmsId,
            $class::RDBMS_POSTGRESQL,
            $class::RDBMS_POSTGRESQL_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $rdbmsId,
            $class::RDBMS_SQLITE,
            $class::RDBMS_SQLITE_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $rdbmsId,
            $class::RDBMS_MYSQL,
            $class::RDBMS_MYSQL_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $rdbmsId,
            $class::RDBMS_H2,
            $class::RDBMS_H2_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $rdbmsId,
            $class::RDBMS_ORACLE,
            $class::RDBMS_ORACLE_EXPERIENCE,
            $basicId,
            $personId
        );

        // Web and Application Servers
        $sql .= self::getTechnicalSkillInsert(
            $webAndApplicationServerId,
            $class::WEB_AND_APPLICATION_SERVER_APACHE_HTTP_SERVER,
            $class::WEB_AND_APPLICATION_SERVER_APACHE_HTTP_SERVER_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $webAndApplicationServerId,
            $class::WEB_AND_APPLICATION_SERVER_APACHE_TOMCAT,
            $class::WEB_AND_APPLICATION_SERVER_APACHE_TOMCAT_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $webAndApplicationServerId,
            $class::WEB_AND_APPLICATION_SERVER_JBOSS_AS,
            $class::WEB_AND_APPLICATION_SERVER_JBOSS_AS_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $webAndApplicationServerId,
            $class::WEB_AND_APPLICATION_SERVER_JETTY,
            $class::WEB_AND_APPLICATION_SERVER_JETTY_EXPERIENCE,
            $basicId,
            $personId
        );

        // CASE and Project Tools
        $sql .= self::getTechnicalSkillInsert(
            $caseAndProjectToolId,
            $class::CASE_AND_PROJECT_TOOL_SVN,
            $class::CASE_AND_PROJECT_TOOL_SVN_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $caseAndProjectToolId,
            $class::CASE_AND_PROJECT_TOOL_IBM_CLEARCASE,
            $class::CASE_AND_PROJECT_TOOL_IBM_CLEARCASE_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $caseAndProjectToolId,
            $class::CASE_AND_PROJECT_TOOL_CVS,
            $class::CASE_AND_PROJECT_TOOL_CVS_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $caseAndProjectToolId,
            $class::CASE_AND_PROJECT_TOOL_MS_PROJECT,
            $class::CASE_AND_PROJECT_TOOL_MS_PROJECT_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $caseAndProjectToolId,
            $class::CASE_AND_PROJECT_TOOL_HUDSON_JENKINS,
            $class::CASE_AND_PROJECT_TOOL_HUDSON_JENKINS_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $caseAndProjectToolId,
            $class::CASE_AND_PROJECT_TOOL_JIRA,
            $class::CASE_AND_PROJECT_TOOL_JIRA_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $caseAndProjectToolId,
            $class::CASE_AND_PROJECT_TOOL_BUGZILLA,
            $class::CASE_AND_PROJECT_TOOL_BUGZILLA_EXPERIENCE,
            $goodId,
            $personId
        );

        // IDEs
        $sql .= self::getTechnicalSkillInsert(
            $ideId,
            $class::IDE_ECLIPSE,
            $class::IDE_ECLIPSE_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $ideId,
            $class::IDE_MS_VISUAL_STUDIO,
            $class::IDE_MS_VISUAL_STUDIO_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $ideId,
            $class::IDE_INTELLIJ_IDEA,
            $class::IDE_INTELLIJ_IDEA_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $ideId,
            $class::IDE_INTELLIJ_PHPSTORM,
            $class::IDE_INTELLIJ_PHPSTORM_EXPERIENCE,
            $excellentId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $ideId,
            $class::IDE_NETBEANS,
            $class::IDE_NETBEANS_EXPERIENCE,
            $goodId,
            $personId
        );
        $sql .= self::getTechnicalSkillInsert(
            $ideId,
            $class::IDE_XCODE,
            $class::IDE_XCODE_EXPERIENCE,
            $basicId,
            $personId
        );

        return self::$db->exec($sql);
    }

    private static function getProjectInsert($name, $description, $positionId, $responsibilities, $technologies, $operatingSystems, $startDate, $endDate, $personId) {
        $insert = 'INSERT INTO ' . projects::tableName() . ' (' .
            projects::NAME . ', ' .
            projects::DESCRIPTION . ', ' .
            projects::FK_POSITION_ID . ', ' .
            projects::RESPONSIBILITIES . ', ' .
            projects::TECHNOLOGIES . ', ' .
            projects::OPERATING_SYSTEMS . ', ' .
            projects::START_DATE . ', ' .
            projects::END_DATE . ', ' .
            projects::FK_PERSON_ID .
            ') VALUES ("' .
            $name . '", "' .
            $description . '", ' .
            $positionId . ', "' .
            $responsibilities . '", "' .
            $technologies . '", "' .
            $operatingSystems . '", "' .
            $startDate . '", "' .
            $endDate . '", ' .
            $personId .
            ');';
        return $insert;
    }

    private static function initProjects($class) {
        $softwareEngineerId = self::getPositionSoftwareEngineerIdSelect($class);
        $seniorSoftwareEngineerId = self::getPositionSeniorSoftwareEngineerIdSelect($class);
        $teamLeaderSeniorSoftwareEngineerId = self::getPositionTeamLeaderSeniorSoftwareEngineerIdSelect($class);
        $teamLeaderId = self::getPositionTeamLeaderIdSelect($class);
        $personId = self::getUserIdSelect($class);

        $sql = self::getProjectInsert(
            $class::PROJECT_OASIS_NAME,
            $class::PROJECT_OASIS_DESCRIPTION,
            $softwareEngineerId,
            $class::PROJECT_OASIS_RESPONSIBILITIES,
            $class::PROJECT_OASIS_TECHNOLOGIES,
            $class::PROJECT_OASIS_OPERATING_SYSTEMS,
            $class::PROJECT_OASIS_START_DATE,
            $class::PROJECT_OASIS_END_DATE,
            $personId
        );
        $sql .= self::getProjectInsert(
            $class::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_NAME,
            $class::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_DESCRIPTION,
            $softwareEngineerId,
            $class::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_RESPONSIBILITIES,
            $class::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_TECHNOLOGIES,
            $class::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_OPERATING_SYSTEMS,
            $class::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_START_DATE,
            $class::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_END_DATE,
            $personId
        );
        $sql .= self::getProjectInsert(
            $class::PROJECT_CDROMTOOL_NAME,
            $class::PROJECT_CDROMTOOL_DESCRIPTION,
            $softwareEngineerId,
            $class::PROJECT_CDROMTOOL_RESPONSIBILITIES,
            $class::PROJECT_CDROMTOOL_TECHNOLOGIES,
            $class::PROJECT_CDROMTOOL_OPERATING_SYSTEMS,
            $class::PROJECT_CDROMTOOL_START_DATE,
            $class::PROJECT_CDROMTOOL_END_DATE,
            $personId
        );
        $sql .= self::getProjectInsert(
            $class::PROJECT_OASIS_X10_NAME,
            $class::PROJECT_OASIS_X10_DESCRIPTION,
            $softwareEngineerId,
            $class::PROJECT_OASIS_X10_RESPONSIBILITIES,
            $class::PROJECT_OASIS_X10_TECHNOLOGIES,
            $class::PROJECT_OASIS_X10_OPERATING_SYSTEMS,
            $class::PROJECT_OASIS_X10_START_DATE,
            $class::PROJECT_OASIS_X10_END_DATE,
            $personId
        );
        $sql .= self::getProjectInsert(
            $class::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_NAME,
            $class::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_DESCRIPTION,
            $softwareEngineerId,
            $class::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_RESPONSIBILITIES,
            $class::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_TECHNOLOGIES,
            $class::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_OPERATING_SYSTEMS,
            $class::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_START_DATE,
            $class::PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_END_DATE,
            $personId
        );
        $sql .= self::getProjectInsert(
            $class::PROJECT_LOTUS_NOTES_APM_NAME,
            $class::PROJECT_LOTUS_NOTES_APM_DESCRIPTION,
            $softwareEngineerId,
            $class::PROJECT_LOTUS_NOTES_APM_RESPONSIBILITIES,
            $class::PROJECT_LOTUS_NOTES_APM_TECHNOLOGIES,
            $class::PROJECT_LOTUS_NOTES_APM_OPERATING_SYSTEMS,
            $class::PROJECT_LOTUS_NOTES_APM_START_DATE,
            $class::PROJECT_LOTUS_NOTES_APM_END_DATE,
            $personId
        );
        $sql .= self::getProjectInsert(
            $class::PROJECT_VAULTDR_NAME,
            $class::PROJECT_VAULTDR_DESCRIPTION,
            $softwareEngineerId,
            $class::PROJECT_VAULTDR_RESPONSIBILITIES,
            $class::PROJECT_VAULTDR_TECHNOLOGIES,
            $class::PROJECT_VAULTDR_OPERATING_SYSTEMS,
            $class::PROJECT_VAULTDR_START_DATE,
            $class::PROJECT_VAULTDR_END_DATE,
            $personId
        );
        $sql .= self::getProjectInsert(
            $class::PROJECT_MYSQL_APM_NAME,
            $class::PROJECT_MYSQL_APM_DESCRIPTION,
            $softwareEngineerId,
            $class::PROJECT_MYSQL_APM_RESPONSIBILITIES,
            $class::PROJECT_MYSQL_APM_TECHNOLOGIES,
            $class::PROJECT_MYSQL_APM_OPERATING_SYSTEMS,
            $class::PROJECT_MYSQL_APM_START_DATE,
            $class::PROJECT_MYSQL_APM_END_DATE,
            $personId
        );
        $sql .= self::getProjectInsert(
            $class::PROJECT_ZDHCP_NAME,
            $class::PROJECT_ZDHCP_DESCRIPTION,
            $seniorSoftwareEngineerId,
            $class::PROJECT_ZDHCP_RESPONSIBILITIES,
            $class::PROJECT_ZDHCP_TECHNOLOGIES,
            $class::PROJECT_ZDHCP_OPERATING_SYSTEMS,
            $class::PROJECT_ZDHCP_START_DATE,
            $class::PROJECT_ZDHCP_END_DATE,
            $personId
        );
        $sql .= self::getProjectInsert(
            $class::PROJECT_VIOM_NAME,
            $class::PROJECT_VIOM_DESCRIPTION,
            $teamLeaderSeniorSoftwareEngineerId,
            $class::PROJECT_VIOM_RESPONSIBILITIES,
            $class::PROJECT_VIOM_TECHNOLOGIES,
            $class::PROJECT_VIOM_OPERATING_SYSTEMS,
            $class::PROJECT_VIOM_START_DATE,
            $class::PROJECT_VIOM_END_DATE,
            $personId
        );
        $sql .= self::getProjectInsert(
            $class::PROJECT_SPM_NAME,
            $class::PROJECT_SPM_DESCRIPTION,
            $teamLeaderSeniorSoftwareEngineerId,
            $class::PROJECT_SPM_RESPONSIBILITIES,
            $class::PROJECT_SPM_TECHNOLOGIES,
            $class::PROJECT_SPM_OPERATING_SYSTEMS,
            $class::PROJECT_SPM_START_DATE,
            $class::PROJECT_SPM_END_DATE,
            $personId
        );
        $sql .= self::getProjectInsert(
            $class::PROJECT_SVOM_NAME,
            $class::PROJECT_SVOM_DESCRIPTION,
            $teamLeaderId,
            $class::PROJECT_SVOM_RESPONSIBILITIES,
            $class::PROJECT_SVOM_TECHNOLOGIES,
            $class::PROJECT_SVOM_OPERATING_SYSTEMS,
            $class::PROJECT_SVOM_START_DATE,
            $class::PROJECT_SVOM_END_DATE,
            $personId
        );
        $sql .= self::getProjectInsert(
            $class::PROJECT_AGENTS_NAME,
            $class::PROJECT_AGENTS_DESCRIPTION,
            $teamLeaderId,
            $class::PROJECT_AGENTS_RESPONSIBILITIES,
            $class::PROJECT_AGENTS_TECHNOLOGIES,
            $class::PROJECT_AGENTS_OPERATING_SYSTEMS,
            $class::PROJECT_AGENTS_START_DATE,
            $class::PROJECT_AGENTS_END_DATE,
            $personId
        );

        return self::$db->exec($sql);
    }

    private static function getI18nTranslationInsert($languageId, $messageId, $value) {
        $insert = 'INSERT INTO ' . i18n_translations::tableName() . ' (' .
            i18n_translations::FK_LANGUAGE_ID . ', ' .
            i18n_translations::MESSAGE_ID . ', ' .
            i18n_translations::VALUE .
            ') VALUES (' .
            $languageId . ', ' .
            $messageId . ', "' .
            $value . '"' .
            ');';
        return $insert;
    }

    private static function initI18nTranslations($class) {
        $languageId = self::getI18nLanguageIdSelect($class);

        $sql = self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_ONLINE_CV,
            $class::I18N_TRANSLATION_VALUE_ONLINE_CV
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_DOWNLOAD_PDF_VERSION,
            $class::I18N_TRANSLATION_VALUE_DOWNLOAD_PDF_VERSION
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_PERSONAL_INFORMATION,
            $class::I18N_TRANSLATION_VALUE_PERSONAL_INFORMATION
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_ADDRESS,
            $class::I18N_TRANSLATION_VALUE_ADDRESS
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_PHONE,
            $class::I18N_TRANSLATION_VALUE_PHONE
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_EMAIL,
            $class::I18N_TRANSLATION_VALUE_EMAIL
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_SKYPE,
            $class::I18N_TRANSLATION_VALUE_SKYPE
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_DATE_OF_BIRTH,
            $class::I18N_TRANSLATION_VALUE_DATE_OF_BIRTH
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_PLACE_OF_BIRTH,
            $class::I18N_TRANSLATION_VALUE_PLACE_OF_BIRTH
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_MARITAL_STATUS,
            $class::I18N_TRANSLATION_VALUE_MARITAL_STATUS
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_HOMEPAGE,
            $class::I18N_TRANSLATION_VALUE_HOMEPAGE
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_EMPLOYMENT_HISTORY,
            $class::I18N_TRANSLATION_VALUE_EMPLOYMENT_HISTORY
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_DATE,
            $class::I18N_TRANSLATION_VALUE_DATE
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_COMPANY,
            $class::I18N_TRANSLATION_VALUE_COMPANY
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_POSITION,
            $class::I18N_TRANSLATION_VALUE_POSITION
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_RESPONSIBILITIES,
            $class::I18N_TRANSLATION_VALUE_RESPONSIBILITIES
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_EDUCATION,
            $class::I18N_TRANSLATION_VALUE_EDUCATION
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_EDUCATIONAL_INSTITUTION,
            $class::I18N_TRANSLATION_VALUE_EDUCATIONAL_INSTITUTION
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_FACULTY,
            $class::I18N_TRANSLATION_VALUE_FACULTY
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_DEPARTMENT,
            $class::I18N_TRANSLATION_VALUE_DEPARTMENT
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_QUALIFICATION,
            $class::I18N_TRANSLATION_VALUE_QUALIFICATION
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_LANGUAGES,
            $class::I18N_TRANSLATION_VALUE_LANGUAGES
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_COURSES_AND_CERTIFICATES,
            $class::I18N_TRANSLATION_VALUE_COURSES_AND_CERTIFICATES
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_TITLE,
            $class::I18N_TRANSLATION_VALUE_TITLE
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_AWARDED,
            $class::I18N_TRANSLATION_VALUE_AWARDED
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_TECHNICAL_SKILLS,
            $class::I18N_TRANSLATION_VALUE_TECHNICAL_SKILLS
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_TECHNOLOGY,
            $class::I18N_TRANSLATION_VALUE_TECHNOLOGY
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_EXPERIENCE_YEARS,
            $class::I18N_TRANSLATION_VALUE_EXPERIENCE_YEARS
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_PROFICIENCY,
            $class::I18N_TRANSLATION_VALUE_PROFICIENCY
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_PROJECTS,
            $class::I18N_TRANSLATION_VALUE_PROJECTS
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_PROJECT_NAME,
            $class::I18N_TRANSLATION_VALUE_PROJECT_NAME
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_PROJECT_DESCRIPTION,
            $class::I18N_TRANSLATION_VALUE_PROJECT_DESCRIPTION
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_PROJECT_DURATION,
            $class::I18N_TRANSLATION_VALUE_PROJECT_DURATION
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_PRESENT,
            $class::I18N_TRANSLATION_VALUE_PRESENT
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_LANGUAGE_CEFR,
            $class::I18N_TRANSLATION_VALUE_LANGUAGE_CEFR
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_LANGUAGE_CEFR_URL,
            $class::I18N_TRANSLATION_VALUE_LANGUAGE_CEFR_URL
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_TECHNOLOGIES,
            $class::I18N_TRANSLATION_VALUE_TECHNOLOGIES
        );
        $sql .= self::getI18nTranslationInsert(
            $languageId,
            $class::I18N_TRANSLATION_ID_OPERATING_SYSTEMS,
            $class::I18N_TRANSLATION_VALUE_OPERATING_SYSTEMS
        );

        return self::$db->exec($sql);
    }

}




