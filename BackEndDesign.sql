/*
    Jaime Arnold
    CS 458 - Table Design for the Back-End (Find Your Humboldt website)
    V1.0 - 10/30/2019
*/

DROP TABLE Biz_prof CASCADE CONSTRAINTS;

CREATE TABLE Biz_prof
( biz_id integer,
  name varchar2(25),
  street_add varchar2(25),
  city varchar2(20),
  state char(2),
  type varchar2(20),
  active char(1),
  phone varchar2(12),
  username varchar2(20),
  password varchar2(20),
  liaison varchar2(20),
  primary key (biz_id)
);

DROP TABLE Survey CASCADE CONSTRAINTS;

CREATE TABLE Survey
( surv_id integer,
  new_dest varchar2(40),
  new_eatery varchar2(40),
  new_ev varchar2(40),
  new_att varchar2(40),
  comments varchar2(75),
  usr_name varchar2(30),
  usr_email varchar2(30),
  primary key (surv_id)
);

DROP TABLE Outdoor_dest CASCADE CONSTRAINTS;

CREATE TABLE Outdoor_dest
( out_id integer,
  bathrooms char(1),
  distance varchar2(15),
  difficulty varchar2(6),
  attractions varchar2(20),
  street_add varchar2(25),
  city varchar2(20),
  state char(2),
  cost char(3),
  description varchar2(255),
  directions varchar2(75),
  primary key (out_id)
);

DROP TABLE Eatery CASCADE CONSTRAINTS;

CREATE TABLE Eatery
( eat_id integer,
  description varchar2(255),
  link varchar2(50),
  price char(3),
  delivery char(1),
  storefront char(1),
  truck char(1),
  biz_id integer,
  street_add varchar2(25),
  city varchar2(20),
  state char(2),
  primary key (eat_id),
  foreign key (biz_id) REFERENCES Biz_prof
);

DROP TABLE Event CASCADE CONSTRAINTS;

CREATE TABLE Event
( ev_id integer,
  ev_type varchar2(20),
  alcohol char(1),
  food char(1),
  ticket_price varchar2(7),
  description varchar2(255),
  street_add varchar2(25),
  city varchar2(20),
  state char(2),
  biz_id integer,
  primary key (ev_id),
  foreign key (biz_id) REFERENCES Biz_prof
);

DROP TABLE Attraction CASCADE CONSTRAINTS;

CREATE TABLE Attraction
( att_id integer,
  att_type varchar2(20),
  price varchar2(7),
  phone varchar2(12),
  street_add varchar2(25),
  city varchar2(20),
  state char(2),
  description varchar2(255),
  biz_id integer,
  primary key (att_id),
  foreign key (biz_id) REFERENCES Biz_prof
);
