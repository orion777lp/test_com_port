String str ="";
int i =0;
void setup() {

  pinMode(13, OUTPUT);
  Serial.begin(2400);
  digitalWrite(13, LOW);
}

void loop()
{
  if(Serial.available() > 0){    
    
    str = Serial.readStringUntil('\n');
    
    i = String(str).toInt();

      if(i == 1){
        digitalWrite(13, HIGH);
      }else if(i==2){
         digitalWrite(13, LOW);
      }else if(i==3){
         Serial.println("ANSWER : "+str);
      }else{
        Serial.println("PizdecNahyiBlyad! ->"+String(str)+";");    
      }
    
    }

  str = "";
}
