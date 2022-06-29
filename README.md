# reaction
PHP &amp; JavaScript Framework


Avatar component

avatar_tw::in()

Avatar receptivo creado. un avatar de círculo, cuadrado, perfil.

Básico:

Los avatares son representaciones visuales 
de personas o entidades y, a menudo, 
se muestran en listas o tarjetas.

->type(['basic'])

la funcion esta declarada pero no es necesario declararla 
ya que por defecto se mantiene el tipo basico.
puedes agregar sombras o contenido de texto en las propiedades

avatar_tw::in()->type(['squared','shadow','content'])->setTitule('Mi nombre')->setDescription('Webmaster')

Imagen del avatar:

 avatar_tw::in()->type(['squared','shadow','content'])
                    ->setTitule('Mi nombre')
                    ->setDescription('Webmaster')
                    ->setImgScr('https://mdbcdn.b-cdn.net/img/new/avatars/8.webp')
					
en esta declaracion agregas una ruta relativa a la imagen,
 igualmente puede ser una ruta local en el servidor.					

Cuadrado
El tipo squared para hacer avatares cuadrados con esquinas redondeadas.

avatar_tw::in()->type(['squared'])->setImgScr('https://mdbcdn.b-cdn.net/img/new/avatars/8.webp')

Con contenido:
Combine fácilmente el componente de avatar con contenido 
como un nombre de usuario y una breve descripción.
 avatar_tw::in()->type(['content'])
						->setTitule('Mi nombre')
						->setDescription('Webmaster')
						->setImgScr('https://mdbcdn.b-cdn.net/img/new/avatars/8.webp')


Error:

->type(['basic','squared'])

el tipo basico y squared no pueden estar declarados al mismo tiempo
