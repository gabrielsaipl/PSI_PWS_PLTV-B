<?php

class EmpresaController
{

    // SHOW?

    public function edit($id){
        $empresa = Empresa::find([$id]);
        if (is_null($empresa)){
            // MOSTRAR POPUP ERRO
        } else {
            //MOSTRAR VISTA EDITAR O USER
        }
    }

    public function update($id){
        $empresa = Empresa::find([$id]);
        $empresa->update_attributes($_POST);
        if ($empresa->is_valid()){
            $empresa->save();
            // MOSTRAR A LISTA DE UTILIZADORES
        } else {
            // MOSTRAR A VISTA EDIT COM OS ERROS QUE DEU
        }
    }
}