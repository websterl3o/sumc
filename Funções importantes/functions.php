<?php
/**
 * @author Leonardo Weslei Diniz<leonardoweslei@gmail.com>
 * @name util.php
 * @since 01/07/2002
 * @final 09/07/2012
 * @abstract Arquivo de funções uteis para o adx
 * @package ADX
 */
function RemoveAcentos($str, $enc = 'iso-8859-1')
{
    $acentos = array(
            'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
            'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
            'C' => '/&Ccedil;/',
            'c' => '/&ccedil;/',
            'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
            'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
            'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
            'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
            'N' => '/&Ntilde;/',
            'n' => '/&ntilde;/',
            'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
            'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
            'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
            'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
            'Y' => '/&Yacute;/',
            'y' => '/&yacute;|&yuml;/',
            'a.' => '/&ordf;/',
            'o.' => '/&ordm;/',
            '_' => '/[^a-zA-Z0-9_ ]/'
    );
    return preg_replace($acentos, array_keys($acentos), htmlentities($str,ENT_NOQUOTES, $enc));
}
function is_utf8($str) {
    $c=0; $b=0;
    $bits=0;
    $len=strlen($str);
    for($i=0; $i<$len; $i++){
        $c=ord($str[$i]);
        if ($c >= 128) {
            if(($c >= 254)) return false;
            elseif($c >= 252) $bits=6;
            elseif($c >= 248) $bits=5;
            elseif($c >= 240) $bits=4;
            elseif($c >= 224) $bits=3;
            elseif($c >= 192) $bits=2;
            else return false;
            if(($i+$bits) > $len) return false;
            while($bits > 1){
                $i++;
                $b=ord($str[$i]);
                if($b < 128 || $b > 191) return false;
                $bits--;
            }
        }
    }
    return true;
}
if (!function_exists('json_encode'))
{
    function json_encode($a=false)
    {
        if (is_null($a)) return 'null';
        if ($a === false) return 'false';
        if ($a === true) return 'true';
        if (is_scalar($a))
        {
            if (is_float($a))
            {
                // Always use "." for floats.
                return floatval(str_replace(",", ".", strval($a)));
            }

            if (is_string($a))
            {
                static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
                return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
            }
            else
                return $a;
        }
        $isList = true;
        for ($i = 0, reset($a); $i < count($a); $i++, next($a))
        {
            if (key($a) !== $i)
            {
                $isList = false;
                break;
            }
        }
        $result = array();
        if ($isList)
        {
            foreach ($a as $v) $result[] = json_encode($v);
            return '[' . join(',', $result) . ']';
        }
        else
        {
            foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
            return '{' . join(',', $result) . '}';
        }
    }
}
if(!function_exists('str_split')) {
    function str_split($string,$string_length=1) {
        if(strlen($string)>$string_length || !$string_length) {
            do {
                $c = strlen($string);
                $parts[] = substr($string,0,$string_length);
                $string = substr($string,$string_length);
            } while($string !== false);
        } else {
            $parts = array($string);
        }
        return $parts;
    }
}
function add_date($givendate,$day=0,$mth=0,$yr=0)
{
    $cd = strtotime($givendate);
    $newdate = date
    (
            'Y-m-d h:i:s',
            mktime(date('h',$cd),
                    date('i',$cd),
                    date('s',$cd),
                    date('m',$cd)+$mth,
                    date('d',$cd)+$day,
                    date('Y',$cd)+$yr)
    );
    return $newdate;
}
function get_json($table,$campo=false,$where=false,$order=false,$limit=false,$group=false,$sql=false)
{
    $campo  = empty($campo)?"*":$campo;
    $pesquisa = new ADX();
    $dados=array();
    if(empty($sql)){
        $sql="SELECT $campo FROM $table";
        $sql.=empty($where)?"":" WHERE $where";
        $sql.=empty($order)?"":" ORDER BY $order";
        $sql.=empty($group)?"":" GROUP BY $group";
        $sql.=empty($limit)?"":" LIMIT $limit";
    }
    $result = $pesquisa->Consulta($sql);
    for($j=0;$j<$result->numRows();$dados[]=$result->fetchRow(DB_FETCHMODE_ASSOC),$j++);
    $json=new custom_json();
    return $json->encode($dados);
}
function divideDT($valor)
{
    if(substr_count($valor,"/")<=0)
    {
        $tmp2=explode(" ",$valor);//datetime
        $tmp1=explode(":",$tmp2[1]);//horas
        $tmp0=explode("-",$tmp2[0]);//data
        $tmp[0]=$tmp0[2];//dia
        $tmp[1]=$tmp0[1];//mes
        $tmp[2]=$tmp0[0];//ano
        $tmp[3]=$tmp1[0];//hora
        $tmp[4]=$tmp1[1];//min
        $tmp[5]=$tmp1[2];//sec
    }else
    {
        $valor=str_replace(" as "," ",$valor);//datetime
        $tmp2=explode(" ",$valor);//datetime
        $tmp0=explode("/",$tmp2[0]);//data
        $tmp1=explode(":",$tmp2[1]);//horas
        $tmp[0]=$tmp0[0];//dia
        $tmp[1]=$tmp0[1];//mes
        $tmp[2]=$tmp0[2];//ano
        $tmp[3]=$tmp1[0];//hora
        $tmp[4]=$tmp1[1];//min
        $tmp[5]=$tmp1[2];//sec
    }
    return $tmp;
}
function date2data($valor=false,$sep=""){
    $dt="d/m/Y";
    $hora=false;
    if(substr_count($valor,":")>0 || $sep!=""){
        $hora=true;
        $dt="d/m/Y H:i:s";
    }
    $tmp=divideDT(($valor!=false)?$valor:date($dt));
    return  $tmp[0]."/".$tmp[1]."/".$tmp[2].(($hora==true || $sep!="")?$sep.$tmp[3].":".$tmp[4].":".$tmp[5]:"");
}

function data2date($valor=false,$sep=" "){
    $dt="Y-m-d";
    $hora=false;
    if(substr_count($valor,":")>0  || $sep!=""){
        $hora=true;
        $dt="Y-m-d H:i:s";
    }
    $tmp=divideDT(($valor!=false)?$valor:date($dt));
    return  $tmp[2]."-".$tmp[1]."-".$tmp[0].(($hora==true || $sep!="")?$sep.$tmp[3].":".$tmp[4].":".$tmp[5]:"");
}
function subdata($data1,$data2,$ret=false)
{
    $diferenca_segundos =mktime
    (
            $data1[3],
            $data1[4],
            $data1[5],
            $data1[1],
            $data1[0],
            $data1[2]
    );
    //echo "    -   ";
    /*echo mktime
        (
                $data2[3],
                $data2[4],
                $data2[5],
                $data2[1],
                $data2[0],
                $data2[2]
        );*/
    $diferenca_segundos-=mktime
    (
            $data2[3],
            $data2[4],
            $data2[5],
            $data2[1],
            $data2[0],
            $data2[2]
    );
    //echo "<br>";

    $diferenca_minutos = $diferenca_segundos/60;
    $diferenca_horas = $diferenca_minutos/60;
    $diferenca_dias = $diferenca_horas/24;
    switch ($ret)
    {
        case "d":
        case "D":
            return round($diferenca_dias,2);
            break;
        case "h":
        case "H":
            return round($diferenca_horas,2);
            break;
        case "m":
        case "M":
            return round($diferenca_minutos,2);
            break;
        case "s":
        case "S":
            return round($diferenca_segundos,2);
        default:
            return round($diferenca_segundos,2);
            break;
    }
}
/**
 * Função para requerer um arquivo no adx
 *
 * @author  Cantidio Oliveira Fontes
 * @since   26/05/2009
 * @final   26/05/2009
 * @param   string $file, localização do arquivo da pasta principal do adx
 */
function adx_require($file)
{
    global $adx_install;
    if (file_exists($adx_install.'/'.$file))
        require_once($adx_install.'/'.$file);
}
function noCache(){
    header("Pragma: no-cache");
    header("Cache: no-cache");
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
}
function pr( $str,$align='' ){
    echo"<pre".( ( !empty( $align ) ) ? " align='$align'" : "" ).">";
    print_r($str);
    echo"</pre>";

}
function separaNomeSobrenome($nomeCompleto)
{
    $nomeAte = 0;
    //preposição para os sobrenomes "DOS SANTOS", "DA SILVA", "DE OLIVEIRA", ETC
    $preposicao = array('DE', 'DA', 'DO', 'DAS', 'DOS');
    //pós nomes
    $posNome = array('JR', 'JUNIOR', 'JÚNIOR', 'NETO', 'FILHO');
    //tira os espaços em excesso
    $nomeCompleto = trim($nomeCompleto);
    //divide o nome completo pelo espaço entre um e outro
    $nome = explode(' ', strtoupper($nomeCompleto));
    //posiciona o ponteiro no último nome ($sobrenome)
    $posSobrenome = sizeof($nome)-1;
    //verifica se o último nome é um pós nome (junior, neto, etc)
    if( in_array($nome[$posSobrenome], $posNome) )
    {
        //se for move o ponteiro uma posição atrás (para pegar o verdadeiro sobrenome)
        $posSobrenome--;
    }
    //verifica se antes do sobrenome há uma preposição (do, da, dos, das, etc)
    if( in_array($nome[$posSobrenome-1], $preposicao) )
    {
        //se tiver move o ponteiro uma posição para trás, para pegar como parte do sobrenome
        $posSobrenome--;
    }
    //pega o nome até a última posição achada como sobrenome
    $primeiroNome = implode(' ', array_splice($nome, 0, $posSobrenome));
    //pega o sobrenome
    $sobrenome = implode(' ', $nome);
    //retorna um array com o nome e sobrenome separado
    $nomeCompleto = array($primeiroNome, $sobrenome);
    return $nomeCompleto;
}