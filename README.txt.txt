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