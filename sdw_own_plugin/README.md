# WP-Guardian <img src="assets/logo.png" style="border-radius: 20%" width="40">
<p>WP-Guardian ist eine moderne Erweiterung für Wordpress, welche Ihre Webseite und die Daten Ihrer Nutzer schützt. WP-Guardian bietet dabei folgende Features:</p>

<list>
    <ol>
        <h4><li style="font-weight: bold">Einfache Installation (Plug and Play)</li></h4>
            <p>WP-Guardian lässt sich nach der Installation mit einem Mausklick starten. Keine weitere Konfiguration ist nötig, damit Sie vollumfänglich vom Schutz profitieren.</p>
        <h4><li style="font-weight: bold">Schutz vor schädlichen Zugriffen</li></h4>
            <p>WP-Guardian kennt die meisten Ressourcen, auf die ein Angreifer abzielt, und blockiert diese, ohne den Funktionsumfang Ihrer Webseite einzuschränken. Wenn ein Angreifer versucht, auf mehrere durch WP-Guardian geschützte Ressourcen zuzugreifen, wird ihm für kurze Zeit der allgemeine Zugriff auf die durch WP-Guardian geschützte Webseite verweigert.</p>
        <h4><li style="font-weight: bold">Verbesserte Sicherheit Ihrer Nutzerdaten</li></h4>
            <p>WP-Guaridan schützt die Daten Ihrer Nutzer, damit diese nicht Opfer von böswilligen Angriffen werden.</p>
        <h4><li style="font-weight: bold">Schutz gegen Schwachstellen-Scans</li></h4>
            <p>Für die Suche nach Schwachstellen auf ihrer Website, werden oft Programme verwendet, welche mehrere mögliche Schwachstellen testen. WP-Guardian schützt ihre Website vor diesen Scans.</p>
        <h4><li style="font-weight: bold">Zugriffsprotokoll</li></h4>
            <p>WP-Guardian protokolliert jeden Zugriff auf Ihre Webseite, damit Sie den Überblick behalten.</p>
    </ol>
</list>

#### Mindestanfoderungen:
 - WordPress 6.5.5
 - PHP 8.0

## Datenschutzinformationen

<p>WP-Guardian arbeitet nach dem Prinzip der Datensparsamkeit, sodass nur die Daten der Nutzer verarbeitet werden, welche essenziell für die Funktion der Erweiterung sind. Für die Funktionalität benötigt WP-Guardian folgende Daten: </p>

<list>
    <ol>
        <li style="font-weight: bold">IP-Adressen</li>
            <p>Die IP-Adresse ist eine Adresse des Internet-Protokolls, welche WP-Guardian nuzt, um Nutzer und potenzielle Angreifer zu identifizieren.</p>
        <li style="font-weight: bold">URL</li>
            <p>Die URL (Uniform Resource Locator) beschreibt die Adresse der angeforderten Ressource auf dem Server. WP-Guardian verwendet die URL, um festzustellen, welche Seiten/Ressourcen aufgerufen werden. Teilweise können hier zusätzlich Daten des Nutzers übertragen werden(z.B.: Optionen zum filtern des Seiteninhalts).</p>
        <li style="font-weight: bold">Nutzerklasse</li>
            <p>Die Nutzerklasse wird von WP-Guardian zu jeder Anfrage generiert. Abhängig von der Ressource, auf welche zugegriffen wurde, wird jeder Anfrage einer IP-Adresse eine Klasse zugeordnet. Diese Klasse bestimmt ob die Anfrage als verdächtig oder normal eingestuft wird.</p>
        <li style="font-weight: bold">Datum und Uhrzeit</li>
            <p>WP-Guardian speichert Datum und Uhrzeit von jedem Zugriff, um diese zeitlich einordnen zu  können.</p>
    </ol>
</list>

#### Datenspeicherung:
WP-Guardian überprüft bei jedem Seitenzugriff, die Aktualität der gespeicherten Daten. Sollte ein Eintrag im Zugriffsprotokoll zum Zeitpunkt der Überprüfung älter als `14 Tage` sein, wird dieser gelöscht. Einträge in der Liste der blockierten IP-Adressen werden nach dem selben Verfahren gelöscht, wenn sie älter als `9 Monate` sind. 

#### Datenschutzerklärung:
```
WP-Guardian

Einsatz von WP-Guardian:
Diese Seite verwendet die Sicherheitserweiterung WP-Guardian, welche Daten verarbeitet, um Sicherheit und Nutzbarkeit zu verbessern.

Art der Verarbeitung:
WP-Guardian verwendet Daten, welche vom Browser des Seitenbesuchers übertragen werden, um die Sicherheit und Nutzung unserer Webseiten zu verbessern. Die erhobenen Daten sind dabei nur von Wp-Guardian und Administratoren der Seite einsehbar.

Erhobene Daten:
1: IP-Adressen: Die IP-Adresse ist eine Adresse des Internet-Protokolls.
2: URL: Die URL (Uniform Resource Locator) beschreibt die Adresse der angeforderten Ressource auf dem Server.
3: Nutzerklasse: Die Nutzerklasse wird von WP-Guardian zu jeder Anfrage generiert, abhängig von der Ressource, auf welche zugegriffen wurde.
4: Datum und Uhrzeit: WP-Guardian speichert Datum und Uhrzeit von jedem Zugriff.

Datenlöschung:
WP-Guardian überprüft bei jedem Seitenzugriff die Aktualität der gespeicherten Daten. Sollte ein Eintrag im Zugriffsprotokoll zum Zeitpunkt der Überprüfung älter als 14 Tage sein, wird dieser unwiderruflich gelöscht. Einträge in der Liste der blockierten IP-Adressen werden nach dem gleichen Verfahren unwiderruflich gelöscht, wenn sie älter als 9 Monate sind.

Zwecke der Verarbeitung:
1: IP-Adressen: Die IP-Adresse nutzt WP-Guardian, um Nutzer und potenzielle Angreifer zu identifizieren.
2: URL: Die URL (Uniform Resource Locator) verwendet WP-Guardian, um festzustellen, welche Seiten und Ressourcen aufgerufen werden.
3: Nutzerklasse: Die Nutzerklasse wird von WP-Guardian zu jeder Anfrage generiert, um zu einem späteren Zeitpunk zeiteffizient festellen zu können, ob bereits verdächtige Aufrufe über  die assoziierte IP-Adressen getätigt wurden.  
4: Datum und Uhrzeit: WP-Guardian speichert Datum und Uhrzeit, um diese zeitlich einordnen zu können. 

Empfänger:
Empfänger der Daten sind: 

1: Administratoren der Seite und Personen mit ausreichenden Berechtigungen, um auf die Datenbank und/oder den Adminbereich der Seite zuzugreifen.  
2: WP-Guardian selbst verarbeitet und analysiert die erhobenen Daten gemäß den festgelegten Zwecken.

Speicherdauer:
Die Löschung erfolgt für alle Daten, welche zum Zeitpunkt der Überprüfung veraltet sind. Daten gelten 
als veraltet nach Ablauf der Fristen, welche in 'Datenlöschung' beschrieben werden. Da die Überprüfung der von Seitenzugriffen abhängig ist, kann die maximale Lebensdauer der daten nicht bestimmt werden. 

Rechtsgrundlage:
Als Rechtsgrundlage der Erhebung der Daten gilt Art. 6 DSGVO (Rechtmäßigkeit der Verarbeitung).
```

## Für Administratoren und Entwickler

[Classifier](./docs/classifier.md)

[Database](./docs/database.md)

[Log](./docs/log.md)

[Username-Protection](./docs/username_protection.md)






