<?php
// ================================================
// CLASE BASE (SUPERCLASE): Producto
// ================================================
class Producto {
    // 1. ATRIBUTOS DE LA CLASE
    public $nombre;
    public $precio;
    public $cantidad;

    // 2. CONSTRUCTOR (Asigna valores iniciales al instanciar)
    public function __construct($nombre, $precio, $cantidad) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }

    // 3. MÉTODOS (Acciones del objeto)
    public function mostrarDetalles() {
        echo "Producto: " . $this->nombre . "<br>";
        echo "Precio original: $" . $this->precio . "<br>";
        echo "Stock disponible: " . $this->cantidad . " unidades<br>";
    }

    public function aplicarDescuento($porcentaje) {
        $descuento = $this->precio * ($porcentaje / 100);
        return $this->precio - $descuento;
    }
}

// ================================================
// CLASE DERIVADA 1 (SUBCLASE): ProductoElectronico
// Hereda atributos y métodos de la clase Producto
// ================================================
class ProductoElectronico extends Producto {
    // Atributo único de esta subclase
    public $mesesGarantia;

    // Constructor que reutiliza el constructor de la clase base
    public function __construct($nombre, $precio, $cantidad, $mesesGarantia) {
        parent::__construct($nombre, $precio, $cantidad);
        $this->mesesGarantia = $mesesGarantia;
    }

    // Sobrescritura del método mostrarDetalles() de la clase base
    public function mostrarDetalles() {
        parent::mostrarDetalles(); // Llama al método de la clase padre
        echo "Garantía incluida: " . $this->mesesGarantia . " meses<br><br>";
    }

    // Método exclusivo de ProductoElectronico
    public function extenderGarantia($mesesExtra) {
        $this->mesesGarantia += $mesesExtra;
        echo "Garantía extendida a " . $this->mesesGarantia . " meses.<br><br>";
    }
}

// ================================================
// CLASE DERIVADA 2 (SUBCLASE): ProductoPerecedero
// Hereda atributos y métodos de la clase Producto
// ================================================
class ProductoPerecedero extends Producto {
    // Atributo único de esta subclase
    public $fechaCaducidad;

    // Constructor que reutiliza el constructor de la clase base
    public function __construct($nombre, $precio, $cantidad, $fechaCaducidad) {
        parent::__construct($nombre, $precio, $cantidad);
        $this->fechaCaducidad = $fechaCaducidad;
    }

    // Sobrescritura del método mostrarDetalles() de la clase base
    public function mostrarDetalles() {
        parent::mostrarDetalles(); // Llama al método de la clase padre
        echo "Fecha de caducidad: " . $this->fechaCaducidad . "<br><br>";
    }

    // Método exclusivo que reutiliza aplicarDescuento() de la clase base
    public function aplicarDescuentoPorCaducidad() {
        $precioLiquidacion = $this->aplicarDescuento(25);
        echo "Precio de liquidación por caducidad (25% desc.): $" . $precioLiquidacion . "<br><br>";
    }
}

// ================================================
// PROGRAMA PRINCIPAL (Instanciación y Pruebas)
// ================================================

// 1. Creación y prueba de objeto de la subclase ProductoElectronico
$miProducto = new ProductoElectronico("Laptop HP", 1200.00, 5, 12);
$miProducto->mostrarDetalles(); // Método sobrescrito
$miProducto->extenderGarantia(6); // Método exclusivo de la subclase

// Prueba del método heredado para calcular el descuento
$precioFinal = $miProducto->aplicarDescuento(10); // Aplicamos el 10%
echo "Precio final con 10% de descuento: $" . $precioFinal . "<br><br>";

// 2. Creación y prueba de objeto de la subclase ProductoPerecedero
$productoAlimento = new ProductoPerecedero("Leche Entera 1L", 28.00, 15, "30/11/2026");
$productoAlimento->mostrarDetalles(); // Método sobrescrito
$productoAlimento->aplicarDescuentoPorCaducidad(); // Método exclusivo
?>
