SELECT * FROM viaggio
INNER JOIN av
ON  viaggio.codV = av.CodV
INNER JOIN autisti
ON autisti.Npatente=AV.Npatente
WHERE autisti.Npatente='VE12121121'