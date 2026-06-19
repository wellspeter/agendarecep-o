<?php

/**
 * Urls das páginas ... será migrado cada uma para sua app
 */
CxRouter::addUrl('', 'index.php', $name = 'pagina_inicial');

/**
 * Urls app Eleitos
 */
CxRouter::set_app('repcaoEleitos');
include_once('app/recepcao_eleitos/urls.php');
CxRouter::unset_app();

/**
 * Urls app eventos
 */
CxRouter::set_app('eventos');
include_once('app/eventos/urls.php');
CxRouter::unset_app();

/**
 * Urls app eventos
 */
CxRouter::set_app('planonegocios');
include_once('app/plano_negocios/urls.php');
CxRouter::unset_app();


