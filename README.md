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
#### Exemplo de resposta: 
# Plano Alimentar Diário para Musculação (25 anos, 170cm, 100kg)

**Importante:** Este é um plano alimentar genérico e serve como um guia. Para resultados otimizados e seguros, consulte um nutricionista para uma avaliação individualizada e ajustes específicos com base nas suas necessidades, nível de atividade física, preferências alimentares e condição de saúde.

**Objetivo:** Ganho de massa muscular (hipertrofia)

**Foco:** Aumento da ingestão de proteínas, carboidratos complexos e gorduras saudáveis, com distribuição estratégica ao longo do dia.

---

## 1. Café da manhã (6h-7h):
- **Opção 1:**
  - 4 ovos inteiros (ou 6 claras + 1 gema) mexidos com 100g de espinafre.
  - 1 fatia de pão integral (50g).
  - 1 fruta (ex: 1/2 mamão papaia).
  - 1 xícara de café sem açúcar ou adoçante.
- **Opção 2:**
  - Whey Protein (30g) misturado com 200ml de água ou leite desnatado.
  - 60g de aveia em flocos.
  - 1 banana média.
- **Observações nutricionais:** Refeição rica em proteínas de alto valor biológico (ovos ou whey), carboidratos complexos (pão integral ou aveia) para fornecer energia e fibras, e vitaminas/minerais da fruta.
- **Substituições:**
  - Ovos: Tofu mexido (150g)
  - Pão integral: Batata doce cozida (150g)
  - Aveia: Quinoa cozida (60g)
  - Whey: Caseína (30g) - para digestão mais lenta.

---

## 2. Lanche da manhã (9h-10h):
- **Opção 1:**
  - 1 iogurte natural desnatado (150g) com 30g de granola sem açúcar e 15g de castanhas (ex: castanha do pará).
- **Opção 2:**
  - Sanduíche integral (2 fatias) com 100g de peito de frango desfiado e alface.
- **Observações nutricionais:** Lanche para fornecer proteínas e carboidratos de digestão lenta, ajudando a manter a saciedade e fornecer energia constante. As castanhas adicionam gorduras saudáveis.
- **Substituições:**
  - Iogurte: Queijo cottage (100g)
  - Granola: Sementes de chia (15g)
  - Frango: Atum em água (100g)
  - Castanhas: Amendoim sem sal (15g)

---

## 3. Almoço (12h-13h):
- **Opção 1:**
  - 150g de carne magra (ex: frango grelhado, patinho assado ou peixe branco).
  - 150g de arroz integral.
  - 150g de feijão.
  - Salada verde à vontade (folhas, tomate, pepino) com 1 colher de sopa de azeite extra virgem.
- **Opção 2:**
  - 200g de salmão assado.
  - 150g de batata doce cozida.
  - Brócolis e couve-flor cozidos no vapor à vontade.
- **Observações nutricionais:** Refeição completa com proteínas de alto valor biológico, carboidratos complexos para energia, fibras para saciedade e vitaminas/minerais dos vegetais. O azeite fornece gorduras saudáveis.
- **Substituições:**
  - Carne magra: Lentilha cozida (150g)
  - Arroz integral: Quinoa cozida (150g)
  - Feijão: Grão de bico cozido (150g)
  - Salmão: Tilápia grelhada (200g)
  - Batata Doce: Mandioca cozida (150g)

---

## 4. Lanche da tarde (15h-16h):
- **Opção 1:**
  - Shake de proteína: 30g de Whey Protein com 200ml de água ou leite desnatado, 1 banana e 1 colher de sopa de pasta de amendoim integral.
- **Opção 2:**
  - 2 fatias de pão integral com 100g de queijo cottage e rodelas de tomate.
- **Observações nutricionais:** Importante para manter o aporte proteico e energético, especialmente se o treino for próximo. A pasta de amendoim adiciona gorduras saudáveis.
- **Substituições:**
  - Whey: Caseína (30g)
  - Banana: Morangos (100g)
  - Pasta de amendoim: Abacate amassado (30g)
  - Queijo Cottage: Ricota (100g)

---

## 5. Jantar (19h-20h):
- **Opção 1:**
  - 150g de carne magra grelhada ou assada (ex: bife magro, peito de frango).
  - 200g de legumes cozidos no vapor ou refogados (ex: abobrinha, berinjela, cenoura).
  - Salada verde à vontade com 1 colher de sopa de azeite extra virgem e limão.
- **Opção 2:**
  - Omelete com 3 ovos inteiros (ou 5 claras e 1 gema) com legumes picados (ex: tomate, cebola, pimentão).
  - 1 batata média assada.
- **Observações nutricionais:** Priorizar proteínas e legumes para uma refeição leve e nutritiva antes do sono. Evitar carboidratos em excesso neste horário.
- **Substituições:**
  - Carne magra: Peixe branco assado (150g)
  - Legumes: Salada crua variada
  - Ovos: Tofu mexido com legumes (150g)

---

## 6. Ceia (22h-23h):
- **Opção 1:**
  - 30g de Caseína misturada com água ou leite desnatado.
  - 1 punhado pequeno de castanhas (ex: amêndoas, nozes).
- **Opção 2:**
  - 1 iogurte natural desnatado (150g) com 15g de sementes de chia.
- **Observações nutricionais:** Refeição com proteínas de lenta absorção (caseína) para fornecer aminoácidos durante o sono e ajudar na recuperação muscular. As gorduras saudáveis das castanhas auxiliam na saciedade.
- **Substituições:**
  - Caseína: Queijo cottage (100g)
  - Castanhas: Sementes de abóbora (15g)
  - Iogurte: Leite desnatado (200ml)

---

## Dicas Nutricionais Adicionais:

- **Hidratação:** Beba pelo menos 3 litros de água por dia.
- **Varie os alimentos:** Inclua uma variedade de frutas, vegetais, proteínas e carboidratos em sua dieta para garantir a ingestão de todos os nutrientes necessários.
- **Ajuste as porções:** Adapte as quantidades dos alimentos de acordo com sua fome e necessidades individuais. Monitore seu progresso e faça ajustes conforme necessário.
- **Suplementação (opcional):** Creatina (3-5g por dia) e multivitamínico (conforme orientação profissional) podem ser considerados.
- **Planejamento:** Planeje suas refeições com antecedência para evitar escolhas alimentares inadequadas.
- **Sono:** Priorize um sono de qualidade (7-9 horas por noite) para otimizar a recuperação muscular e o desempenho.
- **Consistência:** A consistência é fundamental para alcançar seus objetivos de ganho de massa muscular. Siga o plano alimentar o máximo possível e não desanime com eventuais deslizes.

---

**Lembre-se:** Este plano alimentar é apenas um guia. Consulte um nutricionista para obter um plano personalizado e adaptado às suas necessidades individuais.

 ---

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