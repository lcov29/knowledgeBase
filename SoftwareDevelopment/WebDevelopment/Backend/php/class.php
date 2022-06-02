<?php declare(strict_types=1); ?> 
<!-- used for optional type declarations for parameters and results of methods -->
<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <title>Class</title> 
    </head> 
    <body> 
	    <?php

            // ================== CLASS BASICS ==================

            class ClassName {

                //  ===== attributes =====

                    // class attributes
                    const class_constant = "class_constant";
                    public static $public_class_attribute = "public_class_attribute";
                    private static $private_class_attribute = "private_class_attribute";

                    // object attributes
                    private $private_object_attribute;
                    public $public_object_attribute;
                    protected $protected_object_attribute;

                // ===== methods =====

                    // 'magic' methods; can be explicitly called with $<objectvariable>->__foo()

                        function __construct($parameter_1, $parameter_2, $parameter_3) {
                            $this->private_object_attribute = $parameter_1;
                            $this->public_object_attribute = $parameter_2;
                            $this->protected_object_attribute = $parameter_3;
                        }

                        function __destruct() {
                            // deletes object and frees memory
                        }

                        
                        function __toString() {
                            // can be called with $object 
                            return "$this->private_object_attribute
                                    $this->public_object_attribute 
                                    $this->protected_object_attribute";
                        }

                    // class methods

                        public static function public_static_function(/*parameters*/) {
                            echo "public static function<br>";
                        }

                        private static function private_static_function(/*parameters*/) {
                            echo "private static function<br>";
                        }

                    // object method
                        public function public_object_method($param_1, $param_2 = "default value") {
                            echo "public_object_method: Parameters($param_1, $param_2)<br>";

                            // internal access to private static elements
                            echo self::class_constant . "<br>"; 
                            echo self::$private_class_attribute . "<br>";
                            echo self::private_static_function() . "<br>";
                        }
            }


            // ================== INTERFACES AND SUPTYPING ==================
            
            interface InterfaceName {
                function foo();
                //...
            }


            class Superclass implements InterfaceName {

                private $superclass_attribute;

                function __construct($parameter) {
                    $this->superclass_attribute = $parameter;
                }

                function __toString() {
                    return "$this->superclass_attribute";
                }

                function foo() {
                    echo "Superclass.foo()<br>";
                }

                function bar() {
                    echo "Superclass.bar()<br>";
                }
            }


            class Subclass extends Superclass {

                private $subclass_attribute;

                function __construct($parameter1, $parameter2) {
                    $this->subclass_attribute = $parameter2;
                    parent::__construct($parameter1);
                }

                function __toString() {
                    return parent::__toString() . ", $this->subclass_attribute";
                }

                //overwrite superclass method
                function foo() {
                    echo "Subclass.foo()<br>";
                }
            }


            // ================== Work with Classes ==================

            $object = new ClassName("Param1", "Param2", "Param3");                  // construction

            echo "$object<br>";                                                     // implicit call __toString()
            echo $object->__toString() . "<br>";                                    // explicit call

            $object->public_object_attribute = "original: public object attribute"; // set public attribute 
            echo "$object->public_object_attribute<br>";                            // get public attribute
            $object->public_object_method("Test");                                  // call public method

            // external access to public static elements
            echo ClassName::class_constant . " (external access)<br>";
            echo ClassName::$public_class_attribute . " (external access)<br>";
            echo ClassName::public_static_function() . "(external access)<br>";

            // attributes can be dynamically added (avoid it)
            $object->new_attribute = 20;    
            echo "dynamically_added_attribute: $object->new_attribute<br>";

            //clone objects
            $clone = clone $object;     //alternative: $clone = $object->__clone();    (magic method needs to be specified!)

            $subclass = new Subclass("superclass_attribute", "subclass_attribute");
            echo "$subclass<br>";
            $subclass->foo();
            $subclass->bar();
        ?>
    </body> 
</html>
