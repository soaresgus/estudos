<?php

    class Dashboard
    {
        public $data_inicio;
        public $data_fim;
        public $numero_vendas;
        public $total_vendas;

        public function __get($name)
        {
            return $this->$name;
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }
    }

    class Conexao
    {
        private $host = 'localhost';
        private $dbname = 'dashboard';
        private $user = 'root';
        private $pass = '';

        public function conectar()
        {
            try {
                $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);

                $pdo->exec('set charset utf8');

                return $pdo;
            } catch(PDOException $e) {
                echo '<p>'. $e->getMessage() .'</p>';
            }
        }
    }

    class Bd
    {
        private $conexao;
        private $dashboard;

        public function __construct(Conexao $conexao, Dashboard $dashboard)
        {
            $this->conexao = $conexao->conectar();
            $this->dashboard = $dashboard;
        }

        public function getNumeroVendas() 
        {
            $query = 'SELECT COUNT(*) as numero_vendas FROM tb_vendas WHERE data_venda BETWEEN :data_inicio AND :data_fim';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
            $stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
        }

        public function getTotalVendas() {
            $query = 'SELECT SUM(total) as total_vendas FROM tb_vendas WHERE data_venda BETWEEN :data_inicio AND :data_fim';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
            $stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
        }
    }

    $dashboard = new Dashboard();
    $conexao = new Conexao();

    $data = explode('-', $_GET['data']);
    $ano = $data[0];
    $mes = $data[1];

    $dias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano); //Quantos dias tem no mes daquele ano

    $dashboard->__set('data_inicio', "$ano-$mes-01");
    $dashboard->__set('data_fim', "$ano-$mes-$dias");

    $bd = new Bd($conexao, $dashboard);

    $dashboard->__set('numero_vendas', $bd->getNumeroVendas());
    $dashboard->__set('total_vendas', $bd->getTotalVendas());
    echo json_encode($dashboard);
?>