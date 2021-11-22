class AutoLoader{

static function register(){
spl_autolaod_register(array(__CLASS__), 'autoload'));
}
}

