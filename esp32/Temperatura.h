#ifndef TEMPERATURA_H
#define TEMPERATURA_H

#include <Arduino.h>
#include <WiFi.h>
#include <HTTPClient.h>

const int sensorPin = 34;
const float referenceResistance = 10000.0;
const float nominalResistance = 10000.0;
const float nominalTemperature = 25.0;
const float betaCoefficient = 3950.0;
const float supplyVoltage = 3.3;
const int adcMax = 4095;

const char* ssid = "NOME_DA_SUA_REDE";
const char* password = "SENHA_DA_SUA_REDE";
String url = "http://SEU_IP_LOCAL:8000/api/v1/temperatures";

void setup() {
    Serial.begin(115200);

    WiFi.begin(ssid, password);
    Serial.print("Conectando ao WiFi");
    int tentativas = 0;

    while (WiFi.status() != WL_CONNECTED && tentativas < 20) {
        delay(1000);
        Serial.print(".");
        tentativas++;
    }

    if (WiFi.status() == WL_CONNECTED) {
        Serial.println("\nWiFi Conectado!");
    } else {
        Serial.println("\nFalha ao conectar no WiFi.");
    }
}

void temperatura() {
    if (WiFi.status() != WL_CONNECTED) {
        Serial.println("⚠ ERRO: WiFi desconectado!");
        return;
    }

    int adcValue = analogRead(sensorPin);
    if (adcValue <= 0 || adcValue >= adcMax) {
        Serial.println("⚠ ERRO: Leitura do sensor inválida!");
        return;
    }

    float voltage = (adcValue / (float)adcMax) * supplyVoltage;
    float resistance = referenceResistance * (supplyVoltage / voltage - 1);
    float steinhart = resistance / nominalResistance;
    steinhart = log(steinhart) / betaCoefficient;
    steinhart += 1.0 / (nominalTemperature + 273.15);
    steinhart = 1.0 / steinhart - 273.15;

    if (steinhart < -40.0 || steinhart > 150.0) {
        Serial.println("⚠ ERRO: Temperatura fora do intervalo esperado!");
        return;
    }

    Serial.print("Temperatura: ");
    Serial.print(steinhart);
    Serial.println(" °C");

    HTTPClient http;
    http.begin(url);
    http.addHeader("Content-Type", "application/json");

    String jsonData = "{\"temperature\": " + String(steinhart) + "}";

    int httpResponseCode = http.POST(jsonData);
    Serial.print("Resposta do servidor: ");
    Serial.println(httpResponseCode);

    http.end();
    delay(600000); // Envia os dados a cada 10 minutos
}

#endif
