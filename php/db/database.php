<?php
/**
 * DatabaseHelper class
 * Simple helper for database connection and queries.
 */
class DatabaseHelper {
    /** @var mysqli Database connection */
    private $db;

    /**
     * Create a new database connection.
     */
    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    /**
     * Get a random list of posts.
     * 
     * @param int $n Number of posts to fetch
     * @return array List of posts (id, title, image)
     */
    public function getRandomPosts($n = 2) {
        $stmt = $this->db->prepare("
            SELECT idarticolo, titoloarticolo, imgarticolo 
            FROM articolo 
            ORDER BY RAND()
            LIMIT ?
        ");
        $stmt->bind_param("i", $n);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Get all categories.
     * 
     * @return array List of categories (id, name)
     */
    public function getCategories() {
        $stmt = $this->db->prepare("
            SELECT idcategoria, nomecategoria 
            FROM categoria
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Retrieves posts from the database, ordered by date in descending order.
     *
     * This function executes a query that joins the `articolo` (article) and `autore` (author)
     * tables, returning the article title, preview, date, image, and author name.
     * You can specify a maximum number of posts to return.
     *
     * @param int $n Maximum number of posts to return (default: -1 for no limit)
     * @return array List of posts, each represented as an associative array containing
     */
    public function getPosts($n = -1) {
        $query = "SELECT titoloarticolo, anteprimaarticolo, dataarticolo,
                    imgarticolo, dataarticolo, nome FROM articolo,
                    autore WHERE autore=idautore ORDER BY
                    dataarticolo DESC";
        if($n>0){
            $query .= " LIMIT ?";
        }

        $stmt = $this->db->prepare($query);
        if($n>0){
            $stmt->bind_param("i", $n);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Retrieves authors and their associated topics from the database.
     *
     * Executes a query joining the `categoria`, `articolo`, `autore`,
     * and `articolo_ha_categoria` tables to fetch each author's username,
     * full name, and a comma-separated list of article categories they have written about.
     * Only active authors (attivo = 1) are included.
     *
     * @return array List of authors
     */
    public function getAuthors() {
        $query = "SELECT username, nome, GROUP_CONCAT(DISTINCT 
                    nomecategoria) as argomenti FROM categoria, 
                    articolo, autore, articolo_ha_categoria WHERE 
                    idarticolo=articolo AND categoria=idcategoria AND 
                    autore=idautore AND attivo=1 GROUP BY username, nome";

        $stmt = $this->db->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Generates a clean, lowercase HTML-safe ID string from a given name.
     *
     * This helper removes all non-alphabetic characters and converts
     * the string to lowercase, making it suitable for use as an HTML element ID.
     *
     * @param string $name The name to convert.
     * @return string A sanitized lowercase ID string.
     */
    public function getIdFromName($name){
        return preg_replace("/[^a-z]/", '', strtolower($name));
    }
}
?>
