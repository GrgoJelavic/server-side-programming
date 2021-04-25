<?php

/**
 * Class API gets data from DHMZ. Contains setURL method, gets temperature of sea and prints it via html table display, and it gets temperature of soil with json data.
 * 
 */
class API
{
    protected $url;
    protected $response;
    protected $dataStation;

    /**
     * Magic method which runs when writing data to inaccessible (protected or private) or non-existing properties.
     * 
     * @param string $prop
     * @param string $url
     * 
     */
    function __set($prop, $url)
    {
        switch ($prop) {
            case ('url'):
                $this->url = $url;
        };
    }

    /**
     * Function gets API data
     * 
     * @returns api data
     */
    private function getApiData()
    {
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $this->response = curl_exec($ch);
        curl_close($ch);

        return $this->response;
    }

    /**
     * Function gets formatted data
     * 
     * @returns formatted data
     */
    private function getFormatedData()
    {
        $formatedData = new SimpleXMLElement($this->getApiData());

        return json_decode(json_encode($formatedData), true);
    }

    /**
     * Function gets HTML data
     * 
     * @returns table data
     */
    public function getHtmlData()
    {
        $measurementsTime = ['07:00', '08:00', '11:00', '14:00', '15:00', '17:00'];
        $apiData = $this->getFormatedData();
        $tableHtml = '';
        $counter = 0;

        foreach (array_slice($apiData['Podatci'], 1) as $dataStation) {
            $tableHtml .= '<th>' . $dataStation['Postaja'] . '</th><tr><td>Time -- Temp</td></tr>';

            foreach ($dataStation['Termin'] as $time) {

                $time ?
                    $tableHtml .= '<tr><td>' . $measurementsTime[$counter] . ' -- ' . $time . '°C</td></tr>'
                    :
                    $tableHtml .= '<tr><td> --- No data --- </td><tr/>';
                $counter++;
            }
        }

        return $tableHtml;
    }

    /**
     * Function gets json data
     * 
     * @param string $url
     * 
     * @returns json data
     */
    public function getJson($url)
    {
        $fileContents = file_get_contents($url);

        $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);

        $fileContents = trim(str_replace('"', "'", $fileContents));

        $simpleXml = simplexml_load_string($fileContents);

        $json = json_encode($simpleXml, JSON_PRETTY_PRINT);

        return $json;
    }
}

$conn = new API;
$conn->url = 'https://vrijeme.hr/more_n.xml';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sea and soil temperature in Croatia</title>
    <style>
        section {
            display: flex;
            justify-content: center;
        }

        table {
            width: 50%;
            border-collapse: collapse;
            text-align: center;
        }

        tr,
        td {
            border: 1px solid #333;
        }

        tr:hover {
            background-color: #eee;
        }

        div {
            margin: auto;
            width: 50%;
            border: 3px solid green;
            padding: 10px;
            max-width: 550px;
        }
    </style>
</head>

<body>
    <section>
        <table>
            <?=
            $conn->getHtmlData();
            ?>
        </table>
    </section>
    <section>
        <?php
        print($conn->getJson("https://vrijeme.hr/agro_temp.xml"));
        ?> </section>
</body>

</html>