/* Sistema-ARIETE!! Bruno_Aguiar-DSi_02_N-LowfirE-20230317
*/

CREATE DATABASE arietedb;

USE arietedb;


CREATE TABLE IF NOT EXISTS userinfo(
	id_usu INTEGER PRIMARY KEY AUTO_INCREMENT,
	login VARCHAR(15) UNIQUE NOT NULL,
	passw VARCHAR(50) NOT NULL,
	name VARCHAR(100) NOT NULL,
	email VARCHAR(100),
	phone VARCHAR(20),
	rdate DATE,
	adm TINYINT(1),
	u TINYINT(1)
);


CREATE TABLE IF NOT EXISTS userinfocrim(
	id_cri INTEGER PRIMARY KEY AUTO_INCREMENT,
	id_usu INTEGER,
	namec VARCHAR(100),
	moth VARCHAR(100),
	fath VARCHAR(100),
	nation VARCHAR(50),
	naturali VARCHAR(50),
	statnat CHAR(2),
	ident VARCHAR(20),
	issuer CHAR(10),
	statiss CHAR(2),
	passp VARCHAR(12),
	passps CHAR(2),
	birth DATE,
	cpf VARCHAR(14) UNIQUE
);

CREATE TABLE IF NOT EXISTS crimereport(
	id_rep INTEGER PRIMARY KEY AUTO_INCREMENT,
	id_usu INTEGER NOT NULL,
	distr VARCHAR(50) NOT NULL,
	crimetype VARCHAR(50) NOT NULL,
	criminal VARCHAR(50) NOT NULL,
	addinfo VARCHAR(100),
	dtime DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS alertdistrict(
	id_ale INTEGER PRIMARY KEY AUTO_INCREMENT,
	id_usu INTEGER,
	bairr CHAR(3) NOT NULL,
	mrange TINYINT(4) NOT NULL,
	yesno CHAR(3) NOT NULL
);

CREATE TABLE IF NOT EXISTS realalert (
	id_usu INTEGER UNIQUE,
	alertr INTEGER(5),
	notify TINYINT(1)
);

CREATE TABLE IF NOT EXISTS distalert (
	id_usu INTEGER,
	bairr VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS logadm (
	id_lad INTEGER PRIMARY KEY AUTO_INCREMENT,
	logdt DATETIME NOT NULL,
	id_adm INTEGER NOT NULL,
	logadminfo VARCHAR(300) NOT NULL
);

/* ALTER TABLE */
ALTER TABLE userinfocrim ADD CONSTRAINT id_usu_cri FOREIGN KEY
(id_usu) REFERENCES userinfo(id_usu);


/* Users para testes: */

INSERT INTO `userinfo` (`id_usu`,`login`,`passw`,`name`,`email`,`phone`,`rdate`,`adm`)
VALUES
(NULL,'aaa',/* 'aaa' */'47bce5c74f589f4867dbd57e9ca9f808','Aaa da Silva','aaasilva@gmail.com','81989999999','2023-04-01',2),
(NULL,'bbb',/* 'bbb' */'08f8e0260c64418510cefb2b06eee5cd','Bbbb Almeida','bbbalmeida@hotmail.com','81987888888','2023-04-05',1),
(NULL,'ccc',/* 'ccc' */'9df62e693988eb4e1e1444ece0578579','Cccc Caranguejo','siricccc@yahoo.com','81989777777','2023-04-10',null),
(NULL,'ddd',/* 'ddd' */'77963b7a931377ad4ab5ad6a9cd718aa','Dddd Danosse','danosseddd@daily.com','91878877887',CURDATE(),null),
(NULL,'eee',/* 'eee' */'d2f2297d6e829cd3493aa7de4416a18f','Eeee Eeee Eeee','eee.eee@email.com','81878878878',CURDATE(),null);
UPDATE `userinfo` SET `u` = '1' WHERE `userinfo`.`login` = 'bbb'; 
UPDATE `userinfo` SET `u` = '1' WHERE `userinfo`.`login` = 'aaa'; 


INSERT INTO `userinfocrim` (`id_cri`,`id_usu`,`namec`,`moth`,`fath`,`nation`,`naturali`,`statnat`,`ident`,`issuer`,`statiss`,`passp`,`passps`,`birth`,`cpf`)
VALUES
(NULL,NULL,"AAA","AAA AAA AAA","AAA AAA AAA AAA","AAASILEIRO","AAACIFENSE","PE","7877777","SDS","PE",NULL,NULL,'1999-09-22',"07607607607"),
(NULL,NULL,"BBB","BBB BBB BBB","BBB BBB BBB BBB","BBBZILEIRO","BBBZIENSE","PE","7866666","SDS","BA",NULL,NULL,'1975-07-04',"01178599848"),
(NULL,NULL,"CCC","CCC CCC CCC","CCC CCC CCC CCC","CCCLEIRO","CCCEAULINO","SP","9875687","SDS","SP",NULL,NULL,'1991-12-14',"05014784585"),
(NULL,NULL,"DDD","DDD DDD DDD","DDD DDD DDD DDD","DDDSILEIRO","DDDCIFENSE","DF","3551539","SDS","DF","548621892488","55",'1991-12-14',"05014764585"),
(NULL,NULL,"EEE","EEE DDD EEE","EEE DDD EEE DDD","EEESILEIRO","EEECIFENSE","ES","7189711","SDS","DF",null,null,'1991-12-14',"05085264585");


UPDATE userinfocrim
SET id_usu = (	
	SELECT id_usu
	FROM userinfo
	WHERE userinfo.login = "aaa"
	)
WHERE userinfocrim.namec = "AAA";

UPDATE userinfocrim
SET id_usu = (	
	SELECT id_usu
	FROM userinfo
	WHERE userinfo.login = "bbb"
	)
WHERE userinfocrim.namec = "BBB";

UPDATE userinfocrim
SET id_usu = (	
	SELECT id_usu
	FROM userinfo
	WHERE userinfo.login = "ccc"
	)
WHERE userinfocrim.namec = "CCC";

UPDATE userinfocrim
SET id_usu = (	
	SELECT id_usu
	FROM userinfo
	WHERE userinfo.login = "ddd"
	)
WHERE userinfocrim.namec = "DDD";

UPDATE userinfocrim
SET id_usu = (	
	SELECT id_usu
	FROM userinfo
	WHERE userinfo.login = "eee"
	)
WHERE userinfocrim.namec = "EEE";

INSERT INTO `crimereport`(`id_rep`,`id_usu`,`distr`,`crimetype`,`criminal`,`addinfo`,`dtime`)
VALUES ('NULL',(SELECT id_usu FROM userinfo WHERE userinfo.login = "aaa"),'cag','Assalto','A moto','Dois caras numa moto','2023-03-22 20:29:34');

INSERT INTO `crimereport`(`id_rep`,`id_usu`,`distr`,`crimetype`,`criminal`,`addinfo`,`dtime`)
VALUES ('NULL',(SELECT id_usu FROM userinfo WHERE userinfo.login = "aaa"),'der','Roubo','A pé','invadiram uma casa na rua tal','2023-03-23 20:29:34');

INSERT INTO `crimereport`(`id_rep`,`id_usu`,`distr`,`crimetype`,`criminal`,`addinfo`,`dtime`)
VALUES ('NULL',(SELECT id_usu FROM userinfo WHERE userinfo.login = "bbb"),'jiq','Roubo','A moto','Dois criminosos numa moto roubaram outra moto que estava estacionada.','2023-03-24 20:29:34');

INSERT INTO `crimereport`(`id_rep`,`id_usu`,`distr`,`crimetype`,`criminal`,`addinfo`,`dtime`)
VALUES ('NULL',(SELECT id_usu FROM userinfo WHERE userinfo.login = "bbb"),'mag','Latrocínio','A moto','Mataram uma mulher num assalto na rua fulano de tal.','2023-03-25 20:29:34');

INSERT INTO `crimereport`(`id_rep`,`id_usu`,`distr`,`crimetype`,`criminal`,`addinfo`,`dtime`)
VALUES ('NULL',(SELECT id_usu FROM userinfo WHERE userinfo.login = "ccc"),'pas','Assalto','A moto','Dois caras numa moto','2023-03-26 20:29:34');

INSERT INTO `crimereport`(`id_rep`,`id_usu`,`distr`,`crimetype`,`criminal`,`addinfo`,`dtime`)
VALUES ('NULL',(SELECT id_usu FROM userinfo WHERE userinfo.login = "ccc"),'ibu','Roubo','A pé','invadiram uma casa na rua tal','2023-03-27 20:29:34');

INSERT INTO `crimereport`(`id_rep`,`id_usu`,`distr`,`crimetype`,`criminal`,`addinfo`,`dtime`)
VALUES ('NULL',(SELECT id_usu FROM userinfo WHERE userinfo.login = "ddd"),'ibu','Assalto','A moto','Dois caras numa moto',NOW());

INSERT INTO `crimereport`(`id_rep`,`id_usu`,`distr`,`crimetype`,`criminal`,`addinfo`,`dtime`)
VALUES ('NULL',(SELECT id_usu FROM userinfo WHERE userinfo.login = "ddd"),'ibu','Roubo','A pé','invadiram uma casa na rua tal',NOW());

INSERT INTO `crimereport`(`id_rep`,`id_usu`,`distr`,`crimetype`,`criminal`,`addinfo`,`dtime`)
VALUES ('NULL',(SELECT id_usu FROM userinfo WHERE userinfo.login = "eee"),'ibu','Assalto','A moto','Dois caras numa moto',NOW());

INSERT INTO `crimereport`(`id_rep`,`id_usu`,`distr`,`crimetype`,`criminal`,`addinfo`,`dtime`)
VALUES ('NULL',(SELECT id_usu FROM userinfo WHERE userinfo.login = "eee"),'ibu','Estupro','A moto','Estuprador estava de moto, rendeu e estuprou uma mulher na rua fulano-de-tal.',NOW());




