#include <ESP8266WiFi.h>
#include "DHT.h"

String device_id = "TESTNEW";

// Network SSID
const char* ssid = "Guest Room";
const char* password = "sina615x";

//Host Config
const char* host = "iotsina615.site";
const char* url = "/api/dht";
const int port = 80;

//DHT Config
#define DHTPIN D3     //Pin apa yang digunakan
#define DHTTYPE DHT22   // DHT 22
DHT dht(DHTPIN, DHTTYPE);

//DHT Sensor Value
float temp;
float humid;

WiFiClient client;
 
void setup() {
  Serial.begin(115200);
  dht.begin();

  //VCC DHT
  //Gatau kenapa kalo pake 5V nya langsung gadapet angka dari sensornya
  pinMode(D2, OUTPUT);
  digitalWrite(D2, HIGH);
  
  connectWifi();
  connectHost();
}
 
void loop() 
{

  //Cek koneksi Wifi
  if(WiFi.status() != WL_CONNECTED) {
    Serial.println("Wifi Disconnected");
    connectWifi();
  }
  
  if(client.connected()) {
    readSensor();

    Serial.print("requesting URL: ");
    Serial.println(url);

    //POST data
    String data = "device_id=" + device_id + "&suhu_data=" + String(temp) + "&kelembaban_data=" + String(humid);
   
    client.print(String("POST ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "User-Agent: BuildFailureDetectorESP8266\r\n" +
               "Connection: keep-alive\r\n" +
               "Content-Type: application/x-www-form-urlencoded\r\n" +
               "Content-Length: " +
               data.length() +
               "\n\n" +
               data);

    Serial.println("request sent");
    while (client.connected()) {
      String line = client.readStringUntil('\n');
      if (line == "\r") {
        Serial.println("headers received");
      break;
      }
    }

    client.setTimeout(100);
    String line = client.readString();
    Serial.println("reply was:");
    Serial.println("=============");
    Serial.println(line);
    Serial.println("=============");
  } else {
    connectHost();
    return;
  }

  Serial.println("Wait 1m");
  delay(60000);
}

void connectWifi() {
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.mode(WIFI_STA);
  //WiFi.hostname(device_id);
  WiFi.begin(ssid, password);
 
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");
 
  // Print the IP address
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
}

void connectHost() {
  Serial.print("Connecting to ");
  Serial.println(host);

  if (!client.connect(host,port)) {
    Serial.println("Connection failed");
    ESP.reset();
    return;
  }
}

void readSensor() {
  temp = dht.readTemperature();
  humid = dht.readHumidity();

  Serial.println("Temperature: " + String(temp) + "'C");
  Serial.println("Humidity: " + String(humid) + "%");
}
