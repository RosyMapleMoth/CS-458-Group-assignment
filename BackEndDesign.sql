/*

    Jaime Arnold
    CS 458 - Table Design for the Back-End (Find Your Humboldt website)
    V1.0 - 10/30/2019

*/

DROP TABLE Biz_prof CASCADE CONSTRAINTS;

CREATE TABLE Biz_prof
( biz_id integer,
  street_add varchar2(25),
  city varchar2(20),
  state varchar2(2),
  type varchar2(20),
  active char(1),
  phone varchar2(12),
  username varchar2(20),
  password varchar2(20),
  liaison varchar2(20),
  primary key (biz_id)
);
