<?php
	echo "=================================== INICIANDO BRAZILIAN TIME FIX ===================================" . "\n";
	echo "====================================== Developed by Rafael Tessarolo ===============================";
	echo "\n\n";

	$url = file_get_contents('https://www.timeanddate.com/worldclock/brazil/brasilia');
	preg_match_all('/>(.+)</s', $url, $conteudo);

	$str = $url;
	$from = '<div>';
	$to = "</div>";

	$hora = getStringBetween($str,$from,$to);
	echo "Hora retirada do site: " . $hora . "\n";

	$hora = trim(letterRemove($hora));

	echo "Novo horario sem HTML: ";
	echo $hora;

	echo "\n";

	function getStringBetween($str,$from,$to) {
		$sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
		return substr($sub,0,strpos($sub,$to));
	}

	function letterRemove($str) {
			$str = preg_replace("/[^0-9]/", "", $str);
			$str = str_replace("a", "", $str);
			$str = str_replace("'", "", $str);
			$str = str_replace("`", "", $str);
			$str = str_replace("<", "", $str);
			$str = str_replace("`<'", "", $str);
			$str = str_replace("B", "", $str);
			$str = str_replace("R", "", $str);
			$str = str_replace("T", "", $str);
			return $str;
	}

	$horario = substr($hora, 1, 2) . ":" . substr($hora, 3, 2) . ":" . substr($hora, 5, 2);
	echo "Horario Formatado: " . $horario;
	echo "\n";

	if(is_string($horario)){
			echo "Variavel é String! \n";
			echo "Tamanho da String: " . strlen($horario) . "\n";
	}

	$comando = "date -s $horario";

    echo "Executando Comando no SSH: $comando " . "\n";
    echo "\n";
    system($comando);
    echo "\n\n";
    echo "=================================== BRAZILIAN TIME FIX FINALIZADO ==================================" . "\n";

?>
