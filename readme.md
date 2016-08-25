#Controladores y vistas
Para enviar variable a una vista de blade

return view('carpeta.vista',['variable'=> $var_php]);

y en la vista obtenerla como si fuera una var local

echo $variable->valor|campo ó
{{ $variable->campo}}

#Otros paquetes
eloquet https://github.com/cviebrock/eloquent-sluggable
sluggable, poner rutas mas faciles

html forms, https://laravelcollective.com/docs/5.2/html
para hacer html con codigo