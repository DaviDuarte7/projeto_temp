#ifndef TEMPERATURE_H
#define TEMPERATURE_H

#include <Arduino.h>
#include <WiFi.h>
#include <HTTPClient.h>

// Configuration for the analog temperature sensor
const int sensorPin = 34;
const float referenceResistance = 10000.0;
const float nominalResistance = 10000.0;
const float nominalTemperature = 25.0;
const float betaCoefficient = 3950.0;
const float supplyVoltage = 3.3;
const int adcMax = 4095;

// Wi-Fi and server settings
const char* ssid = "YOUR_WIFI_NAME";
const char* password = "YOUR_WIFI_PASSWORD";
String url = "http://YOUR_LOCAL_IP:8000/api/v1/temperatures";

void setup() {
    Serial.begin(115200);

    WiFi.begin(ssid, password);
    Serial.print("Connecting to WiFi");
    int attempts = 0;

    while (WiFi.status() != WL_CONNECTED && attempts < 20) {
        delay(1000);
        Serial.print(".");
        attempts++;
    }

    if (WiFi.status() == WL_CONNECTED) {
        Serial.println("\nWiFi Connected!");
    } else {
        Serial.println("\nFailed to connect to WiFi.");
    }
}

void readTemperature() {
    if (WiFi.status() != WL_CONNECTED) {
        Serial.println("⚠ ERROR: WiFi is disconnected!");
        return;
    }

    int adcValue = analogRead(sensorPin);
    if (adcValue <= 0 || adcValue >= adcMax) {
        Serial.println("⚠ ERROR: Invalid sensor reading!");
        return;
    }

    float voltage = (adcValue / (float)adcMax) * supplyVoltage;
    float resistance = referenceResistance * (supplyVoltage / voltage - 1);
    float steinhart = resistance / nominalResistance;
    steinhart = log(steinhart) / betaCoefficient;
    steinhart += 1.0 / (nominalTemperature + 273.15);
    steinhart = 1.0 / steinhart - 273.15;

    if (steinhart < -40.0 || steinhart > 150.0) {
        Serial.println("⚠ ERROR: Temperature out of expected range!");
        return;
    }

    Serial.print("Temperature: ");
    Serial.print(steinhart);
    Serial.println(" °C");

    HTTPClient http;
    http.begin(url);
    http.addHeader("Content-Type", "application/json");

    String jsonData = "{\"temperature\": " + String(steinhart) + "}";

    int httpResponseCode = http.POST(jsonData);
    Serial.print("Server response: ");
    Serial.println(httpResponseCode);

    http.end();
    delay(600000); // Send data every 10 minutes
}

#endif
