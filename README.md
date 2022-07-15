# The most simple bot for accepting payments in telegrams
Для начала работы тебе надо выполнить шаги:
1. Создать бота с помощью https://t.me/BotFather

![Безымянныsdsdsй](https://user-images.githubusercontent.com/94001931/179210989-714cfb25-2234-471c-b914-0c637d87a28a.png)

2. Открыть файл paymentexample.php и заменить там "YOU_BOT_TOKEN" на то, что мы получили от бота

![image](https://user-images.githubusercontent.com/94001931/179211371-c3f1a1fb-93cd-4938-ad62-9d92037422c3.png)

3. Получить у https://t.me/BotFather платежный токен, для этого:
3.1 напишите https://t.me/BotFather /mybots

![step 1](https://user-images.githubusercontent.com/94001931/179213208-15887db2-d656-41f8-bc3f-a4951f8e87b4.png)

3.2 выберите "payments"

![step 2](https://user-images.githubusercontent.com/94001931/179213293-dedad990-d2ae-41c9-b5f6-c8e00823b9ce.png)

3.3 выберите эквайринг к которому будете подключаться (я выберу юкассу)

![step 3](https://user-images.githubusercontent.com/94001931/179213366-9b3405c5-e40b-423a-b23f-4818db68069b.png)

3.4 выберу юкасса текст для демонстрации

![step 4](https://user-images.githubusercontent.com/94001931/179213501-cf859f40-a15b-4924-8dc4-7b69953421ec.png)

3.5 нас перекинет в бота юкассы, выполняем его инструкции

![step 5](https://user-images.githubusercontent.com/94001931/179213563-a991482b-d283-486d-b9c8-98adaa76ac57.png)

3.6 после этого заходим в BotFather и увидим токен для приема платежей

![staep 6](https://user-images.githubusercontent.com/94001931/179213660-d61e0872-a163-4c66-9944-086680adcdd3.png)

4. опять открыть файл paymentexample.php и заменить "YOU_PAYMENT_TOKEN" на то, что мы получили от бота

![image](https://user-images.githubusercontent.com/94001931/179213769-36a17fa1-46de-472f-ad40-cb5c140e8158.png)

Готово! файл paymentexample.php готов. осталось поставить его на хостинг и установить вебхук для бота
ВАЖНО! Вам понадобится SSL сертификат, иначе бот работать не будет

Установить вебхук с помощью: https://api.telegram.org/bot(mytoken)/setWebhook?url=https://youdomen/.../paymentexample.php
