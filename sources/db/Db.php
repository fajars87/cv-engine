<?php
/**
 * Author: Sergey Grigoriev
 */

class Db {
    public function connect() {
        ORM::configure(Config::getDbConnectionString());
        ORM::get_db();
    }

    public function getPersonalInformation($lang) {
        return ORM::for_table(persons::tableName())
            ->select(persons::fullFieldName(persons::PK_ID))
            ->select(persons::NAME)
            ->select(persons::JOB_TITLE)
            ->select(persons::ADDRESS)
            ->select(persons::PHONE)
            ->select(persons::EMAIL)
            ->select(persons::SKYPE)
            ->select(persons::DATE_OF_BIRTH)
            ->select(persons::PLACE_OF_BIRTH)
            ->select(marital_statuses::STATUS)
            ->select(persons::HOMEPAGE)
            ->select(persons::UNIQUE_NAME)
            ->select(persons::FK_I18N_LANGUAGE_ID)
            ->inner_join(i18n_languages::tableName(), array(persons::fullFieldName(persons::FK_I18N_LANGUAGE_ID), '=', i18n_languages::fullFieldName(i18n_languages::PK_ID)))
            ->inner_join(marital_statuses::tableName(), array(persons::fullFieldName(persons::FK_MARITAL_STATUS_ID), '=', marital_statuses::fullFieldName(marital_statuses::PK_ID)))
            ->where(persons::fullFieldName(persons::UNIQUE_NAME), Config::PERSON_UNIQUE_NAME)
            ->where(i18n_languages::fullFieldName(i18n_languages::LANGUAGE), $lang)
            ->find_one();
    }

    public function getEmploymentHistory($person_id) {
        return ORM::for_table(employers::tableName())
            ->select(employers::COMPANY)
            ->select(employers::HOMEPAGE)
            ->select(employers::ADDRESS)
            ->select(positions::POSITION)
            ->select(employers::RESPONSIBILITIES)
            ->select(employers::START_DATE)
            ->select(employers::END_DATE)
            ->inner_join(positions::tableName(), array(employers::fullFieldName(employers::FK_POSITION_ID), '=', positions::fullFieldName(positions::PK_ID)))
            ->where(employers::fullFieldName(employers::FK_PERSON_ID), $person_id)
            ->order_by_desc(employers::fullFieldName(employers::START_DATE))
            ->find_many();
    }

    public function getI18nMessages($lang_id) {
        return ORM::for_table(i18n_translations::tableName())
            ->select(i18n_translations::MESSAGE_ID)
            ->select(i18n_translations::VALUE)
            ->where(i18n_translations::fullFieldName(i18n_translations::FK_LANGUAGE_ID), $lang_id)
            ->order_by_asc(i18n_translations::fullFieldName(i18n_translations::MESSAGE_ID))
            ->find_many();
    }

    public function getEducation($person_id) {
        return ORM::for_table(educations::tableName())
            ->select(educations::EDUCATIONAL_INSTITUTION)
            ->select(educations::ADDRESS)
            ->select(educations::FACULTY)
            ->select(educations::DEPARTMENT)
            ->select(educations::QUALIFICATION)
            ->select(educations::START_DATE)
            ->select(educations::END_DATE)
            ->where(educations::fullFieldName(educations::FK_PERSON_ID), $person_id)
            ->order_by_desc(educations::fullFieldName(educations::START_DATE))
            ->find_many();
    }

    public function getLanguages($person_id) {
        return ORM::for_table(languages::tableName())
            ->select(languages::LANGUAGE)
            ->select(languages::LEVEL)
            ->where(languages::fullFieldName(languages::FK_PERSON_ID), $person_id)
            ->order_by_asc(languages::fullFieldName(languages::PK_ID))
            ->find_many();
    }

    public function getCoursesAndCertificates($person_id) {
        return ORM::for_table(courses_and_certificates::tableName())
            ->select(courses_and_certificates::TITLE)
            ->select(courses_and_certificates::AWARDED)
            ->select(courses_and_certificates::DATE)
            ->where(courses_and_certificates::fullFieldName(courses_and_certificates::FK_PERSON_ID), $person_id)
            ->order_by_desc(courses_and_certificates::fullFieldName(courses_and_certificates::DATE))
            ->find_many();
    }

    public function getTechnicalSkills($person_id) {
        return ORM::for_table(technical_skills::tableName())
            ->select(skill_categories::CATEGORY)
            ->select(technical_skills::TECHNOLOGY)
            ->select(technical_skills::EXPERIENCE)
            ->select(skill_proficiencies::PROFICIENCY)
            ->inner_join(skill_categories::tableName(), array(technical_skills::fullFieldName(technical_skills::FK_CATEGORY_ID), '=', skill_categories::fullFieldName(skill_categories::PK_ID)))
            ->inner_join(skill_proficiencies::tableName(), array(technical_skills::fullFieldName(technical_skills::FK_PROFICIENCY_ID), '=', skill_proficiencies::fullFieldName(skill_proficiencies::PK_ID)))
            ->where(technical_skills::fullFieldName(technical_skills::FK_PERSON_ID), $person_id)
            ->order_by_asc(technical_skills::fullFieldName(technical_skills::PK_ID))
            ->order_by_asc(technical_skills::fullFieldName(technical_skills::FK_CATEGORY_ID))
            ->find_many();
    }

    public function getProjects($person_id) {
        return ORM::for_table(projects::tableName())
            ->select(projects::NAME)
            ->select(projects::DESCRIPTION)
            ->select(positions::POSITION)
            ->select(projects::RESPONSIBILITIES)
            ->select(projects::TECHNOLOGIES)
            ->select(projects::OPERATING_SYSTEMS)
            ->select(projects::START_DATE)
            ->select(projects::END_DATE)
            ->left_outer_join(positions::tableName(), array(projects::fullFieldName(projects::FK_POSITION_ID), '=', positions::fullFieldName(positions::PK_ID)))
            ->where(projects::fullFieldName(projects::FK_PERSON_ID), $person_id)
            ->order_by_desc(projects::fullFieldName(projects::START_DATE))
            ->find_many();
    }

}
