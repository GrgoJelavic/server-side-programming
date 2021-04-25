<?php

// ucitavanje podataka koristeci api

class ApiConnection
{
    function __construct($apiUrl)
    {
        $this->apiUrl = $apiUrl;
        $this->getApiData();
    }

    private function getApiData()
    {
        $ch = curl_init($this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $this->response = curl_exec($ch);
        curl_close($ch);

        return $this->response;
    }

    private function getFormatedData()
    {
        $formatedData = new SimpleXMLElement($this->response);

        return json_decode(json_encode($formatedData), true);
    }

    public function getHtmlData()
    {
        $apiData = $this->getFormatedData();
        $tableHtml = '';

        foreach ($apiData['Grad'] as $grad) {
            $tableHtml .= '<tr>
                <td>' . $grad['GradIme'] . '</td>
                <td>' . $grad['Podatci']['Vrijeme'] . '</td>
                <td>' . $grad['Podatci']['Temp'] . '</td>
                <td>' . $grad['Podatci']['Vlaga'] . '</td>
                <td>' . $grad['Podatci']['Tlak'] . '</td>
                <td>' . $grad['Podatci']['VjetarBrzina'] . 'km/h  (' . $grad['Podatci']['VjetarSmjer'] . ') </td>
            </tr>';
        }
        return $tableHtml;
    }
}

$api = new ApiConnection('https://vrijeme.hr/hrvatska_n.xml');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vrijeme u RH</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <table>
        <tr>
            <th>Grad</th>
            <th>Vrijeme</th>
            <th>Temperatura</th>
            <th>Vlaga</th>
            <th>Tlak</th>
            <th>Vjetar</th>
        </tr>

        <?=
        $api->getHtmlData();
        ?>
    </table>
</body>

</html>