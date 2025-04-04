# Projeto de Monitoramento de Temperatura com ESP32

![ESP32](imagens/esp32.jpg)

## Descrição

Este projeto utiliza um **ESP32** para ler dados de temperatura de um sensor NTC 10KΩ. Os dados são processados e apresentados em uma interface web hospedada localmente, permitindo o monitoramento em tempo real.

## Ferramentas Utilizadas

- **WampServer:** Ambiente de desenvolvimento para Windows que permite a criação de servidores web com Apache, MySQL e PHP.
- **Visual Studio Code (VS Code):** Editor de código-fonte leve e poderoso.
- **Arduino IDE:** Ambiente de desenvolvimento integrado para programação de placas Arduino e ESP32.
- **Postman:** Ferramenta para testar APIs e endpoints web.

## Estrutura do Projeto

- **/www:**
  - **/sensor_temperatura:**
    - **index.php:** Página principal que exibe os dados de temperatura.
    - **style.css:** Folha de estilo para a interface web.
    - **script.js:** Script para atualização dinâmica dos dados na página.

## Como Instalar e Configurar

### 1. Instalação do WampServer

- Baixe o WampServer no site oficial: [WampServer](https://www.wampserver.com/).
- Siga as instruções de instalação fornecidas no site.

### 2. Configuração do Ambiente de Desenvolvimento

- **Visual Studio Code:**
  - Baixe e instale o VS Code: [Visual Studio Code](https://code.visualstudio.com/).
  - Instale as extensões necessárias, como "C/C++" e "Arduino".
- **Arduino IDE:**
  - Baixe e instale a Arduino IDE: [Arduino IDE](https://www.arduino.cc/en/software/).
  - Adicione o suporte ao ESP32:
    - Vá em **File > Preferences**.
    - Em **Additional Boards Manager URLs**, adicione: `https://dl.espressif.com/dl/package_esp32_index.json`.
    - Vá em **Tools > Board > Boards Manager**, procure por "esp32" e instale.

### 3. Desenvolvimento do Código

- **Programação do ESP32:**
  - Utilize a Arduino IDE para programar o ESP32.
  - O código principal realiza a leitura do sensor NTC 10KΩ e disponibiliza os dados via servidor web.
- **Desenvolvimento da Interface Web:**
  - A interface é construída com HTML, CSS e JavaScript.
  - Utilize o Bootstrap para estilizar a página e garantir responsividade.

### 4. Testes com Postman

- Utilize o Postman para testar os endpoints da API.
- Verifique se os dados de temperatura estão sendo retornados corretamente.

## Como Utilizar

1. **Inicie o WampServer:**
   - Abra o WampServer e certifique-se de que o servidor Apache está em execução.
2. **Acesse a Interface Web:**
   - No navegador, acesse `http://localhost/sensor_temperatura/` para visualizar os dados de temperatura em tempo real.
