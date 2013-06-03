DROP TABLE IF EXISTS marital_statuses;
CREATE TABLE IF NOT EXISTS marital_statuses (
  PK_id  INTEGER      NOT NULL PRIMARY KEY AUTOINCREMENT,
  status VARCHAR(255) NOT NULL
);

CREATE UNIQUE INDEX marital_statuses_PK_id_index ON marital_statuses (PK_id ASC);

DROP TABLE IF EXISTS i18n_languages;
CREATE TABLE IF NOT EXISTS i18n_languages (
  PK_id    INTEGER     NOT NULL PRIMARY KEY AUTOINCREMENT,
  language VARCHAR(45) NOT NULL
);

CREATE UNIQUE INDEX i18n_languages_PK_id_index ON i18n_languages (PK_id ASC);

DROP TABLE IF EXISTS persons;
CREATE TABLE IF NOT EXISTS persons (
  PK_id                INTEGER      NOT NULL PRIMARY KEY AUTOINCREMENT,
  name                 VARCHAR(255) NOT NULL,
  job_title            VARCHAR(255) NOT NULL,
  address              VARCHAR(255) NOT NULL,
  phone                VARCHAR(255) NOT NULL,
  email                VARCHAR(255) NOT NULL,
  skype                VARCHAR(255) NOT NULL,
  date_of_birth        DATE         NOT NULL,
  place_of_birth       VARCHAR(255) NOT NULL,
  FK_marital_status_id INTEGER      NOT NULL,
  homepage             VARCHAR(255) NOT NULL,
  unique_name          VARCHAR(255) NOT NULL,
  FK_i18n_language_id  INTEGER      NOT NULL,
  FOREIGN KEY (FK_marital_status_id) REFERENCES marital_statuses (PK_id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (FK_i18n_language_id) REFERENCES i18n_languages (PK_id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE UNIQUE INDEX persons_PK_id_index ON persons (PK_id ASC);
CREATE UNIQUE INDEX persons_FK_marital_status_id_index ON persons (FK_marital_status_id ASC);
CREATE INDEX persons_FK_i18n_language_id_index ON persons (FK_i18n_language_id ASC);

DROP TABLE IF EXISTS positions;
CREATE TABLE IF NOT EXISTS positions (
  PK_id    INTEGER      NOT NULL PRIMARY KEY AUTOINCREMENT,
  position VARCHAR(255) NOT NULL
);

CREATE UNIQUE INDEX positions_PK_id_index ON positions (PK_id ASC);
CREATE UNIQUE INDEX positions_position_index ON positions (position ASC);

DROP TABLE IF EXISTS employers;
CREATE TABLE IF NOT EXISTS employers (
  PK_id            INTEGER      NOT NULL PRIMARY KEY AUTOINCREMENT,
  company          VARCHAR(255) NOT NULL,
  address          VARCHAR(255) NOT NULL,
  FK_position_id   INTEGER      NOT NULL,
  responsibilities VARCHAR(255) NOT NULL,
  start_date       DATE         NOT NULL,
  end_date         DATE         NOT NULL,
  FK_person_id     INTEGER      NOT NULL,
  homepage         VARCHAR(255) NOT NULL,
  FOREIGN KEY (FK_person_id) REFERENCES persons (PK_id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (FK_position_id) REFERENCES positions (PK_id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE UNIQUE INDEX employers_PK_id_index ON employers (PK_id ASC);
CREATE INDEX employers_FK_position_id_index ON employers (FK_position_id ASC);

DROP TABLE IF EXISTS educations;
CREATE TABLE IF NOT EXISTS educations (
  PK_id                   INTEGER      NOT NULL PRIMARY KEY AUTOINCREMENT,
  educational_institution VARCHAR(255) NOT NULL,
  address                 VARCHAR(255) NOT NULL,
  faculty                 VARCHAR(255) NOT NULL,
  department              VARCHAR(255) NOT NULL,
  qualification           VARCHAR(255) NOT NULL,
  start_date              DATE         NOT NULL,
  end_date                DATE         NOT NULL,
  FK_person_id            INTEGER      NOT NULL,
  FOREIGN KEY (FK_person_id) REFERENCES persons (PK_id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE UNIQUE INDEX education_id_index ON educations (PK_id ASC);

DROP TABLE IF EXISTS languages;
CREATE TABLE IF NOT EXISTS languages (
  PK_id        INTEGER      NOT NULL PRIMARY KEY AUTOINCREMENT,
  language     VARCHAR(255) NOT NULL,
  level        VARCHAR(255) NOT NULL,
  FK_person_id INTEGER      NOT NULL,
  FOREIGN KEY (FK_person_id) REFERENCES persons (PK_id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE UNIQUE INDEX languages_PK_id_index ON languages (PK_id ASC);
CREATE INDEX languages_FK_person_id_index ON languages (FK_person_id ASC);

DROP TABLE IF EXISTS courses_and_certificates;
CREATE TABLE IF NOT EXISTS courses_and_certificates (
  PK_id        INTEGER      NOT NULL PRIMARY KEY AUTOINCREMENT,
  title        VARCHAR(255) NOT NULL,
  awarded      VARCHAR(255) NOT NULL,
  date         DATE         NOT NULL,
  FK_person_id INTEGER      NOT NULL,
  FOREIGN KEY (FK_person_id) REFERENCES persons (PK_id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE UNIQUE INDEX courses_and_certificates_PK_id_index ON courses_and_certificates (PK_id ASC);
CREATE INDEX courses_and_certificates_FK_person_id ON courses_and_certificates (FK_person_id ASC);

DROP TABLE IF EXISTS skill_proficiencies;
CREATE TABLE IF NOT EXISTS skill_proficiencies (
  PK_id       INTEGER      NOT NULL PRIMARY KEY AUTOINCREMENT,
  proficiency VARCHAR(255) NOT NULL
);

CREATE UNIQUE INDEX skill_proficiencies_PK_id_index ON skill_proficiencies (PK_id ASC);
CREATE UNIQUE INDEX proficiencies_proficiency_index ON skill_proficiencies (proficiency ASC);

DROP TABLE IF EXISTS skill_categories;
CREATE TABLE IF NOT EXISTS skill_categories (
  PK_id       INTEGER      NOT NULL PRIMARY KEY AUTOINCREMENT,
  category_id INTEGER      NOT NULL,
  category    VARCHAR(255) NOT NULL
);

CREATE UNIQUE INDEX categories_PK_id_index ON skill_categories (PK_id ASC);
CREATE UNIQUE INDEX categories_category_index ON skill_categories (category ASC);

DROP TABLE IF EXISTS technical_skills;
CREATE TABLE IF NOT EXISTS technical_skills (
  PK_id             INTEGER      NOT NULL PRIMARY KEY AUTOINCREMENT,
  FK_category_id    INTEGER      NOT NULL,
  technology        VARCHAR(255) NOT NULL,
  experience        INTEGER      NOT NULL,
  FK_proficiency_id INTEGER      NOT NULL,
  FK_person_id      INTEGER      NOT NULL,
  FOREIGN KEY (FK_proficiency_id) REFERENCES skill_proficiencies (PK_id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (FK_category_id) REFERENCES skill_categories (PK_id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (FK_person_id) REFERENCES persons (PK_id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE UNIQUE INDEX technical_skills_PK_id_index ON technical_skills (PK_id ASC);
CREATE INDEX technical_skills_FK_proficiency_id_index ON technical_skills (FK_proficiency_id ASC);
CREATE INDEX technical_skills_FK_category_id_index ON technical_skills (FK_category_id ASC);
CREATE INDEX technical_skill_FK_person_id_index ON technical_skills (FK_person_id ASC);

DROP TABLE IF EXISTS projects;
CREATE TABLE IF NOT EXISTS projects (
  PK_id             INTEGER      NOT NULL PRIMARY KEY AUTOINCREMENT,
  name              VARCHAR(255) NOT NULL,
  description       VARCHAR(255) NOT NULL,
  FK_position_id    INTEGER      NOT NULL,
  responsibilities  VARCHAR(255) NOT NULL,
  technologies      VARCHAR(255) NOT NULL,
  operating_systems VARCHAR(255) NOT NULL,
  start_date        DATE         NOT NULL,
  end_date          DATE         NOT NULL,
  FK_person_id      INTEGER      NOT NULL,
  FOREIGN KEY (FK_position_id) REFERENCES positions (PK_id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (FK_person_id) REFERENCES persons (PK_id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE UNIQUE INDEX projects_PK_id_index ON projects (PK_id ASC);
CREATE INDEX projects_FK_position_id_index ON projects (FK_position_id ASC);
CREATE INDEX projects_FK_person_id_index ON projects (FK_person_id ASC);

DROP TABLE IF EXISTS i18n_translations;
CREATE TABLE IF NOT EXISTS i18n_translations (
  PK_id          INTEGER      NOT NULL PRIMARY KEY AUTOINCREMENT,
  FK_language_id INTEGER      NOT NULL,
  message_id     INTEGER      NOT NULL,
  value          VARCHAR(255) NOT NULL,
  FOREIGN KEY (FK_language_id) REFERENCES i18n_languages (PK_id) ON DELETE NO ACTION ON UPDATE NO ACTION
);
