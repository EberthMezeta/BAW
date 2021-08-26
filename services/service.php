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

$Cadena = getHtml($result, $Language);
echo $Cadena;

function getLanguage()
{
    $language = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
    return $language;
}

function getHtml($results, $language)
{
    $Cadena = '   <div class="title-results">
    <h2>
        Se encontraron los siguientes resultados:
    </h2>
</div>';
    foreach ($results['query']['search'] as $value) {
        $Cadena .= '<div class="article-container">';
        $Cadena .= '<a href="https://' . $language . '.wikipedia.org/?curid=' . $value['pageid'] . '">';
        $Cadena .= '<h2>' . $value['title'] . '</h2>' . "\n";
        $Cadena .= '</a>';
        $Cadena .= '<div class="fragment-article" >' . $value['snippet'] . '</div>';
        $Cadena .= '</div>';
    }
    return $Cadena;
}
