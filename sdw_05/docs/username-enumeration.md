# THM Security

## Username Enumeration

Out of the box Wp-Scan finds usernames in the following ways:

```
[+] skywalker
 | Found By: Wp Json Api (Aggressive Detection)
 |  - http://127.0.0.1/wp-json/wp/v2/users/?per_page=100&page=1
 | Confirmed By:
 |  Rss Generator (Aggressive Detection)
 |  Author Id Brute Forcing - Author Pattern (Aggressive Detection)
 |  Login Error Messages (Aggressive Detection)
```
 
http://localhost/wp-json/wp/v2/users/
http://localhost/wp-json/wp/v2/users/1
http://localhost/author/skywalker/
http://localhost/?author=1
RSS Generator
