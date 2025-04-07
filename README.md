# Temperature Monitoring Project with ESP32

## Description

This project uses an **ESP32** to read temperature data from a 10KΩ NTC sensor.  
The data is sent to a locally hosted web interface, allowing real-time monitoring.  
The interface also displays a history of temperature readings, which can be accessed by the user.

## Tools Used

- **WampServer**: A development environment for Windows that includes Apache, MySQL, and PHP.  
  We recommend using the latest version of WampServer to ensure compatibility with the project.

- **Visual Studio Code (VS Code)**: A code editor used for development.  
  Install extensions like "PHP", "Laravel", and "Arduino" to enhance the development experience.

- **Arduino IDE**: An integrated development environment for programming Arduino and ESP32 boards.  
  Make sure you have the latest version installed and ESP32 support properly configured.

- **Postman**: An API testing tool to test the server's web endpoints.

## Project Structure

- **/example-php:**
  - **/resources:**
    - **views:** Main page that displays temperature data.
    - **welcome.blade.php:** Style and content of the main page.
    - **historico.blade.php:** Displays the temperature data history.

## Installation and Setup

### Prerequisites

Before getting started, you will need:

- **Windows** with administrator rights to install WampServer.  
- **Arduino IDE** with ESP32 support.  
- **Visual Studio Code** installed with the necessary PHP and Laravel extensions.  
- **Postman** to test the API.

### 1. Installing WampServer

- Download WampServer from the official website: [WampServer](https://www.wampserver.com/).
- Follow the installation instructions on the site.
- After installation, open the WampServer control panel and check if the tray icon is green.  
  If it's green, Apache and MySQL are running correctly.

### 2. Development Environment Setup

#### Visual Studio Code:
- Download and install VS Code: [Visual Studio Code](https://code.visualstudio.com/).
- Install the following extensions: "Laravel", "Composer", "Markdown All in One", "PHP", "Dadroit JSON Generator".

#### Arduino IDE:
1. Download and install the Arduino IDE: [Arduino IDE](https://www.arduino.cc/en/software).
2. Add ESP32 support:
   - Go to **File > Preferences**.
   - In **Additional Boards Manager URLs**, add:
     ```
     https://dl.espressif.com/dl/package_esp32_index.json
     ```
   - Then go to **Tools > Board > Boards Manager**, search for "esp32", and install it.

### 3. Code Development

- **Programming the ESP32:**
    Use the Arduino IDE to program the ESP32. The required code is in the `esp32/` folder of the repository.
    The code reads data from the 10KΩ NTC sensor and makes it available to the web interface through a web server.

- **Web Interface Development:**
  - The interface is built using HTML, CSS, and JavaScript.
  - Bootstrap was used to style the page.

### 4. WampServer Setup

After installing all libraries and ensuring WampServer is running, follow these steps to configure your local server:

1. **Access WampServer:**
   - Open your web browser and go to: `http://localhost/`.
   - You will be redirected to the WampServer page where you can begin your server configuration.

2. **Create a VirtualHost:**
   - Click the **"Add a VirtualHost"** link.
   - On the configuration page, enter the path to the public folder of your project, such as:
     ```bash
     wamp64/www/example-php/public
     ```

3. **Select PHP version:**
   - To check the PHP version being used in your project, open **Visual Studio Code**, navigate to your project directory, and run:
     ```bash
     php -v
     ```
   - This will display the installed PHP version. Adjust the PHP version in WampServer accordingly.

4. **Restart DNS:**
   - After creating the VirtualHost, right-click the green **WampServer** icon in the system tray.
   - Go to **"Tools"** and click **"Restart DNS"** to apply the configuration.

### 5. Testing with Postman

- Use Postman to test the API endpoints.
- Make **GET** requests to retrieve a JSON object with the latest temperature data.
- Verify that temperature data is returned correctly.
- Use your page’s URL during testing.

## Final Notes

- **Sensor Used:** This project uses a 10KΩ NTC sensor mounted on a breadboard with a 10KΩ resistor.
- **ESP32 Code:** The code required to run the ESP32 is included in the `esp32/` directory of the repository.
- **Laravel Role:** The Laravel framework manages routes, data storage, and display on the web interface.
