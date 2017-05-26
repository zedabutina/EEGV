<?php
        define('MPDF_PATH', 'mpdf/');
        include(MPDF_PATH.'mpdf.php');
        if (!function_exists("mb_check_encoding")) {
                die('mbstring extension is not enabled');
        }
	
	include "conexao.php";
        $mpdf=new mPDF('',    // mode - default ''
             '',    // format - A4, for example, default ''
             0,     // font size - default 0
             '',    // default font family
             15,    // margin_left
             15,    // margin right
             25,     // margin top    -- aumentei aqui para que não ficasse em cima do header
             0,    // margin bottom
             6,     // margin header
             3,     // margin footer
             'L');  // L - landscape, P - portrait
	//$nomequevocequiser = $_POST['codigoDoPLanoDeEnsino'] ou $_GET['codigoDoPLanoDeEnsino'] pra você receber o codigo do plano de ensino
	$sql= sprintf("SELECT * FROM planoensino o INNER JOIN professor r ON r.matricula = o.matricula_professor INNER JOIN disciplina a ON o.codigo_disc = a.codigo INNER JOIN planejamento p ON p.id = o.id ;");//Colocar aqui um ---WHERE o.codigo = '%s'",$nomequevocequiser);--- no final pra saber qual plano de ensino imprimir 
	$resul=pg_query($con,$sql);	
	$result= pg_fetch_array($resul);
	$disc = $result['codigo_disc'];
	$consulta = sprintf("SELECT c.nome FROM curso c INNER JOIN curso_disciplina a ON a.numero = c.numero WHERE a.codigo = '%s' ",$disc);
	$consultar = pg_query($con,$consulta);
	$consultaResult = pg_fetch_array($consultar);
	$curso = $consultaResult['nome'];
	//$mpdf->myvariable = file_get_contents('images/senac.png');
	//$imagem = '<img src="var:myvariable" />';
	$cabecalho=($imagem.'<p style="line-height: 1px;"><b>Faculdade de Tecnologia Senac Goias</b></p><p style="line-height: 1px;"><b>Curso Superior de '. $curso .'</b></p><p style="line-height: 1px;"><b>Plano de ensino</b></p></br>');
	$rodape = ('<p style="text-decoration: overline;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style="line-height: 1px;"><b>Curso Superior de '. $curso .'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Página {PAGENO} de {nbpg}</p>');
	$mpdf->SetHTMLHeader($cabecalho);
	$mpdf->SetHTMLFooter($rodape);
	
		

	$sql1= sprintf("SELECT r.nome FROM planoensino o INNER JOIN professor r ON r.matricula = o.matricula_professor INNER JOIN disciplina a ON o.codigo_disc = a.codigo;");
	$resul1=pg_query($con,$sql1);	
	$result1= pg_fetch_array($resul1);

	$sql2= sprintf("SELECT o.matricula_coordenador FROM planoensino o INNER JOIN professor r ON r.matricula = o.matricula_professor INNER JOIN disciplina a ON o.codigo_disc = a.codigo;");
	$resul2=pg_query($con,$sql2);	
	$result2= pg_fetch_array($resul2);
	$sql3 = sprintf("SELECT nome FROM professor WHERE matricula = '%s'",$result2['matricula_coordenador']);
	$resul3 = pg_query($con,$sql3);
	$result3 = pg_fetch_array($resul3);

	$disciplina = $result['nome'];
	$professor = $result1['nome'];
	$ano = $result['ano'];
	$semestre = $result['semestre'];
	$ch = $result['ch'];
	
		

	$mpdf->WriteHTML('<html>');
	$mpdf->WriteHTML('<head>');
	$mpdf->WriteHTML('<style>
				table { font-family: sans-serif; border:1px solid black; border-collapse: collapse; }
				tr { border:1px solid black; }
				td { }
				.ass {text-decoration: overline;padding:20px;}
			</style>');
	$mpdf->WriteHTML('</head>');
	$mpdf->WriteHTML('<body>');
        
	
	
	$mpdf->WriteHTML("<table>");
	$mpdf->WriteHTML("<tr>");
	$mpdf->WriteHTML('<th colspan="2" style="border:1">');
	$mpdf->WriteHTML('<b>COMPONENTE CURRICULAR</b>');
	$mpdf->WriteHTML('</th>');
	$mpdf->WriteHTML('<td style="width:400px; border:1;" >');
	$mpdf->WriteHTML($disciplina);
	$mpdf->WriteHTML('</td>');
	$mpdf->WriteHTML('<td colspan="2">');
	$mpdf->WriteHTML('<b>CARGA HORÁRIA:</b> '.$ch);
	$mpdf->WriteHTML('</td>');
	$mpdf->WriteHTML('</tr>');
	$mpdf->WriteHTML('<tr>');
	$mpdf->WriteHTML('<th colspan="2" style="border:1">');
	$mpdf->WriteHTML('<b>PROFESSOR</b>');
	$mpdf->WriteHTML('</th>');
	$mpdf->WriteHTML('<td>');
	$mpdf->WriteHTML($professor);
	$mpdf->WriteHTML('</td>');
	$mpdf->WriteHTML('</tr>');
	$mpdf->WriteHTML('<tr>');
	$mpdf->WriteHTML('<th colspan="2" style="border:1">');
	$mpdf->WriteHTML('<b>MÓDULO</b>');
	$mpdf->WriteHTML('</th>');
	$mpdf->WriteHTML('<td>');
	$mpdf->WriteHTML('<b>Ano:</b> '. $ano .' /<b>Semestre:</b>' . $semestre);
	$mpdf->WriteHTML('</td>');
	$mpdf->WriteHTML('</tr>');
	$mpdf->WriteHTML('</table>');
	$mpdf->WriteHTML('<br>');
	$mpdf->WriteHTML('<b>EMENTA</b>');
	$mpdf->WriteHTML('<p >'. $result['ementa'] .'</p>');
	$mpdf->WriteHTML('<br>');
	$mpdf->WriteHTML('<b>OBJETIVOS</b>');
	$mpdf->WriteHTML('<p>'. $result['objetivo'] .'</p>');
	$mpdf->WriteHTML('<br>');
	$mpdf->WriteHTML('<b>COMPETÊNCIAS</b>');
	$mpdf->WriteHTML('<p>'. $result['competencia'] .'</p>');
	$mpdf->WriteHTML('<br>');
	$mpdf->WriteHTML('<b>CONTEÚDOS PROGRAMÁTICOS</b>');
	$mpdf->WriteHTML('<p>'. $result['conteudo_programatico'] .'</p>');
	$mpdf->WriteHTML('<br>');
	$mpdf->WriteHTML('<b>RECURSOS METODOLÓGICOS</b>');
	$mpdf->WriteHTML('<p>'. $result['recurso_metodologico'] .'</p>');	
	$mpdf->WriteHTML('<br>');
	$mpdf->WriteHTML('<b>CRITÉRIOS DE AVALIAÇÃO</b>');
	$mpdf->WriteHTML('<p>'. $result['criterio_avaliacao'] .'</p>');
	$mpdf->WriteHTML('<br>');
	$mpdf->WriteHTML('<b>INSTRUMENTOS DE AVALIAÇÃO</b>');
	$mpdf->WriteHTML('<p>'. $result['instrumento_avaliacao'] .'</p>');
	$mpdf->WriteHTML('<br>');
	$mpdf->WriteHTML('<b>ATIVIDADE EXTRA COMPONENTE (AEC)</b>');
	$mpdf->WriteHTML('<p>'. $result['instrumento_avaliacao'] .'</p>');
	$mpdf->WriteHTML('<br>');
	$mpdf->WriteHTML('<b>BIBLIOGRAFIA BÁSICA</b>');
	$mpdf->WriteHTML('<p>'. $result['bibliografia_basica'] .'</p>');
	$mpdf->WriteHTML('<br>');
	$mpdf->WriteHTML('<b>BIBLIOGRAFIA COMPLEMENTAR</b>');
	$mpdf->WriteHTML('<p>'. $result['bibliografia_complementar'] .'</p>');
	$mpdf->WriteHTML('<br>');
	$mpdf->WriteHTML('<p align="center"><span class="ass">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $professor . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="ass">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $result3['nome'] .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></p>' );	
	$mpdf->WriteHTML('</body>');
	$mpdf->WriteHTML('</html>');
        $mpdf->Output();
        exit();

?>
