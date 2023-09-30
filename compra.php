<?php
	session_start();
	
	$compra_path = $_SERVER['DOCUMENT_ROOT'] . '/M4/xslt/compra/compra-';
	$file_path = $compra_path.session_id().".xml";
	 $preu = floatval($_POST['preu']);
     $quantitat = floatval($_POST['quantitat']);

     $product = $preu * $quantitat;
	 
	$total = number_format($product, 2, ',', '.').' $';
	
	//ob_start();
	if(!file_exists($file_path)) {
		$gestor = fopen($file_path, "w");
		
		   //omplim el fitxer
	fwrite($gestor, "<?xml version='1.0' encoding='UTF-8'?>");
	fwrite($gestor, PHP_EOL);
	fwrite($gestor, "<?xml-stylesheet href='cistell.xsl' type='text/xsl'?>");
	fwrite($gestor, PHP_EOL);
	
    fwrite($gestor, '<compra>');
    fwrite($gestor, PHP_EOL);
    fwrite($gestor, "\t");
    fwrite($gestor, '<article>');

    fwrite($gestor, PHP_EOL);
    fwrite($gestor, "\t");
    fwrite($gestor, "\t");
    fwrite($gestor, '<Codi>');
    fwrite($gestor, $_POST['codi']);
    fwrite($gestor, '</Codi>');
    fwrite($gestor, PHP_EOL);
    fwrite($gestor, "\t");
    fwrite($gestor, "\t");
    fwrite($gestor, '<Qtat>');
	fwrite($gestor, $_POST['quantitat']);
    fwrite($gestor, '</Qtat>');
    fwrite($gestor, PHP_EOL);
    fwrite($gestor, "\t");
    fwrite($gestor, "\t");
    fwrite($gestor, '<Preu>');
	fwrite($gestor, $_POST['preu']);
    fwrite($gestor, '</Preu>');
    fwrite($gestor, PHP_EOL);
	fwrite($gestor, "\t");
    fwrite($gestor, "\t");
    fwrite($gestor, '<Total>');
	fwrite($gestor, $total);
    fwrite($gestor, '</Total>');
    fwrite($gestor, PHP_EOL);
	fwrite($gestor, "\t");
    fwrite($gestor, "\t");
    fwrite($gestor, '<Iva>');
	fwrite($gestor, $_POST['iva']);
    fwrite($gestor, '</Iva>');
    fwrite($gestor, PHP_EOL);
	fwrite($gestor, "\t");
    fwrite($gestor, "\t");
    fwrite($gestor, '<img>');
	fwrite($gestor, $_POST['imatge']);
    fwrite($gestor, '</img>');
    fwrite($gestor, PHP_EOL);
	fwrite($gestor, "\t");
    fwrite($gestor, "\t");
    fwrite($gestor, '<Nom>');
	fwrite($gestor, $_POST['nom']);
    fwrite($gestor, '</Nom>');
    fwrite($gestor, PHP_EOL);

    fwrite($gestor, "\t");
    fwrite($gestor, '</article>');
    fwrite($gestor, PHP_EOL);
    fwrite($gestor, '</compra>');
	
		//tanquem el fitxer
		fclose($gestor);
	}
	
	else {
    // Cargar el archivo XML y buscar el artículo correspondiente
    $xml = simplexml_load_file($file_path);
    $article = $xml->xpath("//article[Codi='{$_POST['codi']}']")[0] ?? null;
    
    if ($article) {
        // El artículo ya existe, agregar la cantidad y actualizar el total
        $qtat_node = $article->Qtat[0];
        $qtat_node[0] = intval($qtat_node) + $_POST['quantitat'];
        $article->Total[0] = number_format(floatval($article->Preu[0]) * intval($qtat_node) , 2, ',', '.').' ';
    } else {
        // El artículo no existe, agregar uno nuevo
        $article = $xml->addChild('article');
        $article->addChild('Codi', $_POST['codi']);
        $article->addChild('Qtat', $_POST['quantitat']);
        $article->addChild('Preu', $_POST['preu']);
        $article->addChild('Iva', $_POST['iva']);
        $article->addChild('img', $_POST['imatge']);
		$article->addChild('Nom', $_POST['nom']);
        $article->addChild('Total', $total);
    }
	  $xml->asXML($file_path);
  }
	
	
	//ob_end_clean();

	header('Location: botiga2.xml');
	
?>