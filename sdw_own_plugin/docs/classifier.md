# classifier.php

## Überblick

Die `classifier.php`-Datei wurde entwickelt, um Anfragen an die Worpress-Instanz zu klassifizieren, sodass später zeiteffizient festgestellt werden kann, wie viele verdächtige Anfragen über eine IP-Adresse getätigt wurden. Ob eine Anfrage verdächtig ist, wird anhand der Ressource bewertet, auf welche zugegriffen wurde.

### Hauptfunktionen

- Jede Anfrage in eine "Verdächtigkeits"-Klasse einordnen.
- Anfragen abbrechen und IP-Adresse blockieren, falls die assoziierte IP-Adresse bereits mehrere verdächtige Zugriffe machen wollte.
- Verdächtige IP-Adressen in die Blockliste eintragen.
- Für Testzwecke die Klassiefizierung über den Header sichtbar machen.

## Verwendete Hooks

### Aktionen
<list>
    <ol>
        <li style="font-weight: bold">wp_loaded</li>
            <p>Ruft eine Methode auf, die Anfragen klassifiziert.</p>
        <li style="font-weight: bold">plugins_loaded</li>
            <p>Ruft eine Methode auf, die überprüft, ob eine IP-Adresse blockiert ist und gegebenenfalls die Anfrage beendet.</p>
    </ol>
</list>

## Methoden

### `classify_init()`
Diese Methode klassifiziert die

**Funktionsweise:** Der Nutzer wird mit dem Methodenaufruf `get_user_by('login', $display_name)` ermittelt. Falls kein Nutzer ermittelt werden konnte, wird `Ein Nutzer` zurückgegeben, ansonsten wird geprüft, ob der Nutzer einen Spitznamen eingestellt hat und ob dieser nicht dem Benutzernamen gleicht. Sollte der Spitzname dem Benutzernamen gleichen oder kein Spitznamen vorhanden sein, so wird `Ein Nutzer` zurückgegeben, ansonsten wird der eingestellte Spitzname zurückgegeben.

### `classify_request()`
Diese Methode ändert den Autor-Link in eine generische URL (`#`), um zu verhindern, dass der Benutzername durch URLs offengelegt wird.

**Funktionsweise:** Gibt sofort `"#"` zurück.

**Parameter:**
- `$link` (string): Der ursprüngliche Autor-Link.
- `$author_id` (int): Die ID des Autors.

**Rückgabewert:**
- (string): Die geänderte URL, immer `"#"`.

### `get_request_class()`
Diese Methode ändert die Benutzerdaten in REST API-Antworten, indem Benutzernamen durch Spitznamen oder einen generischen Platzhalter "WordpressUser" ersetzt werden.

**Funktionsweise:** Die Daten der Response werden mit `$response->get_data()` abgerufen und in einer Variablen `$data` gespeichert. Wenn der Benutzer einen Spitznamen hat und dieser nicht mit dem Benutzernamen übereinstimmt, werden `name` und `slug` in `$data` auf den Spitznamen gesetzt, andernfalls auf `WordpressUser`. Anschließend wird mit `$response->set_data($data)` die Response-Data geupdated und `$reponse` zurückgegeben. 

**Parameter:**
- `$response` (WP_REST_Response): Die ursprüngliche REST API-Antwort.
- `$user` (WP_User): Das Benutzerobjekt.
- `$request` (WP_REST_Request): Die aktuelle Anfrage.

**Rückgabewert:**
- (WP_REST_Response): Die geänderte REST API-Antwort.



### `is_ip_blocked()`
Diese Methode zeigt eine Warnmeldung im WordPress Admin-Dashboard an, wenn der Anzeigename des angemeldeten Benutzers mit seinem Benutzernamen übereinstimmt, was auf ein potenzielles Sicherheitsrisiko hinweist.

**Funktionsweise:** Der Nutzer wird mit `wp_get_current_user()` ermittelt. Wenn der Benutzername gleich Spitznamen ist, so wird die Warnmeldung
        <div style="border: 1px solid #c3c4c7;border-left-color: #dba617;"><p>
        Your display name is the same as your username. This can expose your username publicly, which is a security risk. Please change your display name in your profile settings
        </p></div>

## Entwicklerhinweise
