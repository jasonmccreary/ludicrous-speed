# Benchmark each of the API endpoints
siege -c 10 -t 5s http://localhost:8080/list.php
siege -c 10 -t 5s http://localhost:8080/detail.php
siege -c 10 -t 5s http://localhost:8080/search.php?q=jasonmccreary
siege -c 10 -t 5s -bif urls.txt
siege -c 10 -t 5s http://localhost:8080/popular.php

# Bypass nginx caching with header
siege -c 10 -t 5s http://localhost:8080/search.php?q=jasonmccreary -H 'Pragma: no-cache'
siege -c 10 -t 5s http://localhost:8080/detail.php -H 'Pragma: no-cache'
