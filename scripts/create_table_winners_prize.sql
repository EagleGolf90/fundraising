create table winners_prize (
  BusinessUnit varchar(10) not null,
  YearPick int not null default 0,
  EventType int not null default 0,
  PoolNbr int not null default 0,
  QuarterRound int not null default 0,
  Cost decimal(6,2) not null default 0.00,
  PRIMARY KEY (BusinessUnit, YearPick, EventType, PoolNbr, QuarterRound)
);

insert into winners_prize values ('PCDWBA', 2024, 6, 1, 1, 15.00);
insert into winners_prize values ('PCDWBA', 2024, 6, 1, 2, 25.00);
insert into winners_prize values ('PCDWBA', 2024, 6, 1, 3, 35.00);
insert into winners_prize values ('PCDWBA', 2024, 6, 1, 4, 50.00);
insert into winners_prize values ('PCDWBA', 2024, 6, 1, 5, 70.00);
insert into winners_prize values ('PCDWBA', 2024, 6, 1, 6, 100.00);

-- insert into winners_prize select BusinessUnit, YearPick, 7, 2, QuarterRound, Cost from winners_prize;
