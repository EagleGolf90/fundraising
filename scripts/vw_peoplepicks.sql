drop view vw_peoplepicks;

create view vw_peoplepicks as
select pp.PersonID, pp.BusinessUnit, pp.YearPick, pp.EventType, pp.PoolNbr, s.SquareNbr, s.TopGrid, s.LeftGrid,
       ta.PickScore as TopAreaScore, la.PickScore as LeftAreaScore
  from peoplepicks pp inner join squares s on pp.SquareNbr = s.SquareNbr
		  inner join squaregriddraw la
           on la.BusinessUnit = pp.BusinessUnit and la.YearPick = pp.YearPick and la.EventType = pp.EventType and la.PoolNbr = pp.PoolNbr
                 and la.Square = s.LeftGrid and la.Grid = 'LA'
		  inner join squaregriddraw ta
           on ta.BusinessUnit = pp.BusinessUnit and ta.YearPick = pp.YearPick and ta.EventType = pp.EventType and ta.PoolNbr = pp.PoolNbr
                 and ta.Square = s.TopGrid and ta.Grid = 'TA'
;
