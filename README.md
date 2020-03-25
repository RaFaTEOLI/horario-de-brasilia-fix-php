# horario-de-brasilia-fix-php
Programa em php para ajustar o horário do servidor caso haja algum problema com o NTP instalado ou problema de horário interno.

Recomendo que agende para que o programe rode todo dia as 00 horas no crontab.
00 00 * * * php /<diretorio>/HorarioDeBrasilia.php
