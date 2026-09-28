<?php

final class Controleur
{
    private $_urlDecortique;

    private $_urlParametres;

    private $_donneeForm;

    public function __construct($S_url, $A_postParams)
    {

        if ('/' == substr($S_url, -1, 1)) {
            $S_url = substr($S_url, 0, strlen($S_url) - 1);
        }

        $A_urlDecortique = explode('/', $S_url);

        if (empty($A_urlDecortique[0])) {
            $A_urlDecortique[0] = 'ControleurDefaut';
        } else {
            $A_urlDecortique[0] = 'Controleur' . ucfirst($A_urlDecortique[0]);
        }

        if (empty($A_urlDecortique[1])) {
            $A_urlDecortique[1] = 'defautAction';
        } else {
            $A_urlDecortique[1] = $A_urlDecortique[1] . 'Action';
        }


        $this->_urlDecortique['controleur'] = array_shift($A_urlDecortique);
        $this->_urlDecortique['action'] = array_shift($A_urlDecortique);

        $this->_urlParametres = $A_urlDecortique;

        $this->_donneeForm = $A_postParams;

    }

    public function executer()
    {
        if (!class_exists($this->_urlDecortique['controleur'])) {
            throw new ControleurException($this->_urlDecortique['controleur'] . " n'est pas un controleur valide.");
        }

        if (!method_exists($this->_urlDecortique['controleur'], $this->_urlDecortique['action'])) {
            throw new ControleurException($this->_urlDecortique['action'] . " du contrôleur " .
                    $this->_urlDecortique['controleur'] . " n'est pas une action valide.");
        }

        $B_called = call_user_func_array(array(new $this->_urlDecortique['controleur'],
                $this->_urlDecortique['action']), array($this->_urlParametres, $this->_donneeForm ));

        if (false === $B_called) {
            throw new ControleurException("L'action " . $this->_urlDecortique['action'] .
                    " du contrôleur " . $this->_urlDecortique['controleur'] . " a rencontré une erreur.");
        }
    }
}
?>