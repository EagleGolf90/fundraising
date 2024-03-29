select max(sqlid) from sql_statements;
select * from sql_statements where SQLName = 'loadWinnersPrize';
insert into sql_statements values (76, 'loadWinnersPrize', 'select NickName, Sum(Cost) Total from vw_winners_prize where BusinessUnit = \':a1\' and YearPick = :b1 and EventType = :c1 and PoolNbr = :d1 :e1 group by NickName order by Sum(Cost) desc');

select * from sql_statements where sqlname = 'listSquaresWinner';
select max(sqlid) from sql_statements;
insert into sql_statements values (77, 'listSquaresWinner', 'select * from vw_list_winners where BusinessUnit = \':a1\' and YearPick = :b1 and EventType = :c1 and PoolNbr = :d1 and Rounds = :e1');

insert into menus values (9, 2, 'admin/lists.php?name=winners', 'Overall Winners', 'bg-warning', 'Y', 'A');
insert into menus values (10, 2, 'admin/lists.php?name=list_winners', 'List Winners by Round/Quarter', 'bg-primary', 'Y', 'A');

select * from menus where SeqNo in (9,10);
update menus set Active = 'I' where SeqNo in (9,10);
