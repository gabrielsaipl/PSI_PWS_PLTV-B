<?php
require_once "boot.php";

require_once "controllers/SiteController.php";
require_once "controllers/LoginController.php";
require_once "controllers/UserController.php";
require_once "controllers/EmpresaController.php";
require_once "controllers/FaturaController.php";
require_once "controllers/IvaController.php";
require_once "controllers/LinhafaturaController.php";
require_once "controllers/ProdutoController.php";

require_once "models/User.php";
require_once "models/Empresa.php";
require_once "models/Iva.php";
require_once "models/Fatura.php";
require_once "models/Linhafatura.php";
require_once "models/Produto.php";
require_once "models/Auth.php";

if(!isset($_GET['c'])&&!isset($_GET['a'])){
    $siteController = new SiteController();
    $siteController->redirectToRoute("site","index");
} else{
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $controller=$_GET['c'];
    $action=$_GET['a'];
    switch ($controller){
        case('site'):
            switch ($action){
                case ('index'):
                    $siteController = new SiteController();
                    $siteController->home();
                    break;
                case ('zonareservada'):
                    $siteController = new SiteController();
                    $siteController->zonareservada();
                    break;
            }
            break;
        case('login'):
            switch ($action) {
                case ('index'):
                    //se estiver autenticado mostrar mensagem de erro
                    $loginController = new LoginController();
                    $loginController->index();
                    break;
                case ('login'):
                    //se estiver autenticado mostrar mensagem de erro
                    $loginController = new LoginController();
                    $loginController->login();
                    break;
                case('logout'):
                    $loginController = new LoginController();
                    $loginController->logout();
                    break;
            }
        case ('user'):
            switch ($action){
                case ('funcionario'):
                    $userController = new UserController();
                    $userController->funcionarios();
                    break;
                case ('cliente'):
                    $userController = new UserController();
                    $userController->clientes();
                    break;
                case('show'):
                    $userController = new UserController();
                    $userController->show($id);
                    break;
                case('create'):
                    $userController = new UserController();
                    $userController->create();
                    break;
                case('store'):
                    $userController = new UserController();
                    $userController->store();
                    break;
                case('edit'):
                    //CASO N HAJA ID
                    $userController = new UserController();
                    $userController->edit($id);
                    break;
                case('update'):
                    $userController = new UserController();
                    $userController->update($id);
                    break;
            }
            break;
        case ('produto'):
            switch ($action) {
                case ('index'):
                    $produtoController = new ProdutoController();
                    $produtoController->index();
                    break;
                case('show'):
                    $produtoController = new ProdutoController();
                    $produtoController->show($id);
                    break;
                case('create'):
                    $produtoController = new ProdutoController();
                    $produtoController->create();
                    break;
                case('store'):
                    $produtoController = new ProdutoController();
                    $produtoController->store();
                    break;
                case('edit'):
                    $produtoController = new ProdutoController();
                    $produtoController->edit($id);
                    break;
                case('update'):
                    $produtoController = new ProdutoController();
                    $produtoController->update($id);
                    break;
            }
            break;
        case ('iva'):
            switch ($action) {
                case ('index'):
                    $ivaController = new IvaController();
                    $ivaController->index();
                    break;
                case('show'):
                    $ivaController = new IvaController();
                    $ivaController->show($id);
                    break;
                case('create'):
                    $ivaController = new IvaController();
                    $ivaController->create();
                    break;
                case('store'):
                    $ivaController = new IvaController();
                    $ivaController->store();
                    break;
                case('edit'):
                    $ivaController = new IvaController();
                    $ivaController->edit($id);
                    break;
                case('update'):
                    $ivaController = new IvaController();
                    $ivaController->update($id);
                    break;
            }
            break;
        case ('fatura'):
            switch ($action) {
                case ('index'):
                    $faturaController = new FaturaController();
                    $faturaController->index();
                    break;
                case('show'):
                    $faturaController = new FaturaController();
                    $faturaController->show($id);
                    break;
                case('create'):
                    $faturaController = new FaturaController();
                    $faturaController->create();
                    break;
                case('store'):
                    $faturaController = new FaturaController();
                    $faturaController->store();
                    break;
                case('emitir'):
                    $faturaController = new FaturaController();
                    $faturaController->emitir($id);
                    break;
                case('historico'):
                    $faturaController = new FaturaController();
                    $faturaController->historico($id);
                    break;
            }
            break;
        case ('linhafatura'):
            switch ($action) {
                case('create'):
                    $linhafaturaController = new LinhafaturaController();
                    $linhafaturaController->create($id);
                    break;
                case('store'):
                    $linhafaturaController = new LinhafaturaController();
                    $linhafaturaController->store();
                    break;
                case('delete'):
                    $linhafaturaController = new LinhafaturaController();
                    $linhafaturaController->delete($id);
                    break;
            }
            break;
        case ('empresa'):
            switch ($action) {
                case('create'):
                    $empresaController = new EmpresaController();
                    $empresaController->create();
                    break;
                case('store'):
                    $empresaController = new EmpresaController();
                    $empresaController->store();
                    break;
                case ('edit'):
                    $empresaController = new EmpresaController();
                    $empresaController->edit();
                    break;
                case ('update'):
                    $empresaController = new EmpresaController();
                    $empresaController->update();
                    break;
                case ('show'):
                    $empresaController = new EmpresaController();
                    $empresaController->show();
                    break;
            }
            break;
    }
}