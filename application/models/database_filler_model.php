<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/helpers/database_data_helper.php';

class databaseFillerModel extends Model
{
    private $mysqli;

    function __construct()
    {
        $databaseData = new Database_Data_Helper();
        $databaseData = (array)$databaseData;
        $this->mysqli = new mysqli($databaseData['hostName'], $databaseData['userName'], $databaseData['password'], $databaseData['databaseName']);
        set_time_limit(600);
        $dateLastDatabaseUpdate = $this->filmGetDatabaseLastUpdateDate();
        $now = time();
        $your_date = strtotime($dateLastDatabaseUpdate);
        $datediff = $now - $your_date;

        if (($datediff / (60 * 60 * 24))>=7){
            $filmDatabaseData = $this->filmListGetFromDatabase();
            $filmGenresDatabaseData = $this->genresListGetFromDatabase();
            $filmList = $this->filmListGetter(1);
            $docsList[] = $filmList['docs'];
            for ($i = 2;$i <= $filmList['pages'];$i++){
                $list = $this->filmListGetter($i);
                $docsList[] = $list['docs'];
            }
            $docsFinalList = [];
            foreach ($docsList as $doc) {
                foreach ($doc as $item) {
                    $docsFinalList[$item['_id']] = $item;
                }
            }
            $this->filmListUploader($docsFinalList, $filmDatabaseData, $filmGenresDatabaseData);
        }
        set_time_limit(60);

    }
    private function filmListGetter($page){
        $fields = 'id name updatedAt poster rating type description year genres';
        $selectFields = str_replace(' ','%20',$fields);
        $curl = curl_init('https://api.kinopoisk.dev/movie?field=year&search=2019-2022&field=name&search=!null&field=description&search=!null&field=poster&search=!null&limit=2000&page='.$page.'&sortField=rating.kp&sortType=1&selectFields='.$selectFields.'&token=MZM677S-BYWMMTK-G1EHZAV-6QAP4HV');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
            )
        );
        $result = curl_exec($curl);
        curl_close($curl);
        $jsonDecodedDate = json_decode($result, true);
        return  $jsonDecodedDate;
    }

    private function filmListUploader($filmList, $filmDatabaseData, $filmGenresDatabaseData){
        foreach ($filmList as $doc){
            $time = strtotime($doc['updatedAt'] . ' UTC');
            $updatedAt = date("Y-m-d", $time);
            if (isset($filmDatabaseData[$doc['id']])){
                if (strtotime($filmDatabaseData[$doc['_id']]) < strtotime($updatedAt)){
                    empty($doc['poster']['url'] ? : $doc['poster']['url'] = 'https://st.kp.yandex.net/images/film_big/');
                    empty($doc['poster']['previewUrl'] ? : $doc['poster']['previewUrl'] = 'https://st.kp.yandex.net/images/film_big/');
                    $insertQuery = "
                    UPDATE main_films_table
                    SET id = '{$doc['id']}', name = '{$this->mysqli->real_escape_string($doc['name'])}', updatedAt = '{$updatedAt}', posterUrl = '{$doc['poster']['url']}', previewUrl = '{$doc['poster']['previewUrl']}',
                        ratingKp = '{$doc['rating']['kp']}', ratingImdb = '{$doc['rating']['imdb']}', type = '{$doc['type']}', description = '{$this->mysqli->real_escape_string($doc['description'])}',
                        year = '{$doc['year']}'                         
                    WHERE id = '{$doc['id']}'";
                    $resultQuery = $this->mysqli->query($insertQuery);
                    $deleteGenresByFilmQuery ="DELETE FROM films_genres_table WHERE filmId = '{$doc['id']}'";
                    $resultDeleteQuery = $this->mysqli->query($deleteGenresByFilmQuery);

                    foreach ($doc['genres'] as $genre)
                    {
                        $genreId = array_search($genre['name'],$filmGenresDatabaseData);
                        $insertFilmGenresQuery = "
                    INSERT INTO films_genres_table
                    (filmId, genreId)
                    VALUES 
                    ('{$doc['id']}', '{$genreId}')";
                        $resultGenresQuery = $this->mysqli->query($insertFilmGenresQuery);
                    }
                }
            }else{
                $insertFilmQuery = "
                INSERT INTO main_films_table
                (id, name, updatedAt, posterUrl, previewUrl, ratingKp, ratingImdb, type, description, year)
                VALUES 
                ('{$doc['id']}', '{$this->mysqli->real_escape_string($doc['name'])}', '{$updatedAt}', '{$doc['poster']['url']}', '{$doc['poster']['previewUrl']}',
                '{$doc['rating']['kp']}', '{$doc['rating']['imdb']}', '{$doc['type']}', '{$this->mysqli->real_escape_string($doc['description'])}', '{$doc['year']}')";
                $resultQuery = $this->mysqli->query($insertFilmQuery);
                if ($resultQuery === false) {
                    echo "<pre>";
                    print_r($insertFilmQuery);
                    echo "</pre>";
                    throw new \Exception('Ошибка в SQL-запросе!');
                }
                foreach ($doc['genres'] as $genre)
                {
                    $genreId = array_search($genre['name'],$filmGenresDatabaseData);
                    $insertFilmGenresQuery = "
                    INSERT INTO films_genres_table
                    (filmId, genreId)
                    VALUES 
                    ('{$doc['id']}', '{$genreId}')";
                    $resultGenresQuery = $this->mysqli->query($insertFilmGenresQuery);
                    if ($resultGenresQuery === false) {
                        echo "<pre>";
                        print_r($insertFilmGenresQuery);
                        echo "</pre>";
                        throw new \Exception('Ошибка в SQL-запросе!');
                    }
                }
            }
        }
        $this->filmUpdateDatabaseLastUpdateDate();
    }
    private function filmListGetFromDatabase(){
        $querry = "SELECT id, updatedAt FROM main_films_table";
        $resultQuery = $this->mysqli->query($querry);
        $returnArray = [];
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $returnArray[$row['id']] = $row['updatedAt'];
        }
        return $returnArray;
    }
    private function filmGetDatabaseLastUpdateDate(){
        $querry = "SELECT databaseLastUpdateDate FROM film_database_core_markers  WHERE ID = 1";
        $resultQuery = $this->mysqli->query($querry);
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            return $row['databaseLastUpdateDate'];
        }
    }
    private function genresListGetFromDatabase(){
        $querry = "SELECT * FROM genres_table";
        $resultQuery = $this->mysqli->query($querry);
        $genresList = [];
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $genresList[$row['id']] = $row['genre'];
        }
        return $genresList;
    }
    private function filmUpdateDatabaseLastUpdateDate(){
        $todayDate = date("Y-m-d");
        $querry = "UPDATE film_database_core_markers SET databaseLastUpdateDate = '{$todayDate}'  WHERE ID = 1";
        $resultQuery = $this->mysqli->query($querry);
    }
}

