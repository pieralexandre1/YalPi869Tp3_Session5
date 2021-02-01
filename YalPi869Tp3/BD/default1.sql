
CREATE TABLE `categories` (`id` INTEGER PRIMARY KEY, `name` VARCHAR(60) NULL);


CREATE TABLE `comments` (
  id INTEGER PRIMARY KEY,
  `address` VARCHAR(255),
  `message` VARCHAR(255),
  `suspect_id` int(11),
  `user_id` int(11)
);

CREATE TABLE `crimes` (
  id INTEGER PRIMARY KEY,
  `description` VARCHAR(255),
  `suspect_id` int(11),
  `user_id` int(11)
);


CREATE TABLE `events` (
  id INTEGER PRIMARY KEY,
  `date` DATE,
  `description` VARCHAR(255)
);


CREATE TABLE `events_files` (
  id INTEGER PRIMARY KEY,
  `event_id` int(11),
  `file_id` int(11)
);


CREATE TABLE `events_suspects` (
  id INTEGER PRIMARY KEY,
  `suspect_id` int(11),
  `event_id` int(11)
);


CREATE TABLE `files` (
  id INTEGER PRIMARY KEY,
  `name` VARCHAR(255),
  `path` VARCHAR(255),
  `created` VARCHAR(255),
  `modified` VARCHAR(255),
  `status` BOOLEAN
);


CREATE TABLE `i18n` (
  id INTEGER PRIMARY KEY,
  `locale` VARCHAR(255),
  `model` VARCHAR(255),
  `foreign_key` int(11),
  `field` VARCHAR(255),
  `content` VARCHAR(255)
);


CREATE TABLE `subcategories` (`id` INTEGER PRIMARY KEY, `category_id` INTEGER NULL, `name` VARCHAR(60) NULL);


CREATE TABLE `suspects` (
  id INTEGER PRIMARY KEY,
  `firstname` CHAR,
  `name` CHAR,
  `vehicule_id` int(11),
  `user_id` int(11)
);


CREATE TABLE `users` (
  id INTEGER PRIMARY KEY,
  `email` VARCHAR,
  `password` VARCHAR,
  `created` DATETIME,
  `modified` DATETIME,
  `role` int(11)
, `comfirmation` BOOLEAN, `uuid` VARCHAR(255);


CREATE TABLE `vehicules` (
  id INTEGER PRIMARY KEY,
  `type` VARCHAR(255),
  `plate` CHAR not null,
  `user_id` int(11)
, `subcategory_id` int(11));

