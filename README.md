1. SESSION
Session berada pada c:/xampp/tmp
Code yang menangani session adalah berikut
app/Config/App.php
app/Config/Session.php0
> public string $sessionSavePath = 'C:\\xampp\\tmp';

2. ENV
Ubah pengaturan env sesuai dengan port dan nama database, untuk default adalah 
> database.default.hostname = 127.0.0.1
> database.default.database = ci4login
