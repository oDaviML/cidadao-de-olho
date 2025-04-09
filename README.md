# **Cidadão de Olho**

O **Cidadão de Olho** é uma aplicação full-stack que permite monitorar e analisar dados relacionados a deputados, como redes sociais e verbas indenizatórias. O objetivo é fornecer transparência e facilitar o acesso a informações públicas, como os 5 deputados que mais utilizaram verbas indenizatórias em um determinado mês e as redes sociais mais usadas pelos parlamentares.

---

## **Objetivo do Projeto**

O projeto tem como objetivo principal:

- Mostrar as redes sociais mais utilizadas pelos deputados.
- Apresentar os 5 deputados que mais utilizaram verbas indenizatórias em um determinado mês de 2019.

---

## **Tecnologias Utilizadas**

### **Backend**
- Laravel
- PostgreSQL
- Guzzle (para requisições paralelas)

### **Frontend**
- Vue.js 3 (Composition API)
- Pinia
- TailwindCSS
- PrimeVue

---

## **Rotas da API**

### **Deputados**
- **GET `/api/deputados`**  
  Retorna a lista de todos os deputados em exercício.

### **Redes Sociais**
- **GET `/api/rede-social/ranking/`**  
  Retorna as 5 redes sociais mais utilizadas pelos deputados.

### **Verbas Indenizatórias**
- **GET `/api/verbas/ranking/top5/{mes}`**  
  Retorna os 5 deputados que mais utilizaram verbas indenizatórias em um determinado mês de 2019.  
  **Parâmetro:** `{mes}` (ex: `01` para janeiro).

---

## **Como Rodar a Aplicação Localmente**

### **Passo a Passo**

#### **1. Clone o Repositório**
```bash
git clone https://github.com/oDaviML/cidadao-de-olho.git
cd cidadao-de-olho
```

#### **2. Iniciar os Containers Docker**
Execute o seguinte comando para iniciar os serviços:
```bash
docker-compose up -d --build
```

> **Atenção:** Este comando inicia os containers e executa automaticamente os comandos do Laravel Artisan (`migrate`, `app:sync-deputados-em-exercicio`, `app:sync-redes-sociais`, `app:sync-verbas-indenizatorias`).

#### **4. Aguardar a Sincronização**
- Após iniciar os containers, aguarde alguns segundos para que os dados sejam sincronizados com a API da ALMG.
- Você pode verificar os logs do backend para acompanhar o progresso:

#### **5. Acessar a Aplicação**
Após a sincronização, você poderá acessar a aplicação nos seguintes endereços:
- **Backend (Laravel):** `http://localhost:8000`
- **Frontend (Vue.js):** `http://localhost`

---