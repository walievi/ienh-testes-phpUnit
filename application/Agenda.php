<?php

class Agenda
{
    private array $contatos = [];

    public function adicionar_contato(string $nome, string $telefone): void
    {
         $this->contatos[$nome] = $telefone;
    }

    public function remover_contato(string $nome): bool
    {
        if (isset($this->contatos[$nome])) {
            unset($this->contatos[$nome]);
            return true;
        }
        return false;
    }

    public function buscar_contato(string $nome): ?string
    {
        return $this->contatos[$nome] ?? null;
    }

    public function listar_contatos(): array
    {
        return $this->contatos;
    }
}
