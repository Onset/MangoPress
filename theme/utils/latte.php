<?php

function toRelativeUrl($url) {
	$urlscript = new Nette\Http\UrlScript($url);
	return '/' . $urlscript->getRelativeUrl();
}

function renderLatte($path, $parameters = array()) {
	global $App;

	$defaults = array(
		'baseUrl' => get_home_url(),
		'basePath' => toRelativeUrl(get_home_url())
	);

	$parameters += $defaults;

	if(!empty($App)) {
		$parameters['App'] = $App;
	}

	$latte = new Latte\Engine;
	$latte->setTempDirectory(TEMP_DIR);

	// $latte->addFilter('money', function($val) { return '...'; });

	return $latte->render($path, $parameters);
}

function view($view, $parameters = array()) {
	$path = THEME_VIEWS_DIR . "/$view.latte";
	return renderLatte($path, $parameters);
}
