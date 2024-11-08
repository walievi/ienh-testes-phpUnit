<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../Agenda.php';

class AgendaTest extends TestCase
{
    private Agenda $agenda;

    protected function setUp(): void
    {
        $this->agenda = new Agenda();
    }

    public function testAdicionarContato()
    {
        $this->agenda->adicionar_contato("João", "123456789");
        $this->assertEquals("123456789", $this->agenda->buscar_contato("João"));
    }

    public function testRemoverContatoExistente()
    {
        $this->agenda->adicionar_contato("Maria", "987654321");
        $this->assertTrue($this->agenda->remover_contato("Maria"));
        $this->assertNull($this->agenda->buscar_contato("Maria"));
    }

    public function testRemoverContatoInexistente()
    {
        $this->assertFalse($this->agenda->remover_contato("Carlos"));
    }

    public function testBuscarContatoExistente()
    {
        $this->agenda->adicionar_contato("Ana", "123123123");
        $this->assertEquals("123123123", $this->agenda->buscar_contato("Ana"));
    }

    public function testBuscarContatoInexistente()
    {
        $this->assertNull($this->agenda->buscar_contato("Pedro"));
    }

    public function testListarContatosVazia()
    {
        $this->assertEmpty($this->agenda->listar_contatos());
    }

    public function testListarContatosAposAdicionar()
    {
        $this->agenda->adicionar_contato("João", "123456789");
        $this->agenda->adicionar_contato("Maria", "987654321");

        $contatos = $this->agenda->listar_contatos();

        $this->assertCount(2, $contatos);
        $this->assertArrayHasKey("João", $contatos);
        $this->assertArrayHasKey("Maria", $contatos);
    }
}
