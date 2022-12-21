<?php

//namespace models;
//use Model;
//include 'C:\OSPanel\domains\Pet-Test\application\core\model.php';
class FilmsDataModel extends Model
{
    public function genresListGetFromDatabase(){
        $mysqli = new mysqli("yii2-advanced-2", "root", "", "mysql");
        $querry = "SELECT * FROM genres_table";
        $resultQuery = $mysqli->query($querry);
        $genresList = [];
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $genresList[$row['id']] = $row['genre'];
        }
        return $genresList;
    }

    public function getFilmsByGenre($genre,$page = 1, $filmsByPage = 25)
    {
        $filmTakerMarker = 25 * ($page-1);
        $mysqli = new mysqli("yii2-advanced-2", "root", "", "mysql");
        $querry = "
            select * from main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId having gt.genre = '{$genre}' AND (NOT ratingKp = 0 OR NOT ratingImdb = 0) ORDER BY year desc limit $filmTakerMarker,$filmsByPage;";
        $resultQuery = $mysqli->query($querry);
        $filmsList = [];
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $filmsList[] = $row;
        }
        return $filmsList;
    }
    public function getFilmById($filmId)
    {
       //$filmTakerMarker = 25 * ($page-1);
        $mysqli = new mysqli("yii2-advanced-2", "root", "", "mysql");
        $querry = "
            select * from main_films_table WHERE id = '{$filmId}'";
        $resultQuery = $mysqli->query($querry);
        $filmsList = [];
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $filmsList = $row;
        }
        return $filmsList;
    }

    public function countFilmsByGenre($genre)
    {
        $mysqli = new mysqli("yii2-advanced-2", "root", "", "mysql");
        $querry = "
            SELECT COUNT(*)
            FROM main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            WHERE gt.genre = '{$genre}' 
            AND (NOT ratingKp = 0 OR NOT ratingImdb = 0)";
        $resultQuery = $mysqli->query($querry);
        $quantity = 0;
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $quantity = $row;
        }
        return $quantity;
    }

    public function getFilmsByUploadDate()
    {

    }

    public function getFilmsByRatingKp($limit = 0, $sortDirection = 'desc')
    {
        $mysqli = new mysqli("yii2-advanced-2", "root", "", "mysql");
        if ($limit == 0){
            $querry = "
            SELECT  mf.id as id, name, updatedAt, posterUrl, previewUrl, ratingKp, ratingImdb, type, description, year, genreId, genre 
            FROM main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            WHERE mf.id in (select mf.id from main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId) 
            AND ratingKp != 0 ORDER BY ratingKp $sortDirection";
        }else{
            $querry = "
            SELECT  mf.id as id, name, updatedAt, posterUrl, previewUrl, ratingKp, ratingImdb, type, description, year, genreId, genre 
            FROM main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            WHERE mf.id in (select mf.id from main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId) 
            AND ratingKp != 0 ORDER BY ratingKp $sortDirection LIMIT 0,$limit";
        }
        $resultQuery = $mysqli->query($querry);
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
        $mysqli = new mysqli("yii2-advanced-2", "root", "", "mysql");
        if ($limit == 0){
            $querry = "
            SELECT  mf.id as id, name, updatedAt, posterUrl, previewUrl, ratingKp, ratingImdb, type, description, year, genreId, genre 
            FROM main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            WHERE mf.id in (select mf.id from main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId) 
            AND ratingImdb != 0 ORDER BY ratingImdb $sortDirection";
        }else{
            $querry = "
            SELECT  mf.id as id, name, updatedAt, posterUrl, previewUrl, ratingKp, ratingImdb, type, description, year, genreId, genre 
            FROM main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            WHERE mf.id in (select mf.id from main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId) 
            AND ratingImdb != 0 ORDER BY ratingImdb $sortDirection LIMIT 0,$limit";
        }
        $resultQuery = $mysqli->query($querry);
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
        $mysqli = new mysqli("yii2-advanced-2", "root", "", "mysql");
        if ($limit == 0){
            $querry = "
            SELECT  mf.id as id, name, updatedAt, posterUrl, previewUrl, ratingKp, ratingImdb, type, description, year, genreId, genre 
            FROM main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            WHERE mf.id in (select mf.id from main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId) 
            AND ratingKp != 0 ORDER BY year $sortDirection";
        }else{
            $querry = "
            SELECT  mf.id as id, name, updatedAt, posterUrl, previewUrl, ratingKp, ratingImdb, type, description, year, genreId, genre 
            FROM main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId 
            WHERE mf.id in (select mf.id from main_films_table as mf inner join films_genres_table as fg on mf.id = fg.filmId inner join genres_table as gt on gt.id = fg.genreId) 
            AND ratingKp != 0 ORDER BY year $sortDirection LIMIT 0,$limit";
        }
        $resultQuery = $mysqli->query($querry);
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