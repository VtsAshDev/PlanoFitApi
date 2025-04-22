# PlanoFitApi

API para geração de planos alimentares personalizados com integração à IA Gemini.

## 🛠 Tecnologias

- PHP + Composer
- Render
- Curl
- Gemini API

### POST `(https://planofitapi.onrender.com/)`

Gera um plano alimentar com base no objetivo e preferências do usuário.

#### 📥 Body (JSON):
```json
{
  "idade": 25,
  "altura": 170,
  "peso": 100,
  "tmb": 2000,
  "sexo": "masculino",
  "objetivo": "emagrecer"
}
```
#### 📄 Exemplo de requisição: 
```bash
curl -X POST https://planofitapi.onrender.com/api/plano \
  -H "Content-Type: application/json" \
  -d '{
    "idade": 25,
    "altura": 170,
    "peso": 100,
    "tmb": 2000,
    "sexo": "masculino",
    "objetivo": "emagrecer"
  }'
```
### Exemplo de Resposta :
[Veja o arquivo de resposta](/src/prompts/plano_alimentar_prompt.txt)

## Como Rodar o Projeto

### 1. Clonar o Repositório

Primeiro, clone este repositório para a sua máquina local. Abra o terminal e execute o comando abaixo:

```bash
git clone https://github.com/VitorVts/PlanoFitApi.git
cd PlanoFitApi
```
### 2. Clonar o Repositório

```bash
composer install
```

### 3. Configurar o autoload

abra o composer.json e configure o  autoload desta forma 

```json
"autoload": {
    "psr-4": {
        "App\\": "src/"
    }
}

```

### 4. Rodar o dump-autoload

```bash
composer dump-autoload
```

### 5. Configurar .env
Exemplo de .env:

```env
GEMINI_API_KEY=sua-chave-da-api-gemini
```

Obrigado por usar a PlanoFitApi! 🙌