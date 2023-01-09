<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/helpers/database_data_helper.php';
class FilmsDataModel extends Model
{
    private $mysqli;
    public function __construct()
    {
        $databaseData = new Database_Data_Helper();
        $databaseData = (array)$databaseData;
        $this->mysqli = new mysqli($databaseData['hostName'], $databaseData['userName'], $databaseData['password'], $databaseData['databaseName']);
    }

    public function genresListGetFromDatabase(){
        $querry = "SELECT * FROM genres_table";
        $resultQuery = $this->mysqli->query($querry);
        $genresList = [];
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $genresList[$row['id']] = $row['genre'];
        }
        return $genresList;
    }

    public function getFilmsByGenre($genre,$page = 1, $filmsByPage = 25)
    {
        $filmTakerMarker = $filmsByPage * ($page-1);
        $querry = "
            select * 
            from main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            having gt.genre = '{$genre}' AND (NOT ratingKp = 0 OR NOT ratingImdb = 0) 
            ORDER BY year desc limit $filmTakerMarker,$filmsByPage;";
        $resultQuery = $this->mysqli->query($querry);
        $filmsList = [];
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $filmsList[] = $row;
        }
        return $filmsList;
    }
    public function getFilmById($filmId)
    {
        $querry = "
            select * 
            from main_films_table 
            WHERE id = '{$filmId}'";
        $resultQuery = $this->mysqli->query($querry);
        $filmsList = [];
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $filmsList = $row;
        }
        return $filmsList;
    }

    public function getFilmsByUserId($selectedFields = '*', $page = 1, $filmsByPage = 25 )
    {
        if (is_array($selectedFields)){
            $fieldsArray = implode(',', $selectedFields);
        } else{
            $fieldsArray = $selectedFields;
        }
        $filmTakerMarker = $filmsByPage * ($page-1);
        $querry = "
            select $fieldsArray 
            FROM main_films_table as mf inner join user_favorites_table as uf on mf.id = uf.filmId inner join user_movie_table as um on um.id = uf.userId 
            having uf.userId= '{$_SESSION['USER']['id']}' limit $filmTakerMarker,$filmsByPage;";
        $resultQuery = $this->mysqli->query($querry);
        $filmsList = [];
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $filmsList[] = $row;
        }
        return $filmsList;
    }
    public function addFilmToFavorites($filmId)
    {
        $insertFilmQuery = "
                    INSERT INTO user_favorites_table
                    (filmId, userId)
                    VALUES 
                    ('{$filmId}', '{$_SESSION['USER']['id']}')";
        $resultQuery = $this->mysqli->query($insertFilmQuery);
    }
    public function removeFilmFromFavorites($filmId)
    {
        $removeFilmQuery = "
                    DELETE FROM user_favorites_table 
                    WHERE filmId = '{$filmId}' AND userId = '{$_SESSION['USER']['id']}'";
        $resultQuery = $this->mysqli->query($removeFilmQuery);
    }

    public function countFilmsByGenre($genre)
    {
        $querry = "
            SELECT COUNT(*)
            FROM main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            WHERE gt.genre = '{$genre}' 
            AND (NOT ratingKp = 0 OR NOT ratingImdb = 0)";
        $resultQuery = $this->mysqli->query($querry);
        $quantity = 0;
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $quantity = $row;
        }
        return $quantity;
    }

    public function countUserFavorites()
    {
        $querry = "
            SELECT COUNT(*) 
            FROM user_favorites_table
            WHERE userId= '{$_SESSION['USER']['id']}'";
        $resultQuery = $this->mysqli->query($querry);
        $quantity = 0;
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $quantity = $row['COUNT(*)'];
        }

        return $quantity;
    }
    public function checkUserFilms($userFilms, $mainFilmsArray){
        $filmsIds = array_column($mainFilmsArray, 'filmId');
        foreach ($userFilms as $k=>$film){
            $found_key = array_search($film['filmId'], $filmsIds);
            if ($found_key !== false){
                $mainFilmsArray[$found_key]['favorite'] = true;
            }
        }
        return  $mainFilmsArray;
    }

    public function getFilmsByRatingKp($limit = 0, $sortDirection = 'desc')
    {
        if ($limit == 0){
            $querry = "
            SELECT  mf.id as id, name, updatedAt, posterUrl, previewUrl, ratingKp, ratingImdb, type, description, year, genreId, genre, filmId 
            FROM main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            WHERE mf.id in (select mf.id from main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId) 
            AND ratingKp != 0 ORDER BY ratingKp $sortDirection";
        }else{
            $querry = "
            SELECT  mf.id as id, name, updatedAt, posterUrl, previewUrl, ratingKp, ratingImdb, type, description, year, genreId, genre, filmId 
            FROM main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            WHERE mf.id in (select mf.id from main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId) 
            AND ratingKp != 0 ORDER BY ratingKp $sortDirection LIMIT 0,$limit";
        }
        $resultQuery = $this->mysqli->query($querry);
        $filmsList = [];
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $filmsList[] = $row;
        }
        $filmsListFinal = [];
        foreach ($filmsList as $film){
            $arrayId = array_search($film['id'],array_column($filmsListFinal,'id'));
            if ($arrayId !== false){
                $filmsListFinal[$arrayId]['genres'][] = $film['genre'];
            } else {
                $genre = $film['genre'];
                unset($film['genre']);
                $film['genres'][] = $genre;
                $filmsListFinal[] = $film;
            }
        }

        return $filmsListFinal;
    }
    public function getFilmsByRatingImdb($limit = 0, $sortDirection = 'desc')
    {
        if ($limit == 0){
            $querry = "
            SELECT  mf.id as id, name, updatedAt, posterUrl, previewUrl, ratingKp, ratingImdb, type, description, year, genreId, genre, filmId  
            FROM main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            WHERE mf.id in (select mf.id from main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId) 
            AND ratingImdb != 0 ORDER BY ratingImdb $sortDirection";
        }else{
            $querry = "
            SELECT  mf.id as id, name, updatedAt, posterUrl, previewUrl, ratingKp, ratingImdb, type, description, year, genreId, genre, filmId  
            FROM main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            WHERE mf.id in (select mf.id from main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId) 
            AND ratingImdb != 0 ORDER BY ratingImdb $sortDirection LIMIT 0,$limit";
        }
        $resultQuery = $this->mysqli->query($querry);
        $filmsList = [];
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $filmsList[] = $row;
        }
        $filmsListFinal = [];
        foreach ($filmsList as $film){
            $arrayId = array_search($film['id'],array_column($filmsListFinal,'id'));
            if ($arrayId !== false){
                $filmsListFinal[$arrayId]['genres'][] = $film['genre'];
            } else {
                $genre = $film['genre'];
                unset($film['genre']);
                $film['genres'][] = $genre;
                $filmsListFinal[] = $film;
            }
        }
        return $filmsListFinal;
    }

    public function getFilmsByYear($limit = 0, $sortDirection = 'desc')
    {
        if ($limit == 0){
            $querry = "
            SELECT  mf.id as id, name, updatedAt, posterUrl, previewUrl, ratingKp, ratingImdb, type, description, year, genreId, genre, filmId  
            FROM main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            WHERE mf.id in (select mf.id from main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId) 
            AND ratingKp != 0 ORDER BY year $sortDirection";
        }else{
            $querry = "
            SELECT  mf.id as id, name, updatedAt, posterUrl, previewUrl, ratingKp, ratingImdb, type, description, year, genreId, genre, filmId  
            FROM main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            WHERE mf.id in (select mf.id from main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId) 
            AND ratingKp != 0 ORDER BY year $sortDirection LIMIT 0,$limit";
        }
        $resultQuery = $this->mysqli->query($querry);
        $filmsList = [];
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $filmsList[] = $row;
        }
        $filmsListFinal = [];
        foreach ($filmsList as $film){
            $arrayId = array_search($film['id'],array_column($filmsListFinal,'id'));
            if ($arrayId !== false){
                $filmsListFinal[$arrayId]['genres'][] = $film['genre'];
            } else {
                $genre = $film['genre'];
                unset($film['genre']);
                $film['genres'][] = $genre;
                $filmsListFinal[] = $film;
            }
        }
        return $filmsListFinal;
    }
}