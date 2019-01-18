# Ludicrous Speed

This is the code from the live demo during my talk _PHP + Redis + nginx = LUDICROUS SPEED_ where I incrementally add these additional services for a 7000% performance boost.

You can find tags to the respective [mysql](https://github.com/jasonmccreary/ludicrous-speed/releases/tag/mysql) and [redis](https://github.com/jasonmccreary/ludicrous-speed/releases/tag/redis) versions of the code. **This code is intentionally naive**. The focus is on the process of adding the services. Not rearchitecting the code or implementing design patterns.

There is a sample [nginx configuration file](https://github.com/jasonmccreary/ludicrous-speed/blob/master/conf/nginx.conf) to demonstrate using [ngx_http_proxy_module](http://nginx.org/en/docs/http/ngx_http_proxy_module.html). The foundation was provided by this [nginx article](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/) and expanded upon by this [gist](https://gist.github.com/utahta/4466587).
