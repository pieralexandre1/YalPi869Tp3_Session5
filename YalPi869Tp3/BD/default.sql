CREATE TABLE `categories` (`id` INTEGER NULL PRIMARY KEY AUTOINCREMENT, `name` VARCHAR(60) NULL);
CREATE TABLE `comments` (
  id INTEGER PRIMARY KEY ASC,
  `address` text TEXT,
  `message` text TEXT,
  `suspect_id` int INTEGER,
  `user_id` int INTEGER
);
CREATE TABLE `crimes` (
  id INTEGER PRIMARY KEY ASC,
  `description` text TEXT,
  `suspect_id` int INTEGER,
  `user_id` int INTEGER
);
CREATE TABLE `events` (
  id INTEGER PRIMARY KEY ASC,
  `date` DATE,
  `description` text TEXT
);
CREATE TABLE `events_files` (
  id INTEGER PRIMARY KEY ASC,
  `event_id` int INTEGER,
  `file_id` int INTEGER
);
CREATE TABLE `events_suspects` (
  id INTEGER PRIMARY KEY ASC,
  `suspect_id` int INTEGER,
  `event_id` int INTEGER
);
CREATE TABLE `files` (
  id INTEGER PRIMARY KEY ASC,
  `name` text TEXT,
  `path` text TEXT,
  `created` text TEXT,
  `modified` text TEXT,
  `status` BOOLEAN
);
CREATE TABLE `i18n` (
  id INTEGER PRIMARY KEY ASC,
  `locale` text TEXT,
  `model` text TEXT,
  `foreign_key` int INTEGER,
  `field` text TEXT,
  `content` text TEXT
);
CREATE TABLE `phinxlog` (`version` BIGINT NULL, `migration_name` VARCHAR(100) NULL, `start_time` DATETIME NULL, `end_time` DATETIME NULL, `breakpoint` BOOLEAN NOT NULL DEFAULT 0, PRIMARY KEY (`version`));
CREATE TABLE `subcategories` (`id` INTEGER NULL PRIMARY KEY AUTOINCREMENT, `category_id` INTEGER NULL, `name` VARCHAR(60) NULL);
CREATE TABLE `suspects` (
  id INTEGER PRIMARY KEY ASC,
  `firstname` CHAR,
  `name` CHAR,
  `vehicule_id` int INTEGER,
  `user_id` int INTEGER
);
CREATE TABLE `users` (
  id INTEGER PRIMARY KEY ASC,
  `email` VARCHAR,
  `password` VARCHAR,
  `created` DATETIME,
  `modified` DATETIME,
  `role` int INTEGER
, "comfirmation" BOOL DEFAULT 0, "uuid" VARCHAR);
CREATE TABLE `vehicules` (
  id INTEGER PRIMARY KEY ASC,
  `type` text TEXT,
  `plate` CHAR not null,
  `user_id` int INTEGER
, "subcategory_id" INTEGER);
