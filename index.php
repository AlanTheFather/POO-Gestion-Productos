<?php
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
        echo "Stock disponible: " . $this->cantidad . " unidades<br><br>";
    }

    public function aplicarDescuento($porcentaje) {
        $descuento = $this->precio * ($porcentaje / 100);
        return $this->precio - $descuento;
    }
}

// ================================================
// PROGRAMA PRINCIPAL (Instanciación y Pruebas)
// ================================================

// Creación del objeto a partir de la clase
$miProducto = new Producto("Laptop HP", 1200.00, 5);

// Prueba del método para mostrar información
$miProducto->mostrarDetalles();

// Prueba del método para calcular el descuento
$precioFinal = $miProducto->aplicarDescuento(10); // Aplicamos el 10%
echo "Precio final con 10% de descuento: $" . $precioFinal;
?>
