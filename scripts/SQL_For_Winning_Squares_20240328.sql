select sgw.Quarter Rounds, pp.SquareNbr, TopAreaScore, LeftAreaScore, p.NickName, wp.Cost
  from vw_peoplepicks pp
                inner join squaregridwinners sgw on pp.BusinessUnit = sgw.BusinessUnit and pp.YearPick = sgw.YearPick and pp.EventType = sgw.EventType and pp.PoolNbr = sgw.PoolNbr
                    and pp.TopAreaScore = sgw.TopLast and pp.LeftAreaScore = sgw.LeftLast
				inner join participants p on pp.BusinessUnit = p.BusinessUnit and pp.PersonID = p.PersonID
                inner join winners_prize wp on wp.BusinessUnit = sgw.BusinessUnit and wp.YearPick = sgw.YearPick and wp.EventType = sgw.EventType and wp.PoolNbr = sgw.PoolNbr
					and wp.QuarterRound = sgw.Quarter
 where pp.BusinessUnit = 'PCDWBA' and pp.YearPick = 2024 and pp.EventType = 6 and pp.PoolNbr = 1
 order by Rounds, SquareNbr
;

-- Show winners' name and prize
select * from vw_winners_prize where BusinessUnit = 'PCDWBA' and YearPick = 2024 and EventType = 6 and PoolNbr = 1 and Rounds = 1;

-- Total winners' name and prizes
select NickName, Sum(Cost) Total from vw_winners_prize where BusinessUnit = 'PCDWBA' and YearPick = 2024 and EventType = 6 and PoolNbr = 1 group by NickName order by Sum(Cost) desc;
