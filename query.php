<?php

ALTER TABLE `mails` ADD `lang_type` VARCHAR(10) NOT NULL DEFAULT 'ENGLISH' AFTER `id`;

ALTER TABLE `news` ADD `lang_type` VARCHAR(10) NOT NULL DEFAULT 'english' AFTER `id`;

ALTER TABLE `seo` ADD `lang_type` VARCHAR(10) NOT NULL DEFAULT 'english' AFTER `id`;

?>