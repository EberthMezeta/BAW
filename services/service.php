<?php
$Search = $_GET['q'];
$Category = $_GET['c'];
$Language = getLanguage();
$endPoint = "https://" . $Language . ".wikipedia.org/w/api.php";
$params = [
    "action" => "query",
    "list" => "search",
    "srsearch" => $Search,
    "srsort" => $Category,
    "format" => "json"
];

$url = $endPoint . "?" . http_build_query($params);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);

$result = json_decode($output, true);
/*
$Cadena = '';
foreach ($result['query']['search'] as $key => $value) {

    $Cadena .= '<a href="https://' . $Language . '.wikipedia.org/?curid=' . $value['pageid'] . '">';
    $Cadena .= '<h2>' . $value['title'] . '</h2>' . "\n";
    $Cadena .= '</a>';
}
*/
$Cadena = getHtml($result,$Language);
echo $Cadena;

/*
if ($result['query']['search'][0]['title'] == $Search){
    echo("Your search page '" . $Search . "' exists on English Wikipedia" . "\n" );

}
echo var_dump($result);
*/
function getLanguage()
{
    $language = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
    return $language;
}

function getHtml($results, $language)
{
    $Cadena = '';
    foreach ($results['query']['search'] as $value) {
        $Cadena .= '<div>';
        $Cadena .= '<a href="https://' . $language . '.wikipedia.org/?curid=' . $value['pageid'] . '">';
        $Cadena .= '<h2>' . $value['title'] . '</h2>' . "\n";
        $Cadena .= '<div>'. $value['snippet'] . '</div>';
        $Cadena .= '</a>';
        $Cadena .= '</div>';
    }
    return $Cadena;
}
