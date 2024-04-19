# Sicherheit und Datenschutz in der Webentwicklung

Dieses Repository enthält den Code zur Vorlesung "Sicherheit und Datenschutz in der Webentwicklung" an der Technischen Hochschule Mittelhessen.


## Inhalt

- /sdw_01/ - Code von Kapitel 1
- /sdw_02/ - Code von Kapitel 2
- /sdw_03/ - ...


## Docker Container starten

1. Stellen sie sicher dass der Docker Dienst auf ihrem System läuft.
2. Klonen sie das Repository.
3. Öffnen sie das Stammverzeichnis des Projekts in einem Terminal. (z.B. in Visual Studio Code: Rechtsklick auf die Datei `docker-compose.yml` und `Open in Integrated Terminal` auswählen)
4. Führen sie `docker compose up` aus.
5. Öffnen sie einen Browser und navigieren sie zu [http://localhost](http://localhost) um die WordPress Erstinstallation durchzuführen.
6. Um den Container zu stoppen, drücken sie `Strg + C` im Terminal.
7. Alternativ können sie den Container auch im Hintergrund starten, indem sie `docker compose up -d` ausführen. Um den Container zu stoppen, führen sie `docker compose down` aus.


## WordPress Erstinstallation

Dieser Schritt ist nur notwendig, wenn sie den Container zum ersten Mal starten.

1. Navigieren sie zu [http://localhost](http://localhost)
2. Wählen sie die gewünschte Sprache aus und klicken sie auf `Weiter`.
3. Wählen sie einen `Seitentitel`, `Benutzernamen`, `Passwort` und `E-Mail-Adresse` aus und klicken sie auf `WordPress installieren`.
4. Melden sie sich mit den zuvor gewählten Benutzerdaten an.


## Sicherheit und Datenschutz

Container die auf ihrem Rechner laufen sind nicht nur für sie, sondern auch für andere im Netzwerk erreichbar. Nutzen sie unbedingt starke Passwörter und eine Firewall um unerwünschte Zugriffe zu verhindern.

Wird WordPress auf ihrem Rechner gehackt (zum Beispiel von Kommilitonen in der Mensa) können fremde Personen die Kontrolle über ihren Rechner übernehmen.