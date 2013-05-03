# From CDbAuthManager

drop table if exists `AuthAssignment`;
drop table if exists `AuthItemChild`;
drop table if exists `AuthItem`;

create table `AuthItem`
(
   `name`                 varchar(64) not null,
   `type`                 integer not null,
   `description`          text,
   `bizrule`              text,
   `data`                 text,
   primary key (`name`)
) engine InnoDB;

create table `AuthItemChild`
(
   `parent`               varchar(64) not null,
   `child`                varchar(64) not null,
   primary key (`parent`,`child`),
   foreign key (`parent`) references `AuthItem` (`name`) on delete cascade on update cascade,
   foreign key (`child`) references `AuthItem` (`name`) on delete cascade on update cascade
) engine InnoDB;

create table `AuthAssignment`
(
   `itemname`             varchar(64) not null,
   `userid`               varchar(64) not null,
   `bizrule`              text,
   `data`                 text,
   primary key (`itemname`,`userid`),
   foreign key (`itemname`) references `AuthItem` (`name`) on delete cascade on update cascade
) engine InnoDB;

CREATE  TABLE `users` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `status` INT(1) NOT NULL DEFAULT 0 ,
  `lastLogin` INT NULL ,
  `createdAt` INT NULL ,
  `updatedAt` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO `users` (`username`, `email`, `password`, `status`) VALUES ('admin', 'admin', '$2a$10$yarubrebr4bruf4sametrO5RPnc9tAV56f400.XCH0PgwRiUj8ME.', '1');

INSERT INTO `AuthItem` (`name`, `description`, `type`, `data`) VALUES ('superadmin', 'SuperAdmin', '2', 'N;');
INSERT INTO `AuthAssignment` (`itemname`, `userid`, `data`) VALUES ('superadmin', '1', 'N;');