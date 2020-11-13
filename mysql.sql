update teachers set name = 'Adam', surname='Bol', email = 'user@edu.kz', level='middle' where id = 5;
update subjects set `nameOfSubject` = 'SDT', `credit` = 2, `code`='SDD' where `id` = 6;

CREATE table groups
(
    id         int primary key auto_increment,
    group_name varchar(255) not null
);

create table students
(
    id          int UNSIGNED auto_increment primary key,
    name        varchar(50)  not null,
    surname     varchar(50)  not null,
    birthday    date         not null,
    phoneNumber varchar(30)  not null,
    email       varchar(255) not null,
    speciality  varchar(255) not null,
    group_id    int,
    login       varchar(255) not null,
    password    varchar(255) not null
);

create table students
(
    id          int UNSIGNED auto_increment primary key,
    name        varchar(50)  not null,
    surname     varchar(50)  not null,
    birthday    date         not null,
    phoneNumber varchar(30)  not null,
    email       varchar(255) not null,
    speciality  varchar(255) not null,
    group_id    int,
    login       varchar(255) not null,
    password    varchar(255) not null
);

CREATE TABLE `subjects`
(
    `id`            INT          NOT NULL AUTO_INCREMENT,
    `nameOfSubject` VARCHAR(255) NOT NULL,
    `credit`        INT          NOT NULL,
    `code`          VARCHAR(10)  NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `teachers`
(
    `id`      INT          NOT NULL AUTO_INCREMENT,
    `name`    VARCHAR(255) NOT NULL,
    `surname` VARCHAR(255) NOT NULL,
    `email`   VARCHAR(255) NOT NULL,
    `level`   VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `teach`
(
    `id`         INT NOT NULL AUTO_INCREMENT,
    `teacher_id` INT NOT NULL,
    `subject_id` INT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
ALTER TABLE `teach`
    ADD FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `teach`
    ADD FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `groupsubjects`
(
    `id`       INT NOT NULL AUTO_INCREMENT,
    `group_id` INT NOT NULL,
    `teach_id` INT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
ALTER TABLE `groupsubjects`
    ADD FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `groupsubjects`
    ADD FOREIGN KEY (`teach_id`) REFERENCES `teach` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `subjectdeadline`
(
    `id`            INT          NOT NULL AUTO_INCREMENT,
    `groupSubjID`   INT          NOT NULL,
    `taskName`      VARCHAR(255) NOT NULL,
    `deadline_date` DATE         NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `subjectdeadline`
    ADD FOREIGN KEY (`groupSubjID`) REFERENCES `groupsubjects` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;


select * from teachers;
select *
from students;
select *
from `groups`;
select *
from subjects;

select *
from students
where login = ?
  and password = ?;

select s.id,
       s.name,
       s.surname,
       s.birthday,
       s.phoneNumber,
       s.email,
       s.speciality,
       g.group_name
from students s,
     `groups` g
where s.group_id = g.id
  and s.id = 1;

select s.nameOfSubject, s.credit, s.code, tc.name, tc.surname
from subjects s,
     students st,
     `groups` g,
     groupsubjects gj,
     teach t,
     teachers tc
where st.group_id = g.id
  and gj.group_id = g.id
  and gj.teach_id = t.id
  and t.subject_id = s.id
  and t.teacher_id = tc.id
  and st.id = 1;
# select g.group_name,
# from groupsubjects gs, `groups` g, teach t, teachers tch, subjects s

select s.id, s.name, s.surname, s.birthday, s.phoneNumber, s.email, s.speciality, s.group_id, g.group_name from students s, `groups` g where s.group_id=g.id;

select * from `groups`;

insert  into students(id, name, surname, birthday, phoneNumber, email, speciality, group_id, login, password) values(null, :n, :surname, :birth, :phone,:email, :speciality, :grID, :login, :pass);

# insert into teachers(id, name,surname, email, level) values (null,)
insert into teach(id, teacher_id, subject_id) values (null,:t, :s);

select tch.id, t.id, s.id, t.name, t.surname, s.nameOfSubject from teachers t, subjects s, teach tch where tch.subject_id=s.id and tch.teacher_id=t.id;

select * from teachers where id = :id;
select * from students where id = :id;
select * from subjects where id = :id;
select * from teach where id = :id;

update teachers set name = :n, surname=:surn, email= :em, level= :lv where id = :id;

UPDATE `teachers` SET `name` = :n, `surname` = :sn, `email` = :em, `level` = :lv
WHERE `teachers`.`id` = :id;

delete from teachers where id = :id;