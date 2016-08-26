#Controladores y vistas
Para enviar variable a una vista de blade

return view('carpeta.vista',['variable'=> $var_php]);

y en la vista obtenerla como si fuera una var local

echo $variable->valor|campo ó
{{ $variable->campo}}

Para generar un controlador con todos sus metodos
php artisan make:controller nombre_controlador --resource
https://laravel.com/docs/5.2/controllers#restful-resource-controllers

#Otros paquetes
eloquet https://github.com/cviebrock/eloquent-sluggable
sluggable, poner rutas mas faciles

html forms, https://laravelcollective.com/docs/5.2/html
para hacer html con codigo

#Otros
Modelos en singular, controladores en plural

#Para cambiar la carpeta publica en c9
sudo nano /etc/apache2/sites-enabled/001-cloud9.conf