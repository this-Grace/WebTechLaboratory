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
}
?>
