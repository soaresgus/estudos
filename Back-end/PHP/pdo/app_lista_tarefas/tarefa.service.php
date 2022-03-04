<?php

    class TarefaService 
    {
        private $conexao;
        private $tarefa;

        public function __construct(Conexao $conexao, Tarefa $tarefa) 
        {
            $this->conexao = $conexao->conectar();
            $this->tarefa = $tarefa;
        }

        public function inserir()
        {
            $query = 'INSERT INTO tb_tarefas(tarefa) VALUES (:tarefa)';

            $stmt = $this->conexao->prepare($query); //conexao = PDO na classe Conexao

            $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));

            $stmt->execute();
        }

        public function recuperar()
        {
            $query = 'SELECT tb_tarefas.id, tarefa, tb_status.status FROM tb_tarefas LEFT JOIN tb_status ON (tb_tarefas.id_status = tb_status.id) ORDER BY tb_status.status ASC';

            $stmt = $this->conexao->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function atualizar()
        {
            $query = 'UPDATE tb_tarefas SET tarefa = ? WHERE id = ?';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $this->tarefa->__get('tarefa')); 
            //Como usei interrogação (?) acima, é necessário dizer ao Bind qual interrogação o valor pertence
            //Aqui acima, inseri que a tarefa substituíra o primeiro interrogação.
            $stmt->bindValue(2, $this->tarefa->__get('id')); 

            return $stmt->execute();
        }

        public function deletar()
        {
            $query = 'DELETE FROM tb_tarefas WHERE id = :id';

            $stmt = $this->conexao->prepare($query);

            $stmt->bindValue(':id', $this->tarefa->__get('id'));

            $stmt->execute();
        }

        public function realizar()
        {
            $query = 'UPDATE tb_tarefas SET id_status = :id_status WHERE id = :id';

            $stmt = $this->conexao->prepare($query);

            $stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
            $stmt->bindValue(':id', $this->tarefa->__get('id'));

            $stmt->execute();
        }

        public function recuperarPendente()
        {
            $query = 'SELECT tb_tarefas.id, tarefa, tb_status.status FROM tb_tarefas LEFT JOIN tb_status ON (tb_tarefas.id_status = tb_status.id) WHERE tb_tarefas.id_status = 1 ORDER BY tb_tarefas.data_cadastrado ASC';
            
            $stmt = $this->conexao->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>