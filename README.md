# Temperature Monitoring Project with ESP32

## Description

This project uses an **ESP32** to read temperature data from a **NTC 10KΩ** sensor. The data is processed and displayed on a locally hosted web interface, allowing real-time monitoring. The project also provides a **history** of temperature readings.

## Tools Used

- **WampServer:** Development environment for Windows that allows the creation of web servers with Apache, MySQL, and PHP.
- **Visual Studio Code (VS Code):** Code editor.
- **Arduino IDE:** Integrated development environment for programming Arduino and ESP32 boards.
- **Postman:** Tool for testing APIs and web endpoints.
- **Bootstrap:** CSS framework for styling the interface.
- **Laravel:** PHP framework for robust web development.

## Project Structure

- **/exemple-php:**
  - **/resources:**
    - **views:** Main page displaying temperature data.
    - **welcome.blade.php:** Stylesheet for the web interface.
    - **historico.blade.php:** Display of data history.

## Installation and Configuration

### 1. Installing WampServer

- Download from the official website: [WampServer](https://www.wampserver.com/).
- Follow the installation instructions provided on the site.
- Ensure that the necessary Wamp libraries are installed.

### 2. Setting Up the Development Environment

- **Visual Studio Code:**
  - Download and install VS Code: [Visual Studio Code](https://code.visualstudio.com/).
  - Install necessary extensions, such as: "Laravel", "Composer", "Markdown All in One", "PHP", "Dadroit JSON Generator".
- **Arduino IDE:**
  - Download and install Arduino IDE: [Arduino IDE](https://www.arduino.cc/en/software).
  - Add ESP32 support:
    - Go to **File > Preferences**.
    - In **Additional Boards Manager URLs**, add: `https://dl.espressif.com/dl/package_esp32_index.json`.
    - Go to **Tools > Board > Boards Manager**, search for "esp32" and install.

### 3. Developing the Code

- **Programming the ESP32:**
  - Use Arduino IDE to program the ESP32 (already included in the git directory).
  - The code reads data from the NTC 10KΩ sensor and serves it via a web server.
- **Developing the Web Interface:**
  - The interface is built with HTML, CSS, and JavaScript.
  - Bootstrap is used for page styling.

### 4. WampServer Configuration

- After installing all libraries and ensuring WampServer is running, open your browser and navigate to `http://localhost/`. This will direct you to a page where you can create a server.
  
  Click on the "Add a VirtualHost" link and follow the prompts to create the server. Provide your desired server name and, in the "Directory" field, enter the path to your project: `wamp64/exemple-php/public`.

  Select the PHP version in use. To check the version, open Visual Studio Code, navigate to the `wamp64` folder (where your project is located), and run `php -v` in the terminal.

  After setting up the server, right-click the green WampServer icon, go to "Tools", and select "Restart DNS". Your server is now ready for use.

### 5. Testing with Postman

- Use Postman to test API endpoints.
- Send GET requests to retrieve JSON data of the most recent temperature reading.
- Verify that temperature data is returned correctly.
- Use your site's URL for testing.

---

**Final Notes**

- **Sensor Used:** The project employs an NTC 10KΩ sensor mounted on a breadboard with a 10KΩ resistor.
- **ESP32 Code:** The necessary code for the ESP32 is included in the repository, located in the `esp32/` folder.
- **Role of Laravel:** The Laravel framework handles routing, data storage, and display on the web interface.
