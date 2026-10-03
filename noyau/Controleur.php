<?php

final class Controleur
{
    /** @var array<string, mixed> */
    private array $_urlDecortique = [];

    /** @var array<string> */
    private array $_urlParametres = [];

    /** @var array<string, mixed> */
    private array $_donneeForm = [];

    /**
     * @param array<string, mixed> $A_postParams
     */
    public function __construct(string $S_url,array $A_postParams)
    {
        $S_url = trim($S_url, '/');

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

    public function executer(): mixed
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

        return $B_called;
    }
}
?>