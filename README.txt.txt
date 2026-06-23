MYSQL wird nicht gestartet!!!
	Wnd. + R --> services.msc 
	Suche nach MYSQL80 
	"Starten"
-------------------------------------------------------------------	
MYSQL wird nicht gestartet und gestoppt!!!
	Wnd. + R --> cmd 
	start
		net start MySQL80
	stop
		net stop MySQL80
-------------------------------------------------------------------		
	
Ich kenne den Namen meiner Datei nicht um sie zum Starten
	sc query | findstr /i mysql

-------------------------------------------------------------------
Wenn Server nicht Startet!! (alles im VS code Terminal)
	 schauen ob php installiert ist 
	 	php -v
	server starten 
		 php -S localhost:8000
	Firerfox:
	 	http://localhost:8000/index.php
-------------------------------------------------------------------
