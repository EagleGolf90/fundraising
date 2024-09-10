create table winners_prize (
  BusinessUnit varchar(10) not null,
  YearPick int not null default 0,
  EventType int not null default 0,
  PoolNbr int not null default 0,
  QuarterRound int not null default 0,
  Description varchar(100) not null,
  Cost decimal(6,2) not null default 0.00,
  PRIMARY KEY (BusinessUnit, YearPick, EventType, PoolNbr, QuarterRound)
);

-- insert into winners_prize values ('MRZ', 2024, 6, 1, 1, '1st Round', 5.00);
-- insert into winners_prize values ('MRZ', 2024, 6, 1, 2, '2nd Round', 10.00);
-- insert into winners_prize values ('MRZ', 2024, 6, 1, 3, '3rd Round: Sweet Sixteen', 15.00);
-- insert into winners_prize values ('MRZ', 2024, 6, 1, 4, '4th Round: Elite Eight', 25.00);
-- insert into winners_prize values ('MRZ', 2024, 6, 1, 5, '5th Round: Final Four', 40.00);
-- insert into winners_prize values ('MRZ', 2024, 6, 1, 6, '6th Round: Championship', 8.00);

insert into winners_prize values ('USADVB', 2024, 6, 1, 1, '1st Round', 15.00);
insert into winners_prize values ('USADVB', 2024, 6, 1, 2, '2nd Round', 25.00);
insert into winners_prize values ('USADVB', 2024, 6, 1, 3, '3rd Round: Sweet Sixteen', 35.00);
insert into winners_prize values ('USADVB', 2024, 6, 1, 4, '4th Round: Elite Eight', 50.00);
insert into winners_prize values ('USADVB', 2024, 6, 1, 5, '5th Round: Final Four', 70.00);
insert into winners_prize values ('USADVB', 2024, 6, 1, 6, '6th Round: Championship', 100.00);

-- insert into winners_prize select BusinessUnit, YearPick, 7, 2, QuarterRound, Description, Cost from winners_prize;
