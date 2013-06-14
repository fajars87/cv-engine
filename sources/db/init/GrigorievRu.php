<?php
/**
 * Author: Sergey Grigoriev
 */

class GrigorievRu extends GrigorievCommon {
    const LANG = 'ru';

    const MINSK_BELARUS = 'Беларусь, Минск';

    const MARITAL_STATUS_SINGLE = 'Холост';
    const MARITAL_STATUS_MARRIED = 'Женат';

    const PERSON_NAME = 'Сергей Григорьев';
    const PERSON_JOB_TITLE = 'Ведущий инженер-программист';

    const POSITION_SOFTWARE_ENGINEER = 'Инженер-программист';
    const POSITION_SENIOR_SOFTWARE_ENGINEER = 'Инженер-программист (1 категория)';
    const POSITION_TEAM_LEADER_SENIOR_SOFTWARE_ENGINEER = 'Ведущий инженер-программист / Инженер-программист (1 категория)';
    const POSITION_TEAM_LEADER = 'Ведущий инженер-программист';

    const EMPLOYER_BSUIR_CPI_COMPANY = 'Белорусский государственный университет информатики и радиоэлектроники, структурное подразделение &quot;Центр проблем информатики&quot;';
    const EMPLOYER_BSUIR_CPI_RESPONSIBILITIES = 'Проектирование и разработка программного обеспечения';
    const EMPLOYER_SAM_SOLUTIONS_BELARUS_SSE_RESPONSIBILITIES = 'Проектирование и разработка программного обеспечения, разработка документации';
    const EMPLOYER_SAM_SOLUTIONS_BELARUS_TL_RESPONSIBILITIES = 'Проектирование и разработка программного обеспечения, управление командой, коммуникация с заказчиком, разработка документации';

    const EDUCATION_BSUIR_EDUCATIONAL_INSTITUTION = 'Белорусский государственный университет информатики и радиоэлектроники';
    const EDUCATION_BSUIR_FACULTY = 'Компьютерные системы и сети';
    const EDUCATION_BSUIR_DEPARTMENT = 'Программное обеспечение информационных технологий';
    const EDUCATION_BSUIR_QUALIFICATION = 'Инженер-программист, диплом с отличием';
    const EDUCATION_BSEU_EDUCATIONAL_INSTITUTION = 'Белорусский государственный экономический университет';
    const EDUCATION_BSEU_FACULTY = 'Международные экономические отношения';
    const EDUCATION_BSEU_DEPARTMENT = 'Мировая экономика';
    const EDUCATION_BSEU_QUALIFICATION = 'Экономист';

    const LANGUAGE_ENGLISH = 'Английский';
    const LANGUAGE_GERMAN = 'Немецкий';
    const LANGUAGE_RUSSIAN = 'Русский';
    const LANGUAGE_BELARUSIAN = 'Белорусский';

    const LANGUAGE_LEVEL_A1 = 'A1 в соотвествии с ';
    const LANGUAGE_LEVEL_A2 = 'A2 в соотвествии с ';
    const LANGUAGE_LEVEL_B1 = 'B1 в соотвествии с ';
    const LANGUAGE_LEVEL_B2 = 'B2 в соотвествии с ';
    const LANGUAGE_LEVEL_C1 = 'C1 в соотвествии с ';
    const LANGUAGE_LEVEL_C2 = 'C2 в соотвествии с ';
    const LANGUAGE_LEVEL_NATIVE = 'Родной';

    const COURSE_AND_CERTIFICATE_SOFTWARE_REQUIREMENTS_DEVELOPMENT_AND_MANAGEMENT_TITLE = 'Разработка требований к ПО и управление ими';
    const COURSE_AND_CERTIFICATE_ESTIMATIONS_FOR_SOFTWARE_PROJECTS_TITLE = 'Оценка проектов + Планирование с фиксированным объемом работ';
    const COURSE_AND_CERTIFICATE_IBM_RATIONAL_CLEARCASE_TITLE = 'IBM Rational ClearCase';
    const COURSE_AND_CERTIFICATE_AGILE_ENGINEERING_PRACTICES_TITLE = 'Инженерные практики в Agile';
    const COURSE_AND_CERTIFICATE_TDD_IN_JAVA_TITLE = 'Разработка через тестирование в Java';
    const COURSE_AND_CERTIFICATE_PRAGMATIC_TDD_TITLE = 'Практическое применение разработки через тестирование';

    const SKILL_PROFICIENCY_EXCELLENT = 'Отлично';
    const SKILL_PROFICIENCY_GOOD = 'Хорошо';
    const SKILL_PROFICIENCY_BASIC = 'Базовые знания';

    const SKILL_CATEGORY_PROGRAMMING_LANGUAGES = 'Языки программирования';
    const SKILL_CATEGORY_TECHNOLOGIES = 'Технологии';
    const SKILL_CATEGORY_OPERATING_SYSTEMS = 'Операционные системы';
    const SKILL_CATEGORY_RDBMSS = 'СУБД';
    const SKILL_CATEGORY_WEB_AND_APPLICATION_SERVERS = 'Веб-сервера и сервера приложений';
    const SKILL_CATEGORY_CASE_AND_PROJECT_TOOLS = 'CASE и проектные инструменты';
    const SKILL_CATEGORY_IDES = 'Интегрированные среды разработки';

    const PROJECT_OASIS_DESCRIPTION = 'Мультиплатформенный клиент для системы управления семинарами';
    const PROJECT_OASIS_RESPONSIBILITIES = 'Создание настраиваемого клиента, разработка движка БД; bugfixing';
    const PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_DESCRIPTION = 'OpForma это web-based платформа, которая предоставляет возможность отслеживания рабочего процесса через мониторинг активности рабочего стола';
    const PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_RESPONSIBILITIES = 'bugfixing';
    const PROJECT_CDROMTOOL_DESCRIPTION = 'CDROMTool это приложение, которое используется для поиска по продуктам, категориям, атрибутам и ключевым словам; дополнительно это приложение предоставляет информацию о продуктах, изображения и диаграммы';
    const PROJECT_CDROMTOOL_RESPONSIBILITIES = 'Подбор алгоритма шифрования с использованием анализа и brute force; bugfixing';
    const PROJECT_OASIS_X10_DESCRIPTION = 'Мультиплатформенный клиент для системы управления семинарами';
    const PROJECT_OASIS_X10_RESPONSIBILITIES = 'Поддержка MacOS X Leopard';
    const PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_DESCRIPTION = 'OpForma это web-based платформа, которая предоставляет возможность отслеживания рабочего процесса через мониторинг активности рабочего стола';
    const PROJECT_OPFORMA_CLIENT_FOR_MACOS_X10_V20_RESPONSIBILITIES = 'Интеграция с OpForma Server';
    const PROJECT_LOTUS_NOTES_APM_DESCRIPTION = 'Backup APM for Lotus Notes/Domino помогает предоставить быстрые online backup и recovery процедуры для окружения Lotus Notes';
    const PROJECT_LOTUS_NOTES_APM_RESPONSIBILITIES = 'Разработка нового формата для backup процедуры; bugfixing';
    const PROJECT_VAULTDR_DESCRIPTION = 'VaultDR это программное обеспечение, которое создаёт disaster recovery образ операционной системы, приложений, пользовательских настроек, информации о разделах и данных';
    const PROJECT_VAULTDR_RESPONSIBILITIES = 'Добавление шифрования для disaster recovery images';
    const PROJECT_MYSQL_APM_DESCRIPTION = 'Backup APM for MySQL объединяет backup и recovery процедуры нескольких MySQL баз в одну задачу';
    const PROJECT_MYSQL_APM_RESPONSIBILITIES = 'bugfixing';
    const PROJECT_ZDHCP_DESCRIPTION = 'Простой DHCP сервер без поддержки лизов, который обрабатывает все запросы от всех интерфейсов, определяет с какого интерфейса пришёл запрос и выдаёт ему определённый IP адрес, основываясь на MAC адресе; имеется поддержка VLAN';
    const PROJECT_ZDHCP_RESPONSIBILITIES = 'Разработка простого DHCP сервера';
    const PROJECT_VIOM_DESCRIPTION = 'VIOM это программное обеспечение для администрирования PRIMERGY Blade серверов в LAN и SAN окружениях посредством виртуализации физических сетевых адресов';
    const PROJECT_VIOM_RESPONSIBILITIES = 'Портирование VIOM на Linux платформы, поддержка Hibernate, реализация CLP протокола, переписывание компонента с Perl на Java, оптимизация производительности, инсталляторы; управление командой, документация, bugfixing';
    const PROJECT_SPM_DESCRIPTION = 'SPM это web-приложение, которое устанавливается на Central Management Station и позволяет осуществлять поиск, мониторинг и управление PRIMERGY серверами';
    const PROJECT_SPM_RESPONSIBILITIES = 'Проектирование приложения, разработка движка базы данных, SOAP web сервисы, реализация сбора данных с использованием IPMI, SNMP, CIM, CLP протоколов; управление командой, документация, bugfixing';
    const PROJECT_SVOM_DESCRIPTION = 'SVOM это программное обеспечение, которое мониторит и анализирует PRIMERGY сервера в сети';
    const PROJECT_SVOM_RESPONSIBILITIES = 'Реализация сбора данных с использованием IPMI, SNMP, CIM протоколов; управление командой, bugfixing';
    const PROJECT_AGENTS_DESCRIPTION = 'Agent это программное обеспечение, которое устанавливается на PRIMERGY сервера, и предоставляет такой функционал как мониторинг оборудования и определение любой нестандартной ситуации и уведомление о ней; Agent также предоставляет возможность мониторинга сервера с помощью SNMP протокола';
    const PROJECT_AGENTS_RESPONSIBILITIES = 'Разработка архитектуры; управление командой, bugfixing';

    const I18N_TRANSLATION_VALUE_ONLINE_CV = 'Sergey Grigoriev - Online Curriculum Vitae';
    const I18N_TRANSLATION_VALUE_DOWNLOAD_PDF_VERSION = 'Скачать PDF версию';
    const I18N_TRANSLATION_VALUE_PERSONAL_INFORMATION = 'Персональная информация';
    const I18N_TRANSLATION_VALUE_ADDRESS = 'Адрес';
    const I18N_TRANSLATION_VALUE_PHONE = 'Телефон';
    const I18N_TRANSLATION_VALUE_DATE_OF_BIRTH = 'Дата рождения';
    const I18N_TRANSLATION_VALUE_PLACE_OF_BIRTH = 'Место рождения';
    const I18N_TRANSLATION_VALUE_MARITAL_STATUS = 'Семейное положение';
    const I18N_TRANSLATION_VALUE_HOMEPAGE = 'Homepage';
    const I18N_TRANSLATION_VALUE_EMPLOYMENT_HISTORY = 'Опыт работы';
    const I18N_TRANSLATION_VALUE_DATE = 'Время';
    const I18N_TRANSLATION_VALUE_COMPANY = 'Организация';
    const I18N_TRANSLATION_VALUE_POSITION = 'Должность';
    const I18N_TRANSLATION_VALUE_RESPONSIBILITIES = 'Обязанности';
    const I18N_TRANSLATION_VALUE_EDUCATION = 'Образование';
    const I18N_TRANSLATION_VALUE_EDUCATIONAL_INSTITUTION = 'Учебное заведение';
    const I18N_TRANSLATION_VALUE_FACULTY = 'Факультет';
    const I18N_TRANSLATION_VALUE_DEPARTMENT = 'Отделение';
    const I18N_TRANSLATION_VALUE_QUALIFICATION = 'Специальность';
    const I18N_TRANSLATION_VALUE_LANGUAGES = 'Знание языков';
    const I18N_TRANSLATION_VALUE_COURSES_AND_CERTIFICATES = 'Курсы и cертификаты';
    const I18N_TRANSLATION_VALUE_TITLE = 'Название';
    const I18N_TRANSLATION_VALUE_AWARDED = 'Выдан';
    const I18N_TRANSLATION_VALUE_TECHNICAL_SKILLS = 'Квалификация';
    const I18N_TRANSLATION_VALUE_TECHNOLOGY = 'Технология';
    const I18N_TRANSLATION_VALUE_EXPERIENCE_YEARS = 'Опыт (в годах)';
    const I18N_TRANSLATION_VALUE_PROFICIENCY = 'Уровень';
    const I18N_TRANSLATION_VALUE_PROJECTS = 'Проекты';
    const I18N_TRANSLATION_VALUE_PROJECT_NAME = 'Название проекта';
    const I18N_TRANSLATION_VALUE_PROJECT_DESCRIPTION = 'Описание проекта';
    const I18N_TRANSLATION_VALUE_PROJECT_DURATION = 'Длительность проекта';
    const I18N_TRANSLATION_VALUE_PRESENT = 'настоящее время';
    const I18N_TRANSLATION_VALUE_LANGUAGE_CEFR = 'CEFR';
    const I18N_TRANSLATION_VALUE_LANGUAGE_CEFR_URL = 'http://ru.wikipedia.org/wiki/%D0%9E%D0%B1%D1%89%D0%B5%D0%B5%D0%B2%D1%80%D0%BE%D0%BF%D0%B5%D0%B9%D1%81%D0%BA%D0%B8%D0%B5_%D0%BA%D0%BE%D0%BC%D0%BF%D0%B5%D1%82%D0%B5%D0%BD%D1%86%D0%B8%D0%B8_%D0%B2%D0%BB%D0%B0%D0%B4%D0%B5%D0%BD%D0%B8%D1%8F_%D0%B8%D0%BD%D0%BE%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%BD%D1%8B%D0%BC_%D1%8F%D0%B7%D1%8B%D0%BA%D0%BE%D0%BC';
    const I18N_TRANSLATION_VALUE_TECHNOLOGIES = 'Технологии';
    const I18N_TRANSLATION_VALUE_OPERATING_SYSTEMS = 'Операционные системы';
}