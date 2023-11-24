# mag
Para trabajar en este trabajo necesitamos establecer la siguiente configuracion:
en los archivos de configuracion de xampp: 
`/Applications/XAMPP/xamppfiles/etc/extra/httpd-vhosts.conf`

### Tendremos que poner esto:
```
<VirtualHost mag.local:80>
    ServerAdmin webmaster@dummy-host.example.com
    DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs/mag/public"
    ServerName mag.local
    ServerAlias www.mag.local
    ErrorLog "logs/dummy-host.example.com-error_log"
    CustomLog "logs/dummy-host.example.com-access_log" common
</VirtualHost>
```

### Para configurar XAMPP para que puedas acceder a tu sitio web local mediante un dominio personalizado como "mag.local".

Editar el archivo hosts:

Abre el archivo hosts en tu sistema. En Windows, este archivo generalmente se encuentra en `C:\Windows\System32\drivers\etc\hosts`
Abre el archivo con un editor de texto con privilegios de administrador (como administrador en Windows).
Agrega la siguiente línea al final del archivo:

`127.0.0.1 mag.local`

Abre tu navegador web y escribe "mag.local" en la barra de direcciones.
