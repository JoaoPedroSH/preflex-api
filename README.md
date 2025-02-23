```sh
ERP (Núcleo Central)
│
├── 1. Finanças e Contabilidade
│ │
│ ├── Funcionalidade: Gestão de fluxo de caixa, contas a pagar/receber.
│
├── 2. Vendas e CRM
│ │
│ ├── Funcionalidade: Acompanhamento de clientes e pipeline de vendas.
│
├── 3. Estoque e Logística
│ │
│ ├── Funcionalidade: Controle de estoque em tempo real.
│
├── 4. Recursos Humanos (RH)
│ │
│ ├── Funcionalidade: Folha de pagamento e gestão de benefícios.
│
├── 5. Produção e Manufatura
│ │
│ ├── Funcionalidade: Planejamento de produção (MRP).
│
├── 6. Compras e Suprimentos
│ │
│ ├── Funcionalidade: Comparação de cotações de fornecedores.
│
├── 7. Atendimento ao Cliente
│ │
│ ├── Funcionalidade: Central de atendimento integrada.
│
└── 8. Business Intelligence (BI)
│
├── Funcionalidade: Dashboards e relatórios estratégicos.
```

# tasks-manager-api

### Instalar dependencias
```sh
composer install
```
 
### Gerar esquema de banco de dados
```sh
php config/bin/doctrine orm:schema-tool:create
```
### Atualizar esquema de banco de dados
```sh
php config/bin/doctrine orm:schema-tool:drop --force
php config/bin/doctrine orm:schema-tool:create
```
ou
```sh
php config/bin/doctrine orm:schema-tool:update --force
```
ou
```sh
php config/bin/doctrine orm:schema-tool:update --force --dump-sql
```
### Start server
```sh
php -S localhost:8080 -t public
```

# Documentations
Slim - ['https://www.slimframework.com/docs/v4/']
Doctrine - ['https://www.doctrine-project.org/projects/doctrine-orm/en/current/tutorials/getting-started.html']

