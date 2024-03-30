create table squaregridwinners_2024 select * from squaregridwinners;

select * from squaregridwinners_2024;

alter table squaregridwinners add WinningTeam int not null default 0 after SeqNo;
alter table squaregridwinners add LosingTeam int not null default 0 after WinningTeam;

insert into colleges values (363, 'Grand Canyon');
