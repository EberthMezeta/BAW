<?php
$Search = $_GET['q'];
$Category = $_GET['c'];
$Language = getLanguage();

$result = getDataJSON($Language, $Category, $Search);

$Data = $result['query']['search'];

if ($Category === 'size') {
    uasort(
        $Data,
        function ($a, $b) {
            if ($a['size'] == $b['size']) return 0;
            return ($a['size'] > $b['size']) ? -1 : 1;
        }
    );
}

$Cadena = getHtml($Data, $Language);
echo $Cadena;

function getLanguage()
{
    $language = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
    return $language;
}

function getHtml($results, $language)
{
    $Cadena = '<div class="title-results">
        <h2>
        Se encontraron los siguientes resultados:
        </h2>
        </div>';

    foreach ($results as $value) {
        $Cadena .= '<div class="article-conta$Datar">';
        $Cadena .= '<a href="https://' . $language . '.wikipedia.org/?curid=' . $value['pageid'] . '">';
        $Cadena .= '<h2>' . $value['title'] . '</h2>' . "\n";
        $Cadena .= '</a>';
        $Cadena .= '<p>' . $value['size'] . '</p>' . "\n";
        $Cadena .= '<div class="fragment-article" >' . $value['snippet'] . '</div>';
        $Cadena .= '</div>';
    }
    return $Cadena;
}

function getDataJSON($Language, $Category, $Search)
{
    $endPoint = "https://" . $Language . ".wikipedia.org/w/api.php";
    $LocalCategory   =    $Category;

    if ($LocalCategory == 'size') {
        $LocalCategory = "relevance";
    }

    $params = [
        "action" => "query",
        "list" => "search",
        "srsearch" => $Search,
        "srsort" => $LocalCategory,
        "format" => "json"
    ];

    $url = $endPoint . "?" . http_build_query($params);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}
