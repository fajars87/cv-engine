<?php
/**
 * Author: Sergey Grigoriev
 */

class marital_statuses extends AbstractTable {
    const PK_ID = 'PK_id';
    const STATUS = 'status';
}

class i18n_languages extends AbstractTable {
    const PK_ID = 'PK_id';
    const LANGUAGE = 'language';
}

class persons extends AbstractTable {
    const PK_ID = 'PK_id';
    const NAME = 'name';
    const JOB_TITLE = 'job_title';
    const ADDRESS = 'address';
    const PHONE = 'phone';
    const EMAIL = 'email';
    const SKYPE = 'skype';
    const DATE_OF_BIRTH = 'date_of_birth';
    const PLACE_OF_BIRTH = 'place_of_birth';
    const FK_MARITAL_STATUS_ID = 'FK_marital_status_id';
    const HOMEPAGE = 'homepage';
    const UNIQUE_NAME = 'unique_name';
    const FK_I18N_LANGUAGE_ID = 'FK_i18n_language_id';
}

class positions extends AbstractTable {
    const PK_ID = 'PK_id';
    const POSITION = 'position';
}

class employers extends AbstractTable {
    const PK_ID = 'PK_id';
    const COMPANY = 'company';
    const HOMEPAGE = 'homepage';
    const ADDRESS = 'address';
    const FK_POSITION_ID = 'FK_position_id';
    const RESPONSIBILITIES = 'responsibilities';
    const START_DATE = 'start_date';
    const END_DATE = 'end_date';
    const FK_PERSON_ID = 'FK_person_id';
}

class educations extends AbstractTable {
    const PK_ID = 'PK_id';
    const EDUCATIONAL_INSTITUTION = 'educational_institution';
    const ADDRESS = 'address';
    const FACULTY = 'faculty';
    const DEPARTMENT = 'department';
    const QUALIFICATION = 'qualification';
    const START_DATE = 'start_date';
    const END_DATE = 'end_date';
    const FK_PERSON_ID = 'FK_person_id';
}

class languages extends AbstractTable {
    const PK_ID = 'PK_id';
    const LANGUAGE = 'language';
    const LEVEL = 'level';
    const FK_PERSON_ID = 'FK_person_id';
}

class courses_and_certificates extends AbstractTable {
    const PK_ID = 'PK_id';
    const TITLE = 'title';
    const AWARDED = 'awarded';
    const DATE = 'date';
    const FK_PERSON_ID = 'FK_person_id';
}

class skill_proficiencies extends AbstractTable {
    const PK_ID = 'PK_id';
    const PROFICIENCY = 'proficiency';
}

class skill_categories extends AbstractTable {
    const PK_ID = 'PK_id';
    const CATEGORY_ID = 'category_id';
    const CATEGORY = 'category';
}

class technical_skills extends AbstractTable {
    const PK_ID = 'PK_id';
    const FK_CATEGORY_ID = 'FK_category_id';
    const TECHNOLOGY = 'technology';
    const EXPERIENCE = 'experience';
    const FK_PROFICIENCY_ID = 'FK_proficiency_id';
    const FK_PERSON_ID = 'FK_person_id';
}

class projects extends AbstractTable {
    const PK_ID = 'PK_id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const FK_POSITION_ID = 'FK_position_id';
    const RESPONSIBILITIES = 'responsibilities';
    const TECHNOLOGIES = 'technologies';
    const OPERATING_SYSTEMS = 'operating_systems';
    const START_DATE = 'start_date';
    const END_DATE = 'end_date';
    const FK_PERSON_ID = 'FK_person_id';
}

class i18n_translations extends AbstractTable {
    const PK_ID = 'PK_id';
    const FK_LANGUAGE_ID = 'FK_language_id';
    const MESSAGE_ID = 'message_id';
    const VALUE = 'value';
}

