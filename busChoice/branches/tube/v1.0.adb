v1.0:

PARTE 1 - TIME TO ARRIVAL 1

1) Calcular currentDateEpoch

3) Calcular arrivalTime17Epoch = currentDateEpoch + walkTime17

2) Pegar array bus17ArrivalTime
http://countdown.api.tfl.gov.uk/interfaces/ura/instant_V1?StopCode1=71556&LineID=17&DirectionID=1&VisitNumber=1&ReturnList=StopCode1,StopPointName,LineName,DestinationText,EstimatedTime

4) Apagar epochs inferiores ao arrivalTime17Epoch

5) Gravar bus17EarliestArrivalTime

PART 2 - TIME TO ARRIVAL 2

1) Calcular arrivalTime153Epoch = currentDateEpoch + walkTime153

2) Pegar array bus153ArrivalTime
http://countdown.api.tfl.gov.uk/interfaces/ura/instant_V1?StopCode1=58549&LineID=153&DirectionID=1&VisitNumber=1&ReturnList=StopCode1,StopPointName,LineName,DestinationText,EstimatedTime

4) Apagar epochs inferiores ao arrivalTime153Epoch

5) Gravar bus153EarliestArrivalTime

PART 3 - CALCULAR ARRIVAL TIME FOR BOTH OPTIONS

1) Calcular bus17arrivalTimetoOffice = bus17EarliestArrivalTime + bus17Route + walkDistanceBus17

2) Calcular bus153arrivalTimetoOffice = bus153EarliestArrivalTime + bus153Route + walkDistanceBus153

3) Calcular qual é menor bus17arrivalTimetoOffice ou bus153arrivalTimetoOffice

PART 4 - MOSTRAR QUAL A MELHOR OPÇAO