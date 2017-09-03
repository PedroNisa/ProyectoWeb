
            //funciones javaScript 
			
            var myVar;
			
            //funciones que lanzan nuestro loader
            function myFunction() {
                myVar = setTimeout(showPage, 2000);
            }
            function showPage() {
                document.getElementById("loader").style.display = "none";
                document.getElementById("myDiv").style.display = "block";
            }
			
			//función que muestra una ventana antes de confirmar que se va a eliminar un registro
            function confirmaEliminar() {
                if (confirm('¿Esta seguro de eliminar el registro?')) {
                    document.getElementsByName('borrar');
                }
            }

			
			//función que muestra una ventana antes de modicar un registro
            function confirmModificar() {
                if (confirm('¿Esta seguro de modificar el registro?')) {
                    document.getElementsByName('editar');
                }
            }

			
			//ventana que nos muestra que la BBDD está vacia
            function sinRegistros() {
                alert('NO HAY REGISTROS QUE MOSTRAR');
                alert('Va a ser redireccionado a la pagina principal del sitio');
                window.location = 'index.php';
            }
            
			//función que nos advierte que no tenemos autorización para la operación que vamos a realizar
             function noAutorizada() {
                alert('OPERACION NO AUTORIZADA \nConsulte con el administrador de la base de datos');                
                window.location = 'index.php';
            }
            



