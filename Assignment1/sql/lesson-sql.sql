CREATE TABLE clinicReport(
  patientid int not null auto_increment,
  name varchar(25) NOT NULL,
  age int(3) NOT NULL,
  contact int(10) NOT NULL,
  bloodgroup varchar(2) NOT NULL,
  disease varchar(30) NOT NULL,
  treatmenttime int(2) NOT NULL,
  primary key (patientid)
);
