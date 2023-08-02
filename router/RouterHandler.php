<?php

namespace Router;

class RouterHandler {

    protected $method;
    protected $data;

    public function set_method($method){
        $this->method = $method;
    }

    public function set_data($data){
        $this->data = $data;
    }

    public function route($controller, $id) {
        #Instanciamos dentro de una variable :o
        $resource = new $controller();

        switch ($this->method) {
            #Si accedemos por la URL
            case "get":
                
                #Si el id de la URL está definido Y es = create que 
                if($id && $id == "create")
                #Usamos el method create con la instancia de los controladores
                  $resource->create();
                #Para mostrar un solo recurso
                elseif ($id)
                  $resource->show();
                #Muestra la lista de resursos si entramos directamente
                else 
                $resource->index();
                break;
            
            case "post":
                #Llamamos a store para ingresar la data del form
                $resource->store($this->data);
                break;
            
            case "delete":
                $resource->delete($id);
                break;
        }
    }
    
}
