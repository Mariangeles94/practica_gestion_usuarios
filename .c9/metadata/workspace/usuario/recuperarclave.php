{"filter":false,"title":"recuperarclave.php","tooltip":"/usuario/recuperarclave.php","undoManager":{"mark":3,"position":3,"stack":[[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"insert","lines":["",""],"id":2}],[{"start":{"row":0,"column":0},"end":{"row":5,"column":2},"action":"insert","lines":["<?php","require '../clases/AutoCarga.php';","$sesion = new Session();","$user = $sesion->get(\"email\");","$mensaje = Request::get(\"mensaje\");","?>"],"id":3}],[{"start":{"row":2,"column":0},"end":{"row":3,"column":30},"action":"remove","lines":["$sesion = new Session();","$user = $sesion->get(\"email\");"],"id":4}],[{"start":{"row":1,"column":34},"end":{"row":2,"column":0},"action":"remove","lines":["",""],"id":5}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":184,"selection":{"start":{"row":23,"column":32},"end":{"row":23,"column":36},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1453053561674,"hash":"2a34965f87d6623c83c2b79071852c1bf0b10d85"}