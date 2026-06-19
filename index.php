<?php
ob_start();
/** 
 * Importar Configurações Globais
 */
require 'cxsystem/cxconfig.php';

/** 
 * Importar Configurações Locais
 */
require 'config.php';
CxConfig::init();

/**
 * Importar CxSystem
 */
require 'cxsystem/cxrequest.php';
require 'cxsystem/cxrouter.php';
require 'cxsystem/cxsession.php';


/**
 * Definir Urls
 */
require 'urls.php';

/** 
 * Importar libs
 */
require_once('lib/ldap/ldap.php');
require_once('lib/ldap/foto.php');
require_once('lib/funcoes/funcoes.php');
require_once('lib/dao/dao.php');
require_once('lib/permissoes/permissoes.php');

/**
 * Importar middlewares
 */

require_once('middlewares/database.php');
require_once('middlewares/autenticacao.php');
require_once('middlewares/auditoria.php');


/**
 * Processando a URL Chamada
 */
CxRouter::matchUrl();

/**
 * Importar middlewares da app especifica por ordem alfabetica
 */
if (CxRouter::get_current_app()) {
    foreach (glob('app/' . CxRouter::get_current_app() . "/middlewares/*.php") as $filename) {
        include_once($filename);
    }
}

/**
 * Renderizar pagina
 */
CxRequest::render_response(CxRouter::get_response());
