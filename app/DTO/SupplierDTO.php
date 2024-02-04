<?php

namespace App\DTO;

class SupplierDTO
{
    public $id;
    public $cpf_cnpj;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $state;
    public $country;

    public function __construct(
        $data = []
    )
    {
        $dataIsFromBrasilAPI = !isset($data['id']);
        if ($dataIsFromBrasilAPI) {
            $this->cpf_cnpj = $data['cnpj'] ?? null;
            $this->name = $data['nome_fantasia'] ?? null;
            $this->email = $data['email'] ?? null;
            $this->phone = $data['ddd_telefone_1'] ?? null;
            $this->address = $data['endereco'] ?? null;
            $this->city = $data['municipio'] ?? null;
            $this->state = $data['uf'] ?? null;
            $this->country = $data['pais'] ?? null;
            return;
        }
        $this->id = $data['id'] ?? null;
        $this->cpf_cnpj = $data['cpf_cnpj'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->phone = $data['phone'] ?? null;
        $this->address = $data['address'] ?? null;
        $this->city = $data['city'] ?? null;
        $this->state = $data['state'] ?? null;
        $this->country = $data['country'] ?? null;
    }
}
