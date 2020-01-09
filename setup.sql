/*
MEMBER(member_num, first_name, last_name, rank, unit, email)
ADA(ada_num, title, directive)
MEMBERSHIP(membership_num, ada_num, member_num)
*/

drop table if exists MEMBERSHIP;
drop table if exists PRIMARY;
drop table if exists SECONDARY;
drop table if exists ADA;
drop table if exists MEMBER;

create table MEMBER
  (member_num int auto_increment primary key,
  first_name  char(15),
  last_name   char(15),
  rank        varchar(7),
  unit        char(15),
  email       varchar(50));

create table ADA
  (ada_num          int auto_increment primary key,
  title             varchar(50),
  directive         varchar(255));

create table PRIMARY
  (prime_num  int auto_increment primary key,
  ada_num     int,
  member_num  int,
  foreign key(ada_num)    references ADA(ada_num),
  foreign key(member_num) references MEMBER(member_num));

create table SECONDARY
  (ada_num    int primary key,
  member_num  int,
  foreign key(ada_num)    references ADA(ada_num),
  foreign key(member_num) references MEMBER(member_num));

create table MEMBERSHIP
  (ada_num int primary key,
  member_num      int,
  foreign key(ada_num)    references ADA(ada_num),
  foreign key(member_num)  references MEMBER(member_num));

#populate some test data
insert into MEMBER(first_name, last_name, rank, unit, email)
  values('Amy', 'Greenan', 'MSgt', '183 CF', 'amy.greenan@fake.email');
insert into MEMBER(first_name, last_name, rank, unit, email)
  values('Andrew', 'Eldridge', 'SSgt', '183 ACOMF', 'andrew.eldridge@fake.email');
insert into MEMBER(first_name, last_name, rank, unit, email)
  values('Joseph', 'McDade', 'SrA', '183 ACOMF', 'joseph.mcdade@fake.email');
insert into ADA(title, directive)
  values('Work', 'AFI 42');
insert into ADA(title, directive)
  values('Flatline Four', 'AFI 69');
insert into PRIMARY(ada_num, member_num)
  values(1, 1);
insert into PRIMARY(ada_num, member_num)
  values(2, 3);
insert into SECONDARY(ada_num, member_num)
  values(1, 2);
insert into MEMBERSHIP(ada_num, member_num)
  values(1, 1);
insert into MEMBERSHIP(ada_num, member_num)
  values(1, 2);
insert into MEMBERSHIP(ada_num, member_num)
  values(1, 3);
insert into MEMBERSHIP(ada_num, member_num)
  values(2, 3);
