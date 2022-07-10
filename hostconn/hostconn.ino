#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
const char* ssid = "pro updated";
const char* password = "markustian2345";
const char* host = "debugweb58.000webhostapp.com";
int stat = 0;
#define RIGHT 5
#define LEFT 4
#define DOOR 13
#define TRIGGER_PIN  D5  //Pin Trigger HC-SR04 pada NodeMCU
#define TRIGGER_PIN1  D6//Pin Trigger HC-SR04 pada NodeMCU
void left(){
  digitalWrite(LEFT,HIGH);
 digitalWrite(RIGHT,LOW);
  
}
void right(){
  digitalWrite(LEFT,LOW);
  digitalWrite(RIGHT,HIGH);
}
void opendoor(){
  digitalWrite(DOOR,LOW);
}
void lockdoor(){
  digitalWrite(DOOR,HIGH);
}
void stopcar(){
  digitalWrite(LEFT,HIGH); //LED off
 digitalWrite(RIGHT,HIGH); //LED off
 digitalWrite(DOOR,HIGH);
}
void setup() {
  Serial.begin(115200);
  WiFi.mode(WIFI_STA);
  WiFi.hostname("NodeMCU");
  pinMode(LEFT,OUTPUT); 
  pinMode(RIGHT,OUTPUT);
  pinMode(DOOR,OUTPUT); 
  pinMode(TRIGGER_PIN,INPUT);
  pinMode(TRIGGER_PIN,OUTPUT);
  pinMode(TRIGGER_PIN1,INPUT);
  pinMode(TRIGGER_PIN1,OUTPUT);
  stopcar();
  WiFi.begin(ssid, password);
  if (WiFi.waitForConnectResult() != WL_CONNECTED) {
    Serial.println("WiFi Failed!");
    return;
  }
  
  Serial.println();
  Serial.print("IP Address: ");
  Serial.println(WiFi.localIP());
  
}

void loop() {
  if (stat == 0){
    WiFiClient client;
    String res;
    String resdoor;
      const int httpPort = 80;
      if(!client.connect(host, httpPort)){
        Serial.println("Fail Connect to server");
        return;
      }
      String LinkAja;
      String RunM;
      HTTPClient httpaja;
      LinkAja = "http://"+String(host)+"/vending/motors.php";
      httpaja.begin(client, host, httpPort, LinkAja);
      httpaja.GET();
      res = httpaja.getString();
      
      httpaja.end();
      if(res == "1"){
        
        HTTPClient httprun;
        RunM = "http://"+String(host)+"/vending/motor1.php";
        httprun.begin(client, host, httpPort, RunM);
        httprun.GET();
        httprun.end();
        Serial.println("Coca cola dropped down");
        right();
        Serial.println("Sensor 360");
        delay(80);
        stat = 4;
      }
      else if(res == "2"){
        HTTPClient httprun;
        RunM = "http://"+String(host)+"/vending/motor2.php";
        httprun.begin(client, host, httpPort, RunM);
        httprun.GET();
        httprun.end();
        Serial.println("Sprite dropped down");
        left();
        Serial.println("Sensor 360");
        delay(80);
        stat = 5;
      }
      else if(res == "0"){
        String LinkDoor;
        HTTPClient httpdoor;
        LinkDoor = "http://"+String(host)+"/vending/lockdoors.php";
        httpdoor.begin(client, host, httpPort, LinkDoor);
        httpdoor.GET();
        resdoor = httpdoor.getString();
        
        httpdoor.end();
        if(resdoor == "1"){
        opendoor();
        }
        if(resdoor == "0"){
        lockdoor();
        }
      }
  }
  if (stat == 4){
  if (digitalRead(TRIGGER_PIN)== HIGH){
    right();
    digitalWrite(TRIGGER_PIN,LOW);
  }
  else if (digitalRead(TRIGGER_PIN)== LOW){
    
    stopcar();
    stat = 0;
  }
  }
  if (stat == 5){
  if (digitalRead(TRIGGER_PIN1)== HIGH){
    left();
    digitalWrite(TRIGGER_PIN1,LOW);
  }
  else if (digitalRead(TRIGGER_PIN1)== LOW){
    
    stopcar();
    stat = 0;
  }
  }
  

}
