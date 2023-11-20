
create database if not exists foci;
use foci;

drop table if exists klub;
create table klub (
    id int(10) unsigned not null auto_increment,
    csapatnev varchar(255) not null,
    primary key (id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Klubbok';

insert into klub values (1,'');


drop table if exists poszt;
create table poszt (
    id int(10) unsigned not null auto_increment,
    nev varchar(60) not null,
    primary key (id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Posztok';

insert into poszt values (1,'');


drop table if exists labdarugo;
create table labdarugo (
    id int(10) unsigned not null auto_increment,
    mezszam int(10) unsigned not null comment 'A labdarúgó mezére írt szám', 
    klubid int(10) unsigned not null comment 'A labdarúgó aktuális klubjának azonosítója', 
    posztid int(10) unsigned not null comment 'A labdarúgó posztjának azonosítója', 
    utonev varchar(100) comment 'A labdarúgó utóneve', 
    vezeteknev varchar(100) comment 'A labdarúgó vezetékneve', 
    szulido date not null comment 'A labdarúgó születési dátuma', 
    magyar tinyint(4) unsigned not null comment 'Értéke igaz, ha magyar állampolgár (is) a labdarúgó', 
    kulfoldi tinyint(4) unsigned not null comment 'Értéke igaz, ha külföldi állampolgár (is) a labdarúgó', 
    ertek int(10) unsigned not null comment 'A labdarúgó euróezrekben kifejezett értéke',
    primary key (id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Játékosok';


drop table if exists felhasznalok;
create table felhasznalok (
    id int(10) unsigned not null auto_increment,
    nev varchar(255) not null,
    adminisztrator tinyint(4) unsigned not null default 0,
    email varchar(255) not null comment 'E-mail cím, egyben login név is',
    telefon varchar(20),
    kod varchar(60),
    jelszo varchar(255) not null,
    regisztracio datetime not null,
    email_megerosítve datetime,
    allapot varchar(1) not null comment 'Állapot: A: aktív, D: törölt',
    primary key (id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Felhasználók';

insert into felhasznalok values (1,'',0,'',null,null,'','2000-01-01 00:00:00',null,'D');

drop table if exists tokens;
create table tokens (
    id int(10) unsigned not null auto_increment,
    felhasznalo_id int(10) unsigned not null,
    token_str varchar(255) not null,
    letrehozva datetime not null,
    torolt tinyint(4) not null default 0,
    primary key (id),
    index (token_str)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Felhasználók';

insert into tokens values (1,1,'','2000-01-01 00:00:00',1);

