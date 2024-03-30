alter table squaregridwinners add column SeqNo int not null default 0 after Quarter;

alter table squaregridwinners drop primary key;
alter table squaregridwinners add primary key (BusinessUnit, YearPick, EventType, PoolNbr, Quarter, SeqNo);

alter table squaregridwinners add WinningTeam int not null default 0 after SeqNo;
alter table squaregridwinners add LosingTeam int not null default 0 after WinningTeam;
