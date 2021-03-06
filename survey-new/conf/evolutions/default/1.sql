# --- Created by Ebean DDL
# To stop Ebean DDL generation, remove this comment and start using Evolutions

# --- !Ups

create table person (
  id                            varchar(255) not null,
  name                          varchar(255),
  age                           varchar(255),
  gender                        varchar(255),
  email                         varchar(255),
  constraint pk_person primary key (id)
);
create sequence person_seq increment by 1;


# --- !Downs

drop table if exists person;
drop sequence if exists person_seq;

