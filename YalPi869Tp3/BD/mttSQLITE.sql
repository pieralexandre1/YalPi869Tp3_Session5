DROP TABLE IF EXISTS "comments";
CREATE TABLE `comments` (
  id INTEGER PRIMARY KEY ASC,
  `address` text TEXT,
  `message` text TEXT,
  `suspect_id` int INTEGER,
  `user_id` int INTEGER
);
INSERT INTO "comments" VALUES(1,'admin@admin.com','Incroyable !',1,1);
DROP TABLE IF EXISTS "crimes";
CREATE TABLE `crimes` (
  id INTEGER PRIMARY KEY ASC,
  `description` text TEXT,
  `suspect_id` int INTEGER,
  `user_id` int INTEGER
);
INSERT INTO "crimes" VALUES(1,'Crime Passionnel',1,1);
INSERT INTO "crimes" VALUES(2,'Bande Organisée',1,1);
INSERT INTO "crimes" VALUES(3,'Incendie Volontaire',1,1);
INSERT INTO "crimes" VALUES(4,'Incendie Volontaire',2,1);
INSERT INTO "crimes" VALUES(5,'Crime Passionnel',2,1);
INSERT INTO "crimes" VALUES(6,'Bande Organisée',3,1);
INSERT INTO "crimes" VALUES(7,'Bombe Radiologique',4,1);
INSERT INTO "crimes" VALUES(8,'Crime Passionnel',5,1);
INSERT INTO "crimes" VALUES(9,'Agression Sexuelle',6,1);
INSERT INTO "crimes" VALUES(10,'Bombe Radiologique',7,1);
INSERT INTO "crimes" VALUES(11,'Agression Sexuelle',8,1);
DROP TABLE IF EXISTS "events";
CREATE TABLE `events` (
  id INTEGER PRIMARY KEY ASC,
  `date` DATE,
  `description` text TEXT
);
INSERT INTO "events" VALUES(1,'2017-09-30','Vol epicerie');
INSERT INTO "events" VALUES(2,'2016-09-30','Meutre au premier degres');
INSERT INTO "events" VALUES(3,'2013-06-13','Kidnapping');
DROP TABLE IF EXISTS "events_files";
CREATE TABLE `events_files` (
  id INTEGER PRIMARY KEY ASC,
  `event_id` int INTEGER,
  `file_id` int INTEGER
);
INSERT INTO "events_files" VALUES(1,2,1);
DROP TABLE IF EXISTS "events_suspects";
CREATE TABLE `events_suspects` (
  id INTEGER PRIMARY KEY ASC,
  `suspect_id` int INTEGER,
  `event_id` int INTEGER
);
INSERT INTO "events_suspects" VALUES(1,1,1);
INSERT INTO "events_suspects" VALUES(2,3,1);
INSERT INTO "events_suspects" VALUES(3,7,2);
INSERT INTO "events_suspects" VALUES(4,5,3);
DROP TABLE IF EXISTS "files";
CREATE TABLE `files` (
  id INTEGER PRIMARY KEY ASC,
  `name` text TEXT,
  `path` text TEXT,
  `created` text TEXT,
  `modified` text TEXT,
  `status` BOOLEAN
);
INSERT INTO "files" VALUES(1,'suspect.jpg','Files/','2017-09-30 00:31:46','2017-09-30 00:31:46',1);
DROP TABLE IF EXISTS "i18n";
CREATE TABLE `i18n` (
  id INTEGER PRIMARY KEY ASC,
  `locale` text TEXT,
  `model` text TEXT,
  `foreign_key` int INTEGER,
  `field` text TEXT,
  `content` text TEXT
);
INSERT INTO "i18n" VALUES(1,'fr_CA','Vehicules',1,'type','Aucun');
INSERT INTO "i18n" VALUES(2,'en_CA','Vehicules',1,'type','None');
INSERT INTO "i18n" VALUES(3,'ja_JP','Vehicules',1,'type','いいえ');
INSERT INTO "i18n" VALUES(4,'fr_CA','Vehicules',2,'type','Camion');
INSERT INTO "i18n" VALUES(5,'en_CA','Vehicules',2,'type','Truck');
INSERT INTO "i18n" VALUES(6,'ja_JP','Vehicules',2,'type','カミオン');
INSERT INTO "i18n" VALUES(7,'fr_CA','Vehicules',3,'type','Moto');
INSERT INTO "i18n" VALUES(8,'en_CA','Vehicules',3,'type','Motorbike');
INSERT INTO "i18n" VALUES(9,'ja_JP','Vehicules',3,'type','モト');
INSERT INTO "i18n" VALUES(10,'fr_CA','Vehicules',4,'type','Helicoptere');
INSERT INTO "i18n" VALUES(11,'en_CA','Vehicules',4,'type','Helicopter');
INSERT INTO "i18n" VALUES(12,'ja_JP','Vehicules',4,'type','ヘリコプター');
INSERT INTO "i18n" VALUES(13,'fr_CA','Vehicules',5,'type','Voiture');
INSERT INTO "i18n" VALUES(14,'en_CA','Vehicules',5,'type','Car');
INSERT INTO "i18n" VALUES(15,'ja_JP','Vehicules',5,'type','車');
INSERT INTO "i18n" VALUES(16,'fr_CA','Vehicules',6,'type','Voiture');
INSERT INTO "i18n" VALUES(17,'en_CA','Vehicules',6,'type','Car');
INSERT INTO "i18n" VALUES(18,'ja_JP','Vehicules',6,'type','車');
INSERT INTO "i18n" VALUES(19,'fr_CA','Vehicules',7,'type','Voiture');
INSERT INTO "i18n" VALUES(20,'en_CA','Vehicules',7,'type','Car');
INSERT INTO "i18n" VALUES(21,'ja_JP','Vehicules',7,'type','車');
INSERT INTO "i18n" VALUES(22,'fr_CA','Vehicules',8,'type','Camion');
INSERT INTO "i18n" VALUES(23,'en_CA','Vehicules',8,'type','Truck');
INSERT INTO "i18n" VALUES(24,'ja_JP','Vehicules',8,'type','カミオン');
INSERT INTO "i18n" VALUES(25,'fr_CA','Crimes',1,'description','Crime Passionnel');
INSERT INTO "i18n" VALUES(26,'en_CA','Crimes',1,'description','Passionate Crime');
INSERT INTO "i18n" VALUES(27,'ja_JP','Crimes',1,'description','情熱的な犯罪');
INSERT INTO "i18n" VALUES(28,'fr_CA','Crimes',2,'description','Bande Organisée');
INSERT INTO "i18n" VALUES(29,'en_CA','Crimes',2,'description','Organized Band');
INSERT INTO "i18n" VALUES(30,'ja_JP','Crimes',2,'description','組織化されたバンド');
INSERT INTO "i18n" VALUES(31,'fr_CA','Crimes',3,'description','Incendie Volontaire');
INSERT INTO "i18n" VALUES(32,'en_CA','Crimes',3,'description','Arson');
INSERT INTO "i18n" VALUES(33,'ja_JP','Crimes',3,'description','火災ボランティア');
INSERT INTO "i18n" VALUES(34,'fr_CA','Crimes',4,'description','Incendie Volontaire');
INSERT INTO "i18n" VALUES(35,'en_CA','Crimes',4,'description','Arson');
INSERT INTO "i18n" VALUES(36,'ja_JP','Crimes',4,'description','火災ボランティア');
INSERT INTO "i18n" VALUES(37,'fr_CA','Crimes',5,'description','Crime Passionnel');
INSERT INTO "i18n" VALUES(38,'en_CA','Crimes',5,'description','Passionate Crime');
INSERT INTO "i18n" VALUES(39,'ja_JP','Crimes',5,'description','情熱的な犯罪');
INSERT INTO "i18n" VALUES(40,'fr_CA','Crimes',6,'description','Bande Organisée');
INSERT INTO "i18n" VALUES(41,'en_CA','Crimes',6,'description','Organized Band');
INSERT INTO "i18n" VALUES(42,'ja_JP','Crimes',6,'description','組織化されたバンド');
INSERT INTO "i18n" VALUES(43,'fr_CA','Crimes',7,'description','Bombe Radiologique');
INSERT INTO "i18n" VALUES(44,'en_CA','Crimes',7,'description','Radiological Bomb');
INSERT INTO "i18n" VALUES(45,'ja_JP','Crimes',7,'description','放射線爆弾');
INSERT INTO "i18n" VALUES(46,'fr_CA','Crimes',8,'description','Crime Passionnel');
INSERT INTO "i18n" VALUES(47,'en_CA','Crimes',8,'description','Passionate Crime');
INSERT INTO "i18n" VALUES(48,'ja_JP','Crimes',8,'description','情熱的な犯罪');
INSERT INTO "i18n" VALUES(49,'fr_CA','Crimes',9,'description','Agression Sexuelle');
INSERT INTO "i18n" VALUES(50,'en_CA','Crimes',9,'description','Sexual Assault');
INSERT INTO "i18n" VALUES(51,'ja_JP','Crimes',9,'description','性的暴力');
INSERT INTO "i18n" VALUES(52,'fr_CA','Crimes',10,'description','Bombe Radiologique');
INSERT INTO "i18n" VALUES(53,'en_CA','Crimes',10,'description','Radiological Bomb');
INSERT INTO "i18n" VALUES(54,'ja_JP','Crimes',10,'description','放射線爆弾');
INSERT INTO "i18n" VALUES(55,'fr_CA','Crimes',11,'description','Agression Sexuelle');
INSERT INTO "i18n" VALUES(56,'en_CA','Crimes',11,'description','Sexual Assault');
INSERT INTO "i18n" VALUES(57,'ja_JP','Crimes',11,'description','性的暴力');
DROP TABLE IF EXISTS "suspects";
CREATE TABLE `suspects` (
  id INTEGER PRIMARY KEY ASC,
  `firstname` CHAR,
  `name` CHAR,
  `vehicule_id` int INTEGER,
  `user_id` int INTEGER
);
INSERT INTO "suspects" VALUES(1,'Jean','Paul',1,1);
INSERT INTO "suspects" VALUES(2,'Bruce','Wayne',2,1);
INSERT INTO "suspects" VALUES(3,'Sebastien','Lamontagne',3,1);
INSERT INTO "suspects" VALUES(4,'Martin','Goule',4,1);
INSERT INTO "suspects" VALUES(5,'Christinia','pope',5,1);
INSERT INTO "suspects" VALUES(6,'Cyrus','Bhaskar',6,1);
INSERT INTO "suspects" VALUES(7,'Uttara','Maximilienne',7,1);
INSERT INTO "suspects" VALUES(8,'Martin','Picard',8,1);
DROP TABLE IF EXISTS "users";
CREATE TABLE `users` (
  id INTEGER PRIMARY KEY ASC,
  `email` VARCHAR,
  `password` VARCHAR,
  `created` DATETIME,
  `modified` DATETIME,
  `role` int INTEGER
);
INSERT INTO "users" VALUES(1,'admin@admin.com','$2y$10$QsNbkQUvEG9BvKxiLSxYJuyxAST7NaY7ClU8y8ChEKqDK6p3jSaM2','2017-09-07 19:40:20','2017-09-07 19:40:20',3);
INSERT INTO "users" VALUES(2,'etudiant@cmomo.ca','$2y$10$/MKQgKZ0rBdePIp1Nvfkx.Usv/upCDqOBy/3rCq6HdFzDcKXsoODC','2017-08-29 12:51:53','2017-08-29 13:05:00',0);
INSERT INTO "users" VALUES(3,'moderateur@cmomo.ca','$2y$10$0P.otepnZTsawvyr7MTbD.8nyw33VnD4AK2Ld0m8QNn/rCU0Nr.SO','2017-09-30 03:17:20','2017-09-30 03:17:20',1);
INSERT INTO "users" VALUES(4,'superutilisateur@cmomo.ca','$2y$10$2vWQpeiSYwNRNnf1vVDbvuf3g4eT5JSEv0CKa.KnDqFYufInVF6oy','2017-09-30 03:17:47','2017-09-30 03:17:47',2);
DROP TABLE IF EXISTS "vehicules";
CREATE TABLE `vehicules` (
  id INTEGER PRIMARY KEY ASC,
  `type` text TEXT,
  `plate` CHAR not null,
  `user_id` int INTEGER
);
INSERT INTO "vehicules" VALUES(1,'Aucun','000000',1);
INSERT INTO "vehicules" VALUES(2,'Camion','H6A9L2',1);
INSERT INTO "vehicules" VALUES(3,'Moto','L9O7D4',1);
INSERT INTO "vehicules" VALUES(4,'Helicoptere','K7J9I4',1);
INSERT INTO "vehicules" VALUES(5,'Voiture','J8L9G3',1);
INSERT INTO "vehicules" VALUES(6,'Voiture','P9Y6S5',1);
INSERT INTO "vehicules" VALUES(7,'Voiture','U5T9M3',1);
INSERT INTO "vehicules" VALUES(8,'Camion','M8Y5N1',1);
