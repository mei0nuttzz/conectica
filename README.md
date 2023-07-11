# conectica
Simple MySQL connection class

composer require conectica/conectica

require __DIR__ . '/vendor/autoload.php';
$conn = new \Conectica\Conectica\Conn('localhost', 'user', 'pass', 'db');
