create table ncaa_team (
    BusinessUnit varchar(10) not null,
    YearPick int not null default 0,
    EventType int not null default 0,
    PoolNbr int not null default 0,
    SeqNo int not null default 0,
    Team int not null default 0,
    PRIMARY KEY (BusinessUnit, YearPick, EventType, PoolNbr, SeqNo));

insert into ncaa_team select distinct BusinessUnit, YearPick, EventType, PoolNbr, SeqNo, WinningTeam from squaregridwinners where BusinessUnit = 'PCDWBA' and YearPick = 2024 and EventType = 6 and Quarter = 1;
insert into ncaa_team select distinct BusinessUnit, YearPick, EventType, PoolNbr, SeqNo+32, LosingTeam from squaregridwinners where BusinessUnit = 'PCDWBA' and YearPick = 2024 and EventType = 6 and Quarter = 1;
insert into ncaa_team select distinct BusinessUnit, YearPick, EventType, PoolNbr, SeqNo, WinningTeam from squaregridwinners where BusinessUnit = 'PCDWBA' and YearPick = 2024 and EventType = 7 and Quarter = 1;
insert into ncaa_team select distinct BusinessUnit, YearPick, EventType, PoolNbr, SeqNo+32, LosingTeam from squaregridwinners where BusinessUnit = 'PCDWBA' and YearPick = 2024 and EventType = 7 and Quarter = 1;

select * from sql_statements where sqlname = 'insertSquareGridWinners';
select max(sqlid) from sql_statements;
insert into sql_statements values (81, 'insertSquareGridWinners', 'insert into squaregridwinners values (\':a1\', :b1, :c1, :d1, :e1, :f1, :g1, :h1, :i1, :j1, :k1, :l1, \'Y\')');
