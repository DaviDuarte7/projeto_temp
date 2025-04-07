# Projeto de Monitoramento de Temperatura com ESP32

## Descrição

Este projeto utiliza um **ESP32** para ler dados de temperatura de um sensor NTC 10KΩ. Os dados são processados e apresentados em uma interface web hospedada localmente, permitindo o monitoramento em tempo real. O projeto também apresenta um **histórico** das leituras de temperatura.

## Ferramentas Utilizadas

- **WampServer:** Ambiente de desenvolvimento para Windows que permite a criação de servidores web com Apache, MySQL e PHP.
- **Visual Studio Code (VS Code):** Editor de código.
- **Arduino IDE:** Ambiente de desenvolvimento integrado para programação de placas Arduino e ESP32.
- **Postman:** Ferramenta para testar APIs e endpoints web.

## Estrutura do Projeto

- **/exemple-php:**
  - **/resources:**
    - **views:** Página principal que exibe os dados de temperatura.
    - **welcome.blade.php:** Folha de estilo para a interface web.
    - **historico.blade.php:** Exibição do histórico de dados.

## Como Instalar e Configurar

### 1. Instalação do WampServer

- Baixe o WampServer no site oficial: [WampServer](https://www.wampserver.com/).
- Siga as instruções de instalação fornecidas no site.
- Garanta que as bibliotecas Wamp estejam instaladas.

### 2. Configuração do Ambiente de Desenvolvimento

- **Visual Studio Code:**
  - Baixe e instale o VS Code: [Visual Studio Code](https://code.visualstudio.com/).
  - Instale as extensões necessárias, como: "Laravel", "Composer", "Markdown All in One", "PHP", "Dadroit JSON Generator".
- **Arduino IDE:**
  - Baixe e instale a Arduino IDE: [Arduino IDE](https://www.arduino.cc/en/software).
  - Adicione o suporte ao ESP32:
    - Vá em **File > Preferences**.
    - Em **Additional Boards Manager URLs**, adicione: `https://dl.espressif.com/dl/package_esp32_index.json`.
    - Vá em **Tools > Board > Boards Manager**, procure por "esp32" e instale.

### 3. Desenvolvimento do Código

- **Programação do ESP32:**
  - Utilize a Arduino IDE para programar o ESP32 (já está no diretório git).
  - O código realiza a leitura do sensor NTC 10KΩ e disponibiliza os dados via servidor web.
- **Desenvolvimento da Interface Web:**
  - A interface é construída com HTML, CSS e JavaScript.
  - Foi utilizado o Bootstrap para a estilização da página.

### 4. WampServer

- Após instalar todas as bibliotecas e garantir que o WampServer está funcionando, na barra de pesquisa do seu navegador digite: `http://localhost/` e você será direcionado a uma página onde poderá criar um servidor.
  
  Clique no link "Add a VirtualHost" e você será direcionado para uma página onde concluirá a criação do servidor. Adicione o nome desejado ao servidor e logo abaixo, em "Directory", insira o caminho do projeto: `wamp64/exemple-php/public`.

  Em seguida, selecione a versão do PHP que está sendo usada. Para verificar a versão, abra o Visual Studio Code, navegue até a pasta `wamp64` (onde deve conter todo o projeto) e, no terminal de comandos, digite `php -v`.

  Após iniciar a criação do servidor, clique com o botão direito no ícone verde do WampServer, vá em "Tools" e depois clique em "Restart DNS". Agora seu servidor está pronto para ser utilizado.

### 5. Testes com Postman

- Utilize o Postman para testar os endpoints da API.
- Faça requisições GET para obter um JSON com o registro de temperatura recente.
- Verifique se os dados de temperatura estão sendo retornados corretamente.
- Utilize o URL da sua página para os testes.

## Notas Finais

- **Sensor Utilizado:** O projeto emprega um sensor NTC 10KΩ montado em uma protoboard com resistor de 10KΩ.
- **Código do ESP32:** O código necessário para o funcionamento do ESP32 já está incluído no repositório, localizado na pasta `esp32/`.
- **Função do Laravel:** O framework Laravel gerencia as rotas, o armazenamento e a exibição dos dados na interface web.

