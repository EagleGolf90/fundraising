create table squaregridwinners_2024 select * from squaregridwinners;

select * from squaregridwinners_2024;

alter table squaregridwinners add WinningTeam int not null default 0 after SeqNo;
alter table squaregridwinners add LosingTeam int not null default 0 after WinningTeam;

insert into colleges values (363, 'Grand Canyon');
insert into colleges values (364, 'California Baptist');

select * from sql_statements where sqlname = 'listSquareWinners';
select max(sqlid) from sql_statements;
insert into sql_statements values (78, 'listSquareWinners', 'select * from vw_winners_prize where BusinessUnit = \':a1\' and YearPick = :b1 and EventType = :c1 and PoolNbr = :d1');
