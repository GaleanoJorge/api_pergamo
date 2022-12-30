#USAGE NOTES
INSERT INTO
    `item` (
        `id`,
        `item_parent_id`,
        `name`,
        `code`,
        `route`,
        `icon`,
        `show_menu`,
        `created_at`,
        `updated_at`
    )
VALUES
    (
        '224',
        NULL,
        'Consulta externa',
        NULL,
        NULL,
        'book-open-outline',
        '1',
        '2022-11-21 08:44:39',
        '2022-11-21 08:44:39'
    ),
    (
        '238',
        '66',
        'Consulta externa',
        NULL,
        NULL,
        NULL,
        '1',
        '2022-11-21 08:44:39',
        '2022-11-21 08:44:39'
    ),
    (
        '239',
        '238',
        'Días no laborales',
        'non-working-days',
        '/pages/scheduling/non-working-days',
        NULL,
        '1',
        '2022-11-21 08:44:39',
        '2022-11-21 08:44:39'
    ),
    (
        '240',
        '224',
        'Itinerario asistencial',
        'healthcare-itinerary',
        '/pages/scheduling/healthcare-itinerary',
        'calendar-outline',
        '1',
        '2022-11-21 08:44:39',
        '2022-11-21 08:44:39'
    ),
    (
        '241',
        '238',
        'Programación de agenda',
        'medical-diary',
        '/pages/scheduling/medical-diary',
        NULL,
        '1',
        '2022-11-21 08:44:39',
        '2022-11-21 08:44:39'
    ),
    (
        '242',
        '238',
        'Categorias',
        'copay-category',
        '/pages/scheduling/copay-category',
        NULL,
        '1',
        '2022-11-21 08:44:39',
        '2022-11-21 08:44:39'
    ),
    (
        '243',
        '224',
        'Agenda asistencial',
        'assitencial-view',
        '/pages/scheduling/assistance-view',
        NULL,
        '1',
        '2022-11-21 08:44:39',
        '2022-11-21 08:44:39'
    ),
    (
        '245',
        '238',
        'Motivos de cancelación',
        'reason-cancel',
        '/pages/scheduling/reason-cancel',
        NULL,
        '1',
        '2022-11-21 08:44:39',
        '2022-11-21 08:44:39'
    )
INSERT INTO
    `item_role_permission` (
        `id`,
        `item_id`,
        `role_id`,
        `permission_id`,
        `created_at`,
        `updated_at`
    )
VALUES
    (
        NULL,
        '224',
        '1',
        '1',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '224',
        '1',
        '2',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '224',
        '1',
        '3',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '224',
        '1',
        '4',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '238',
        '1',
        '1',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '238',
        '1',
        '2',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '238',
        '1',
        '3',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '238',
        '1',
        '4',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '239',
        '1',
        '1',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '239',
        '1',
        '2',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '239',
        '1',
        '3',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '239',
        '1',
        '4',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '240',
        '1',
        '1',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '240',
        '1',
        '2',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '240',
        '1',
        '3',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '240',
        '1',
        '4',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '241',
        '1',
        '1',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '241',
        '1',
        '2',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '241',
        '1',
        '3',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '241',
        '1',
        '4',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '242',
        '1',
        '1',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '242',
        '1',
        '2',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '242',
        '1',
        '3',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '242',
        '1',
        '4',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '243',
        '1',
        '1',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '243',
        '1',
        '2',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '243',
        '1',
        '3',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '243',
        '1',
        '4',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '245',
        '1',
        '1',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '245',
        '1',
        '2',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '245',
        '1',
        '3',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    ),
    (
        NULL,
        '245',
        '1',
        '4',
        '2022-11-21 09:37:30',
        '2022-11-21 09:37:30'
    )
ALTER TABLE
    `ch_interconsultation`
ADD
    CONSTRAINT `ch_interconsultation_type_of_attention_id_foreign` FOREIGN KEY (`type_of_attention_id`) REFERENCES `type_of_attention`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE
    `ch_interconsultation` CHANGE `amount` `amount` INT NULL;

ALTER TABLE
    `ch_interconsultation` CHANGE `frequency_id` `frequency_id` TINYINT(20) UNSIGNED NULL;

ALTER TABLE
    `ch_interconsultation` CHANGE `type_record_id` `type_record_id` BIGINT(20) UNSIGNED NULL;

ALTER TABLE
    `ch_interconsultation` CHANGE `ch_record_id` `ch_record_id` BIGINT(20) UNSIGNED NULL;

ALTER TABLE
    `ch_interconsultation`
ADD
    `services_briefcase_id` BIGINT UNSIGNED NULL
AFTER
    `ch_record_id`;

ALTER TABLE
    `ch_interconsultation`
ADD
    CONSTRAINT `ch_interconsultation_services_briefcase_id_foreign` FOREIGN KEY (`services_briefcase_id`) REFERENCES `services_briefcase`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE
    `ch_interconsultation`
ADD
    `admissions_id` BIGINT UNSIGNED NULL
AFTER
    `services_briefcase_id`;

ALTER TABLE
    `ch_interconsultation`
ADD
    CONSTRAINT `ch_interconsultation_admissions_id_foreign` FOREIGN KEY (`admissions_id`) REFERENCES `admissions`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

php artisan migrate :refresh --path=database/migrations/2022_10_06_115309_add_ch_interconsultation_to_ch_record_table.php
php artisan migrate :refresh --path=database/migrations/2022_10_21_115309_add_ch_interconsultation_to_authorization_table.php
php artisan migrate :refresh --path=database/migrations/2022_09_19_071721_create_reference_table.php
ALTER TABLE
    `bed`
ADD
    `identification` INT NULL
AFTER
    `status_bed_id`;

ALTER TABLE
    `bed`
ADD
    `reservation_date` DATETIME NULL
AFTER
    `identification`;

ALTER TABLE
    `ch_formulation`
ADD
    `management_plan_id` BIGINT UNSIGNED NULL
AFTER
    `pharmacy_product_request_id`;

ALTER TABLE
    `ch_formulation`
ADD
    CONSTRAINT `ch_formulation_management_plan_id_foreign` FOREIGN KEY (`management_plan_id`) REFERENCES `management_plan`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO
    `item` (
        `id`,
        `item_parent_id`,
        `code`,
        `name`,
        `route`,
        `icon`,
        `show_menu`,
        `created_at`,
        `updated_at`
    )
VALUES
    (
        '235',
        NULL,
        'reference',
        'Referencia',
        '/pages/reference/list',
        'keypad-outline',
        '1',
        '2022-11-08 15:56:39',
        '2022-11-08 15:56:39'
    );

INSERT INTO
    `item_role_permission` (
        `id`,
        `item_id`,
        `role_id`,
        `permission_id`,
        `created_at`,
        `updated_at`
    )
VALUES
    (
        NULL,
        '235',
        '1',
        '1',
        '2022-11-08 15:59:30',
        '2022-11-08 15:59:30'
    ),
    (
        NULL,
        '235',
        '1',
        '2',
        '2022-11-08 15:59:30',
        '2022-11-08 15:59:30'
    ),
    (
        NULL,
        '235',
        '1',
        '3',
        '2022-11-08 15:59:30',
        '2022-11-08 15:59:30'
    ),
    (
        NULL,
        '235',
        '1',
        '4',
        '2022-11-08 15:59:30',
        '2022-11-08 15:59:30'
    );