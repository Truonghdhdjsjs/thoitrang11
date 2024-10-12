<?php
class FT_Controller
{
    protected $views = [];
    protected $model = null;
    protected $library = [];
    protected $helper = [];
    protected $config = null;

    public function __construct()
    {
        // Load any necessary configurations or dependencies here.
    }

    public function load($controller, $action)
    {
        // Assuming $controller is a string that corresponds to the name of the controller class
        // and $action is the method to be called.

        // Include the controller file if it exists
        $controllerFile = "controllers/" . $controller . ".php"; // Adjust path as needed
        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            // Check if the controller class exists
            if (class_exists($controller)) {
                $controllerInstance = new $controller();
                
                // Check if the action method exists
                if (method_exists($controllerInstance, $action)) {
                    // Call the action method
                    $controllerInstance->$action();
                } else {
                    throw new Exception("Action '$action' not found in controller '$controller'.");
                }
            } else {
                throw new Exception("Controller class '$controller' not found.");
            }
        } else {
            throw new Exception("Controller file '$controllerFile' not found.");
        }
    }

    public function loadModel($model)
    {
        $modelFile = "models/" . $model . ".php"; // Adjust path as needed
        if (file_exists($modelFile)) {
            require_once $modelFile;

            if (class_exists($model)) {
                $this->model = new $model();
            } else {
                throw new Exception("Model class '$model' not found.");
            }
        } else {
            throw new Exception("Model file '$modelFile' not found.");
        }
    }

    public function loadLibrary($library)
    {
        $libraryFile = "libraries/" . $library . ".php"; // Adjust path as needed
        if (file_exists($libraryFile)) {
            require_once $libraryFile;
            $this->library[$library] = new $library();
        } else {
            throw new Exception("Library file '$libraryFile' not found.");
        }
    }

    public function loadHelper($helper)
    {
        $helperFile = "helpers/" . $helper . ".php"; // Adjust path as needed
        if (file_exists($helperFile)) {
            require_once $helperFile;
            $this->helper[$helper] = true; // Just marking as loaded
        } else {
            throw new Exception("Helper file '$helperFile' not found.");
        }
    }

    public function loadConfig($config)
    {
        $configFile = "config/" . $config . ".php"; // Adjust path as needed
        if (file_exists($configFile)) {
            $this->config = require $configFile;
        } else {
            throw new Exception("Config file '$configFile' not found.");
        }
    }

    public function renderView($view, $data = [])
    {
        // Load the view file and pass data to it
        $viewFile = "views/" . $view . ".php"; // Adjust path as needed
        if (file_exists($viewFile)) {
            extract($data); // Extract data to variables
            require_once $viewFile;
        } else {
            throw new Exception("View file '$viewFile' not found.");
        }
    }
}
