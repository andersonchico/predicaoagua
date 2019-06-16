<?php
//Anderson Almeida
$linha = "";
try {
    $dir = new DirectoryIterator('csv/');
    foreach ($dir as $item) {
        if ($item->isDot()) {
            continue;
        }
        //pega o nome do arquivo
		if ($item->getBasename() != "desktop.ini"){
			echo $item->getBasename().'<br />';
			// Abre o Arquvio no Modo r (para leitura)
			$arquivo = fopen ($item->getBasename(), 'r');
			$row = 1;
			
			// Lê o conteúdo do arquivo 
			while(!feof($arquivo)){
				if ($row <= 15){
					fgets($arquivo);
				}else {				
					//Mostra uma linha do arquivo
					$linha .= fgets($arquivo);	
				}
				$row++;
			}
			echo $linha;
			// Fecha arquivo aberto
			fclose($arquivo);

			$fileHandle = fopen ('dados.csv' , 'w+'); 
			fwrite ($fileHandle , $linha); 
			fclose ($fileHandle );
		}
    }

} catch (UnexpectedValueException $e) {
    echo 'Erro: '.$e->getMessage();
}

?>
