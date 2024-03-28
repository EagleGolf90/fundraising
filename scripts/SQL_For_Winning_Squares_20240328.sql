select sgw.Quarter Rounds, pp.SquareNbr, TopAreaScore, LeftAreaScore, p.NickName, wp.Cost
  from vw_peoplepicks pp
                inner join squaregridwinners sgw on pp.BusinessUnit = sgw.BusinessUnit and pp.YearPick = sgw.YearPick and pp.EventType = sgw.EventType and pp.PoolNbr = sgw.PoolNbr
                    and pp.TopAreaScore = sgw.TopLast and pp.LeftAreaScore = sgw.LeftLast
				inner join participants p on pp.BusinessUnit = p.BusinessUnit and pp.PersonID = p.PersonID
                inner join winners_prize wp on wp.BusinessUnit = sgw.BusinessUnit and wp.YearPick = sgw.YearPick and wp.EventType = sgw.EventType and wp.PoolNbr = sgw.PoolNbr
					and wp.QuarterRound = sgw.Quarter
 where pp.BusinessUnit = 'PCDWBA' and pp.YearPick = 2024 and pp.EventType = 6 and pp.PoolNbr = 1
--    and sgw.Quarter = 2
--    and pp.TopAreaScore = 2
--   and pp.LeftAreaScore = 8
 order by Rounds, SquareNbr
;


select p.NickName, sum(wp.Cost) as Total
  from vw_winners_prize wp inner join participants p on wp.PersonID = p.PersonID
 where wp.BusinessUnit = 'PCDWBA' and wp.YearPick = 2024 and wp.EventType = 6 and wp.PoolNbr = 1
 group by p.NickName
 order by Sum(wp.Cost) desc
;
