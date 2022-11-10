
<?php
class BDD
{

    private $host       = 'localhost';
    private $database   = 'boutique';
    private $user       = 'root';
    private $pwd        = '';

    protected $co         = false;

    public function __construct()
    {
        // Si on est pas connecté
        if (!$this->co) {
            try {
                $this->co = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database . ';charset=utf8', $this->user, $this->pwd);
                $this->co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }

    /**
     * Get the value of co
     */
    protected function getCo()
    {
        return $this->co;
    }
}
?>