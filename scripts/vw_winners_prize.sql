drop view vw_winners_prize;
create view vw_winners_prize as
select pp.BusinessUnit, pp.YearPick, pp.EventType, pp.PoolNbr, pp.PersonID, sgw.Quarter Rounds, pp.SquareNbr, cw.Description WinningTeam, cl.Description LosingTeam, sgw.TopScore, sgw.LeftScore,
       TopAreaScore, LeftAreaScore, p.NickName, wp.Cost
  from vw_peoplepicks pp
                inner join squaregridwinners sgw on pp.BusinessUnit = sgw.BusinessUnit and pp.YearPick = sgw.YearPick and pp.EventType = sgw.EventType and pp.PoolNbr = sgw.PoolNbr
                    and pp.TopAreaScore = sgw.TopLast and pp.LeftAreaScore = sgw.LeftLast
				inner join participants p on pp.BusinessUnit = p.BusinessUnit and pp.PersonID = p.PersonID
                inner join winners_prize wp on wp.BusinessUnit = sgw.BusinessUnit and wp.YearPick = sgw.YearPick and wp.EventType = sgw.EventType and wp.PoolNbr = sgw.PoolNbr
					and wp.QuarterRound = sgw.Quarter
				inner join colleges cw on cw.Team = sgw.WinningTeam
                inner join colleges cl on cl.Team = sgw.LosingTeam
 order by Rounds, SquareNbr;